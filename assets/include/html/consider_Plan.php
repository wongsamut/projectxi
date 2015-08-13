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
  <div class="panel panel-warning">
    <div class="panel-heading">
      <h1 class="panel-title" style="font-size: 35px;cursor:context-menu"><i style="font-size: 25px;" class="fa fa-file-text-o"></i>
        เอกสารที่รอพิจารณา
        </h1>
      </div>
      <div  class="panel-body" role="tabpanel" aria-labelledby="headingTwo">
      <div class="container-fluid">
      <?php

      $objQuery = mysqli_query($objConnect, "select * from docme Where  Status_Plan = 'Wait' or Status_Plan = 'No'");
      $objResult = mysqli_fetch_assoc($objQuery);	
	  
      if($objResult)
           {

       ?>
          <table class="table table-bordered table-hover table-striped" style="border-collapse:inherit;">
            <tr class="info" style="cursor:context-menu">
              <th><center><span style="font-weight:bold"><font color="#000000">ฉบับที่</font></span></center></th>
              <th><center><span style="font-weight:bold"><font color="#000000">เลขที่เอกสาร</font></span></center></th>
              <th><center><span style="font-weight:bold"><font color="#000000">ผู้ยื่นคำร้องเอกสาร</font></span></center></th>
              <th><center><span style="font-weight:bold"><font color="#000000">PDF</font></span></center></th>
              <th><center><span style="font-weight:bold"><font color="#000000">แผนกแบบแผน</font></span></center></th>
              <th><center><span style="font-weight:bold"><font color="#000000">ระบุเลขคุมงบประมาณเอกสาร</font></span></center></th>
              <th><center><span style="font-weight:bold"><font color="#000000">อัพโหลด PDF</font></span></center></th>
              <th><center><span style="font-weight:bold"><font color="#000000">อนุมัติเอกสาร</font></span></center></th>
              <th><center><span style="font-weight:bold"><font color="#000000">ไม่อนุมัติเอกสาร</font></span></center></th>
              
            </tr>
            
            <?php   
      $objQuery = mysqli_query($objConnect, "select * from docme Where  Status_Plan = 'Wait' or Status_Plan = 'No'");
	  	  	  
	  $i = 1;
 			while($objResult = mysqli_fetch_array($objQuery)) { ?>
            <tbody style="cursor:context-menu">
              <td><center><span style="font-weight:bold"><font color="#000000"><?=  $i++; ?></font></span></center></td>
              <?php  if($objResult["Doc_Budget"] == '') { ?>
              <td><center><span style="font-weight:bold"><font color="#FF0000">ยังไม่มี</font></span></center></td>
              <?php } else { ?>
              <td><center><span style="font-weight:bold"><font color="#000000"><?= $objResult['Doc_Budget'] ?></font></span></center></td>
              <?php  } ?>
              <td><center><span style="font-weight:bold"><font color="#000000"><?= $objResult['Name'] ?></font></span></center></td>
              <?php  if($objResult["FilesName"] == '') { ?>
               <td><center><span style="font-weight:bold"><font color="#FF0000">ยังไม่มีไฟล์ PDF</font></span></center></td>
              <?php } else { ?>
               <td><center><a href="upload/MyPDF/<?php echo $objResult["FilesName"];?>" target="new"><img src="img/pdf1.png" alt="Brand" width="33" height="40" title="<?= $objResult["FilesName"];?>" /> </a></center></td>
               <?php  } ?>
                <td><center>
                    <?php if($objResult["Status_Plan"] == 'Yes'){	?>
                 	<img src="img/Plus.png" alt="Brand"/ width="40" height="40" title="อนุมัติ">
					<?php } else if($objResult["Status_Plan"] == 'Wait') { ?> 
					<span style="font-weight:bold"><font color="#FF0000">รอพิจารณา</font></span>
					<?php } else if($objResult["Status_Plan"] == 'Fail') { ?>
                    <img src="img/Cancel.png" alt="Brand"/ width="40" height="40" title="ไม่อนุมัติ">
                    <?php } ?>
                  </center></td>
               <td><center><button id="btnpledit" onclick="btnpledit(this);" value="<?= $objResult['ID_DOCS'] ?>"  type="button" class="btn btn-warning"><i class="fa fa-pencil"></i></button></center></td>
               <?php  if($objResult["Doc_Budget"] == '') { ?>
              <td><center><span style="font-weight:bold"><font color="#FF0000">ยังไม่มีเลขงบประมาณ</font></span></center></td>
              <td><center><span style="font-weight:bold"><font color="#FF0000">ยังไม่มีเลขงบประมาณ</font></span></center></td>
              <td><center><span style="font-weight:bold"><font color="#FF0000">ยังไม่มีเลขงบประมาณ</font></span></center></td>
              <?php } else { ?>  
               <td><center><button id="btnPDF" onclick="btnPDFP(this);" value="<?= $objResult['Doc_Budget'] ?>" type="button" class="btn btn-primary"><i class="fa fa-upload"></i></button></center></td> 
               <?php  if($objResult["FilesName"] == '') { ?>
               <td><center><span style="font-weight:bold"><font color="#FF0000">ยังไม่มีไฟล์ PDF</font></span></center></td>
               <?php } else { ?>
              <td><center><button id="btnplpass" onclick="btnplpass(this);" value="<?= $objResult['Doc_Budget'] ?>" type="button" class="btn btn-success"><i class="fa fa-check"></i></button></center></td>            
              <?php  } ?>
              <td><center><button id="btnplfail" onclick="btnplfail(this);" value="<?= $objResult['Doc_Budget'] ?>" type="button" class="btn btn-danger"><i class="fa fa-times"></i></button></center></td>
              <?php  } ?>

            </tbody>
  			<?php } ?>
                   
            </table>
          <?php }else{ 	 ?>  <h1><center> ขออภัย ขณะนี้ไม่มีเอกสารที่ได้ยื่นคำร้องมา </center></h1> <?php } 
      
      mysqli_close($objConnect); ?>
          </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
