<div class="table-head">
	<h3 class="head ">Manage Customers</h3>

	<table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
		<thead class="thead-dark">
			<tr>
				<th class="th-sm" width="10%">SN <br/><input ng-model="search.customer_id" class="form-control input-sm" ></th>
				<th class="th-sm" width="22%">Customer Name<br/><input ng-model="search.name" class="form-control input-sm" ></th>
				<th class="th-sm"width="22%">Address <br/><input ng-model="search.address" class="form-control input-sm" ></th>
				<th class="th-sm" width="22%">Phone No<br/><input ng-model="search.phone_number" class="form-control input-sm" ></th>

				<th class="th-sm" width="24%">Action</th>

			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="(key, value) in customerList | filter:{customer_id: search.customer_id, name: search.name, address: search.address, phone_number: search.phone_number}">
				<td>@{{value.customer_id}}</td>
				<td>@{{value.name}}</td>
				<td>@{{value.address}}</td>			
				<td>@{{value.phone_number}}</td>			
				<td> <button type="button" class="btn btn-default" aria-label="Left Align">
					<span class="fa fa-edit fa-lg" aria-hidden="true">&nbsp;Edit</span>
				</button> <button type="button" class="btn btn-default" aria-label="Left Align">
					<span class="fa fa-trash-o fa-lg" aria-hidden="true">&nbsp;Delete</span>
				</button></td>
			</tr>
		</tbody>
	</table> 
</div>



<!-- <a ng-href="#!/editCategory/@{{value.id_categories}}" class="btn btn-primary"> Edit</a> -->
