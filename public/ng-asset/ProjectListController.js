/* Setup blank page controller */
angular.module('ErpApp').controller('ProjectListController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
        // initialize core components


        $scope.filteredTodos = []
        ,$scope.currentPage = 1
        ,$scope.numPerPage = 8
        ,$scope.maxSize = 5;
        $scope.getAllProjectListLocal = function(){

        	$http({
        		method: 'get',
        		url: 'api/projectList',
        	}).then(function (response) {
        		$scope.projectListLocal = response.data.data;
        		$scope.$watch('currentPage + numPerPage', function() {
        			let begin = (($scope.currentPage - 1) * $scope.numPerPage)
        			, end = begin + $scope.numPerPage;

        			$scope.filteredTodos = $scope.projectListLocal.slice(begin, end);
                    console.log($scope.filteredTodos)
                    console.log($scope.projectListLocal.length)
                    
                });

        	}, function (response) {

        	});

        }

        $scope.getAllProjectListLocal();  
    });
}]);
