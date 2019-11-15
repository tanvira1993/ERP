 <div class="row">
 	<h3 class="head header-text">Material Report Generate</h3>
 </div>


 <div class="row">
 	<div class="label-design">
 		<label for="idMaterial">Select Material</label>
 	</div>
 	<div class="col-75">				
 		<select name="idMaterial" ng-model="projectInfo.idMaterial" class="form-control select2dropdown">
 			<option value="">Select Material</option>
 			<option ng-repeat="(key, value) in materialList" value="@{{value.material_id}}">@{{value.name}}</option>
 		</select>
 	</div>
 </div>

 <div ng-if="projectInfo.idMaterial!=null" class="row submit-design" style="margin-left: -6%; margin-top: 2%">
 	<a target="_blank" href="/materialReportGenerate/@{{projectInfo.idMaterial}}" class="btn btn-default" aria-label="Left Align">
 		<span class="fa fa-edit fa-lg" aria-hidden="true">&nbsp;Material Report </span>
 	</a>	
 </div>

<!--  <pre>
 	@{{projectInfo|json}}
 </pre> -->