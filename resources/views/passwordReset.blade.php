<h3 class="head header-text">Password Reset</h3>

<div>
	<form id="register-form" class="form-horizontal" name="passwordResetForm" novalidate>		

		<div class="row">
			<div class="label-design">
				<label for="ppassword">Previous Password</label><span style=" color :red">*</span>
			</div>
			<div class="col-75 input-group has-success" ng-class="{'has-error': passwordResetForm.ppassword.$dirty &amp;&amp;passwordResetForm.ppassword.$error.required ,  'has-success': passwordResetForm.ppassword.$valid}">				
				<input type="password" name="ppassword" ng-model="passInfo.ppassword" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" placeholder="Previous Password" required="">
			</div>
		</div>

		<div class="row">
			<div class="label-design">
				<label for="npassword">New-Password</label><span style=" color :red">*</span>
			</div>
			<div class="col-75 input-group has-success" ng-class="{'has-error': passwordResetForm.npassword.$dirty &amp;&amp;passwordResetForm.npassword.$error.required ,  'has-success': passwordResetForm.npassword.$valid}">				
				<input type="password" name="npassword" ng-model="passInfo.npassword" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" placeholder="Type Password" required="">
			</div>
		</div>
		<div class="row">
			<div class="label-design">
				<label for="repass">Retype-Password</label><span style=" color :red">*</span>
			</div>
			<div class="col-75 input-group has-success" ng-class="{'has-error': passwordResetForm.repass.$dirty &amp;&amp;passwordResetForm.repass.$error.required ,  'has-success': passwordResetForm.repass.$valid}">				
				<input type="password" name="repass" ng-model="passInfo.repass" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" placeholder="Confirm Password" required="">
				<span class="help-block ng-hide" ng-show="signupForm.pass2.$error.isValidcp">Please make sure your passwords match</span>
			</div>
		</div>

		<pre>
			@{{passInfo|json}}
		</pre> 
		<div class="row submit-design">			
			<input type="submit" ng-click="changePassword()" value="Reset">
		</div>
	</form>
</div>