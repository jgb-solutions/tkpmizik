<div class="col-sm-4">
	<h3>Hi, {{ $firstname }}!</h3>
	<h3>
		<form role="search" action="/mp3/search">
			<div class="input-group">
				<input id="q" name="q" type="text" class="form-control" placeholder="Search MP3 World!" value="{{ Input::get('q') }}">
				<span class="input-group-btn">
					<button class="btn btn-success" type="submit">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
		</form>
	</h3>


</div>