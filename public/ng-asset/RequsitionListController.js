angular.module('ErpApp').controller('RequsitionListController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
        // initialize core components
        

        // $rootScope.getAllCustomerList();  
        $scope.requsitionList = function(){

        	$http({
        		method: 'get',
        		url: 'api/requsitionList',
        	}).then(function (response) {
        	}, function (response) {				
        	});

        }

        $scope.requsitionListById = function(){

        	$http({
        		method: 'get',
        		url: 'api/requsitionListById',
        	}).then(function (response) {
        	}, function (response) {				
        	});

        }

        $scope.requsitionListById();
        $scope.requsitionList();        
    });
}]);