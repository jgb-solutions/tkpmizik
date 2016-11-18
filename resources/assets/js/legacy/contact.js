$kgContactModalForm 	= $('#kgContactModalForm');
$kontakInput 			= $kgContactModalForm.find('#name');
$kgContactModal 		= $('#kontakModal');
$kontakModalToggle		= $('.kontakModalToggle');

$notice = 0;
$response = $('#response');
$sucFail = '';
$voye = '<span class="glyphicon glyphicon-send"></span>';

$(document).on('submit', '#kgContactModalForm', function( event )
{
	event.preventDefault();

	var $this 		= $(this),
		$name 		= $this.find('#name'),
		$email 		= $this.find('#email'),
		$message 	= $this.find('textarea#message');

	if ( $.trim( $name.val() ) === '' )
	{
		$notice = 1;
		$name.next().show();
	} else
	{
		$name.next().hide();
	}

	if ( $.trim( $email.val() ) === '' )
	{
		$notice = 1;
		$email.next().show();
	} else
	{
		$email.next().hide();
	}

	if ( $.trim( $message.val() ) === '' )
	{
		$notice = 1;
		$message.next().show();
	} else
	{
		$message.next().hide();
	}

	if ( $notice === 0 )
	{
		$('span.error').hide();

		$response.html('');

		$this.find('button[type=submit]').html( $ajaxLoaderImg );

		var $data = $this.serialize();

		$.post( '/ajax?action=sendMail', $data, function( $data )
		{

			$this.slideUp('slow');

			var anchor = $('<button></button>',
			{
				'class': 'btn btn-success btn-lg',
				'id'	 : 'resetForm',
				'text' : 'Voye yon lòt mesaj'
			});

			anchor.prepend( $voye + ' ');

			if ( 1 === parseInt( $data ) ) {
				$data = '<h4>Nou resevwa mesaj ou a avèk siskè!</h4>';
				$sucFail = '<div class="bg-success col-sm-12 text-center padding1"></div>&nbsp;';
			}
			else if ( 0 === parseInt( $data ) )
			{
				$data = '<h4>Nou pa ka resevwa mesaj ou a kounye a. Eseye ankò.</h4>';
				$sucFail = '<div class="bg-danger col-sm-12 text-center padding1"></div>&nbsp;';
			}

			$pSuc = $( $sucFail ).html( $data ).append( anchor );
			$response.html( $pSuc ).fadeIn();

			$this.find('button[type=submit]').text(' Voye mesaj la').prepend( $voye );

		});
	} else {
		// $response.html( '<p class="text-danger">' + notice + '</p>' );
		// $('span.error').show();
		$notice = 0;
	}
});


$(document).on('click', '#resetForm', function( event )
{
	event.preventDefault();

	$kgContactModalForm[0].reset();
	$kgContactModalForm.slideDown('slow', function() {
		$response.fadeOut();
		$(this).find('input')[0].focus();
	});

});