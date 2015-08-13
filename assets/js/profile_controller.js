function editClick()
{
	var Username		 = $('input#txtUsername').val();
	var Password		 = $('input#txtPassword').val();
	var FirstName 		 = $('input#txtFirstName').val();
	var LastName 		 = $('input#txtLastName').val();
	var Ofname		 	 = $('input#Ofname').val();
	var Position		 = $('input#txtPosition').val();
	var Gender			 = $('input#txtGender').val();
	var Email			 = $('input#txtEmail').val();
	var Tel		 		 = $('input#txtTel').val();
	var Phone			 = $('input#txtPhone').val();
	var Home_Num		 = $('input#txtHome_Num').val();
	var Moo		  		 = $('input#txtMoo').val();
	var Road			 = $('input#txtRoad').val();
	var ID_Card_Num		 = $('input#txtID_Card_Num').val();
	var Fax		  		 = $('input#txtFax').val();
	
		
	$.post('profile_control.php',
					{
							txtUsername : Username,
							txtPassword : Password,
							txtFirstName : FirstName,
							txtLastName : LastName,
							Ofname	:	Ofname,
							txtPosition : Position,
							txtEmail : Email,
							txtTel : Tel,
							txtPhone : Phone,
							txtGender : Gender,
							txtHome_Num : Home_Num,
							txtMoo : Moo,
							txtRoad : Road,
							txtID_Card_Num : ID_Card_Num,
							txtFax : Fax,
					},function(data){
						
			if(data == 1)
			{
				
				var error_msg ='<div class="alert alert-danger"><strong>[ System ]</strong>  Please complete the form fully</div>';
				$('div#pnlAlert').html(error_msg);
			}
			else if(data == 0)	
			{ 	
				swal({ 
			title: "สำเร็จ ",   
			text: "ข้อมูลได้ถูกแก้ไขเรียบร้อยแล้ว",
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
				
					
			}
	
});
}