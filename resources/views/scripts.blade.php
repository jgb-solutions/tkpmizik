<script src="{{ TKPM::asset(elixir('js/app.js')) }}"></script>

@unless ( App::isLocal() )

	{{-- Facebook Page Plugin --}}
	@include('inc.fb-script')

	{{-- Google Analytics --}}
	{{-- @include('inc.ga') --}}

@endunless

@section('scripts')
@show