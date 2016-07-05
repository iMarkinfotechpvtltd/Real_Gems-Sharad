<?php 
/* Template Name: contact

*/ get_header();

?>
<div class="contact-pagbanner">
<?php
 $contact_image=get_post_meta(12,"contact_banner_img_1",true);
		$thumb = wp_get_attachment_image_src($contact_image, 'contact_banner_img1_size' );	
		
?>
 <img src="<?php echo $url = $thumb['0'];?>">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="contact-form">
          <div class="form-logo">
            <?php
				$contact_image=get_post_meta(12,"contact_banner_img_2",true);
				$thumb = wp_get_attachment_image_src($contact_image, 'contact_banner_img2_size' );	
			?>
				<img src="<?php echo $url = $thumb['0'];?>">
          </div> <!---form-logo--->
		  
          <h3>CONTACT FORM</h3>
		  <?php //echo do_shortcode( '[contact-form-7 id="69" title="Contact form 1"]' ); ?>
           <form id="registration" action="" method="post">
            <div class="group">      
              <input id="name1" name="name1" class="inputMaterial" type="text" >
              <span class="highlight"></span>
              <span class="bar"></span>
              <label class="user-label">Enter Your Name</label>
            </div>
              <div class="group">      
              <input id="phone_number" name="phone_number" class="inputMaterial" type="text" >
                <span class="highlight"></span>
                <span class="bar"></span>
               <label class="user-label">Enter Your Mobile Number</label>
            </div>
            <div class="group">      
              <input id="email1" name="email1" class="inputMaterial" type="email" >
                <span class="highlight"></span>
                <span class="bar"></span>
               <label class="user-label">Enter Your Email</label>
            </div>
            <div class="group">      
              <textarea id="message" name="message" class="inputMaterial" ></textarea>
                <span class="highlight"></span>
                <span class="bar"></span>
               <label class="user-label">Message</label>
            </div>
			
			<div id="loading" style="display:none" align="center">
				<img src="<?php echo  get_template_directory_uri(); ?>/images/ajax-loader.gif" id="loader">
		    </div>
		
            <button id="btn_submit" class="btn btn-default btn-submit" type="submit">Send Message</button>
          </form>
          <div id="msg_success" class="alert alert-success" style="display:none">
				<strong>Success!</strong> Thank you for your message. It has been sent.
		  </div>
		  <div id="msg_error" class="alert alert-danger" style="display:none">
				<strong>Error!</strong> There was an error trying to send your message. Please try again later.
		  </div>
		  
        </div> <!--contact-form-->
      </div> <!---col-md-6--->
      <div class="col-md-6">
        <h2><?php the_field('contact_banner_section_1',12);?></h2>
        <p><?php the_field('contact_banner_section_2',12);?></p>
      </div> <!---col-md-6--->
    </div> <!--row-->
  </div> <!--container-->
</div> <!---product-pagbanner Close--->


<div class="hrs-stuff">
  <div class="container">
    <div class="row"> 
      <div class="col-xs-12 col-md-3">
        <div class="hrs-blocks">
          <span class="calling-icon0"></span>
          <h4><?php the_field('contact_call_section_1',12);?></h4>
          
         <h5><a href="tel:+<?php the_field('header_phone',4);?>"><?php the_field('header_phone',4);?></a></h5>
          <hr> 
         <p><?php the_field('contact_call_section_2',12);?></p> 
        </div> <!---hrs-blocks--->
      </div> <!--col-dm-3-->
      
       <div class="col-xs-12 col-md-3">
        <div class="hrs-blocks">
          <span class="calling-icon1"></span>
          <h4><?php the_field('contact_message',12);?></h4>
          
         <h5><a href="mailto:<?php the_field('header_mail',4);?>"><?php the_field('header_mail',4);?></a></h5>
          <hr> 
        
        </div> <!---hrs-blocks--->
      </div> <!--col-dm-3-->
      
       <div class="col-xs-12 col-md-3">
        <div class="hrs-blocks">
          <span class="calling-icon2"></span>
          <h4><?php the_field('contact_hours',12);?></h4>
          <p><?php the_field('query_days_1',4);?></p>
         <h5> <?php the_field('query_time_1',4);?></h5>
          <hr> 
         <p><?php the_field('query_days_2',4);?></p> 
         <h5><?php the_field('query_time_2',4);?> </h5>
        </div> <!---hrs-blocks--->
      </div> <!--col-dm-3-->
      
       <div class="col-xs-12 col-md-3">
        <div class="hrs-blocks">
          <span class="calling-icon3"></span>
          <h4><?php the_field('contact_on_site',12);?></h4>
          
         <h5><?php the_field('on_site_address',12);?></h5>
          <hr> 
        </div> <!---hrs-blocks--->
      </div> <!--col-dm-3-->
    
    </div> <!--row-->
  </div>
</div> <!---hrs-stuff--->

<?php
get_footer();?>