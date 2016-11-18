<div class="panel panel-default">
	<table class="table table-striped table-hover table-bordered table-condensed">

		<tbody>

		@foreach ( $musics as $music )
			<tr>
				<td>
					<i class="fa fa-music"></i>
				</td>
				<td>
					<strong>
						<a href="{{ TKPM::route('music.show', ['id' => $music->id, 'slug' => $music->slug]) }}">
							{{ $music->name }}
							@if ( $music->price == 'paid')
							- <i class="fa fa-dollar"></i>
							@endif
						</a>
					</strong>
				</td>
				<td>
					<a
						class="btn btn-default"
						href="{{ TKPM::route('music.edit', $music->id) }}">
						<i class="fa fa-edit"></i>
					</a>
				</td>
				<td>
					<form action="{{ TKPM::route('music.delete', ['id' => $music->id]) }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button
							onclick='return confirm("Ou Vle Efase {{ $music->name }} tout bon?")'
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