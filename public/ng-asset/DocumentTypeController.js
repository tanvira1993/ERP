/* Setup blank page controller */
angular.module('ErpApp').controller('DocumentTypeController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
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

    $scope.createDocumentType = function(){

            toastr.info("'info', 'Loading!', 'Please wait.'")
            $http({
                method: 'post',
                url: 'api/createDocumentType',
                data:$scope.documentTypeInfo
            }).then(function (response) {
                $scope.documentTypeInfo=null;
                toastr.success("Document Type Created..!!")                           
            }, function (response) {
                swal({
                    title: response.data.heading,
                    text: response.data.message,
                    html:true,
                    type: 'error'
                }); 
                toastr.error("Document Type could not be Created!!")
            });

        }

    initSelect2Dropdown();   

        
    });
}]);
