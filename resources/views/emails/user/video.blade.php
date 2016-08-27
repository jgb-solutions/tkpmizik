@include('emails.user.header')

	<h2>Felisitasyon!!! Ou fèk mete yon nouvo videyo: {{ $video['name'] }}</h2>

	<p>Ou fèk mete yon nouvo videyo: <b>{{ $video['name'] }}</b></p>

	<p>Men plizyè lyen ki pèmèt ou manipile/jere videyo ou a:</p>

	<ul>
		<li>Gade/Telechaje:
			<a href="{{ route('video.show', ['id'=>$video['id']]) }}">
				{{ route('video.show', ['id'=>$video['id']]) }}
			</a>
		</li>
		<li>Telechaje:
			<a href="{{ route('video.get', ['id'=>$video['id']]) }}">
				{{ route('video.get', ['id'=>$video['id']]) }}
			</a>
		</li>
		<li>Modifye:
			<a href="{{ route('video.edit', ['id'=>$video['id']]) }}">
				{{ route('video.edit', ['id'=>$video['id']]) }}
			</a>
		</li>
		<li>Efase:
			<a href="{{ route('video.delete', ['id'=>$video['id']]) }}">
				{{ route('video.delete', ['id'=>$video['id']]) }}
			</a>
		</li>
	</ul>

@include('emails.user.footer')
