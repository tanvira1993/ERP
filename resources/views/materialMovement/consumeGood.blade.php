<div class="row">
	<h3 class="head header-text">Consume Good</h3>
</div>


<div>
	<form id="consumeGood-form" name="consumeGoodForm" novalidate>
		<div class="row">
			<div class="label-design">
				<label for="idProject">Select Project</label>
			</div>
			<div class="col-75">				
				<select name="idProject" ng-model="consumeGoodInfo.idProject" class="form-control select2dropdown">
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
				<select name="idMaterial" ng-model="consumeGoodInfo.idMaterial" class="form-control select2dropdown">
					<option value="">Select Material</option>
					<option ng-repeat="(key, value) in materialList" value="@{{value.material_id}}">@{{value.name}}</option>
				</select>
			</div>
		</div>

		
		<div class="row">  
			<div class="label-design">
				<label for="quantity">Quantity</label>
			</div>     
			<div class="col-75">				        
				<input type="number"  name="quantity" ng-model="consumeGoodInfo.quantity" placeholder="">
			</div>
		</div>

		

		

		<div class="row submit-design">
			<input type="submit" ng-click="createConsumeGood()" value="Issue">
		</div>
	</form>
	<!-- <div class="row" style="position: relative; left: 470px;top: -360px;">
		<div class="container">
			<div class="row">
				<button ui-sref="consumeGoodList" class="btn btn-warning">
					 Consume Good List
					<i class="fa fa-server"></i>
				</button>
			</div>	
		</div>
	</div> -->
	<pre>
		@{{consumeGoodInfo|json}}
	</pre>
</div>

