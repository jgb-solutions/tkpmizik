@extends('layout.nosidebar')

@section('content')

@section('search-results')
@stop

@section('title')
	{{ $title = 'Modifye Kategori "' . $category->name . '"'}}
@stop

<div class="col-sm-12">
	<div class="row bg-black">
		<h2 class="text-center"><i class="fa fa-th-list"></i> {{ $title }}</h2>
	</div>
	<br>
</div>

<div class="col-sm-8 col-sm-offset-2">
	@include('inc.errors')

	<div class="row">
		<div class="col-sm-6">
			<form action="{{route('admin.cat.update', ['category'=>$category->id])}}" method="POST" id="form-category-create">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="form-group">
					<input name="name" type="name" class="form-control" id="name" placeholder="Bay Kategori a Yon Non" value="{{ $category->name }}">
				</div>

				<div class="form-group">
					<input name="slug" type="name" class="form-control" id="slug" placeholder="Chwazi Yon Slòg Pou Kategori a" value="{{ $category->slug }}">
				</div>

				<input type="hidden" value="{{ $category->id }}" name="id">

				<p>
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-th-list"></i> Modifye
					</button>
				</p>
			</form>
		</div>

		<div class="col-sm-6">
			@include('admin.modules.categories')
		</div>

	</div>
</div>

@stop