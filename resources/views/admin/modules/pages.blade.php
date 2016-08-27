<div class="panel panel-default">
	<table class="table table-striped table-hover table-bordered table-condensed">

		<tbody>

		@foreach ( $pages as $page )
			<tr>
				<td>
					<i class="fa fa-file"></i>
				</td>
				<td>
					<strong>
						<a href="/p/{{ $page->slug }}">
						{{ $page->title }}</a>
					</strong>
				</td>
				<td>
					<a
						class="btn btn-default"
						href="/admin/pages/edit/{{ $page->id }}">
						<i class="fa fa-edit"></i>
					</a>
				</td>
				<td>

					<a
						href="/admin/pages/delete/{{ $page->id }}"
						onclick='return confirm("Ou Vle Efase {{ $page->name }} tout bon?")'
						class="btn btn-danger">
						<i class="fa fa-trash-o"></i>
					</a>
				</td>
			</tr>
		@endforeach

		</tbody>
	</table>
</div>