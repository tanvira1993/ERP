/* Setup Rounting For All Pages */
ErpApp.config(['$stateProvider', '$urlRouterProvider', function($stateProvider, $urlRouterProvider) {
    // Redirect any unmatched url
    $urlRouterProvider.otherwise("/dashboard");

    $stateProvider

    // Dashboard
    
    //Added by Tanvir

    .state('dashboard', {
    	url: "/dashboard",
    	templateUrl: "/dashboard",
    	data: {pageTitle: 'Dashboard'},
    	controller: "DashboardController",
    	resolve: {
    		deps: ['$ocLazyLoad', function ($ocLazyLoad) {
    			return $ocLazyLoad.load({
    				name: 'ErpApp',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                    'ng-asset/DashboardController.js'
                    ]
                });
    		}]
    	}
    })

    
    .state('requsition', {
        url: "/requsition",
        templateUrl: "/requsition",
        data: {pageTitle: 'Requsition'},
        controller: "RequsitionController",
        resolve: {
            deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'ErpApp',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                    'ng-asset/RequsitionController.js'
                    ]
                });
            }]
        }
    })

    .state('login', {
        url: "/login",
        templateUrl: "/login",
        data: {pageTitle: 'Login'},
        controller: "LoginController",
        resolve: {
            deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'ErpApp',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                    'ng-asset/LoginController.js'
                    ]
                });
            }]
        }
    })

    .state('register', {
        url: "/register",
        templateUrl: "/register",
        data: {pageTitle: 'Register'},
        controller: "RegisterController",
        resolve: {
            deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'ErpApp',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                    'ng-asset/RegisterController.js'
                    ]
                });
            }]
        }
    })
    
    .state('passwordReset', {
        url: "/passwordReset",
        templateUrl: "/passwordReset",
        data: {pageTitle: 'Password Reset'},
        controller: "PasswordResetController",
        resolve: {
            deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'ErpApp',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                    'ng-asset/PasswordResetController.js'
                    ]
                });
            }]
        }
    })

    .state('project', {
        url: "/project",
        templateUrl: "/project",
        data: {pageTitle: 'Projects'},
        controller: "ProjectController",
        resolve: {
            deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'ErpApp',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                    'ng-asset/ProjectController.js'
                    ]
                });
            }]
        }
    })
    
    .state('projectList', {
        url: "/projectList",
        templateUrl: "/projectList",
        data: {pageTitle: 'Project List'},
        controller: "ProjectListController",
        resolve: {
            deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'ErpApp',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                    'ng-asset/ProjectListController.js'
                    ]
                });
            }]
        }
    })


    .state('material', {
        url: "/material",
        templateUrl: "/material",
        data: {pageTitle: 'Material'},
        controller: "MaterialController",
        resolve: {
            deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'ErpApp',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                    'ng-asset/MaterialController.js'
                    ]
                });
            }]
        }
    })

    .state('materialList', {
        url: "/materialList",
        templateUrl: "/materialList",
        data: {pageTitle: 'Material List'},
        controller: "MaterialListController",
        resolve: {
            deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'ErpApp',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                    'ng-asset/MaterialListController.js'
                    ]
                });
            }]
        }
    })


}]);
