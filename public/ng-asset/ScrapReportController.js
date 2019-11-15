
/* Setup blank page controller */
angular.module('ErpApp').controller('ScrapReportController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
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

        
        $rootScope.getAllProjectListByLeader = function(){

        	$http({
        		method: 'get',
        		url: 'api/getEmployer',
        	}).then(function (response) {
        		$rootScope.getEmployer = response.data.data;

        	}, function (response) {


        	});

        }
        $rootScope.getAllProjectListByLeader();

        initSelect2Dropdown();  
    });
}]);
