/* Setup blank page controller */
angular.module('ErpApp').controller('MaterialInventoryReportController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
		$scope.filteredTodosKKK = []
		,$scope.currentPageKKK = 1
		,$scope.numPerPageKKK = 8
		,$scope.maxSizeKKK = 5;
		$scope.materialReportBasedOnMaterial = function(){

			$http({
				method: 'get',
				url: 'api/materialReportBasedOnMaterial',
			}).then(function (response) {
				$scope.materialReportOnMaterial = response.data.data;
				$scope.$watch('currentPageKKK + numPerPageKKK', function() {
					let beginKKK = (($scope.currentPageKKK - 1) * $scope.numPerPageKKK)
					, end = beginKKK + $scope.numPerPageKKK;

					$scope.filteredTodosKKK = $scope.materialReportOnMaterial.slice(beginKKK, end);
					console.log($scope.filteredTodosKKK)
					console.log($scope.materialReportOnMaterial.length)
				});
			}, function (response) {				
			});

		}


		$scope.materialReportBasedOnMaterial();





	});
}]);
