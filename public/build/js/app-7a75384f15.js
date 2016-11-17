// function form_category_check() {
// 	/*********** Form to create a new category **********/
// 	$form = $('#form-category-create, #form-page-create');
// 	$name = $form.find('input[name=name]');
// 	$slug = $form.find('input[name=slug]');

// 	$name.on('blur', function()
// 	{
// 		$this = $(this);

// 		$arr = ['\',-', 'à,a', 'á,a', 'â,a', 'è,e', 'ê,e', 'é,e', 'ì,i', 'í,i', 'î,i', 'ò,o', 'ó,o', 'ô,o', 'ù,u', 'û,u', 'ú,u'];
// 		$newSlug = $.trim( $this.val() ).toLowerCase().replace(/ /g, '-');

// 		$( $arr ).each(function(index, el) {
// 			$odd = el.split(',');
// 			$reg = $odd[0];
// 			$newSlug = $newSlug.replace( $reg, $odd[1] );
// 		});

// 		$slug.val( $newSlug );

// 	});
// }

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

function vote() {
	$voteBtn = $('#vote-btn');

	$voteBtn.find('button').on('click', function() {
		$this = $(this);

		// $this.toggleClass('btn-default btn-primary');

		$siblings = $this.siblings('button');

	    if ( $siblings.attr('disabled') )
	    {
	        $siblings.removeAttr('disabled');
	    } else
	    {
	        $siblings.attr('disabled', 'disabled');
	    }
	});

	$voteBtn.find('#voteUp').on('click', function() {
		$this = $(this);

		if ( $this.hasClass('btn-default') ) {
			voteUp();
		} else {
			voteNull('up');
		}

		$this.toggleClass('btn-default btn-success');
	});

	$voteBtn.find('#voteDown').on('click', function() {
		$this = $(this);

		if ( $this.hasClass('btn-default') ) {
			voteDown();
		} else {
			voteNull('down');
		}

		$this.toggleClass('btn-default btn-danger');
	});
}

function voteUp() {
	// console.log('Vote up dude');
	$spanView = $('span.views_count');
	$voteUpNum = $('#vote-up-num');
	$voteDownNum = $('#vote-down-num');

	param = {
		id: $spanView.data('id'),
		fn: 'vote',
		ud: 'up',
		obj: $spanView.data('obj')
	};

	$.post('/api/ajax', param, function( data ) {
		// console.log( data );

		if ( data.vote_down !== 0 ) {
			$voteDownNum.empty().html( data.vote_down );
		}

		if ( data.vote_up !== 0 )
		{
			$voteUpNum.empty().html( data.vote_up );
		} else {
			$voteUpNum.empty();
		}
	});
}

function voteDown() {
	// console.log('Vote Down dude');
	$spanView = $('span.views_count');
	$voteUpNum = $('#vote-up-num');
	$voteDownNum = $('#vote-down-num');

	param = {
		id: $spanView.data('id'),
		fn: 'vote',
		ud: 'down',
		obj: $spanView.data('obj')
	};

	$.post('/api/ajax', param, function( data ) {
		console.log( data );

		if ( data.vote_up !== 0 ) {
			$voteUpNum.empty().html( data.vote_up );
		}

		if ( data.vote_down !== 0 ) {
			$voteDownNum.empty().html( data.vote_down );
		} else {
			$voteDownNum.empty();
		}
	});
}

function voteNull( ud ) {
	// console.log('voting null');

	$spanView = $('span.views_count');
	$voteUpNum = $('#vote-up-num');
	$voteDownNum = $('#vote-down-num');

	param = {
		id: $spanView.data('id'),
		fn: 'vote',
		ud: 'null',
		obj: $spanView.data('obj'),
		action: ud
	};

	$.post('/api/ajax', param, function( data ) {
		// console.log( data );

		$voteUpNum.empty();

		if ( data.vote_up !== 0 ) {
			$voteUpNum.html( data.vote_up );
		}

		$voteDownNum.empty();

		if ( data.vote_down !== 0 ) {
			$voteDownNum.html( data.vote_down );
		}
	});
}

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

	vote();

	// // AJAX Upload
	// var options = {
	//    beforeSend: function() {
	// 		//clear everything
	// 		$('#progress').show();
	// 		$('.progress-bar').html('0%');
	// 		$('.progress-bar').width('0%');
	// 		$('#upMessage').empty();
	// 		submitButton = $('#submitButton');

	// 		if (submitButton.attr('disabled') == 'disabled') {
	// 			e.preventDefault();
	// 		} else {
	// 			submitButton.attr('disabled', 'disabled');
	// 		}

	// 		submitButton.attr('disabled', 'disabled');
	// 		buttonText = submitButton.html();
	// 		$ajaxLoaderImg	= '<img src="/images/ajax-loader.gif">';
	// 		submitButton.html( $ajaxLoaderImg );
	//     },
	//     uploadProgress: function(event, position, total, percentComplete) {
	//         $('.progress-bar').width(percentComplete + '%');
	//         $('.progress-bar').html(percentComplete + '%');
	//     },
	//     success: function() {
	//         $('.progress-bar').width('100%');
	//         $('.progress-bar').html('100%');

	//         submitButton.html( buttonText );

	//     },
	//     complete: function(response) {
	//         var res = $.parseJSON( response.responseText );

	//         if ( res.success === true ) {
	//         	// console.log( res.url );
	//         	window.location.href = res.url;
	//         }
	//     },
	//     error: function(response) {
	//     	var errors = $.parseJSON(response.responseText);
	//       var messages = '';

	//     	console.log(errors);

	//     	$('#progress').slideUp();
	//         	$('#upMessage').parent().removeClass('hide-panel');

 //        		$.each(errors, function(index, val) {
 //        			$.each(val, function(index, val) {
 //    					messages += '<li class="list-group-item transparent">' + val + '</li>';
 //        			});
 //        		});

 //        		$('#upMessage').html( messages );
	//     }
	// };

	/********* Confirmation on file deletion **********/
	$('input[name=del]').on('click', function() {
		$(this).siblings('small').toggleClass('hide');
	});

	// $("img.lazy").lazyload();

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
angular.module('app')

.controller('searchController', ['$scope', '$http', function($scope, $http) {
	$scope.results = [];
	$scope.type = '';
	$scope.noResults = false;

	$scope.noResultsText = function() {
		return 'Pa gen rezilta pou "' + $scope.searchTerm + '"';
	};

	$scope.search = function( withType ) {
		if ( $scope.searchTerm.length > 2 ) {
			$scope.loading = true;
			$scope.noResults = false;

			$http.get('/cheche?q=' + $scope.searchTerm + '&type=' + $scope.type)
				.then(function( response ) {
					var data = [];

					// console.log( response );

					data = ( withType ) ? response.data.data : response.data;

					if ( data.length ) {
						$scope.results = data;
						$scope.loading = false;
					} else {
						$scope.results = [];
						$scope.noResults = true;
						$scope.loading = false;
					}
				}, function( error ) {
					console.log( error );
				});
		} else {
			$scope.results = [];
			$scope.noResults = false;
		}

		$scope.setType = function( type ) {
			var withType = type.length ? true : false;

			$scope.type = type;
			$scope.search( withType );
		};
	};
}]);
angular.module('app')

.controller('UploadController', ['$scope', 'Upload', '$http',
function ($scope, Upload, $http) {
	$scope.data = {
		description: ''
	};

	$scope.pbWidth = 0;

	$scope.showUploadFormAndReset = function() {
		$scope.uploading = false;
		$scope.uploadSuccess = false;

		var category = $scope.data.category;
		$scope.data = {
			category: category,
			description: ''
		};
	};

	$scope.showUploadForm = function() {
		$scope.uploading = false;
		$scope.tryAgain = false;
		$scope.showPB = false;
		$scope.showErrors = false;
	};

	$scope.uploadMusic = function() {
		console.log($scope.data);

		$scope.upload($scope.data);
	};

	$scope.emailAndTweet = function(data) {
		$http.post(data.emailAndTweetUrl, {id: data.id})
			.then(function(response) {
				console.log(response);
				$scope.emailedAndTweeted = true;
			}, function(error) {
				console.log(error);
			});
	};

	$scope.upload = function (image, music) {
		$scope.uploading = true;
		$scope.uploadSuccess = false;
		$scope.tryAgain = false;

		Upload.upload({
			url: window.location.href,
			data: $scope.data
		})
		.then(function (response) {
				console.log(response.data);
				// window.location.href = response.data.url;
				$scope.tryAgain = false;
				$scope.uploadSuccess = true;
				$scope.uploadedMusic = response.data;
				if (! response.data.emailedAndTweeted) {
					$scope.emailAndTweet(response.data);
				} else {
					$scope.emailedAndTweeted = true;
					console.log('Already posted fam.');
				}
			}, function (response) {
				console.log(response.data);
				$scope.errors = response.data;
				$scope.showErrors = true;
				$scope.tryAgain = true;
			}, function (evt) {
				$scope.showPB = true;
				$scope.pbWidth = parseInt(100.0 * evt.loaded / evt.total);
				console.log('progress: ' + $scope.pbWidth + '% ');
			}
		);
	};
}]);
//# sourceMappingURL=app.js.map
