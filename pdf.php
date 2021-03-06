<?php
require_once('mpdf/mpdf.php'); //ที่อยู่ของไฟล์ mpdf.php ในเครื่องเรานะครับ
@session_start();

	include('assets/include/functions/database_config.php');
	$objConnect = mysqli_init();
// การปรับแต่ง options ต้องทำก่อนการเชื่อมต่อ
	$objConnect->options(MYSQLI_OPT_CONNECT_TIMEOUT, 3600);
// เชื่อมต่อ
	$objConnect->real_connect(DB_ENDPOINT_IP,DB_USERNAME,DB_PASSWORD,DB_NAME);
	$objConnect->set_charset('utf8');
	
	$objQuery = mysqli_query($objConnect, "select * from docme WHERE Doc_Budget = '58000' ") or die(mysqli_error($objConnect));
	$objResult = mysqli_fetch_array($objQuery);

ob_start(); // ทำการเก็บค่า html นะครับ
?>
<html>
<head></head>
    <body>

<div class="container-fluid">
    <div class="row" align="center">
        <h3 align="center">ใบประมาณการจัดซื้อ – จัดจ้าง</h3>
    </div>
    <div class="row" align="center">
        <h3 align="center">วิทยาลัยเกษตรและเทคโนโลยีพะเยา</h3>
    </div>
        <h5 align="right"> เลขที่รับของพัสดุกลาง</h5>
        <h5 align="right">รับเลขที่ <?php echo $objResult["Doc_Budget"];?></h5>
        <h5 align="right">วันที่ <?php echo $objResult["Date"];?> </h5>
        <h5>ที่ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;วันที่ </h5>
        <h5>เรียน.............................</h5>
        <h5>ด้วยข้าพเจ้า <?php echo $objResult["Name"];?> ตำแหน่ง  </h5>
        <h5>(   )แผนกวิชา&nbsp;(   )งาน&nbsp;(   )โครงการ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ฝ่าย</h5>
        <h5>มีความประสงค์จะขอซื้อวัสดุ/จ้างทำของเพื่อใช้ในราชการของวิทยาลัยฯ ดังนี้</h5>
        <h5>(   ) วัสดุฝึก / อุปกรณ์การสอน ในรายวิชา&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชั้น</h5>
        <h5>(   ) ซ่อมเปลี่ยนของเดิมที่ชำรุด (ระบุ)......................................</h5>
        <h5>(   ) ใช้ในงาน /  กิจกรรม / โครงการย่อย (ระบุ).................................</h5>
        <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ได้รับจัดสรรงบประมาณเป็นเงิน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;บาท</h5>
        <h5>ซื้อไปแล้วจำนวน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ครั้ง&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เป็นเงิน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;คงเหลือ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;บาท</h5>
        <table bordercolor="#424242" width="1141" height="78" border="1"  align="center"  cellspacing="0">
               <tr>
                    <TH>ที่</TH>
                    <TH>รายการ</TH>
                    <TH>จำนวน(หน่วย)</TH>
                    <TH>ราคาต่อหน่วย(บาท</TH>
                    <TH>รวมเป็นเงิน(บาท)</TH>
                    <TH>กำหนดวันที่ใช้และ ระยะเวลาที่ใช้</TH>
               </tr> 
               <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
               </tr>
        </table>

        <h5>.....................................................................................................</h5>
        <h5>รวม&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รายการ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เป็นเงิน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;บาท&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;คงเหลือไว้ซื้อ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;บาท</h5>
        <h5>(1) จึงเรียนมาเพื่อโปรพิจารณาอนุมัติ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(2) ความเห็น.................................................................</h5>
        <h5> ลงขื่อ...................................................ผู้รับผิดชอบ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงชื่อ................................................................</h5>
        <h5> (นาย............................................ )&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( ….........................................................)</h5>
        <h5>…........./............................./............                  …........./............................./....................</h5>
        <h5>หัวหน้า (   ) แผนกวิชา (   ) งาน (   ) โครงการ................................................................................</h5>
        <h5>(3) คณะกรรมการจัดซื้อ       (4) คณะกรรมการตรวจรับพัสดุ / ตรวจการจ้าง         (5) ควาเห็น...................................................</h5>
        <h5>ลงชื่อ.........................ประธานกรรมการ    ลงชื่อ.......................ประธานกรรมการ      ลงชื่อ....................................................</h5>
        <h5>ลงชื่อ.........................กรรมการ  ลงชื่อ........................กรรมการ             (                                                  )</h5>
        <h5>ลงชื่อ.........................กรรมการ  ลงชื่อ........................กรรมการ   เจ้าหน้าที่พัสดุ............./...................../..............</h5>
        <h5>(6) ยอดคงเหลือ          บาท (7) ความเห็น............................................................................................</h5>
        <h5>(ลงชื่อ)..........................................................      ลงชื่อ.................................................................</h5>
        <h5>( นายอภิชาติ  ชนประชา )              ( นายอภิชาติ  ชนประชา )</h5>
        <h5>หัวหน้างานวางแผนงบประมาณ            ทำหน้าที่ รอง ผอ. ฝ่ายแผนกงานและความร่วมมือ</h5>
        <h5>…........./............................./....................              …........./............................./....................</h5>
        <h5>(8) ความเห็น.............................................................   (9)ความเห็น.......................................................................</h5>


</div>


</body>
</html>


<?php
$html = ob_get_contents();        //เก็บค่า html ไว้ใน $html
$pdf = new mPDF( 'th', 'A4',  0 ,  '');   //การตั้งค่ากระดาษถ้าต้องการแนวตั้ง ก็ A4 เฉยๆครับ ถ้าต้องการแนวนอนเท่ากับ A4-L
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html);
$pdf->Output("upload/MyPDF/MyPDF.pdf"); 

?>
ดาวโหลดรายงานในรูปแบบ PDF <a href="mypdf/MyPDF.pdf">คลิกที่นี้</a>