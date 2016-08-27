@include('emails.user.header')
	<h2>Byenvini sou {{ Config::get('site.name') }} {{ $user['name'] }}</h2>

	<p>Ou fèk kreye yon kont avèk imel <b>{{ $user['email'] }}</b> epi modpas ou chwazi a. Nou kontan ou rejwenn nou. Men plizyè avantaj ou genyen lè w kreye kont ou:</p>

	<ul>
		<li>Ou ka modifye <a href="{{Config::get('site.url')}}/mp3/up">mizik</a> ak <a href="{{Config::get('site.url')}}/mp4/up">videyo</a> ou mete yo.</li>
		<li>Ou ka efase <a href="{{Config::get('site.url')}}/mp3/up">mizik</a> ak <a href="{{Config::get('site.url')}}/mp4/up">videyo</a> ou mete yo.</li>
		<li>Ou ka <a href="{{Config::get('site.url')}}/mp3/buy">achte ak vann mizik</a> ou si w vle.</li>
		<li>Ou ka vote <a href="{{Config::get('site.url')}}/mp3">mizik</a> ak <a href="{{Config::get('site.url')}}/mp4">videyo</a> pa w oubyen pa lòt moun.</li>
		<li>W'ap jwenn lyen <a href="{{Config::get('site.url')}}/user/mp3">mizik</a> ak <a href="{{Config::get('site.url')}}/user/mp4">videyo</a> ou mete yo sou imel ou.</li>
		<li>Ak lòt mesaj enpòtan nou gen pou kominike w lè sa nesesè.</li>
	</ul>

	<p>
		Ou ka ajoute yon imaj nan pwofil ou. Pou w fè sa vizite <a href="{{ Config::get('site.url') }}/user/edit">{{ Config::get('site.url') }}/user/edit"</a>.
	</p>
	<p>Tou pwofite ajoute yon non itilizatè nan pwofil ou pou li ka pi fasil pou moun ka ale sou pwofil ou. Pou w ajoute yon non itilizatè oubyen username an n anglè vizite paj sa a pou modifye pwofil ou <a href="{{ Config::get('site.url') }}/user/edit">{{ Config::get('site.url') }}/user/edit</a>. Lè w fini w'ap wè anba foto w la (si w mete youn) gen yon chan ki gen adrès paj pwofil ou a pou w ka pataje sou rezo sosyal yo pou moun ka ale sou paj ou a pi fasil pou yo wè mizik ak videyo ou mete yo. Yon egzanp adrès non itilizatè se
		<a href="{{ Config::get('site.url') }}/@{{{ Config::get('site.twitter') }}}">
			{{ Config::get('site.url') }}/@{{{ Config::get('site.twitter') }}}
		</a>.
	</p>

	<p>Ankò yon fwa, {{ $user['name'] }}, nou vrèman kontan ou rejwenn nou nan {{ Config::get('site.name') }}.</p>

	<p>E si tout fwa ou vle efase kont ou a ou kapab fè sa sou sa sou paj sa a
		<a href="{{Config::get('site.url')}}/user/edit">
			{{Config::get('site.url')}}/user/edit
		</a>. Desann anba paj la w'ap wè yon gwo bouton wouj ki ekri <b>Efase</b>. Klike sou li epi chwazi OK pou mesaj ki ap mande w pou w konfime a. Si w vle tou ou ka tou efase mizik ak videyo w yo tou. Si w vle fè sa jis koche bouton ki ekri <b>Efase mizik ak videyo ou yo tou?</b> epi l'ap montre w yon mesaj ki ap fè w konnen kisa ki ap pase si w deside fè sa. Si w deside efase kont ou a, nou espere w'ap rekreye youn ankò nan pa twò lontan paske nou regrèt w'ap kite nou. Ou enpòtan pou nou. ;)
	</p>

@include('emails.user.footer')