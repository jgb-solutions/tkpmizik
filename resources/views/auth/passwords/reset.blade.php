@extends('layout.logreg')

@section('icon')
	<i class="fa fa-key"></i>
@stop

@section('title')
	Chanje Modpas Ou
@stop

@section('social-login')@stop

@section('form')
	@include('auth.passwords.reset-form')
@stop