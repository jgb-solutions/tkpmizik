<!DOCTYPE html>
<html lang="ht">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @section('title')
            {{ config('site.slug') }}
        @show
        &mdash; {{ config('site.name') }}
    </title>

    {{-- RSS Feed --}}
    <link
        rel="alternate"
        type="application/rss+xml"
        href="{{ route('feed.music')}}"
        title="Music RSS Feed {{ config('site.name') }}">

    <link
        rel="alternate"
        type="application/rss+xml"
        href="{{ route('feed.video')}}"
        title="Video RSS Feed {{ config('site.name') }}">

    @include('inc.seo')

    @include('styles')

</head>
<body>
    <div class="container">
        <div class="card card-container btlr btrr bbrr bblr">
         	<a href="/"><img class="profile-img-card" src="{{ TKPM::asset('images/logo.png') }}" /></a>

         	<hr>

         	<h4 class="text-center">
               @section('icon')@show
               @section('title')@show
            </h4>

            <hr>

            @section('alert')@stop

				@include('inc.alert')

         	@section('social-login')

            @include('inc.social-login')@show

         	@include('inc.errors')

				@yield('form')
        	</div>
    	</div>
	</body>
</html>