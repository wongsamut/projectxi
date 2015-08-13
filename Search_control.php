 <?php 

	@session_start();
	include('assets/include/functions/database_config.php');
		
$objConnect = mysqli_init();
// การปรับแต่ง options ต้องทำก่อนการเชื่อมต่อ
$objConnect->options(MYSQLI_OPT_CONNECT_TIMEOUT, 3600);
// เชื่อมต่อ
$objConnect->real_connect(DB_ENDPOINT_IP,DB_USERNAME,DB_PASSWORD,DB_NAME);
$objConnect->set_charset('utf8');

	$strKeyword = $_POST['txtKeyword'];
	$Select = $_POST['ddlSelect'];
	
	$_SESSION['txtKeyword']=$strKeyword ;
	$_SESSION['ddlSelect']=$Select;
	
?>


