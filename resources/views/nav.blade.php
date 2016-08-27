<nav class="navbar navbar-inverse bg-black" role="navigation">
	{{-- Brand and toggle get grouped for better mobile display --}}
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="/" title="{{ Config::get('site.name') }}">
			<img width="50" src="{{ TKPM::asset('images/logo.png') }}" class="img-responsive hidden-xs" alt="{{ Config::get('site.name') }}">
			<img class="logo-mizik lazy" src="{{ TKPM::asset('images/logo-mizik.png') }}" class="img-responsive visible-xs-block" alt="{{ Config::get('site.name') }}">
		</a>
	</div>

	{{-- Collect the nav links, forms, and other content for toggling --}}
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			@include('inc.nav-list')

			<li class="dropdown">
				<a
					href="#"
					class="dropdown-toggle"
					data-toggle="dropdown">
					<i class="fa fa-folder"></i>
					Kategori
					<b class="caret"></b>
				</a>

				<ul class="dropdown-menu">
					@include('cats.list-cats', ['role' => 'nav'])
				</ul>
			</li>
		</ul>

		<ul class="nav navbar-nav navbar-right">
			@if (Auth::check())
				<li class="dropdown">
					<a
						href="#"
						class="dropdown-toggle"
						data-toggle="dropdown">

					<i class="fa fa-user"></i>
					Alo, {{ Auth::user()->name }} <b class="caret"></b></a>
					<ul class="dropdown-menu">
						@include('user.menu', ['list' => false])
					</ul>
				</li>
			@else
				<li>
					<a href="{{ route('login') }}">
						<i class="fa fa-sign-in"></i> Koneksyon
					</a>
				</li>
				<li>
					<a href="{{ route('register') }}">
						<i class="fa fa-user"></i>
						Kreye Kont
					</a>
				</li>
			@endif
		</ul>
	</div>
</nav>