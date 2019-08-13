/* Setup blank page controller */
angular.module('ErpApp').controller('OwnInvestmentController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
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

	$scope.createOwnInvestment = function(){

        	toastr.info("'info', 'Loading!', 'Please wait.'")
        	$http({
        		method: 'post',
        		url: 'api/createOwnInvestment',
        		data:$scope.ownInvestmentInfo
        	}).then(function (response) {
        		$scope.ownInvestmentInfo=null;
        		toastr.success("Own Investment Info Created..!!")         		       		
        	}, function (response) {
        		swal({
        			title: response.data.heading,
        			text: response.data.message,
        			html:true,
        			type: 'error'
        		}); 
        		toastr.error("Own Investment Info could not be Created!!")
        	});

        }

	initSelect2Dropdown();   

        
    });
}]);
