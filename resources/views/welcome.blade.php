<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-ng-app="ErpApp">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>E-Inventory</title>

	<!-- Fonts -->
	<!-- <link rel="stylesheet" href="bootstrap.min.css" /> -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
	<link rel="stylesheet" href="frontend/bootstrap.min.css">
	<link rel="stylesheet" href="frontend/test.css">
	<link rel="stylesheet" href="frontend/style.css">
	<link rel="stylesheet" href="frontend/login.css">
	<link rel="stylesheet" type="text/css" href="frontend/toastr.min.css">	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="frontend/sweetalert.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
	
</head>
<body ng-controller="AppController">
	<div ng-if="token!=null && idUser!=null	&& idUserRole!=null">
		<div>
			<nav class="navbar navbar-light justify-content-center " style="background-color: #D7D2D2;">
				<a class="navbar-brand" ui-sref="dashboard"><h1 style="font-family:serif;">Employee Inventory </h1></a>				
				<div class="dropdown " style="position: relative; left: 300px;top: -5px;">
					<a style="cursor: pointer;" class="text-dark navbar-brand dropdown" data-toggle="dropdown"> <span style="font-size:13px">@{{usersInfo.name}}&nbsp; <i class="fa fa-caret-down"></i></span><span class="qty" ng-if="approverList1.length+ approverList2.length+ approverList3.length+ approverList4.length+poApproverList1.length+poApproverList2.length+poApproverList3.length+poApproverList4.length>0">@{{approverList1.length+ approverList2.length+ approverList3.length+approverList4.length+poApproverList1.length+poApproverList2.length+poApproverList3.length+poApproverList4.length}}</span></a>
					<ul style="background-color: #D7D2D2;" class=" dropdown-menu" >
						<li ><a ui-sref="passwordReset">Change Password</a></li>
						<li ng-if="idUserRole==0"style="cursor: pointer;"><a ui-sref="adminPasswordReset">Admin Reset</a></li>
						<!-- <li style="cursor: pointer;"><a ui-sref="poReleaseApproveState">Approve PO<span class="qty1" ng-if="poApproverList1.length+poApproverList2.length+poApproverList3.length+poApproverList4.length>0">@{{poApproverList1.length+poApproverList2.length+poApproverList3.length+poApproverList4.length}}</span></a></li> -->
						<!-- <li style="cursor: pointer;"><a ui-sref="prReleaseApproveState">Approve PR<span class="qty2" ng-if="approverList1.length+ approverList2.length+approverList3.length+approverList4.length>0">@{{approverList1.length+ approverList2.length+approverList3.length+approverList4.length}}</span></a></li>	 -->		
						<li style="cursor: pointer;"><a ng-click="logOut()">Logout</a></li>

					</ul>
				</div>
			</nav>			
		</div>

		<nav class="navigation">
			<ul class="mainmenu">
				<li><a href="">Master Data</a>
					<ul class="submenu">
						<li><a ui-sref="vendor">Vendor</a></li>
						<!-- <li><a ui-sref="customer">Customer</a></li> -->
						<li><a ui-sref="project">Employee</a></li>
						<li><a ui-sref="material">Metarial</a></li>
					</ul>
				</li>
				<!-- <li><a href="">Requsition</a>
					<ul class="submenu">
						<li><a ui-sref="requsition">Raise</a></li>
						<li><a ui-sref="requsitionApproveList">Approved List</a></li>
						<li><a ui-sref="requsitionRejectList">Rejected List</a></li>
					</ul>
				</li> -->
				<!-- <li><a ui-sref="">Purchase Order</a>
					<ul class="submenu">
						<li><a ui-sref="purchaseOrder">Order</a></li>
						<li><a ui-sref="purchaseOrderApproveList">Approved List</a></li>
						<li><a ui-sref="purchaseOrderRejectList">Rejected List</a></li>
					</ul>

				</li> -->
				<li><a href="">Good Movement</a>
					<ul class="submenu">
						<li><a ui-sref="goodReceive">Good Recieve</a></li>
						<li><a ui-sref="transferGood">Transfer Good</a></li>					
						<li><a ui-sref="consumeGood">Consume Good</a></li>
						<li><a ui-sref="rejectGood">Scrap Good</a></li>					
						<li><a ui-sref="refund">Refund</a></li>					
					</ul>
				</li>
				<!-- <li><a href="">Accounting Posting</a>
					<ul class="submenu">
						<li><a href="">Bill Post</a></li>
						<li><a ui-sref="utilityBillPost">Utility Bill Post</a></li>
						<li><a ui-sref="bankLoan">Bank Loan</a></li>
						<li><a ui-sref="ownInvestment">Own Investment</a></li>
						<li><a ui-sref="advancePayment">Advance Payment</a></li>
						<li><a ui-sref="labourCost">Labour Cost</a></li>
					</ul>
				</li> -->
				<!-- <li><a href="">Sells</a>
					<ul class="submenu">
						<li><a ui-sref="goodSell">Good Sell</a></li>
						<li><a ui-sref="projectSell">Project Sell</a></li>
					</ul>
				</li> -->
				<li><a href="">Reports</a>
					<ul class="submenu">
						<!-- <li><a ui-sref="vendorReport">Vendor Report</a></li> -->
						<li><a ui-sref="materialInventoryReport">Inventory Report</a></li>
						<!-- <li><a ui-sref="projectInventoryReport">Project Inventory</a></li> -->
						<!-- <li><a ui-sref="accountingReport">Accounting</a></li> -->
						<li><a ui-sref="stockReport">Stock Report</a></li>
						<li><a ui-sref="scrapReport">Scrap Report</a></li>
						<li><a ui-sref="materialReport">Material Report</a></li>
						
					</ul>
				</li>
				<!-- <li><a href="">Approval Setting</a>

					<ul class="submenu">
						<li><a ui-sref="documentType">Dcument Type</a></li>
						<li><a ui-sref="release">Release Strategy</a></li>
						
					</ul>
				</li> -->
				
			</ul>
		</nav>

		<div style="padding-left:20%;">
			<div ui-view> </div>
		</div>
	</div>

	<div ng-if="token==null || idUser==null	|| idUserRole==null" style="background-color:'#DDDD';">
		<div class="login-page">
			<div class="form">
				<h1 style="font-family:serif;">Login</h1>

				<form class="login-form" id="login-form" name="loginForm">
					<input type="text" name="email" ng-model="loginInfo.email" placeholder="Email"/>
					<input type="password" name="password" ng-model="loginInfo.password" placeholder="password"/>
					<button ng-click="login()">login</button>
				</form>
				<!-- <pre>
					@{{loginInfo|json}}
				</pre> -->
			</div>
		</div>
	</div>

	

	<div ng-if="token!=null && idUser!=null	&& idUserRole!=null" class="footer">
		<p style="font-family:serif;">Employee Inventory <a href="http://tomagroup.com.bd/" target='_blank'title="©Toma Group">©Toma Group</a></p>
	</div>
	<script src="frontend/jquery.min.js" type="text/javascript"></script>
	<script src="frontend/angular.min.js"></script>
	<script src="frontend/ocLazyLoad.min.js"></script>
	<script src="frontend/angular-ui-router.js"></script>	
	<script src="frontend/main.js" type="text/javascript"></script>
	<script src="frontend/routes.js" type="text/javascript"></script>	
	<script src="frontend/toastr.min.js" type="text/javascript"></script>
	<script src="frontend/popper.min.js"></script>
	<script src="frontend/bootstrap.min.js"></script>
	<!-- <script src="bootstrap.min.js"></script> -->
	<script src="frontend/sweetalert.min.js"></script>
	<script data-require="ui-bootstrap@*" data-semver="0.12.1" src="frontend/ui-bootstrap-tpls-0.12.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>


</body>
</html>


