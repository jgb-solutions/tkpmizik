@extends('layout.main')

	@section('content')

	<div class="col-sm-8">

		<div class="row bg-black">
			<h1 class="text-center">Woy! Erè 404.</h1>
		</div>

		<div id="page-content">
			<br>
			<p class="text-center">
				<img src="{{ config('site.404img') }}">
			</p>

			<p>Paj, mizik oubyen videyo ou ap eseye jwenn nan pa egziste sou sit la. Sa ka rive tou ou pa gen dwa pou w aksede ak sa w bezwen an. Tanpri eseye chèche yon mizik oubyen videyo anlè a oubyen tounen sou paj <a href="/">akèy</a> la.</p>
		</div>

	</div>

	@stop
@stop