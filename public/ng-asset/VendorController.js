angular.module('ErpApp').controller('VendorController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
        // initialize core components
              $scope.createVendor = function(){

        	toastr.info("'info', 'Loading!', 'Please wait.'")
        	$http({
        		method: 'post',
        		url: 'api/createVendor',
        		data:$scope.vendorInfo
        	}).then(function (response) {
        		$scope.vendorInfo=null;
        		toastr.success("Vendor Created..!!")         		       		
        	}, function (response) {
        		swal({
        			title: response.data.heading,
        			text: response.data.message,
        			html:true,
        			type: 'error'
        		}); 
        		toastr.error("Vendor could not be Created!!")
        	});

        } 
    });
}]);
