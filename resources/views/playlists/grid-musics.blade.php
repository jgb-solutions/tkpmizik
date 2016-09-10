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
						<a href="{{ $music->url }}">
							{{ $music->name }}
							@if ( $music->price == 'paid')
							- <i class="fa fa-dollar"></i>
							@endif
						</a>
					</strong>
				</td>
				<td>
					<form action="{{ TKPM::route('playlist.removeMusic', ['playlist'=>$playlist->id, 'id' => $music->id]) }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button
							onclick='return confirm("Ou vle retire {{ $music->name }} nan lis la tout bon?")'
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