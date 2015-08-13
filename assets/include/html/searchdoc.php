<?php

session_start();
	include('databaseconfig.php');
		
$objConnect = mysqli_init();
// การปรับแต่ง options ต้องทำก่อนการเชื่อมต่อ
$objConnect->options(MYSQLI_OPT_CONNECT_TIMEOUT, 3600);
// เชื่อมต่อ
$objConnect->real_connect(DB_ENDPOINT_IP,DB_USERNAME,DB_PASSWORD,DB_NAME);
$objConnect->set_charset('utf8');
	//*** Update Last Stay in Login System
	$sql = $objConnect->query("UPDATE user_status SET LastUpdate = NOW() WHERE UserID = '".$_SESSION["UserID"]."' ");
	
	

?>
<div class="container">
<?php if(@$_SESSION['login'] == 2)  {?>
<div class="panel panel-primary" >
  <div class="panel-heading" aria-expanded="false" data-toggle="collapse" data-target="#panel-seeme">
    <h3 class="panel-title" style="font-size:22px;font-weight:bold;cursor:context-menu"><i class="fa fa-file-text-o fa-lg" style="padding-top:5px"></i>&nbsp;&nbsp;คำร้องของตนเอง</a></h3>
  </div>
  <div  class="collapse panel-body" role="tabpanel" aria-labelledby="headingTwo" id="panel-seeme">
      <div class="container-fluid">
            <?php
			$user=$_SESSION['user'];;
      $query = "select * from docme Where Username = '$user'";
      $objQuery = mysqli_query($objConnect,$query);
      $objResult = mysqli_fetch_assoc($objQuery);
      if($objResult)
           {

       ?>
            <table class="table table-bordered table-hover table-striped" style="border-collapse:inherit;cursor:context-menu">
               <tr class="info" style="font-weight:bold;cursor:context-menu;">
              <th><center><span style="font-weight:bold"><font color="#000000">ฉบับที่</font></span></center></th>
              <th><center><span style="font-weight:bold"><font color="#000000">เลขงบประมาณ</font></span></center></th>
              <th><center><span style="font-weight:bold"><font color="#000000">ชื่อผู้ยื่นเอกสาร</font></span></center></th>
              <th><center><span style="font-weight:bold"><font color="#000000">ชื่อหน่วยงาน / โครงการ</font></span></center></th>
              <th><center><span style="font-weight:bold"><font color="#000000">สถานะ / รายละเอียด</font></span></center></th>
              <th><center><span style="font-weight:bold"><font color="#000000">PDF</font></span></center></th>
              <th><center><span style="font-weight:bold"><font color="#000000">วันที่ยื่นคำร้อง</font></span></center></th>
             	</tr>
                
                  <?php   
      $query = "select * from docme Where Username = '$user' ";
      $objQuery = mysqli_query($objConnect,$query);

	  $i = 1;
            while($objResult = mysqli_fetch_array($objQuery)) { ?>
              
          <tr>
              <td><center><span style="font-weight:bold"><font color="#000000"><?=  $i++; ?></span></center></td>
              <td><center><span style="font-weight:bold"><font color="#000000"><?= $objResult['Doc_Budget'] ?></span></center></td>
               <td><center><span style="font-weight:bold"><font color="#000000"><?= $objResult['Name'] ?></span></center></td>
              <td><center><span style="font-weight:bold"><font color="#000000"><?= $objResult['Doc_Name'] ?></span></center></td>
             				<?php  if($objResult["Doc_Budget"] == '') { ?>
              <td><center><span style="font-weight:bold"><font color="#FF0000">รอแบบแผน "กรอกเลขงบประมาณ"</font></span></center></td>
              <?php } else { ?>
               <td><center><button  type="button" id="btnaddress" value="<?= $objResult["Doc_Budget"] ?>" onclick="btnAddress(this);" class="btn btn-success" style="font-size:20px;padding-top:13px" title="สถานะเอกสาร"><i class="fa fa-location-arrow fa-lg"></i><font color="#FFFF00"></font></button>&nbsp;
      <button  type="button" id="btndetails" value="<?= $objResult["Doc_Budget"] ?>" onclick="btnDetails(this);" class="btn btn-warning" style="font-size:20px;padding-top:13px" title="รายละเอียดเอกสาร"><i class="fa fa-list"></i><font color="#FFFF00"></font></button></center></td>
               <?php  } ?>
               <?php  if($objResult["FilesName"] == '') { ?>
               <td><center><span style="font-weight:bold"><font color="#FF0000">ยังไม่มีไฟล์ PDF</font></span></center></td>
              <?php } else { ?>
               <td><center><a href="upload/MyPDF/<?php echo $objResult["FilesName"];?>" target="new"><img src="img/pdf1.png" alt="Brand" width="33" height="40" title="<?= $objResult["FilesName"];?>" /> </a></center></td>
               <?php  } ?>
               <td align="center"><span style="font-weight:bold"><?= $objResult["Date"];?></span></td>
                  </tr>
              <?php } ?>
                   
            </table>
          <?php }else{
			 ?>  <h1><center> ขออภัย ท่านไม่มีเอกสารที่ได้ยื่นคำร้องไป </center></h1> <?php
			   } 
      
      mysqli_close($objConnect); ?>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
  
<?php } ?>

<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title" style="font-size:22px;font-weight:bold;cursor:context-menu"><i class="fa fa-search fa-lg" style="padding-top:5px"></i>&nbsp;&nbsp;คำร้องอื่นๆ</a></h3>
  </div>
  <div  class="panel-body" >
       
          <div class="form-group">
              <div class="col-md-offset-1 col-md-2">
                <select class="form-control" id="ddlSelect" style="width:auto;font-size:18px;font-weight:bold;padding-top:5px">
                  <option value="ID_Budgets">เลขงบประมาณ</option>
                  <option value="Name">ชื่อผู้ยื่นคำร้อง</option>
                  <option value="DocName">ชื่อเอกสาร</option>
                </select>
              </div>
            <div class="col-md-5">
              <input id="txtKeyword" class="form-control" type="text" style="font-size:18px;font-weight:bold;"/>
            </div>
            <div class="col-md-4">
              <button id="btnSearchPur" class="btn btn-info" style="font-size:15px;padding-top:3px;padding-bottom:1px;font-weight:bold;"><i class="fa fa-search fa-lg">&nbsp;&nbsp;</i><font size="+2">ค้นหา</font></button>
            </div>
<br><br>
          <div id="contect-hoo"></div>
      </div> <!--- DIV body-->
    </div> <!--- DIV Panel-->
  </div> <!--- DIV ใหญ่-->
  
  
<script src="assets/js/navbar_controller.js"></script> 

