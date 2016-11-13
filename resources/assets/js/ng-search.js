angular.module('app')

.controller('searchController', ['$scope', '$http', function($scope, $http) {
	$scope.results = [];
	$scope.type = '';
	$scope.noResults = false;

	$scope.noResultsText = function() {
		return 'Pa gen rezilta pou "' + $scope.searchTerm + '"';
	};

	$scope.search = function( withType ) {
		if ( $scope.searchTerm.length > 2 ) {
			$scope.loading = true;
			$scope.noResults = false;

			$http.get('/cheche?q=' + $scope.searchTerm + '&type=' + $scope.type)
				.then(function( response ) {
					var data = [];

					// console.log( response );

					data = ( withType ) ? response.data.data : response.data;

					if ( data.length ) {
						$scope.results = data;
						$scope.loading = false;
					} else {
						$scope.results = [];
						$scope.noResults = true;
						$scope.loading = false;
					}
				}, function( error ) {
					console.log( error );
				});
		} else {
			$scope.results = [];
			$scope.noResults = false;
		}

		$scope.setType = function( type ) {
			var withType = type.length ? true : false;

			$scope.type = type;
			$scope.search( withType );
		};
	};
}]);