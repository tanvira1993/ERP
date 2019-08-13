<div class="row">
	<h3 class="head header-text">Utility Bill Post</h3>
</div>


<div>
	<form id="utilityBillPost-form" name="utilityBillPostForm" novalidate>
		<div class="row">
			<div class="label-design">
				<label for="idProject">Select Project</label>
			</div>
			<div class="col-75">				
				<select name="idProject" ng-model="utilityBillPostInfo.idProject" class="form-control select2dropdown">
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
				<select name="idMaterial" ng-model="utilityBillPostInfo.idMaterial" class="form-control select2dropdown">
					<option value="">Select Material</option>
					<option ng-repeat="(key, value) in materialList" value="@{{value.material_id}}">@{{value.name}}</option>
				</select>
			</div>
		</div>

			<div class="row">  
			<div class="label-design">
				<label for="desc">Description</label>
			</div>     
			<div class="col-75">				        
				<input type="text"  name="desc" ng-model="utilityBillPostInfo.desc" placeholder="">
			</div>
		</div>


		

		<div class="row submit-design">
			<input type="submit" ng-click="createUtilityBillPost()" value="Utility Bill Post">
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
		@{{utilityBillPostInfo|json}}
	</pre>
</div>

