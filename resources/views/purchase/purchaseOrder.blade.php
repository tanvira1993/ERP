<div class="row">
	<h3 class="head header-text">Purchase Order</h3>
</div>


<div>
	<form id="purchaseOrder-form" name="purchaseOrderForm" novalidate>
		<div class="row">
			<div class="label-design">
				<label for="idDocument">Select Document</label>
			</div>
			<div class="col-75">				
				<select name="idDocument" ng-model="purchaseOrderInfo.idDocument" class="form-control select2dropdown">
					<option value="">Select Document</option>
					<option ng-repeat="(key, value) in documentList" value="@{{value.document_id}}">@{{value.document_name}}</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="label-design">
				<label for="idProject">Select Project</label>
			</div>
			<div class="col-75">				
				<select name="idProject" ng-model="purchaseOrderInfo.idProject" class="form-control select2dropdown">
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
				<select name="idMaterial" ng-model="purchaseOrderInfo.idMaterial" class="form-control select2dropdown">
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
				<select name="idVendor" ng-model="purchaseOrderInfo.idVendor" class="form-control select2dropdown">
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
				<input type="number"  name="quantity" ng-model="purchaseOrderInfo.quantity" placeholder="">
			</div>
		</div>

		<div class="row">  
			<div class="label-design">
				<label for="price">Price</label>
			</div>     
			<div class="col-75">				        
				<input type="number"  name="price" ng-model="purchaseOrderInfo.price" placeholder="">
			</div>
		</div>

		

		<div class="row submit-design">
			<input type="submit" ng-click="createPurchaseOrder()" value="Create">
		</div>
	</form>
	<div class="row" style="position: relative; left: 470px;top: -360px;">
		<div class="container">
			<div class="row">
				<button ui-sref="purchaseOrderList" class="btn btn-warning">
					Purchase Order List
					<i class="fa fa-server"></i>
				</button>
			</div>	
		</div>
	</div>
	<pre>
		@{{purchaseOrderInfo|json}}
	</pre>
</div>

