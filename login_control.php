<?php
 @session_start();
include('assets/include/functions/database_config.php');
	
$username = $_POST['txtUsername'];
$password = md5($_POST['txtPassword']);
	
$objConnect = mysqli_init();
// การปรับแต่ง options ต้องทำก่อนการเชื่อมต่อ
$objConnect->options(MYSQLI_OPT_CONNECT_TIMEOUT, 3600);
// เชื่อมต่อ
$objConnect->real_connect(DB_ENDPOINT_IP,DB_USERNAME,DB_PASSWORD,DB_NAME);
$objConnect->set_charset('utf8');	

//*** Reject user not online
	$intRejectTime = 20; // Minute
	$AAA = $objConnect->query("UPDATE user_status SET LoginStatus = '0', LastUpdate = '0000-00-00 00:00:00'  WHERE 1 AND DATE_ADD(LastUpdate, INTERVAL $intRejectTime MINUTE) <= NOW() ");
	
	$query = $objConnect->query("SELECT * FROM user_status WHERE Username = '$username' AND Password = '$password' ");
	$objResult = $query->fetch_assoc();
	
	$AAA = $objConnect->query("SELECT * FROM user_status WHERE Username = '$username' AND Password = '$password' ");
	$objResultCC = $AAA->fetch_assoc();
	
	$_SESSION['user'] = $username ;
	
	if($objResult['Status'] == "admin")
	{

		$_SESSION['login'] = 1;
		echo(2);
//************************************************* Check Login******************************************************************************//
		
		
		if($objResultCC["LoginStatus"] == "1")
		{
			echo "'".$username."' Exists login!";
			exit();
		}
		else
		{
						
			//*** Update Status Login
			$AAA = $objConnect->query("UPDATE user_status SET LoginStatus = '1' , LastUpdate = NOW() WHERE UserID = '".$objResultCC["UserID"]."' ");

			//*** Session
			$_SESSION["UserID"] = $objResultCC["UserID"];
			@session_write_close();
		}
//*************************************************End Check Login***************************************************************************//
	}else if($objResult['Status'] == "Personal")
	{
		$query = $objConnect->query("SELECT * FROM user_status WHERE Username = '$username' AND Password = '$password' AND confirm='yes'");
		$objResult = $query->fetch_assoc();
		if($objResult){
			$_SESSION['login'] = 2;
			$query = $objConnect->query("SELECT * FROM user WHERE Username = '$username' AND Password = '$password'");
			$objResult = $query->fetch_assoc();			
			$_SESSION['name'] = $objResult['Firstname'] ;
			$_SESSION['last'] = $objResult['Lastname'] ;
			$_SESSION['position'] = $objResult['Position'];
			echo(2);
//************************************************* Check Login****************************************************************************//
							if($objResultCC["LoginStatus"] == "1")
						{
							echo "'".$username."' Exists login!";
							exit();
						}
						else
						{
											
							$AAA = $objConnect->query("UPDATE user_status SET LoginStatus = '1' , LastUpdate = NOW() WHERE UserID = '".$objResultCC["UserID"]."' ");
				
							//*** Session
							$_SESSION["UserID"] = $objResultCC["UserID"];
							@session_write_close();
						}
//************************************************* Check Login****************************************************************************//
		}
		else
		{
			echo(1);
		}
	}else if($objResult['Status'] == "Supplies")
	{
		$query = $objConnect->query("SELECT * FROM user_status WHERE Username = '$username' AND Password = '$password' AND confirm='yes'");
		$objResult = $query->fetch_assoc();
		if($objResult){
			$_SESSION['login'] = 3;
			$query = $objConnect->query("SELECT * FROM user WHERE Username = '$username' AND Password = '$password'");
			$objResult = $query->fetch_assoc();			
			$_SESSION['name'] = $objResult['Firstname'] ;
			$_SESSION['last'] = $objResult['Lastname'] ;
			$_SESSION['position'] = $objResult['Position'];
			echo(2);
//************************************************* Check Login****************************************************************************//
							if($objResultCC["LoginStatus"] == "1")
						{
							echo "'".$username."' Exists login!";
							exit();
						}
						else
						{
											
							$AAA = $objConnect->query("UPDATE user_status SET LoginStatus = '1' , LastUpdate = NOW() WHERE UserID = '".$objResultCC["UserID"]."' ");
				
							//*** Session
							$_SESSION["UserID"] = $objResultCC["UserID"];
							@session_write_close();
						}
		
//************************************************* Check Login****************************************************************************//
		}
		else
		{
			echo(1);
		}
		}else if($objResult['Status'] == "Pattern")
	{
		$query = $objConnect->query("SELECT * FROM user_status WHERE Username = '$username' AND Password = '$password' AND confirm='yes'");
		$objResult = $query->fetch_assoc();
		if($objResult){
			$_SESSION['login'] = 4;
			$query = $objConnect->query("SELECT * FROM user WHERE Username = '$username' AND Password = '$password'");
			$objResult = $query->fetch_assoc();			
			$_SESSION['name'] = $objResult['Firstname'] ;
			$_SESSION['last'] = $objResult['Lastname'] ;
			$_SESSION['position'] = $objResult['Position'];
			echo(2);
//************************************************* Check Login****************************************************************************//
							if($objResultCC["LoginStatus"] == "1")
						{
							echo "'".$username."' Exists login!";
							exit();
						}
						else
						{
											
							$AAA = $objConnect->query("UPDATE user_status SET LoginStatus = '1' , LastUpdate = NOW() WHERE UserID = '".$objResultCC["UserID"]."' ");
				
							//*** Session
							$_SESSION["UserID"] = $objResultCC["UserID"];
							@session_write_close();
						}
//************************************************* Check Login****************************************************************************//
		}	
		else
		{
			echo(1);
		}
		}else if($objResult['Status'] == "Finance")
	{
		$query = $objConnect->query("SELECT * FROM user_status WHERE Username = '$username' AND Password = '$password' AND confirm='yes'");
		$objResult = $query->fetch_assoc();
		if($objResult){
			$_SESSION['login'] = 5;
			$query = $objConnect->query("SELECT * FROM user WHERE Username = '$username' AND Password = '$password'");
			$objResult = $query->fetch_assoc();			
			$_SESSION['name'] = $objResult['Firstname'] ;
			$_SESSION['last'] = $objResult['Lastname'] ;
			$_SESSION['position'] = $objResult['Position'];
			echo(2);
//************************************************* Check Login****************************************************************************//
							if($objResultCC["LoginStatus"] == "1")
						{
							echo "'".$username."' Exists login!";
							exit();
						}
						else
						{
											
							$AAA = $objConnect->query("UPDATE user_status SET LoginStatus = '1' , LastUpdate = NOW() WHERE UserID = '".$objResultCC["UserID"]."' ");
				
							//*** Session
							$_SESSION["UserID"] = $objResultCC["UserID"];
							@session_write_close();
						}
//************************************************* Check Login****************************************************************************//
		}	
		else
		{
			echo(1);
		}
		}
	else
	{
		$_SESSION['login'] = 0;
		echo(0);
	}
	mysqli_close($objConnect);
	?>