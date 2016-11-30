@extends('layout.simple')

@section('title')
	{{ $title = 'Telechaje ' . $music->title }}
@stop

@section('search-results')
@stop

@section('content')

<div class="col-sm-12">
	<div class="row bg-black">
		<h2 class="text-center"><i class="fa fa-music"></i> {{ $title }}</h2>
	</div>
	<br>
</div>

{{-- ads --}}
<div class="col-sm-12">
	@include('inc.ads.top')
	<br>
</div>

<div class="col-sm-10 col-sm-offset-1">

	@include('inc.errors')

	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
				<div class="row bg-black btlr btrr bbrr bblr">

					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<div id="counter-text">
						<br>
						<br>
						<h3 class="text-center">
							<i class="fa fa-download"></i> Tanpri tann <span id="counter"></span> segond.
						</h3>
					</div>

					<div style="display:none" id="link">
						<h3 class="text-center" id="counter-text">
							<i class="fa fa-download"></i> Telechajman an k&ograve;manse...
						</h3>
						<p class="text-center">
							Si telechajman an pa k&ograve;manse
							<a class="btn btn-success downloadButton" href="javascript:download('{{$music->download_url}}?token={{time()}}')">
								<i class="fa fa-music"></i> klike la
							</a>
						</p>
					</div>

					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
				</div>


			<script>
				time = 10;
				file='{{$music->download_url}}?token={{time()}}';

				document.getElementById('counter').innerHTML = time;
				timer = setInterval('count()', 1000);

				function count() {
					if (time == 1) {
						// clear the timer and remove counter from page
						clearInterval(timer);
						document.getElementById('counter-text').style.display="none";
						// if you want to display the link
						document.getElementById('link').style.display="block";
						// or directly start download
						download(file);
					} else {
						time--;
						document.getElementById('counter').innerHTML = time;
					}
				}

				var downloaded = false;

				function download(file) {
					if ( ! downloaded ) {
						window.location = file;
					}

					downloaded = true;
				}
			</script>
		</div>
	</div>
</div>

@stop