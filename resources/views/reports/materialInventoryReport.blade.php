     <link data-require="bootstrap-css@*" data-semver="3.3.1" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />

     <div class="table-head">
     	<h3 class="head ">Stock Reports</h3>

     	<table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
     		<thead class="thead-dark">
     			<tr>
     				<th class="th-sm" width="10%">SN <br/></th>
     				<th class="th-sm" width="20%">Material Name<br/><input ng-model="search.name" class="form-control input-sm" ></th>
     				<th class="th-sm"width="20%">Material Type <br/><input ng-model="search.type" class="form-control input-sm" ></th>
     				<th class="th-sm" width="10%">Quantity <br/><input ng-model="search.quantity" class="form-control input-sm" ></th>
     				<th class="th-sm" width="20%">Employee Name <br/><input ng-model="search.Pname" class="form-control input-sm" ></th>
     				<th class="th-sm" width="20%">Vendor <br/><input ng-model="search.vname" class="form-control input-sm" ></th>

     			</tr>
     		</thead>
     		<tbody>
     			<tr ng-repeat="(key, value) in filteredTodosKKK | filter:{name: search.name, type: search.type, quantity: search.quantity, Pname: search.Pname,vname: search.vname}">
     				<td>@{{key+1}}</td>
     				<td>@{{value.name}}</td>
     				<td ng-if="value.type=='Asset'">Consume</td>			
     				<td ng-if="value.type=='Normal'">Scrap</td>		
     				<td>@{{value.quantity}}</td>			
     				<td>@{{value.Pname}}</td>
     				<td>@{{value.vname}}</td>
     			</tr>
     		</tbody>
     	</table> 
     </div>


     <pagination 
     ng-model="currentPageKKK"
     total-items="materialReportOnMaterial.length"
     items-per-page="numPerPageKKK"
     max-size="maxSizeKKK"  
     boundary-links="true">
 </pagination>




 <!-- <a ng-href="#!/editCategory/@{{value.id_categories}}" class="btn btn-primary"> Edit</a> -->
