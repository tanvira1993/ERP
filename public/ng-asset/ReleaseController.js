/* Setup blank page controller */
angular.module('ErpApp').controller('ReleaseController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
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

        $scope.getAllUserId= function ()
        {
        	$http({
        		method: 'get',
        		url: 'api/getAllUserId',
        	}).then(function (response) {
        		$rootScope.usersList= response.data.data;
        	}, 
        	function (response) {				

        	});
        }

        $scope.getAlldocumentList= function ()
        {
            $http({
                method: 'get',
                url: 'api/getAlldocumentList',
            }).then(function (response) {
                $rootScope.documentList= response.data.data;
            }, 
            function (response) {               

            });
        }

        $scope.createRelease = function(){

            toastr.info("'info', 'Loading!', 'Please wait.'")
            $http({
                method: 'post',
                url: 'api/createRelease',
                data:$scope.releaseInfo
            }).then(function (response) {
                $scope.releaseInfo=null;
                toastr.success("Release Strategy set..!!")                           
            }, function (response) {
                swal({
                    title: response.data.heading,
                    text: response.data.message,
                    html:true,
                    type: 'error'
                }); 
                toastr.error("Release Strategy could not be Set!!")
            });

        }
        $scope.getAlldocumentList();
        $scope.getAllUserId();        
        initSelect2Dropdown();   

    });
}]);
