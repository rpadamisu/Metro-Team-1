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


	$.validator.addMethod('customphone', function (value, element) {
    	return this.optional(element) || /^\d{3}-\d{3}-\d{4}$/.test(value);
		}, "Please enter a valid phone number");

	$.validator.addMethod('zipcode', function (value, element) {
  		return this.optional(element) || /^\d{5}(?:-\d{4})?$/.test(value);
		}, "Please provide a valid zipcode.");

	$("#teacherForm").validate(
	{

		rules: 
		{

			firstname:
			{
				required: true
			},
			lastname:
			{
				required: true
			},
			schoolorg:
			{
				required: true
			},
			email:
			{
				required: true,
				email: true
			},
			phone:
			{
				required: true,
				'customphone':true
			},
			address:
			{
				required: true
			},
			city:
			{
				required: true
			},
			state:
			{
				required: true
			},
			zip: 'zipcode'
			
		}

	});

	$("teacherForm").submit(function() {
      if ($("teacherForm").valid()) {
        return true;
      }
      else {
        return false;
      }
    });
});