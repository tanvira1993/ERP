 <div class="row">
 	<h3 class="head header-text">Stock Report Generate</h3>
 </div>


 <div>
 	<form id="project-form" name="projectForm" novalidate>

 		<div class="row">  
 			<div class="label-design">
 				<label for="type">Select Type</label>
 			</div>     
 			<div class="col-75">				        
 				<select name="type" ng-change="getAllProjectListByEID(projectInfo.type)" ng-model="projectInfo.type" class="form-control">
 					<option value="">Select Type</option>
 					<option value='1'>Employer</option>
 					<option value='0'>Employee</option>

 				</select>
 			</div>
 		</div>

 		<div class="row">
 			<div class="label-design">
 				<label for="idProject">Select Employer</label>
 			</div>
 			<div class="col-75">				
 				<select name="idProject" ng-model="projectInfo.idProject" class="form-control select2dropdown">
 					<option value="">Select Employer</option>
 					<option ng-repeat="(key, value) in getEmployerOrEmployee" value="@{{value.project_id}}">@{{value.name}}</option>
 				</select>
 			</div>
 		</div>

 		<div ng-if="projectInfo.idProject!=null && projectInfo.type!=null" class="row submit-design" style="margin-left: -6%; margin-top: 2%">
 			<a target="_blank" href="/stockReportGenerate/@{{projectInfo.idProject}}" class="btn btn-default" aria-label="Left Align">
 				<span class="fa fa-edit fa-lg" aria-hidden="true">&nbsp;Generate</span>
 			</a>	
 		</div>

 		<!-- <div class="row submit-design">
 			<input type="submit" ng-click="stockReportPrint(projectInfo.idProject)" value="Report">
 		</div> -->
 	</form>

 	<!-- <pre>
 		@{{projectInfo|json}}
 	</pre> -->
 </div>

