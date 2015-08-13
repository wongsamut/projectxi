<?php  @session_start(); 

include('databaseconfig.php');
		
	$objConnect = mysqli_init();
	// การปรับแต่ง options ต้องทำก่อนการเชื่อมต่อ
	$objConnect->options(MYSQLI_OPT_CONNECT_TIMEOUT, 3600);
	// เชื่อมต่อ
	$objConnect->real_connect(DB_ENDPOINT_IP,DB_USERNAME,DB_PASSWORD,DB_NAME);
	$objConnect->set_charset('utf8');
	
	$sql = $objConnect->query("UPDATE user_status SET LastUpdate = NOW() WHERE UserID = '".$_SESSION["UserID"]."' ");

	$EDUSER = $_GET['data'];
	$_SESSION['EDUSER'] = $EDUSER;
	$query = $objConnect->query("SELECT * FROM user WHERE Username = '$EDUSER'");
	$objResult = $query->fetch_array();
	
	$query = $objConnect->query("SELECT * FROM user_status Where Username = '$EDUSER'");
	$objResultA = $query->fetch_array();
	
	$query = $objConnect->query("SELECT * FROM user 
	inner JOIN province on user.PROVINCE_ID = province.PROVINCE_ID 
	inner join amphur on user.AMPHUR_ID = amphur.AMPHUR_ID 
	inner join district on user.DISTRICT_ID = district.DISTRICT_ID 
	 Where Username = '$EDUSER'");
	$objResultB = $query->fetch_array();

?>
<script language="JavaScript">
// -->
function doClick(btnObj,id){
if(id=='1') {
if(btnObj.value == "edit") {
	
	document.frmPro.Ofname.disabled=false;
	document.frmPro.txtFirstName.disabled=false;
	document.frmPro.txtLastName.disabled=false;
	document.frmPro.txtGender.disabled=false;
	document.frmPro.txtPhone.disabled=false;
	document.frmPro.txtTel.disabled=false;
	document.frmPro.txtEmail.disabled=false;
	document.frmPro.txtFax.disabled=false;
	document.frmPro.txtID_Card_Num.disabled=false;

	btnObj.value = "save";
}
else {
	
	document.frmPro.Ofname.disabled=true;
	document.frmPro.txtFirstName.disabled=true;
	document.frmPro.txtLastName.disabled=true;
	document.frmPro.txtGender.disabled=true;
	document.frmPro.txtPhone.disabled=true;
	document.frmPro.txtTel.disabled=true;
	document.frmPro.txtEmail.disabled=true;
	document.frmPro.txtFax.disabled=true;
	document.frmPro.txtID_Card_Num.disabled=true;
btnObj.value = "edit";
}
}
else if (id == '2'){
if(btnObj.value == "edit")
{
	document.frmPro.txtUsername.disabled=false;
	document.frmPro.txtPassword.disabled=false;
	
	btnObj.value = "save";
	
}
else {
	
	document.frmPro.txtUsername.disabled=true;
	document.frmPro.txtPassword.disabled=true;
		
	btnObj.value = "edit";
}
	


}
else if (id == '3'){
	if(btnObj.value == "edit")
{
	document.frmPro.txtPosition.disabled=false;
	
	btnObj.value = "save";
	
}
else {
	
	document.frmPro.txtPosition.disabled=true;
		
	btnObj.value = "edit";
}
	
	
	}
}
</script>

<div class="container">
<form name="frmPro" class="form-horizontal" method="post">
  <div class="form-group row">
    <div class="col-md-5  col-md-offset-1">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title" style="font-size:20px;padding-top:2px;font-weight:bold;cursor:context-menu"><i class="fa fa-newspaper-o fa-lg" style="color:gold" ></i>&nbsp;&nbsp;ข้อมูลชื่อผู้ใช้</h3>
        </div>
        <div class="panel-body" style="font-weight:bold;cursor:context-menu">
          <div class="form-group row">
            <div class="col-md-4">
              <div align="center">
                <label class="control-label" style="padding-top:7px">ชื่อผู้ใช้ </label>
              </div>
            </div>
            <div class="col-md-2">
              <div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                <input id="txtUsername" name="txtUsername" style="font-size:18px;width:auto" class = "form-control" type="text" disabled="disabled"  value="<?= $objResultB['Username'] ?>"  />
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4">
              <div align="center">
                <label class="control-label" style="padding-top:7px">รหัสผ่าน </label>
              </div>
            </div>
            <div class="col-md-2">
              <div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                <input id="txtPassword" name="txtPassword" style="font-size:18px;width:auto" class = "form-control" type="text" disabled="disabled"  value="<?= $objResultA['varpass'] ?>"  />
              </div>
          </div>
          <br> <br>
        <center>
          <button type="button" class="btn btn-danger"  style="font-size:20px;padding-top:13px" value="edit" onclick="doClick(this,'2');"><i class="fa fa-cog fa-spin"></i>&nbsp;&nbsp;แก้ไข</button>
        </center>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-5 col-md-offset-1">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title" style="font-size:20px;padding-top:2px;font-weight:bold;cursor:context-menu"><i class="fa fa-newspaper-o fa-lg" style="color:MediumBlue" ></i>&nbsp;&nbsp;ข้อมูลการทำงานประจำตัว</h3>
      </div>
      <div class="panel-body" style="font-weight:bold;cursor:context-menu">
        <div class="form-group row">
          <div class="col-md-4">
            <div align="center">
              <label class="control-label" style="padding-top:7px">แผนก </label>
            </div>
          </div>
          <div class="col-md-2">
            <div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-suitcase fa-fw"></i></span>
              <input id="txtPosition" name="txtPosition" style="font-size:18px;width:auto" class = "form-control" type="text" disabled="disabled"  value="<?= $objResultB['Position'] ?>"  />
            </div>
          </div>
          <br> <br>
        <center>
          <button type="button" class="btn btn-danger"  style="font-size:20px;padding-top:13px" value="edit" onclick="doClick(this,'3');"><i class="fa fa-cog fa-spin"></i>&nbsp;&nbsp;แก้ไข</button>
        </center>
      
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="panel panel-info">
    <div class="panel-heading" style="font-size: 20px;font-weight:bold;cursor:context-menu"><i class="fa fa-graduation-cap fa-lg" style="color:SaddleBrown"></i>&nbsp;&nbsp;ข้อมูลส่วนตัว</div>
    <div class="panel-body" style="font-weight:bold;cursor:context-menu">
      <div class="row form-group  ">
        <div class="col-md-offset-1"> </div>
        <div class=" col-md-1">
          <label class="control-label">คำนำหน้า </label>
        </div>
        <div class="col-md-2">
          <input type="text"  name="Ofname" id="Ofname" class="form-control input-sm " disabled value="<?= $objResultB['Ofname'] ?>">
        </div>
        <div class="col-md-1">
          <label class="control-label">&nbsp;&nbsp;ชื่อ </label>
        </div>
        <div class="col-md-2">
          <input type="text"  name="txtFirstName" id="txtFirstName" class="form-control input-sm " disabled value="<?= $objResultB['Firstname'] ?>">
        </div>
        <div class="col-md-1">
          <label class="control-label">นามสกุล </label>
        </div>
        <div class="col-md-2">
          <input type="text"  name="txtLastName" id="txtLastName" class="form-control input-sm " disabled value="<?= $objResultB['Lastname'] ?>">
        </div>
        <div class="col-md-1">
          <label class="control-label">&nbsp;&nbsp;เพศ </label>
        </div>
        <div class="col-md-2">
          <input type="text"  name="txtGender" id="txtGender" class="form-control input-sm " disabled value="<?= $objResultB['Gender'] ?>">
        </div>
      </div>
      <div class="row form-group  ">
        <div class="col-md-1">
          <label class="control-label">โทรศัพท์ </label>
        </div>
        <div class="col-md-2">
          <input type="text"  name="txtPhone" id="txtPhone" class="form-control input-sm " disabled value="<?= $objResultB['Phone'] ?>">
        </div>
        <div class="col-md-1">
          <label class="control-label">มือถือ </label>
        </div>
        <div class="col-md-2">
          <input type="text"  name="txtTel" id="txtTel" class="form-control input-sm " disabled value="<?= $objResultB['Tel'] ?>">
        </div>
        <div class="col-md-1">
          <label class="control-label">Email </label>
        </div>
        <div class="col-md-2">
          <input type="text"  name="txtEmail" id="txtEmail" class="form-control input-sm " disabled value="<?= $objResultB['Email'] ?>">
        </div>
        <div class="col-md-1">
          <label class="control-label">&nbsp;&nbsp;Fax </label>
        </div>
        <div class="col-md-2">
          <input type="text"  name="txtFax" id="txtFax" class="form-control input-sm " disabled value="<?= $objResultB['Fax'] ?>">
        </div>
      </div>
      <div class="row form-group">
        <div class="col-md-1">
          <label class="control-label">เลขบัตร</label>
        </div>
        <div class="col-md-2">
          <input type="text"  name="txtID_Card_Num" id="txtID_Card_Num" class="form-control input-sm " disabled value="<?= $objResultB['ID_Card_Num'] ?>" >
        </div>
      </div>
      <div class="row ">
        <center>
          <button type="button" class="btn btn-danger"  style="font-size:20px;padding-top:13px" value="edit" onclick="doClick(this,'1');"><i class="fa fa-cog fa-spin"></i>&nbsp;&nbsp;แก้ไข</button>
        </center>
      </div>
    </div>
  </div>
  <div class="panel panel-info">
    <div class="panel-heading" style="font-size: 20px;font-weight:bold;cursor:context-menu"><i class="fa fa-home fa-lg" style="color:PeachPuff"></i>&nbsp;&nbsp;ที่อยู่</div>
    <div class="panel-body" style="font-weight:bold;cursor:context-menu">
      <div class="row form-group  ">
        <div class="col-md-1">
          <label class="control-label">บ้านเลขที่ </label>
        </div>
        <div class="col-md-2">
          <input type="text" name="txtHome_Num" id="txtHome_Num" class="form-control input-sm " disabled="disabled" value="<?= $objResultB['Home_Num'] ?>">
        </div>
        <div class="col-md-1 ">
          <label class="control-label">หมู่ </label>
        </div>
        <div class="col-md-2">
          <input type="text" name="txtMoo" id="txtMoo" class="form-control input-sm " disabled="disabled" value="<?= $objResultB['Moo'] ?>">
        </div>
        <div class="col-md-1 ">
          <label class="control-label">ถนน </label>
        </div>
        <div class="col-md-2">
          <input type="text" name="txtRoad" id="txtRoad" class="form-control input-sm " disabled="disabled" value="<?= $objResultB['Road'] ?>">
        </div>
        <div class="col-md-1">
          <label class="control-label">ตำบล </label>
        </div>
        <div class="col-md-2">
          <input type="text" name="txtTambon" id="txtTambon" class="form-control input-sm " disabled="disabled" value="<?= $objResultB['DISTRICT_NAME'] ?>">
        </div>
      </div>
      <div class="row form-group">
        <div class="col-md-1 ">
          <label class="control-label">อำเภอ </label>
        </div>
        <div class="col-md-2">
          <input type="text" name="txtAmpher" id="txtAmpher" class="form-control input-sm " disabled="disabled" value="<?= $objResultB['AMPHUR_NAME'] ?>">
        </div>
        <div class="col-md-1 ">
          <label class="control-label">จังหวัด </label>
        </div>
        <div class="col-md-2">
          <input type="text" name="txtCity" id="txtCity" class="form-control input-sm " disabled="disabled" value="<?= $objResultB['PROVINCE_NAME'] ?>">
        </div>
        <div class="col-md-1 ">
          <label class="control-label">ไปรษณีย์ </label>
        </div>
        <div class="col-md-2">
          <input type="text" name="txtPost_Code" id="txtPost_Code" class="form-control input-sm " disabled="disabled" value="<?= $objResult['POST_CODE'] ?>">
        </div>
      </div>
    </div>
  </div>
  <div class="row">
  <center>
    <button type="button" onClick="editClick()"  class="btn btn-warning bth-lg" style="font-size:20px;padding-top:13px"><i class="fa fa-floppy-o fa-lg "></i>&nbsp;&nbsp;บันทึกข้อมูล</button>
  </center>
</form>
</div>
</div>
<br>
<script src="assets/js/profile_controller-admin.js"></script>