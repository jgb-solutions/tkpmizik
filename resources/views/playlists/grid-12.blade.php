@foreach ( $playlists as $playlist )
	<div class="col-xs-4" title="{{$playlist->name}}">
		<a href="{{ $playlist->url }}">
			<div class="box-shadow btlr btrr bbrr bblr bg-white">
				<div class="text-center">
					<p>
						<i class="fa fa-play fa-4x"></i>
					</p>
					<h4 class="mTop6">
						{{ $playlist->name }}
					</h4>
				</div>
			</div>
		</a>
	</div>
@endforeach