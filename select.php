<?php

include('assets/include/functions/database_config.php');
		
		
			
		$TEXT = $_POST['txtKeyword'];
					
		$objConnect = mysqli_init();
		// การปรับแต่ง options ต้องทำก่อนการเชื่อมต่อ
		$objConnect->options(MYSQLI_OPT_CONNECT_TIMEOUT, 3600);
		// เชื่อมต่อ
		$objConnect->real_connect(DB_ENDPOINT_IP,DB_USERNAME,DB_PASSWORD,DB_NAME);
		$objConnect->set_charset('utf8');
	
   		$query = $objConnect->query("SELECT * FROM prochurment WHERE ID_Budgets like  '%".$TEXT."%' or Username like  '%".$TEXT."%' or Lastname like  '%".$TEXT."%'");
		$objResult = $query->fetch_assoc();
		
		if (!$query) {
    throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
}
?>
<table width="600" border="1">
	  <tr>
		<th width="91"> <div align="center">เลขงบประมาณ </div></th>
		<th width="100"> <div align="center">ชื่อผู้ใช้ </div></th>
		<th width="100"> <div align="center">นามสกุล </div></th>
		<th width="59"> <div align="center">สถานะพัสดุ </div></th>
		<th width="59"> <div align="center">สถานะแบบแผน </div></th>
		<th width="59"> <div align="center">สถานะการเงิน </div></th>
        <th width="59"> <div align="center">PDF </div></th>
        <th width="59"> <div align="center">วันที่ส่งคำร้อง </div></th>
	  </tr>
<?php
while($objResult = $query->fetch_array())
{
?>
  	  <tr>
		<td><div align="center"><?=$objResult["ID_Budgets"];?></div></td>
		<td><?=$objResult["Username"];?></td>
		<td><?=$objResult["Lastname"];?></td>
		<td><div align="center"><?=$objResult["Status_Sup"];?></div></td>
		<td align="center"><?=$objResult["Status_Plan"];?></td>
		<td align="center"><?=$objResult["Status_Money"];?></td>
        <td align="center"><?=$objResult["File_PDF"];?></td>
        <td align="center"><?=$objResult["Date"];?></td>
        
	  </tr>
<?php
}
?>
</table>
<?php
mysqli_close($objConnect);
?>