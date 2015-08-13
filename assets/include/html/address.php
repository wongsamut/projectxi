
<?php
@session_start();
  include('databaseconfig.php');
		
	$objConnect = mysqli_init();
	// การปรับแต่ง options ต้องทำก่อนการเชื่อมต่อ
	$objConnect->options(MYSQLI_OPT_CONNECT_TIMEOUT, 3600);
	// เชื่อมต่อ
	$objConnect->real_connect(DB_ENDPOINT_IP,DB_USERNAME,DB_PASSWORD,DB_NAME);
	$objConnect->set_charset('utf8');
 
  //*** Update Last Stay in Login System
  $sql = $objConnect->query("UPDATE user_status SET LastUpdate = NOW() WHERE UserID = '".$_SESSION["UserID"]."' ");
   $DN = $_GET['data'];
   
   
		$query = "select * from docme  where Doc_Budget='$DN'";
      $objQuery = mysqli_query($objConnect,$query);
      $objResult = mysqli_fetch_assoc($objQuery);

?>
<div class="container">
<div class="panel panel-success">
  <div class="panel-heading" role="tab" id="headingTwo">
    <h3 class="panel-title"> <a  aria-expanded="false"  style="font-size:22px;padding-top:10px;font-weight:bold;cursor:context-menu"><i class="fa fa-file-text-o fa-lg" style="padding-top:5px"></i>&nbsp;&nbsp;สถานะของเอกสารหมายเลขงบประมาณ <font style="color:#FF0;font-weight:bold">"<?php echo $objResult["Doc_Budget"] ; ?>" </font></a></h3>
  </div>
  <div  class="panel-body" role="tabpanel" aria-labelledby="headingTwo">
      <div class="container-fluid">
        <?php
        
      $query = "select * from docme  where Doc_Budget='$DN'";
      $objQuery = mysqli_query($objConnect,$query);
      $objResult = mysqli_fetch_assoc($objQuery);
      if($objResult)
           {

       ?>
   
            <table class="table table-bordered table-hover table-striped" style="border-collapse:inherit;">
              <tr class="info" style="cursor:context-menu">
              <th > <center><font color="#000000">
                    วันที่ยื่นคำร้อง
                  </font></center></th>
                <th> <center><font color="#000000">
                    ชื่อหน่วยงาน / โครงการ
                  </font></center></th>
                  <th> <center><font color="#000000">
                   แผนกแบบแผน
                 </font> </center></th>
                <th> <center><font color="#000000">
                    แผนกพัสดุ
                  </font></center></th>
                <th> <center><font color="#000000">
                   แผนกการเงิน
                  </font></center></th>
                  </tr>     
 <?php   
      
      $objQuery = mysqli_query($objConnect,$query);


            while($objResult = mysqli_fetch_array($objQuery)) { ?>

          <tbody style="cursor:context-menu">
              <td><center><span style="font-weight:bold">
                   <?php echo $objResult["Date"] ; ?>
                  </span></center></td>
                <td><center><span style="font-weight:bold">
                    <?php echo $objResult["Doc_Name"] ; ?>
                  </span></center></td>
                <td><center>
                    <?php if($objResult["Status_Plan"] == 'Yes'){	?>
                 	<img src="img/Plus.png" width="40" height="40" title="อนุมัติ"/>
					<?php } else if($objResult["Status_Plan"] == 'No') { ?> 
					<span style="font-weight:bold"><font color="#FF0000">รอพิจารณา</font></span>
                    <?php } else if($objResult["Status_Plan"] == 'Wait') { ?> 
					<span style="font-weight:bold"><font color="#FF0000">รอพิจารณา</font></span>
					<?php } else if($objResult["Status_Plan"] == 'Fail') { ?>
                    <img src="img/Cancel.png" alt="Brand" width="40" height="40" title="ไม่อนุมัติ"/>
                    <?php } ?>
                  </center></td>
                  <td><center>
                    <?php if($objResult["Status_Supp"] == 'Yes'){ ?>
                 	<img src="img/Plus.png" alt="Brand" width="40" height="40" title="อนุมัติ"/>
          			<?php } else if($objResult["Status_Supp"] == 'No') { ?> 
          			<span style="font-weight:bold"><font color="#FF0000">รอพิจารณา</font></span>
                    <?php } else if($objResult["Status_Supp"] == 'Wait') { ?> 
					<span style="font-weight:bold"><font color="#FF0000">กำลังซื้อของ</font></span>
          			<?php } else if($objResult["Status_Supp"] == 'Fail') { ?>
                    <img src="img/Cancel.png" alt="Brand" width="40" height="40" title="ไม่อนุมัติ"/>
                    <?php } ?>
                  </center></td>
                  <td><center>
                    <?php if($objResult["Status_Fin"] == 'Yes'){	?>
                 	<img src="img/Plus.png" alt="Brand" width="40" height="40" title="อนุมัติ"/>
					<?php } else if($objResult["Status_Fin"] == 'No') { ?> 
					<span style="font-weight:bold"><font color="#FF0000">รอพิจารณา</font></span>
					<?php } else if($objResult["Status_Fin"] == 'Fail'){ ?>
                    <img src="img/Cancel.png" alt="Brand" width="40" height="40" title="ไม่อนุมัติ"/>
                    <?php } ?>
                  </center></td>
                  </tbody>  
                  <?php }}else{ } 
      
      mysqli_close($objConnect)?>  
            </table>
          </div>
          <div class="col-md-12"></div>
        </div>
      </div>
    </div>
 

<script src="assets/js/navbar_controller.js"></script> 

