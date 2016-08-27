<div class="row">
	<div class="col-sm-6">
		<h4 class="text-center color-black">Rezo Sosyal</h4>
		@include('inc.social-login')
	</div>
	<div class="col-sm-6">
		<hr class="visible-xs">
		<h4 class="text-center color-black">Imel ak Modpas</h4>
		<form action="{{ route('post.register')}}" method='post' class='color-black'>
			<div class="row">
				<div class="form-group col-sm-12 col-xs-6">
					<input name="name" type="name" class="form-control" id="regname" placeholder="Antre Non Ou" required value="{{ old('name') }}">
				</div>
				<div class="form-group col-sm-12 col-xs-6">
					<input name="email" type="email" class="form-control" id="regemail" placeholder="Antre Imel ou" required value="{{ old('email') }}">
				</div>
				<div class="form-group col-sm-12 col-xs-6">
					<input name="password" type="password" class="form-control" id="regpassword" placeholder="Antre Yon Modpas" required>
				</div>
				<div class="form-group col-sm-12 col-xs-6">
					<input name="password_confirm" type="password" class="form-control" id="regpasswordconfirm" placeholder="Antre Modpas Ou a Ankò" required>
				</div>

				<div class="form-group col-sm-12 col-xs-6">
					<input name="telephone" type="tel" class="form-control" id="telephone" placeholder="Antre nimwwo telefòn ou" value="{{ old('telephone') }}">
				</div>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-lg">
					<i class="fa fa-user"></i> Kreye Kont
				</button>
			</div>
			{{ csrf_field() }}
		</form>
	</div>
</div>
<p class="color-black">
	<i class="fa fa-user"></i>
	Ou gen kont deja?
	<a href="{{ route('login') }}">
		Konekte w.
	</a>
	<br>
	<i class="fa fa-key"></i>
	Ou bliye modpas ou?
	<a href="{{ route('password.reset.init') }}">
		Reyinisyalize li.
	</a>
</p>