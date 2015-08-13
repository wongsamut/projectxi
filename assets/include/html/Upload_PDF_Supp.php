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

?>

<div class="container">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h1 class="panel-title" style="font-size: 35px;cursor:context-menu"><i style="font-size: 25px;" class="fa fa-upload"></i>
        Upload PDF Files
        </h1>
      </div>
      <div  class="panel-body" role="tabpanel" aria-labelledby="headingTwo">
      <div class="container-fluid">
      <?php
	  
	  $Doc_Budget = $_GET['data'];

      $objQuery = mysqli_query($objConnect, "select * from docme Where Doc_Budget = '$Doc_Budget'");
      $objResult = mysqli_fetch_assoc($objQuery);	
	  
      if($objResult)
           {

       ?>
          <table class="table table-striped">
            <tr class="info" style="cursor:context-menu">
              <th><center><font color="#000000">ฉบับที่</font></center></th>
              <th><center><font color="#000000">เลขที่เอกสาร</font></center></th>
              <th><center><font color="#000000">ผู้ยื่นคำร้องเอกสาร</font></center></th>
              <th><center><font color="#000000">PDF</font></center></th>
              <th><center><font color="#000000">แผนกพัสดุ</font></center></th>
            </tr>
            
            <?php   
      $objQuery = mysqli_query($objConnect, "select * from docme WHERE Doc_Budget = '$Doc_Budget' ") or die(mysqli_error($objConnect));
	   	  
	  $i = 1;
 			while($objResult = mysqli_fetch_array($objQuery)) { ?>
            <tbody style="cursor:context-menu">
              <td><center><span style="font-weight:bold"><font color="#000000"><?=  $i++; ?></font></span></center></td>
              <td><center><span style="font-weight:bold"><font color="#000000"><?= $objResult['Doc_Budget'] ?></font></span></center></td>
              <td><center><span style="font-weight:bold"><font color="#000000"><?= $objResult['Name'] ?></font></span></center></td>
              <td><center><a href="upload/MyPDF/<?php echo $objResult["FilesName"];?>" target="new"><img src="img/pdf1.png" alt="Brand" width="33" height="40" /> </a></center></td>
              <td><center>
                    <?php if($objResult["Status_Supp"] == 'Yes'){ ?>
                 	<img src="img/Plus.png" alt="Brand"/ width="40" height="40" title="อนุมัติ">
          			<?php } else if($objResult["Status_Supp"] == 'No') { ?> 
          			<span style="font-weight:bold"><font color="#FF0000">รอพิจารณา</font></span>
                    <?php } else if($objResult["Status_Supp"] == 'Wait') { ?> 
					<span style="font-weight:bold"><font color="#FF0000">กำลังซื้อของ</font></span>
          			<?php } else if($objResult["Status_Supp"] == 'Fail') { ?>
                    <img src="img/Cancel.png" alt="Brand"/ width="40" height="40" title="ไม่อนุมัติ">
                    <?php } ?>
                  </center></td>
            </tbody>
  			<?php } 
			$objQuery = mysqli_query($objConnect, "select * from files WHERE Doc_Budget = '$Doc_Budget' ") or die(mysqli_error($objConnect));
			$objFiles = mysqli_fetch_array($objQuery);
			?>
                   
            </table>
            <br>
            <form name="frm" method="post" enctype="multipart/form-data">
 			<div class="form-group">
            <input type="file" class="col-lg-offset-3 col-lg-2 form-control" style="width:50%;font-size:18px;padding-top:5px;font-weight:bold"  id="filUpload">
            <input type="hidden"  id="Doc_Budget" value="<?php echo $objFiles["Doc_Budget"];?>">
            <input type="hidden"  id="Filesname" value="<?php echo $objFiles["FilesName"];?>">
            <input type="hidden"  id="IDID" value="<?php echo $objFiles["FilesID"];?>">
            <br></div>
            <center>
          <input type="checkbox" name="chkagreement" onClick="apply();"><font style="font-weight:bold"> ยอมรับเงื่อนไข </font><a data-toggle="modal" data-target="#Warning" href="#" style="font-weight:bold"><font color="#FF0000">**กรุณาอ่านก่อนอัพโหลดไฟล์**</font></a><br>
          </center><br>
            <button id="btnPFDSubmit" type="button" class="col-lg-offset-5 btn btn-success" disabled onClick='PDFUploadSupp();'><i class="fa fa-upload">&nbsp;&nbsp;อัพโหลด</i></button>
            <br><br>
            </form>
          <?php }else{  } 
      
      mysqli_close($objConnect); ?>
      
          </div>
        </div>
    </div>
</div>

<script src="assets/js/Upload_Supp.js"></script>
<script language=javascript>
function apply()
{
  document.frm.btnPFDSubmit.disabled=true;
  if(document.frm.chkagreement.checked==true)
  {
    document.frm.btnPFDSubmit.disabled=false;
  }
  if(document.frm.chkagreement.checked==false)
  {
    document.frm.btnPFDSubmit.enabled=false;
  }
}
</script>


<!------------------------------------------------------Warning------------------------------------------------------->

<div class="modal fade" id="Warning" >
  <div class="modal-dialog" style="background-color:">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" hidden="true"></span></button>
      <div class="panel panel-warning">
        <div class="panel-heading" style="text-align:center">
          <h2 style="font-size:30px;font-weight:bold">Warning</h2>
        </div>
      </div>
      <div class="modal-body">
      <span class="col-lg-offset-1 help-block">
              <p class="text-danger" style="font-size:22px;font-weight:bold"> 1.กรุณาตั้งอย่าชื่อไฟล์เหมือนหรือซ้ำไฟล์คำร้องอื่น มิเช่นนั้นไฟล์อาจมีการสูญหาย</p>
              <p class="text-danger" style="font-size:22px;font-weight:bold"> 2.กรุณาตั้งชื่อไฟล์ให้เหมือนกันเท่านั้น <U>"หาก"</U> เป็นคำร้องเดียวกันในทุกครั้งที่อัพโหลด มิเช่นนั้นไฟล์อาจมีการสูญหาย </p>
              </span>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-info btn-lg" data-dismiss="modal" style="font-size:20px;padding-top:13px;font-weight:bold:"><i class="fa fa-check fa-lg"></i>&nbsp;&nbsp;ยอมรับ</button>

    </div>
  </div>
</div>
</div>
<!------------------------------------------------------Warning------------------------------------------------------->