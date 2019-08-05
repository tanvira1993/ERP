<div class="row">
	<h3 class="head header-text">Vendor Creation</h3>
</div>


<div>
	<form id="project-form" name="vendorForm" novalidate>
		<div class="row">
			<div class="label-design">
				<label for="name">Vendor Name</label>
			</div>
			<div class="col-75">				
				<input type="text" name="name" ng-model="vendorInfo.name" placeholder="">
			</div>
		</div>

		<div class="row">  
			<div class="label-design">
				<label for="address">Address</label>
			</div>     
			<div class="col-75">				        

					
				<input type="text" name="address" ng-model="vendorInfo.address" placeholder="">
			</div>
		</div>

		<div class="row">  
			<div class="label-design">
				<label for="phone">Phone No</label>
			</div>     
			<div class="col-75">				        
				<input type="number"  name="phone" ng-model="vendorInfo.phone" placeholder="">
			</div>
		</div>

		<div class="row">  
			<div class="label-design">
				<label for="title">Title</label>
			</div>     
			<div class="col-75">				        

					
				<input type="text" name="title" ng-model="vendorInfo.title" placeholder="">
			</div>
		</div>

		<div class="row">  
			<div class="label-design">
				<label for="desc">Descripction</label>
			</div>     
			<div class="col-75">				        

					
				<input type="text" name="desc" ng-model="vendorInfo.desc" placeholder="">
			</div>
		</div>

		<div class="row submit-design">
			<input type="submit" ng-click="createVendor()" value="Create">
		</div>
	</form>
	<div class="row" style="position: relative; left: 470px;top: -286px;">
		<div class="container">
			<div class="row">
				<button ui-sref="vendorList" class="btn btn-warning">
					Vendor List
					<i class="fa fa-server"></i>
				</button>
			</div>	
		</div>
	</div>
	<pre>
		@{{vendorInfo|json}}
	</pre>
</div>

