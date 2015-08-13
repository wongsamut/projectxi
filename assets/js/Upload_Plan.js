function PDFUploadPlan()
{	
		var objForm = new FormData();
		objForm.append('filUpload',$('input#filUpload')[0].files[0]);
		objForm.append('Doc_Budget',$('input#Doc_Budget').val());
		objForm.append('Filesname',$('input#Filesname').val());
	

	$.ajax({
		type 		: 'POST',
		url			: 'upload/Upload_control_Plan.php',
		cache		: false,	
		contentType	: false,
		processData	: false,
		data 		: objForm,
		success 	: function(data)
		{			
			if(data == 0){
					
					 swal("Fail!", "อัพโหลด PDF ล้มเหลว กรุณาใช้นามสกุล .PDF เท่านั้น", "error");
			}else{
					
				swal({   
				title: "Success !",   
				text: "อัพโหลดไฟล์ PDF เสร็จสมบูรณ์",   
				type: "success",   
				showCancelButton: false,   
				confirmButtonColor: "#00a020",   
				confirmButtonText: "OK",   
				closeOnConfirm: false }, 
				function()
				{   
				 window.location.reload(true); 
				 
				});
			
			}	
		
		}}); 
				 
				
	
	}