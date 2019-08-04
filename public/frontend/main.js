var ErpApp = angular.module("ErpApp", [
	"ui.router",	
	"oc.lazyLoad",
	]);

/********************************************
 END: BREAKING CHANGE in AngularJS:
 *********************************************/

 /* Setup App Interceptors */
 ErpApp.config(['$httpProvider', function($httpProvider) {
 	$httpProvider.interceptors.push('MaxInterceptor');

 }]);

 ErpApp.factory('MaxInterceptor', ['$rootScope','$q', function ($rootScope,$q) {
 	var interceptor = {
 		request: function(config) {
 			config.headers['Content-Type'] = 'application/x-www-form-urlencoded';
 			if (!!$rootScope.token) {
 				config.headers.Token = 'Bearer '+ 'kochu '+$rootScope.token;
 				config.headers.idUser = $rootScope.idUser;
 				config.headers.idUserRole = $rootScope.idUserRole;

 			}

 			if (config.method === 'POST') {
 				config.data = $.param(config.data);
 			}
 			return config;
 		},
 		response: function(response) {
 			return response;
 		},
 		responseError: function(response, error) {
 			return $q.reject(response);
 		}
 	};
 	return interceptor;
 }]);

 /* Setup App Main Controller */
 ErpApp.controller('AppController', ['$scope', '$rootScope', '$location', '$timeout', '$http','$stateParams','$window',function($scope, $rootScope, $location, $timeout, $http,$stateParams,$window) {
 	$scope.$on('$viewContentLoaded', function() {

 	});
 }]);

 /* Setup App run functions*/
 ErpApp.run(['$rootScope', '$http','$state','$window', '$filter', '$location',
 	function($rootScope, $http, $state,$window, $filter,$location) {

 		$rootScope.token = localStorage.getItem('token');
 		$rootScope.idUser = localStorage.getItem('idUser');
 		$rootScope.idUserRole= localStorage.getItem('idUserRole');

 		$rootScope.loginInfo = {
 			email: null,
 			password: null
 		};

 		$rootScope.validateSignin = function (){
 			var formStatus = true;
 			return formStatus;
 		}

 		$rootScope.loginError = null;

 		$rootScope.login = function(){
 			if($rootScope.validateSignin()){
 				$http({
 					method: 'post',
 					url: 'api/login',
 					data: $rootScope.loginInfo
 				}).then(function(response) {
 					$rootScope.loginInfo= null;

 					localStorage.setItem('token', response.data.token);
 					localStorage.setItem('idUser', response.data.userInfo.user_id);
 					localStorage.setItem('idUserRole', response.data.userInfo.id_user_roles);               

 					$rootScope.token = localStorage.getItem('token');
 					$rootScope.idUser = localStorage.getItem('idUser');
 					$rootScope.idUserRole= localStorage.getItem('idUserRole');
 					toastr.success("Login Success..!!")
 					
 					// $window.location.reload();
 					$location.path('/dashboard');
 				}, function(response) {
 					$rootScope.loginError = response.data.error;
 					toastr.error("Login Failed..!!")
 				});
 			}
 			else{
 				toastr.error("Login Failed..!!")
 			}

 		}

 		$rootScope.getAllProjectList = function(){

 			$http({
 				method: 'get',
 				url: 'api/projectList',
 			}).then(function (response) {
 				$rootScope.projectList = response.data.data;

 			}, function (response) {


 			});

 		}

 		$rootScope.logOut= function(){
 			window.location.href = 'login/logout/';
 		}

 		$rootScope.getAllProjectList();
 	}]);
