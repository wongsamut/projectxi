$('#btnLogin1').click(function()
	{
		var username = $('input#txtUsername').val();
		var password = $('input#txtPassword').val();
		$.post('login_control.php',
		{
			txtUsername : username,
			txtPassword : password	
		},function(data)
		{
			if(data == 0)
			{
				var error_msg ='<div class="alert alert-danger"><strong><font color ="yellow"><i class="fa fa-exclamation-triangle fa-lg"></font></i> &nbsp;ขออภัย คุณกรอกชื่อผู้ใช้หรือรหัสผ่านผิด</strong></div>';
				swal({   
				title: "Fail !",   
				text: "Login Fail",   
				type: "error",   
				showCancelButton: false,   
				confirmButtonColor: "#CC0000",   
				confirmButtonText: "OK",   
				closeOnConfirm: true }, 
				function()
				{   
				 $('div#pnlAlertLOG').html(error_msg);
				 
				});
				
			}else if(data == 1)
			{
				var error_msg ='<div class="alert alert-danger"><strong><font color ="yellow"><i class="fa fa-exclamation-triangle fa-lg"></font></i> &nbsp;ขออภัย ชื่อผู้ใช้ยังไม่ได้รับการยืนยัน</strong></div>';
				swal({   
				title: "Fail !",   
				text: "Username not Confirm",   
				type: "error",   
				showCancelButton: false,   
				confirmButtonColor: "#CC0000",   
				confirmButtonText: "OK",   
				closeOnConfirm: true }, 
				function()
				{   
				
				 $('div#pnlAlertLOG').html(error_msg);
				 
				});
				
			}
			else
			{
				
				window.location.reload(true);
			}
		
	}); });