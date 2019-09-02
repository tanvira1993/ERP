/* Setup blank page controller */
angular.module('ErpApp').controller('RequsitionRejectListController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
        // initialize core components
        $scope.getPrRejectListById = function(){

 			$http({
 				method: 'get',
 				url: 'api/getPrRejectListById',
 			}).then(function (response) {
 				$scope.prRejectListById= response.data.data;

 			}, function (response) {


 			});
 
 		}
 		$scope.getPrRejectListById();
    });
}]);
