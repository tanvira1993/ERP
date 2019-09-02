<div class="table-head">
<div class="row" style="position: relative; left: 280px;top: -15px;">
		<h3 class="head ">ALL Requsitions</h3>


</div>

	<table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
		<thead class="thead-dark">
			<tr>
				<th class="th-sm" width="9%">SN <br/><input ng-model="search.pr_id" class="form-control input-sm" ></th>
				<th class="th-sm" width="19%">Project Name<br/><input ng-model="search.Pname" class="form-control input-sm" ></th>
				<th class="th-sm"width="19%">Material Name <br/><input ng-model="search.name" class="form-control input-sm" ></th>
				<th class="th-sm" width="10%">Quantity <br/><input ng-model="search.quantity" class="form-control input-sm" ></th>
				<th class="th-sm" width="19%">Asset <br/><input ng-model="search.type" class="form-control input-sm" ></th>
				<th class="th-sm" width="24%">Action</th>

			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="(key, value) in requsitionListById | filter:{pr_id: search.pr_id, Pname: search.Pname, name: search.name, quantity: search.quantity, type: search.type}"> 
				<td>@{{value.pr_id}}</td>
				<td>@{{value.Pname}}</td>
				<td>@{{value.name}}</td>			
				<td>@{{value.quantity}}</td>			
				<td>@{{value.type}}</td>			
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
