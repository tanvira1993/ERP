/* Setup blank page controller */
angular.module('ErpApp').controller('ProjectController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
        // initialize core components
        $scope.createProject = function(){

        	toastr.info("'info', 'Loading!', 'Please wait.'")
        	$http({
        		method: 'post',
        		url: 'api/createProject',
        		data:$scope.projectInfo
        	}).then(function (response) {
        		$scope.projectInfo=null;
        		toastr.success("Project Created..!!")         		       		
        	}, function (response) {
        		swal({
        			title: response.data.heading,
        			text: response.data.message,
        			html:true,
        			type: 'error'
        		}); 
        		toastr.error("Project could not be Created!!")
        	});

        }
    });
}]);