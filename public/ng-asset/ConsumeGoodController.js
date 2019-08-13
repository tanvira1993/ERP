/* Setup blank page controller */
angular.module('ErpApp').controller('ConsumeGoodController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
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

	$scope.createConsumeGood = function(){

        	toastr.info("'info', 'Loading!', 'Please wait.'")
        	$http({
        		method: 'post',
        		url: 'api/createConsumeGood',
        		data:$scope.consumeGoodInfo
        	}).then(function (response) {
        		$scope.consumeGoodInfo=null;
        		toastr.success("Consume Good Issued..!!")         		       		
        	}, function (response) {
        		swal({
        			title: response.data.heading,
        			text: response.data.message,
        			html:true,
        			type: 'error'
        		}); 
        		toastr.error("Consume Good could not be Issued!!")
        	});

        }

	initSelect2Dropdown();   

        
    });
}]);
