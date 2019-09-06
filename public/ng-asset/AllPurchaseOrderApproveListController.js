/* Setup blank page controller */
angular.module('ErpApp').controller('AllPurchaseOrderApproveListController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
        // initialize core components
        $scope.getPoApprovedList = function(){

        	$http({
        		method: 'get',
        		url: 'api/getPoApprovedList',
        	}).then(function (response) {
        		$scope.purchaseOrderApprovedList= response.data.data;

        	}, function (response) {


        	});

        }
        $scope.getPoApprovedList();
    });
}]);
