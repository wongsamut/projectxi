<?php 
	 @session_start(); 
	 
?>
<!-------------nav------------------->

<header>
  <div class="navbar navbar-default navbar-fixed-top" role="navigation"> 
    <!-------------menu------------------->
    <div class="container-fluid" style="padding-right:32px"> <!-------------in-menu------------------>
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar_body"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand visible-xs" href="#">My Application</a> </div>
      <div id="navbar_body" class="collapse navbar-collapse">
        <!---------------------------------------------------Navbar ฝั่งซ้าย ---------------------------------------------->
        <ul class="nav navbar-nav navbar-left">
          <?php if(@$_SESSION['login'] == 1)
								{  ?>
          <li><a id="btnHome" href="#"><i class="fa fa-home fa-lg" style="color:gold"></i></a></li>
          <?php
								}
								?>
                               
          <?php
		/***********************************************กำหนดให้มีทุก Session ที่ไม่ใช่ Admin ***************************************************/
                            	if(@$_SESSION['login'] > 1)
								{
									
								
							?>
          <!----dropdown----->
          <li><a id="btnHome" href="#"><i class="fa fa-home fa-lg" style="color:gold"></i></a></li>
          <li class="dropdown navbar-left"> <!--เมนูชนิด Dropdown--> 
            <a id="btnInme" href="#" ><i class="fa fa-book fa-lg" style="color:GhostWhite"></i>&nbsp;&nbsp;คำร้อง</a> </li>
          <?php
							
								}
	 /******************************************************************************************************************************/					
								 ?>
      <!---------------------------------------------------End Navbar ฝั่งซ้าย ---------------------------------------------->
      <!---------------------------------------------------Navbar ฝั่งขวา ---------------------------------------------->
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php
	/***********************************************กำหนดให้เฉพาะ ยังไม่ได้ Login ***************************************************/
		  
                            	if(@$_SESSION['login'] == 0)
								{
							?>
          <li><a id="btnSignup" href="#">ลงทะเบียน</a></li>
          <li><a id="btnLogin" data-toggle="modal" data-target="#OkLogin" href="#">เข้าสู่ระบบ</a></li>
          <?php	
	/******************************************************************************************************************************/	  	
								}
	/***********************************************กำหนดให้เฉพาะ Session Admin ***************************************************/
								else if(@$_SESSION['login'] == 1)
								{
                            ?>
          <li><a id="btnConsider" href="#">พิจารณาคำร้องขอ</a></li>
          <li><a id="btnDelete" href="#">ลบผู้ใช้</a></li>
          <li><a id="btnUserSignup" href="#">ยืนยันผู้ใช้</a></li>
          <li><a  id="btnLogout" href="#" style="font-size:20px;padding-top:10px;"><i class="fa fa-sign-out fa-fw" style="color:red"></i>&nbsp;ออกจากระบบ</a></li>
        </ul>
        <?php
		/******************************************************************************************************************************/
		/*********************************************กำหนดให้เฉพาะ Session Personal (บุคลากร) ***************************************************/				
                        		}else if(@$_SESSION['login'] == 2){
							?>
        <li><a id="btnPetition" href="#"><i class="fa fa-file-text fa-lg" style="color:Azure"></i>&nbsp;&nbsp;ยื่นคำร้อง</a></li>
        <div class="btn-group open nav navbar-right dropdown-toggle"><a style="font-size:22px;border-radius:10px;padding-top:10px;" class="btn btn-info" href="#" data-toggle="dropdown"><i class="fa fa-user fa-lg" style="color:Beige  "></i> <font color="#FF0000">
          <?=$_SESSION['name']?>
          &nbsp;
          <?=$_SESSION['last']?>
          </font><b class="caret"></b></a> 
          <!----dropdown----->
          <ul class="dropdown-menu">
            <li><a  id="btnProfile" href="#" style="font-size:20px;padding-top:10px;"><i class="fa fa-pencil fa-fw" style="color:yellow"></i>&nbsp; แก้ไข Profile</a></li>
            <li><a  id="btnLogout" href="#" style="font-size:20px;padding-top:10px;"><i class="fa fa-sign-out fa-fw" style="color:red"></i>&nbsp;ออกจากระบบ</a></li>
          </ul>
        </div>
        <?php
                        		}
	/******************************************************************************************************************************/		
							?>
 	 <!---------------------------------------------------Navbar ฝั่งขวา ---------------------------------------------->
      </div>
    </div>
  </div>
</header>
