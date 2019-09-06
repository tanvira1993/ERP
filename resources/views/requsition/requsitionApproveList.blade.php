<div class="table-head">
	<div class="row" style="position: relative; left: 280px;top: -15px;">
		<h3 class="head ">Requistion Approve List</h3>

		<div class="row" style="position: relative; left: 425px;top: 15px;">
			<div class="container">
				<div class="row">
					<button ui-sref="allRequsitionApproveList" class="btn btn-warning">
						All List
						<i class="fa fa-server"></i>
					</button>
				</div>	
			</div>
		</div>
	</div>

	<table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
		<thead class="thead-dark">
			<tr>
				<th class="th-sm" width="9%">PR No <br/><input ng-model="search.pr_id" class="form-control input-sm" ></th>
				<th class="th-sm" width="19%">Project Name<br/><input ng-model="search.Pname" class="form-control input-sm" ></th>
				<th class="th-sm"width="19%">Material Name <br/><input ng-model="search.name" class="form-control input-sm" ></th>
				<th class="th-sm" width="10%">Quantity <br/><input ng-model="search.quantity" class="form-control input-sm" ></th>
				<th class="th-sm" width="19%">Type <br/><input ng-model="search.type" class="form-control input-sm" ></th>
				<th class="th-sm" width="24%">Requsitioner <br/><input ng-model="search.requisition_name" class="form-control input-sm" ></th>

			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="(key, value) in prApprovedListById | filter:{pr_id: search.pr_id, Pname: search.Pname, name: search.name, quantity: search.quantity, type: search.type, requisition_name: search.requisition_name}"> 
				<td>@{{value.pr_id}}</td>
				<td>@{{value.Pname}}</td>
				<td>@{{value.name}}</td>			
				<td>@{{value.quantity}}</td>			
				<td>@{{value.type}}</td>			
				<!-- <td> <button type="button" class="btn btn-default" aria-label="Left Align">
					<span class="fa fa-edit fa-lg" aria-hidden="true">&nbsp;Edit</span>
				</button> <button type="button" class="btn btn-default" aria-label="Left Align">
					<span class="fa fa-trash-o fa-lg" aria-hidden="true">&nbsp;Delete</span>
				</button></td> -->
				<td>@{{value.requisition_name}}</td>
			</tr>
		</tbody>
	</table>  
</div>













<!-- <a ng-href="#!/editCategory/@{{value.id_categories}}" class="btn btn-primary"> Edit</a> -->
