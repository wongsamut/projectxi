<?php
	session_start();

	$objConnect = mysqli_init();
	// การปรับแต่ง options ต้องทำก่อนการเชื่อมต่อ
	$objConnect->options(MYSQLI_OPT_CONNECT_TIMEOUT, 3600);
	// เชื่อมต่อ
	$objConnect->real_connect('localhost','root','root','purchase');
	$objConnect->set_charset('utf8');
	//*** Update Last Stay in Login System
	$sql = $objConnect->query("UPDATE user_status SET LastUpdate = NOW() WHERE UserID = '".$_SESSION["UserID"]."' ");




?>
<div class="container">
<div class="panel panel-warning">
  <div class="panel-heading" role="tab" id="headingTwo">
    <h3 class="panel-title"> <a class="collapsed" data-toggle="collapse" href="#Document2" aria-expanded="false" aria-controls="collapseTwo" style="font-size:22px;padding-top:10px;font-weight:bold;"><i class="fa fa-plus-square fa-lg" style="padding-top:5px"></i>&nbsp;&nbsp;คำร้องของตนเอง</a></h3>
  </div>
  <div id="Document2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
    <div class="panel-body">
      <div class="container">
        <div class="row"></div>
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <table class="table table-hover" bordercolor="#FFFFFF" bgcolor="#000000" >
              <thead >
              <th > <center>
                    ฉบับที่
                  </center></th>
                <th> <center>
                    เอกสารที่เคยยื่นคำร้อง
                  </center></th>
                <th> <center>
                    pdf
                  </center></th>
                  </thead>
              <tbody bgcolor="#000000" >
              <td><center>
                    1
                  </center></td>
                <td><center>
                    2
                  </center></td>
                <td><center>
                    3
                  </center></td>
                  </tbody>
            </table>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!------------------------------------------------- END 1 ----------------------------------------------------------------->
<div class="panel panel-info">
  <div class="panel-heading" role="tabpanel" id="headingOne" onClick="#Document1">
    <h3 class="panel-title"><a class="collapsed" rel="nofollow" href="#Document1" data-toggle="collapse" aria-expanded="false" aria-controls="collapseOne" style="font-size:22px;padding-top:10px;font-weight:bold;"><i class="fa fa-plus-square fa-lg" style="padding-top:5px"></i>&nbsp;&nbsp;คำร้องของอื่นๆ</a></h3>
  </div>
  <div id="Document1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
    <div class="panel-body">
      <div class="container"> 
        <!-----------เริ่ม----------------------------------------------management----------------------------------------------->
        <form>
          <div class="form-group">
            <div class="dropdown">
              <div class="col-md-offset-1 col-md-2">
                <select class="form-control" id="select" style="font-size:18px;font-weight:bold;padding-top:5px">
                  <option id="txtMo">เลขงบประมาณ</option>
                  <option id="txtLa">นามสกุลผู้ยื่นคำร้อง</option>
                  <option id="txtDa">วันที่ยื่นคำร้อง</option>
                </select>
              </div>
            </div>
            <div class="col-md-5">
              <input id="txtdate" class="form-control" type="text" />
            </div>
            <div class="col-md-4">
              <button id="btnSearchdate" class="btn btn-success btn-lg" type="" style="font-size:22px;;padding-top:15px;font-weight:bold;"><i class="fa fa-search fa-lg"></i>&nbsp;&nbsp;ค้นหา</button>
            </div>
          </div>
          <div class="form form-group row">
            <div class="col-md-offset-3 col-md-5"> </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
