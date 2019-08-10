/* Setup blank page controller */
angular.module('ErpApp').controller('UtilityBillPostController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
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

	$scope.createUtilityBillPost = function(){

        	toastr.info("'info', 'Loading!', 'Please wait.'")
        	$http({
        		method: 'post',
        		url: 'api/createUtilityBillPost',
        		data:$scope.utilityBillPostInfo
        	}).then(function (response) {
        		$scope.utilityBillPostInfo=null;
        		toastr.success("Utility Bill Post Created..!!")         		       		
        	}, function (response) {
        		swal({
        			title: response.data.heading,
        			text: response.data.message,
        			html:true,
        			type: 'error'
        		}); 
        		toastr.error("Utility Bill Post could not be Created!!")
        	});

        }

	initSelect2Dropdown();   

        
    });
}]);
