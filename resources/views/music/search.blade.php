@include('mp3s.inc.header')

<div class="row">
	<div class="col-sm-8">

		@if( count( $results ) > 0 )
			<h1 class="text-center">{{ count( $results ). ' ' . $title }}</h1>
			<div class="panel panel-default">
				<table class="table table-striped">
					<thead>
						<th>Name</th>
						<th>Play</th>
						<th>Download</th>
					</thead>
					@foreach ( $results as $mp3 )
						<tr>
							<td><a href="/mp3/{{ $mp3->id }}">{{ $mp3->name }}</td>
							<td>{{ $mp3->play }}</td>
							<td>{{ $mp3->download }}</td>
						</tr>
					@endforeach
				</table>
			</div>
			{{ $results->links() }}
		@else
			<h1 class="text-center">Sorry bro, but no results!</h1>
		@endif
	</div>

@include('mp3s.sidebar')
@include('mp3s.inc.footer')