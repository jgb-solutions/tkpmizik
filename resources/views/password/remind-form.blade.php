<form action="{{ TKPM::route('password.reset.email') }}" method="POST">
	{{ csrf_field() }}
	<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
		<input
			name="email"
			type="email"
			class="form-control"
			placeholder="Imel ou vle reyinisyalize a"
			required>
	</div>
	<br>

	<button class="btn btn-success" type="submit">
		<i class="fa fa-key"></i> Reyinisyalize
	</button>

</form>