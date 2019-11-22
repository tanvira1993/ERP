/* Setup blank page controller */
angular.module('ErpApp').controller('VendorReportController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
		
		$scope.filteredTodosG = []
		,$scope.currentPageG = 1
		,$scope.numPerPageG = 1
		,$scope.maxSizeG = 5;
		
		$scope.getAllConsumeGoodLists = function(){

			$http({
				method: 'get',
				url: 'api/getAllConsumeGoodLists',
			}).then(function (response) {
				$scope.consumeLists = response.data.data;

				$scope.$watch('currentPageG + numPerPageG', function() {
					var begin = (($scope.currentPageG - 1) * $scope.numPerPageG)
					, end = begin + $scope.numPerPageG;

					$scope.filteredTodosG = $scope.consumeLists.slice(begin, end);
				});

			}, function (response) {				
			});

		}
		$scope.getAllConsumeGoodLists();
	});
}]);
