<div class="panel panel-default">
	<table class="table table-striped table-hover table-bordered table-condensed">
		<tbody>
		@foreach ( $videos as $video )
			<tr>
				<td>
					<i class="fa fa-video-camera"></i>
				</td>
				<td>
					<strong>
						<a href="{{ route('video.show', ['id' => $video->id, 'slug' => $video->slug]) }}">
						{{ $video->name }}</a>
					</strong>
				</td>
				<td>
					<a
						class="btn btn-default"
						href="{{ route('video.edit', ['id' => $video->id]) }}">
						<i class="fa fa-edit"></i>
					</a>
				</td>
				<td>
					<form action="{{ route('video.delete', ['id' => $video->id]) }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button
							onclick='return confirm("Ou Vle Efase {{ $video->name }} tout bon?")'
							class="btn btn-danger">
							<i class="fa fa-trash-o"></i>
						</button>
					</form>
				</td>
			</tr>
		@endforeach

		</tbody>
	</table>
</div>