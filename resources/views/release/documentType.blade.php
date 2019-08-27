<div class="row">
	<h3 class="head header-text">Document Type</h3>
</div>


      <div class="row">  
			<div class="label-design">
				<label for="docname">Document Name</label>
			</div>     
			<div class="col-75">				        
				<input type="text"  name="docname" ng-model="documentTypeInfo.docname" placeholder="">
			</div>
		</div>

		<div class="row">  
			<div class="label-design">
				<label for="desc">Description</label>
			</div>     
			<div class="col-75">				        
				<input type="text"  name="desc" ng-model="documentTypeInfo.desc" placeholder="">
			</div>
		</div>

		

		<div class="row submit-design">
			<input type="submit" ng-click="createDocumentType()" value="Create">
		</div>
	</form>
<!-- 	<div class="row" style="position: relative; left: 470px;top: -360px;">
		<div class="container">
			<div class="row">
				<button ui-sref="goodReceiveList" class="btn btn-warning">
					Good Receive List
					<i class="fa fa-server"></i>
				</button>
			</div>	
		</div>
	</div> -->
	<pre>
		@{{documentTypeInfo|json}}
	</pre>
</div>

