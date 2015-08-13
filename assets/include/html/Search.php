<?php
	@session_start();
	include('databaseconfig.php');
		
	$objConnect = mysqli_init();
	// การปรับแต่ง options ต้องทำก่อนการเชื่อมต่อ
	$objConnect->options(MYSQLI_OPT_CONNECT_TIMEOUT, 3600);
	// เชื่อมต่อ
	$objConnect->real_connect(DB_ENDPOINT_IP,DB_USERNAME,DB_PASSWORD,DB_NAME);
	$objConnect->set_charset('utf8');
 ?>

<form>
  <?php
	$strKeyword = $_SESSION['txtKeyword'];
	$Select = $_SESSION['ddlSelect'];
	if($strKeyword == ''){
		?>
		<div class="col-md-offset-4 col-md-3">
    	<div class="alert alert-danger"><strong><font color ="yellow"><i class="fa fa-exclamation-triangle fa-lg"></font></i> &nbsp;ขออภัย ไม่พบเอกสารนี้</strong></div>
  		</div>
  
	<?php }else{
	
	if($Select == 'Name'){
	$sql = "SELECT * FROM docme WHERE Name LIKE '%".$strKeyword."%' ";
	$query = mysqli_query($objConnect,$sql);
	$objResult = mysqli_fetch_assoc($query);
	}
	else if($Select == 'ID_Budgets')
	{
	$sql = "SELECT * FROM docme WHERE Doc_Budget LIKE '%".$strKeyword."%' ";
	$query = mysqli_query($objConnect,$sql);
	$objResult = mysqli_fetch_assoc($query);
	}
	else{
	$sql = "SELECT * FROM docme WHERE Doc_Name LIKE '%".$strKeyword."%' ";
	$query = mysqli_query($objConnect,$sql);
	$objResult = mysqli_fetch_assoc($query);	
	}
?>
  <?php if($objResult){?>
  <table class="table table-bordered table-hover table-striped" style="border-collapse:inherit;cursor:context-menu">
    <tr class="info" style="font-weight:bold;cursor:context-menu">
      <th><center><span style="font-weight:bold"><font color="#000000">ฉบับที่</font></span></center></th>
      <th><center><span style="font-weight:bold"><font color="#000000">เลขงบประมาณ</font></span></center></th>
      <th><center><span style="font-weight:bold"><font color="#000000">ชื่อผู้ยื่นเอกสาร</font></span></center></th>
      <th><center><span style="font-weight:bold"><font color="#000000">ชื่อหน่วยงาน / โครงการ</font></span></center></th>
      <th><center><span style="font-weight:bold"><font color="#000000">สถานะ / รายละเอียด</font></span></center></th>
      <th><center><span style="font-weight:bold"><font color="#000000">PDF</font></span></center></th>
      <th><center><span style="font-weight:bold"><font color="#000000">วันที่ยื่นคำร้อง</font></span></center></th>
    </tr>
    <?php
	if($Select == 'Name'){
	$sql = "SELECT * FROM docme WHERE Name LIKE '%".$strKeyword."%' ";
	$query = mysqli_query($objConnect,$sql);
	}
	else if($Select == 'ID_Budgets')
	{
	$sql = "SELECT * FROM docme WHERE Doc_Budget LIKE '%".$strKeyword."%' ";
	$query = mysqli_query($objConnect,$sql);
	}
	else{
	$sql = "SELECT * FROM docme WHERE Doc_Name LIKE '%".$strKeyword."%' ";
	$query = mysqli_query($objConnect,$sql);	
	}
	
	$i = 1;
while($result = mysqli_fetch_array($query))
{
?>
    <tr>
      <td align="center"><span style="font-weight:bold"><font color="#000000"><?= $i++; ?></font></span></td>
      <?php  if($result["Doc_Budget"] == '') { ?>
      <td align="center"><span style="font-weight:bold"><font color="#FF0000">ยังไม่มีเลขงบประมาณ</font></span></td>
      <?php } else { ?>
      <td align="center"><span style="font-weight:bold"><font color="#000000"><?=$result["Doc_Budget"];?></font></span></td>
      <?php  } ?>
      <td align="center"><span style="font-weight:bold"><font color="#000000"><?=$result["Name"];?></font></span></td>
      <td align="center"><span style="font-weight:bold"><font color="#000000"><?=$result["Doc_Name"];?></font></span></td>
      <?php  if($result["Doc_Budget"] == '') { ?>
              <td><center><span style="font-weight:bold"><font color="#FF0000">รอแบบแผน "กรอกเลขงบประมาณ"</font></span></center></td>
              <?php } else { ?>
      <td align="center"><button  type="button" id="btnaddress" value="<?= $result["Doc_Budget"] ?>" onclick="btnAddress(this);" class="btn btn-success" style="font-size:20px;padding-top:13px" title="สถานะเอกสาร"><i class="fa fa-location-arrow fa-lg"></i><font color="#FFFF00"></font></button>&nbsp;
      <button  type="button" id="btndetails" value="<?= $result["Doc_Budget"] ?>" onclick="btnDetails(this);" class="btn btn-warning" style="font-size:20px;padding-top:13px" title="รายละเอียดเอกสาร"><i class="fa fa-list"></i><font color="#FFFF00"></font></button></td>
      <?php  } ?>
      <?php  if($result["FilesName"] == '') { ?>
               <td><center><span style="font-weight:bold"><font color="#FF0000">ยังไม่มีไฟล์ PDF</font></span></center></td>
              <?php } else { ?>
               <td><center><a href="upload/MyPDF/<?php echo $result["FilesName"];?>" target="new"><img src="img/pdf1.png" alt="Brand" width="33" height="40" title="<?= $result["FilesName"];?>" /> </a></center></td>
               <?php  } ?>
      <td align="center"><span style="font-weight:bold"><?=$result["Date"];?></span></td>
    </tr>
    <?php
}
?>
  </table>
  <?php }else { ?>
  <div class="col-md-offset-4 col-md-3">
    <div class="alert alert-danger"><strong><font color ="yellow"><i class="fa fa-exclamation-triangle fa-lg"></font></i> &nbsp;ขออภัย ไม่พบเอกสารนี้</strong></div>
  </div>
  <?php
}
	}
?>
</form>
</div>


<script src="assets/js/navbar_controller.js"></script> 
