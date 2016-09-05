<form role="form" action="{{ route('login') }}" method="post" >
	{{ csrf_field() }}
	<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
    		<input name="email" type="email" class="form-control " id="email" placeholder="Antre Imel Ou" required>
	</div>
	<br>
	<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-key"></i></span>
    		<input name="password" type="password" class="form-control" id="password" placeholder="Antre Modpas Ou" required>
	</div>
	<br>
    	<button type="submit" class="btn btn-primary btn-lg">
            <i class="fa fa-sign-in"></i> Koneksyon
        </button>
</form>

<br>

<p>
	<i class="fa fa-key"></i>
	Ou bliye modpas ou?
	<a href="{{ route('password.reset.init') }}">Reyinisyalize li.</a>
	<br>
	<i class="fa fa-user"></i>
	Ou pa gen kont?
	<a href="{{ route('register') }}">
	Kreye youn.
	</a>
</p>