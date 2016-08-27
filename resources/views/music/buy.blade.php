@extends('layout.main')

@section('title')
	{{ $title }}
@stop

{{-- @include('inc.seo') --}}

@section('seo')
<?php TKPM::seo($mp3, 'mp3', $author) ?>
@stop

@section('content')

<div class="col-sm-8">

	@if ( Session::has('message') )
		<div class="alert alert-warning fade in" role="alert">
	      <button type="button" class="close" data-dismiss="alert">
	      	<span aria-hidden="true">×</span>
	      	<span class="sr-only">Fèmen</span>
	      </button>
	      <strong>{{ Session::get('message') }}</strong>
	    </div>
	@endif
	<div class="row bg-success">
	<h2 class="text-center">
		{{ $title }}
		<br>
		<small>
			<span class="views_count" data-obj="MP3" data-id="{{ $mp3->id }}">{{ $mp3->views }}</span>
			<i class="fa fa-eye"></i> --|--
			<span class="download_count" data-obj="MP3" data-id="{{ $mp3->id }}">{{ $mp3->download }}</span> --|--
			<span class="buy_count" data-obj="MP3" data-id="{{ $mp3->id }}">{{ $mp3->buy_count }}</span>
			<i class="fa fa-dollar"></i>
		</small>
	</h2>
	<p class="text-center text-muted">
		<em>
			Pa
			@if ( $mp3->user->username )
					<a href="/{{ '@' . $mp3->user->username }}">{{ $mp3->user->name }}</a>
				@else
					<a href="/u/{{ $mp3->user->id }}">{{ $mp3->user->name }}</a>
				@endif
			Nan <a href="/cat/{{ $mp3->category->slug }}">{{ $mp3->category->name }}</a>
			 {{ date('d/m/Y', strtotime( $mp3->created_at ) ) }}
			a {{ date('g:h a', strtotime( $mp3->created_at ) ) }}
		</em>
	</p>
	</div>

	 @if ( $mp3->description )

    <hr>

	<p class="mp3-desc">{{ $mp3->description }}</p>

    @endif

	<hr>
	<div class="row bg-info">
		@if ( $mp3->image )
			<img
				data-original="/uploads/images/show/{{ $mp3->image }}"
				class="img-responsive full-width lazy">
		@endif

		@if ( ! $bought )
		<div class="col-sm-12 padding1">
			<p>
				Mizik sa a pou vann. Li pa gratis. Sa vle di ou pap ka tande oubyen telechaje li gratis. Fòk ou antre kòd mizik la pou w ka ajoute li sou kont ou. Konsa w'ap kapab telechaje li otan de fwa ou vle. Si w poko gen yon kont sou sit la ou ka <a href="/register">kreye youn</a>. Lè w fin antre kòd la ou pap bezwen rantre li ankò. Pou w jwenn kòd la pou w ka telechaje mizik la fòk ou kontakte <a href="/u/{{$mp3->user->id}}">{{ $mp3->user->name }}</a> nan imel li <a href="mailto:{{ $mp3->user->email }}&subject='Mwen vle achte mizik ou: {{ $mp3->name }}'">{{ $mp3->user->email }}</a> {{ $mp3->user->telephone ? "oubyen rele/ekri li sou <a href='tel:{$mp3->user->telephone}'>{$mp3->user->telephone}</a>" : '' }}. Mèsi paske w chwazi sipòte atis la pandan w'ap achte mizik li.
			</p>
		</div>
		@endif
	</div>

	@if ( ! $bought )
	<hr>
	<form method="post" class="mainSearchForm">
		{{ csrf_field() }}
		<div class="input-group">
			<input
				id="code"
				name="code"
				type="password"
				class="form-control"
				placeholder="Antre kòd mizik la pou w achte li"
			>
			<span class="input-group-btn">
				<button class="btn btn-success" type="submit">
					<i class="fa fa-dollar"></i>
			    	Achte
			    	<i class="fa fa-money"></i>
				</button>

			</span>
		</div>
	</form>
	@endif

  	@if ( Auth::check() )
  	<hr>
	<div class="btn-group btn-group-lg">

		@if ( \App\User::is_admin() || $bought || Auth::user()->id == $mp3->user_id )
		<a
	  		class="btn btn-success"
	  		href="/mp3/get/{{ $mp3->id }}">
	  		<i class="fa fa-download"></i>
	  		<span class="hidden-484">Telechaje</span>
	  	</a>
		@endif

  		@if( Auth::user()->id == $mp3->user_id || \App\User::is_admin() )
		<a
			href="/mp3/delete/{{ $mp3->id }}"
			onclick='return confirm("Ou Vle Efase {{ $mp3->name }} tout bon?")'
			class="btn btn-danger">
			<i class="fa fa-trash-o"></i>
			<span class="hidden-484">Efase</span>
		</a>

		<a
			class="btn btn-default"
			href="/mp3/{{ $mp3->id }}/edit">
			<i class="fa fa-edit"></i>
			<span class="hidden-484">Modifye</span>
		</a>

		@endif

		<?php TKPM::vote('MP3', $mp3->id, $mp3->vote_up, $mp3->vote_down); ?>

	</div>

  	@endif

	<hr>
	<form class="form-horizontal" role="form">
	  	<div class="form-group">
	    	<label
	    		for="linktext"
	    		class="col-sm-4 control-label">
	    		<i class="fa fa-music"></i>
	    		Lyen mizik la: </label>
	    	<div class="col-sm-8">
	      	<input
	      		onclick="return this.select()"
	      		type="text"
	      		class="form-control strong"
	      		id="linktext"
	      		value="{{ URL::to("/mp3/buy/$mp3->id") }}">
	    	</div>
	  	</div>
	</form>

	<hr>

	<?php
	$url = Config::get('site.url') . '/mp3/' . $mp3->id;
	$urle = urlencode( $url );
	$name = $mp3->name;
	?>

	@include('inc.sharing')

	<hr>

	@include('inc.ads.bottom')

	<hr>

	@include('mp3.related')

</div>

@stop