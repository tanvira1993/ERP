/* Setup blank page controller */
angular.module('ErpApp').controller('ProjectInventoryReportController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
		
		$scope.filteredTodosG = []
		,$scope.currentPageG = 1
		,$scope.numPerPageG = 8
		,$scope.maxSizeG = 5;
		$scope.getAllGoodReceiveLists = function(){

			$http({
				method: 'get',
				url: 'api/getAllGoodReceiveLists',
			}).then(function (response) {
				$scope.goodReceiveLists = response.data.data;
				$scope.$watch('currentPageG + numPerPageG', function() {
					var begin = (($scope.currentPageG - 1) * $scope.numPerPageG)
					, end = begin + $scope.numPerPageG;

					$scope.filteredTodosG = $scope.goodReceiveLists.slice(begin, end);
				});

			}, function (response) {				
			});

		}
		$scope.getAllGoodReceiveLists();

		$scope.deleteGoodReceiveSingleHistory=function (id){
			console.log(id);
			swal({
				title: "Are you sure?",
				text: "You will not be able to recover this Transaction!",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Yes, delete it!",
				cancelButtonText: "No, cancel!",
				CancelButtonClass: "btn-danger",
				closeOnConfirm: false,
				closeOnCancel: true
			},
			function(isConfirm) {
				if (isConfirm) {

					$http({
						method:'delete',
						url: 'api/deleteGoodReceiveSingleHistory/'+id
					}).then(function(response) {
						console.log(response);
						$scope.getAllGoodReceiveLists();
						swal("Deleted!", "Your Transaction has been deleted.", "success");

					}, function(response) {
						toastr.error("Sorry!! You Made a Mistake");
						// swal("Sorry!", "Your Made a Mistake..", "Failed");
						console.log(response);
					});

				}

				// else{
				// 	toastr.error("Sorry!! You Made a Mistake");


				// } 
			});
		}

	});
}]);
