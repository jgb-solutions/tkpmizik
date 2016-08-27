<p>@include('search-form')</p>

<table class="noTextCenter table table-striped table-hover table-bordered table-condensed"
	ng-show="results.length">
	<tbody id="searchResults">
		<tr ng-repeat="item in results">
			<td>
				<strong>
					<i class="fa fa-@{{ item.icon }}"></i>
					<a href="@{{ item.url }}" ng-bind="item.name"></a>
				</strong>
			</td>
			<td>
				<i class="fa fa-eye"></i>
				<strong ng-bind="item.views"></strong>
			</td>
			<td>
				<i class="fa fa-download"></i>
				<strong ng-bind="item.download"></strong>
			</td>
		</tr>
	</tbody>
</table>
<div class="row bg-info">
	<h3 class="text-center" ng-show="noResults" ng-bind="noResultsText()"></h3>
</div>