<?php
    header("content-type: text/html; charset=utf-8");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");

    include('config.php');
	conndb(); 
     
    $data = $_GET['data'];
    $val = $_GET['val'];


         if ($data=='province') { 
              echo "<select name=\"province\" id=\"province\" onChange=\"dochange('amphur', this.value),dochange('district', this.value),dochange('amphur_postcode', this.value)\" class=\"form-control\" style=\"width:35%;font-size:20px;font-weight:bold;padding-top:5px\" >";
              echo "<option value='0'>- เลือกจังหวัด -</option>\n";
              $result=mysqli_query($conn, "select * from province order by PROVINCE_NAME");
              while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                   echo "<option value='$row[PROVINCE_ID]'>$row[PROVINCE_NAME]</option>" ;
              }
         } else if ($data=='amphur') {
              echo "<select name=\"amphur\"  id=\"amphur\" class=\"form-control\" style=\"width:35%;font-size:20px;font-weight:bold;padding-top:5px\" onChange=\"dochange('district', this.value),dochange('amphur_postcode', this.value) \">";
              echo "<option value='0'>- เลือกอำเภอ -</option>\n";                             
              $result=mysqli_query($conn, "SELECT * FROM amphur WHERE PROVINCE_ID= '$val' ORDER BY AMPHUR_NAME");
              while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                   echo "<option value=\"$row[AMPHUR_ID]\" >$row[AMPHUR_NAME]</option> " ;
              }
         } else if ($data=='district') {
              echo "<select name=\"district\" id=\"district\"   class=\"form-control\" style=\"width:35%;font-size:20px;font-weight:bold;padding-top:5px\">\n";
              echo "<option value='0'>- เลือกตำบล -</option>\n";
              $result=mysqli_query($conn, "SELECT * FROM district WHERE AMPHUR_ID= '$val' ORDER BY DISTRICT_NAME");
              while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                   echo "<option value=\"$row[DISTRICT_ID]\">$row[DISTRICT_NAME]</option> \n" ;
              }
         } else if ($data=='amphur_postcode') {
              echo "<select name=\"amphur_postcode\" id=\"amphur_postcode\" class=\"form-control\" style=\"width:35%;font-size:20px;font-weight:bold;padding-top:5px\">\n";
              echo "<option value='0'>- เลือกรหัสไปรษณีย์ -</option>\n";
              $result=mysqli_query($conn, "SELECT * FROM amphur_postcode WHERE AMPHUR_ID= '$val' ");
              while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                   echo "<option value=\"$row[POST_CODE]\">$row[POST_CODE]</option> \n" ;
				   
			  }
			  
		 }
         echo "</select>\n";

        echo mysqli_connect_error();
        closedb();
?>