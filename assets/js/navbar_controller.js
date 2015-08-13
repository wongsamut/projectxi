<!-------------------------------------------- Pages -------------------------------------------->
$('#btnHome').click(function()
{
	$.get("assets/include/html/home.php",
	function(data)
	{
		$('div#content-body').html(data);
			
	});
});

$('#btnPetition').click(function()
{
	$.get("assets/include/html/petition.php",
	function(data)
	{
		$('div#content-body').html(data);
	});
});

$('#btnSignup').click(function()
{
	$.get("assets/include/html/signup_form.php",
	function(data)
	{
		$('div#content-body').html(data);
	});	
});

$('#btnInme').click(function()
{
	$.get("assets/include/html/searchdoc.php",
	function(data)
	{
		$('div#content-body').html(data);
	});
});

$('#btnOutme').click(function()
{
	$.get("assets/include/html/documentme.php",
	function(data)
	{
		$('div#content-body').html(data);
	});
});
			
$('#btnLogout').click(function()
{
	$.get('logout_control.php',function(data)
	{		 
		window.location.reload(true); 
				 		
	});
});

$('#btnProfile').click(function()
{
	$.get("assets/include/html/User_profile_form.php",
	function(data)
	{
		$('div#content-body').html(data);
	});
});

$('#btnSup').click(function()
{
	$.get("assets/include/html/consider_Sup.php",
	function(data)
	{
		$('div#content-body').html(data);
	});
});
$('#btnPlan').click(function()
{
	$.get("assets/include/html/consider_Plan.php",
	function(data)
	{
		$('div#content-body').html(data);
	});
});
$('#btnFin').click(function()
{
	$.get("assets/include/html/consider_Finance.php",
	function(data)
	{
		$('div#content-body').html(data);
	});
});

$('#btnUserSignup').click(function()
{
	$.get("assets/include/html/okuser_form.php",
	function(data)
	{
		$('div#content-body').html(data);
	});
});

$('#btnseeme').click(function()
{
  $.get("assets/include/html/seeme.php",
  function(data)
  {
    $('div#content-body').html(data);
  });
});



$('#btnsearchdoc').click(function()
{
  $.get("assets/include/html/searchdoc.php",
  function(data)
  {
    $('div#content-body').html(data);
  });
});

<!-------------------------------------------- Pages  -------------------------------------------->
<!---------------------------------------------- Search -------------------------------------------->
$('#btnSearchSignup').click(function()
{
	
	var text = $('input#txt').val();
	$.post('okuser_control.php',
					{
							text: text
					},function(data)
		{
				
			$.get("assets/include/html/okuser.php",
				function(data)
			{
				$('div#contect-ho').html(data);
			});
			
		});
});

$('#btnSearchPur').click(function()
{
	
	var txtKeyword = $('input#txtKeyword').val();
	var ddlSelect = $('select#ddlSelect option:selected').val();
	$.post('Search_control.php',
					{
							txtKeyword: txtKeyword,
							ddlSelect: ddlSelect
					},function(data)
		{
				
			$.get("assets/include/html/Search.php",
				function(data)
			{
				$('div#contect-hoo').html(data);
			});
			
		});
});

$('#btnSearchUserDe').click(function()
{
	
	var text = $('input#txtd').val();
	$.post('deleteuser_control.php',
					{
							text: text
					},function(data)
		{
				
			$.get("assets/include/html/delete.php",
				function(data)
			{
				$('div#contect-hod').html(data);
			});
			
		});
});

$('#btnSearchUserEd').click(function()
{
	
	var text = $('input#txtdd').val();
	$.post('edituser_control.php',
					{
							text: text
					},function(data)
		{
				
			$.get("assets/include/html/Edit.php",
				function(data)
			{
				$('div#contect-hodd').html(data);
			});
			
		});
});
<!---------------------------------------------- Search -------------------------------------------->

<!--------------------------------------- Status Doc  ----------------------------------------->
function btnAddress(btnObj)
{
  //alert("clicked");
  var btnVal = btnObj.value;
  //alert(btnVal);
  var url = "assets/include/html/address.php?data="+btnVal;
  //alert(url);
  $.get(url,
    function(data)
    {
      $('div#content-body').html(data);	  	
    }
  );
}

function btnDetails(btnObj)
{
  //alert("clicked");
  var btnVal = btnObj.value;
  //alert(btnVal);
  var url = "assets/include/html/Details.php?data="+btnVal;
  //alert(url);
  $.get(url,
    function(data)
    {
      $('div#content-body').html(data);	  	
    }
  );
}

 function btnsuppass(btnObj)
{
	swal({   
	title: "ยืนยันการซื้อสินค้าเรียบร้อย",   
	text: "รายการสินค้าในเอกสารนี้ถูกดำเนินการซื้อเรียบร้อยแล้ว",   
	type: "warning",   
	showCancelButton: true,   
	confirmButtonColor: "#00CC00",   
	confirmButtonText: "ใช่, ฉันจะอนุมัติ",  
	cancelButtonText: "ไม่, ฉันยังไม่แน่ใจ",   
	closeOnConfirm: false,   
	closeOnCancel: false 
	 },
	function(isConfirm){
	if (isConfirm) {
	swal("สำเร็จ", "ดำเนินการซื้อรายการสินค้าใน เอกสาร นี้แล้วเรียบร้อย", "success");
  //alert("clicked");
  var btnVal = btnObj.value;
  //alert(btnVal);
  var url = "update/docpasssup_up.php?data="+btnVal;
  //alert(url);
  $.get(url,
    function(data)
    {
      $('div#content-body').html(data);
    }
  ); } else {     
   swal("ยกเลิก", "คุณได้ยกเลิก เพื่อความแน่ใจกรุณาตรวจสอบรายการสินค้าก่อนยืนยัน", "error");   
   }  });
} 

 function btnsupfail(btnObj)
{
	swal({ 
	title: "คุณจะยืนยันที่จะไม่ซื้อสินค้า",   
	text: "คุณไม่สามารถดำเนินการซื้อสินค้าในเอกสารนี้ได้",   
	type: "warning",   
	showCancelButton: true,   
	confirmButtonColor: "#00CC00",   
	confirmButtonText: "ใช่, ฉันจะไม่อนุมัติ",  
	cancelButtonText: "ไม่ใช่, ฉันยังไม่แน่ใจ",
	closeOnConfirm: false,   
	closeOnCancel: false
	 },
  function(isConfirm){   
	if (isConfirm) {
	swal("สำเร็จ", "คุณได้ยินยันว่าจะไม่ดำเนินการซื้อสินค้าในรายการของเอกสารนี้", "success");
  //alert("clicked");
  var btnVal = btnObj.value;
  //alert(btnVal);
  var url = "update/docfailsup_up.php?data="+btnVal;
  //alert(url);
  $.get(url,
    function(data)
    {
      $('div#content-body').html(data);
    }
  ); } else {    
     swal("ยกเลิก", "คุณได้ยกเลิก เพื่อความแน่ใจกรุณาตรวจสอบรายการสินค้าก่อน", "error");  
    } });
} 

 function btnplpass(btnObj)
{
	swal({ 
	title: "คุณจะยืนยันที่จะอนุมัติ",   
	text: "คุณจะยืนยันที่จะอนุมัติ เอกสาร นี้หรือไม่",   
	type: "warning",   
	showCancelButton: true,   
	confirmButtonColor: "#00CC00",   
	confirmButtonText: "ใช่, ฉันจะอนุมัติ",  
	cancelButtonText: "ไม่ใช่, ฉันยังไม่แน่ใจ",
	closeOnConfirm: false,   
	closeOnCancel: false
	 },
  function(isConfirm){   
	if (isConfirm) {
	swal("สำเร็จ", "สถานะเอกสารนี้ถูกเปลี่ยนเป็น อนุมัติ", "success");
  //alert("clicked");
  var btnVal = btnObj.value;
  //alert(btnVal);
  var url = "update/docpassplan_up.php?data="+btnVal;
  //alert(url);
  $.get(url,
    function(data)
    {
      $('div#content-body').html(data);
    }
  ); } else {    
     swal("ยกเลิก", "คุณได้ยกเลิก เพื่อความแน่ใจกรุณาตรวจสอบเอกสารก่อนอนุมัติ", "error");  
    } });
} 

 function btnplfail(btnObj)
{
	swal({ 
	title: "คุณจะยืนยันที่จะไม่อนุมัติ",   
	text: "คุณจะยืนยันที่จะไม่อนุมัติ เอกสาร นี้หรือไม่",   
	type: "warning",   
	showCancelButton: true,   
	confirmButtonColor: "#00CC00",   
	confirmButtonText: "ใช่, ฉันจะไม่อนุมัติ",  
	cancelButtonText: "ไม่, ฉันยังไม่แน่ใจ",
	closeOnConfirm: false,   
	closeOnCancel: false
	 },
  function(isConfirm){   
	if (isConfirm) {
	swal("สำเร็จ", "สถานะเอกสารนี้ถูกเปลี่ยนเป็น ไม่อนุมัติ", "success");
  //alert("clicked");
  var btnVal = btnObj.value;
  //alert(btnVal);
  var url = "update/docfailplan_up.php?data="+btnVal;
  //alert(url);
  $.get(url,
    function(data)
    {
      $('div#content-body').html(data);
    }
  ); } else {    
     swal("ยกเลิก", "คุณได้ยกเลิก เพื่อความแน่ใจกรุณาตรวจสอบเอกสารก่อนไม่อนุมัติ", "error");  
    } });
} 

 function btnfinpass(btnObj)
{
	swal({ 
	title: "คุณจะยืนยันที่จะอนุมัติงบประมาณ",   
	text: "เอกสารนี้จะถูกอนุมัติงบประมาณ",   
	type: "warning",   
	showCancelButton: true,   
	confirmButtonColor: "#00CC00",   
	confirmButtonText: "ใช่, ฉันจะอนุมัติ",  
	cancelButtonText: "ไม่, ฉันยังไม่แน่ใจ",
	closeOnConfirm: false,   
	closeOnCancel: false
	 },
  function(isConfirm){   
	if (isConfirm) {
	swal("สำเร็จ", "สถานะเอกสารนี้ถูกเปลี่ยนเป็น อนุมัติ", "success");
  //alert("clicked");
  var btnVal = btnObj.value;
  //alert(btnVal);
  var url = "update/docpassfin_up.php?data="+btnVal;
  //alert(url);
  $.get(url,
    function(data)
    {
      $('div#content-body').html(data);
    }
  ); } else {    
     swal("ยกเลิก", "คุณได้ยกเลิก เพื่อความแน่ใจกรุณาตรวจสอบเอกสารก่อนอนุมัติ", "error");  
    } });
} 

 function btnfinfail(btnObj)
{
	swal({ 
	title: "คุณจะยืนยันที่จะไม่อนุมัติงบประมาณ",   
	text: "เอกสารนี้จะไม่ถูกอนุมัติงบประมาณ",   
	type: "warning",   
	showCancelButton: true,   
	confirmButtonColor: "#00CC00",   
	confirmButtonText: "ใช่, ฉันจะไม่อนุมัติ",  
	cancelButtonText: "ไม่, ฉันยังไม่แน่ใจ",
	closeOnConfirm: false,   
	closeOnCancel: false
	 },
  function(isConfirm){   
	if (isConfirm) {
	swal("สำเร็จ", "สถานะเอกสารนี้ถูกเปลี่ยนเป็น ไม่อนุมัติ", "success");
  //alert("clicked");
  var btnVal = btnObj.value;
  //alert(btnVal);
  var url = "update/docfailfin_up.php?data="+btnVal;
  //alert(url);
  $.get(url,
    function(data)
    {
      $('div#content-body').html(data);
    }
  ); } else {    
     swal("ยกเลิก", "คุณได้ยกเลิก เพื่อความแน่ใจกรุณาตรวจสอบเอกสารก่อนไม่อนุมัติ", "error");  
    } });
} 

function btnbuy(btnObj)
{
	swal({ 
	title: "คุณยืนยันที่จะดำเนินการซื้อสินค้า",   
	text: "สถานะเอกสารนี้จะถูกเปลี่ยนเป็น 'กำลังซื้อของ'",
	type: "warning",   
	showCancelButton: true,   
	confirmButtonColor: "#00CC00",   
	confirmButtonText: "ใช่, ฉันจะเปลี่ยน",
	cancelButtonText: "ไม่ใช่, ฉันยังไม่แน่ใจ",
	closeOnConfirm: false,   
	closeOnCancel: false 
	 },
	function(isConfirm){   
	if (isConfirm) {
  
  swal("สำเร็จ", "สถานะเอกสารตอนนี้คือ 'กำลังซื้อของ'", "success");
  //alert("clicked");
  var btnVal = btnObj.value;
  //alert(btnVal);
  var url = "update/Buy_sup.php?data="+btnVal;
  //alert(url);

  $.get(url,
    function(data)
    {
      $('div#content-body').html(data);
    }
  ); } else {    
     swal("ยกเลิก", "คุณได้ยกเลิกการเปลี่ยนสถานะ", "error");  
    } });
} 
<!--------------------------------------- Status Doc  ----------------------------------------->

<!--------------------------------------- PDF  ----------------------------------------->
function btnPDF(btnObj)
{
  //alert("clicked");
  var btnVal = btnObj.value;
  //alert(btnVal);
  var url = "assets/include/html/Upload_PDF.php?data="+btnVal;
  //alert(url);
  $.get(url,
    function(data)
    {
      $('div#content-body').html(data);
    }
  );
} 

function btnPDFS(btnObj)
{
  //alert("clicked");
  var btnVal = btnObj.value;
  //alert(btnVal);
  var url = "assets/include/html/Upload_PDF_Supp.php?data="+btnVal;
  //alert(url);
  $.get(url,
    function(data)
    {
      $('div#content-body').html(data);
    }
  );
} 

function btnPDFP(btnObj)
{
  //alert("clicked");
  var btnVal = btnObj.value;
  //alert(btnVal);
  var url = "assets/include/html/Upload_PDF_Plan.php?data="+btnVal;
  //alert(url);
  $.get(url,
    function(data)
    {
      $('div#content-body').html(data);
    }
  );
} 

<!--------------------------------------- PDF  ----------------------------------------->

function btnpledit(btnObj)
{
	
  //alert("clicked");
  var btnVal = btnObj.value;
  //alert(btnVal);
  var url = "assets/include/html/planedit.php?data="+btnVal;
  //alert(url);
  $.get(url,
    function(data)
    {
      $('div#content-body').html(data);
    }
  );
} 


<!-------------------------------------------- Admin -------------------------------------------->
$('#btnConsider').click(function()
{
	$.get("assets/include/html/consider.php",
	function(data)
	{
		$('div#content-body').html(data);
	});
});

function btnEditUser(btnObj)
{
  //alert("clicked");
  var btnVal = btnObj.value;
  //alert(btnVal);
  var url = "assets/include/html/User_profile_admin.php?data="+btnVal;
  //alert(url);
  $.get(url,
    function(data)
    {
      $('div#content-body').html(data);
    }
  );
} 

function btnOkUserPRO(btnObj)
{
  //alert("clicked");
  var btnVal = btnObj.value;
  //alert(btnVal);
  var url = "assets/include/html/OkUser_profile_admin.php?data="+btnVal;
  //alert(url);
  $.get(url,
    function(data)
    {
      $('div#content-body').html(data);
    }
  );
} 

$('#btnDelete').click(function()
{
	$.get("assets/include/html/delete_form.php",
	function(data)
	{
		$('div#content-body').html(data);
	});
});

function btnDelUser(btnObj)
{
	swal({ 
	title: "ยืนยันสถานะ",   
	text: "คุณจะยืนยันที่จะลบ Username นี้หรือไม่",   
	type: "warning",   
	showCancelButton: true,   
	confirmButtonColor: "#00CC00",   
	confirmButtonText: "ใช่",  
	cancelButtonText: "ไม่ใช่",
	closeOnConfirm: false,   
	closeOnCancel: false
	 },
  function(isConfirm){   
	if (isConfirm) {
	swal("สำเร็จ", "Username นี้ได้ถูกลบเรียบร้อย", "success");
  //alert("clicked");
  var btnVal = btnObj.value;
  //alert(btnVal);
  var url = "user_delete.php?data="+btnVal;
  //alert(url);
  $.get(url,
    function(data)
    {
      $('div#content-body').html(data);
    }
  ); } else {    
     swal("ยกเลิก", "คุณได้ยกเลิกการลบ Username นี้", "error");  
    } });
} 

function btnOkUser(btnObj)
{
	swal({ 
	title: "ยืนยันสถานะ",   
	text: "คุณจะยืนยันสถานะ Username นี้หรือไม่",   
	type: "warning",   
	showCancelButton: true,   
	confirmButtonColor: "#00CC00",   
	confirmButtonText: "ใช่",  
	cancelButtonText: "ไม่ใช่",
	closeOnConfirm: false,   
	closeOnCancel: false
	 },
  function(isConfirm){   
	if (isConfirm) {
	swal("สำเร็จ", "สถานะ Username นี้ได้รับการยืนยัน", "success");
  //alert("clicked");
  var btnVal = btnObj.value;
  //alert(btnVal);
  var url = "Okuser_update.php?data="+btnVal;
  //alert(url);
  $.get(url,
    function(data)
    {
      $('div#content-body').html(data);
    }
  ); } else {    
     swal("ยกเลิก", "คุณได้ยกเลิกการยืนยันสถานะ", "error");  
    } });
} 

function btnOkUserDe(btnObj)
{
	swal({ 
	title: "ยืนยันสถานะ",   
	text: "คุณจะยืนยันที่จะลบ Username นี้หรือไม่",   
	type: "warning",   
	showCancelButton: true,   
	confirmButtonColor: "#00CC00",   
	confirmButtonText: "ใช่",  
	cancelButtonText: "ไม่ใช่",
	closeOnConfirm: false,   
	closeOnCancel: false
	 },
  function(isConfirm){   
	if (isConfirm) {
	swal("สำเร็จ", "Username นี้ได้ถูกลบเรียบร้อย", "success");
  //alert("clicked");
  var btnVal = btnObj.value;
  //alert(btnVal);
  var url = "OkuserDe_update.php?data="+btnVal;
  //alert(url);
  $.get(url,
    function(data)
    {
      $('div#content-body').html(data);
    }
  ); } else {    
     swal("ยกเลิก", "คุณได้ยกเลิกการลบ Username นี้", "error");  
    } });
} 

function btnOkUserAll(btnObj)
{
   swal({ 
	title: "ยืนยันสถานะ",   
	text: "คุณจะยืนยันสถานะ Username ทั้งหมดหรือไม่",  
	type: "warning",   
	showCancelButton: true,   
	confirmButtonColor: "#00CC00",   
	confirmButtonText: "ใช่",  
	cancelButtonText: "ไม่ใช่",
	closeOnConfirm: false,   
	closeOnCancel: false
	 },
  function(isConfirm){   
	if (isConfirm) {
	swal("สำเร็จ", "สถานะ Username ทั้งหมดได้รับการยืนยัน", "success");
  //alert("clicked");
  var btnVal = btnObj.value;
  //alert(btnVal);
  var url = "OkuserAll_update.php?data="+btnVal;
  //alert(url);
  $.get(url,
    function(data)
    {
      $('div#content-body').html(data);
    }
  ); } else {    
     swal("ยกเลิก", "คุณได้ยกเลิกการยืนยันสถานะ", "error");  
    } });
} 
<!-------------------------------------------- Admin -------------------------------------------->

$('#btnDeu').click(function()
{
	
	var text = $('input#txtDeuser').val();
	$.post('Deu_control.php',
				{
							text: text
		},function(data)
		{
				
			swal("สำเร็จ", "Username นี้ได้ถูกยื่นขอลบเรียบร้อย", "success");
			
		});
});


$('#btnrepass').click(function()
{
	
	var text = $('input#txtRePass').val();
	$.post('Repass_control.php',
				{
							text: text
		},function(data)
		{
				
			swal("สำเร็จ", "กรุณารอรับรหัสผ่านของท่านจาก Admin", "success");
			
		});
});

$('#btntest').click(function()
{
  $.get("tcpdf/Test.php",
  function(data)
  {
    $('div#content-body').html(data);
  });
});


$('#btnrepo').click(function()
{
	
	var text = $('select#txtRePosi option:selected').val();
	$.post('Repo_control.php',
				{
							text: text
		},function(data)
		{
				
			swal("สำเร็จ", "ท่านได้ยื่นเรื่องขอเปลี่ยนแผนกไปยัง Admin เรียบร้อย", "success");
			
		});
});

$('#btnrepass').click(function()
{
	
	var text = $('input#txtRePass').val();
	$.post('Repass_control.php',
				{
							text: text
		},function(data)
		{
			
			$.get("assets/include/html/SearchRepass.php",
				function(data)
			{
				$('div#pass').html(data);
			});
							
			
		});
		
});