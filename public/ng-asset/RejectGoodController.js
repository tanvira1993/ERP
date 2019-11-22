/* Setup blank page controller */
angular.module('ErpApp').controller('RejectGoodController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
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

        $scope.createRejectGood = function(){

        	toastr.info("'info', 'Loading!', 'Please wait.'")
        	$http({
        		method: 'post',
        		url: 'api/createRejectGood',
        		data:$scope.rejectGoodInfo
        	}).then(function (response) {
        		$scope.rejectGoodInfo=null;
        		toastr.success("Good Rejected..!!")         		       		
        	}, function (response) {
        		swal({
        			title: response.data.heading,
        			text: response.data.message,
        			html:true,
        			type: 'error'
        		}); 
        		toastr.error("Could not be Done!!")
        	});

        }

        $scope.rejectMaterialList = function(){

        	$http({
        		method: 'get',
        		url: 'api/getMaterialListByScrap',
        	}).then(function (response) {
        		$scope.rejectMaterialList = response.data.data;

        	}, function (response) {                
        	});

        }
        $scope.rejectMaterialList();

        initSelect2Dropdown();   


    });
}]);
