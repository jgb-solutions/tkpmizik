<div class="row">
	<div class="col-sm-6">
		<h4 class="text-center color-black">Rezo Sosyal</h4>
		@include('inc.social-login')
	</div>
	<div class="col-sm-6">
		<hr class="visible-xs">
		<h4 class="text-center color-black">Imel ak Modpas</h4>
		<form role="form" action="{{ TKPM::route('login') }}" method="post" class="color-black">
			<div class="row">
				<div class="form-group col-sm-12 col-xs-6">
					<input name="email" type="email" class="form-control " id="email" placeholder="Antre Imel Ou" required>
				</div>
				<div class="form-group col-sm-12 col-xs-6">
						<input name="password" type="password" class="form-control" id="password" placeholder="Antre Modpas Ou" required>
				</div>
				<div class="form-group col-sm-12 col-xs-6">
				  	<button type="submit" class="btn btn-primary btn-lg">
						<i class="fa fa-sign-in"></i> Koneksyon
					</button>
				</div>
			</div>
			{{ csrf_field() }}
		</form>
	</div>

</div>
<p class="color-black">
	<i class="fa fa-user"></i>
	Ou pa gen kont?
	<a href="{{ TKPM::route('register') }}">
		Kreye youn.
	</a>
	<br>
	<i class="fa fa-key"></i>
	Ou bliye modpas ou?
	<a href="{{ TKPM::route('password.reset.init') }}">
		Reyinisyalize li.
	</a>
</p>