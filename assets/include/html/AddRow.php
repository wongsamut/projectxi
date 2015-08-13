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
		newCell.innerHTML = "<center><INPUT TYPE=\"TEXT\" CLASS=\"form-control input-sm\" NAME=\"txtName"+intLine+"\" ID=\"txtName"+intLine+"\"  VALUE=\"\"></center>";
		
		//*** Column 3 ***//
		newCell = newRow.insertCell(2);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "css-name");
		newCell.innerHTML = "<INPUT TYPE=\"TEXT\" CLASS=\"form-control input-sm\" NAME=\"txtNum"+intLine+"\"  ID=\"txtNum"+intLine+"\" VALUE=\"\">";
		
		//*** Column 4 ***//
		newCell = newRow.insertCell(3);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "css-name");
		newCell.innerHTML = "<center><INPUT TYPE=\"TEXT\" CLASS=\"form-control input-sm\" NAME=\"txtUnit"+intLine+"\"  ID=\"txtUnit"+intLine+"\" VALUE=\"\"></center>";
		
		//*** Column 5 ***//
		newCell = newRow.insertCell(4);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "css-name");
		newCell.innerHTML = "<center><INPUT TYPE=\"TEXT\" CLASS=\"form-control input-sm\" NAME=\"txtPrice"+intLine+"\"  ID=\"txtPrice"+intLine+"\" VALUE=\"\"></center>";
		
		//*** Column 6 ***//
		newCell = newRow.insertCell(5);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "css-name");
		newCell.innerHTML = "<center><DIV CLASS=\"input-group\"><INPUT TYPE=\"TEXT\" CLASS=\"form-control input-sm\" NAME=\"txtTotal"+intLine+"\"  ID=\"txtTotal"+intLine+"\" VALUE=\"\" style=\"width:76%\" readonly><SPAN CLASS=\"input-group-addon input-sm\" style=\"font-size:20px;width:auto;float:left\">บาท</span></DIV></center>";
		
		//*** Column 6 ***//
		newCell = newRow.insertCell(6);
		newCell.id = newCell.uniqueID;
		newCell.setAttribute("className", "css-name");
		newCell.innerHTML = "<center><INPUT TYPE=\"DATE\" CLASS=\"form-control input-sm\" NAME=\"txtdate"+intLine+"\"  ID=\"txtdate"+intLine+"\" VALUE=\"\"></center>";
		

		
		
		document.frmMain.hdnMaxLine.value = intLine;
		
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
				
		}	
	}	
	
</script>


<!--
<form name="frmMain" method="" action="phpMySQLAddSave.php">
<table width="auto" border="1" id="tbExp">
  <tr>
    <td><div align="center">ลำดับ</div></td>
    <td><div align="center">รายการ</div></td>
    <td><div align="center">จำนวน </div></td>
    <td><div align="center">หน่วยนับ </div></td>
    <td><div align="center">ราคา/หน่วย</div></td>
   	<td><div align="center">รวมเงิน </div></td>
    <td><div align="center">กำหนดวันที่ต้อกงารใช้และระยะเวลาที่ใช้</div></td> 
  </tr>
</table>
<input type="hidden" name="hdnMaxLine" value="0">
<input name="btnAdd" type="button" id="btnAdd" value="+" onClick="CreateNewRow();">
<input name="btnDel" type="button" id="btnDel" value="-" onClick="RemoveRow();">
<input type="submit" name="submit" value="submit">
</form>
--> 
<form  class="form-horizontal" name="frmMain" OnSubmit="return CheckValidate();">
        <table class="table table-striped table-hover" id="tbExp" border="1"  style="border-radius:4px;border-color:rgba(0,0,0,0.6);text-shadow:1px 1px 1px rgba(0,0,0,0.3)"> <!-- เรียกใช้ตาราง -->
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
        <input type="hidden" name="hdnMaxLine" value="0">
        <span  class="fa fa-plus btn btn-success" name="btnAdd" type="button" id="btnAdd" value="+" onClick="CreateNewRow();"></span>
		<span class="fa fa-minus btn btn-danger"  name="btnDel" type="button" id="btnDel" value="-" onClick="RemoveRow();"></span>
       <button class="btn btn-info fa fa-check" type="submit" name="submit"></button>
</form>


