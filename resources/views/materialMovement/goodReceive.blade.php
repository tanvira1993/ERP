<div class="row">
	<h3 class="head header-text">Good Receive</h3>
	<div style="margin-top: 50px;margin-left: 300px" class="container">
		<div class="row">
			<button ui-sref="projectInventoryReport" class="btn btn-warning">
				StockIn List All
				<i class="fa fa-server"></i>
			</button>
		</div>	
	</div>
</div>


<div>
	<form id="goodReceive-form" name="goodReceiveForm" novalidate>
		<div class="row">
			<div class="label-design">
				<label for="idProject">Select Employer</label>
			</div>
			<div class="col-75">				
				<select name="idProject" ng-model="goodReceiveInfo.idProject" class="form-control select2dropdown">
					<option value="">Select Employer</option>
					<option ng-repeat="(key, value) in getEmployer" value="@{{value.project_id}}">@{{value.name}}</option>
				</select>
			</div>
		</div>

		<div class="row">  
			<div class="label-design">
				<label for="idMaterial">Select Material</label>
			</div>     
			<div class="col-75">				        
				<select name="idMaterial" ng-model="goodReceiveInfo.idMaterial" class="form-control select2dropdown">
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
				<select name="idVendor" ng-model="goodReceiveInfo.idVendor" class="form-control select2dropdown">
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
				<input type="number"  name="quantity" ng-model="goodReceiveInfo.quantity" placeholder="">
			</div>
		</div>

		<div class="row">  
			<div class="label-design">
				<label for="price">Price</label>
			</div>     
			<div class="col-75">				        
				<input type="number"  name="price" ng-model="goodReceiveInfo.price" placeholder="">
			</div>
		</div>

		

		<div class="row submit-design">
			<input type="submit" ng-click="createGoodReceive()" value="Stock In">
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
	<!-- <pre>
		@{{goodReceiveInfo|json}}
	</pre> -->
</div>

