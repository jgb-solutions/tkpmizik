<div class="panel panel-default">
	<table class="table table-striped table-hover table-bordered table-condensed">
		<tbody>
		@foreach ( $playlists as $playlist )
			<tr>
				<td>
					<a class="btn btn-default"
						href="{{ route('playlist.musics', ['id' => $playlist->id]) }}">
						<i class="fa fa-eye"></i>
					</a>
				</td>
				<td>
					<strong>
						<a href="{{ route('playlist.musics', ['id' => $playlist->id]) }}">
						{{ $playlist->name }}</a>
					</strong>
				</td>
				<td>
					<a
						class="btn btn-default"
						href="{{ route('playlist.edit', ['list' => $playlist->id]) }}">
						<i class="fa fa-edit"></i>
					</a>
				</td>
				<td>
					<form action="{{ route('playlist.delete', ['list' => $playlist->id]) }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button
							onclick='return confirm("Ou Vle Efase {{ $playlist->name }} tout bon?")'
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