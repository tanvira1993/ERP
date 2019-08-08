angular.module('ErpApp').controller('CustomerListController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
        // initialize core components
        

        $rootScope.getAllCustomerList();        
    });
}]);