</div>
	<div class="row" id="footer">

		@include('inc.pre-footer')

		<div class="col-sm-12 bg-black padding1">
			<div class="row">
				<div class="col-sm-4">
					@include('inc.cta-buttons')
				</div>
				<div class="col-sm-4 col-xs-6">
					<ul class="list-unstyled white">
						@include('inc.nav-list')
						<li>
							<a
								href="https://tikwenpam.net/kontak">
								<i class="fa fa-envelope"></i>
								Kontak
							</a>
						</li>
					</ul>
				</div>
				<div class="col-sm-4 text-right col-xs-6">
					<ul class="list-unstyled white">
						@include('cats.list-cats', ['role' => ''])
					</ul>
				</div>
			</div>
			<hr>
			@include('inc.social-credit')
		</div>
	</div>
</div>
</body>
</html>