 <div class="row">
 	<h3 class="head header-text">Scrap Report Generate</h3>
 </div>


 <div class="row">
 	<div class="label-design">
 		<label for="idProject">Select Employer</label>
 	</div>
 	<div class="col-75">				
 		<select name="idProject" ng-model="projectInfo.idProject" class="form-control select2dropdown">
 			<option value="">Select Employer</option>
 			<option ng-repeat="(key, value) in getEmployer" value="@{{value.project_id}}">@{{value.name}}</option>
 		</select>
 	</div>
 </div>

 <div ng-if="projectInfo.idProject!=null" class="row submit-design" style="margin-left: -6%; margin-top: 2%">
 	<a target="_blank" href="/scrapReportGenerate/@{{projectInfo.idProject}}" class="btn btn-default" aria-label="Left Align">
 		<span class="fa fa-edit fa-lg" aria-hidden="true">&nbsp;Scrap Report </span>
 	</a>	
 </div>

 <!-- <pre>
 	@{{projectInfo|json}}
 </pre> -->