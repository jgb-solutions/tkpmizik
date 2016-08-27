@extends('layout.logreg')

@section('icon')
	<i class="fa fa-key"></i>
@stop

@section('title')
	Reyinisyalizasyon Imel
@stop

@section('social-login')@stop

@section('form')
	@include('auth.passwords.remind-form')
@stop