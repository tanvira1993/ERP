<h3 class="head header-text">User Creation</h3>

<div>
	<form id="register-form" class="form-horizontal" name="userRegistrationForm" novalidate>
		<div class="row">
			<div class="label-design">
				<label for="name">Name</label><span style=" color :red">*</span>
			</div>
			<div class="col-75 input-group has-success" ng-class="{'has-error': userRegistrationForm.name.$dirty &amp;&amp;userRegistrationForm.name.$error.required ,  'has-success': userRegistrationForm.name.$valid}">				
				<input type="text" name="name" ng-model="userInfo.name" class="form-control ng-not-empty ng-dirty ng-valid-parse ng-valid ng-valid-required ng-touched" placeholder="Name" required="">
			</div>
		</div>

		<div class="row">
			<div class="label-design">
				<label for="email">Email</label><span style=" color :red">*</span>
			</div>
			<div class="col-75 input-group has-success" ng-class="{'has-error': userRegistrationForm.email.$dirty &amp;&amp;userRegistrationForm.email.$error.required ,  'has-success': userRegistrationForm.email.$valid}">				
				<input type="text" name="email" ng-model="userInfo.email" class="form-control ng-not-empty ng-dirty ng-valid-parse ng-valid ng-valid-required ng-touched" placeholder="Email" required="">
			</div>
		</div>
		<div class="row">
			<div class="label-design">
				<label for="mobile">Mobile No.</label><span style=" color :red">*</span>
			</div>
			<div class="col-75 input-group has-success" ng-class="{'has-error': userRegistrationForm.mobile.$dirty &amp;&amp;userRegistrationForm.mobile.$error.required ,  'has-success': userRegistrationForm.mobile.$valid}">				
				<input type="number" name="mobile" ng-model="userInfo.mobile" class="form-control ng-not-empty ng-dirty ng-valid-parse ng-valid ng-valid-required ng-touched" placeholder="Mobile" required="">
			</div>
		</div>
		<div class="row">
			<div class="label-design">
				<label for="position">Job Position</label><span style=" color :red">*</span>
			</div>
			<div class="col-75 input-group has-success" ng-class="{'has-error': userRegistrationForm.position.$dirty &amp;&amp;userRegistrationForm.position.$error.required ,  'has-success': userRegistrationForm.position.$valid}">				
				<input type="text" name="position" ng-model="userInfo.position" class="form-control ng-not-empty ng-dirty ng-valid-parse ng-valid ng-valid-required ng-touched" placeholder="Set Position" required="">
			</div>
		</div>
		<div class="row">
			<div class="label-design">
				<label for="role">Role</label><span style=" color :red">*</span>
			</div>
			<div class="col-75 input-group has-success" ng-class="{'has-error': userRegistrationForm.role.$dirty &amp;&amp;userRegistrationForm.role.$error.required ,  'has-success': userRegistrationForm.role.$valid}">				
				<input type="number" name="role" ng-model="userInfo.role" class="form-control ng-not-empty ng-dirty ng-valid-parse ng-valid ng-valid-required ng-touched" placeholder="User Role" required="">
			</div>
		</div>
		<div class="row">
			<div class="label-design">
				<label for="password">Password</label><span style=" color :red">*</span>
			</div>
			<div class="col-75 input-group has-success" ng-class="{'has-error': userRegistrationForm.password.$dirty &amp;&amp;userRegistrationForm.password.$error.required ,  'has-success': userRegistrationForm.password.$valid}">				
				<input type="password" name="password" ng-model="userInfo.password" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" placeholder="Type Password" required="">
			</div>
		</div>
		<div class="row">
			<div class="label-design">
				<label for="repass">Retype-Password</label><span style=" color :red">*</span>
			</div>
			<div class="col-75 input-group has-success" ng-class="{'has-error': userRegistrationForm.repass.$dirty &amp;&amp;userRegistrationForm.repass.$error.required ,  'has-success': userRegistrationForm.repass.$valid}">				
				<input type="password" name="repass" ng-model="userInfo.repass" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" placeholder="Confirm Password" required="">
				<span class="help-block ng-hide" ng-show="signupForm.pass2.$error.isValidcp">Please make sure your passwords match</span>
			</div>
		</div>

		<!-- <pre>
			@{{userInfo|json}}
		</pre>  -->
		<div class="row submit-design">			
			<input type="submit" ng-click="createUser()" value="Create">
		</div>
	</form>
</div>