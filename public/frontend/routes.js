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


.state('vendor', {
        url: "/vendor",
        templateUrl: "/vendor",
        data: {pageTitle: 'Vendor'},
        controller: "VendorController",
        resolve: {
            deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'ErpApp',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                    'ng-asset/VendorController.js'
                    ]
                });
            }]
        }
    })



.state('customer', {
        url: "/customer",
        templateUrl: "/customer",
        data: {pageTitle: 'Customer'},
        controller: "CustomerController",
        resolve: {
            deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'ErpApp',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                    'ng-asset/CustomerController.js'
                    ]
                });
            }]
        }
    })


.state('customerList', {
        url: "/customerList",
        templateUrl: "/customerList",
        data: {pageTitle: 'Customer List'},
        controller: "CustomerListController",
        resolve: {
            deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'ErpApp',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                    'ng-asset/CustomerListController.js'
                    ]
                });
            }]
        }
    })


.state('vendorList', {
        url: "/vendorList",
        templateUrl: "/vendorList",
        data: {pageTitle: 'Vendor List'},
        controller: "VendorListController",
        resolve: {
            deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'ErpApp',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                    'ng-asset/VendorListController.js'
                    ]
                });
            }]
        }
    })


.state('purchaseOrder', {
        url: "/purchaseOrder",
        templateUrl: "/purchaseOrder",
        data: {pageTitle: 'Purchase Order'},
        controller: "PurchaseOrderController",
        resolve: {
            deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'ErpApp',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                    'ng-asset/PurchaseOrderController.js'
                    ]
                });
            }]
        }
    })

.state('goodReceive', {
        url: "/goodReceive",
        templateUrl: "/goodReceive",
        data: {pageTitle: 'Good Receive'},
        controller: "GoodReceiveController",
        resolve: {
            deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'ErpApp',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                    'ng-asset/GoodReceiveController.js'
                    ]
                });
            }]
        }
    })


.state('consumeGood', {
        url: "/consumeGood",
        templateUrl: "/consumeGood",
        data: {pageTitle: 'Consume Good'},
        controller: "ConsumeGoodController",
        resolve: {
            deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'ErpApp',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                    'ng-asset/ConsumeGoodController.js'
                    ]
                });
            }]
        }
    })

.state('transferGood', {
        url: "/transferGood",
        templateUrl: "/transferGood",
        data: {pageTitle: 'Transfer Good'},
        controller: "TransferGoodController",
        resolve: {
            deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'ErpApp',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                    'ng-asset/TransferGoodController.js'
                    ]
                });
            }]
        }
    })



.state('goodSell', {
        url: "/goodSell",
        templateUrl: "/goodSell",
        data: {pageTitle: 'Good Sell'},
        controller: "GoodSellController",
        resolve: {
            deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'ErpApp',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                    'ng-asset/GoodSellController.js'
                    ]
                });
            }]
        }
    })


.state('projectSell', {
        url: "/projectSell",
        templateUrl: "/projectSell",
        data: {pageTitle: 'Project Sell'},
        controller: "ProjectSellController",
        resolve: {
            deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'ErpApp',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                    'ng-asset/ProjectSellController.js'
                    ]
                });
            }]
        }
    })

.state('utilityBillPost', {
        url: "/utilityBillPost",
        templateUrl: "/utilityBillPost",
        data: {pageTitle: 'Utility Bill Post'},
        controller: "UtilityBillPostController",
        resolve: {
            deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'ErpApp',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                    'ng-asset/UtilityBillPostController.js'
                    ]
                });
            }]
        }
    })

.state('bankLoan', {
        url: "/bankLoan",
        templateUrl: "/bankLoan",
        data: {pageTitle: 'Bank Loan'},
        controller: "BankLoanController",
        resolve: {
            deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'ErpApp',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                    'ng-asset/BankLoanController.js'
                    ]
                });
            }]
        }
    })

.state('ownInvestment', {
        url: "/ownInvestment",
        templateUrl: "/ownInvestment",
        data: {pageTitle: 'Own Investment'},
        controller: "OwnInvestmentController",
        resolve: {
            deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'ErpApp',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                    'ng-asset/OwnInvestmentController.js'
                    ]
                });
            }]
        }
    })

.state('advancePayment', {
        url: "/advancePayment",
        templateUrl: "/advancePayment",
        data: {pageTitle: 'Advance Payment'},
        controller: "AdvancePaymentController",
        resolve: {
            deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'ErpApp',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                    'ng-asset/AdvancePaymentController.js'
                    ]
                });
            }]
        }
    })

.state('labourCost', {
        url: "/labourCost",
        templateUrl: "/labourCost",
        data: {pageTitle: 'Labour Cost'},
        controller: "LabourCostController",
        resolve: {
            deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'ErpApp',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                    'ng-asset/LabourCostController.js'
                    ]
                });
            }]
        }
    })


.state('rejectGood', {
        url: "/rejectGood",
        templateUrl: "/rejectGood",
        data: {pageTitle: 'Reject Good'},
        controller: "RejectGoodController",
        resolve: {
            deps: ['$ocLazyLoad', function ($ocLazyLoad) {
                return $ocLazyLoad.load({
                    name: 'ErpApp',
                    insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                    files: [
                    'ng-asset/RejectGoodController.js'
                    ]
                });
            }]
        }
    })


}]);
