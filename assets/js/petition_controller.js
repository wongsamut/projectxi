var param;
function InsertPetition()
{	
	
	var objForm = new FormData();
	objForm.append('senddate',$('input#senddate').val());
	objForm.append('user',$('input#user').val());
	objForm.append('passbudget',$('input#passbudget').val());
	objForm.append('usebudform',$('input[id="usebudform"]:checked').val());
	objForm.append('nameact',$('input#nameact').val());
	objForm.append('party',$('input#party').val());
	objForm.append('buyorhire',$('input#buyorhire').val());
	objForm.append('equipment',$('input[id="equipment"]:checkbox').val());
	objForm.append('detailsequ',$('input#detailsequ').val());	
	objForm.append('level',$('input#level').val());
	objForm.append('repair',$('input[id="repair"]:checkbox').val());
	objForm.append('detailsrepair',$('input#detailsrepair').val());
	objForm.append('activity',$('input[id="activity"]:checkbox').val());		
	objForm.append('detailsact',$('input#detailsact').val());
	objForm.append('originbudget',$('input#originbudget').val());
	objForm.append('roundnumber',$('input#roundnumber').val());
	objForm.append('summoneyattime',$('input#summoneyattime').val());
	objForm.append('balancemoneyattime',$('input#balancemoneyattime').val());
	objForm.append('sumalltime',$('input#sumalltime').val());
	objForm.append('balancealltime',$('input#balancealltime').val()); 
	
	objForm.append('showInline',$('input#showInline').val());
	
	for(i = 1;i<=showInline;i++){
	objForm.append("txtName.+i+",$("input#txtName.+i+").val()); 
	objForm.append("txtNum.+i+",$("input#txtNum.+i+").val()); 
	objForm.append("txtUnit.+i+",$("input#txtUnit.+i+").val());
	objForm.append("txtPrice.+i+",$("input#txtPrice.+i+").val());
	objForm.append("txtTotal.+i+",$("input#txtTotal.+i+").val());
	objForm.append("txtdate.+i+",$("input#txtdate.+i+").val());
	}
	
	
	$.ajax({
		type 		: 'POST',
		url			: 'insertpetition.php',
		cache		: false,	
		contentType	: false,
		processData	: false,
		data 		: objForm,
		success 	: function(data)
		{		
			alert(data);
		if(data == 0)
		{
			
			alert('Insert Failed');
		}
		else 
		{
			
			alert("Insert successful");
		}
		
	}});
}
  		
