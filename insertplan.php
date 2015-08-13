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

	
	@$user=$_SESSION['user'];
	@$IDID = $_POST['ID_DOC'];
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

		$_SESSION["Passbud"]=$passbudget;
		$_SESSION["IDID"]=$IDID;
		$_SESSION["namePDF"]=$name;
		$_SESSION["senddate"]=$senddate;
		$_SESSION["nameact"]=$nameact;
		$_SESSION["party"]=$party;
		$_SESSION["buyorhire"]=$buyorhire;
		$_SESSION["equipment"]=$equipment;
		$_SESSION["detailsequ"]=$detailsequ;
		$_SESSION["level"]=$level;
		$_SESSION["repair"]=$repair;
		$_SESSION["detailsrepair"]=$detailsrepair;
		$_SESSION["activity"]=$activity;
		$_SESSION["detailsact"]=$detailsact;
		$_SESSION["originbudget"]=$originbudget;
		$_SESSION["roundnumber"]=$roundnumber;
		$_SESSION["summoneyattime"]=$summoneyattime;
		$_SESSION["balancemoneyattime"]=$balancemoneyattime;
		$_SESSION["sumalltime"]=$sumalltime;
		$_SESSION["balancealltime"]=$balancealltime;

	 	
		$sql= "UPDATE petition SET Passbudget = '$passbudget',
		Repair = '$repair',
		Activity = '$activity',
		Level = '$level',
		Detailsequ = '$detailsequ',
		Detailsact = '$detailsact',
		Detailsrepair = '$detailsrepair',
		Equipment = '$equipment',
		balancemoneyattime ='$balancemoneyattime',
		summoneyattime='$summoneyattime',
		roundnumber='$roundnumber',
		originbudget='$originbudget',
		Sumalltime = '$sumalltime',

		Balancealltime = '$balancealltime' where ID_DOC = '$IDID' ";
		$resul = mysqli_query($objConnect, $sql) or die(mysqli_error($objConnect));
		
		
		$sql1 = "UPDATE docme  SET Doc_Budget = '$passbudget' where ID_DOCS = '$IDID'";
		$resul1 = mysqli_query($objConnect, $sql1) or die(mysqli_error($objConnect));
		
		$sql2 = "UPDATE files  SET Doc_Budget ='$passbudget' where ID_DOC = '$IDID'";	
		$resul2 = mysqli_query($objConnect, $sql2) or die(mysqli_error($objConnect));	
		
		$sql3 = "UPDATE addrow SET Passbudget = '$passbudget' where ID_DOC = '$IDID'";
		$resul3 = mysqli_query($objConnect, $sql3) or die(mysqli_error($objConnect));
		
		
		
		$query = "SELECT COUNT(*) from addrow  where ID_DOC='$IDID'";
		$resul4 = mysqli_query($objConnect, $query) or die(mysqli_error($objConnect));
		$objResultPL = mysqli_fetch_array($resul4);
		$_SESSION['NUM'] = $objResultPL[0] ;
		$NUM = $_SESSION['NUM'];
		
		$inline = $_POST['showInline'];
			
		for($i=$NUM+1;$i<=$inline;$i++){
			
			$txtName =  $_POST['txtName'.$i];
			$txtNum = $_POST['txtNum'.$i];
			$txtUnit = $_POST['txtUnit'.$i];
			$txtPrice = $_POST['txtPrice'.$i];
			$txtdate = $_POST['txtdate'.$i];
			$txtTotal = $_POST['txtTotal'.$i];
		
		$sql = "INSERT INTO addrow (Namelist,Pricetounit,Amount,Unit,Limitday,Summoney,Username,Passbudget,ID_DOC) 
		VALUES('$txtName','$txtPrice','$txtNum','$txtUnit','$txtdate','$txtTotal','$name','$passbudget','$IDID')";
		$resul = mysqli_query($objConnect, $sql) or die(mysqli_error($objConnect));
		

		}
		
		
		
		
		
?>

		     <script>		
			swal({ 
			title: "Success !",   
			text: "คำร้องของได้ถูกแก้ไขเรียบร้อยแล้ว",
			type: "success",   
			showCancelButton: false,      
			confirmButtonText: "OK",
			closeOnConfirm: false,   
			closeOnCancel: false 
			 },
			function(isConfirm){   
			if (isConfirm) {
			//window.open("tcpdf/form_data.php");	
			
         	window.location="tcpdf/Test.php?id=<?=$IDID ?>";
			} });
		   </script>
          
          
        