@if ($related->count())
	<div class="row bg-black btrr bbrr">
		<h3 class="text-center">
			<i class="fa fa-video-camera"></i>
			Videyo nan menm kategori {{ $video->category->name }}
			<i class="fa fa-th-list"></i>
		</h3>
	</div>
	<br>
	@foreach ( $related as $rel )
		@include('video.related-grid-12')
	@endforeach
@endif