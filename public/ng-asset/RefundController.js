/* Setup blank page controller */
angular.module('ErpApp').controller('RefundController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
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

        $scope.createRefundGood = function(){

        	toastr.info("'info', 'Loading!', 'Please wait.'")
        	$http({
        		method: 'post',
        		url: 'api/createRefund',
        		data:$scope.transferGoodInfo
        	}).then(function (response) {
        		$scope.transferGoodInfo=null;
        		toastr.success("Refund Done..!!")         		       		
        	}, function (response) {
        		swal({
        			title: response.data.heading,
        			text: response.data.message,
        			html:true,
        			type: 'error'
        		}); 
        		toastr.error("Refund could not be Created!!")
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

        initSelect2Dropdown();   
        $rootScope.getAllProjectListByLeader();

    });
}]);
