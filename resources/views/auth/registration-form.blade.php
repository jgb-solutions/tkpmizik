<form action="{{ TKPM::route('post.register')}}"
	method='POST' role="form" novalidate>
	{{ csrf_field() }}
	<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-user"></i></span>
		<input name="name" type="name" class="form-control" id="regname" placeholder="Antre Non Ou" required value="{{ old('name') }}">
	</div>
	<br>
	<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
		<input name="email" type="email" class="form-control" id="regemail" placeholder="Antre Imel ou" required value="{{ old('email') }}">
	</div>
	<br>
	<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-key"></i></span>
		<input name="password" type="password" class="form-control" id="regpassword" placeholder="Antre Yon Modpas" required>
	</div>
	<br>
	<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-key"></i></span>
		<input name="password_confirm" type="password" class="form-control" id="regpasswordconfirm" placeholder="Antre Modpas Ou a Ankò" required>
	</div>
	<br>
	<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-phone"></i></span>
		<input name="telephone" type="tel" class="form-control" id="telephone" placeholder="Antre nimwwo telefòn ou" value="{{ old('telephone') }}">
	</div>
	<br>
	<div class="form-group">
		<button type="submit" class="btn btn-primary btn-lg">
			<i class="fa fa-user"></i> Kreye Kont
		</button>
	</div>
</form>
<br>
<p>
	<i class="fa fa-user"></i>
	Ou gen kont deja?
	<a href="{{ TKPM::route('login') }}">Konekte w.</a>

	<br>

	<i class="fa fa-key"></i> Ou bliye modpas ou?
	<a href="{{ TKPM::route('password.reset.init') }}">Reyinisyalize li.</a>
</p>