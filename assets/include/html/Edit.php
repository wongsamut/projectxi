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
			$query = "select username as a,status as s,Repo as c from user_status  where confirm = 'yes' and status != 'admin'";
			$objQuery = mysqli_query($objConnect,$query);
			$objResult = mysqli_fetch_assoc($objQuery);
	}else {
			$query = "select username as a,status as s,Repo as c from user_status  where username LIKE '%".$username."%' and confirm = 'yes' and status != 'admin'";
			$objQuery = mysqli_query($objConnect,$query);	
			$objResult = mysqli_fetch_assoc($objQuery);
	}
?>
  <?php if($objResult){?>
      <div id='pnlTableWrapper'>
        <table class="table table-bordered table-hover table-striped" style="border-collapse:inherit;">
          <tr class="info">
            <th><center><span style="font-weight:bold">ชื่อผู้ใช้</span></center></th>
            <th><center><span style="font-weight:bold">สถานะ</span></center></th>
            <th><center><span style="font-weight:bold">ขอแก้ไขแผนก</span></center></th>
            <th><center><span style="font-weight:bold">แก้ไข</span></center></th>
            <?php
$query = "select username as a,status as s,Repo as c from user_status  where username LIKE '%".$username."%' and confirm = 'yes' and status != 'admin'";
			$objQue = mysqli_query($objConnect,$query);	
			$objRe= mysqli_fetch_assoc($objQue);
 if($objRe){?>
            
            <?php 
		 }
		 ?>
          </tr>
          <?php 
		 if($username == ""){
			$query = "select username as a,status as s,Repo as c from user_status  where confirm = 'yes' and status != 'admin'";
			$objQuery = mysqli_query($objConnect,$query);
			}else {
			
			$query = "select username as a,status as s,Repo as c from user_status  where username LIKE '%".$username."%' and confirm = 'yes' and status != 'admin'";
			$objQuery = mysqli_query($objConnect,$query);
			}
		 while($obj = mysqli_fetch_array($objQuery,MYSQLI_ASSOC)){
		 ?>
          <tr align="center">
            <td><center><span style="font-weight:bold"><?=$obj['a']?></span></center></td>
            <td><center><span style="font-weight:bold"><?=$obj['s']?></span></center></td>
            <?php  if($obj["c"] == 'no') { ?>
            <td><center><span style="font-weight:bold"><i class="fa fa-times fa-lg" style="color:#F00"></i></span></center></td>
            <?php } else if($obj["c"] == 'yes') { ?>
            <td><center><span style="font-weight:bold"><i class="fa fa-check fa-lg" style="color:#090"></i></span></center></td>
            <?php } ?>
            <td><button id="btnEdituser" value="<?= $obj["a"] ?>" onclick="btnEditUser(this);" class="btn btn-warning" type="button"><i class="fa fa-pencil"></i></button>&nbsp;&nbsp;
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
  <div class="col-md-offset-3 col-md-5">
    <div class="alert alert-danger"><strong><font color ="yellow"><i class="fa fa-exclamation-triangle fa-lg"></font></i> &nbsp;ขออภัย ไม่มีผู้ใช้ลืมรหัสผ่าน หรือ ไม่มีชื่อผู้ใช้ในระบบ</strong></div>
  </div>
  <?php
}
?>

</form>
</div>
<script src="assets/js/navbar_controller.js"></script>
