$(document).ready(function(){
	$("#submit").attr('disabled','disabled');
	
	$("form").keyup(function(){
	
	//To disable submit button
	$("#submit").attr('disabled','disabled');

	//Validating Fields
	var username		= $('#txtUsername').val();
	
	var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;

	if(!(username==""))
	{
	if(filter.test(email))
	{
	
	//To enable submit button 
	$("#submit").removeAttr('disabled');
	$("#submit").css({"cursor":"pointer","box-shadow":"1px 0px 6px #333"});
	}
	}
});

	//On click of submit button 
	$("#submit").click(function(){
	$("#submit").css({"cursor":"default","box-shadow":"none"});
	});

});