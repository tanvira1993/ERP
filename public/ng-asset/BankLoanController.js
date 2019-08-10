/* Setup blank page controller */
angular.module('ErpApp').controller('BankLoanController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
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

	$scope.createBankLoan = function(){

        	toastr.info("'info', 'Loading!', 'Please wait.'")
        	$http({
        		method: 'post',
        		url: 'api/createBankLoan',
        		data:$scope.bankLoanInfo
        	}).then(function (response) {
        		$scope.bankLoanInfo=null;
        		toastr.success("Bank Loan Created..!!")         		       		
        	}, function (response) {
        		swal({
        			title: response.data.heading,
        			text: response.data.message,
        			html:true,
        			type: 'error'
        		}); 
        		toastr.error("Bank Loan could not be Created!!")
        	});

        }

	initSelect2Dropdown();   

        
    });
}]);
