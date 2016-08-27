@extends('layout.nosidebar')

@section('title')
	{{ $title = 'Woy! Erè 404' }}
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

			<p class="text-center">Mizik oubyen videyo ou ap eseye jwenn nan pa egziste sou sit la. Sa ka rive tou ou pa gen dwa pou w aksede ak sa w bezwen an. Tanpri eseye chèche yon mizik oubyen videyo anlè a oubyen tounen sou paj <a href="/">akèy</a> la.</p>
		</div>

	</div>
@stop