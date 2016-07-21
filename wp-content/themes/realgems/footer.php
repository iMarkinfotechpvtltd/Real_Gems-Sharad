<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

</div> <!--main-content Close-->


<div class="footer-wrap">
<div class="footer"> 
  <div class="container"> 
    <div class="row"> 
      <div class="col-md-7 quiks-links"> 
        <div class="row">
         
          <div class="col-sm-6">
            <h4><?php the_field('quick_nav',4);?></h4>
            <ul>
             <?php 
								$defaults = array(
								'theme_location'  => '',
								'menu'            => 'footer_menu',
								'container'       => '',
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => 'menu',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
								'before'          => '',
								'after'           => '',
								'link_before'     => '',
								'link_after'      => '',
								'items_wrap'      => '%3$s',
								'depth'           => 0,
								'walker'          => ''
								);

								wp_nav_menu( $defaults ); ?>
            </ul>
          </div> <!--col-sm-4-->
          <div class="col-sm-6">
            <h4><?php the_field('questions',4);?></h4>
            <ul>
              <li class="cotact1"><a href="tel:+<?php the_field('header_phone',4);?>"><?php the_field('header_phone',4);?></a></li>
             
              <li class="cotact2"><a href="mailto:<?php the_field('header_mail',4);?>"><?php the_field('header_mail',4);?></a></li>
        
              <li class="cotact3"><?php the_field('query_time_1',4);?> <?php the_field('query_days_1',4);?> <br>
<?php the_field('query_time_2',4);?> <?php the_field('query_days_2',4);?></li>
   
            </ul>
          </div> <!--col-sm-4-->
        </div>  <!--row-->    
      </div>  <!--col-md-7-->
      <div class="col-md-5">
        <div class="row">
         
          <div class="col-sm-12">
             <h4><?php the_field('footer_mailing_section_1',4);?></h4>
             <p><?php the_field('footer_mailing_section_2',4);?></p>
              <?php echo do_shortcode('[mc4wp_form id="238"]'); ?>
          </div>
        </div>     
      </div> <!--col-md-5-->
    </div>  <!--row-->
  </div> 
</div>  <!--footer--->

<div class="copy-right-section">
  <div class="container">
    <p>©<?php echo date("Y"); ?> All Rights Reserved By realgemscorp.com <span>Powered By:<a tittle="Powered By: iMark Infotech" target="_blank" href="http://www.imarkinfotech.com/">iMark <span>I</span>nfotech</a>
</span></p>
  </div>
</div>
</div> <!--footer-wrap-->
<?php wp_footer(); ?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  
   	
    <script src="<?php echo  get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo  get_template_directory_uri(); ?>/js/slick.min.js"></script>
	<script src="<?php echo  get_template_directory_uri(); ?>/js/owl.carousel.min.js"></script>
	<script src="<?php echo  get_template_directory_uri(); ?>/js/jquery.flexslider-min.js"></script>
    <script src="<?php echo  get_template_directory_uri(); ?>/js/my-script.js"></script>
    
	<!--script use for conatct form validation and send mail -->
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.validate.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/form.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/custom_script.js"></script>	
	

	
<!--**************** START JQUERY ADDED BY DEVELOPER AREA ******************-->


<!--************************************ Start Script use for enter Alphabets only in (Name) Text box********************-->
<script type="text/javascript">
jQuery(document).ready(function(){
	 jQuery.noConflict();
    jQuery("input[name='EnterYourName']").keypress(function(event){
        var inputValue = event.which;
        // allow letters and whitespaces only.
        if((inputValue > 33 && inputValue < 64) || (inputValue > 90 && inputValue < 97 ) || (inputValue > 123 && inputValue < 126)
			&& (inputValue != 32)){
            event.preventDefault();
        }
    });
});
</script>

<script type="text/javascript">
jQuery(document).ready(function(){
	 jQuery.noConflict();
    jQuery("input[name='name1']").keypress(function(event){
        var inputValue = event.which;
        // allow letters and whitespaces only.
        if((inputValue > 33 && inputValue < 64) || (inputValue > 90 && inputValue < 97 ) || (inputValue > 123 && inputValue < 126)
			&& (inputValue != 32)){
            event.preventDefault();
        }
    });
});
</script>
<!--************************************ End of Script use for enter Alphabets only in (Name) Text box********************-->


<!-- ************************ Start Script use for enter only number in phone number text box *************************-->

<script type="text/javascript">

jQuery(document).ready(function() {
     jQuery("input[name='MobileNumber']").keydown(function (e) {
		 jQuery.noConflict();
        // Allow: backspace, delete, tab, escape, enter and .
        if (jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40))
			{    
                 return;
			}
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105))
			{
				e.preventDefault();
			}
    });
});

</script>

<script type="text/javascript">

jQuery(document).ready(function() {
     jQuery("input[name='phone_number']").keydown(function (e) {
		 jQuery.noConflict();
        // Allow: backspace, delete, tab, escape, enter and .
        if (jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40))
			{    
                 return;
			}
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105))
			{
				e.preventDefault();
			}
    });
});

</script>


          <!--*********** End of Script use for enter only number in phone number text box *************-->

<!--******************* START SCRIPT EMAIL LENGTH VALIDATION **************************-->		  
<script>
jQuery(document).ready(function()
{
     jQuery("input[name='EMAIL']").attr('maxlength','30');
	 jQuery("input[name='MobileNumber']").attr('maxlength','15');
	 
	 setTimeout(function() {
     jQuery(".mc4wp-response").fadeOut('slow');
	 jQuery("input[name='EMAIL']").val('');
	 
}, 10000); // <-- time in milliseconds

});
</script>		  

<script>

jQuery(document).ready(function(e) 
{
	jQuery('.btn-subcribe').click(function() 
	{
		var sEmail = jQuery("input[name='EMAIL']").val();
		// Checking Empty Fields
		if (jQuery.trim(sEmail).length == 0) 
		{
			//alert('All fields are mandatory');
			e.preventDefault();
		}
		if (validateEmail(sEmail)) 
		{
			//alert('Nice!! your Email is valid, now you can continue..');
		}
		else 
		{
			alert('Invalid Email Address');
			e.preventDefault();
		}
	});
});
// Function that validates email address through a regular expression.
function validateEmail(sEmail) 
{
	var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if (filter.test(sEmail)) 
	{
		return true;
	}
	else 
	{
		return false;
	}
}

</script>
<!--********************** END OF SCRIPT EMAIL LENGTH VALIDATION ***********************-->	

<!--************START SCRIPT USE FOR HIDE ALERT SUCCESS AND DANGER MSG***************-->
<script>

jQuery(".alert-success").alert();
window.setTimeout(function() { jQuery(".alert-success").alert('close'); }, 15000);

jQuery(".alert-danger").alert();
window.setTimeout(function() { jQuery(".alert-success").alert('close'); }, 15000);

</script>
<!--************END OF SCRIPT USE FOR HIDE ALERT SUCCESS AND DANGER MSG***************-->



		  
<!--**************************************** END OF JQUERY ADDED BY DEVELOPER AREA *******************************-->

</body>
</html>
