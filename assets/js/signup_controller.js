function submitClick()
{	
	var username		= $('input#txtUsername').val();
	var password 		= $('input#txtPassword').val();
	var	Ofname			= $('select#Ofname option:selected').val();
	var FirstName 		= $('input#txtFirstName').val();
	var LastName 		= $('input#txtLastName').val();
	var Position		= $('select#txtPosition option:selected').val();
	var Email			= $('input#txtEmail').val();
	var Tel		 		= $('input#txtTel').val();
	var gender			= $('input[name="Radio_Sign"]:checked').val();
	var	Card_ID			= $('input#txtCard_ID').val();
	var	Home_Num		= $('input#txtHome_num').val();
	var	Moo				= $('input#txtMoo').val();	
	var	Road 			= $('input#txtRoad').val();
	var	province		= $('select#province option:selected').val();
	var	amphur			= $('select#amphur option:selected').val();
	var	district		= $('select#district option:selected').val();
	var	amphur_postcode	= $('select#amphur_postcode option:selected').val();	
	$.post('signup_control.php',
	{
		txtUsername : username,
		txtPassword : password,
		Ofname :Ofname,
		txtFirstName : FirstName,
		txtLastName : LastName,
		txtPosition : Position,
		txtEmail : Email,
		txtTel : Tel,
		Radio_Sign : gender,	
		txtCard_ID :Card_ID,		
		txtHome_num :Home_Num,
		txtMoo :Moo,		
		txtRoad :Road ,	
		province :province,	
		amphur :amphur,	
		district :district,
		amphur_postcode :amphur_postcode
				
		
	},function(data){
		if(data == 1)
		{
			var error_msg ='<div class="alert alert-danger"><strong><font color ="yellow"><i class="fa fa-exclamation-triangle fa-lg"></font></i> &nbsp;ขออภัย ชื่อผู้ใช้นี้ได้ถูกใช้ไปแล้ว</strong></div>';
			swal({ 
			title: "Fail !",   
			text: "ลงทะเบียนล้มเหลว",
			type: "error",   
			showCancelButton: false,
			confirmButtonColor : "#c00020",      
			confirmButtonText: "OK",
			closeOnConfirm: true,   
			 },
			function(isConfirm){   
			if (isConfirm) {  
         	$('div#pnlAlert').html(error_msg);
			} });
			
		}
		else if(data == 0)
		{
			swal({ 
			title: "Success !",   
			text: "ลงทะเบียนเสร็จสมบูรณ์",
			type: "success",   
			showCancelButton: false,
			confirmButtonColor : "#c00020",      
			confirmButtonText: "OK",
			closeOnConfirm: false,   
			closeOnCancel: false 
			 },
			function(isConfirm){   
			if (isConfirm) {  
         	window.location.reload(true);
			} });
		}else{
		}
	});
}
  		
