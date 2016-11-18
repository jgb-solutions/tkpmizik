<div class="panel panel-default">
	<table class="table table-striped table-hover table-bordered table-condensed">
		<thead>
			<th><span class="glyphicon glyphicon-picture"></span> Image</th>
			<th><span class="glyphicon glyphicon-music"></span> Name</th>
			<th><span class="glyphicon glyphicon-download-alt"></span> Download</th>
		</thead>
		<tfoot>
			<th><span class="glyphicon glyphicon-picture"></span> Image</th>
			<th><span class="glyphicon glyphicon-music"></span> Name</th>
			<th><span class="glyphicon glyphicon-download-alt"></span> Download</th>
		</tfoot>
		<tbody>

		@foreach ( $results as $result )
			<tr>
				<td>
					<a href="/{{ $result['type'] }}/{{ $result['id'] }}">
						<img
							src="/uploads/images/thumbs/tiny/{{ $result['image'] }}"
							style="width:100%"
							class="img-reponsive img-thumbnail img-bordered"
						>
					</a>
				</td>
				<td>
					<strong>
						<a href="/{{ $result['type'] }}/{{ $result['id'] }}">
						{{ $result['name'] }}</a>
					</strong>
				</td>
				<td><strong>{{ $result['download'] }}</strong></td>
			</tr>
		@endforeach

		</tbody>
	</table>
</div>