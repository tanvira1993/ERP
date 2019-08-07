angular.module('ErpApp').controller('CustomerController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
        // initialize core components
              $scope.createCustomer = function(){

        	toastr.info("'info', 'Loading!', 'Please wait.'")
        	$http({
        		method: 'post',
        		url: 'api/createCustomer',
        		data:$scope.customerInfo
        	}).then(function (response) {
        		$scope.customerInfo=null;
        		toastr.success("Customer Created..!!")         		       		
        	}, function (response) {
        		swal({
        			title: response.data.heading,
        			text: response.data.message,
        			html:true,
        			type: 'error'
        		}); 
        		toastr.error("Customer could not be Created!!")
        	});

        } 
    });
}]);
