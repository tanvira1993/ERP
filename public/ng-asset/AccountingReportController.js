/* Setup blank page controller */
angular.module('ErpApp').controller('AccountingReportController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
		

		$scope.getRejectGoodsLists = function(){

			$http({
				method: 'get',
				url: 'api/getRejectGoodsLists',
			}).then(function (response) {
				$scope.scrapLists = response.data.data;

			}, function (response) {				
			});

		}
		$scope.getRejectGoodsLists();


	});
}]);
