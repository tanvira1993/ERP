/* Setup blank page controller */
angular.module('ErpApp').controller('ProjectInventoryReportController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
		
		
		$scope.materialReportBasedOnProject = function(){

			$http({
				method: 'get',
				url: 'api/materialReportBasedOnProject',
			}).then(function (response) {
				$scope.materialReportOnProject = response.data.data;

			}, function (response) {				
			});

		}
		$scope.materialReportBasedOnProject();

	});
}]);
