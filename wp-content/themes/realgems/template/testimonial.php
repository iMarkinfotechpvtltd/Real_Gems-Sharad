<?php 
/* Template Name: Testimonial

*/ get_header();

?>
<div class="testimonial-pagbanner">
<?php
 $testm_image=get_post_meta(10,"testimonial_banner_section_1",true);
		$thumb = wp_get_attachment_image_src($testm_image, 'testm_size' );	
		
?>
 <img src="<?php echo $url = $thumb['0'];?>">
  <div class="container">
    <h2><?php the_field('testimonial_banner_section_2',10);?></h2>
    <p><?php the_field('testimonial_banner_section_2tpt_section_3',10);?></p>
  </div>
</div> <!---product-pagbanner Close--->


<div class="testimonial-page-section">
 <?php
						$args = array('post_type' => 'testimonials');
						$loop = new WP_Query( $args );
						$i=2;
						while ( $loop->have_posts() ) : $loop->the_post();
					?>
		<?php
		if($i%2==0)
		{
			?>
	<div class="white-row">
		<?php
		}
		else
		{
		?> 
  <div class="grey-row"> 
	<?php
		}
		?>
		
    <div class="container">
      <div class="row">    
         <div class="col-xs-12">
      <div class="img-squre">
        <?php the_post_thumbnail();?>
      </div> <!--img-squr close-->
      
      <div class="coment-section">
       <h4><?php the_field('posted_by',$loop->ID);?></h4>
       <p><span class="quotes-up"></span><?php the_content();?><span class="quotes-down"></span></p>
      </div> <!--coment-section Close-->
      
    </div>  <!--col-xs-12-->
       </div> <!--row-->
     </div> <!--container-->
	</div>
	
	<?php
	$i++;
	endwhile;
	?>
	<button type="button" class="btn btn-default btn-view-all">View All</button>
	</div> <!--white-row-->   
    
 </div> <!---testimonial-page-section--->




<?php
get_footer();?>