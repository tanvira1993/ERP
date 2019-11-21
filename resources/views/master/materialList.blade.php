<!-- <link rel="stylesheet" href="bootstrap.min.css" /> -->
<div class="table-head">
	<h3 class="head ">Manage Materials</h3>

	<table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
		<thead class="thead-dark">
			<tr>
				<th class="th-sm" width="10%">SN <br/><input ng-model="search.material_id" class="form-control input-sm" ></th>
				<th class="th-sm" width="22%">Material Name<br/><input ng-model="search.name" class="form-control input-sm" ></th>
				<th class="th-sm"width="22%">Material Type <br/><input ng-model="search.type" class="form-control input-sm" ></th>
				<th class="th-sm" width="22%">Material Description <br/><input ng-model="search.descriptions" class="form-control input-sm" ></th>

				<th class="th-sm" width="24%">Action</th>

			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="(key, value) in materialListLocal | filter:{material_id: search.material_id, name: search.name, type: search.type, descriptions: search.descriptions}">
				<td>@{{value.material_id}}</td>
				<td>@{{value.name}}</td>
				<td ng-if="value.type=='Asset'">Consume</td>			
				<td ng-if="value.type=='Normal'">Scrap</td>			
				<td>@{{value.descriptions}}</td>			
				<!-- <td> <button type="button" class="btn btn-default" aria-label="Left Align">
					<span class="fa fa-edit fa-lg" aria-hidden="true">&nbsp;Edit</span>
				</button> <button type="button" class="btn btn-default" aria-label="Left Align">
					<span class="fa fa-trash-o fa-lg" aria-hidden="true">&nbsp;Delete</span>
				</button></td> -->
				<td>Coming Soon...</td>				
				<!-- <td>@{{filteredTodos.length}}</td>				 -->
			</tr>
		</tbody>
	</table> 
</div>



<!-- <a ng-href="#!/editCategory/@{{value.id_categories}}" class="btn btn-primary"> Edit</a> -->
