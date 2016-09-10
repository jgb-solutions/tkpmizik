<li @if ($list) {!! 'class="list-group-item"'!!} @endif>
	<a href="{{ TKPM::route('user.index') }}">
		<i class="fa fa-user"></i>
		Ale Sou Pwofil Ou
	</a>
</li>
<li @if ($list) {!! 'class="list-group-item"'!!} @endif>
	<a href="{{ TKPM::route('user.musics') }}">
		<i class="fa fa-music"></i>
		Mizik Ou Yo
	</a>
</li>
<li @if ($list) {!! 'class="list-group-item"'!!} @endif>
	<a href="{{ TKPM::route('user.videos') }}">
		<i class="fa fa-video-camera"></i>
		Videyo ou Yo
	</a>
</li>
<li @if ($list) {!! 'class="list-group-item"'!!} @endif>
	<a href="{{ TKPM::route('user.playlists') }}">
		<i class="fa fa-list"></i>
		Lis Mizik ou Yo
	</a>
</li>
<li @if ($list) {!! 'class="list-group-item"'!!} @endif>
	<a href="{{ TKPM::route('playlists.create') }}">
		<i class="fa fa-list"></i>
		Kreye Lis Mizik
	</a>
</li>
{{--<li @if ($list) {!! 'class="list-group-item"'!!} @endif>
    <a href="{{ TKPM::route('user.bought') }}">
    	<i class="fa fa-music"></i>
    	Mizik Ou Achte
    	<i class="fa fa-money"></i>
    </a>
</li> --}}
<li @if ($list) {!! 'class="list-group-item"'!!} @endif>
	<a href="{{ TKPM::route('user.edit') }}">
		<i class="fa fa-edit"></i>
		Modifye Pwofil Ou
	</a>
</li>

@if (Auth::user()->admin)
<li @if ($list) {!! 'class="list-group-item"'!!} @endif>
	<a href="{{ TKPM::route('admin.index') }}">
		<i class="fa fa-bar-chart-o"></i>
		Administrasyon
	</a>
</li>
@endif

<li @if ($list) {!! 'class="list-group-item"'!!} @endif>
	<a href="{{ TKPM::route('logout') }}">
		<i class="fa fa-sign-out"></i>
		Dekoneksyon
	</a>
</li>