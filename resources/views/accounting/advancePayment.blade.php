<div class="row">
	<h3 class="head header-text">Advance Payment</h3>
</div>


<div>
	<form id="advancePayment-form" name="advancePaymentForm" novalidate>
		<div class="row">
			<div class="label-design">
				<label for="idProject">Select Project</label>
			</div>
			<div class="col-75">				
				<select name="idProject" ng-model="advancePaymentInfo.idProject" class="form-control select2dropdown">
					<option value="">Select Project</option>
					<option ng-repeat="(key, value) in projectList" value="@{{value.project_id}}">@{{value.name}}</option>
				</select>
			</div>
		</div>

	

			<div class="row">  
			<div class="label-design">
				<label for="idCustomer">Select Customer</label>
			</div>     
			<div class="col-75">				        
				<select name="idCustomer" ng-model="advancePaymentInfo.idCustomer" class="form-control select2dropdown">
					<option value="">Select Customer</option>
					<option ng-repeat="(key, value) in customerList" value="@{{value.customer_id}}">@{{value.name}}</option>
				</select>
			</div>
	

	</div>

		<div class="row">  
			<div class="label-design">
				<label for="amount">Amount</label>
			</div>     
			<div class="col-75">				        
				<input type="number"  name="amount" ng-model="advancePaymentInfo.amount" placeholder="">
			</div>
		</div>

		

		<div class="row submit-design">
			<input type="submit" ng-click="createAdvancePayment()" value="Advance Payment">
		</div>
	</form>
<!-- 	<div class="row" style="position: relative; left: 470px;top: -360px;">
		<div class="container">
			<div class="row">
				<button ui-sref="goodReceiveList" class="btn btn-warning">
					Good Receive List
					<i class="fa fa-server"></i>
				</button>
			</div>	
		</div>
	</div> -->
	<pre>
		@{{advancePaymentInfo|json}}
	</pre>
</div>

