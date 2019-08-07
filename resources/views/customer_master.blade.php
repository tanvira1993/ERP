<div class="row">
	<h3 class="head header-text">Customer Creation</h3>
</div>


<div>
	<form id="project-form" name="customerForm" novalidate>
		<div class="row">
			<div class="label-design">
				<label for="name">Customer Name</label>
			</div>
			<div class="col-75">				
				<input type="text" name="name" ng-model="customerInfo.name" placeholder="">
			</div>
		</div>

		<div class="row">  
			<div class="label-design">
				<label for="address">Address</label>
			</div>     
			<div class="col-75">				        

					
				<input type="text" name="address" ng-model="customerInfo.address" placeholder="">
			</div>
		</div>

		<div class="row">  
			<div class="label-design">
				<label for="phone">Phone No</label>
			</div>     
			<div class="col-75">				        
				<input type="number"  name="phone" ng-model="customerInfo.phone" placeholder="">
			</div>
		</div>

		<div class="row">  
			<div class="label-design">
				<label for="title">Title</label>
			</div>     
			<div class="col-75">				        

					
				<input type="text" name="title" ng-model="customerInfo.title" placeholder="">
			</div>
		</div>

		<div class="row">  
			<div class="label-design">
				<label for="desc">Descripction</label>
			</div>     
			<div class="col-75">				        

					
				<input type="text" name="desc" ng-model="customerInfo.desc" placeholder="">
			</div>
		</div>
		

		<div class="row submit-design">
			<input type="submit" ng-click="createCustomer()" value="Create">
		</div>
	</form>
	<div class="row" style="position: relative; left: 470px;top: -366px;">
		<div class="container">
			<div class="row">
				<button ui-sref="customerList" class="btn btn-warning">
					Customer List
					<i class="fa fa-server"></i>
				</button>
			</div>	
		</div>
	</div>
	<pre>
		@{{customerInfo|json}}
	</pre>
</div>

