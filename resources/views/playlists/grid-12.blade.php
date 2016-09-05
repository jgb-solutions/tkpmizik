@foreach ( $playlists as $playlist )
	<div class="col-sm-4">
		<a href="{{ $playlist->url }}">
			<div class="row box-shadow btlr btrr bbrr bblr">
				<div class="col-sm-12 col-xs-6 text-center">
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