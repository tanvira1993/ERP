/* Setup blank page controller */
angular.module('ErpApp').controller('GoodSellController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
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

	$scope.createGoodSell = function(){

        	toastr.info("'info', 'Loading!', 'Please wait.'")
        	$http({
        		method: 'post',
        		url: 'api/createGoodSell',
        		data:$scope.goodSellInfo
        	}).then(function (response) {
        		$scope.goodSellInfo=null;
        		toastr.success("Good Sold..!!")         		       		
        	}, function (response) {
        		swal({
        			title: response.data.heading,
        			text: response.data.message,
        			html:true,
        			type: 'error'
        		}); 
        		toastr.error("Good could not be Sold!!")
        	});

        }

	initSelect2Dropdown();   

        
    });
}]);
