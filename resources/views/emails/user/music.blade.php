@include('emails.user.header')

	<h2>Felisitasyon!!! Ou fèk mete yon nouvo mizik: {{ $music['name'] }}</h2>

	<p>Ou fèk mete yon nouvo mizik: <b>{{ $music['name'] }}</b></p>

	<p>Men plizyè lyen ki pèmèt ou manipile/jere mizik ou a:</p>

	<ul>
		<li>Tande/Telechaje:
			<a href="{{ TKPM::route('music.show', ['id'=>$music['id'], 'slug'=>$music['slug']]) }}">
				{{ TKPM::route('music.show', ['id'=>$music['id'], 'slug'=>$music['slug']]) }}
			</a>
		</li>
		<li>Telechaje dirèk:
			<a href="{{ TKPM::route('music.get', ['id'=>$music['id']]) }}">
				{{ TKPM::route('music.get', ['id'=>$music['id']]) }}
			</a>
		</li>
		<li>Modifye:
			<a href="{{ TKPM::route('music.edit', ['id'=>$music['id']]) }}">
				{{ TKPM::route('music.edit', ['id'=>$music['id']]) }}
			</a>
		</li>
		<li>Efase:
			<a href="{{ TKPM::route('music.delete', ['id'=>$music['id']]) }}">
				{{ TKPM::route('music.delete', ['id'=>$music['id']]) }}
			</a>
		</li>
	</ul>

@include('emails.user.footer')
