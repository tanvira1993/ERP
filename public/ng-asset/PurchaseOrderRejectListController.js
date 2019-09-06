/* Setup blank page controller */
angular.module('ErpApp').controller('PurchaseOrderRejectListController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
        // initialize core components
        $scope.getPoRejectListById = function(){

        	$http({
        		method: 'get',
        		url: 'api/getPoRejectListById',
        	}).then(function (response) {
        		$scope.purchaseOrderRejectListById= response.data.data;

        	}, function (response) {


        	});

        }
        $scope.getPoRejectListById();
    });
}]);
