<?php
		$username  				= @trim($_POST['txtUsername']);
		$varpass				= @trim($_POST['txtPassword']);
		$password  				= @md5(trim($_POST['txtPassword']));
		$Ofname					= @trim($_POST['Ofname']);
		$firstname 				= @trim($_POST['txtFirstName']);
		$lastname  			 	= @trim($_POST['txtLastName']);
		$position				= @trim($_POST['txtPosition']);
		$gender					= @trim($_POST['Radio_Sign']);
		$email	  				= @trim($_POST['txtEmail']);
		$tel					= @trim($_POST['txtTel']);
		$Card_ID				= @trim($_POST['txtCard_ID']);
		$Home_Num				= @trim($_POST['txtHome_num']);
		$Moo					= @trim($_POST['txtMoo']);	
		$Road 					= @trim($_POST['txtRoad']);
		$province				= @trim($_POST['province']);
		$amphur					= @trim($_POST['amphur']);
		$district				= @trim($_POST['district']);
		$amphur_postcode		= @trim($_POST['amphur_postcode']);

				
		
		/* $file_name 	= $firstname.'_'.$lastname.'.jpg';
		$file_path	= 'upload/'.$file_name;
		move_uploaded_file($_FILES['filePhoto']['tmp_name'], $file_path); */
		
	//////////////////////////////////////////////////////////////////////////

	include('assets/include/functions/database_config.php');
	
	$objConnect = mysqli_init();
// การปรับแต่ง options ต้องทำก่อนการเชื่อมต่อ
	$objConnect->options(MYSQLI_OPT_CONNECT_TIMEOUT, 3600);
// เชื่อมต่อ
	$objConnect->real_connect(DB_ENDPOINT_IP,DB_USERNAME,DB_PASSWORD,DB_NAME);
	$objConnect->set_charset('utf8');

/*	if(trim($username) == "" ||trim($password) == "d41d8cd98f00b204e9800998ecf8427e" ||trim($firstname) == "" || trim($lastname) == "" || trim($position) == "" || trim($email) == ""  || trim($tel) == ""  || trim($Card_ID) == "" || trim($Home_Num) == "" || trim($Moo) == "" || trim($Road) == "")
	{
			echo(3);	
	}else{ */
	$query = $objConnect->query("SELECT COUNT(*) FROM user_status WHERE Username = '$username'");
	$objResult = $query->fetch_array();
	
	if($objResult[0] == 0)
	{	
		$queryStr = "INSERT INTO user VALUES ('$username', '$password', '$Ofname', '$firstname', '$lastname', '$position', '$gender', '$email', '$tel', '' ,now(), '$Home_Num', '$Moo', '$Road', '$Card_ID', '', '', '$district', '$amphur', '$province', '$amphur_postcode','$varpass')";
		$query = $objConnect->query($queryStr);
		
		$query = $objConnect->query("INSERT INTO user_status(Username,Password,Status,Confirm,Repo,Deuser,varpass)
				VALUES ('$username','$password','$position','no','no','no','$varpass')");
	echo(0);

	}else{
		echo(1);
	}
	//}
	
	mysqli_close($objConnect);
?>