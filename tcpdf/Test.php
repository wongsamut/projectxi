<?php

//============================================================+
// File name   : example_002.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 002 for TCPDF class
//               Removing Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+
@session_start();
/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Removing Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_import.php');
include("class/class_curl.php");
 
 $passbu = $_SESSION["Passbud"];
 $userr = $_SESSION["user"];
 $id = $_GET["id"];
 $names =$_SESSION["namePDF"]; 
 $denddate = $_SESSION["senddate"];
 $nameact = $_SESSION["nameact"];
 $party = $_SESSION["party"];
 $buyor = $_SESSION["buyorhire"];
 $equipp = $_SESSION["equipment"];
 $detail = $_SESSION["detailsequ"];
 $levelll = $_SESSION["level"];
 $rapaii = $_SESSION["repair"];
 $detailss = $_SESSION["detailsrepair"];
 $activii = $_SESSION["activity"];
 $detailacc = $_SESSION["detailsact"];
 $originbudd = $_SESSION["originbudget"];
 $roundnumm = $_SESSION["roundnumber"];
 $summoneyattime = $_SESSION["summoneyattime"];
 $balanvemoeta = $_SESSION["balancemoneyattime"];
 $sumalltime = $_SESSION["sumalltime"];
 $balancealltime = $_SESSION["balancealltime"];
 

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 002');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');



// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------
  
// set font
$pdf->SetFont('angsanaupc', '',15);

// add a page
$pdf->AddPage('p', 'F4');

// set some text to print  
   $html = '
        <div align="center"><span  style="font-size:18pt;font-weight:bold;">ใบประมาณการจัดซื้อ-จัดจ้าง</span><br><span  style="font-size:18pt;font-weight:bold;" >วิทยาลัยเกษตรและเทคโนโลยีพะเยา</span></div>
       <div align="right"><span>เลขที่รับของพัสดุกลาง</span><br>
        <span>รับเลขที่ &nbsp;&nbsp;&nbsp;'.$passbu.'</span><br>
        <span>วันที่...................................</span></div>
        <div><span>ที่&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วันที่ &nbsp;&nbsp;'.$denddate.'</span>
        <br><span>เรือง &nbsp;&nbsp; ยื่นคำร้องขออนุญาติจัดซื้อของ</span><br><span>เรียน &nbsp;&nbsp;ผู้อำนวยการวิทยาลัยเกษตรและเทคโนโลยีพะเยา</span><br><span>ด้วยข้าพเจ้า  &nbsp;&nbsp; </span>&nbsp;&nbsp;&nbsp;'.$names.'&nbsp;&nbsp;&nbsp;&nbsp;<span>ตำแหน่ง &nbsp;&nbsp; บุคลากรทั่วไป</span>
        <br><span>(&nbsp;&nbsp;&nbsp;)&nbsp;แผนกวิชา&nbsp;(&nbsp;&nbsp;&nbsp;)&nbsp;งาน&nbsp;(&nbsp;&nbsp;&nbsp;)&nbsp;โครงการ (&nbsp;&nbsp;&nbsp;)&nbsp;กิจกรรม</span>&nbsp;&nbsp;<span>'.$nameact.'</span>&nbsp;&nbsp;&nbsp;<span>ฝ่าย &nbsp;&nbsp;'.$party.'</span><br><span>มีความประสงค์จะขอซื้อวัสดุ/จ้างทำของเพื่อใช้ในราชการของวิทยาลัยฯ ดังนี้</span>
        <br><span>(&nbsp;&nbsp;) วัสดุฝึก / อุปกรณ์การสอน ในรายวิชา</span>&nbsp;&nbsp;&nbsp;<span>'.$detail.'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>ชั้น &nbsp;&nbsp;&nbsp;&nbsp;  '.$levelll.'</span>
        <br><span>(&nbsp;&nbsp;) ซ่อมเปลี่ยนของเดิมที่ชำรุด (ระบุ) &nbsp;&nbsp;&nbsp;&nbsp; '.$detailss.'</span>
        <br><span>(&nbsp;&nbsp;) ใช้ในงาน /  กิจกรรม / โครงการย่อย (ระบุ) &nbsp;&nbsp;&nbsp;&nbsp; '.$detailacc.' </span>
        <br><span>ได้รับจัดสรรงบประมาณเป็นเงิน</span>&nbsp;&nbsp;&nbsp;&nbsp;<span> '.$originbudd.'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>บาท</span>
        <br><span>ซื้อไปแล้วจำนวน</span>&nbsp;&nbsp;<span> '.$roundnumm.' </span>&nbsp;&nbsp;&nbsp;<span>ครั้ง</span>&nbsp;
        <span>เป็นเงิน</span>&nbsp;&nbsp;&nbsp;&nbsp;<span> '.$summoneyattime.' </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>บาท</span>&nbsp;<span>คงเหลือ</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>'.$balanvemoeta.'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>บาท</span></div>
';

// print a block of text using Write()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        // เรียกใช้งาน ฟังก์ชั่นดึงข้อมูลไฟล์มาใช้งาน  
        $url = "localhost:8080/pj/tcpdf/form_data.php?id=".$id;
        $html = curl_get($url); // path ไฟล์   
        // ภ้าทดสอบที่เครื่องก็ใช้ http://localhost/data_html.php  


  
        // สร้าง pdf ด้วยคำสั่ง writeHTMLCell()  
       $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);      

     
   $html = '
        <div>&nbsp;<span>เป็นเงิน</span>&nbsp;&nbsp;&nbsp;<span>'.$sumalltime.'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>บาท</span>&nbsp;&nbsp;&nbsp;&nbsp;<span>คงเหลือไว้ซื้อ</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>'.$balancealltime.'</span>&nbsp;&nbsp;&nbsp;&nbsp;<span>บาท</span>
        <br>&nbsp;&nbsp;&nbsp;<span>(1) จึงเรียนมาเพื่อโปรพิจารณาอนุมัติ</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>(2) ความเห็น...................................................................</span>
        <br>&nbsp;&nbsp;<span>ลงชื่อ...................................................................ผู้รับผิดชอบ</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>ลงชื่อ....................................................................</span>
        <br>&nbsp;&nbsp;&nbsp;&nbsp;<span>( ….........................................................)</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>( ….........................................................)</span>
        <br>&nbsp;&nbsp;&nbsp;&nbsp;<span>…........./............................./....................</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span> …........./............................./....................</span>
        <br><span>หัวหน้า (&nbsp;&nbsp;&nbsp;) แผนกวิชา (&nbsp;&nbsp;&nbsp;) งาน (&nbsp;&nbsp;&nbsp;) โครงการ................................................................................</span>
        <br><span>(3) คณะกรรมการจัดซื้อ</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>(4) คณะกรรมการตรวจรับพัสดุ / ตรวจการจ้าง </span>&nbsp;<span>(5)ความห็น............................................</span>
        <br><span>ลงชื่อ..........................ประธานกรรมการ</span>&nbsp;<span>ลงชื่อ.......................ประธานกรรมการ</span>&nbsp;&nbsp;&nbsp;&nbsp;<span>ลงชื่อ.....................................................</span>
        <br><span>ลงชื่อ.........................กรรมการ</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>ลงชื่อ...........................กรรมการ</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>(</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>)</span>
        <br><span>ลงชื่อ.........................กรรมการ</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>ลงชื่อ...........................กรรมการ</span>&nbsp;&nbsp;&nbsp;&nbsp;<span>เจ้าหน้าที่พัสดุ............./...................../..............</span>
        <br><span>(6)ยอดคงเหลือ</span>&nbsp;&nbsp;<span>'.$balancealltime.'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span> บาท </span>&nbsp;&nbsp;&nbsp;&nbsp;<span>(7) ความเห็น.................................................................................................</span>
        <br><span>ลงชื่อ.................................................................</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>ลงชื่อ.................................................................</span>
        <br>&nbsp;&nbsp;&nbsp;<span>(</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>)</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>(</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>)</span>
        <br>&nbsp;&nbsp;&nbsp;&nbsp;<span>หัวหน้างานวางแผนงบประมาณ</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>ทำหน้าที่ รอง ผอ.ฝ่ายแผนกงานและความร่วมมือ</span>
        <br>&nbsp;&nbsp;<span>…........./............................./....................</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>…........./............................./....................</span>
        <br><span>(8) ความเห็น.............................................................</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>(9)ความเห็น.....................................................................</span>
        <br>&nbsp;&nbsp;<span>ลงชื่อ..................................................................</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>ลงชื่อ........................................................................</span>
        <br>&nbsp;&nbsp;&nbsp;&nbsp;<span>(.............................................................)</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>(.............................................................)</span>
        <br><span>รองผอ.(&nbsp;)ฝ่ายบริหาร&nbsp;(&nbsp;&nbsp;)ฝ่ายพัฒนา&nbsp;(&nbsp;&nbsp;)ฝ่ายแผน&nbsp;(&nbsp;&nbsp;)ฝ่ายวิชาการ</span>&nbsp;<span>รอง ผอ. ฝ่ายบริหารทรัพยากร</span>
        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>.........../.................../.................</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>.........../.................../.................</span></div>
        <div align="center">&nbsp;<span>(10) คำสั่ง......................................................................</span>&nbsp;&nbsp;&nbsp;
        <br>&nbsp;&nbsp;&nbsp;<span>(</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>)</span>&nbsp;&nbsp;&nbsp;
        <br>&nbsp;<span>ผู้อำนวยการ  วิทยาลัยเกษตรและเทคโนโลยีพะเยา</span>&nbsp;&nbsp;&nbsp;
        </div>
';

// print a block of text using Write()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
/*
$pdf->AddPage('p', 'A4');
     $html = '
        <div align="center"><span  style="font-size:18pt;font-weight:bold;">แบบรายงานตรวจรับพัสดุ - งานจ้างตามระเบียบสำนักนายกรัฐมนตรี</span><br><span  style="font-size:18pt;font-weight:bold;" >ว่าด้วยการพัสดุ พ.ศ. 2535 ข้อ71 และ 82</span></div>
       <div align="right"><span>วิทยาลัยเกษตรและเทคโนโลยีพะเยา</span><br>
        <span>วันที่...................................</span></div>
        <div>&nbsp;&nbsp;&nbsp;<span>&nbsp;&nbsp;&nbsp;ตาม&nbsp;&nbsp;&nbsp;(  &nbsp;&nbsp;&nbsp; )บันทึกเสนอ&nbsp;&nbsp;&nbsp;(  &nbsp;&nbsp;&nbsp; )บันทึกข้อตกลง&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp;&nbsp;   )สั่งซืเอ &nbsp;&nbsp;&nbsp;(&nbsp;&nbsp;&nbsp;   )สัญญา........................</span>
        <br><span>ของวิทยาลัยฯ&nbsp; ที่ &nbsp;'.$passbu.' &nbsp;&nbsp; ลงวันที่&nbsp; '.$denddate.' &nbsp;&nbsp;&nbsp;&nbsp;( &nbsp;&nbsp;  )&nbsp;ขาย  &nbsp;&nbsp;&nbsp;( &nbsp;&nbsp;  )&nbsp;ผู้รับจ้าง </span>
        <br><span>ได้ส่งมอบพัสดุให้แก่เจ้าหน้าที่พัสดุของวิทยาลัยฯ &nbsp;&nbsp;ตาม&nbsp;&nbsp; (&nbsp;&nbsp;)&nbsp;ข้อตกลง &nbsp;&nbsp;(&nbsp;&nbsp;)สัญญา&nbsp;&nbsp; วันที่.....................</span>
        <br><span>&nbsp;&nbsp;&nbsp;&nbsp;คณะกรรมการได้ &nbsp;&nbsp;(&nbsp;&nbsp;)ตรวจรับพัสดุ &nbsp;&nbsp;(&nbsp;&nbsp;)ตรวจการจ้าง &nbsp;&nbsp;ของหน่วยงานวทยาลัยเกษตรและเทคโนโลยีพะเยา</span>
        <br><span>เพื่อใช้ในงาน...............................</span>
        <br><span>จาก.............................................</span>
        <br><span>ตาม ()ใบส่งของ ()บิลเงินสด ()ใบกำกับภาษี เล่มที่/เลที่......รวม..........ฉบับ จำนวน .................. รายการมีจำนวนพัสดุดังนี้</span></div>
';
// print a block of text using Write()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        // เรียกใช้งาน ฟังก์ชั่นดึงข้อมูลไฟล์มาใช้งาน  
        $url = "localhost:8080/pj/tcpdf/form_data2.php?id=".$id;
        $html = curl_get($url); // path ไฟล์   
        // ภ้าทดสอบที่เครื่องก็ใช้ http://localhost/data_html.php    // สร้าง pdf ด้วยคำสั่ง writeHTMLCell()  
       $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);      
   $html = '
        <div><span>ตามรายการพัสดุข้างต้น</span>
        <br>&nbsp;&nbsp;<span>1. ได้ตรวจรับ ณ พัสดุกลาง วิทยาลัยเกษตรและเทคโนโลยีพะเยา </span>
        <br>&nbsp;&nbsp;<span>2. ได้ ()ตรวจรับ ()ทดลองหรือ ()ตรวจสอบ ครบถ้วนถูกต้องตามข้อตกลงหรือตามสัญญาทุกประการและได้เชิญผู้ชำนาญการ</span>
        <br>&nbsp;&nbsp;&nbsp; <span>หรือผู้ทรงคุณวุฒิมาให้คำปรึกษาด้วยคือ................................................................</span>
        <br>&nbsp;&nbsp;<span>3. ได้ตรวจรับพัสดุ เมื่อวันที่ .................... มอบไว้แก่............................................................................</span>
        <br>&nbsp;&nbsp;<span>4. ได้ลงบัญชี ()บัญขีพัสดุ ()ทะเบียนครุภัณฑ์ เลขที่ .................... เรียบร้อยแล้วจึงขอรายงานต่อ</span> 
        <br>&nbsp;&nbsp;&nbsp; <span>ผู้อำนวยการวิทยาลัยเกษตรและเทคโนโลยีพะเยา เพื่อทราบตามระเบียบสำนักนายกรัฐมนตรีว่าด้วยการพัสดุ พ.ศ.2545</span></div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;<span>ลงชื่อ..................................................ประธานกรรมการ    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;     …...............................................................</span>
        <br>&nbsp;&nbsp;&nbsp;&nbsp;<span>ลงชื่อ..................................................กรรมการ  </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span> ( </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>)</span>
        <br>&nbsp;&nbsp;&nbsp;&nbsp;<span>ลงชื่อ..................................................กรรมการ </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>.................../............................./..............</span>
        </div>
';

// print a block of text using Write()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->AddPage('p', 'A4');

   $html='<div align="center"><span style="font-size:18pt;font-weight:bold;">บันทึกข้อความ</span></div>
   <div><span>ส่วนราชการ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; วิทยาลัยเกษตรแลเทคโนโลยีพะเยา</span>
   <br><span>ที่ &nbsp; <span>'.$passbu.'</span> &nbsp; &nbsp; วันที่.............................</span>
   <br><span>เรื่อง &nbsp;&nbsp; ขออนุมัติเบิกเงิน &nbsp;( &nbsp;  ) งบประมาณ &nbsp;( &nbsp;  ) บำรุงการศึกษา &nbsp;( &nbsp;  )&nbsp;&nbsp; อื่นๆ...................................................</span>
   <br><span>เรียน &nbsp; &nbsp; &nbsp; &nbsp; ผู้อำนวยการวิทยาลัยเกษตรและเทคโนโลยีพะเยา</span>
   <hr>
   <span>ด้วยงานพัสดุ &nbsp; &nbsp; &nbsp;  วิทยาลัยเกษตรและเทคโนโลยีพะเยา</span>
   <br><span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (   ) หมวดค่าตอบแทน &nbsp; &nbsp;   (   ) ค่าสาธารณูปโภค</span>
   <br><span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (   ) ค่าใช้สอย  &nbsp; &nbsp;    (   ) ค่าครุภัณฑ์</span>
   <br><span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (   ) ค่าวัสดุ   &nbsp; &nbsp;  (   ) ค่าที่ดินสิ่งก่อสร้าง</span>
   <br><span> &nbsp; &nbsp; &nbsp; เพื่อใช้ในโครงการ   วิทยาลัยเกษตรและเทคโนโลยีพะเยา  ขออนุมัติเบิกเงินงบประมาณค่าตอบแทนใช้สอย</span>
   <br><span>และวัสดุ  สำนักงานคณะกรรมการอาชีวศึกษา &nbsp; &nbsp;  เป็นเงิน &nbsp; &nbsp; <span>'.$balancealltime.'</span>&nbsp;&nbsp;&nbsp;<span> บาท</span>
   <br><span>ซึ่งสำนักงานคณะกรรมการการอาชีวศึกษา  &nbsp; งาน/ฝ่าย/แผนก ............................................................&nbsp; &nbsp; </span>
   <br><div ><span style="font-size:18pt;font-weight:bold;">บันทึกงบประมาณ</span>&nbsp;&nbsp;&nbsp;&nbsp;</div>';
   $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
          // เรียกใช้งาน ฟังก์ชั่นดึงข้อมูลไฟล์มาใช้งาน  
        $url = "localhost:8080/pj/tcpdf/form_data3.php?id=".$id;
        $html = curl_get($url); // path ไฟล์   
        // ภ้าทดสอบที่เครื่องก็ใช้ http://localhost/data_html.php    // สร้าง pdf ด้วยคำสั่ง writeHTMLCell()  
       $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);      

  $html=' <div ><span style="font-size:18pt;font-weight:bold;">จัดซื้อจัดจ้างโดยวิธี</span>
    <br><span>(  &nbsp; ) ตกลงราคา   ( &nbsp;  ) สอบราคา (  &nbsp; ) ประกวดราคา ( &nbsp;  ) กรณีพิเศษ  </span>
    <br><span >( &nbsp; ) วิธีพิเศษตามวงเงินและอำนาจการดำเนินงานของ </span>
    <br>&nbsp;&nbsp;&nbsp;<span >(  &nbsp;) ผู้ว่าราชการจังหวัด </span>
    <br>&nbsp;&nbsp;&nbsp;<span >( &nbsp;  ) หัวหน้าสถานศึกษา </span></div>
   
   <div><span>ความเห็นของหัวหน้างานการเงิน</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>ความเห็นขอรองฝ่ายบริหารทรัพยากร</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>คำอนุมัติผู้อำนวยการ ฯ</span>
   <br><span>ตรวจเสนอ................................</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>….....................................................</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>..…....................................</span>
   <br><span>….............................................</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>….....................................................</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>..…............................................</span>
   <br><span>(...........................................)</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>(....................................................)</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>(.............................................)</span>
   <br><span>…......./...................../.................</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>…......./...................../................. </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>…......./...................../...........</span>
</div>';
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$pdf->AddPage('L', 'A4');


    $html ='<div></div>
            <div></div>
            <div></div>
            <div align="center"><span style="font-size:18pt;font-weight:bold;">ใบรับใบสำคัญ</span><br><span style="font-size:22;font-weight:bold">วิทยาลัยเกษตรแลเทคโนโลยีพะเยา</span></div>
            <br><div align="right"><span>วันที่............เดือน...............พ.ศ................</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;</div>
            
            <br><div>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;<span>ได้รับใบสำคัญจาก..........................................................................................................................................................</span>
            <br>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;<span>ตำแหน่ง........................................................................................สังกัด.........................................................................</span>
            <br>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;<span>จังหวัด................................เพื่อส่งใช้เงินยืมตามสัญญาการยืมเงินเลขที่.........................................................................</span>
            <br>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;<span>ลงวันที่................................เดือน..................................พ.ศ.............................. &nbsp; &nbsp; &nbsp; รวม........................................ฉบับ</span>
            <br>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;<span>เป็นเงิน......................................................................บาท(.............................................................................................)</span>
            <br>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;<span>ไว้เป็นการถูกต้องแล้ว</span></div>
           
            <br><div align="center"><span>ลงชื่อ......................................................ผู้รับ</span>
            <br><span>(......................................................)</span>
            <br><span>ตำแหน่ง.......................................................................</span>&nbsp; &nbsp;</div>

            ';

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

*/

/*$js = <<<EOD

EOD;

// force print dialog
$js .= 'print(true);';

// set javascript
$pdf->IncludeJS($js);*/


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('PDF_00x.pdf', 'I'); 

//============================================================+
// END OF FILE
//============================================================+
?>