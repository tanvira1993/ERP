/* Setup blank page controller */
angular.module('ErpApp').controller('AllPurchaseOrderListController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
        // initialize core components
        
        $scope.purchaseOrderList = function(){

        	$http({
        		method: 'get',
        		url: 'api/getAllPurchaseOrderLists',
        	}).then(function (response) {
        		$scope.purchaseOrderList = response.data.data;

        	}, function (response) {				
        	});

        }
        $scope.purchaseOrderList();        
        
    });
}]);
