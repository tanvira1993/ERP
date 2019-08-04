<h3 class="head header-text">Purchase Requisition</h3>

<div>
	<form action="action_page.php">
		<div class="row">
			<div class="label-design">
				<label for="fname">First Name</label>
			</div>
			<div class="col-75">				
				<input type="text" id="fname" name="firstname" placeholder="">
			</div>
		</div>

		<div class="row">  
			<div class="label-design">
				<label for="fname">Last Name</label>
			</div>     
			<div class="col-75">				        
				<input type="text" id="lname" name="lastname" placeholder="">
			</div>
		</div>

		<div class="row">    
			<div class="label-design">
				<label for="fname">Select</label>
			</div>    
			<div class="col-75">				     
				<select id="country" name="country">
					<option value="australia">Australia</option>
					<option value="canada">Canada</option>
					<option value="usa">USA</option>
				</select>
			</div>
		</div>

		<div class="row submit-design">
			<input type="submit" value="Submit">
		</div>
	</form>
</div>