<link rel="stylesheet" type="text/css" href="{{ TKPM::asset(elixir('css/vendor.css')) }}">
@if(!App::isLocal())
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
@else
	<link rel="stylesheet" type="text/css" href="{{ TKPM::asset('css/font-awesome.min.css') }}">
@endif
<style type="text/css">
	.must-hide {
		display: none;
	}
</style>
<link rel="stylesheet" type="text/css" href="{{ TKPM::asset(elixir('css/app.css')) }}">