/* Setup blank page controller */
angular.module('ErpApp').controller('PrReleaseApproveStateController', ['$scope', '$rootScope', '$location', '$timeout', '$http','$window', function($scope, $rootScope, $location, $timeout, $http,$window) {
	$scope.$on('$viewContentLoaded', function() {
		
		

		$scope.prApprove = function(pr_id, l1,l2,l3,l4){
			
			toastr.info("'info', 'Loading!', 'Please wait.'")
			$http({
				method: 'post',
				url: 'api/prApprove/'+ pr_id +'/' + l1+'/' + l2+'/' + l3+'/' + l4,
			}).then(function (response) {
				toastr.success("Approved..!!")
				$rootScope.getApproverList1();
				$rootScope.getApproverList2();
				$rootScope.getApproverList3();
				$rootScope.getApproverList4();
				// $window.location.reload();
			}, function (response) {
				swal({
					title: response.data.heading,
					text: response.data.message,
					html:true,
					type: 'error'
				}); 
				toastr.error("Not Approved..!!")
			});

		}


		$scope.prReject = function(pr_id, l1,l2,l3,l4){
			
			toastr.info("'info', 'Loading!', 'Please wait.'")
			$http({
				method: 'post',
				url: 'api/prReject/'+ pr_id +'/' + l1+'/' + l2+'/' + l3+'/' + l4,
			}).then(function (response) {
				toastr.success("Receted..!!")
				$rootScope.getApproverList1();
				$rootScope.getApproverList2();
				$rootScope.getApproverList3();
				$rootScope.getApproverList4();
				// $window.location.reload();
			}, function (response) {
				swal({
					title: response.data.heading,
					text: response.data.message,
					html:true,
					type: 'error'
				}); 
				toastr.error("Not Rejected..!!")
			});

		}



	});
}]);
