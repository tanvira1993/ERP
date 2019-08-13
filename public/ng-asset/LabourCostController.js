/* Setup blank page controller */
angular.module('ErpApp').controller('LabourCostController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
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

    $scope.createLabourCost = function(){

            toastr.info("'info', 'Loading!', 'Please wait.'")
            $http({
                method: 'post',
                url: 'api/createLabourCost',
                data:$scope.labourCostInfo
            }).then(function (response) {
                $scope.labourCostInfo=null;
                toastr.success("Labour Cost Info Created..!!")                           
            }, function (response) {
                swal({
                    title: response.data.heading,
                    text: response.data.message,
                    html:true,
                    type: 'error'
                }); 
                toastr.error("Labour Cost Info could not be Created!!")
            });

        }

    initSelect2Dropdown();   

        
    });
}]);
