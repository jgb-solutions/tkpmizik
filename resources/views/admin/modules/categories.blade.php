<div class="panel panel-default">
	<table class="table table-striped table-hover table-bordered table-condensed">
		<tbody>
		@foreach ( $categories as $category )
			<tr>
				<td>
					<i class="fa fa-th-list"></i>
				</td>
				<td>
					<strong>
						<a href="{{ route('cat.show', ['slug' => $category->slug]) }}">
						{{ $category->name }}</a>
					</strong>
				</td>
				<td>
					<a
						class="btn btn-default"
						href="{{ route('admin.cat.edit', ['id' => $category->id]) }}">
						<i class="fa fa-edit"></i>
					</a>
				</td>
				<td>
					<form action="{{route('admin.cat.delete', ['id'=>$category->id]) }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button
							onclick='return confirm("Ou Vle Efase {{ $category->name }} tout bon?")'
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