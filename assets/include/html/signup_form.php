<div class="container">
  <div class="panel panel-success">
    <div class="panel-heading" style="text-align:center; font-size:22px; font-weight:bold;" >สมัครสมาชิก</div>
    <div class="panel-body">
    	<div id="pnlAlert" class="col-md-offset-4 col-md-4"></div>
        
      <form class="form-horizontal" method="post" name="frm">
<legend>
</legend>
          <!--User & Pa-->
          <div class="form-group form-inline">
            <label for="txtUsername" class="col-lg-2 control-label">ชื่อผู้ใช้งาน<span style="font-weight:bold"><font color="#FF0000">**</font></span></label>
            <div class="col-md-3">
              <input type="text" class="form-control" id="txtUsername" name="txtUsername" placeholder="กรุณาระบุชื่อผู้ใช้" style="width:90%;font-size:20px;font-weight:bold" required>
            </div>
            <label for="txtPassword" class="col-md-1 control-label">พาสเวิร์ด<span style="font-weight:bold"><font color="#FF0000">**</font></span></label>
            <div class="col-lg-3">
              <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="กรุณาระบุพาสเวิร์ด" style="width:90%;font-size:20px;font-weight:bold" required>
            </div>
          </div>
          <br>
          <legend></legend>
          <!--User & Pass--> 
          <!--First & Last name &Photo-->
          <div class="form-group">
            <label for="Ofname" class="col-lg-2 control-label">คำนำหน้าชื่อ</label>
            <div class="col-lg-2">
              <select class="form-control" name="Ofname" id="Ofname" style="width:70%;font-size:20px;font-weight:bold;padding-top:5px">
                <option value="นาย">นาย</option>
                <option value="นางสาว">นางสาว</option>
                <option value="นาง">นาง</option>
              </select>
            </div>
            <label for="txtFirstName" class="col-lg-1 control-label">ชื่อ<span style="font-weight:bold"><font color="#FF0000">**</font></span></label>
            <div class="col-lg-2">
              <input class="form-control" id="txtFirstName" name="txtFirstName" required style="width:95%;font-size:20px;font-weight:bold;" placeholder="กรุณาระบุชื่อจริง">
            </div>
            <label for="txtLastname" class="col-lg-1 control-label">นามสกุล<span style="font-weight:bold"><font color="#FF0000">**</font></span></label>
            <div class="col-lg-2">
              <input class="form-control" id="txtLastName" name="txtLastName" required style="width:95%;font-size:20px;font-weight:bold;" placeholder="กรุณาระบุนามสกุล">
            </div>
            </div>
          <!--First & Last name--> 
          <!--Gender-->
          <div class="form-group ">
            
              <label for="txtsex" class="col-lg-2 control-label" style="width:13.5%;">เพศ</label>
              <label class=" col-lg-2 control-label" style="width:14%;padding-top: 0px;">
              <label class="radio-inline" >
                <input type="radio"  name="Radio_Sign" value="ชาย" checked>
                ชาย </label>
              <label class="radio-inline">
                <input type="radio" name="Radio_Sign" value="หญิง">
                หญิง</label>
              </label>
            
          <!--Gender--> 
          <!--Position-->
            <label for="txtPosition" class="col-lg-2 control-label">ตำแหน่ง</label>
            <div class="col-lg-6">
              <select class="form-control" id="txtPosition" name="txtPosition" style="width:70%;font-size:20px;font-weight:bold;padding-top:5px">
                <option value="Personal">บุคลากรทั่วไป</option>
                <option value="Finance">การเงิน</option>
                <option value="Pattern">แบบแผน</option>
                <option value="Supplies">พัสดุ</option>
              </select>
              <span class="help-block">
              <p class="text-danger">ไม่สามารถแก้ไขได้ในหน้า Profile หากต้องการแก้ไขต้องแจ้งไปยัง Admin เท่านั้น</p>
              </span> </div>
          </div>
          <!--Position--> 
          <!--IDCard-->
          <div class="form-group">
            <label for="txtCard_ID" class="col-lg-2 control-label">รหัสบัตรประชาชน<span style="font-weight:bold"><font color="#FF0000">**</font></span></label>
            <div class="col-lg-2">
              <input class="form-control" placeholder="กรุณาระบุรหัสบัตร" type="text" id="txtCard_ID" name="txtCard_ID" maxlength="17" style="width:95%;font-size:20px;font-weight:bold;padding-top:5px" onkeyup="autoTab2(this,1)" onkeypress="return isNumberKey(event)"/>
            </div>
           
          <!--IDCard--> 
          <!--Tel-->
            <label for="txtTel" class="col-lg-1 control-label">เบอร์โทร<span style="font-weight:bold"><font color="#FF0000">**</font></span></label>
            <div class="col-lg-2">
              <input class="form-control" placeholder="กรุณาระบุเบอร์โทร" type="tel" name="txtTel" id="txtTel" maxlength="12" style="width:95%;font-size:20px;font-weight:bold;padding-top:5px" onkeyup="autoTab2(this,2)" onkeypress="return isNumberKey(event)"/>
            </div>
          <!--Tel--> 
          <!--Email-->
            <label for="txtEmail" class="col-lg-1 control-label">Email<span style="font-weight:bold"><font color="#FF0000">**</font></span></label>
            <div class="col-lg-2">
              <input class="form-control" placeholder="กรุณาระบุอีเมล์" type="email" name="txtEmail" id="txtEmail"  style="width:95%;font-size:20px;font-weight:bold;padding-top:5px">
            </div>
          </div>
          <!--Email--> 
          <!--ที่อยู่-->
          <div class="form-group">
            <label for="txtHome_num" class="col-lg-2 control-label">บ้านเลขที่</label>
            <div class="col-lg-2">
              <input class="form-control" placeholder="กรุณาระบุเลขที่" type="text" name="txtHome_num" id="txtHome_num" style="width:95%;font-size:20px;font-weight:bold;padding-top:5px" onkeypress="return isNumberKey(event)">
            </div>
          
            <label for="txtMoo" class="col-lg-1 control-label">หมู่</label>
            <div class="col-lg-2">
              <input class="form-control" placeholder="กรุณาระบุหมู่" type="text" name="txtMoo" id="txtMoo" maxlength="2" style="width:95%;font-size:20px;font-weight:bold;padding-top:5px" onkeypress="return isNumberKey(event)">
            </div>
          
          <label for="txtRoad" class="col-lg-1 control-label">ถนน</label>
            <div class="col-lg-2">
              <input class="form-control" placeholder="กรุณาระบุถนน" type="text" name="txtRoad" id="txtRoad" style="width:95%;font-size:20px;font-weight:bold;padding-top:5px">
            </div>
          </div>
          
          <div class="form-group">
            <label for="province" class="col-lg-2 control-label">จังหวัด</label>
            <div class="col-lg-10" > <span id="province">
              <select name="province" id="province" class="form-control" style="width:35%;font-size:20px;font-weight:bold;padding-top:5px" >
                <option value="0">- เลือกจังหวัด -</option>
              </select>
              </span> </div>
            </div>
         <div class="form-group">
            <label for="amphur" class="col-lg-2 control-label">อำเภอ</label>
            <div class="col-lg-10"> <span id="amphur">
              <select name="amphur" id="amphur" class="form-control" style="width:35%;font-size:20px;font-weight:bold;padding-top:5px" >
                <option value='0'>- เลือกอำเภอ -</option>
              </select>
              </span> </div>
          </div>
          <div class="form-group">
            <label for="district" class="col-lg-2 control-label">ตำบล</label>
            <div class="col-lg-10"> <span id="district">
              <select name="district" id="district" class="form-control" style="width:35%;font-size:20px;font-weight:bold;padding-top:5px">
                <option value='0'>- เลือกตำบล -</option>
              </select>
              </span> </div>
          </div>
          <div class="form-group">
            <label for="amphur_postcode" class="col-lg-2 control-label">รหัสไปรษณีย์</label>
            <div class="col-lg-10"> <span id="amphur_postcode">
              <select name="amphur_postcode" id="amphur_postcode"  class="form-control" style="width:35%;font-size:20px;font-weight:bold;padding-top:5px">
                <option value='0'>- เลือกรหัสไปรษณีย์ -</option>
              </select>
              </span> </div>
          </div>
          <!--ที่อยู่-->
          <center>
          <input type="checkbox" name="chkagreement" onClick="apply()"> ยอมรับเงื่อนไข <a data-toggle="modal" data-target="#Details" href="#">**กรุณาอ่านก่อนลงทะเบียน**</a><br>
          </center>
          <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
            <button type="button" name="sub" class="btn btn-success btn-lg" onClick="submitClick()" disabled>ตกลง</button>
              <button type="reset" class="btn btn-danger btn-lg">ยกเลิก</button>
            </div>
          </div>
     
      </form>

    </div>
  </div>
<!-------------------------------------------------------End OKEdit------------------------------------------------------->
  <div class="modal fade" id="Details" >
  <div class="modal-dialog" style="background-color:">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true" hidden="true"></span></button>
      <div class="panel panel-info">
        <div class="panel-heading" style="text-align:center">
          <h2 style="font-size:30px">อ่านก่อนลงทะเบียน</h2>
        </div>
      </div>
      <div class="modal-body">
      <h2><font color="#FF0000"> กรุณากรอกข้อมูลให้ครบทุกช่อง หากกดยืนยันข้อมูลบางส่วนจะไม่สามารถแก้ไขได้ หากท่านคิดว่าข้อมูลถูกต้องแล้ว กรุณากดยอมรับเงื่อนไข</font></h2>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal" style="font-size:20px;padding-top:13px;font-weight:bold:"><i class="fa fa-times fa-lg"></i>&nbsp;&nbsp;Close</button>


    </div>
  </div>
</div>
</div>
<!-------------------------------------------------------End OKEdit------------------------------------------------------->
<script src="assets/js/signup_controller.js"></script>

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

<script language=javascript>
function apply()
{
  document.frm.sub.disabled=true;
  if(document.frm.chkagreement.checked==true)
  {
	if(document.frm.txtUsername.value =='' || document.frm.txtPassword.value =='' || document.frm.txtFirstName.value =='' || document.frm.txtLastName.value =='' || document.frm.txtCard_ID.value =='' || document.frm.txtTel.value =='' || document.frm.txtEmail.value =='')
	{
     swal({
		 title: "ขออภัย !",   
		 text: "กรุณาระบุที่มี ** ให้ครบ",   
		 type: "error",  
		 confirmButtonColor: "#c00020",		
				
		}); 
	}
	else {
		document.frm.sub.disabled=false;
	}
  }
  if(document.frm.chkagreement.checked==false)
  {
    document.frm.sub.enabled=false;
  }
}
</script> 

<script type="text/javascript">
function autoTab2(obj,typeCheck){
	/* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย
	หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น  รูปแบบเลขที่บัตรประชาชน
	4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
	รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____
	หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__
	ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
	*/
		if(typeCheck==1){
			var pattern=new String("_-____-_____-_-__"); // กำหนดรูปแบบในนี้
			var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้		
		}else{
			var pattern=new String("___-___-____"); // กำหนดรูปแบบในนี้
			var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้					
		}
		var returnText=new String("");
		var obj_l=obj.value.length;
		var obj_l2=obj_l-1;
		for(i=0;i<pattern.length;i++){			
			if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){
				returnText+=obj.value+pattern_ex;
				obj.value=returnText;
			}
		}
		if(obj_l>=pattern.length){
			obj.value=obj.value.substr(0,pattern.length);			
		}
}
</script>

<script language="Javascript">
        function Inint_AJAX() {
           try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
           try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
           try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
           alert("XMLHttpRequest not supported");
           return null;
        };

        function dochange(src, val) {
             var req = Inint_AJAX();
             req.onreadystatechange = function () { 
                  if (req.readyState==4) {
                       if (req.status==200) {
                            document.getElementById(src).innerHTML=req.responseText; //รับค่ากลับมา
                       } 
                  }
             };
             req.open("POST", "assets/include/html/localtion.php?data="+src+"&val="+val); //สร้าง connection
             req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
             req.send(null); //ส่งค่า
        }

        window.onLoad=dochange('province', -1);     
    </script>