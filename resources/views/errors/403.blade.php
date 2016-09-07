@extends('layout.nosidebar')

@section('title')
	{{ $title = 'Woy! Erè 403' }}
@stop

@section('content')

	<div class="col-sm-12">

		<div class="row bg-black">
			<h1 class="text-center">{{ $title }}</h1>
		</div>
	</div>
	<div class="col-sm-8 col-sm-offset-2">
		<div id="page-content">
			<br>
			<p class="text-center">
				<img src="{{ config('site.404img') }}">
			</p>

			<p class="text-center">Ou pa gen dwa pou efase mizik oubyen videyo sa a sou sit la paske se pa ou menm ki te mete li. Si se pou ou li ye, tanpri kontakte moun ki te mete li a oubyen administrat&egrave; sit la. Osinon tounen sou paj <a href="/">akèy</a> la. M&egrave;si!</p>
		</div>

	</div>
@stop