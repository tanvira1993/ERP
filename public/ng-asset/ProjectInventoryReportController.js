/* Setup blank page controller */
angular.module('ErpApp').controller('ProjectInventoryReportController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
		
		
		$scope.getAllGoodReceiveLists = function(){

			$http({
				method: 'get',
				url: 'api/getAllGoodReceiveLists',
			}).then(function (response) {
				$scope.goodReceiveLists = response.data.data;

			}, function (response) {				
			});

		}
		$scope.getAllGoodReceiveLists();

	});
}]);
