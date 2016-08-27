@if(count($errors))
	<div class="panel panel-default">
		<ul class="list-group bg-danger">
			@foreach ( $errors->all('<li class="list-group-item transparent"><b>:message</b></li>') as $error )
				{!! $error !!}
			@endforeach
		</ul>
	</div>
@endif