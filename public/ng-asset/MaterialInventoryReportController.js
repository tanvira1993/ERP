/* Setup blank page controller */
angular.module('ErpApp').controller('MaterialInventoryReportController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
		

		$scope.materialReportBasedOnMaterial = function(){

			$http({
				method: 'get',
				url: 'api/materialReportBasedOnMaterial',
			}).then(function (response) {
				$scope.materialReportOnMaterial = response.data.data;

			}, function (response) {				
			});

		}
		$scope.materialReportBasedOnMaterial();

	});
}]);
