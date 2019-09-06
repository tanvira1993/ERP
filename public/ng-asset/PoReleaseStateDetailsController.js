/* Setup blank page controller */
angular.module('ErpApp').controller('PoReleaseStateDetailsController', ['$scope', '$rootScope', '$location', '$timeout', '$http', '$stateParams',function($scope, $rootScope, $location, $timeout, $http,$stateParams) {
	$scope.$on('$viewContentLoaded', function() {
		$scope.id= $stateParams.id
		
		$scope.getPoStateInfoById= function ()
		{
			$http({
				method: 'get',
				url: 'api/getPoStateInfoListById/' +$scope.id,
			}).then(function (response) {
				$scope.poStateInfoList= response.data.data;
			}, 
			function (response) {				

			});
		}

		$scope.getPoStateInfoById();


	});
}]);
