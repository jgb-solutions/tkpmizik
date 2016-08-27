@include('emails.user.header')

	<h2>Felisitasyon!!! Ou fèk mete yon nouvo mizik pou vann: {{ $mp3['name'] }}</h2>

	<p>Ou fèk mete yon nouvo mizik pou vann: <b>{{ $mp3['name'] }}</b></p>

	<p>Nou felise w paske w chwazi vann mizik ou a sou Ti Kwen Pam Mizik. Men kèk bagay ou dwe konnen pou w ka kòmanse vann mizik la:

		<ul>
			<li>Lè ou fèk mete yon mizik pou vann sou sit la, li pa pibliye menm kote a. Paske fòk ou peye nou pou nou pibliye mizik la pou ou. Nou pa pran lajan pou mizik ou mete gratis yo. Men nou pran yon ti monnen nan men w pou ede nou kontinye travay la. <b>Pri a se 100 goud pa mizik. Spesyal 3 pou 250 goud</b>. Ou peye yon fwa. Aprè sa kenbe tout benefis mizik ou pou ou.
			</li>
			<li>
				Fòk ou mete yon kòd sou mizik la avan li pibliye. Se yon fason pou ede w pwoteje travay ou pandan nenpòt moun pa ka telechaje mizik la si yo pa peye pou li. Si yon moun bezwen achte mizik la l'ap kontakte ou pa imel oubyen telefòn epi l'ap peye w, w'ap chwazi yon fason pou w touche: pa transfè, kat sou telefòn, lajan kach elatriye, epi w'ap ba li kòd ou te mete sou mizik la. Moun nan ap antre kòd mizik la sou paj mizik la pou li ka ajoute li sou kont li. Aprè sa moun nan ka telechaje mizik la san li pa bezwen antre li ankò. Kidonk ou ka chanje kòd sou yon mizik chak fwa ou vle pou evite yon moun ki te gen yon ansyen kòd bay lòt moun pou yo telechaje mizik la san peye. Li enpòtan tou pou w konnen fòk yon moun kreye yon kont sou sit la pou yo ka achte mizik. Pou kreye yon kont sou sit la jis vizite
				<a href="{{ Config::get('site.url') }}/register">
					{{ Config::get('site.url') }}/register
				</a>.
			</li>
		</ul>
	</p>

	<p>Men plizyè lyen ki pèmèt ou manipile/jere mizik ou a:</p>

	<ul>
		<li>Paj pou achte/Telechaje:
			<a href="{{ Config::get('site.url') }}/mp3/buy/{{ $mp3['id'] }}">
				{{ Config::get('site.url') }}/mp3/buy/{{ $mp3['id'] }}
			</a>
		</li>
		<li>Telechaje dirèk:
			<a href="{{ Config::get('site.url') }}/mp3/get/{{ $mp3['id'] }}">
				{{ Config::get('site.url') }}/mp3/get/{{ $mp3['id'] }}
			</a>
		</li>
		<li>Modifye:
			<a href="{{ Config::get('site.url') }}/mp3/{{ $mp3['id'] }}/edit">
				{{ Config::get('site.url') }}/mp3/{{ $mp3['id'] }}/edit
			</a>
		</li>
		<li>Efase:
			<a href="{{ Config::get('site.url') }}/mp3/delete/{{ $mp3['id'] }}">
				{{ Config::get('site.url') }}/mp3/delete/{{ $mp3['id'] }}
			</a>
		</li>
	</ul>

@include('emails.user.footer')
