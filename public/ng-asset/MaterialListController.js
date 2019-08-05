/* Setup blank page controller */
angular.module('ErpApp').controller('MaterialListController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
        // initialize core components


        $rootScope.getAllMaterialList();        
    });
}]);
