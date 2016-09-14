angular.module('app')

.controller('UploadController', ['$scope', 'Upload', function ($scope, Upload) {
	// upload later on form submit or something similar
	$scope.description = '';
	$scope.pbWidth = 0;

	$scope.submit = function() {
		console.log($scope.category);
		if ($scope.form.$valid) {
			console.log($scope.image, $scope.music);
			$scope.upload($scope.image, $scope.music);
		}
	};
	// upload on file select or drop
	$scope.upload = function (image, music) {
		$scope.showPB = false;
		$scope.uploading = true;

		Upload.upload({
			url: window.location.href,
			data: {
				name: $scope.name,
				artist: $scope.artist,
				category: $scope.category,
				image: image,
				music: music,
				description: $scope.description

			}
		}).then(function (resp) {
				console.log(resp.data);
				window.location.href = resp.data.url;
			}, function (resp) {
				console.log('Error status: ' + resp.status);
				$scope.errors = resp.data;
				$scope.showErrors = true;
			}, function (evt) {
				$scope.showPB = true;
				$scope.pbWidth = parseInt(100.0 * evt.loaded / evt.total);
				console.log('progress: ' + $scope.pbWidth + '% ');
			}
		);
	};
}]);