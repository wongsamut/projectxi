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
<form action="Test.php">

   
  

  

    <table border="1" style=" #0000 solid;border-collapse:collapse;" > <!-- เรียกใช้ตาราง -->
          <tr class="warning">
            <td style="text-align: center;">ลำดับ</td>
            <td style="text-align: center;">รายการ</td>
            <td style="text-align: center;">จำนวน</td>
            <td style="text-align: center;">หน่วยนับ</td>
            <td style="text-align: center;">ราคา/หน่วย</td>
            <td style="text-align: center;">รวมเงิน</td>
            <td style="text-align: center;">หมายเหตุ</td>
          </tr>

          <?php
          $i=0;
          @$id =$_GET["id"];
          @$passbudget1 =$_SESSION["Passbud"];
          $l=0;
          $query =mysqli_query($objConnect,"SELECT * FROM addrow inner join petition on addrow.Passbudget = petition.Passbudget where addrow.ID_DOC = $id ");
          $result_array = array();
          while($row = mysqli_fetch_array($query)) {
           $result_array[] = $row;
           $l++;
         
          
?> 
          <tr >

                <td style="text-align: center;"><?php echo "$l"; ?></td> 
                <td style="text-align: center;"><?php echo $row["Namelist"];?></td> <!--ชื่อฟิลของ DB -->  
                <td style="text-align: center;"><?php echo $row["Amount"];?></td> <!--ชื่อฟิลของ DB -->
                <td style="text-align: center;"><?php echo $row["Unit"];?></td> <!--ชื่อฟิลของ DB -->
                <td style="text-align: center;"><?php echo $row["Pricetounit"];?></td>
                <td style="text-align: center;"><?php echo $row["Summoney"];?></td>
                <td style="text-align: center;"></td>
            </tr>
            
        <?php  } ?>
          <tr >
                    <td align ="center" colspan="4"></td>
                    <td align ="center">รวม</td>
                    <td style="text-align: center;"></td>
                    <td align ="center" >บาท</td>
               </tr>
        </table>  <!-- เสร็จส่วนหัวตาราง -->
        <!--<button id="btntest"  > กดเลย</button> -->
       
        
</form>
<script src="assets/js/navbar_controller.js"></script> 

 
          

       

