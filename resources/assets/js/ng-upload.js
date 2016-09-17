angular.module('app')

.controller('UploadController', ['$scope', 'Upload', '$http', function ($scope, Upload, $http) {
	$scope.data = {
		description: ''
	};

	$scope.pbWidth = 0;

	$scope.showUploadFormAndReset = function() {
		$scope.uploading = false;
		$scope.uploadSuccess = false;

		var category = $scope.data.category;
		$scope.data = {
			category: category,
			description: ''
		};
	};

	$scope.showUploadForm = function() {
		$scope.uploading = false;
		$scope.tryAgain = false;
		$scope.showPB = false;
		$scope.showErrors = false;
	}

	$scope.uploadMusic = function() {
		console.log($scope.data);

		$scope.upload($scope.data);
	};

	$scope.emailAndTweet = function(data) {
		$http.post(data.emailAndTweetUrl, {id: data.id})
			.then(function(response) {
				console.log(response)
				$scope.emailedAndTweeted = true;
			}, function(error) {
				console.log(error);
			});
	}

	$scope.upload = function (image, music) {
		$scope.uploading = true;
		$scope.uploadSuccess = false;
		$scope.tryAgain = false;

		Upload.upload({
			url: window.location.href,
			data: $scope.data
		})
		.then(function (response) {
				console.log(response.data);
				// window.location.href = response.data.url;
				$scope.tryAgain = false;
				$scope.uploadSuccess = true;
				$scope.uploadedMusic = response.data;
				$scope.emailAndTweet(response.data);
			}, function (response) {
				console.log(response.data);
				$scope.errors = response.data;
				$scope.showErrors = true;
				$scope.tryAgain = true;
			}, function (evt) {
				$scope.showPB = true;
				$scope.pbWidth = parseInt(100.0 * evt.loaded / evt.total);
				console.log('progress: ' + $scope.pbWidth + '% ');
			}
		);
	};
}]);