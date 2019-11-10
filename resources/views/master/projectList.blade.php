<div class="table-head">
	<h3 class="head ">Manage Employees </h3>

	<table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
		<thead class="thead-dark">
			<tr>
				<th class="th-sm" width="10%">SN <br/><input ng-model="search.project_id" class="form-control input-sm" ></th>
				<th class="th-sm" width="22%">Employee Name<br/><input ng-model="search.name" class="form-control input-sm" ></th>
				<th class="th-sm"width="22%">Phone Number <br/><input ng-model="search.location" class="form-control input-sm" ></th>
				<th class="th-sm" width="22%">Designation <br/><input ng-model="search.description" class="form-control input-sm" ></th>

				<th class="th-sm" width="24%">Action</th>

			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="(key, value) in projectList | filter:{project_id: search.project_id, name: search.name, location: search.location, description: search.description}">
				<td>@{{value.project_id}}</td>
				<td>@{{value.name}}</td>
				<td>@{{value.location}}</td>			
				<td>@{{value.description}}</td>			
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
