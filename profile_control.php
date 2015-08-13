<?php
	 @session_start();
	$user			= $_SESSION['user'];
	$username 		= $_POST['txtUsername'];
	$password  		= md5($_POST['txtPassword']);
	$varpass  		= $_POST['txtPassword'];
	$firstname 		= $_POST['txtFirstName'];
	$lastname  		= $_POST['txtLastName'];
	$ofname			= $_POST['Ofname'];
	$gender			= $_POST['txtGender'];
	$email	 		= $_POST['txtEmail'];
	$tel			= $_POST['txtTel'];
	$phone			= $_POST['txtPhone'];
	$fax			= $_POST['txtFax'];
	$home_num		= $_POST['txtHome_Num'];
	$moo			= $_POST['txtMoo'];
	$road			= $_POST['txtRoad'];
	$id_card_num	= $_POST['txtID_Card_Num'];
		
	//////////////////////////////////////////////////////////////////////////

	include('assets/include/functions/database_config.php');
	
	$objConnect = mysqli_init();
// การปรับแต่ง options ต้องทำก่อนการเชื่อมต่อ
$objConnect->options(MYSQLI_OPT_CONNECT_TIMEOUT, 3600);
// เชื่อมต่อ
$objConnect->real_connect(DB_ENDPOINT_IP,DB_USERNAME,DB_PASSWORD,DB_NAME);
$objConnect->set_charset('utf8');	
	
	
/*	if(trim($firstname) == "" || trim($lastname) == "" || trim($position) == ""  || trim($age) == ""  || trim($email) == ""  || trim($tel) == "" || trim($phone) == "" || trim($gender) == "" || trim($fax) == "" || trim($home_num) == "" || trim($moo) == "" || trim($road) == "" || trim($tambon) == "" || trim($ampher) == "" || trim($post_code) == "" || trim($id_card_num) == "" || trim($city) == ""   )
	{
			echo(1);	
	}else{ */
		
	$query = $objConnect->query(
	"UPDATE `purchase`.`user` SET 
	`Username`='$username',
	`Password`='$password',
	`Firstname`='$firstname',
	`Lastname`='$lastname',
	`Ofname`='$ofname',
	`Gender`='$gender',
	`Email`='$email',
	`Tel`='$tel' ,
	`Phone`='$phone' ,
	`Home_Num`='$home_num' ,
	`Moo`='$moo' ,
	`Road`='$road' ,
	`ID_Card_Num`='$id_card_num',
	`Fax`='$fax',
	`varpass`='$varpass' WHERE `Username` ='$user'");
	
	$query = $objConnect->query("UPDATE `purchase`.`user_status` SET 
	`Username`='$username',
	`Password`='$password',
	`varpass`='$varpass',
	`Repo`='no',
	`Textpo`='' WHERE `Username` ='$user'");
	 
	$query = $objConnect->query("SELECT * FROM user WHERE Username = '$username'");
	$objResult = $query->fetch_array();
	$_SESSION['user']= $objResult['Username'];
	$_SESSION['name']= $objResult['Firstname'];
	$_SESSION['last']= $objResult['Lastname'];
	$_SESSION['position']= $objResult['Position'];
	
		echo(0);
	//}
	
	mysqli_close($objConnect);
?>
