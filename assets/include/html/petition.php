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
	
	
	$user=$_SESSION['user'];
?>

<script language="JavaScript">
<!--
function doCheck1(which,id) {
if(id=='1') {
  if(which.checked==true) {
    document.frmMain.detailsequ.disabled=false;
	document.frmMain.level.disabled=false;
  } else {
    document.frmMain.detailsequ.disabled=true;
	document.frmMain.level.disabled=true;
  }
}
if(id=='2') {if(which.checked==true) {
    document.frmMain.detailsrepair.disabled=false;
  } else {
    document.frmMain.detailsrepair.disabled=true;
  }
}
if(id=='3'){if(which.checked==true) {
    document.frmMain.detailsact.disabled=false;
  } else {
    document.frmMain.detailsact.disabled=true;
  }
} 
}
// -->
</script>
<script language="javascript">
function CheckValidate()
	{

		for(i=1;i<=document.frmMain.hdnMaxLine.value;i++)
		{
			
			//*** Column 1 ***/
			if(eval("document.frmMain.Column1_"+i+".value")=="")
			{
				alert('Please input Column 1 line.. ' + i);
				eval("document.frmMain.Column1_"+i+".focus();")
				return false;
			}

			//*** Column 2 ***/
			if(eval("document.frmMain.Column2_"+i+".value")=="")
			{
				alert('Please input Column 2 line.. ' + i);
				eval("document.frmMain.Column2_"+i+".focus();")
				return false;
			}

			//*** Column 3 ***/
			if(eval("document.frmMain.Column3_"+i+".value")=="")
			{
				alert('Please input Column 3 line.. ' + i);
				eval("document.frmMain.Column3_"+i+".focus();")
				return false;
			}

			//*** Column 4 ***/
			if(eval("document.frmMain.Column4_"+i+".value")=="")
			{
				alert('Please input Column 4 line.. ' + i);
				eval("document.frmMain.Column4_"+i+".focus();")
				return false;
			}

			//*** Column 5 ***/
			if(eval("document.frmMain.Column5_"+i+".value")=="")
			{
				alert('Please input Column 5 line.. ' + i);
				eval("document.frmMain.Column5_"+i+".focus();")
				return false;
			}

		}

	}
	function CreateNewRow()
	{
		var intLine = parseInt(document.frmMain.hdnMaxLine.value);
		intLine++;
		
			
		var theTable = document.getElementById("tbExp");
		var newRow = theTable.insertRow(theTable.rows.length)
		newRow.id = newRow.uniqueID

		var newCell
		
		//*** Column 1 ***//
		newCell = newRow.insertCell(0);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "css-name");
		newCell.innerHTML = "<center>" +intLine+ "</center>";

		//*** Column 2 ***//
		newCell = newRow.insertCell(1);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "css-name");
		newCell.innerHTML = "<center><INPUT TYPE=\"TEXT\" style=\"padding-top:0px;font-weight:bold;font-size:20px\" CLASS=\"form-control input-sm\" name=\"txtName"+intLine+"\"   ID=\"txtName"+intLine+"\" ></center>";
		
		//*** Column 3 ***//
		newCell = newRow.insertCell(2);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "css-name");
		newCell.innerHTML = "<INPUT TYPE=\"number\" CLASS=\"form-control input-sm\" name=\"txtNum"+intLine+"\"  ID=\"txtNum"+intLine+"\" style=\"padding-top:0px;font-weight:bold;font-size:20px\" onkeypress=\"return isNumberKey(event);\">";
		
		//*** Column 4 ***//
		newCell = newRow.insertCell(3);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "css-name");
		newCell.innerHTML = "<center><INPUT TYPE=\"text\" CLASS=\"form-control input-sm\" style=\"padding-top:0px;font-weight:bold;font-size:20px\" name=\"txtUnit"+intLine+"\"  ID=\"txtUnit"+intLine+"\"></center>";
		
		//*** Column 5 ***//
		newCell = newRow.insertCell(4);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "css-name");
		newCell.innerHTML = "<center><INPUT TYPE=\"number\" CLASS=\"form-control input-sm\" name=\"txtPrice"+intLine+"\"  ID=\"txtPrice"+intLine+"\" style=\"padding-top:0px;font-weight:bold;font-size:20px\"  onkeypress=\"return isNumberKey(event);\"></center>";
		
		
		
		//*** Column 6 ***//
		newCell = newRow.insertCell(5);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "css-name");
		newCell.innerHTML  = "<center><div class=\"input-group\"><input type=\"text\" class=\"form-control input-sm\" id=\"txtTotal"+intLine+"\" name=\"txtTotal"+intLine+"\" style=\"width:76%;padding-top:0px;font-weight:bold;font-size:20px\" readonly onkeypress=\"document.frmMain.txtTotal"+intLine+".value=parseFloat(document.frmMain.txtNum"+intLine+".value)*parseFloat(document.frmMain.txtPrice"+intLine+".value);\" onkeyup=\"this.value=Comma(this.value);\"><span CLASS=\"input-group-addon input-sm\" style=\"font-size:20px;width:auto;float:left\" >บาท</span></DIV></center>";
		
		//*** Column 6 ***//
		newCell = newRow.insertCell(6);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "css-name");
		newCell.innerHTML = "<center><INPUT TYPE=\"DATE\" CLASS=\"form-control input-sm\" style=\"padding-top:5px;font-weight:bold;font-size:20px\" name=\"txtdate"+intLine+"\"  ID=\"txtdate"+intLine+"\" ></center>";
		

		
		
		document.frmMain.hdnMaxLine.value = intLine;
		$("#showInline").val(intLine);
		
	}
	
	function RemoveRow()
	{
		intLine = parseInt(document.frmMain.hdnMaxLine.value);
		if(parseInt(intLine) > 0)
		{
				theTable = document.getElementById("tbExp");				
				theTableBody = theTable.tBodies[0];
				theTableBody.deleteRow(intLine);
				intLine--;
				document.frmMain.hdnMaxLine.value = intLine;
				$("#showInline").val(intLine);
				
		}	
	}	
	
</script>
<div class="container">
  <div class="panel panel-success">
    <div class="panel-heading" style="text-align:center; font-size:22px; font-weight:bold;cursor:context-menu" > ใบประมาณการ จัดซื้อ/จัดจ้าง วิทยาลัยเกษตรและเทคโนโลยีพะเยา </div>
    <div class="panel-body" style="background-color: rgb(242, 250, 250);font-weight:bold">
   <form  class="form-horizontal" name="frmMain" OnSubmit="return CheckValidate();" method="POST" enctype="multipart/form-data" action="insertpetition.php">
      <div class="row form-group">
        <div class="col-md-12">
          <label class="form-inline">วันที่
            <input type="datetime" name="senddate" id="senddate"  class="form-control input-sm" style="padding-top:7px;font-size:19px;font-weight:bold" value="<?php echo date("d/m/Y"); ?>"  readonly />
          </label>
        </div>
      </div>
      <!-- บรรทัด 1 -->
      <div class="row form-group">
        <div class="col-md-12">
          <label class="form-inline" >รหัสคุมงบประมาณ
            <input type="text" name="passbudget"  id="passbudget"  class="form-control input-sm" style="padding-top:7px;font-size:19px;font-weight:bold"  placeholder="" readonly>
          </label>
        </div>
      </div>
      <!-- บรรทัด 2 -->
      <div class="row form-group">
        <div class="col-md-12">
          <label class="form-inline" >ข้าพเจ้า &nbsp;
            <input type="text" name="name"   class="form-control input-sm" id="name" style="padding-top:7px;font-size:19px;font-weight:bold" value="&nbsp;<?=$_SESSION['name']?>&nbsp;&nbsp;&nbsp; <?=$_SESSION['last']?>" readonly>
            &nbsp;&nbsp;&nbsp; ตำแหน่ง &nbsp;
            <input type="text"   class="form-control input-sm" style="padding-top:7px;font-size:19px;font-weight:bold" value="<?=$_SESSION['position']?>" readonly id="P">
          </label>
        </div>
      </div>
      <!-- บรรทัด 3 -->
      <div class="row form-group">
        <div class="col-md-12">
          <label class="form-inline" >
          ใช้งบประมาณของ
          <label class="radio-inline">
            <input type="radio" name="usebudform"  id="usebudform" value="คณะวิชา" checked>
            คณะวิชา </label>
          <label class="radio-inline">
            <input type="radio" name="usebudform"  id="usebudform" value="งาน">
            งาน </label>
          <label class="radio-inline">
            <input type="radio"  name="usebudform" id="usebudform" value="ศูนย์">
            ศูนย์ </label>
          <label class="radio-inline">
            <input type="radio" name="usebudform"  id="usebudform" value="โครงการ">
            โครงการ </label>
          <label class="radio-inline">
            <input type="radio" name="usebudform"  id="usebudform" value="กิจกรรม">
            กิจกรรม </label>
          <input type="text" id="nameact" name="nameact" class="form-control input-sm" placeholder="กรุณาระบุชื่อ" style="padding-top:7px;font-size:19px;font-weight:bold">
          </label>
          <!--กล่องข้อความหลัง Radio -->
          <label class="form-inline" > ฝ่าย
            <input type="text" id="party" name="party "  class="form-control input-sm" placeholder="กรุณาระบุฝ่าย" style="padding-top:7px;font-size:19px;font-weight:bold">
          </label>
        </div>
      </div>
      <!-- บรรทัด 4 -->
      <div class="row form-group">
        <div class="col-md-12">
          <label class="form-inline" >ขอเสนอ</label>
          <label class="radio-inline ">
            <input type="radio" name="buyorhire" id="buyorhire"  value="จัดซื้อ" checked>
            จัดซื้อ </label>
          <label class="form-inline" >/</label>
          <label class="radio-inline">
            <input type="radio" name="buyorhire" id="buyorhire"  value="จัดจ้าง">
            จัดจ้าง </label>
          <label class="form-inline" >เผื่อใช้ในราชการของวิทลัยฯ ดังนี้</label>
        </div>
      </div>
      <!-- บรรทัด 5  -->
      <div class="row form-group">
        <div class="col-md-1"></div>
        <div class="col-md-3">
        <label class="form-inline">
        <input type="checkbox" name="equipment"  id="equipment" value="วัสดุ" onclick="doCheck1(this,'1');">
        วัสดุฝึก / อุปกรณ์การสอน ในระบบวิชา
        </div>
        <div class="col-md-3" style="width:auto">
          <input type="text" name="detailsequ" class="form-control input-sm" id="detailsequ" style="padding-top:7px;font-size:19px;font-weight:bold"  placeholder="กรุณาระบุ"  disabled>
          </label>
        </div>
        <div class="col-md-3" style="width:auto">
          <label class="form-inline" >ชั้น
            <input type="text" name="level" class="form-control input-sm" style="padding-top:7px;font-size:19px;font-weight:bold" id="level" placeholder="กรุณาระบุชั้น"  disabled>
          </label>
        </div>
      </div>
      <!-- บรรทัด 6 -->
      <div class="row form-group">
        <div class="col-md-1"></div>
        <div class="col-md-3" style="position:relative">
        <label class="form-inline" >
        <input type="checkbox" name="repair" id="repair" value="ซ่อม" onclick="doCheck1(this,'2');">
        ซ่อมเปลี่ยนของเดิมที่ชำรุด
        </div>
        <div class="col-md-3" style="width:auto">
          <input type="text" name="detailsrepair" class="form-control input-sm" style="padding-top:7px;font-size:19px;font-weight:bold" id="detailsrepair" placeholder="กรุณาระบุ"   disabled>
          </label>
        </div>
      </div>
      <!-- บรรทัด 7 -->
      <div class="row form-group">
        <div class="col-md-1"></div>
        <div class="col-md-3" style="position:relative">
        <label class="form-inline" >
        <input type="checkbox" name="activity"  id="activity" value="ใช้ใน" onclick="doCheck1(this,'3');">
        ใข้ในงาน / กิจกรรม / โครงการย่อย
        </div>
        <div class="col-md-3" style="width:auto">
          <input type="text" name="detailsact" class="form-control input-sm" style="padding-top:7px;font-size:19px;font-weight:bold" id="detailsact"  disabled placeholder="กรุณาระบุ">
          </label>
        </div>
      </div>
     
      <!-- บรรทัด 8 -->
      <div class="row form-group">
        <div class="col-md-12">
          <label class="form-inline" >งบประมาณได้รับจากการจัดสรร
           <div class="input-group">
            <input type="text" name="originbudget" class="form-control input-sm" id="originbudget" placeholder="ระบุจำนวน" style="padding-top:7px;font-size:19px;font-weight:bold" placeholder="ระบุจำนวน"  onkeyup="this.value=Comma(this.value);" onkeypress="return isNumberKey(event);"  style="font-size:20px">
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
            <input type="text" name="roundnumber"  id="roundnumber" class="form-control input-sm" placeholder="ระบุจำนวน" style="padding-top:7px;font-size:19px;font-weight:bold" placeholder="ระบุจำนวน"  onkeyup="this.value=Comma(this.value);" onkeypress="return isNumberKey(event);"  style="font-size:20px">
            <span class="input-group-addon input-sm" style="font-size:20px;">ครั้ง</span></div>
            รวมเป็นเงิน
            <div class="input-group">
            <input type="text" name="summoneyattime"  id="summoneyattime" class="form-control input-sm" placeholder="ระบุจำนวน" style="padding-top:7px;font-size:19px;font-weight:bold" placeholder="ระบุจำนวน"  onkeyup="this.value=Comma(this.value);" onkeypress="return isNumberKey(event);"  style="font-size:20px">
            <span class="input-group-addon input-sm" style="font-size:20px;">บาท</span></div>
            คงเหลือ
            <div class="input-group">
            <input type="text" name="balancemoneyattime"  id="balancemoneyattime" class="form-control input-sm" placeholder="ระบุจำนวน" style="padding-top:7px;font-size:19px;font-weight:bold" placeholder="ระบุจำนวน"  onkeyup="this.value=Comma(this.value);" onkeypress="return isNumberKey(event);"  style="font-size:20px">
            <span class="input-group-addon input-sm" style="font-size:20px;">บาท</span></div>
          </label>
        </div>
      </div>
      <!-- บรรทัด 10-->
      <div class="row form-group">
      <div class="col-md-12">

      <input type="hidden" name="showInline"  id="showInline">
        <table class="table table-striped table-hover" id="tbExp" border="2"  style="border-radius:4px;border-color:rgba(0,0,0,0.6);text-shadow:1px 1px 1px rgba(0,0,0,0.3)"> <!-- เรียกใช้ตาราง -->
          <tr class="warning">
            <td   width="1%"><center>ลำดับ</center></td>
            <td  class="col-md-3"><center>รายการ</center></td>
            <td  class="col-md-1"><center>จำนวน</center></td>
            <td  class="col-md-1"><center>หน่วยนับ</center></td>
            <td  class="col-md-1"><center>ราคา/หน่วย</center></td>
            <td  class="col-md-2"><center>รวมเงิน</center></td>
            <td  class="col-md-1"><center>กำหนดวันที่ต้องการใช้</center></td>
          </tr>
        </table>  <!-- เสร็จส่วนหัวตาราง -->
        <input type="hidden" id="hdnMaxLine" value="0">
        <span  class="fa fa-plus btn btn-success" name="btnAdd" type="button" id="btnAdd" value="+" onClick="CreateNewRow();"></span>
       <span class="fa fa-minus btn btn-danger"  name="btnDel" type="button" id="btnDel" value="-" onClick="RemoveRow();"></span>
       
        </div>
        </div>
      <br>
      <div class="row form-group">
        <div class="col-md-1"></div>
        <div class="col-md-11" style="position:relative;">
          <label class="form-inline">
          รวม&nbsp;&nbsp;
          <div class="input-group">
            <input type="text-danger" name="sumalltime"  id="sumalltime" class="form-control input-sm" value=""   style="padding-top:7px;font-size:19px;font-weight:bold" placeholder="ระบุจำนวน"  onkeyup="this.value=Comma(this.value);" onkeypress="return isNumberKey(event);"  style="font-size:20px"/>
            <span class="input-group-addon input-sm" style="font-size:20px">บาท</span> </div>
          
          &nbsp;&nbsp; คงเหลือเงินไว้ซื้อครั้งต่อไป &nbsp;&nbsp;
          <div class="input-group">

              <input type="text-success" name="balancealltime"  id="balancealltime" class="form-control input-sm"  value=""  style="padding-top:7px;font-size:19px;font-weight:bold" placeholder="ระบุจำนวน"  onkeyup="this.value=Comma(this.value);" onkeypress="return isNumberKey(event);"  style="font-size:20px" />
              <span class="input-group-addon input-sm" style="font-size:20px;">บาท</span> 
            </label>
          </div>
        </div>
      </div>
      <!-- บรรทัด 11--> 
 	<center><button class="btn btn-info fa fa-check" type="submit">&nbsp;ยืนยัน</button></center>
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

