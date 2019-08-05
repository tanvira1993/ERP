/* Setup blank page controller */
angular.module('ErpApp').controller('MaterialController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
        // initialize core components
        $scope.createMaterial = function(){

        	toastr.info("'info', 'Loading!', 'Please wait.'")
        	$http({
        		method: 'post',
        		url: 'api/createMaterial',
        		data:$scope.materialInfo
        	}).then(function (response) {
        		$scope.materialInfo=null;
        		toastr.success("Material Created..!!")         		       		
        	}, function (response) {
        		swal({
        			title: response.data.heading,
        			text: response.data.message,
        			html:true,
        			type: 'error'
        		}); 
        		toastr.error("Material could not be Created!!")
        	});

        }

    });
}]);
