<?php  
@session_start();  
header("Content-type:text/html; charset=UTF-8");                  
header("Cache-Control: no-store, no-cache, must-revalidate");                 
header("Cache-Control: post-check=0, pre-check=0", false);      
include("db_con.php");  
 $objConnect = mysqli_init();
    // การปรับแต่ง options ต้องทำก่อนการเชื่อมต่อ
    $objConnect->options(MYSQLI_OPT_CONNECT_TIMEOUT, 3600);
    // เชื่อมต่อ
   $objConnect->real_connect(DB_ENDPOINT_IP,DB_USERNAME,DB_PASSWORD,DB_NAME);
    $objConnect->set_charset('utf8');
    //*** Update Last Stay in Login System
    
     
     
?>  


   
  

  

    <table border="1" style=" #0000 solid;border-collapse:collapse;" > <!-- เรียกใช้ตาราง -->
          <tr class="warning">
            <td style="text-align: center;">งบประมาณที่ได้รับ</td>
            <td style="text-align: center;"></td>
           </tr>
            <tr class="warning">
            <td style="text-align: center;">เบิกจ่ายเงินครั้งนี้</td>
            <td style="text-align: center;"></td>
           </tr>
            <tr class="warning">
            <td style="text-align: center;">เบิกจ่ายแล้ว</td>
            <td style="text-align: center;"></td>
           </tr>
            <tr class="warning">
            <td style="text-align: center;">คงเหลือเงินอีก</td>
            <td style="text-align: center;"></td>
           </tr>
            <tr class="warning">
            <td style="text-align: center;">คงเหลือเงินอีกต่อไป</td>
            <td style="text-align: center;"></td>
           </tr>

        </table>  <!-- เสร็จส่วนหัวตาราง -->
        <!--<button id="btntest"  > กดเลย</button> -->
       
      

<script src="assets/js/navbar_controller.js"></script> 

 
          

       

