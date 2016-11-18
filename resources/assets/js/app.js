function views_play_download_count() {
	$spanView = $('span.views_count');
	$spanPlay = $('span.play_count');
	$spanDownload = $('span.download_count');

	param = {
		id: $spanView.data('id'),
		obj: $spanView.data('obj'),
		fn: 'vpd_count',
	};

	if ( param.id !== undefined ) {
		$.post('/api/ajax', param, function( data )
		{
			$spanView.text( data.views );
			if ( data.play !== '' ) $spanPlay.text( data.play );
			$spanDownload.text( data.download );
		});
	}
}

// function vote() {
// 	$voteBtn = $('#vote-btn');

// 	$voteBtn.find('button').on('click', function() {
// 		$this = $(this);

// 		// $this.toggleClass('btn-default btn-primary');

// 		$siblings = $this.siblings('button');

// 	    if ( $siblings.attr('disabled') )
// 	    {
// 	        $siblings.removeAttr('disabled');
// 	    } else
// 	    {
// 	        $siblings.attr('disabled', 'disabled');
// 	    }
// 	});

// 	$voteBtn.find('#voteUp').on('click', function() {
// 		$this = $(this);

// 		if ( $this.hasClass('btn-default') ) {
// 			voteUp();
// 		} else {
// 			voteNull('up');
// 		}

// 		$this.toggleClass('btn-default btn-success');
// 	});

// 	$voteBtn.find('#voteDown').on('click', function() {
// 		$this = $(this);

// 		if ( $this.hasClass('btn-default') ) {
// 			voteDown();
// 		} else {
// 			voteNull('down');
// 		}

// 		$this.toggleClass('btn-default btn-danger');
// 	});
// }

// function voteUp() {
// 	// console.log('Vote up dude');
// 	$spanView = $('span.views_count');
// 	$voteUpNum = $('#vote-up-num');
// 	$voteDownNum = $('#vote-down-num');

// 	param = {
// 		id: $spanView.data('id'),
// 		fn: 'vote',
// 		ud: 'up',
// 		obj: $spanView.data('obj')
// 	};

// 	$.post('/api/ajax', param, function( data ) {
// 		// console.log( data );

// 		if ( data.vote_down !== 0 ) {
// 			$voteDownNum.empty().html( data.vote_down );
// 		}

// 		if ( data.vote_up !== 0 )
// 		{
// 			$voteUpNum.empty().html( data.vote_up );
// 		} else {
// 			$voteUpNum.empty();
// 		}
// 	});
// }

// function voteDown() {
// 	// console.log('Vote Down dude');
// 	$spanView = $('span.views_count');
// 	$voteUpNum = $('#vote-up-num');
// 	$voteDownNum = $('#vote-down-num');

// 	param = {
// 		id: $spanView.data('id'),
// 		fn: 'vote',
// 		ud: 'down',
// 		obj: $spanView.data('obj')
// 	};

// 	$.post('/api/ajax', param, function( data ) {
// 		console.log( data );

// 		if ( data.vote_up !== 0 ) {
// 			$voteUpNum.empty().html( data.vote_up );
// 		}

// 		if ( data.vote_down !== 0 ) {
// 			$voteDownNum.empty().html( data.vote_down );
// 		} else {
// 			$voteDownNum.empty();
// 		}
// 	});
// }

// function voteNull( ud ) {
// 	// console.log('voting null');

// 	$spanView = $('span.views_count');
// 	$voteUpNum = $('#vote-up-num');
// 	$voteDownNum = $('#vote-down-num');

// 	param = {
// 		id: $spanView.data('id'),
// 		fn: 'vote',
// 		ud: 'null',
// 		obj: $spanView.data('obj'),
// 		action: ud
// 	};

// 	$.post('/api/ajax', param, function( data ) {
// 		// console.log( data );

// 		$voteUpNum.empty();

// 		if ( data.vote_up !== 0 ) {
// 			$voteUpNum.html( data.vote_up );
// 		}

// 		$voteDownNum.empty();

// 		if ( data.vote_down !== 0 ) {
// 			$voteDownNum.html( data.vote_down );
// 		}
// 	});
// }

function slideAlert() {
	var alert = $('.alert-info, .alert-success');

	alert.delay(5000).slideUp();
}

$(function() {
	$.ajaxSetup({
		headers: {
         'X-CSRF-TOKEN': $('meta#token').data('token')
      }
	});

	/********** Views Count, Play Count & Download Count ********/
	views_play_download_count();

	// vote();

	/********* Confirmation on file deletion **********/
	$('input[name=del]').on('click', function() {
		$(this).siblings('small').toggleClass('hide');
	});

	slideAlert();

	$('a.downloadButton').on('click', function(e) {
		$this = $(this);

		if ($this.attr('disabled') == 'disabled') {
			e.preventDefault();
		} else {
			$this.attr('disabled', 'disabled');
		}
	});

	$fakecropped = $('.fakecrop-fill img');
	$fakecropped.height($fakecropped.width());
});

/* AngularJS code */
angular.module('app', [
	'ngFileUpload',
	'ngAnimate',
	'chieffancypants.loadingBar'
])

.config(['$httpProvider', 'cfpLoadingBarProvider',
	function($httpProvider, cfpLoadingBarProvider) {
	// configuring the loading bar
	cfpLoadingBarProvider.includeSpinner = true;

	$httpProvider.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
}]);

/* Snow */
snowStorm.flakesMaxActive = 96;    // show more snow on screen at once
snowStorm.useTwinkleEffect = true;
// snowStorm.showCharacter = '&#x266B'; //"♫";
snowStorm.snowStick = true;
snowStorm.useMeltEffect = true;
snowStorm.excludeMobile = false;