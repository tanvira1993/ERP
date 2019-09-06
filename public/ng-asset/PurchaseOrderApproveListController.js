/* Setup blank page controller */
angular.module('ErpApp').controller('PurchaseOrderApproveListController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
        // initialize core components
        $scope.getPoApprovedListById = function(){

        	$http({
        		method: 'get',
        		url: 'api/getPoApprovedListById',
        	}).then(function (response) {
        		$scope.poApprovedListById= response.data.data;

        	}, function (response) {


        	});

        }
        $scope.getPoApprovedListById();
    });
}]);
