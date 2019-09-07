/* Setup blank page controller */
angular.module('ErpApp').controller('PoReleaseApproveStateController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
		$scope.poApprove = function(po_id, l1,l2,l3,l4){
			
			toastr.info("'info', 'Loading!', 'Please wait.'")
			$http({
				method: 'post',
				url: 'api/poApprove/'+ po_id +'/' + l1+'/' + l2+'/' + l3+'/' + l4,
			}).then(function (response) {
				toastr.success("PO Approved..!!")
				$rootScope.getPOApproverList1();
				$rootScope.getPOApproverList2();
				$rootScope.getPOApproverList3();
				$rootScope.getPOApproverList4();
				// $window.location.reload();
			}, function (response) {
				swal({
					title: response.data.heading,
					text: response.data.message,
					html:true,
					type: 'error'
				}); 
				toastr.error("PO Not Approved..!!")
			});

		}


		$scope.poReject = function(po_id, l1,l2,l3,l4){
			
			toastr.info("'info', 'Loading!', 'Please wait.'")
			$http({
				method: 'post',
				url: 'api/poReject/'+ po_id +'/' + l1+'/' + l2+'/' + l3+'/' + l4,
			}).then(function (response) {
				toastr.success("PO Receted..!!")
				$rootScope.getPOApproverList1();
				$rootScope.getPOApproverList2();
				$rootScope.getPOApproverList3();
				$rootScope.getPOApproverList4();
				// $window.location.reload();
			}, function (response) {
				swal({
					title: response.data.heading,
					text: response.data.message,
					html:true,
					type: 'error'
				}); 
				toastr.error("PO Not Rejected..!!")
			});

		}



		$rootScope.getPOApproverList1();
		$rootScope.getPOApproverList2();
		$rootScope.getPOApproverList3();
		$rootScope.getPOApproverList4();


	});
}]);
