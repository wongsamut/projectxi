 <?php 

	@session_start();
	include('database_config.php');
$objConnect = mysqli_init();
// การปรับแต่ง options ต้องทำก่อนการเชื่อมต่อ
$objConnect->options(MYSQLI_OPT_CONNECT_TIMEOUT, 3600);
// เชื่อมต่อ
$objConnect->real_connect(DB_ENDPOINT_IP,DB_USERNAME,DB_PASSWORD,DB_NAME);
$objConnect->set_charset('utf8');

	$Budget = $_GET['data'];
	
	$objQuery = $objConnect->query("UPDATE docme SET Status_Fin = 'Yes', Fin = 'อนุมัติ' , Status_All = 'Pass' WHERE Doc_Budget = '$Budget'");
	
?>


