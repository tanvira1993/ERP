/* Setup blank page controller */
angular.module('ErpApp').controller('GoodReceiveController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
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

        $scope.createGoodReceive = function(){

        	toastr.info("'info', 'Loading!', 'Please wait.'")
        	$http({
        		method: 'post',
        		url: 'api/createGoodReceive',
        		data:$scope.goodReceiveInfo
        	}).then(function (response) {
        		$scope.goodReceiveInfo=null;
        		toastr.success("Good Receive Done..!!")         		       		
        	}, function (response) {
        		swal({
        			title: response.data.heading,
        			text: response.data.message,
        			html:true,
        			type: 'error'
        		}); 
        		toastr.error("Good Receive could not be Done!!")
        	});

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
