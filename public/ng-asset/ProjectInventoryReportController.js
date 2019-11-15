/* Setup blank page controller */
angular.module('ErpApp').controller('ProjectInventoryReportController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
		
		$scope.filteredTodosG = []
		,$scope.currentPage1 = 1
		,$scope.numPerPage = 8
		,$scope.maxSize = 5;
		$scope.getAllGoodReceiveLists = function(){

			$http({
				method: 'get',
				url: 'api/getAllGoodReceiveLists',
			}).then(function (response) {
				$scope.goodReceiveLists = response.data.data;
				$scope.$watch('currentPage1 + numPerPage', function() {
					var begin1 = (($scope.currentPage1 - 1) * $scope.numPerPage)
					, end = begin1 + $scope.numPerPage;

					$scope.filteredTodosG = $scope.goodReceiveLists.slice(begin1, end);
				});

			}, function (response) {				
			});

		}
		$scope.getAllGoodReceiveLists();

	});
}]);
