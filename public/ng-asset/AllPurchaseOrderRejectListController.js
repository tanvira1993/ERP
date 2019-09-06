/* Setup blank page controller */
angular.module('ErpApp').controller('AllPurchaseOrderRejectListController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
        // initialize core components
        $scope.getPoRejectList = function(){

        	$http({
        		method: 'get',
        		url: 'api/getPoRejectList',
        	}).then(function (response) {
        		$scope.purchaseOrderRejectList= response.data.data;

        	}, function (response) {


        	});

        }
        $scope.getPoRejectList();
    });
}]);
