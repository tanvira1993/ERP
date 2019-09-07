<div class="table-head">
	<h3 class="head ">Materials Reports</h3>

	<table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
		<thead class="thead-dark">
			<tr>
				<th class="th-sm" width="10%">SN <br/></th>
				<th class="th-sm" width="20%">Material Name<br/><input ng-model="search.name" class="form-control input-sm" ></th>
				<th class="th-sm"width="20%">Material Type <br/><input ng-model="search.type" class="form-control input-sm" ></th>
				<th class="th-sm" width="10%">Quantity <br/><input ng-model="search.quantity" class="form-control input-sm" ></th>
				<th class="th-sm" width="20%">Project <br/><input ng-model="search.Pname" class="form-control input-sm" ></th>
				<th class="th-sm" width="20%">Vendor <br/><input ng-model="search.vname" class="form-control input-sm" ></th>

			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="(key, value) in tlist | filter:{name: search.name, type: search.type, quantity: search.quantity, Pname: search.Pname,vname: search.vname}">
				<td>@{{key+1}}</td>
				<td>@{{value.name}}</td>
				<td>@{{value.type}}</td>			
				<td>@{{value.quantity}}</td>			
				<td>@{{value.Pname}}</td>
				<td>@{{value.vname}}</td>
			</tr>
		</tbody>
	</table>
</div>



<!-- <a ng-href="#!/editCategory/@{{value.id_categories}}" class="btn btn-primary"> Edit</a> -->
