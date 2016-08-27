@if (session('status'))
	<div class="alert alert-success fade in" role="alert">
		<button type="button" class="close" data-dismiss="alert">
			<span aria-hidden="true">×</span>
			<span class="sr-only">Fèmen</span>
		</button>
		<p>{{ session('status') }}</p>
	</div>
@endif


@include('inc.errors')

<form action="{{ route('password.reset.email') }}" method="POST">

	{{ csrf_field() }}

	<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
		<input
			name="email"
			type="email"
			class="form-control"
			placeholder="Imel ou vle reyinisyalize a"
			required>
	</div>

	<br>

	<button class="btn btn-success" type="submit">
		<i class="fa fa-key"></i> Reyinisyalize
	</button>

</form>