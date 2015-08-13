<?php 

	@session_start();
	include('databaseconfig.php');
		
$objConnect = mysqli_init();
// การปรับแต่ง options ต้องทำก่อนการเชื่อมต่อ
$objConnect->options(MYSQLI_OPT_CONNECT_TIMEOUT, 3600);
// เชื่อมต่อ
$objConnect->real_connect(DB_ENDPOINT_IP,DB_USERNAME,DB_PASSWORD,DB_NAME);
$objConnect->set_charset('utf8');
	
	
?>

<!--เริ่มmanagement-->

<form>
  <?php   

 $username = $_SESSION['txt'];
 					
    if($username == ""){
			$query = "select username as a,status as s,confirm as c from user_status  where confirm = 'no'";
			$objQuery = mysqli_query($objConnect,$query);
			$objResult = mysqli_fetch_array($objQuery);
	}else {
			$query = "select username as a,status as s,confirm as c from user_status  where username LIKE '%".$username."%' and confirm = 'no'";
			$objQuery = mysqli_query($objConnect,$query);	
			$objResult = mysqli_fetch_array($objQuery);
	}
?>
  <?php if($objResult){?>
      <div id='pnlTableWrapper'>
        <table class="table table-bordered table-hover table-striped" style="border-collapse:inherit;">
          <tr class="info">
            <th><center><span style="font-weight:bold">ชื่อผู้ใช้</span></center></th>
            <th><center><span style="font-weight:bold">สถานะ</span></center></th>
            <th><center><span style="font-weight:bold">การยืนยัน</span></center></th>
            <th><center><span style="font-weight:bold">ยืนยัน  /  ลบ</span></center></th>
            <?php
$query = "select username as a,status as s,confirm as c from user_status  where username LIKE '%".$username."%' and confirm = 'no'";
			$objQue = mysqli_query($objConnect,$query);	
			$objRe= mysqli_fetch_array($objQue);
 if($objRe){?>
            
            <?php 
		 }
		 ?>
          </tr>
          <?php 
		 if($username == ""){
			$query = "select username as a,status as s,confirm as c from user_status  where confirm = 'no'";
			$objQuery = mysqli_query($objConnect,$query);
			}else {
			
			$query = "select username as a,status as s,confirm as c from user_status  where username LIKE '%".$username."%' and confirm = 'no'";
			$objQuery = mysqli_query($objConnect,$query);
			}
		 while($obj = mysqli_fetch_array($objQuery)){
		 ?>
          <tr align="center" style="cursor:context-menu">
            <td><center><span style="font-weight:bold"><button value="<?= $obj["a"] ?>" class="btn btn-default" onclick="btnOkUserPRO(this);"><?= $obj['a'] ?></button></span></center></td>
            <td><center><span style="font-weight:bold"><?=$obj['s']?></span></center></td>
            <td><center><span style="font-weight:bold"><i class="fa fa-times fa-lg" style="color:#F00"></i></span></center></td>
            <td><button id="btnOkuser" value="<?= $obj["a"] ?>" onclick="btnOkUser(this);" class="btn btn-warning" type="button"><i class="fa fa-user-plus"></i></button>&nbsp;&nbsp;
            <button id="btnDeluser" value="<?= $obj["a"] ?>" onclick="btnDelUser(this);" class="btn btn-danger" type="button"><i class="fa fa-user-times"></i></button></td>
            <?php
			
		?>
          </tr>
          <?php 
		 }
		 ?>
        </table>
        
	<center><button id="btnOkuser" value="<?= $obj["c"] ?>" onclick="btnOkUserAll(this);" class="btn btn-warning" type="button"><i class="fa fa-users"></i>&nbsp;&nbsp;Confirm-All</button></center>
  <?php
}else{
?>
  <div class="col-md-offset-4 col-md-3">
    <div class="alert alert-danger"><strong><font color ="yellow"><i class="fa fa-exclamation-triangle fa-lg"></font></i> &nbsp;ขออภัย ชื่อผู้ใช้นี้ไม่มีในระบบ</strong></div>
  </div>
  <?php
}
?>

</form>
</div>
<script src="assets/js/navbar_controller.js"></script>