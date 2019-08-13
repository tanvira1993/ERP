/* Setup blank page controller */
angular.module('ErpApp').controller('ProjectSellController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
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

	$scope.createProjectSell = function(){

        	toastr.info("'info', 'Loading!', 'Please wait.'")
        	$http({
        		method: 'post',
        		url: 'api/createProjectSell',
        		data:$scope.projectSellInfo
        	}).then(function (response) {
        		$scope.projectSellInfo=null;
        		toastr.success("Project Sold..!!")         		       		
        	}, function (response) {
        		swal({
        			title: response.data.heading,
        			text: response.data.message,
        			html:true,
        			type: 'error'
        		}); 
        		toastr.error("Project could not be Sold!!")
        	});

        }

	initSelect2Dropdown();   

        
    });
}]);
