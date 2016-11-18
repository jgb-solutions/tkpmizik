@if ($related->count())
	<div class="row bg-black btrr bbrr">
		<h3 class="text-center">
			<i class="fa fa-music"></i>
			Mizik nan menm kategori {{ $music->category->name }}
			<i class="fa fa-th-list"></i>
		</h3>
	</div>
	<br>
	<div class="row">
		@foreach ($related as $music)
			@include('inc.music.grid-3')
		@endforeach
	</div>
@endif