/* Setup blank page controller */
angular.module('ErpApp').controller('RequsitionApproveListController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
        // initialize core components
         		$scope.getPRApprovedListById = function(){

 			$http({
 				method: 'get',
 				url: 'api/getPRApprovedListById',
 			}).then(function (response) {
 				$scope.prApprovedListById= response.data.data;

 			}, function (response) {


 			});

 		}
 		$scope.getPRApprovedListById();
    });
}]);
