<div class="row">
	<h3 class="head header-text">Material Creation</h3>
</div>


<div>
	<form id="material-form" name="materialForm" novalidate>
		<div class="row">
			<div class="label-design">
				<label for="name">Material Name</label>
			</div>
			<div class="col-75">				
				<input type="text" name="name" ng-model="materialInfo.name" placeholder="">
			</div>
		</div>

		<div class="row">  
			<div class="label-design">
				<label for="type">Material Type</label>
			</div>     
			<div class="col-75">				        
				<select name="type" ng-model="materialInfo.type" class="form-control">
					<option value="">Select Type</option>
					<option value="Asset">Asset</option>
					<option value="Normal">Normal</option>
					
				</select>
			</div>
		</div>

		<div class="row">  
			<div class="label-design">
				<label for="desc">Description</label>
			</div>     
			<div class="col-75">				        
				<input type="text"  name="desc" ng-model="materialInfo.desc" placeholder="">
			</div>
		</div>

		<div class="row submit-design">
			<input type="submit" ng-click="createMaterial()" value="Create">
		</div>
	</form>
	<div class="row" style="position: relative; left: 470px;top: -286px;">
		<div class="container">
			<div class="row">
				<button ui-sref="materialList" class="btn btn-warning">
					Material List
					<i class="fa fa-server"></i>
				</button>
			</div>	
		</div>
	</div>
	<!-- <pre>
		@{{materialInfo|json}}
	</pre> -->
</div>

