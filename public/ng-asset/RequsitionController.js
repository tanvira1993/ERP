/* Setup blank page controller */
angular.module('ErpApp').controller('RequsitionController', ['$scope', '$rootScope', '$location', '$timeout', '$http', function($scope, $rootScope, $location, $timeout, $http) {
	$scope.$on('$viewContentLoaded', function() {
	// initialize core components


	//This function use for select dropdown
	const initSelect2Dropdown = function () {
		$timeout(function () {
			$(".select2dropdown").select2({
				placeholder: null,
				width: '100%'
			});
		}, 500);
	} 

	initSelect2Dropdown();   
});
}]);
