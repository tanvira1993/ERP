<div class="row">
	<h3 class="head header-text">Project Creation</h3>
</div>


<div>
	<form id="project-form" name="projectForm" novalidate>
		<div class="row">
			<div class="label-design">
				<label for="name">Project Name</label>
			</div>
			<div class="col-75">				
				<input type="text" name="name" ng-model="projectInfo.name" placeholder="">
			</div>
		</div>

		<div class="row">  
			<div class="label-design">
				<label for="location">Project Location</label>
			</div>     
			<div class="col-75">				        
				<input type="text"  name="location" ng-model="projectInfo.location" placeholder="">
			</div>
		</div>

		<div class="row">  
			<div class="label-design">
				<label for="desc">Description</label>
			</div>     
			<div class="col-75">				        
				<input type="text"  name="desc" ng-model="projectInfo.desc" placeholder="">
			</div>
		</div>

		<div class="row submit-design">
			<input type="submit" ng-click="createProject()" value="Create">
		</div>
	</form>
	<div class="row" style="position: relative; left: 470px;top: -286px;">
		<div class="container">
			<div class="row">
				<button ui-sref="projectList" class="btn btn-warning">
					Project List
					<i class="fa fa-server"></i>
				</button>
			</div>	
		</div>
	</div>
	<!-- <pre>
		@{{projectInfo|json}}
	</pre> -->
</div>

