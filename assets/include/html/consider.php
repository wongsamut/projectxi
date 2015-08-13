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
      <h1 class="panel-title" style="font-size: 35px;"><i style="font-size: 25px;" class="fa fa-file-text-o"></i>
        เอกสารที่รอพิจารณา --- ADMIN
        </h1>
      </div>
    
          <table class="table table-striped">
            <thead>
              <th><center>ฉบับที่</center></th>
              <th><center>เลขที่เอกสาร</center></th>
              <th><center>ผู้ยื่นคำร้องเอกสาร</center></th>
              <th><center>PDF</center></th>
              <th><center>อนุมัติเอกสาร</center></th>
              <th><center>ไม่อนุมัติเอกสาร</center></th>
            </thead>

            <tbody>
              <td><center>1</center></td>
              <td><center>กย 15/0</center></td>
              <td><center>นาย ดำดิน มืดจัง</center></td>
              <td><center><button type="submit" name="button" id="button" ><img src="img/pdf.png" width="40" height="40" align="absmiddle" /> </button></center></td>
              <td><center><button style="border-radius: 19px;" type="summit" class="btn btn-success"><i class="fa fa-check"></i></button></center></td>
              <td><center><button style="border-radius: 19px;" type="button" class="btn btn-danger"><i class="fa fa-times"></i></button></center></td>

            </tbody>
  
          </table>
          </div>
        </div>
        <div class="col-md-12"> <button id="btnsup" type="button" class="btn btn-info btn-lg" href="consider-sup.php">Sup</button> 
                               <button  id="btnplan" type="button" class="btn btn-info btn-lg"  href="consider-plan.php">Plan</button> 
                               <button  id="btnmon" type="button" class="btn btn-info btn-lg"  href="consider-mony.php">Mon</button> 
        </div>

    </div>
</div>
<script src="assets/js/navbar_controller.js"></script> 