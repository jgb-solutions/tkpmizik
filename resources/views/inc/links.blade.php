<form role="form">
  	<div class="input-group">
		<span class="input-group-addon">
			<i class="fa fa-link"></i>
		</span>
		<input
      		onclick="return this.select()"
      		type="text"
      		class="form-control strong"
      		value="{{ route($type.'.show', ['id'=>$obj->id, 'slug'=>$obj->slug]) }}">
      		<span class="input-group-addon">
			<i class="fa fa-headphones"></i>
		</span>
	</div>
	<div class="input-group">
			<span class="input-group-addon">
				<i class="fa fa-link"></i>
			</span>
			<input
	      		onclick="return this.select()"
	      		type="text"
	      		class="form-control strong"
	      		value="{{ route($type.'.get', $obj->id) }}">
	      		<span class="input-group-addon">
			<i class="fa fa-download"></i>
		</span>
	</div>
</form>