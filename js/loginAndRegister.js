


(function ($) {
    "use strict";

    /*==================================================================
    [ Focus Contact2 ]*/
    
	/* on blur required*/
	$(document).on( "blur",".validate-input input", function()
	{
		if(validate(this) == false)
		{
			$(this).parent().parent().removeClass('has-valid').addClass('has-invalid');
		}
		else 
		{
			$(this).parent().parent().removeClass('has-invalid').addClass('has-valid');
		}
	}); 
	
	
	
    /*==================================================================
    [ Validate after type ]*/
    
	/*on blur show required validate or show that true for required input*/
	$(document).on( "blur",".validate-input input", function()
	{
		if(validate(this) == false)
		{
		   showValidate(this);
		}
		else 
		{
			$(this).parent().parent().addClass('true-validate');
		}
	});
	
	/*==================================================================
    [ Validate ]*/
    
	/*on sumbmit*/
	$(document).on( "submit",".validate-form", function(event)
    {
		var input = $(this).find('.validate-input input');
	
        var check = true;
		

        for(var i=0; i<input.length; i++) 
		{
            if(validate(input[i]) == false)
			{
			    showValidate(input[i]);
                check=false;
			}
        }
	
		if(!check)
			event.stopImmediatePropagation(); //to stop other functions have the same defination as i have function with the same defination in the blade that send the form via ajax this code to stop this function
        
		return check;
    });


    /*focus required*/
	$(document).on( "focus",".validate-input input", function()
	{
		hideValidate(this);
        $(this).parent().parent().removeClass('true-validate');
	}); 
	
	

    function validate (input) 
	{
		if($(input).attr('name') == 'username') 
		{
            if($(input).val().trim().match(/^(?=[a-zA-Z0-9._]{3,20}$)(?!.*[_.]{2})[^_.].*[^_.]$/) == null) 
			{
                return false;
            }
        }
		else if($(input).attr('name') == 'password') 
		{
			if($(input).val().trim().length < 8)//password must be at least 8 characters lenght
				return false;	
        }
	    else 
		{
            if($(input).val().trim() == '')
			{
				return false;
            }
        }
    }
	
	
    function showValidate(input) 
	{
        var thisAlert = $(input).parent().parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) 
	{
        var thisAlert = $(input).parent().parent();

        $(thisAlert).removeClass('alert-validate');
    }
	
	
})(jQuery);