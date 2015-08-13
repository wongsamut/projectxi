<?php
@session_start();

	include('database_config.php');
	$objConnect = mysqli_init();
// การปรับแต่ง options ต้องทำก่อนการเชื่อมต่อ
	$objConnect->options(MYSQLI_OPT_CONNECT_TIMEOUT, 3600);
// เชื่อมต่อ
	$objConnect->real_connect(DB_ENDPOINT_IP,DB_USERNAME,DB_PASSWORD,DB_NAME);
	$objConnect->set_charset('utf8');
	
	isset($_REQUEST["Filesname"]) ? $Filesname = $_REQUEST["Filesname"] : $Filesname = '';
	isset($_REQUEST["Doc_Budget"]) ? $Doc_Budget = $_REQUEST["Doc_Budget"] : $Doc_Budget = '';
	echo $Doc_Budget;
	echo $Filesname;
	
	
	$objQuery = mysqli_query($objConnect, "select * from files WHERE Doc_Budget = '$Doc_Budget'");
      $objResult = mysqli_fetch_assoc($objQuery);
		
	if($_FILES["filUpload"]["name"] != "")
	{
		if($objResult['FilesName'] != '$_FILES["filUpload"]["name"]') {
			
			$sur = strrchr($_FILES['filUpload']['name'], "."); //ตัดนามสกุลไฟล์เก็บไว้
			$newfilename = (Date("dmy_His").$sur); //ตั้งเป็น วันที่_เวลา.นามสกุล
			
			//*** Delete Old File ***//			
			@unlink("MyPDF/".$_POST["Filesname"]);
			
			move_uploaded_file($_FILES["filUpload"]["tmp_name"],"MyPDF/".$newfilename);
			
			//*** Update New File ***//
			$strSQL = "UPDATE files ";
			$strSQL .=" SET FilesName = '".$newfilename."' WHERE Doc_Budget = '$Doc_Budget' ";
			$objQuery = mysqli_query($objConnect, $strSQL);		

			$strrSQL = "UPDATE docme ";
			$strrSQL .=" SET FilesName = '".$newfilename."' WHERE Doc_Budget = '$Doc_Budget' ";
			$objQuery = mysqli_query($objConnect, $strrSQL);
			}
			else if($objResult['FilesName'] == '$_FILES["filUpload"]["name"]'){
				
			$sur = strrchr($_FILES['filUpload']['name'], "."); //ตัดนามสกุลไฟล์เก็บไว้
			$newfilename = (Date("dmy_His").$sur); //ตั้งเป็น วันที่_เวลา.นามสกุล
				
			move_uploaded_file($_FILES["filUpload"]["tmp_name"],"MyPDF/".$_FILES["filUpload"]["name"]);
				
			$strSQL = "UPDATE files ";
			$strSQL .=" SET FilesName = '".$newfilename."' WHERE Doc_Budget = '$Doc_Budget' ";
			$objQuery = mysqli_query($objConnect, $strSQL);		

			$strrSQL = "UPDATE docme ";
			$strrSQL .=" SET FilesName = '".$newfilename."' WHERE Doc_Budget = '$Doc_Budget' ";
			$objQuery = mysqli_query($objConnect, $strrSQL);
			
				
			}		
		
	}
	

	
	mysqli_close($objConnect);
?>