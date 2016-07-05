var links = "http://realgems.stagingdevsite.com/dev/";

/*-------------------Registration form -----------------------*/
jQuery(function($) 
{
	jQuery('#registration').validate
	({	
		rules: 
		{
			name1: {
					required: true,
					number: false
				   },
			email1: {
					required: true,
					email: true,
					},
			phone_number: 
					{
						required: true,	
						number: true,
					},
		},
		
		submitHandler: function(form) {
			 jQuery("#loading").show();
			jQuery("#btn_submit").hide();			
            jQuery("#loading").show();
			jQuery(form).ajaxSubmit({
				type: "POST",
				data: jQuery(form).serialize(),
				url: links+'wp-content/themes/realgems/ajax/register.php', 
				success: function(data) 
				{
					if(data==1)
					{
					    jQuery('#msg_success').show();
						jQuery("#name1").val('');
						jQuery("#email1").val('');
						jQuery("#phone_number").val('');
						jQuery("#message").val('');
						jQuery("#btn_submit").show();
						jQuery("#loading").hide();						
					}
					else
					{
						 jQuery('#msg_error').show();
					}						
				}
			});
		}
	});
});

