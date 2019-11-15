/* Setup blank page controller */
angular.module('ErpApp').controller('StockReportController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
        // initialize core components

        const initSelect2Dropdown = function () {
        	$timeout(function () {
        		$(".select2dropdown").select2({
        			placeholder: null,
        			width: '100%'
        		});
        	}, 500);
        }

        $scope.stockReportPrint = function(id){
        	$http({
        		method: 'get',
        		url: 'api/singleStockReport/' +id,
        	}).then(function (response) {
        		$rootScope.stockReport = response.data.data;

        	}, function (response) {


        	});
        }


        $rootScope.getAllProjectListByEID = function(id){
        	console.log(id)
        	$http({
        		method: 'get',
        		url: 'api/getEmployerOrEmployeeList/' +id,
        	}).then(function (response) {
        		$rootScope.getEmployerOrEmployee = response.data.data;

        	}, function (response) {


        	});

        }
        initSelect2Dropdown(); 
        
    });
}]);