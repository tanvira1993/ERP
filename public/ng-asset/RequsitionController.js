/* Setup blank page controller */
angular.module('ErpApp').controller('RequsitionController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
		
		const initSelect2Dropdown = function () {
			$timeout(function () {
				$(".select2dropdown").select2({
					placeholder: null,
					width: '100%'
				});
			}, 500);
		} 

		$scope.createRequsition = function(){

			toastr.info("'info', 'Loading!', 'Please wait.'")
			$http({
				method: 'post',
				url: 'api/createRequsition',
				data:$scope.requsitionInfo
			}).then(function (response) {
				$scope.requsitionInfo=null;
				toastr.success("Requsition Created..!!")         		       		
			}, function (response) {
				swal({
					title: response.data.heading,
					text: response.data.message,
					html:true,
					type: 'error'
				}); 
				toastr.error("Requsition could not be Created!!")
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
