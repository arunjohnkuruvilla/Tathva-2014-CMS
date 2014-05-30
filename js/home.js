$(function()
	{
		var s=0;
		var a=0;
		$("#showmark").hide();
		$("#addmark").hide();
		$("#addmarkcontainer").click(function()
			{
				if (a)
				{
					$("#addmark").slideUp();
					a=0;
				}
				else	
				{
					$("#addmark").slideDown();
					a=1;
				}
			});
		$("#showmarkcontainer").click(function()
			{
				if (s)
				{
					$("#showmark").slideUp();
					s=0;					
				}
				else	
				{
					$("#showmark").slideDown();
					s=1;
				}
			});
	});