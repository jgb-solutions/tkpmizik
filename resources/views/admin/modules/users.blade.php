<div class="panel panel-default">
	<table class="table table-striped table-hover table-bordered table-condensed">
		<tbody>
		@foreach ($users as $user)
			<tr>
				<td>
					<i class="fa fa-user"></i>
				</td>
				<td>
					<strong>
						<a href="{{ TKPM::profileLink($user->username, $user->id)}}">
							{{ $user->name }}
						</a>
					</strong>
				</td>
				<td>
					<a
						class="btn btn-default"
						href="{{ route('user.edit',  $user->id) }}">
						<i class="fa fa-edit"></i>
					</a>
				</td>
				<td>
					<form action="{{route('user.delete', ['user'=>$user->id]) }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button
							onclick='return confirm("Ou Vle Efase {{ $user->name }} tout bon?")'
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