@include('emails.user.header')

	<h2>Felisitasyon!!! Ou fèk mete yon nouvo videyo: {{ $video['name'] }}</h2>

	<p>Ou fèk mete yon nouvo videyo: <b>{{ $video['name'] }}</b></p>

	<p>Men plizyè lyen ki pèmèt ou manipile/jere videyo ou a:</p>

	<ul>
		<li>Gade/Telechaje:
			<a href="{{ TKPM::route('video.show', ['id'=>$video['id']]) }}">
				{{ TKPM::route('video.show', ['id'=>$video['id']]) }}
			</a>
		</li>
		<li>Telechaje:
			<a href="{{ TKPM::route('video.get', ['id'=>$video['id']]) }}">
				{{ TKPM::route('video.get', ['id'=>$video['id']]) }}
			</a>
		</li>
		<li>Modifye:
			<a href="{{ TKPM::route('video.edit', ['id'=>$video['id']]) }}">
				{{ TKPM::route('video.edit', ['id'=>$video['id']]) }}
			</a>
		</li>
		<li>Efase:
			<a href="{{ TKPM::route('video.delete', ['id'=>$video['id']]) }}">
				{{ TKPM::route('video.delete', ['id'=>$video['id']]) }}
			</a>
		</li>
	</ul>

@include('emails.user.footer')
