<?php 
	 @session_start(); 
	 include('databaseconfig.php');
		
$objConnect = mysqli_init();
// การปรับแต่ง options ต้องทำก่อนการเชื่อมต่อ
$objConnect->options(MYSQLI_OPT_CONNECT_TIMEOUT, 3600);
// เชื่อมต่อ
$objConnect->real_connect(DB_ENDPOINT_IP,DB_USERNAME,DB_PASSWORD,DB_NAME);
$objConnect->set_charset('utf8');
	 
?>
<!-------------nav------------------->

<header>
  <div class="navbar navbar-default navbar-fixed-top" role="navigation"> 
    <!-------------menu------------------->
    <div class="container-fluid"> <!-------------in-menu------------------>
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar_body"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand visible-xs" href="#">My Application</a> </div>
      <div id="navbar_body" class="collapse navbar-collapse"> 
      <span style="font-weight:bold">
        <!---------------------------------------------------Navbar ฝั่งซ้าย ---------------------------------------------->
        <ul class="nav navbar-nav navbar-left">
        
          <?php
      
                              if(@$_SESSION['login'] == 0)
                {
					
              ?>
          <div class="form inline">
            <li ><a id="btnHome" href="#"><img alt="Brand" src="img/h1.png " width="50"  height="50"></a><a style="cursor:context-menu;" ><font style="color: rgb(70, 119, 71);font-size: 23px;font-weight: bold;">&nbsp;ระบบจัดซื้อ - จัดจ้าง วิทยาลัยเกษตรและเทคโนโลยีพะเยา</font></a></li>
          </div>
          <?php 
          }
              else if(@$_SESSION['login'] == 1)
					
								{  ?>
          <div class="form" style="padding-top:2px" >
          <li><a id="btnHome" href="#"><img alt="Brand" src="img/h1.png " width="50"  height="50"></a><a style="cursor:context-menu;" >&nbsp;<font style="color: rgb(70, 119, 71);font-size: 23px;font-weight: bold;">Admin</font></a></li></div>
          <?php
                  }
				  else if(@$_SESSION['login'] == 3)
								{  ?>
          <div class="form" style="padding-top:2px" >
          <li><a id="btnHome" href="#"><img alt="Brand" src="img/h1.png " width="50"  height="50"></a><a style="cursor:context-menu;" >&nbsp;<font style="color: rgb(70, 119, 71);font-size: 23px;font-weight: bold;">
            <?=$_SESSION['position']?>
            </font></a>&nbsp;&nbsp;&nbsp;
            <a id="btnInme" href="#" ><i class="fa fa-book fa-lg" style="color: rgb(68, 173, 66);"></i>&nbsp;&nbsp;คำร้อง</a> </li></div>
          <?php
                  }
				  else if(@$_SESSION['login'] == 4)
								{  ?>
          <div class="form" style="padding-top:2px" >
          <li><a id="btnHome" href="#"><img alt="Brand" src="img/h1.png " width="50"  height="50"></a><a style="cursor:context-menu;" >&nbsp;<font style="color: rgb(70, 119, 71);font-size: 23px;font-weight: bold;">
            <?=$_SESSION['position']?>
            </font></a>&nbsp;&nbsp;&nbsp;
            <a id="btnInme" href="#" ><i class="fa fa-book fa-lg" style="color: rgb(68, 173, 66);"></i>&nbsp;&nbsp;คำร้อง</a> </li></div>
          <?php
                  }
				  else if(@$_SESSION['login'] == 5)
								{  ?>
          <div class="form" style="padding-top:2px" >
          <li><a id="btnHome" href="#"><img alt="Brand" src="img/h1.png " width="50"  height="50"></a><a style="cursor:context-menu;" >&nbsp;<font style="color: rgb(70, 119, 71);font-size: 23px;font-weight: bold;">
            <?=$_SESSION['position']?>
            </font></a>&nbsp;&nbsp;&nbsp;
            <a id="btnInme" href="#" ><i class="fa fa-book fa-lg" style="color: rgb(68, 173, 66);"></i>&nbsp;&nbsp;คำร้อง</a> </li></div>
          <?php
                  }
				  
		/***********************************************กำหนดให้มีทุก Session ที่ไม่ใช่ Admin ***************************************************/
                            else if(@$_SESSION['login'] == 2)
								{	
							?>
          <!--dropdown-->
          <div class="form" style="padding-top:2px" >
          <li><a id="btnHome" href="#" style="cursor:context-menu;"><img alt="Brand" src="img/h1.png " width="50"  height="50">&nbsp;<font style="color: rgb(70, 119, 71);font-size: 23px;font-weight: bold;">
            <?=$_SESSION['position']?></font></a>&nbsp;&nbsp;&nbsp;
            <a id="btnInme" href="#"><i class="fa fa-book fa-lg" style="color: rgb(68, 173, 66);"></i>&nbsp;&nbsp;คำร้อง</a> </li></div>
          <?php 
          /****************************************หน้า LOGIN = 3 Suppiles*********************************************/          
            }        
                  
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
          <li style="  font-size: 22px;" ><a id="btnSignup" href="#"><i class="fa fa-leanpub" style="color: rgb(68, 173, 66);"></i>&nbsp;&nbsp;ลงทะเบียน</a></li>
          <li style="  font-size: 22px;" ><a id="btnLogin" data-toggle="modal" data-target="#OkLogin" href="#"><i class="fa fa-sign-in" style="color:blue"></i>&nbsp;&nbsp;เข้าสู่ระบบ</a></li>
          <?php	
	/******************************************************************************************************************************/	  	
								}
	/***********************************************กำหนดให้เฉพาะ Session Admin ***************************************************/
								else if(@$_SESSION['login'] == 1)
								{
                            ?>
          <li><a id="btnUserSignup" href="#"><i class="fa fa-users " style="color: rgb(68, 173, 66);"></i>&nbsp&nbspจัดการผู้ใช้</a></li>  
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user-secret fa-lg" style="color:#00F;"></i> <font color="#FF0000" style="font-weight:bold">&nbsp;
          Admin
          </font><b class="caret"></b></a> 
          <!--dropdown-->
          <ul class="dropdown-menu" >
          <!--  <li><a  id="btnProfile" href="#" style="font-size:20px;padding-top:10px;"><i class="fa fa-pencil fa-fw" style="color: rgb(116, 116, 61);"></i>&nbsp; แก้ไข Profile</a></li> -->
            <li><a  id="btnLogout" href="#" style="font-size:20px;padding-top:10px;"><i class="fa fa-sign-out fa-fw" style="color:red"></i>&nbsp;ออกจากระบบ</a></li>
          </ul></li>
        <?php
/******************************************************************************************************************************/

/*********************************************กำหนดให้เฉพาะ Session Personal (บุคลากร) *********************************/				
                        		}else if(@$_SESSION['login'] == 2){
							?>
        <li><a id="btnPetition" href="#"><i class="fa fa-file-text fa-lg" style="color: rgb(68, 173, 66);"></i>&nbsp;&nbsp;ยื่นคำร้อง</a></li>
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user fa-lg" style="color:#00F;"></i> <font color="#FF0000" style="font-weight:bold">&nbsp;
          <?=$_SESSION['name']?>  &nbsp; <?=$_SESSION['last']?>
          </font><b class="caret"></b></a> 
          <!--dropdown-->
          <ul class="dropdown-menu" >
            <li><a  id="btnProfile" href="#" style="font-size:20px;padding-top:10px;"><i class="fa fa-pencil fa-fw" style="color: rgb(116, 116, 61);"></i>&nbsp; แก้ไข Profile</a></li>
            <li><a  id="btnLogout" href="#" style="font-size:20px;padding-top:10px;"><i class="fa fa-sign-out fa-fw" style="color:red"></i>&nbsp;ออกจากระบบ</a></li>
          </ul></li>
        
        <?php
        /*********************************************SUPPPPPPPPPPPPPPPP*********************************************************************************/   
            }else if(@$_SESSION['login'] == 3)   {
					
     				 $query = "SELECT COUNT(Status_Supp) FROM DOCME Where Status_Plan = 'yes' and Status_Supp = 'No' or Status_Supp = 'Wait' ";
					 $objQuery = mysqli_query($objConnect,$query);
     				 $objResult = mysqli_fetch_row($objQuery);
              ?>
        <li><a id="btnSup" href="#"><i class="fa fa-clipboard fa-lg" style="color: rgb(68, 173, 66);"></i>&nbsp&nbspพิจารณาคำร้อง&nbsp;<span class="badge" style="width:50"><?php echo $objResult[0]; ?></span></a></li>
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user fa-lg" style="color:#00F;"></i> <font color="#FF0000" style="font-weight:bold">&nbsp;
          <?=$_SESSION['name']?>  &nbsp; <?=$_SESSION['last']?>
          </font><b class="caret"></b></a> 
          <!--dropdown-->
          <ul class="dropdown-menu" >
            <li><a  id="btnProfile" href="#" style="font-size:20px;padding-top:10px;"><i class="fa fa-pencil fa-fw" style="color: rgb(116, 116, 61);"></i>&nbsp; แก้ไข Profile</a></li>
            <li><a  id="btnLogout" href="#" style="font-size:20px;padding-top:10px;"><i class="fa fa-sign-out fa-fw" style="color:red"></i>&nbsp;ออกจากระบบ</a></li>
          </ul></li>
        <?php
         /******************************************PLANNNNNNNNNNNN************************************************************************************/    
	             }else if(@$_SESSION['login'] == 4) {
					
     				 $query = "SELECT COUNT(Status_Plan) FROM DOCME where Status_Plan = 'Wait' or Status_Plan = 'No'";
					 $objQuery = mysqli_query($objConnect,$query);
     				 $objResult = mysqli_fetch_row($objQuery);
							?>
        <li><a id="btnPlan" href="#"><i class="fa fa-clipboard fa-lg" style="color: rgb(68, 173, 66);"></i>&nbsp&nbspพิจารณาคำร้อง&nbsp;<span class="badge"><?php echo $objResult[0]; ?></span></a></li>
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user fa-lg" style="color:#00F;"></i> <font color="#FF0000" style="font-weight:bold">&nbsp;
          <?=$_SESSION['name']?>  &nbsp; <?=$_SESSION['last']?>
          </font><b class="caret"></b></a> 
          <!--dropdown-->
          <ul class="dropdown-menu" >
            <li><a  id="btnProfile" href="#" style="font-size:20px;padding-top:10px;"><i class="fa fa-pencil fa-fw" style="color: rgb(116, 116, 61);"></i>&nbsp; แก้ไข Profile</a></li>
            <li><a  id="btnLogout" href="#" style="font-size:20px;padding-top:10px;"><i class="fa fa-sign-out fa-fw" style="color:red"></i>&nbsp;ออกจากระบบ</a></li>
          </ul></li>
        <?php
              /****************************************MONNEYYYYYYYYYYYYYYYYYYYYYYYYYY**************************************************************************************/
              }else if(@$_SESSION['login'] == 5) {
				  
     				 $query = "SELECT COUNT(Status_Fin) FROM DOCME where Status_Plan = 'Yes' and Status_Supp='Yes' and Status_Fin='No'";
					 $objQuery = mysqli_query($objConnect,$query);
     				 $objResult = mysqli_fetch_row($objQuery);
              ?>
        <li><a id="btnFin" href="#"><i class="fa fa-clipboard fa-lg" style="color: rgb(68, 173, 66);"></i>&nbsp&nbspพิจารณาคำร้อง&nbsp;<span class="badge"><?php echo $objResult[0]; ?></span></a></li>
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user fa-lg" style="color:#00F;"></i> <font color="#FF0000" style="font-weight:bold">&nbsp;
          <?=$_SESSION['name']?>  &nbsp; <?=$_SESSION['last']?>
          </font><b class="caret"></b></a> 
          <!--dropdown-->
          <ul class="dropdown-menu" >
            <li><a  id="btnProfile" href="#" style="font-size:20px;padding-top:10px;"><i class="fa fa-pencil fa-fw" style="color: rgb(116, 116, 61);"></i>&nbsp; แก้ไข Profile</a></li>
            <li><a  id="btnLogout" href="#" style="font-size:20px;padding-top:10px;"><i class="fa fa-sign-out fa-fw" style="color:red"></i>&nbsp;ออกจากระบบ</a></li>
          </ul></li>
        <?php
          }
          ?>
        
        <!---------------------------------------------------Navbar ฝั่งขวา ----------------------------------------------> 
        </span>
      </div>
    </div>
  </div>
</header>


