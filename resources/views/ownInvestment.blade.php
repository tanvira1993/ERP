<div class="row">
	<h3 class="head header-text">Own Investment</h3>
</div>


<div>
	<form id="ownInvestment-form" name="ownInvestmentForm" novalidate>
		<div class="row">
			<div class="label-design">
				<label for="idProject">Select Project</label>
			</div>
			<div class="col-75">				
				<select name="idProject" ng-model="ownInvestmentInfo.idProject" class="form-control select2dropdown">
					<option value="">Select Project</option>
					<option ng-repeat="(key, value) in projectList" value="@{{value.project_id}}">@{{value.name}}</option>
				</select>
			</div>
		</div>

		<div class="row">  
			<div class="label-design">
				<label for="amount">Amount</label>
			</div>     
			<div class="col-75">				        
				<input type="number"  name="amount" ng-model="ownInvestmentInfo.amount" placeholder="">
			</div>
		</div>



	




		

		<div class="row submit-design">
			<input type="submit" ng-click="createOwnInvestment()" value="Own Investment">
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
		@{{ownInvestmentInfo|json}}
	</pre>
</div>

