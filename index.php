<?php
	include('assets/include/functions/html_function.php');
	
?>
<!DOCTYPE html>
<html>
<head>
<title>ระบบยื่นคำร้อง</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<!--CSS/LESS Start-->
<link href="img/Icon.ico" rel="shortcut icon" type="image/x-icon" />
<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type='text/css' />
<link href="assets/font/fonts/styles.css" rel="stylesheet" />
<link href="assets/css/general.css" rel="stylesheet" type='text/css' />
<link href="assets/font/font-awesome/css/font-awesome.min.css" rel="stylesheet" type='text/css' />
<link href="assets/css/sweetalert.css" rel="stylesheet" type="text/css"/>


</head>
<body>
<!--Javascript Start--> 
<script src="assets/js/sweetalert.min.js"></script>
<script src="assets/js/jquery.min.js"></script> 
<script src="assets/bootstrap/js/bootstrap.min.js"></script> 


<div id="content-header">
  <?php
			 include('assets/include/html/custom.php'); 
			 
	?>
</div>
<div id="content-body"> 
<center><img src="img/h1.png" width="300" height="300">
<br>
<h1 style="cursor:context-menu"><font style="color: rgb(70, 119, 71);font-size: 40px;font-weight: bold;">ระบบจัดซื้อ - จัดจ้างวิทยาลัยเกษตรและเทคโนโลยีพะเยา</font></h1>
<br>
<?php
	if(@$_SESSION['login'] != 0 && @$_SESSION['login'] != 1)
								{
							?>
<h2 style="cursor:context-menu;"><font style="color: rgb(70, 119, 71);font-size: 35px;font-weight: bold;"> </font> <font style="color:#F00;font-size: 35px;font-weight: bold;">&nbsp; <?=$_SESSION['name']?>  &nbsp; <?=$_SESSION['last']?></font></h2> <?php } ?>

<?php
	if(@$_SESSION['login'] == 1)
								
								{
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


</div>




<div id="footer-body">
<?php
			 include('assets/include/html/login.php'); 
			 
?>

</div>


<!--Navbar Script--> 
<script src="assets/js/navbar_controller.js"></script> 

</body>
</html>
