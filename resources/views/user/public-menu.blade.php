<li @if ($list) {!! 'class="list-group-item"'!!} @endif>
	<a href="{{ route('user.public.musics', $route) }}">
		<i class="fa fa-music"></i>
		Mizik {{ $first_name}} Yo
	</a>
</li>
<li @if ($list) {!! 'class="list-group-item"'!!} @endif>
	<a href="{{ route('user.public.videos', $route) }}">
		<i class="fa fa-video-camera"></i>
		Videyo {{ $first_name}} Yo
	</a>
</li>
<li @if ($list) {!! 'class="list-group-item"'!!} @endif>
	<a href="{{ route('user.public.playlists', $route) }}">
		<i class="fa fa-list"></i>
		Lis Mizik {{ $first_name}} Yo
	</a>
</li>