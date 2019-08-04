<h3 class="head header-text">Manage Projects</h3>

<table class="table table-lightgreen">
	<thead >
		<tr>
			<th scope="col" width="09%" height="1%">SN <br/><input ng-model="search.project_id" class="form-control input-sm" ></th>
			<th scope="col" width="17%">Project Name<br/><input ng-model="search.name" class="form-control input-sm" ></th>
			<th scope="col" width="17%">Project Location <br/><input ng-model="search.location" class="form-control input-sm" ></th>
			<th scope="col" width="20%">Project Description <br/><input ng-model="search.description" class="form-control input-sm" ></th>

			<th scope="col" width="30%">Action</th>

		</tr>
	</thead>
	<tbody>

		<tr scope="row" ng-repeat="(key, value) in projectList | filter:{project_id: search.project_id, name: search.name, location: search.location, description: search.description}">
			<td height="10%">@{{value.project_id}}</td>
			<td height="10%">@{{value.name}}</td>
			<td height="10%">@{{value.location}}</td>			
			<td height="10%">@{{value.description}}</td>			
			<td height="10%"> <button type="button" class="btn btn-default" aria-label="Left Align">
				<span class="fa fa-edit fa-lg" aria-hidden="true">&nbsp;Edit</span>
			</button> <button type="button" class="btn btn-default" aria-label="Left Align">
				<span class="fa fa-trash-o fa-lg" aria-hidden="true">&nbsp;Delete</span>
			</button></td>



		</tr>

	</tbody>
</table> 


<!-- <a ng-href="#!/editCategory/@{{value.id_categories}}" class="btn btn-primary"> Edit</a> -->