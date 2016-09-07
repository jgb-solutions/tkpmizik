@extends('layout.nosidebar')

@section('content')

@section('title')
	{{ $title }}
@stop

<div class="col-sm-12">
	<div class="row bg-black">
		<h1 class="text-center">
		<i class="fa fa-edit"></i>
		{{ $title }}
		</h1>
	</div>
	<br>
</div>

<div class="col-sm-8 col-sm-offset-2">

	@include('inc.alert')
	
	@include('inc.errors')

	<form action="{{route('user.update', ['id'=>$user->id])}}" enctype="multipart/form-data" class="form-horizontal" method="POST">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		<div class="form-group">
			<label for="regname" class="control-label col-sm-4">Non Ou</label>
			<div class="col-sm-8">
				<input name="name" type="text" class="form-control" id="regname" placeholder="Antre non ou" required value="{{ $user->name }}">
			</div>
		</div>

		<div class="form-group">
			<label for="regemail" class="control-label col-sm-4">Adrès Imel Ou</label>
			<div class="col-sm-8">
				<input name="email" type="email" class="form-control" id="regemail" placeholder="Antre Imel ou" required value="{{ $user->email }}">
			</div>
		</div>

		<div class="form-group">
			<label for="username" class="control-label col-sm-4">Non Itilizatè Ou</label>
			<div class="col-sm-8">
				<input name="username" type="text" class="form-control" id="username" placeholder="Chwazi Yon Non Itilizatè" value="{{ $user->username }}">
			</div>
		</div>

		<div class="form-group">
			<label for="regpassword" class="control-label col-sm-4">Nouvo Modpas</label>
			<div class="col-sm-8">
				<input name="password" type="password" class="form-control" id="regpassword" placeholder="Antre yon nouvo modpas">
			</div>
		</div>

		<div class="form-group">
			<label for="regpasswordconfirm" class="control-label col-sm-4">Konfime Modpas la</label>
			<div class="col-sm-8">
				<input name="password_confirm" type="password" class="form-control" id="regpasswordconfirm" placeholder="Antre nouvo modpas ou a ankò">
			</div>
		</div>

		<div class="form-group">
			<label for="image" class="control-label col-sm-4">Imaj Pwofil Ou</label>
			<div class="col-sm-8">
				<input type="file" name="image" id="image" class="form-control" accept=".jpg,.png,jpeg,.gif">
			</div>
		</div>

		<div class="form-group">
			<label for="telephone" class="control-label col-sm-4">Nimewo Telefòn ou</label>
			<div class="col-sm-8">
				<input name="telephone" type="tel" class="form-control" id="telephone" placeholder="Antre nimwwo telefòn ou" value="{{ $user->telephone }}">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-8 col-sm-offset-4">
				<button type="submit" class="btn btn-primary btn-lg">
					<i class="fa fa-edit"></i>
					Modifye
				</button>
			</div>
		</div>
	</form>

	<hr>
	<div class="row bg-black btlr btrr bbrr bblr">
		<h3 class="text-center">
			<i class="fa fa-trash-o"></i>
			Efase kont ou
		</h3>
	</div>
	<hr>
	<form action="{{ route('user.delete', ['user' => $user->id])}}" method="POST">
		{{ method_field('DELETE') }}
		{{ csrf_field() }}
		<div class="checkbox">
		  <label>
		    <input type="checkbox" name="del"> Efase mizik ak videyo ou yo tou?
		    	<br>
		    	<small class="hide">
		    		(Y'ap efase sou sit la, moun pap ka tande mizik ni gade videyo ou yo ankò. Men si ou kite yo, malgre ou pap ka modifye oubyen efase yo ankò apre ou fin efase kont ou an, lòt moun ak fanatik ou yo ka toujou gen aksè ak yo.)
		    	</small>
		  </label>
		</div>
		<p>
			<button
				type="submit"
				class="btn btn-danger btn-lg"
				onclick='return confirm("Ou Vle Efase kont ou tout bon?")'>
				<i class="fa fa-trash-o"></i> Efase
			</button>
		</p>
	</form>
</div>

@stop