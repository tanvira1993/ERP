/* Setup blank page controller */
angular.module('ErpApp').controller('MaterialListController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
        // initialize core components
        
        
        $scope.getAllMaterialListLocal = function(){

        	$http({
        		method: 'get',
        		url: 'api/materialList',
        	}).then(function (response) {
        		$scope.materialListLocal = response.data.data;


            }, function (response) {

            });

        }



        $scope.getAllMaterialListLocal();
        // $rootScope.getAllMaterialList();        
    });
}]);


