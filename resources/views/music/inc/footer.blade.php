
</div>
	<div class="row bg-info" id="footer">
		<div class="col-sm-4">
			<div class="list-group">
			  	<a href="/mp3/all" class="list-group-item active">
			    	<h4>Latest Songs</h4>
			  	</a>
			  	<?php $mp3s = MP3::orderBy('id', 'desc')->take( 5 )->get(); ?>

				@if ( $mp3s && count( $mp3s ) > 0 )
					<ul class="list-unstyled">
						
						@foreach( $mp3s as $mp3 )

						<strong>
							<a class="list-group-item" href="/mp3/{{ $mp3->id }}">
								{{ $mp3->name }}
							</a>
						</strong>

						@endforeach
					</ul>
				@endif
			</div>
		</div>

		<div class="col-sm-4">
			<div class="list-group">
			  	<a href="/mp4" class="list-group-item active">
			    	<h4>Latest Videos</h4>
			  	</a>
			  	<?php $mp3s = MP4::orderBy('id', 'desc')->take( 5 )->get(); ?>

				@if ( $mp3s && count( $mp3s ) > 0 )
					<ul class="list-unstyled">

						@foreach( $mp3s as $mp3 )
						
						<strong>
							<a class="list-group-item" href="/mp3/{{ $mp3->id }}">
								{{ $mp3->name }}
							</a>
						</strong>

						@endforeach
					</ul>
				@endif
			</div>
		</div>

		<div class="col-sm-4">
			<div class="list-group">
			  	<a href="#" class="list-group-item active">
			    	<h4>Category</h4>
			  	</a>

				<?php $cats = Category::orderBy('name')->take( 2 )->get(); ?>

				@if ( $cats && count( $cats ) > 0 )

					<ul class="list-unstyled">

						@foreach( $cats as $cat )

						<strong>

							<a class="list-group-item" href="/cat/{{ $cat->slug }}">
								{{ $cat->name }}
							</a>
						</strong>

						@endforeach

					</ul>
				@endif
			</div>
		</div>

		<div class="col-sm-12 bg-success padding1">
			<div class="row">
				<div class="col-sm-4">
					<div class="list-group">
					  	<li class="list-group-item bg-black">
					    	<h4>Popular Musics</h4>
					  	</li>
					  	<?php

					  	$mp3s = MP3::orderBy('play', 'desc')
			  				->orderBy('download', 'des')
			  				->take( 5 )->get();
					  	?>

						@if ( $mp3s && count( $mp3s ) > 0 )
							<ul class="list-unstyled">

								@foreach( $mp3s as $mp3 )

								<strong>
									<a class="list-group-item" href="/mp3/{{ $mp3->id }}">
										{{ $mp3->name }}
									</a>
								</strong>

								@endforeach

							</ul>
						@endif
					</div>
				</div>

				<div class="col-sm-4">
					<div class="list-group">
					  	<li class="list-group-item bg-black">
					    	<h4>Popular Videos</h4>
					  	</li>

					  	<?php $mp3s = MP3::orderBy('id', 'desc')->take( 5 )->get(); ?>

						@if ( $mp3s && count( $mp3s ) > 0 )

							@foreach( $mp3s as $mp3 )

							<strong>
								<a class="list-group-item" href="/mp3/{{ $mp3->id }}">
									{{ $mp3->name }}
								</a>
							</strong>

							@endforeach

						@endif
					</div>
				</div>
				<div class="col-sm-4">
					<div class="list-group">
					  	<li class="list-group-item bg-black">
					    	<h4>Pages</h4>
					  	</li>
						<strong>
							<a
								class="list-group-item"
								href="/about"
							>About
							</a></strong>
						<strong>
							<a
								class="list-group-item"
								href="/about"
							>Contact
							</a></strong>
						<strong>
							<a
								class="list-group-item"
								href="/about"
							>About
							</a></strong>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-12 bg-black padding1">
			<h4 class="text-center">Follow Us</h4>

			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<div class="col-xs-3 text-center">
						<a class="btn btn-primary btn-lg" href="https://www.facebook.com/tikwenpam"  target="_blank"
						title="Facebook"><i class="fa fa-facebook fa-2x"></i></a>
					</div>
					<div class="col-xs-3 text-center">
						<a class="btn btn-info btn-lg" href="https://twitter.com/tikwenpam" target="_blank"
						title="Twitter"><i class="fa fa-twitter fa-2x"></i></a>
					</div>
					<div class="col-xs-3 text-center">
						<a class="btn btn-danger btn-lg" href="https://google.com/+TiKwenPam" target="_blank"
						title="Google+"><i class="fa fa-google-plus fa-2x"></i></a>
					</div>
					<div class="col-xs-3 text-center">
						<a
							class="btn btn-default btn-lg"
							href="https://instagram.com/tikwenpam"
							target="_blank"
							title="Instagram"
						>
							<i class="fa fa-instagram fa-2x"></i>
						</a>
					</div>
				</div>
			</div>

			<div class="col-sm-12">
				<div class="col-sm-6 col-sm-offset-3">
					<hr>
				</div>
			</div>
			<div class="col-sm-8 col-sm-offset-2">
				<p class="text-center">
					&copy; 2012 - {{ date('Y') . ' ' . Config::get('site.name') }},
					All Rights Reserved.
				</p>
				<p class="text-center">
					Designed &amp; Coded by <a href="http://jgbnd.com" title="JGB! Neat Design">JGB!</a>
				</p>
			</div>
		</div>
	</div>


</div>

	<script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/soundmanager/berniecode-animator.js"></script>
	<script src="/soundmanager/soundmanager2.js"></script>
	<script src="/soundmanager/360player.js"></script>

	<script src="/js/app.js"></script>

</body>
</html>