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
	


?>

<center><img src="img/h1.png" width="300" height="300">
<br>
<h1 style="cursor:context-menu"><font style="color: rgb(70, 119, 71);font-size: 40px;font-weight: bold;">ระบบจัดซื้อ - จัดจ้างวิทยาลัยเกษตรและเทคโนโลยีพะเยา</font></h1>
<br>
<?php
	if(@$_SESSION['login'] != 0 && @$_SESSION['login'] != 1)
								{
$sql = $objConnect->query("UPDATE user_status SET LastUpdate = NOW() WHERE UserID = '".$_SESSION["UserID"]."' ");
							?>
<h2 style="cursor:context-menu;"><font style="color: rgb(70, 119, 71);font-size: 35px;font-weight: bold;"> </font> <font style="color:#F00;font-size: 35px;font-weight: bold;">&nbsp; <?=$_SESSION['name']?>  &nbsp; <?=$_SESSION['last']?></font></h2> <?php } ?>

<?php
	if(@$_SESSION['login'] == 1)
								
								{
 $sql = $objConnect->query("UPDATE user_status SET LastUpdate = NOW() WHERE UserID = '".$_SESSION["UserID"]."' ");
							?>
 <h2 style="cursor:context-menu;"><font style="color: rgb(70, 119, 71);font-size: 35px;font-weight: bold;"></font>
 <font style="color:#F00;font-size: 35px;font-weight: bold;">&nbsp; Admin </font></h2> <?php } ?>

 <?php
	if(@$_SESSION['login'] == 0)
								
								{
							?>
 <h2 style="cursor:context-menu;"><font style="color: rgb(70, 119, 71);font-size: 35px;font-weight: bold;"></font>
 <font style="color:#F00;font-size: 35px;font-weight: bold;">&nbsp; บุคคลทั่วไป </font></h2> <?php } ?>
 


</center>

