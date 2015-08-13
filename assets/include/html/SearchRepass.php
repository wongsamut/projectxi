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

<form>
  <?php
  
	$username = $_SESSION['txt'] ; 
    
    if($username == ''){  ?>
		
		<div class="col-md-offset-2 col-md-9">
    	<div class="alert alert-danger"><strong><font color ="yellow"><i class="fa fa-exclamation-triangle fa-lg"></font></i> &nbsp;ขออภัย กรุณาระบุชื่อผู้ใช้หรือหมายเลขบัตร</strong></div>
  		</div>
  
	<?php }else{
	
	$sql = "SELECT * FROM user WHERE Username = '$username' or ID_Card_Num = '$username' ";
	$query = mysqli_query($objConnect,$sql);
	$objResult = mysqli_fetch_assoc($query);
	
?>
  <?php if($objResult){?>
  <table class="table table-bordered table-striped" style="border-collapse:inherit;cursor:context-menu;width:50%">
    <tr class="info" style="font-weight:bold;cursor:context-menu">
      <th><center><span style="font-weight:bold"><font color="#000000">รหัสผ่าน</font></span></center></th>
    </tr>
    
    <?php
	$sql = "SELECT * FROM user WHERE Username = '$username' or ID_Card_Num = '$username' ";
	$query = mysqli_query($objConnect,$sql);
	
while($result = mysqli_fetch_array($query))
{
?>
    <tr>
      <td align="center"><span style="font-weight:bold"><font color="#000000"><?=$result["varpass"] ?></font></span></td>
      
    </tr>
    <?php
}
?>
  </table>
  <?php }else { ?>
  <div class="col-md-offset-4 col-md-3">
    <div class="alert alert-danger"><strong><font color ="yellow"><i class="fa fa-exclamation-triangle fa-lg"></font></i> &nbsp;ขออภัย ไม่พบชื่อผู้ใช้ หรือ เลขบัตร นี้</strong></div>
  </div>
  <?php
}
	}
?>
</form>
</div>


<script src="assets/js/navbar_controller.js"></script> 