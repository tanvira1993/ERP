<div class="row">
	<h3 class="head header-text">Admin Reset Password </h3>
</div>


<div>
	<form id="adminReset-form" name="adminResetForm" novalidate>
		<div class="row">
			<div class="label-design">
				<label for="idUser">Select User</label>
			</div>
			<div class="col-75">				
				<select name="idUser" ng-model="resetPassInfo.idUser" class="form-control select2dropdown">
					<option value="">Select User</option>
					<option ng-repeat="(key, value) in usersList" value="@{{value.user_id}}">@{{value.name}}</option>
				</select>
			</div>
		</div>		

		<div class="row">  
			<div class="label-design">
				<label for="password">New Password</label>
			</div>     
			<div class="col-75">				        
				<input type="password"  name="password" ng-model="resetPassInfo.password" placeholder="Password">
			</div>
		</div>		

		<div class="row submit-design">
			<input type="submit" ng-click="createForceResetPass()" value="Reset">
		</div>
	</form>
	
	<pre>
		@{{resetPassInfo|json}}
	</pre>
</div>

