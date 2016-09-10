<form role="searach" action="{{ TKPM::route('search') }}" id="mainSearchForm" class="mainSearchForm">
	<div class="input-group">
		<input
			id="q"
			name="q"
			type="text"
			class="form-control"
			placeholder="Chèche Mizik ak Videyo"
			ng-model="searchTerm"
			ng-init="searchTerm = '{{ Request::get('q') }}'"
			ng-change="search()"
			autocomplete="off">
		<input id="typeInput" type="hidden" name="type" value="">
		<span class="input-group-btn">
			<button class="btn btn-success" type="submit">
				<i class="fa fa-search fa-2x" ng-hide="loading"></i>
				<i class="fa fa-spinner fa-spin fa-2x" ng-show="loading"></i>
			</button>
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
			</button>
		       <ul class="dropdown-menu dropdown-menu-right" role="menu">
				<li>
					<a href="" ng-click="setType('music')">
						<i class="fa fa-music"></i>
						Chèche Mizik Sèlman
					</a>
				</li>
				<li>
					<a href="" ng-click="setType('video')">
						<i class="fa fa-video-camera"></i>
						Chèche Videyo Sèlman
					</a>
				</li>
				<li class="divider"></li>
				<li>
					<a href="" ng-click="setType('')">
						<i class="fa fa-search"></i>
						Chèche Mizik ak Videyo
					</a>
				</li>
		       </ul>
		</span>
	</div>
</form>