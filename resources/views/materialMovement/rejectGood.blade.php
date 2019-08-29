<div class="row">
	<h3 class="head header-text">Reject Good</h3>
</div>


<div>
	<form id="rejectGood-form" name="rejectGoodForm" novalidate>
		<div class="row">
			<div class="label-design">
				<label for="idProject">Select Project</label>
			</div>
			<div class="col-75">				
				<select name="idProject" ng-model="rejectGoodInfo.idProject" class="form-control select2dropdown">
					<option value="">Select Project</option>
					<option ng-repeat="(key, value) in projectList" value="@{{value.project_id}}">@{{value.name}}</option>
				</select>
			</div>
		</div>

		<div class="row">  
			<div class="label-design">
				<label for="idMaterial">Select Material</label>
			</div>     
			<div class="col-75">				        
				<select name="idMaterial" ng-model="rejectGoodInfo.idMaterial" class="form-control select2dropdown">
					<option value="">Select Material</option>
					<option ng-repeat="(key, value) in materialList" value="@{{value.material_id}}">@{{value.name}}</option>
				</select>
			</div>
		</div>


				<div class="row">  
			<div class="label-design">
				<label for="idVendor">Select Vendor</label>
			</div>     
			<div class="col-75">				        
				<select name="idVendor" ng-model="rejectGoodInfo.idVendor" class="form-control select2dropdown">
					<option value="">Select Vendor</option>
					<option ng-repeat="(key, value) in vendorList" value="@{{value.vendor_id}}">@{{value.name}}</option>
				</select>
			</div>
		</div>

		
		<div class="row">  
			<div class="label-design">
				<label for="quantity">Quantity</label>
			</div>     
			<div class="col-75">				        
				<input type="number"  name="quantity" ng-model="rejectGoodInfo.quantity" placeholder="">
			</div>
		</div>

		<div class="row">  
			<div class="label-design">
				<label for="price">Price</label>
			</div>     
			<div class="col-75">				        
				<input type="number"  name="price" ng-model="rejectGoodInfo.price" placeholder="">
			</div>
		</div>


		<div class="row">  
			<div class="label-design">
				<label for="remarks">Remarks</label>
			</div>     
			<div class="col-75">				        
				<input type="text"  name="remarks" ng-model="rejectGoodInfo.remarks" placeholder="">
			</div>
		</div>

		

		<div class="row submit-design">
			<input type="submit" ng-click="createRejectGood()" value="Reject">
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
		@{{rejectGoodInfo|json}}
	</pre>
</div>

