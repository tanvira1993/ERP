<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-ng-app="ErpApp">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>ERP</title>

	<!-- Fonts -->
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
	<div ng-if="token!=null">
		<div>
			<nav class="navbar navbar-light justify-content-center " style="background-color: #D7D2D2;">
				<a class="navbar-brand"><h1 style="font-family:serif;">Inventory & Accounting</h1></a>				
				<div class="dropdown " style="position: relative; left: 300px;top: -5px;">
					<a style="cursor: pointer;" class="text-dark navbar-brand dropdown" data-toggle="dropdown"> <h1>...</h1></a>
					<ul style="background-color: #D7D2D2;" class=" dropdown-menu" >
						<li ><a ui-sref="passwordReset">Password Reset</a></li>
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
						<li><a ui-sref="customer">Customer</a></li>
						<li><a ui-sref="project">Project</a></li>
						<li><a ui-sref="material">Metarial</a></li>
					</ul>
				</li>
				<li><a ui-sref="requsition">Requsition</a></li>
				<li><a ui-sref="purchaseOrder">Purchase Order</a></li>
				<li><a href="">Good Movement</a>
					<ul class="submenu">
						<li><a ui-sref="goodReceive">Good Recieve</a></li>
						<li><a ui-sref="consumeGood">Consume Good</a></li>
						<li><a ui-sref="transferGood">Transfer Good</a></li>
						<li><a ui-sref="rejectGood">Reject Good</a></li>					
					</ul>
				</li>
				<li><a href="">Accounting Posting</a>
					<ul class="submenu">
						<li><a href="">Bill Post</a></li>
						<li><a ui-sref="utilityBillPost">Utility Bill Post</a></li>
						<li><a ui-sref="bankLoan">Bank Loan</a></li>
						<li><a ui-sref="ownInvestment">Own Investment</a></li>
						<li><a ui-sref="advancePayment">Advance Payment</a></li>
						<li><a ui-sref="labourCost">Labour Cost</a></li>
					</ul>
				</li>
				<li><a href="">Sells</a>
					<ul class="submenu">
						<li><a ui-sref="goodSell">Good Sell</a></li>
						<li><a ui-sref="projectSell">Project Sell</a></li>
					</ul>
				</li>
				<li><a href="">Report</a>
					<ul class="submenu">
						<li><a href="">Vendor Report</a></li>
						<li><a href="">Material Report</a></li>
						<li><a href="">Project Report</a></li>
						<li><a href="">Balance Sheet</a></li>
					</ul>
				</li>
			</ul>
		</nav>

		<div style="padding-left:20%;">
			<div ui-view> </div>
		</div>
	</div>

	<div ng-if="token==null" style="background-color:powderblue;">
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

	

	<div ng-if="token!=null" class="footer">
		<p>Footer</p>
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
	<script src="frontend/sweetalert.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

</body>
</html>


