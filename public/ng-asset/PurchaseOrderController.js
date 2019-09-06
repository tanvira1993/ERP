/* Setup blank page controller */
angular.module('ErpApp').controller('PurchaseOrderController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {

		const initSelect2Dropdown = function () {
			$timeout(function () {
				$(".select2dropdown").select2({
					placeholder: null,
					width: '100%'
				});
			}, 500);
		} 

		$scope.createPurchaseOrder = function(){

			toastr.info("'info', 'Loading!', 'Please wait.'")
			$http({
				method: 'post',
				url: 'api/createPurchaseOrder',
				data:$scope.purchaseOrderInfo
			}).then(function (response) {
				$scope.purchaseOrderInfo=null;
				toastr.success("Purchase Order Created..!!")         		       		
			}, function (response) {
				swal({
					title: response.data.heading,
					text: response.data.message,
					html:true,
					type: 'error'
				}); 
				toastr.error("Purchase Order could not be Created!!")
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

		initSelect2Dropdown();   
		$scope.getAlldocumentList();


	});
}]);
