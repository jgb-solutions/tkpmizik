@extends('layout.logreg')

@section('icon')
 <i class="fa fa-user"></i>
@stop

@section('title')
	{{ $title }}
@stop

@section('form')
    @include('auth.registration-form')
@stop