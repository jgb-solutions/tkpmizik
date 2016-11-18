<div class="col-sm-6">
	<table class="table table-condensed table-striped table-bordered">
		<tbody>

		@foreach ( $categories as $category )
		<tr>
			<td><a href="/cat/{{ $category->slug }}">{{ $category->name }}</a></td>
			<td>
				<a href="/cat/edit/{{$category->id}}">
					<i class="fa fa-edit"></i>
				</a>
			</td>
			<td>
				<a href="/cat/delete/{{$category->id}}">
					<i class="fa fa-trash-o"></i>
				</a>
			</td>
		</tr>
		@endforeach

		</tbody>
	</table>
</div>