<?php 
/* Template Name: Home

*/ 
get_header();?>

<div class="slider-section"> 
 <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  
   <!--*****************START GETTING DATA FROM CUSTOM FIELD BANNER_SLIDER *******************-->
  <ol class="carousel-indicators">
  <?php
						$args = array('post_type' => 'banner_slider');
						$loop = new WP_Query( $args );
						$i=0;
						while ( $loop->have_posts() ) : $loop->the_post();
					?>
  
  <?php
		if($i==0)
		{
		?>
			<li data-target="#carousel-example-generic" data-slide-to="<?php echo $i;?>" class="active"></li>
		<?php
		}
		else
		{
			?>
			<li data-target="#carousel-example-generic" data-slide-to="<?php echo $i;?>"></li>
		<?php
		}
		$i++;
		endwhile;
    ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <?php
						$args = array('post_type' => 'banner_slider');
						$loop = new WP_Query( $args );
						$i=0;
						while ( $loop->have_posts() ) : $loop->the_post();
						if($i==0)
						{	
					?>
							<div class="item active">
  <?php
						}
						else
						{
							
							?>
							<div class="item">
							<?php
						}
						?>
								 <div class="container">
								  <div class="row">
								   <div class="col-xs-12 col-sm-6">
									  <h3><?php the_field('hbd_section_1',4);?></h3>
									  <h2><?php the_field('hbd_section_2',4);?></h2>
									 <p><?php the_field('hbd_section_3',4);?></p> 
										<a class="btn btn-danger btn-shop" href="#">Shop Now</a>
								   </div> <!--col-xs-12 col-sm-6-->
									 
								   <div class="col-xs-12 col-sm-6">
									 <?php the_post_thumbnail('banner-size');?>
								   </div> <!--col-xs-12 col-sm-6-->
								  </div> <!--row Close-->
								 </div> <!--container Close-->  
						</div> <!---item Close--->
						<?php
						$i++;
							endwhile;
						?>
   
   
   </div>
  
  </div>


</div>

<!--*****************END OF GETTING DATA FROM CUSTOM FIELD BANNER_SLIDER*******************-->
</div> <!---slider-section--->


<div class="welcome-section">
  <div class="container">
   <div class="row">
     <div class="col-md-6 welcome-content">
       <h2><?php the_field('home_welcome_section_1',4);?></h2>
       <p><?php the_field('home_welcome_section_2',4);?></p>
       
       
       
     </div>
     <div class="col-md-6 img-section">
	 <?php
      $welcm_image=get_post_meta(4,"home_welcome_section_3",true);
		$thumb = wp_get_attachment_image_src($welcm_image, 'welcome_size' );	
?>
			<img src="<?php echo $url = $thumb['0'];?>">
     </div>  
   </div>
  </div>
</div> <!---welcome-section--->



<div class="gemstone"> 
 <div class="engagemet-section">
  <div class="container">
   <div class="row">
    <div class="col-md-7">
    <h3> <?php the_field('home_engage_ring_sec_1',4);?></h3>
    <?php the_field('home_engage_ring_sec_2',4);?> 
		<?php $tag_id=9?>
  <a href="<?php echo get_tag_link($tag_id); ?>">Read More</a>  
     </div>
    </div>
  </div>
</div> <!---gemstone-section Close--->
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-offset-3">
         <div class="row">
            <div class="col-xs-3">
			<?php
              $jewel_image=get_post_meta(4,"home_gemstone_section_2",true);
		$thumb = wp_get_attachment_image_src($jewel_image, 'jewelery_size' );	
?>

                               <img src="<?php echo $url = $thumb['0'];?>">
            </div>
            <div class="col-xs-9">
              <h3><?php the_field('home_gemstone_section_1',4);?></h3> 
              <p><strong><?php the_field('home_gemstone_section_3',4);?></strong></p>
              <?php $tag_id=14?>
					<a href="<?php echo get_tag_link($tag_id); ?>">Read More</a>  
            </div> <!---col-xs-9--->
         </div>
      </div> <!---col-md-9 Close--->
    </div> <!--row Close-->
  </div>  
</div> <!---gemstone Close--->


<div class="our-earrings">
  <div class="container">
    <div class="row">
      <div class="col-md-5">
	  <?php
           $jewel_image=get_post_meta(4,"home_earring_section_1",true);
		$thumb = wp_get_attachment_image_src($jewel_image, 'earrings_size' );	
?>

                               <img src="<?php echo $url = $thumb['0'];?>">
      </div> <!--col-md-5-->
      <div class="col-md-7">
         <h3><?php the_field('home_earring_section_2',4);?></h3>
         <p><strong><?php the_field('home_earring_section_3',4);?></strong></p>
        <?php $tag_id=12?>
			<a href="<?php echo get_tag_link($tag_id); ?>">Read More</a>  
         
      </div> <!--col-md-5-->
      
    </div> <!--row-->
  </div> <!--container-->
</div> <!---our-earring--->


<!---carousel -section--->
 <div class="thumbnail-carousel">
   <div class="container">
     <h3>Populers products</h3>
    <div class="center text-center">
					<?php
						$args = array('post_type' => 'populer_products');
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();
						?>
         <div class="ring-box">
           <?php the_post_thumbnail('p_product_size');?>
            <h4><?php echo the_title();?></h4>
            <p><?php echo the_content();?></p>
          </div>
          <?php
			endwhile;
		  ?>
           
     </div>
   </div>
 </div> <!---thumbnail-carousel--->
<div class="testimonial-section">
  <div class="container">
   <div id="testimonial-carousel" class="carousel slide" data-ride="carousel">
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  
    <div class="item active">
	<h3> Testimonials</h3>
	<?php
						$args = array('post_type' => 'testimonials',
						'posts_per_page' => 1);
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();
		?>
       
       <?php the_content();?>
       
       <p><strong><?php the_field('posted_by',$loop->ID);?></strong></p>
       
       <a href="<?php echo get_site_url()?>/testimonial" ><button type="button" class="btn btn-danger btn-view">View All</button></a>
       <?php
	   endwhile;
	   ?>
    </div>
  </div>

   </div>
  </div>	
</div> <!--testimonial-section Close-->

<div class="diamond-education">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3><?php the_field('home_diamond_section_1',4);?></h3>
        <p><strong><?php the_field('home_diamond_section_2',4);?></strong></p>
         <br>
         <br>
        <p><?php the_field('home_diamond_section_3',4);?> </p>
        
        <ul class="stones">
          <li><a href="<?php echo site_url();?>/cut">Cut</a></li>
          <li><a href="<?php echo site_url();?>/clarity">Clarity</a></li>
          <li><a href="<?php echo site_url();?>/color-carat">Color Carat</a></li>
          <li><a href="<?php echo site_url();?>/certification">Certification</a></li>
        </ul>
      </div>
       <div class="col-md-6">
          <?php
           $dmnd_image=get_post_meta(4,"home_diamond_section_4",true);
		$thumb = wp_get_attachment_image_src($dmnd_image, 'diamond_size' );	
?>

                               <img src="<?php echo $url = $thumb['0'];?>">
         
       </div>
      
    </div>
  </div>
</div>  <!--diamond-education Close-->
<?php
get_footer();?>