<?php
	session_start();

	include('databaseconfig.php');
		
$objConnect = mysqli_init();
// การปรับแต่ง options ต้องทำก่อนการเชื่อมต่อ
$objConnect->options(MYSQLI_OPT_CONNECT_TIMEOUT, 3600);
// เชื่อมต่อ
$objConnect->real_connect(DB_ENDPOINT_IP,DB_USERNAME,DB_PASSWORD,DB_NAME);
$objConnect->set_charset('utf8');
	//*** Update Last Stay in Login System
	$sql = $objConnect->query("UPDATE user_status SET LastUpdate = NOW() WHERE UserID = '".$_SESSION["UserID"]."' ");

?>

<div class="container">
  <center>
    <h1>กรุณาเลือกระบบที่จะใช้งาน</h1>
  </center>
  <center>
  <?php
  if(@$_SESSION['login'] == 2)
								{	
							?>
  <button type="button" id="btnseeme" class="btn btn-success" style="font-size:20px;padding-top:13px"><i class="fa  fa-file-text-o"></i>&nbsp;&nbsp;คำร้อง</button>
  <?php } ?>
  <button type="button" id="btnsearchdoc" class="btn btn-success" style="font-size:20px;padding-top:13px"><i class="fa fa-search"></i>&nbsp;&nbsp;ค้นหาคำร้อง</button>
  </center>
  <br>

</div>
<script src="assets/js/navbar_controller.js"></script> 