<div class="col-sm-4">
			<img class="img-responsive img-circle img-centered"
				style="min-width: 60px"
				src="{{ TKPM::profileImage($user) }}">
			<h3 class="text-center">{{ $user->name }}</h3>
	@if ( $user->telephone )
		<br>
		<p>
			<small>
				<a
					class="btn btn-success"
					href="tel:{{ $user->telephone }}"
					target="_blank">
					<strong>
					  <i class="fa fa-whatsapp fa-lg"></i> {{ $user->telephone }}
					</strong>
				</a>
			</small>
		</p>
	@endif
	<form role="form">
	  	<div class="input-group">
			<span class="input-group-addon">
				<i class="fa fa-link"></i>
			</span>
			<input
	      		onclick="return this.select()"
	      		type="text"
	      		class="form-control strong"
	      		value="{{ url(TKPM::profileLink($user->username, $user->id)) }}">
	      		<span class="input-group-addon">
				<i class="fa fa-user"></i>
			</span>
		</div>
	</form>
	<br>
	<ul class="list-group black">
		@if (Auth::check())
			@include('user.menu', ['list' => true])
		@else
			@include('user.public-menu', ['list' => true])
		@endif
	</ul>

	@if ( $bought_count )
	<hr>
	<div class="list-group">
	    <a href="{{ route('user.bought') }}" class="list-group-item">
	    	<span class="badge">{{ $bought_count }}</span>
	    <strong>
	    	<i class="fa fa-music"></i>
	    	Mizik Ou Achte
	    	<i class="fa fa-money"></i>
	    </strong>
	    </a>
	</div>
	@endif
	<hr>

	<ul class="list-group">
	  	<li class="list-group-item disabled">
	  		<i class="fa fa-bar-chart-o"></i>
	    	Aktivite Mizik
	  	</li>
		<li class="list-group-item">
			<i class="fa fa-eye"></i>
			Total Afichaj
			<span class="pull-right badge">{{ $musicViewsCount }}</span>
		</li>
		<li class="list-group-item">
			<i class="fa fa-music"></i>
			Total Mizik
			<span class="pull-right badge">{{ $musiccount }}</span>
		</li>
		<li class="list-group-item">
			<i class="fa fa-headphones"></i>
			Total Ekout
			<span class="pull-right badge">{{ $musicplaycount }}</span>
		</li>
		<li class="list-group-item">
			<i class="fa fa-download"></i>
			Total Telechajman
			<span class="pull-right badge">{{ $musicdownloadcount }}</span>
		</li>


		<li class="list-group-item disabled">
			<i class="fa fa-bar-chart-o"></i>
	    	Aktivite Videyo
	  	</li>
		<li class="list-group-item">
			<i class="fa fa-eye"></i>
			Total Afichaj
			<span class="pull-right badge">{{ $videoViewsCount }}</span>
		</li>
		<li class="list-group-item">
			<i class="fa fa-video-camera"></i>
			Total Videyo
			<span class="pull-right badge">{{ $videocount }}</span>
		</li>
		<li class="list-group-item">
			<i class="fa fa-download"></i>
			Total Telechajman
			<span class="pull-right badge">{{ $videodownloadcount }}</span>
		</li>
	</ul>

	@include('inc.cta-buttons')
</div>