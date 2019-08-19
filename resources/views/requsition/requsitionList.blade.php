<div class="table-head">
	<h3 class="head ">Manage Requsitions</h3>

	<table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
		<thead class="thead-dark">
			<tr>
				<th class="th-sm" width="9%">SN <br/><input ng-model="search.material_id" class="form-control input-sm" ></th>
				<th class="th-sm" width="19%">Project Name<br/><input ng-model="search.name" class="form-control input-sm" ></th>
				<th class="th-sm"width="19%">Material Name <br/><input ng-model="search.type" class="form-control input-sm" ></th>
				<th class="th-sm" width="10%">Quantity <br/><input ng-model="search.descriptions" class="form-control input-sm" ></th>
				<th class="th-sm" width="19%">Vendor <br/><input ng-model="search.descriptions" class="form-control input-sm" ></th>
				<th class="th-sm" width="24%">Action</th>

			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="(key, value) in materialList | filter:{material_id: search.material_id, name: search.name, type: search.type, descriptions: search.descriptions}">
				<td>@{{value.material_id}}</td>
				<td>@{{value.name}}</td>
				<td>@{{value.type}}</td>			
				<td>@{{value.descriptions}}</td>			
				<td>@{{value.descriptions}}</td>			
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
