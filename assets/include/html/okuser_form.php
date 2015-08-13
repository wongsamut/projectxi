<?php
	@session_start();
	include('databaseconfig.php');
		
	$objConnect = mysqli_init();
	// การปรับแต่ง options ต้องทำก่อนการเชื่อมต่อ
	$objConnect->options(MYSQLI_OPT_CONNECT_TIMEOUT, 3600);
	// เชื่อมต่อ
	$objConnect->real_connect(DB_ENDPOINT_IP,DB_USERNAME,DB_PASSWORD,DB_NAME);
	$objConnect->set_charset('utf8');
	//*** Update Last Stay in Login System
	$sql = $objConnect->query("UPDATE user_status SET LastUpdate = NOW() WHERE UserID = '".$_SESSION["UserID"]."' ");
	
	
	$queryA = "SELECT count(confirm) from user_status WHERE confirm = 'no'";
	$objQueryA = mysqli_query($objConnect,$queryA);
	$objResultA = mysqli_fetch_row($objQueryA);
	
	$queryB = "SELECT count(Repo) from user_status WHERE Repo = 'yes'";	
	$objQueryB = mysqli_query($objConnect,$queryB);
	$objResultB = mysqli_fetch_row($objQueryB);
	
	$queryC = "SELECT count(confirm) from user_status WHERE Deuser = 'yes'";
	$objQueryC = mysqli_query($objConnect,$queryC);
	$objResultC = mysqli_fetch_row($objQueryC);

?>
<div  class="container">
  <div class="panel panel-success">
    <div class="panel-heading" aria-expanded="false" data-toggle="collapse" data-target="#panel-Confirm">  
      <h3 class="panel-title" style="font-size:22px;font-weight:bold;cursor:context-menu"><i style="font-size: 25px;" class="fa fa-user-plus"></i>&nbsp;&nbsp;ยืนยันผู้ใช้ <font style="float:right"><span class="badge" style="font-weight:bold;background-color:#00F"><font color="#FFFF00" style="font-size:17px"><?php echo $objResultA[0]; ?></font></span></font></h3>
    </div>
  <!--management-->
  <div class="collapse panel-body" role="tabpanel" aria-labelledby="headingTwo" id="panel-Confirm">
    <div class="form form-group row">
      <div class="col-md-offset-2 col-md-2">
      <h3 style="  margin-top: 9px;">
        ค้นหาชื่อผู้ใช้
      </h3>
      </div>
      <div class="col-md-4">
        <input id="txt" class="form-control" type="text" style="font-size:18px;font-weight:bold;" />
      </div>
      <div class="col-md-4">
        <button style=" padding: 7px 20px;" id="btnSearchSignup" class="btn btn-success btn-lg" type="button"><i class="fa fa-search "></i></button>
      </div>
    </div>
    <div id="contect-ho">
    <?php
	
			$query = "select username as a,status as s,confirm as c from user_status  where confirm = 'no'";
			$objQuery = mysqli_query($objConnect,$query);
			$objResult = mysqli_fetch_assoc($objQuery);
			if($objResult)
           {

			 ?>
          	<table class="table table-bordered table-hover table-striped" style="border-collapse:inherit;">
          	<tr class="info" style="cursor:context-menu">
            <th><center><span style="font-weight:bold">ชื่อผู้ใช้</span></center></th>
            <th><center><span style="font-weight:bold">สถานะ</span></center></th>
            <th><center><span style="font-weight:bold">การยืนยัน</span></center></th>
            </tr> 
            <?php   
			$query = "select username as a,status as s,confirm as c from user_status  where confirm = 'no'";
			$objQuery = mysqli_query($objConnect,$query);
            while($objResult = mysqli_fetch_array($objQuery)) { ?>
            
            <tr align="center" style="cursor:context-menu">
            <td><center><span style="font-weight:bold"><button value="<?= $objResult["a"] ?>" class="btn btn-default"  onclick="btnOkUserPRO(this);"><?= $objResult['a'] ?></button></span></center></td>
            <td><center><span style="font-weight:bold"><?=$objResult['s']?></span></center></td>
            <td><center><span style="font-weight:bold"><i class="fa fa-times fa-lg" style="color:#F00"></i></span></center></td>
            </tr>
            <?php } }else{} ?> </table><?
			
			?>
            </div>
    </div>
  </div>
    
    <div class="panel panel-warning">
    <div class="panel-heading" aria-expanded="false" data-toggle="collapse" data-target="#panel-Edit">
      <h3 class="panel-title" style="font-size:22px;font-weight:bold;cursor:context-menu"><i style="font-size: 25px;" class="fa fa-user-times"></i>&nbsp;&nbsp;แก้ไขผู้ใช้ <font style="float:right"><span class="badge" style="font-weight:bold;background-color:#00F"><font color="#FFFF00" style="font-size:17px"><?php echo $objResultB[0]; ?></font></span></font></h3>
    </div>
  <!--management-->
  <div class="collapse panel-body" role="tabpanel" aria-labelledby="headingTwo" id="panel-Edit">
    <div class="form form-group row">
      <div class="col-md-offset-2 col-md-2">
      <h3 style="  margin-top: 9px;">
        ค้นหาชื่อผู้ใช้
      </h3>
      </div>
      <div class="col-md-4">
        <input id="txtdd" class="form-control" type="text" style="font-size:18px;font-weight:bold;" />
      </div>
      <div class="col-md-4">
        <button style=" padding: 7px 20px;" id="btnSearchUserEd" class="btn btn-warning btn-lg" type="button"><i class="fa fa-search "></i></button>
      </div>
    </div>
    <div id="contect-hodd">
    <?php
	
			$query = "select username as a,status as s,Repo as c,Textpo as d from user_status  where confirm = 'yes' and Repo = 'yes'";
			$objQuery = mysqli_query($objConnect,$query);
			$objResult = mysqli_fetch_assoc($objQuery);
			if($objResult)
           {

			 ?>
          <table class="table table-bordered table-hover table-striped" style="border-collapse:inherit;">
          <tr class="info" style="cursor:context-menu">
            <th><center><span style="font-weight:bold">ชื่อผู้ใช้</span></center></th>
            <th><center><span style="font-weight:bold">สถานะ</span></center></th>
            <th><center><span style="font-weight:bold">ขอแก้ไขแผนก</span></center></th>
            <th><center><span style="font-weight:bold">แผนกที่ขอเปลี่ยน</span></center></th>
            </tr> 
            <?php   
			$query = "select username as a,status as s,Repo as c,Textpo as d from user_status  where confirm = 'yes' and Repo = 'yes'";
			$objQuery = mysqli_query($objConnect,$query);
            while($objResult = mysqli_fetch_array($objQuery)) { ?>
            
            <tr align="center" style="cursor:context-menu">
            <td><center><span style="font-weight:bold"><?=$objResult['a']?></span></center></td>
            <td><center><span style="font-weight:bold"><?=$objResult['s']?></span></center></td>
            <?php  if($objResult["c"] == 'no') { ?>
            <td><center><span style="font-weight:bold"><i class="fa fa-times fa-lg" style="color:#F00"></i></span></center></td>
            <?php } else if($objResult["c"] == 'yes') { ?>
            <td><center><span style="font-weight:bold"><i class="fa fa-check fa-lg" style="color:#090"></i></span></center></td>
            <td><center><span style="font-weight:bold"><?=$objResult['d']?></span></center></td>
            </tr>
            <?php }} }else{} ?> </table><?
			
			?>
    </div>
    </div>
    </div>
    
    <div class="panel panel-danger">
    <div class="panel-heading" aria-expanded="false" data-toggle="collapse" data-target="#panel-Delete">
      <h3 class="panel-title" style="font-size:22px;font-weight:bold;cursor:context-menu"><i style="font-size: 25px;" class="fa fa-user-times"></i>&nbsp;&nbsp;ลบผู้ใช้ <font style="float:right"><span class="badge" style="font-weight:bold;background-color:#00F"><font color="#FFFF00" style="font-size:17px"><?php echo $objResultC[0]; ?></font></span></font></h3>
    </div>
  <!--management-->
  <div class="collapse panel-body" role="tabpanel" aria-labelledby="headingTwo" id="panel-Delete">
    <div class="form form-group row">
      <div class="col-md-offset-2 col-md-2">
      <h3 style="  margin-top: 9px;">
        ค้นหาชื่อผู้ใช้
      </h3>
      </div>
      <div class="col-md-4">
        <input id="txtd" class="form-control" type="text" style="font-size:18px;font-weight:bold;" />
      </div>
      <div class="col-md-4">
        <button style=" padding: 7px 20px;" id="btnSearchUserDe" class="btn btn-danger btn-lg" type="button"><i class="fa fa-search "></i></button>
      </div>
    </div>
    <div id="contect-hod">
    <?php
	
			$query = "select username as a,status as s,Deuser as c from user_status  where confirm = 'yes' and Deuser = 'yes'";
			$objQuery = mysqli_query($objConnect,$query);
			$objResult = mysqli_fetch_assoc($objQuery);
			if($objResult)
           {

			 ?>
          <table class="table table-bordered table-hover table-striped" style="border-collapse:inherit;">
          <tr class="info" style="cursor:context-menu">
            <th><center><span style="font-weight:bold">ชื่อผู้ใช้</span></center></th>
            <th><center><span style="font-weight:bold">สถานะ</span></center></th>
            <th><center><span style="font-weight:bold">ขอลบผู้ใช้</span></center></th>
            <th><center><span style="font-weight:bold">ลบ</span></center></th>
            </tr> 
            <?php   
			$query = "select username as a,status as s,Deuser as c from user_status  where confirm = 'yes' and Deuser = 'yes'";
			$objQuery = mysqli_query($objConnect,$query);
            while($objResult = mysqli_fetch_array($objQuery)) { ?>
            
            <tr align="center" style="cursor:context-menu">
            <td><center><span style="font-weight:bold"><?=$objResult['a']?></span></center></td>
            <td><center><span style="font-weight:bold"><?=$objResult['s']?></span></center></td>
            <?php  if($objResult["c"] == 'no') { ?>
            <td><center><span style="font-weight:bold"><i class="fa fa-times fa-lg" style="color:#F00"></i></span></center></td>
            <?php } else if($objResult["c"] == 'yes') { ?>
            <td><center><span style="font-weight:bold"><i class="fa fa-check fa-lg" style="color:#090"></i></span></center></td>
            <td><button id="btnDeluser" value="<?= $objResult["a"] ?>" onclick="btnDelUser(this);" class="btn btn-danger" type="button"><i class="fa fa-user-times"></i></button></td>
            </tr>
            <?php }} }else{} ?> </table><?
			
			?>
    </div>
    </div>
    </div>
      
  </div>
 
<script src="assets/js/navbar_controller.js"></script>
