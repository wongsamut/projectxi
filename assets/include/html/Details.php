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
	
	$UN = $_GET['data'];
	$query = "select * from petition  where Passbudget ='$UN'";
      $objQuery = mysqli_query($objConnect,$query);
      $objResult = mysqli_fetch_assoc($objQuery);
  $l = 1;
?>

<div class="container">
  <div class="panel panel-success">
    <div class="panel-heading" style="text-align:center; font-size:22px; font-weight:bold;" > ใบประมาณการจัดซื้อ/จัดจ้าง วิทยาลัยเกษตรและเทคโนโลยีพะเยา </div>
    <div class="panel-body" style="background-color: rgb(242, 250, 250);">
   <form  class="form-horizontal" name="frmMain" OnSubmit="return CheckValidate();" method="POST" enctype="multipart/form-data">
      <div class="row form-group">
        <div class="col-md-12">
          <label class="form-inline">วันที่
            <input type="datetime" name="senddate" id="senddate"  class="form-control input-sm" style="padding-top:7px;font-size:19px;font-weight:bold" value="<?php echo $objResult["Senddate"]; ?>"  readonly />
            <input type="hidden" class="form-control input-sm" name="ID_DOC" id="ID_DOC" value="<?php echo $UN; ?>" />
          </label>
        </div>
      </div>
      <!-- บรรทัด 1 -->
      <div class="row form-group">
        <div class="col-md-12">
          <label class="form-inline" >รหัสคุมงบประมาณ
            <input type="text" name="passbudget"  id="passbudget"  class="form-control input-sm" style="padding-top:7px;font-size:19px;font-weight:bold"  placeholder="กรุณาระบุเลขงบประมาณ" readonly value="<?php echo $objResult["Passbudget"] ; ?>" >
          </label>
        </div>
      </div>
      <!-- บรรทัด 2 -->
      <div class="row form-group">
        <div class="col-md-12">
          <label class="form-inline" >ข้าพเจ้า &nbsp;
            <input type="text" name="name"   class="form-control input-sm" id="name" style="padding-top:7px;font-size:19px;font-weight:bold" value="&nbsp;<?php echo $objResult["Name"] ; ?>&nbsp;&nbsp;&nbsp;" readonly>
            &nbsp;&nbsp;&nbsp; ตำแหน่ง &nbsp;
            <input type="text"   class="form-control input-sm" style="padding-top:7px;font-size:19px;font-weight:bold" value="บุคลากรทั่วไป" readonly id="P">
          </label>
        </div>
      </div>
      <!-- บรรทัด 3 -->
      <div class="row form-group">
        <div class="col-md-12">
          <label class="form-inline" >
          ใช้งบประมาณของ
          <?php if($objResult["Usebudform"] == 'คณะวิชา'){ ?>
          <label class="radio-inline">
            <input type="radio" name="usebudform"  id="usebudform" value="คณะวิชา" checked disabled>
            คณะวิชา </label>
          <label class="radio-inline">
            <input type="radio" name="usebudform"  id="usebudform" value="งาน" disabled>
            งาน </label>
          <label class="radio-inline">
            <input type="radio"  name="usebudform" id="usebudform" value="ศูนย์" disabled>
            ศูนย์ </label>
          <label class="radio-inline">
            <input type="radio" name="usebudform"  id="usebudform" value="โครงการ" disabled>
            โครงการ </label>
          <label class="radio-inline">
            <input type="radio" name="usebudform"  id="usebudform" value="กิจกรรม" disabled>
            กิจกรรม </label>
       
        <?php } else if($objResult["Usebudform"] == 'งาน') { ?> 
          <label class="radio-inline">
            <input type="radio" name="usebudform"  id="usebudform" value="คณะวิชา" disabled>
            คณะวิชา </label>
          <label class="radio-inline">
            <input type="radio" name="usebudform"  id="usebudform" value="งาน" checked disabled >
            งาน </label>
            <label class="radio-inline">
            <input type="radio"  name="usebudform" id="usebudform" value="ศูนย์" disabled>
            ศูนย์ </label>
          <label class="radio-inline">
            <input type="radio" name="usebudform"  id="usebudform" value="โครงการ" disabled >
            โครงการ </label>
          <label class="radio-inline">
            <input type="radio" name="usebudform"  id="usebudform" value="กิจกรรม" disabled>
            กิจกรรม </label>
            
        <?php } else if($objResult["Usebudform"] == 'ศูนย์') { ?> 
        <label class="radio-inline">
            <input type="radio" name="usebudform"  id="usebudform" value="คณะวิชา" disabled>
            คณะวิชา </label>
          <label class="radio-inline">
            <input type="radio" name="usebudform"  id="usebudform" value="งาน" disabled>
            งาน </label>
          <label class="radio-inline">
            <input type="radio"  name="usebudform" id="usebudform" value="ศูนย์" checked disabled>
            ศูนย์ </label>
            <label class="radio-inline">
            <input type="radio" name="usebudform"  id="usebudform" value="โครงการ" disabled> 
            โครงการ </label>
          <label class="radio-inline">
            <input type="radio" name="usebudform"  id="usebudform" value="กิจกรรม"disabled>
            กิจกรรม </label>

        <?php } else if($objResult["Usebudform"] == 'โครงการ') { ?>    <label class="radio-inline">
        <label class="radio-inline">
            <input type="radio" name="usebudform"  id="usebudform" value="คณะวิชา" disabled>
            คณะวิชา </label>
          <label class="radio-inline">
            <input type="radio" name="usebudform"  id="usebudform" value="งาน" disabled>
            งาน </label>
          <label class="radio-inline">
            <input type="radio"  name="usebudform" id="usebudform" value="ศูนย์" disabled>
            ศูนย์ </label>
            <label class="radio-inline">
            <input type="radio" name="usebudform"  id="usebudform" value="โครงการ" checked disabled>
            โครงการ </label>
            <label class="radio-inline">
            <input type="radio" name="usebudform"  id="usebudform" value="กิจกรรม" disabled>
            กิจกรรม </label>

        <?php } else if($objResult["Usebudform"] == 'กิจกรรม') { ?> 
        <label class="radio-inline">
            <input type="radio" name="usebudform"  id="usebudform" value="คณะวิชา" disabled>
            คณะวิชา </label>
          <label class="radio-inline">
            <input type="radio" name="usebudform"  id="usebudform" value="งาน" disabled>
            งาน </label>
          <label class="radio-inline">
            <input type="radio"  name="usebudform" id="usebudform" value="ศูนย์" disabled>
            ศูนย์ </label>
            <label class="radio-inline">
            <input type="radio" name="usebudform"  id="usebudform" value="โครงการ" disabled>
            โครงการ </label>
          <label class="radio-inline">
            <input type="radio" name="usebudform"  id="usebudform" value="กิจกรรม" checked disabled>
            กิจกรรม </label>
            <?php } ?>

          <input type="text" id="nameact" name="nameact" class="form-control input-sm" value="<?php echo $objResult["Nameact"] ; ?>" style="padding-top:7px;font-size:19px;font-weight:bold" readonly>
          </label>
          <!--กล่องข้อความหลัง Radio -->
          <label class="form-inline" > ฝ่าย
            <input type="text" id="party" name="party "  class="form-control input-sm" value="<?php echo $objResult["Party"] ; ?>" style="padding-top:7px;font-size:19px;font-weight:bold" readonly>
          </label>
        </div>
      </div>
      <!-- บรรทัด 4 -->
      <div class="row form-group">
        <div class="col-md-12">
          <label class="form-inline" >ขอเสนอ</label>
          <?php if($objResult["Buyorhire"] == 'จัดซื้อ'){ ?>
          <label class="radio-inline ">
            <input type="radio" name="buyorhire" id="buyorhire"  value="จัดซื้อ" checked disabled>
            จัดซื้อ </label>
            <label class="form-inline" >/</label>
             <label class="radio-inline">
            <input type="radio" name="buyorhire" id="buyorhire"  value="จัดจ้าง" disabled>
            จัดจ้าง </label>

          <?php } else if($objResult["Buyorhire"] == 'จัดจ้าง') { ?> 
          
          <label class="radio-inline ">
            <input type="radio" name="buyorhire" id="buyorhire"  value="จัดซื้อ" disabled>
            จัดซื้อ </label>
			<label class="form-inline" >/</label>
          <label class="radio-inline">
            <input type="radio" name="buyorhire" id="buyorhire"  value="จัดจ้าง" checked disabled>
            จัดจ้าง </label>
            <?php } ?>
          <label class="form-inline" >เผื่อใช้ในราชการของวิทลัยฯ ดังนี้</label>
        </div>
      </div>
      <!-- บรรทัด 5  -->
      <div class="row form-group">
        <div class="col-md-1"></div>
        <div class="col-md-3">
        <label class="form-inline">
        <?php if($objResult["Equipment"] != ''){ ?>
        <input type="checkbox" name="equipment"  id="equipment" value="วัสดุ" onclick="doCheck1(this,'1');" checked disabled >
        วัสดุฝึก / อุปกรณ์การสอน ในระบบวิชา
        <?php } else if($objResult["Equipment"] == ''){ ?>
        <input type="checkbox" name="equipment"  id="equipment" value="วัสดุ" onclick="doCheck1(this,'1');" disabled>
        วัสดุฝึก / อุปกรณ์การสอน ในระบบวิชา
        <?php } ?>
        </div>
        <div class="col-md-3" style="width:auto">
          <input type="text" name="detailsequ" class="form-control input-sm" id="detailsequ" style="padding-top:7px;font-size:19px;font-weight:bold"  value="<?php echo $objResult["Detailsequ"] ; ?>"  readonly>
          </label>
        </div>
        <div class="col-md-3" style="width:auto">
          <label class="form-inline" >ชั้น
            <input type="text" name="level" class="form-control input-sm" style="padding-top:7px;font-size:19px;font-weight:bold" id="level" value="<?php echo $objResult["Level"] ; ?>"  readonly>
          </label>
        </div>
      </div>

      <!-- บรรทัด 6 -->
      <div class="row form-group">
        <div class="col-md-1"></div>
        <div class="col-md-3" style="position:relative">
        <label class="form-inline" >
        <?php if($objResult["Repair"] != ''){ ?>
        <input type="checkbox" name="repair" id="repair" value="ซ่อม " onclick="doCheck1(this,'2');" checked disabled>
        ซ่อมเปลี่ยนของเดิมที่ชำรุด
        <?php } else if($objResult["Repair"] == ''){ ?>
        <input type="checkbox" name="repair" id="repair" value="ซ่อม " onclick="doCheck1(this,'2');" disabled>
        ซ่อมเปลี่ยนของเดิมที่ชำรุด
        <?php } ?>
        </div>
        <div class="col-md-3" style="width:auto">
          <input type="text" name="detailsrepair" class="form-control input-sm" style="padding-top:7px;font-size:19px;font-weight:bold" id="detailsrepair" value="<?php echo $objResult["Detailsrepair"] ; ?>"   readonly>
          </label>
        </div>
      </div>
      <!-- บรรทัด 7 -->
      <div class="row form-group">
        <div class="col-md-1"></div>
        <div class="col-md-3" style="position:relative">
        <label class="form-inline" >
        <?php if($objResult["Activity"] != ''){ ?>
        <input type="checkbox" name="activity"  id="activity" value="ใช้ใน" onclick="doCheck1(this,'3');" checked disabled>
        ใข้ในงาน / กิจกรรม / โครงการย่อย
        <?php } else if($objResult["Activity"] == ''){ ?>
        <input type="checkbox" name="activity"  id="activity" value="ใช้ใน" onclick="doCheck1(this,'3');" disabled>
        ใข้ในงาน / กิจกรรม / โครงการย่อย
         <?php } ?>
        </div>
        <div class="col-md-3" style="width:auto">
          <input type="text" name="detailsact" class="form-control input-sm" style="padding-top:7px;font-size:19px;font-weight:bold" id="detailsact"   value="<?php echo $objResult["Detailsact"] ; ?>" readonly>
          </label>
        </div>
      </div>
     
      <!-- บรรทัด 8 -->
      <div class="row form-group">
        <div class="col-md-12">
          <label class="form-inline" >งบประมาณได้รับจากการจัดสรร
           <div class="input-group">
            <input type="text" readonly name="originbudget" class="form-control input-sm" id="originbudget" value="<?php echo $objResult["Originbudget"] ; ?>" style="padding-top:7px;font-size:19px;font-weight:bold"   onkeyup="this.value=Comma(this.value);" onkeypress="return isNumberKey(event);"  style="font-size:20px">
            <span class="input-group-addon input-sm" style="font-size:20px;">บาท</span></div>
          </label>
        </div>
      </div>
      <!-- บรรทัด 9 -->
      <div class="row form-group">
        <div class="col-md-12">
          <label class="form-inline" >
          	 จัดซื้อไปแล้วจำนวน
             <div class="input-group">
            <input type="text" name="roundnumber" readonly  id="roundnumber" class="form-control input-sm" value="<?php echo $objResult["Roundnumber"] ; ?>" style="padding-top:7px;font-size:19px;font-weight:bold"  onkeyup="this.value=Comma(this.value);" onkeypress="return isNumberKey(event);"  style="font-size:20px">
            <span class="input-group-addon input-sm" style="font-size:20px;">ครั้ง</span></div>
            รวมเป็นเงิน
            <div class="input-group">
            <input type="text" name="summoneyattime" readonly  id="summoneyattime" class="form-control input-sm" value="<?php echo $objResult["Summoneyattime"] ; ?>" style="padding-top:7px;font-size:19px;font-weight:bold"  onkeyup="this.value=Comma(this.value);" onkeypress="return isNumberKey(event);"  style="font-size:20px">
            <span class="input-group-addon input-sm" style="font-size:20px;">บาท</span></div>
            คงเหลือ
            <div class="input-group">
            <input type="text" name="balancemoneyattime" readonly  id="balancemoneyattime" class="form-control input-sm" value="<?php echo $objResult["Balancemoneyattime"] ; ?>" style="padding-top:7px;font-size:19px;font-weight:bold"  onkeyup="this.value=Comma(this.value);" onkeypress="return isNumberKey(event);"  style="font-size:20px">
            <span class="input-group-addon input-sm" style="font-size:20px;">บาท</span></div>
          </label>
        </div>
      </div>
      <!-- บรรทัด 10-->
      <div class="row form-group">
      <div class="col-md-12">

      <input type="hidden" name="showInline"  id="showInline">
        <table class="table table-bordered table-hover table-striped" id="tbExp" border="2"  style="border-radius:4px;border-color:rgba(0,0,0,0.6);text-shadow:1px 1px 1px rgba(0,0,0,0.3);border-collapse:inherit;"> <!-- เรียกใช้ตาราง -->
          <tr class="warning">
            <td   width="1%"><center>ลำดับ</center></td>
            <td  class="col-md-3"><center>รายการ</center></td>
            <td  class="col-md-1"><center>จำนวน</center></td>
            <td  class="col-md-1"><center>หน่วยนับ</center></td>
            <td  class="col-md-1"><center>ราคา/หน่วย</center></td>
            <td  class="col-md-2"><center>รวมเงิน</center></td>
            <td  class="col-md-1"><center>กำหนดวันที่ต้องการใช้</center></td>
          </tr>

          <?php
          $l=0;
          $query = mysqli_query($objConnect, "select * from addrow  where Passbudget ='$UN'");
          $result_array = array();
          while ($row = mysqli_fetch_assoc($query)) {
           $result_array[] = $row;
           $l++;
?> 
          <tr >
                <td><center><?php echo "$l"; ?></center></td> 
                <td><input class="form-control input-sm" style="padding-top:0px;font-weight:bold;font-size:20px" readonly type="text" value="<?php echo $row["Namelist"];?>"></td>      <!--ชื่อฟิลของ DB -->  
                <td><center><input class="form-control input-sm" style="padding-top:0px;font-weight:bold;font-size:20px" readonly type="text" value="<?php echo $row["Amount"];?>"></center></td> <!--ชื่อฟิลของ DB -->
                <td><center><input class="form-control input-sm" style="padding-top:0px;font-weight:bold;font-size:20px" readonly type="text" value="<?php echo $row["Unit"];?>"></center></td> <!--ชื่อฟิลของ DB -->
                <td><center><input class="form-control input-sm" style="padding-top:0px;font-weight:bold;font-size:20px" readonly type="text" value="<?php echo $row["Pricetounit"];?>"></center></td>
                <td><center><div class="input-group"><input class="form-control input-sm" readonly type="text" value="<?php echo $row["Summoney"];?>" style="width:76%;padding-top:0px;font-weight:bold;font-size:20px" onkeyup="this.value=Comma(this.value);"/><span class="input-group-addon input-sm" style="font-size:20px;width:auto;float:left">บาท</span></div></center></td>
                <td><input class="form-control input-sm" style="padding-top:0px;font-weight:bold;font-size:20px" readonly type="text" value="<?php echo $row["Limitday"];?>" </td>
            </tr>
        <?php  } ?>
        </table>  <!-- เสร็จส่วนหัวตาราง -->
        <input type="hidden" name="hdnMaxLine" id="hdnMaxLine" value=" <?php  echo "$l";  ?>">      
        </div>
        </div>
      <br>
      <div class="row form-group">
        <div class="col-md-1"></div>
        <div class="col-md-11" style="position:relative;">
          <label class="form-inline">
          รวม&nbsp;&nbsp;
          <div class="input-group">
            <input type="text-danger" readonly name="sumalltime"  id="sumalltime" class="form-control input-sm"  style="padding-top:7px;font-size:19px;font-weight:bold" value="<?php echo $objResult["Sumalltime"] ; ?>"  onkeyup="this.value=Comma(this.value);" onkeypress="return isNumberKey(event);"  style="font-size:20px"/>
            <span class="input-group-addon input-sm" style="font-size:20px">บาท</span> </div>
          
          &nbsp;&nbsp; คงเหลือเงินไว้ซื้อครั้งต่อไป &nbsp;&nbsp;
          <div class="input-group">

              <input type="text-success" readonly name="balancealltime"  id="balancealltime" class="form-control input-sm"   style="padding-top:7px;font-size:19px;font-weight:bold" value="<?php echo $objResult["Balancealltime"] ; ?>"  onkeyup="this.value=Comma(this.value);" onkeypress="return isNumberKey(event);"  style="font-size:20px" />
              <span class="input-group-addon input-sm" style="font-size:20px;">บาท</span> 
            </label>
          </div>
        </div>
      </div>
      <!-- บรรทัด 11--> 
</form>
</div>
</div>

<SCRIPT language="JavaScript"> 
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
 
    if(charCode == 46)
        return true;
 
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</SCRIPT>
<script language="JavaScript">

function Comma(Num)
 {
       Num += '';
       Num = Num.replace(/,/g, '');

       x = Num.split('.');
       x1 = x[0];
       x2 = x.length > 1 ? '.' + x[1] : '';
       var rgx = /(\d+)(\d{3})/;
       while (rgx.test(x1))
       x1 = x1.replace(rgx, '$1' + ',' + '$2');
       return x1 + x2;
 } 
</script>

