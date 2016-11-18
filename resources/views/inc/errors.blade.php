@if(count($errors))
	<div class="panel panel-danger">
		 <div class="panel-heading">
	    	<h3 class="panel-title">
	    		<i class="fa fa-exclamation-triangle"></i>
	    		Tanpri korije er&egrave; sa yo:
	    	</h3>
	  	</div>
		<ul class="list-group">
			@foreach ( $errors->all('<li class="list-group-item">:message</li>') as $error )
				{!! $error !!}
			@endforeach
		</ul>
	</div>
@endif