angular.module('ErpApp').controller('PurchaseOrderListController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
        // initialize core components

        $scope.purchaseOrderList = function(){

        	$http({
        		method: 'get',
        		url: 'api/purchaseOrderList',
        	}).then(function (response) {
                $scope.purchaseOrderList = response.data.data;

            }, function (response) {				
            });

        }

        $scope.purchaseOrderListById = function(){

        	$http({
        		method: 'get',
        		url: 'api/purchaseOrderListById',
        	}).then(function (response) {
                $scope.purchaseOrderListById = response.data.data;

            }, function (response) {				
            });

        }

        $scope.purchaseOrderListById();
        // $scope.purchaseOrderList();        
    });
}]);