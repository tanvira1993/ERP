/* Setup blank page controller */
angular.module('ErpApp').controller('AdvancePaymentController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
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

    $scope.createAdvancePayment = function(){

            toastr.info("'info', 'Loading!', 'Please wait.'")
            $http({
                method: 'post',
                url: 'api/createAdvancePayment',
                data:$scope.advancePaymentInfo
            }).then(function (response) {
                $scope.advancePaymentInfo=null;
                toastr.success("Advance Payment Info Created..!!")                           
            }, function (response) {
                swal({
                    title: response.data.heading,
                    text: response.data.message,
                    html:true,
                    type: 'error'
                }); 
                toastr.error("Advance Payment Info could not be Created!!")
            });

        }

    initSelect2Dropdown();   

        
    });
}]);
