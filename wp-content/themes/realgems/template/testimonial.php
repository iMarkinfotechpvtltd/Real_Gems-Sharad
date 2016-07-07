<?php 
/* Template Name: Testimonial

*/ get_header();

?>
<script>
jQuery(document).ready(function()
{
	jQuery('#page_val').val();
	
});


function pagination()
{
   
	var page_val=jQuery('#page_val').val();
	var page_val1=parseInt(page_val)+1;
	var countvalue=jQuery('#count_val').val();;

	jQuery('#loading_sec').show();
	jQuery.ajax({
	type: "GET",
	url:"<?php bloginfo('template_url'); ?>/ajax/ajax.php",
	data:{page_val1:page_val1,count:countvalue,format:'raw'},
	success:function(resp) 
	{
		
		if( resp !="")
		{
			
			// jQuery('#result').empty().append(resp)
			//alert(resp);
			jQuery('#loading_sec').hide();
			jQuery(resp).insertAfter(jQuery('.testimonial-page-section>div:last')).fadeIn('slow');
			jQuery('#page_val').val(page_val1); 
			
		}
		else if( resp =="")
		{
			jQuery(".load-more").hide();
			
		}
	} 
	});
	
}
</script>

<div class="testimonial-pagbanner">
<?php
 $testm_image=get_post_meta(10,"testimonial_banner_section_1",true);
		$thumb = wp_get_attachment_image_src($testm_image, 'testm_size' );	
		
?>
 <img src="<?php echo $url = $thumb['0'];?>">
  <div class="container">
    <h2><?php the_field('testimonial_banner_section_2',10);?></h2>
    <p><p>What our clients say? about us</p><?php //the_field('testimonial_banner_section_2tpt_section_3',10);?></p>
  </div>
</div> <!---product-pagbanner Close--->

<div class="testimonial-page-section">
 <?php
			global $i;
			$args = array('post_type' => 'testimonials','posts_per_page' => 3,'offset'  =>  0);
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
							<?php the_content();?>
				  </div> <!--coment-section Close-->
			</div>  <!--col-xs-12-->
       </div> <!--row-->
     </div> <!--container-->
</div>
	<?php 
	 $i++;
endwhile;wp_reset_query();	
?>
</div> <!---testimonial-page-section--->

	<!--<button type="button" class="btn btn-default btn-view-all">View All</button>-->
	<div class="load-more">
			<div class="load_more wow fadeInUp  animated " data-wow-duration="1000ms" data-wow-delay="300ms">
				<i class="fa fa-plus-circle" aria-hidden="true"></i>
				<input type="hidden" name="page_val" id="page_val" value="1">
				<input type="hidden" name="count" id="count_val" value="<?php echo $i;?>">
				<input type="Submit" value="Load More"  onclick="pagination();" class="btn btn-default btn-view-all">
			</div>
			
			<div id="loading_sec" style="display:none" align="center">
				<img src="<?php echo  get_template_directory_uri(); ?>/images/ajax-loader.gif" id="loader">
			</div>
	</div>

<?php
get_footer();?>