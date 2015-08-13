<?php
    $host = "localhost"; // ส่วนมากมักเป็น localhost
    $user = "root"; // Username 
    $pass = "root"; // Password 
    $dbname = "purchase"; // ชื่อฐานข้อมูล

    function conndb() {
        global $conn;
        global $host;
        global $user;
        global $pass;
        global $dbname;
        $conn = mysqli_connect($host,$user,$pass,$dbname);
		mysqli_set_charset($conn,"utf8");
		
    if (mysqli_connect_errno())
	{
		echo "Database Connect Failed : " . mysqli_connect_error();
	}
	

    function closedb() {
      global $conn;
      mysqli_close($conn);
    }
	}
?>
