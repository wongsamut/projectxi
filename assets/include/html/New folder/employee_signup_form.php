
        <div class="container">
    <div class="form-group row">
        <div class="col-xs-12"><h3>Employee signup Form</h3><hr/></div>
    </div>
    <form>
    <div class="form-group row">
        <div class="col-md-4"><label>First name</label></div>
        <div class="col-md-8"><input id="txtFirstName"  class = "form-control" type="text"/></div>
    </div>
    <div class="form-group row">
        <div class="col-md-4"><label>Last name</label></div>
        <div class="col-md-8"><input id="txtLastName"  class = "form-control" = type="text"/></div>
    </div>
    <div class="form-group row">
        <div class="col-md-4"><label>Gender</label></div>
        <div class="col-md-8">
        <label><input name="rdGender" type="radio" value ="male" checked>Male
        <label><input name="rdGender" type="radio" value="female">Female
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4"><label>Age</label></div>
        <div class="col-md-8"><input id="txtAge"  class = "form-control" = type="text"/></div>
    </div>
    <div class="form-group row">
        <div class="col-md-4"><label>Department</label></div>
        <div class="col-md-8">
        		<select id="selDepartment" class="form-control">
                <?php
				include('../functions/database_config.php');

				$username = $_POST['txtUsername'];
				$password = md5($_POST['txtPassword']);

				$objConnect = mysql_connect(DB_ENDPOINT_IP,DB_USERNAME,DB_PASSWORD);
								mysql_select_db(DB_NAME);
					mysql_query('SET NAMES utf8');


				$query = "SELECT * FROM department";
				$objQuery = mysql_query($query);
				
				while($objResult = mysql_fetch_array($objQuery))
				{
				?>
                	<option value="<?=$objResult['department_id']?>"><?=$objResult['department_name']?></option>
        	 <?php  
				}
				mysql_close($objConnect); 
				?>
        		</select></div>
    </div>
    <div class="form-group row">
        <div class="col-md-4"><label>E-mail</label></div>
        <div class="col-md-8"><input  id="txtEmail" class = "form-control" = type="text"/></div>
    </div>
    <div class="form-group row">
        <div class="col-md-4"><label>Tel.</label></div>
        <div class="col-md-8"><input id="txtTel" class = "form-control" = type="text"/></div>
    </div>
    <div class="form-group row">
        <div class="col-md-4"><label>Photo.</label></div>
        <div class="col-md-8"><input  id="filePhoto" class = "form-control" = type="file"/></div>
    </div>
    <div class="form-group row">
        <div class="col-md-offset-4 col-md-8">
        <button id="btnInsert" class="btn btn-success">Save</button>
        <button class=" btn btn-danger " type="reset">Clear</button></div>
    </div>
    		</form>
		</div>
        <script src="assets/js/signup_controller.js"></script>

