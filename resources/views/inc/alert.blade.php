@if (session('message'))
	<div class="alert alert-{{ session('status') }} fade in" role="alert" id="alert" @if(isset($dismissable)) {{'dismissable'}} @endif>
      		<button type="button" class="close" data-dismiss="alert">
      			<span aria-hidden="true">×</span>
      			<span class="sr-only">Fèmen</span>
      		</button>
      		<strong>{!! session('message') !!}</strong>
    	</div>
@endif