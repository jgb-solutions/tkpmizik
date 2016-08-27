@extends('layout.logreg')

@section('icon')
 <i class="fa fa-sign-in"></i>
@stop

@section('title')
	{{ $title }}
@stop

@section('form')
    @include('auth.login-form')
@stop