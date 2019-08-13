<div class="row">
	<h3 class="head header-text">Labour Cost</h3>
</div>


<div>
	<form id="labourCost-form" name="labourCostForm" novalidate>
		<div class="row">
			<div class="label-design">
				<label for="idProject">Select Project</label>
			</div>
			<div class="col-75">				
				<select name="idProject" ng-model="labourCostInfo.idProject" class="form-control select2dropdown">
					<option value="">Select Project</option>
					<option ng-repeat="(key, value) in projectList" value="@{{value.project_id}}">@{{value.name}}</option>
				</select>
			</div>
		</div>

		
		<div class="row">  
			<div class="label-design">
				<label for="labourquantity">Labour Quantity</label>
			</div>     
			<div class="col-75">				        
				<input type="number"  name="labourquantity" ng-model="labourCostInfo.labourquantity" placeholder="">
			</div>
		</div>

		<div class="row">  
			<div class="label-design">
				<label for="cost">cost</label>
			</div>     
			<div class="col-75">				        
				<input type="number"  name="cost" ng-model="labourCostInfo.cost" placeholder="">
			</div>
		</div>



	

			


		

		<div class="row submit-design">
			<input type="submit" ng-click="createLabourCost()" value="Labour Cost">
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
		@{{labourCostInfo|json}}
	</pre>
</div>

