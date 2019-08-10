/* Setup blank page controller */
angular.module('ErpApp').controller('TransferGoodController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
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

	$scope.createTransferGood = function(){

        	toastr.info("'info', 'Loading!', 'Please wait.'")
        	$http({
        		method: 'post',
        		url: 'api/createTransferGood',
        		data:$scope.transferGoodInfo
        	}).then(function (response) {
        		$scope.transferGoodInfo=null;
        		toastr.success("Transfer Good Done..!!")         		       		
        	}, function (response) {
        		swal({
        			title: response.data.heading,
        			text: response.data.message,
        			html:true,
        			type: 'error'
        		}); 
        		toastr.error("Transfer Good could not be Created!!")
        	});

        }

	initSelect2Dropdown();   

        
    });
}]);
