@include('emails.user.header')

	<h2>Felisitasyon!!! Ou fèk mete yon nouvo mizik.</h2>

	<p>Ou fèk mete yon nouvo mizik, men kòm ou pa kreye yon kont sou sit la, nou pa konn kòman ou rele.</p>

	<p>Avan nou ba ou lyen mizik ou a, men plizyè avantaj w'ap genyen lè w kreye kont ou:</p>

	<ul>
		<li>W'ap ka modifye <a href="{{Config::get('site.url')}}/mp3">mizik</a> ak <a href="{{Config::get('site.url')}}/mp4/up">videyo</a> ou mete yo.</li>
		<li>W'ap ka efase <a href="{{Config::get('site.url')}}/mp3">mizik</a> ak <a href="{{Config::get('site.url')}}/mp4/up">videyo</a> ou mete yo.</li>
		<li>W'ap ka <a href="{{Config::get('site.url')}}/mp3/buy">achte ak vann mizik</a> ou si w vle.</li>
		<li>W'ap ka vote <a href="{{Config::get('site.url')}}/mp3">mizik</a> ak <a href="{{Config::get('site.url')}}/mp4">videyo</a> pa w oubyen pa lòt moun.</li>
		<li>W'ap ka jwenn lyen <a href="{{Config::get('site.url')}}/user/mp3">mizik</a> ak <a href="{{Config::get('site.url')}}/user/mp4">videyo</a> ou mete yo sou imel ou.</li>
		<li>Ak lòt mesaj enpòtan nou gen pou kominike w lè sa nesesè.</li>
		<li>Plis lòt avantaj ankò. W'ap jwenn lòt detay yo lè w kreye kont ou. Pou w fè sa vizite <a href="{{Config::get('site.url')}}/register">{{Config::get('site.url')}}/register</a>.</li>
	</ul>

	<hr>

	<p>Men kèk lyen mizik ou a:</p>

	<ul>
		<li>Tande/Telechaje:
			<a href="{{ Config::get('site.url') }}/mp3/{{ $mp3['id'] }}">
				{{ Config::get('site.url') }}/mp3/{{ $mp3['id'] }}
			</a>
		</li>
		<li>Telechaje dirèk:
			<a href="{{ Config::get('site.url') }}/mp3/get/{{ $mp3['id'] }}">
				{{ Config::get('site.url') }}/mp3/get/{{ $mp3['id'] }}
			</a>
		</li>
	</ul>

	<p>Si w te gen yon kont sou sit la ou t'ap ka:</p>
	<ul>
		<li>Modifye mizik la.
		</li>
		<li>Efase mizik la.
		</li>
	</ul>

	<p>Antouka pa bliye si w vle jwenn plis avantaj sou sit la, jis kreye yon kont gratis nan adrès sa a: <a href="{{Config::get('site.url')}}/register">{{Config::get('site.url')}}/register</a></p>

@include('emails.user.footer')
