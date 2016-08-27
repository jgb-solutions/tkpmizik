<div class="panel panel-default">
	<table class="table table-striped table-hover table-bordered table-condensed">
		<thead>
			<th><span class="glyphicon glyphicon-picture"></span> Image</th>
			<th><span class="glyphicon glyphicon-facetime-video"></span> Name</th>
			<th><span class="glyphicon glyphicon-eye-open"></span> Views</th>
			<th><span class="glyphicon glyphicon-download-alt"></span> Download</th>
		</thead>
		<tfoot>
			<th><span class="glyphicon glyphicon-picture"></span> Image</th>
			<th><span class="glyphicon glyphicon-facetime-video"></span> Name</th>
			<th><span class="glyphicon glyphicon-eye-open"></span> Views</th>
			<th><span class="glyphicon glyphicon-download-alt"></span> Download</th>
		</tfoot>

		<tbody>

		@foreach ( $mp4s as $mp4 )
			<tr>
				<td>
					<a href="/mp4/{{ $mp4->id }}">
						<img
							src="/uploads/images/thumbs/tiny/{{ $mp4->image }}"
							style="width:100%"
							class="img-reponsive img-thumbnail img-bordered"
						>
					</a>
				</td>
				<td>
					<strong>
						<a href="/mp4/{{ $mp4->id }}">
						{{ $mp4->name }}</a>
					</strong>
				</td>
				<td><strong>{{ $mp4->views }}</strong></td>
				<td><strong>{{ $mp4->download }}</strong></td>
			</tr>
		@endforeach

		</tbody>
	</table>
</div>