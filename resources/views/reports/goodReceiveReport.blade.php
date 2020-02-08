<link data-require="bootstrap-css@*" data-semver="3.3.1" rel="stylesheet" href="bootstrap.min.css" />
<div class="table-head">
	<h3 class="head ">Received Reports</h3>

	<table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
		<thead class="thead-dark">
			<tr>
				<th class="th-sm" width="10%">SN <br/></th>
				<th class="th-sm" width="20%">Material Name<br/><input ng-model="search.name" class="form-control input-sm" ></th>
				<th class="th-sm"width="20%">Material Type <br/><input ng-model="search.type" class="form-control input-sm" ></th>
				<th class="th-sm" width="10%">Quantity <br/><input ng-model="search.quantity" class="form-control input-sm" ></th>
				<th class="th-sm" width="20%">Price P/U<br/><input ng-model="search.price" class="form-control input-sm" ></th>
				<th class="th-sm" width="20%">Date <br/><input placeholder="year-month-date" ng-model="search.created_at" class="form-control input-sm" ></th>
				<th class="th-sm" width="24%">Action</th>


			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="(key, value) in filteredTodosG | filter:{name: search.name, type: search.type, quantity: search.quantity, price: search.price,created_at: search.created_at}">
				<td>@{{key+1}}</td>
				<td>@{{value.name}}</td>
				<td ng-if="value.type=='Asset'">Consume</td>			
				<td ng-if="value.type=='Normal'">Scrap</td>					
				<td>@{{value.quantity}}</td>			
				<td>@{{value.price}}</td>
				<td>@{{value.created_at}}</td>
				<td> <button type="button" ng-click="deleteGoodReceiveSingleHistory(value.gr_id)"class="btn btn-default" aria-label="Left Align">
					<span class="fa fa-trash-o fa-lg" aria-hidden="true">&nbsp;Delete</span>
				</button></td>
			</tr>
		</tbody>
	</table> 
</div>

<pagination 
ng-model="currentPageG"
total-items="goodReceiveLists.length"
max-size="maxSizeG"  
items-per-page="numPerPageG"
boundary-links="true">
</pagination>



<!-- <a ng-href="#!/editCategory/@{{value.id_categories}}" class="btn btn-primary"> Edit</a> -->
