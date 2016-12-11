
<div class="row">
	<div class="col-sm-6">
		<p>
			<a
				class="btn btn-primary"
				href="https://www.facebook.com/tikwenpammizik"
				target="_blank"
				title="Facebook {{ config('site.name') }}">
				&nbsp;<i class="fa fa-facebook"></i>&nbsp;
			</a>
			<a
				class="btn btn-info"
				href="https://twitter.com/tkpmizik"
				target="_blank"
				title="Twitter {{ config('site.name') }}">
				<i class="fa fa-twitter"></i>
			</a>
		</p>
		<p>
			<a
				class="btn btn-primary"
				href="https://www.facebook.com/tikwenpam"
				target="_blank"
				title="Facebook {{ config('site.company') }}">
				&nbsp;<i class="fa fa-facebook"></i>&nbsp;
			</a>
			<a
				class="btn btn-info"
				href="https://twitter.com/tikwenpam"
				target="_blank"
				title="Twitter {{ config('site.company') }}">
				<i class="fa fa-twitter"></i>
			</a>
			<a
				class="btn btn-danger"
				href="https://google.com/+TiKwenPam"
				target="_blank"
				title="Google+ {{ config('site.company') }}">
				<i class="fa fa-google-plus"></i>
			</a>
			<a
				class="btn btn-default bg-warning"
				href="https://instagram.com/tikwenpam"
				target="_blank"
				title="Instagram {{ config('site.company') }}">
				<i class="fa fa-instagram"></i>
			</a>
		</p>
	</div>
	<div class="col-sm-6 text-right">
		<hr class="visible-xs">
		<p>
			{{ config('site.name') }} &copy; 2012 - {{ date('Y')  }}
		</p>
		<p>
			Yon s&egrave;vis konpayi
			<a
				href="https://tikwenpam.net"
				target="blank"
				class="white">Ti Kwen Pam
			</a>
		</p>
		<p>
			Devlope pa
			<a
				href="{{ config('site.developer.website')}}"
				title="{{ config('site.developer.name')}}"
				class="text-warning"
				target="_blank">{{ config('site.developer.name')}}
			</a>
		</p>
	</div>
</div>
