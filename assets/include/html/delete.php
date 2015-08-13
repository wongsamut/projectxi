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
			$query = "select username as a,status as s,confirm as c from user_status  where confirm = 'Yes' and status != 'admin'";
			$objQuery = mysqli_query($objConnect,$query);
			$objResult = mysqli_fetch_assoc($objQuery);
	}else {
			$query = "select username as a,status as s,confirm as c from user_status  where username LIKE '%".$username."%' and confirm = 'Yes' and status != 'admin'";
			$objQuery = mysqli_query($objConnect,$query);	
			$objResult = mysqli_fetch_assoc($objQuery);
	}
?>
  <?php if($objResult){?>
      <div id='pnlTableWrapper'>
        <table class="table table-bordered table-hover table-striped" style="border-collapse:inherit;">
          <tr class="warning">
            <th><center><span style="font-weight:bold">ชื่อผู้ใช้</span></center></th>
            <th><center><span style="font-weight:bold">สถานะ</span></center></th>
            <?php
$query = "select username as a,status as s,confirm as c from user_status  where username LIKE '%".$username."%' and confirm = 'Yes' and status != 'admin'";
			$objQue = mysqli_query($objConnect,$query);	
			$objRe= mysqli_fetch_assoc($objQue);
 if($objRe){?>
            <th><center><span style="font-weight:bold">ลบ</span></center></th>
            <?php 
		 }
		 ?>
          </tr>
          <?php 
		 if($username == ""){
			$query = "select username as a,status as s,confirm as c from user_status  where confirm = 'Yes' and status != 'admin'";
			$objQuery = mysqli_query($objConnect,$query);
			}else {
			
			$query = "select username as a,status as s,confirm as c from user_status  where username LIKE '%".$username."%' and confirm = 'Yes' and status != 'admin'";
			$objQuery = mysqli_query($objConnect,$query);
			}
		 while($obj = mysqli_fetch_array($objQuery,MYSQLI_ASSOC)){
		 ?>
          <tr align="center">
            <td><center><span style="font-weight:bold"><?=$obj['a']?></span></center></td>
            <td><center><span style="font-weight:bold"><?=$obj['s']?></span></center></td>
          
            <td><button id="btnDeluser" value="<?= $obj["a"] ?>" onclick="btnDelUser(this);" class="btn btn-danger" type="button"><i class="fa fa-user-times"></i></button></td>
            <?php
			
		?>
          </tr>
          <?php 
		 }
		 ?>
        </table>
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