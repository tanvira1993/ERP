<div class="row">
	<h3 class="head header-text">Good Sell</h3>
</div>


<div>
	<form id="goodSell-form" name="goodSellForm" novalidate>
		<div class="row">
			<div class="label-design">
				<label for="idProject">Select Project</label>
			</div>
			<div class="col-75">				
				<select name="idProject" ng-model="goodSellInfo.idProject" class="form-control select2dropdown">
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
				<select name="idMaterial" ng-model="goodSellInfo.idMaterial" class="form-control select2dropdown">
					<option value="">Select Material</option>
					<option ng-repeat="(key, value) in materialList" value="@{{value.material_id}}">@{{value.name}}</option>
				</select>
			</div>
		</div>

			<div class="row">  
			<div class="label-design">
				<label for="idCustomer">Select Customer</label>
			</div>     
			<div class="col-75">				        
				<select name="idCustomer" ng-model="goodSellInfo.idCustomer" class="form-control select2dropdown">
					<option value="">Select Customer</option>
					<option ng-repeat="(key, value) in customerList" value="@{{value.customer_id}}">@{{value.name}}</option>
				</select>
			</div>
		</div>
		<div class="row">  
			<div class="label-design">
				<label for="quantity">Quantity</label>
			</div>     
			<div class="col-75">				        
				<input type="number"  name="quantity" ng-model="goodSellInfo.quantity" placeholder="">
			</div>
		</div>

			<div class="row">  
			<div class="label-design">
				<label for="price">Price P/U</label>
			</div>     
			<div class="col-75">				        
				<input type="number"  name="price" ng-model="goodSellInfo.price" placeholder="">
			</div>
		</div>

		

		<div class="row submit-design">
			<input type="submit" ng-click="createGoodSell()" value="Good Sell">
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
		@{{goodSellInfo|json}}
	</pre>
</div>

