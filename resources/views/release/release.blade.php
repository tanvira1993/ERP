<div class="row">
	<h3 class="head header-text">Release Strategy</h3>
</div>


<div>
	<form id="release-form" name="releaseForm" novalidate>

		<div class="row">
			<div class="label-design">
				<label for="iddocument">Document Type</label>
			</div>
			<div class="col-75">				
				<select name="iddocument" ng-model="releaseInfo.iddocument" class="form-control select2dropdown">
					<option value="">-Select Type-</option>
					<option ng-repeat="(key, value) in documentList" value="@{{value.document_id}}">@{{value.document_name}}</option>
				</select>
			</div>
		</div>

		<div class="row">
			<div class="label-design">
				<label for="idProject">Select Project</label>
			</div>
			<div class="col-75">				
				<select name="idProject" ng-model="releaseInfo.idProject" class="form-control select2dropdown">
					<option value="">Select Project</option>
					<option ng-repeat="(key, value) in projectList" value="@{{value.project_id}}">@{{value.name}}</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="label-design">
				<label for="idUser1">Approval Level-1</label>
			</div>
			<div class="col-75">				
				<select name="idUser1" ng-model="releaseInfo.idUser1" class="form-control select2dropdown">
					<option value="">--Select User--</option>
					<option ng-repeat="(key, value) in usersList" value="@{{value.user_id}}">@{{value.name}}</option>
				</select>
			</div>
		</div>	

		<div class="row">
			<div class="label-design">
				<label for="idUser2">Approval Level-2</label>
			</div>
			<div class="col-75">				
				<select name="idUser2" ng-model="releaseInfo.idUser2" class="form-control select2dropdown">
					<option value="">--Select User--</option>
					<option ng-repeat="(key, value) in usersList" value="@{{value.user_id}}">@{{value.name}}</option>
				</select>
			</div>
		</div>	

		<div class="row">
			<div class="label-design">
				<label for="idUser3">Approval Level-3</label>
			</div>
			<div class="col-75">				
				<select name="idUser3" ng-model="releaseInfo.idUser3" class="form-control select2dropdown">
					<option value="">--Select User--</option>
					<option ng-repeat="(key, value) in usersList" value="@{{value.user_id}}">@{{value.name}}</option>
				</select>
			</div>
		</div>	

		<div class="row">
			<div class="label-design">
				<label for="idUser4">Approval Level-4</label>
			</div>
			<div class="col-75">				
				<select name="idUser4" ng-model="releaseInfo.idUser4" class="form-control select2dropdown">
					<option value="">--Select User--</option>
					<option ng-repeat="(key, value) in usersList" value="@{{value.user_id}}">@{{value.name}}</option>
				</select>
			</div>
		</div>	

		

		<div class="row submit-design">
			<input type="submit" ng-click="createRelease()" value="Do Set">
		</div>
	</form>
	<!-- <div class="row" style="position: relative; left: 470px;top: -360px;">
		<div class="container">
			<div class="row">
				<button ui-sref="purchaseOrderList" class="btn btn-warning">
					Purchase Order List
					<i class="fa fa-server"></i>
				</button>
			</div>	
		</div>
	</div> -->
	<pre>
		@{{releaseInfo|json}}
	</pre>
</div>

