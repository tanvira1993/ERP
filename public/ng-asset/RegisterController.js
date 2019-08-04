angular.module('ErpApp').controller('RegisterController', ['$scope', '$rootScope', '$location', '$timeout', '$http',
	function($scope, $rootScope, $location, $timeout, $http) {
		$scope.$on('$viewContentLoaded', function() {

			$scope.userInfo = {
				name: null,
				email: null,
				password: null,
				repass: null,
				mobile: null,
				position: null,
				role: null
			};


			$scope.validateAddUser = function (){
				var formStatus = true;

				for ( var input in $scope.userInfo) {

					if(input === 'name' ||  input === 'email' ||  input==='password'  || input==='repass' || input==='mobile' || input==='position' || input ==='role'){
						if (!!$scope.userRegistrationForm[input].$error.required) {
							$scope.userRegistrationForm[input].$setDirty(true);
							formStatus = false;
						}
					}
				}
				$scope.userRegistrationForm['password'].$setValidity("isValidcp",true);
				if($scope.userInfo.repass != $scope.userInfo.password){
					$scope.userRegistrationForm['repass'].$setValidity("isValidcp",false);
					formStatus = false;
				}

				return formStatus;
			}

			$scope.createUser = function(){

				if($scope.validateAddUser()){

					toastr.info("'info', 'Loading!', 'Please wait.'")
					$http({
						method: 'post',
						url: 'api/createUser',
						data:$scope.userInfo
					}).then(function (response) {
						$scope.userInfo=null;
						toastr.success("User Creation Completed.")

					}, function (response) {
						swal({
							title: response.data.heading,
							text: response.data.message,
							html:true,
							type: 'error'
						});		
					});
				}
				else{
					toastr.error("Please, Provide the correct requried informations.")
				}
			}
		});
	}]);
