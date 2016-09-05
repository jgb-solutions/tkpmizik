<form role="form">
  	<div class="input-group">
		<span class="input-group-addon">
			<i class="fa fa-link"></i>
		</span>
		<input
      		onclick="return this.select()"
      		type="text"
      		class="form-control strong"
      		value="{{ $obj->url }}">
      		<span class="input-group-addon">
			<i class="fa fa-headphones"></i>
		</span>
	</div>
	@if($type != 'playlist')
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
	@endif
</form>