/* Setup blank page controller */
angular.module('ErpApp').controller('MaterialListController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
        // initialize core components
        
        $scope.filteredTodosM = []
        ,$scope.currentPageM = 1
        ,$scope.numPerPageM = 8
        ,$scope.maxSizeM = 5;
        $scope.getAllMaterialListLocal = function(){

        	$http({
        		method: 'get',
        		url: 'api/materialList',
        	}).then(function (response) {
        		$scope.materialListLocal = response.data.data;
                $scope.$watch('currentPageM + numPerPageM', function() {
                    let beginM = (($scope.currentPageM - 1) * $scope.numPerPageM)
                    , end = beginM + $scope.numPerPageM;

                    $scope.filteredTodosM = $scope.materialListLocal.slice(beginM, end);
                });

            }, function (response) {

            });

        }



        $scope.getAllMaterialListLocal();
        // $rootScope.getAllMaterialList();        
    });
}]);


