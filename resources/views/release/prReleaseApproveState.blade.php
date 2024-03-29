<div class="row table-head" ng-if="approverList1.length<=0 &&  approverList2.length<=0  && approverList3.length<=0  && approverList4.length<=0 ">
	<h5 class="head header-text">Approval List Empty</h5>

</div>
<div class="row table-head">
	<div class="col-md-6 col-sm-12" ng-if="approverList1.length>0">
		<div >
			<div >

				<h5 class="head header-text">PR Level-1 Approval</h5>

			</div>
			<div style="height:200px;overflow-y: scroll"> 
				<div class="table-scrollable table-scrollable-borderless">
					<div class="table-responsive">

						<table class="table table-hover table-striped table-bordered table-sm" cellspacing="0" width="100%" >
							<thead class="thead-dark">
								<tr>
									<th class="th-sm" width="10%">PR <br/><input ng-model="search.pr_id" class="form-control input-sm" ></th>
									<th class="th-sm" width="18%">Project <br/><input ng-model="search.Pname" class="form-control input-sm" ></th>
									<th class="th-sm" width="18%">Material <br/><input ng-model="search.name" class="form-control input-sm" ></th>
									<th class="th-sm" width="10%">Quantity<br/><input ng-model="search.quantity" class="form-control input-sm" ></th>
									<th class="th-sm" width="43%">Action</th>

								</tr>
							</thead>

							<tbody>
								<tr ng-repeat="(key, value) in approverList1 | filter:{pr_id: search.pr_id, Pname: search.Pname, name: search.name, quantity: search.quantity}"> 
									<td> <a ng-href="#!/prReleaseStateDetails/@{{value.pr_id}}">@{{value.pr_id}}</a></td>
									<td>@{{value.Pname}}</td>			
									<td>@{{value.name}}</td>			
									<td>@{{value.quantity}}</td>			
									<td> <button ng-click="prApprove(value.pr_id,value.l1,value.l2, value.l3, value.l4)" type="button" class="btn btn-default" aria-label="Left Align">
										<span class="fa fa-check fa-sm" aria-hidden="true">&nbsp;Approve</span>
									</button> 
									<button type="button" ng-click="prReject(value.pr_id,value.l1,value.l2, value.l3, value.l4)"  class="btn btn-default" aria-label="Left Align">
										<span class="fa fa-remove fa-sm" aria-hidden="true">&nbsp;Reject</span>
									</button></td>			
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>


		</div>

	</div>
	<div class="col-md-6 col-sm-12" ng-if="approverList2.length>0">
		<div >
			<div >

				<h5 class="head header-text">PR Level-2 Approval</h5>

			</div>

			<div style="height:200px;overflow-y: scroll"> 
				<div class="table-scrollable table-scrollable-borderless">
					<div class="table-responsive">
						<table class="table table-hover table-striped table-bordered table-sm" cellspacing="0" width="100%" >
							<thead class="thead-dark">
								<tr>
									<th class="th-sm" width="10%">PR <br/><input ng-model="search.pr_id" class="form-control input-sm" ></th>
									<th class="th-sm" width="18%">Project <br/><input ng-model="search.Pname" class="form-control input-sm" ></th>
									<th class="th-sm" width="18%">Material <br/><input ng-model="search.name" class="form-control input-sm" ></th>
									<th class="th-sm" width="10%">Quantity<br/><input ng-model="search.quantity" class="form-control input-sm" ></th>
									<th class="th-sm" width="43%">Action</th>
								</tr>
							</thead> 

							<tbody>
								<tr ng-repeat="(key, value) in approverList2 | filter:{pr_id: search.pr_id, Pname: search.Pname, name: search.name, quantity: search.quantity}"> 
									<td> <a ng-href="#!/prReleaseStateDetails/@{{value.pr_id}}">@{{value.pr_id}}</a></td>
									<td>@{{value.Pname}}</td>			
									<td>@{{value.name}}</td>			
									<td>@{{value.quantity}}</td>				
									<td> <button ng-click="prApprove(value.pr_id,value.l1,value.l2, value.l3, value.l4)" type="button" class="btn btn-default" aria-label="Left Align">
										<span class="fa fa-check fa-sm" aria-hidden="true">&nbsp;Approve</span>
									</button> 
									<button type="button" ng-click="prReject(value.pr_id,value.l1,value.l2, value.l3, value.l4)" class="btn btn-default" aria-label="Left Align">
										<span class="fa fa-remove fa-sm" aria-hidden="true">&nbsp;Reject</span>
									</button></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>


		</div>

	</div>
</div>

<div class="row table-head">
	<div class="col-md-6 col-sm-12" ng-if="approverList3.length>0">
		<div >
			<div >

				<h5 class="head header-text">PR Level-3 Approval</h5>

			</div>

			<div style="height:200px;overflow-y: scroll"> 
				<div class="table-scrollable table-scrollable-borderless">
					<div class="table-responsive">
						<table class="table table-hover table-striped table-bordered table-sm" cellspacing="0" width="100%" >
							<thead class="thead-dark">
								<tr>
									<th class="th-sm" width="10%">PR <br/><input ng-model="search.pr_id" class="form-control input-sm" ></th>
									<th class="th-sm" width="18%">Project <br/><input ng-model="search.Pname" class="form-control input-sm" ></th>
									<th class="th-sm" width="18%">Material <br/><input ng-model="search.name" class="form-control input-sm" ></th>
									<th class="th-sm" width="10%">Quantity<br/><input ng-model="search.quantity" class="form-control input-sm" ></th>
									<th class="th-sm" width="43%">Action</th>

								</tr>
							</thead>

							<tbody>
								<tr ng-repeat="(key, value) in approverList3 | filter:{pr_id: search.pr_id, Pname: search.Pname, name: search.name, quantity: search.quantity}"> 
									<td> <a ng-href="#!/prReleaseStateDetails/@{{value.pr_id}}">@{{value.pr_id}}</a></td>
									<td>@{{value.Pname}}</td>			
									<td>@{{value.name}}</td>			
									<td>@{{value.quantity}}</td>		
									<td> <button ng-click="prApprove(value.pr_id,value.l1,value.l2, value.l3, value.l4)" type="button" class="btn btn-default" aria-label="Left Align">
										<span class="fa fa-check fa-sm" aria-hidden="true">&nbsp;Approve</span>
									</button> 
									<button type="button" ng-click="prReject(value.pr_id,value.l1,value.l2, value.l3, value.l4)" class="btn btn-default" aria-label="Left Align">
										<span class="fa fa-remove fa-sm" aria-hidden="true">&nbsp;Reject</span>
									</button></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>

	</div>
	<div class="col-md-6 col-sm-12" ng-if="approverList4.length>0">
		<div >
			<div >

				<h5 class="head header-text">PR Level-4 Approval</h5>

			</div>
			<div style="height:200px;overflow-y: scroll"> 
				<div class="table-scrollable table-scrollable-borderless">
					<div class="table-responsive">
						<table class="table table-hover table-striped table-bordered table-sm" cellspacing="0" width="100%" >
							<thead class="thead-dark">
								<tr>
									<th class="th-sm" width="10%">PR <br/><input ng-model="search.pr_id" class="form-control input-sm" ></th>
									<th class="th-sm" width="18%">Project <br/><input ng-model="search.Pname" class="form-control input-sm" ></th>
									<th class="th-sm" width="18%">Material <br/><input ng-model="search.name" class="form-control input-sm" ></th>
									<th class="th-sm" width="10%">Quantity<br/><input ng-model="search.quantity" class="form-control input-sm" ></th>
									<th class="th-sm" width="43%">Action</th>

								</tr>
							</thead>

							<tbody>
								<tr ng-repeat="(key, value) in approverList4 | filter:{pr_id: search.pr_id, Pname: search.Pname, name: search.name, quantity: search.quantity}"> 
									<td> <a ng-href="#!/prReleaseStateDetails/@{{value.pr_id}}">@{{value.pr_id}}</a></td>
									<td>@{{value.Pname}}</td>			
									<td>@{{value.name}}</td>			
									<td>@{{value.quantity}}</td>		
									<td> <button ng-click="prApprove(value.pr_id,value.l1,value.l2, value.l3, value.l4)" type="button" class="btn btn-default" aria-label="Left Align">
										<span class="fa fa-check fa-sm" aria-hidden="true">&nbsp;Approve</span>
									</button> 
									<button type="button" ng-click="prReject(value.pr_id,value.l1,value.l2, value.l3, value.l4)" class="btn btn-default" aria-label="Left Align">
										<span class="fa fa-remove fa-sm" aria-hidden="true">&nbsp;Reject</span>
									</button></td>			
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>