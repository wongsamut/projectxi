
 <!------------------------------------------------------------OKEdit------------------------------------------------------->
<div class="modal fade" id="OkLogin" >
  <div class="modal-dialog" style="background-color:">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true" hidden="true"></span></button>
      <div class="panel panel-primary">
        <div class="panel-heading" style="text-align:center">
          <h4 style="font-size:30px;font-weight:bold;cursor:context-menu;color:#FFF"><i class="fa fa-circle-o-notch fa-lg fa-spin" style="float:left"></i>ล็อกอิน</h4>
        </div>
      </div>
      <div class="modal-body" >
      <div id="pnlAlertLOG" class="col-md-offset-2 col-md-8"></div>
      <form action="#">
        <div class="form-group row">
          <div class="col-md-offset-3 col-md-2">
            <label><font size="+2" style="font-weight:bold">ชื่อผู้ใช้</font></label>
          </div>
          <div class="col-md-4">
          <div class="input-group margin-bottom-sm"> <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
            <input class="form-control" id="txtUsername" type="text" placeholder="Username" style="width:auto;font-weight:bold;font-size:20px">
          </div>
        </div></div>
        <div class="form-group row">
          <div class="col-md-offset-3 col-md-2">
            <label><font size="+2" style="font-weight:bold">รหัสผ่าน</font></label>
          </div>
          <div class="col-md-4">
          <div class="input-group"> <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
            <input class="form-control" id="txtPassword" type="password" placeholder="Password" style="width:auto;font-size:20px;font-weight:bold">
          </div>
        </div></div>
      </form>
      
      <div class="col-md-offset-7 col-md-5">
      <input type="checkbox" id="repass" name="repass" onclick="doCheck2(this,'1');"  style="font-size:20px;font-weight:bold">
      <label><font style="font-weight:bold">ลืมรหัสผ่าน</font></label>&nbsp;
      <input type="checkbox" id="Deu" name="Deu" value="de" onclick="doCheck2(this,'2');" style="font-size:20px;font-weight:bold">
      <label><font style="font-weight:bold">ขอลบผู้ใช้</font></label></label>
      </div><br>
      <div id="repass"></div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal" style="font-size:20px;padding-top:15px;font-weight:bold:"><i class="fa fa-times fa-lg"></i>&nbsp;&nbsp;Cancel</button>
      <button type="submit" id="btnLogin1" class="btn btn-success btn-lg" style="font-size:20px;padding-top:15px;font-weight:bold:"><i class="fa fa-sign-in fa-lg"></i>&nbsp;&nbsp;Login</button>
    </div>
  </div>
</div>
</div>
<!-------------------------------------------------------End OKEdit------------------------------------------------------->

<script src="assets/js/login_controller.js"></script>
    
 <script>
 function doCheck2(which,id) {
if(id=='1') {
  if(which.checked==true) {
	  
    $.get("assets/include/html/repass.php",
	function(data)
	{
		$('div#repass').html(data);
	});
	
  } else 
  {
	  $.get("assets/include/html/Empty.php",
		function(data)
	{
		$('div#repass').html(data);
	});
   	
  }
}
if(id=='2') {if(which.checked==true) 
{
    $.get("assets/include/html/Deu.php",
	function(data)
	{
		$('div#repass').html(data);
	});
  } else 
  {
	  $.get("assets/include/html/Empty.php",
		function(data)
	{
		$('div#repass').html(data);
	});
    
  }
}
 }
 </script>