/* Setup blank page controller */
angular.module('ErpApp').controller('AllRequsitionRejectListController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
        // initialize core components
         $scope.getPrAllRejectList = function(){

 			$http({
 				method: 'get',
 				url: 'api/getPrAllRejectList',
 			}).then(function (response) {
 				$scope.prRejectList= response.data.data;

 			}, function (response) {


 			});
 
 		}
 		$scope.getPrAllRejectList();
    });
}]);
