<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<?php wp_head(); ?></head>
 <!-- Bootstrap -->
     <link type="image/x-icon" href="<?php echo  get_template_directory_uri(); ?>/images/fav.png" rel="icon">
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
   
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	


<body>

<div class="top-navigation">
 <div class="container">
 
 <div class="row">
 
   <div class="col-md-5 serives-numbers">
          <ul>  
            <li class="call-number"><a href="tel:+<?php the_field('header_phone',4);?>"><?php the_field('header_phone',4);?></a></li>
            <li class="mail-service"><a href="mailto:<?php the_field('header_mail',4);?>"><?php the_field('header_mail',4);?></a></li>
          </ul>
    </div> <!---col-sm-4 col-md-3--->
 
  <div class="col-md-7 text-right">
 
     <ul>
          <?php 
								$defaults = array(
								'theme_location'  => '',
								'menu'            => 'header_menu',
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
    
     </div>
   </div>
 </div>
</div> <!--top-navigation Close-->

<div class="cart-nav-section">
  <div class="container">
    <div class="row">
     
      <div class="col-md-12 text-center">
         <a class="logo" href="<?php echo site_url();?>">          
		 <?php
           $site_image=get_post_meta(4,"site_logo",true);
		$thumb = wp_get_attachment_image_src($site_image, 'site_logo_size' );	
?>

                               <img src="<?php echo $url = $thumb['0'];?>"></a> 
      </div> <!---col-sm-4 col-md-3--->
      
     
    </div>  <!--row-->
    
  </div>
</div> <!--cart-navi-section-->

<div class="navigation">
    <button class="btn btn-default btn-triger" type="button">
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
    </button>
  <div class="container">
  
 
    <ul class="main_menu">
	<!--start -->
	<?php

								$defaults = array(
								'theme_location'  => '',
								'menu'            => 'product_menu',
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

								wp_nav_menu( $defaults );
	?>

    </ul>
  </div>
  
</div> <!---navigation close--->

<div class="main-content">