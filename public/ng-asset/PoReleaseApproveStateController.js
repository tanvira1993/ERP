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
				$scope.getPOApproverList1();
				$scope.getPOApproverList2();
				$scope.getPOApproverList3();
				$scope.getPOApproverList4();
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
				$scope.getPOApproverList1();
				$scope.getPOApproverList2();
				$scope.getPOApproverList3();
				$scope.getPOApproverList4();
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

		$scope.getPOApproverList1 = function(){
			$http({
				method: 'get',
				url: 'api/getPOApproverList1',
			}).then(function (response) {
				$scope.approverList1 = response.data.data;
			}, function (response) {


			});
		}

		$scope.getPOApproverList2 = function(){
			$http({
				method: 'get',
				url: 'api/getPOApproverList2',
			}).then(function (response) {
				$scope.approverList2 = response.data.data;
			}, function (response) {


			});
		}

		$scope.getPOApproverList3 = function(){
			$http({
				method: 'get',
				url: 'api/getPOApproverList3',
			}).then(function (response) {
				$scope.approverList3 = response.data.data;
			}, function (response) {


			});
		}

		$scope.getPOApproverList4 = function(){
			$http({
				method: 'get',
				url: 'api/getPOApproverList4',
			}).then(function (response) {
				$scope.approverList4 = response.data.data;
			}, function (response) {


			});
		}

		$scope.getPOApproverList1();
		$scope.getPOApproverList2();
		$scope.getPOApproverList3();
		$scope.getPOApproverList4();


	});
}]);
