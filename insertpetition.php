<head>
<script src="assets/js/sweetalert.min.js"></script>
<link  href="assets/css/sweetalert.css" type="text/css"  rel="stylesheet"/>
</head>
<body>

<?php 
		@session_start();
		
	include('assets/include/functions/database_config.php');
		
	$objConnect = mysqli_init();
	// การปรับแต่ง options ต้องทำก่อนการเชื่อมต่อ
	$objConnect->options(MYSQLI_OPT_CONNECT_TIMEOUT, 3600);
	// เชื่อมต่อ
	$objConnect->real_connect(DB_ENDPOINT_IP,DB_USERNAME,DB_PASSWORD,DB_NAME);
	$objConnect->set_charset('utf8');

	$user=$_SESSION['user'];
	@$name = $_POST['name'];
	@$senddate = $_POST['senddate'];
	@$passbudget = $_POST['passbudget'];
	@$usebudform = $_POST['usebudform'];
	@$nameact = $_POST['nameact'];
	@$party = $_POST['party'];
	@$buyorhire = $_POST['buyorhire'];
	@$equipment = $_POST['equipment'];
	@$detailsequ = $_POST['detailsequ'];
	@$level = $_POST['level'];
	@$repair = $_POST['repair'];
	@$detailsrepair = $_POST['detailsrepair'];
	@$activity = $_POST['activity'];
 	@$detailsact = $_POST['detailsact'];
 	@$originbudget = $_POST['originbudget'];
	@$roundnumber = $_POST['roundnumber'];
	@$summoneyattime= $_POST['summoneyattime'];
	@$balancemoneyattime = $_POST['balancemoneyattime'];
	@$sumalltime = $_POST['sumalltime'];
	@$balancealltime = $_POST['balancealltime'];

	 	
	$sql= "INSERT INTO petition (Name,Username,Equipment,Senddate,Passbudget,Originbudget,Buyorhire,Level,Repair,Activity,Usebudform,Roundnumber,Summoneyattime,Balancemoneyattime,Sumalltime,Balancealltime,Party,Detailsequ,Detailsrepair,Detailsact,Nameact) 
		VALUES ('$name','$user','$equipment','$senddate','$passbudget','$originbudget'
			,'$buyorhire','$level','$repair','$activity','$usebudform'
			,'$roundnumber','$summoneyattime','$balancemoneyattime'
			,'$sumalltime','$balancealltime','$party','$detailsequ','$detailsrepair','$detailsact','$nameact')";

		$resul = mysqli_query($objConnect, $sql) or die(mysqli_error($objConnect));
		
		$sql3 ="SELECT * from petition where Senddate = '$senddate' and Username ='$user' and Name = '$name' and Usebudform = '$usebudform' and Originbudget = '$originbudget' ";
		$resul3 = mysqli_query($objConnect, $sql3) or die(mysqli_error($objConnect));
		$objResultID = mysqli_fetch_array($resul3);
		$_SESSION['ID_DOC'] = $objResultID['ID_DOC'] ;
		$ID_DOC = $_SESSION['ID_DOC'];
		
		$sql1 = "INSERT INTO docme (Username,Name,Doc_Budget,Doc_Name,Date,Status_Plan,Status_Supp,Status_Fin,Status_All,Plan,Sup,Fin,ID_DOCS)
		VALUES('$user','$name','$passbudget','$nameact','$senddate','Wait','No','No','No','รอพิจารณา','รอพิจารณา','รอพิจารณา','$ID_DOC')";	
		$resul1 = mysqli_query($objConnect, $sql1) or die(mysqli_error($objConnect));
		
		$sql2 = "INSERT INTO files (Doc_Budget,Username,Name,ID_DOC)
		VALUES('$passbudget','$user','$name','$ID_DOC')";	
		$resul2 = mysqli_query($objConnect, $sql2) or die(mysqli_error($objConnect));	
		
		
		
		$inline = $_POST['showInline'];
		
	
			
		for($i=1;$i<=$inline;$i++){
			
			$txtName =  $_POST['txtName'.$i];
			$txtNum = $_POST['txtNum'.$i];
			$txtUnit = $_POST['txtUnit'.$i];
			$txtPrice = $_POST['txtPrice'.$i];
			$txtdate = $_POST['txtdate'.$i];
			$txtTotal = $_POST['txtTotal'.$i];
		

		$sql = "INSERT INTO addrow (Namelist,Pricetounit,Amount,Unit,Limitday,Summoney,Username,Passbudget,ID_DOC) 
		VALUES('$txtName','$txtPrice','$txtNum','$txtUnit','$txtdate','$txtTotal','$name','$passbudget','$ID_DOC')";
		$resul = mysqli_query($objConnect, $sql) or die(mysqli_error($objConnect));

		}
		
		mysqli_close($objConnect);
		
		
	  
?>
		    <script>  
			
			swal({ 
			title: "Success !",   
			text: "คำร้องของคุณได้ถูกยื่นเรียบร้อย",
			type: "success",   
			showCancelButton: false,      
			confirmButtonText: "OK",
			closeOnConfirm: false,   
			closeOnCancel: false 
			 },
			function(isConfirm){   
			if (isConfirm) {  
         	window.location="index.php";
			} });
		   </script>
          
          
          </body>