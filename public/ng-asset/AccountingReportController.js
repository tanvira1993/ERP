/* Setup blank page controller */
angular.module('ErpApp').controller('AccountingReportController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
		
		$scope.filteredTodosG = []
		,$scope.currentPageG = 1
		,$scope.numPerPageG = 1
		,$scope.maxSizeG = 5;

		$scope.getRejectGoodsLists = function(){

			$http({
				method: 'get',
				url: 'api/getRejectGoodsLists',
			}).then(function (response) {
				$scope.scrapLists = response.data.data;

				$scope.$watch('currentPageG + numPerPageG', function() {
					var begin = (($scope.currentPageG - 1) * $scope.numPerPageG)
					, end = begin + $scope.numPerPageG;

					$scope.filteredTodosG = $scope.scrapLists.slice(begin, end);
				});

			}, function (response) {				
			});

		}
		$scope.getRejectGoodsLists();


	});
}]);
