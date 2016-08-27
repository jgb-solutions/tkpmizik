<?php

return [
	'name' 				=> 'Ti Kwen Pam Mizik',
	'company' 			=> 'Ti Kwen Pam',
	'url'				=> env('SITE_URL'),
	'description' 		=> 'Mete, Tande, Telechaje, Vann ak Achte Mizik. Mete, Gade ak Telechaje videyo YouTube.',
	'slug' 				=> 'Rezo Sosyal Mizik Ayisyen',
	'mp3_upload_path' 	=> 'storage/musics',
	'image_upload_path' 	=> 'storage/images',
	'twitter'				=> 'tkpmizik',
	'creator'			=> 'tikwenpam',
	'404img'				=> '/images/404.png',
	'logo'				=> 'images/logo_tkp.jpg',
	'logo_small'			=> 'images/logo.png',
	'separator'			=> '--|--',
	'email'				=> 'tkpmizik@gmail.com',
	'fb_admin'			=> 'jeveuxblogger',
	'fb_id'				=> '794106764051904',

	'validate'			=> [
		'name'			=> [
			'required' 	=> 'Non an obligatwa. Fòk ou mete li.',
			'min'		=> 'Fòk non an pa pi piti pase 6 karaktè. Ajoute plis pase 6.'
		],
		'artist'			=> [
			'required' 	=> 'Non atis la obligatwa. Fòk ou mete li.'
		],
		'email'			=> [
			'required'	=> 'Imel la obligatwa. Fòk ou mete li.',
			'email'		=> 'Imel ou antre pa bon. Fòk ou mete yon bon imel.',
			'different'	=> 'Ou pa dwe antre menm bagay pou w non ou kòm imel. Fòk ou mete yon lòt imel oubyen chanje non ou.',
			'unique'		=> 'Imel sa a itilize deja. Si se pou ou li ye, tanpri konekte ou. Sinon chwazi yon lòt imel.'
		],
		'password'		=> [
			'required'	=> 'Modpas la obligatwa. Fòk ou mete li.',
			'same'		=> 'Dezyèm modpas ou mete a pa menm ak premye a. Fòk tou 2 menm.',
			'min'		=> 'Fòk modpas la pa pi piti pase 6 karaktè. Ajoute plis pase 6.'
		],
		'image'			=> [
			'required' 	=> 'Fòk ou chwazi yon imaj pou asosye ak mizik la.',
			'image'		=> 'Imaj ou chwazi a pa bon. Fòk ou chwazi yon bon imaj.'
		],
		'telephone'		=> [
			'numeric'	=> 'Fòk nimewo telefòn ou antre a gen chif sèlman. Li pa dwe gen espas oubyen lòt karaktè.'
		],
		'music'			=> [
			'required'	=> 'Fòk ou chwazi yon fichye MP3.',
			'mimes'		=> 'Fòk fòma mizik la MP3. Tanpri chwazi yon bon fòma. Sa ka rive tou mizik ou a gen yon gwo imaj ladan l ki anpeche sit la aksepte li. Nan ka sa a retire imaj la epi aprè eseye ankò.',
			'size'		=> 'Fòk mizik la pa depase 100 MB.'
		],
		'slug'			=> [
			'required' 	=> 'Slug la obligatwa. Fòk ou mete li.'
		],

		'code'			=> [
			'required'	=> 'Fòk ou antre yon kòd sou mizik la.',
			'min'		=> 'Kòd ou antre a pa ase bon. Fòk li pa pi piti pase 8 karaktè.'
		],
		'url'			=> [
			'required'		=> 'Fòk ou antre yon lyen. Li obligatwa.',
			'url'			=> 'Fòk ou antre yon bon lyen. Sa ou mete a pa bon.',
			'min'			=> 'Fòk lyen an pa pi piti pase 11 karaktè. Ajoute plis pase 11.'
		],
		'username'		=> [
			'alpha_num'		=> 'Non itilizatè a ka gen lèt ak chif sèlman',
			'unique'		=> 'Non itilizatè sa a itilize deja. Chwazi yon lòt',
		]
	],

	'message'			=> [
		'konekte'		=>	'Fòk ou konekte pou w aksede ak paj ou vle a.',
		'admin'			=> 	'Ou pa otorize pou w aksede ak paj ou vle a.',
		'kod-mizik'		=> 	'Fòk ou antre yon kòd sou mizik peye a pou w ka vann li. Konsa moun ki pa gen kòd la pap ka telechaje li.',
		'aktive'			=> 	'Fòk ou kontakte administratè sit la pou pibliye mizik la pou ou pou w ka vann li. Rele/ekri <a hef="tel:+509 3647 8199">+509 3647 8199</a> pou sa.',
		'login'			=> 	'Fòk ou konekte sou sit la pou w ka wè paj ou mande a.',
		'update' 		=> 	'Mizik la mete ajou avèk sisksè!',
		'bought-success' => 'Ou fèk achte yon nouvo mizik avèk siksè.',
		'update-success' => 'Mizajou a fèt avèk siksè.',
		'bought-already' 	=> 'Ou achte mizik sa a deja.',
		'bought-failed' 	=> 'Kòd ou antre a pa bon. Antre bon kòd mizik la epi eseye ankò.',
		'mp4-deletion-failed' => 'Nou regrèt men nou pa rive efase videyo a.',
		'mp4-deletion-success' => 'Videyo a efase av&egrave;k siks&egrave;.',
		'mp3-deletion-failed' => 'Nou regrèt men nou pa rive efase mizik la.',
		'mp3-deletion-success' => 'Mizik la efase av&egrave;k siks&egrave;.',
		'must-buy' 		=> 'Fòk ou achte mizik la pou w ka telechaje li. Si ou achte li deja, <a href="/login">konekte</a> w pou w ka telechaje li.',
		'cant-buy' 		=> 'Ou pa gen dwa pou w achte mizik pa w ankò.',
		'cant-play' 		=> 'Ou pa ka jwe yon mizik peye. Achte li pou w ka telechaje li epi aprè w\'ap ka tande li sou telefòn ou oubyen lòt aparèy.',
		'errors'	=> [
			'login'	=> 'Imel oubyen Modpas la pa kòrèk.
				Tanpri rantre yo epi eseye ankò.'
		],
		'passwordchange' => [
			'success' => 'Ou reyisi chanje modpas ou a avèk siksè.',
			'fail' => 'Nou regrèt, men nou pa reyisi chanje modpas ou a.'
		],
		'mustBeAdmin' => 'Ou pa gen dwa pou w wè paj sa a paske ou pa yon administratè.',
		'mustBeMusicOwner' => 'Ou pa gen dwa pou w f&egrave; modifye mizik la paske ou pa m&egrave;t li.',
		'mustBeVideoOwner' => 'Ou pa gen dwa pou w f&egrave; modifye videyo a paske ou pa m&egrave;t li.'
	]
];