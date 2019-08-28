<div class="row">
	<h3 class="head header-text">Requsition Raise</h3>
</div>


<div>
	<form id="requsition-form" name="requsitionForm" novalidate>
		<div class="row">
			<div class="label-design">
				<label for="idDocument">Select Document</label>
			</div>
			<div class="col-75">				
				<select name="idDocument" ng-model="requsitionInfo.idDocument" class="form-control select2dropdown">
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
				<select name="idProject" ng-model="requsitionInfo.idProject" class="form-control select2dropdown">
					<option value="">Select Project</option>
					<option ng-repeat="(key, value) in projectList" value="@{{value.project_id}}">@{{value.name}}</option>
				</select>
			</div>
		</div>

		<div class="row">  
			<div class="label-design">
				<label for="fname">Select Material</label>
			</div>     
			<div class="col-75">				        
				<select name="idMaterial" ng-model="requsitionInfo.idMaterial" class="form-control select2dropdown">
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
				<input type="number"  name="quantity" ng-model="requsitionInfo.quantity" placeholder="">
			</div>
		</div>

		<div class="row">  
			<div class="label-design">
				<label for="rName">Requsitioner Name</label>
			</div>     
			<div class="col-75">				        
				<input type="text"  name="rName" ng-model="requsitionInfo.rName" placeholder="">
			</div>
		</div>

		<div class="row">  
			<div class="label-design">
				<label for="vendor">Vendor</label>
			</div>     
			<div class="col-75">				        
				<input type="text"  name="vendor" ng-model="requsitionInfo.vendor" placeholder="">
			</div>
		</div>

		<div class="row submit-design">
			<input type="submit" ng-click="createRequsition()" value="Create">
		</div>
	</form>
	<div class="row" style="position: relative; left: 470px;top: -360px;">
		<div class="container">
			<div class="row">
				<button ui-sref="requsitionList" class="btn btn-warning">
					Requsition List
					<i class="fa fa-server"></i>
				</button>
			</div>	
		</div>
	</div>
	<pre>
		@{{requsitionInfo|json}}
	</pre>
</div>

