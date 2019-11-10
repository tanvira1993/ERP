/* Setup blank page controller */
angular.module('ErpApp').controller('VendorReportController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
		

		
		$scope.getAllConsumeGoodLists = function(){

			$http({
				method: 'get',
				url: 'api/getAllConsumeGoodLists',
			}).then(function (response) {
				$scope.consumeLists = response.data.data;

			}, function (response) {				
			});

		}
		$scope.getAllConsumeGoodLists();
	});
}]);
