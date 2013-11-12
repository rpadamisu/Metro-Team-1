$(function()
{
	$('#datepicker').datepicker({  
            inline: true,  
            showOtherMonths: true,  
            dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],  
        }); 


	$('#time').ptTimeSelect();


	$("#clearButton").on("click", function()
	{
		$("#firstname").val("");
		$("#lastname").val("");
		$("#schoolorg").val("");
		$("#email").val("");
		$("#phone").val("");
		$("#address").val("");
		$("#city").val("");
		$("#state").val("");
		$("#zip").val("");
		$("#time").val("");
		$("#datepicker").val("");
	});
});