<?php
get_header(); 
global $post;

?>
<style>
.Formsubject {
    display: none;
}
</style>
<script>
jQuery(document).ready(function() {
	
	  
	  setTimeout(explode, 1000);
	  
      jQuery('.slides:first').hide();
      
	  
	jQuery('.thumb_image').click(function()
	{
		jQuery('.video_box').hide();
		jQuery('#slider').find('.flex-direction-nav').show(); 
		jQuery('.slides:first').show();
		
			
			
	});	 
	
	var product_name=jQuery('#post_title').val();
	jQuery('.btn-send').click(function()
	{
		jQuery("input[name='Formsubject']").val(product_name);
	});	 
    	
});

function explode()
{
	jQuery('#slider').find('.flex-direction-nav').hide();
}

function get_color_info(id)
{
	var loader='<div id="loader" class="overlay-loader"><img src="<?php echo  get_template_directory_uri(); ?>/images/loader.gif" ></div>';
	var post_id=jQuery('#post_id').val();  
	jQuery('.slider_result').empty().append(loader);
	jQuery.ajax({
		type: "POST",
		url:"<?php bloginfo('template_url'); ?>/ajax/get_color_info.php",
		data:{id:id,post_id:post_id,format:'raw'}, 
		success:function(resp){
			if( resp !="")
			{ 
				jQuery('.slider_result').empty().append(resp);
			} 
			
		}
    });
	
}
</script> 

<!-------------------------START HERE---------------------------------->
<input type="hidden" id="post_id" value="<?php echo $post->ID;?>" />
<input type="hidden" id="post_title" value="<?php echo $post->post_title;?>" />
 <div class="product-description">
   <div class="container">
     <div class="breadcrumb">
      
			<?php woocommerce_breadcrumb(); ?>
        
    
    </div> <!-----breadcrumb Close------>
<?php 
	 global $wpdb;
		
	 $result = $wpdb->get_results("SELECT * FROM  im_product_info  WHERE post_id ='".$post->ID."'",OBJECT);	
				 
?>
   <div class="row">
      <div class="col-xs-12 col-md-6">
	      <div class="slider_result">
		    <div class="video_box">     
				<video id="videoplayer" controls="" width="600" height="600" loop="" autoplay="" style="border-radius: 12px"><source src="<?php echo $result[0]->video;?>" type="video/mp4"></video>
			</div>	
			  <div class="slider">
		   
				<div id="slider" class="flexslider abc">
						
						<ul class="slides">
						<?php 
								$gal=$result[0]->gallery;
								$arr1=get_numerics($gal);
							?>
								<?php
								foreach($arr1 as $val) 
								{
									$small_image_url1 = wp_get_attachment_image_src($val, 'full');		
								?>
								<li>
									<img src="<?php echo $small_image_url1[0]; ?>" />
								</li>
								<?php
								}		 
							?>
						</ul>
					
				</div><!--for large images-->
				
				<div class="color_sel"><!--div for color selection-->
					<?php
					foreach($result as $row) 
					{
						
					?>
					<div class="color_block"><a href="javascript:void(0);" onclick="get_color_info(<?php echo $row->id;?>);">
					<?php
					
					$color = $row->color;
					switch ($color) {
						case "14KW":
							//echo "color is black!";
						?>
							<span id="col" style="background-color:#9d9d9d;"></span>
						<?php 	
							break;
						case "14KY":
							//echo "color is yellow!";
						?>
							<span id="col" style="background-color:#e7cc16;"></span>
						<?php 	
							break;
						case "14KR":
							//echo "color is red!";
						?>
							<span id="col" style="background-color:#ea8134;"></span>
						<?php	
							break;
						case "18KW":
							//echo "color is black!";
							?>
							<span id="col" style="background-color:#9d9d9d;"></span>
						<?php 	
							break;
						case "18KY":
							//echo "color is yellow!";
							?>
							<span id="col" style="background-color:yellow;"></span>
						<?php	
							break;
						case "18KR":
							//echo "color is red!";
						?>	
							<span id="col" style="background-color:red;"></span>
						<?php		
							break;	
						default:
							echo "Your favorite color is neither black, yellow, nor red!";
					}
					?>
					
					<?php echo $row->color;?></a></div>
				
					<?php 
						    
					}
					?>					
				</div><!--End div of color selection-->	
			
				 <div id="p-carousel"  class="flexslider sliderthamb">
				 
					 <ul class="slides">
					<?php
							$gal=$result[0]->gallery;
							$arr1=get_numerics($gal);
						?>
							<?php
							foreach($arr1 as $val) 
							{
								$small_image_url1 = wp_get_attachment_image_src($val, 'full');		
							?>
							<li class="thumb_image">
								<img src="<?php echo $small_image_url1[0]; ?>" />
							</li>
							<?php
							}		
						?>
					</ul>
				</div><!--for thumb images-->
			</div><!--slider-->
		</div><!--slider result-->
		
	
       </div> <!--col-xs-12 col-md-6-->
       <div class="col-xs-12 col-md-6 product-describe">
         <h3>Shimmer Shower Ring-S6</h3>
         <p><?php echo $post->post_title;?></p>
       
         <p><?php echo $post->post_content;?></p>
         
         <table class="table-compar">
           <tr>
              <td>Surface Finish:</td>
              <td><?php the_field('surface_finish',$post->ID);?></td>
           </tr>
           
           <tr>
              <td>Design:</td>
              <td><?php the_field('design',$post->ID);?></td>
           </tr>
           <tr>
              <td>Theme:</td>
              <td><?php the_field('theme',$post->ID);?></td>
           </tr>
           
           <tr>
              <td>Colour:</td>
              <td><?php the_field('colour',$post->ID);?></td>
           </tr>
           
           <tr>
              <td>Gross Weight:</td>
              <td><?php the_field('gross_weight',$post->ID);?></td>
           </tr>
           
         </table>
         
         <div class="price-include">
           <p>Does not include center stone</p>
           <h4>Price:<sub>$</sub><?php echo get_post_meta( get_the_ID(), '_regular_price', true);?></h4>
         </div> <!--price-include-->
   
         <div class="grt-in-touch">
           <h4>GET IN TOUCH</h4>
           
           <div class="row">  
				<?php echo do_shortcode('[contact-form-7 id="230" title="Single Product form"]'); ?>
		   </div>
         </div> <!--form-section Close-->
       </div>  <!--col-xs-12 col-md-6-->
     </div> <!--row Close-->
   </div>
 </div>
 
 <div class="similar-products">
   <div class="container">
    <h3>Similar products in Trend</h3>
     <div class="owl-carousel">

<!--************ START GETTING POPULAR PRODUCT FROM CATEGORY POST ******************-->
	 
<?php
if ( is_singular('product') ) 
{

  // get categories
  $terms = wp_get_post_terms( $post->ID, 'product_cat' );
  
	foreach ( $terms as $term ) 
		$cats_array[] = $term->term_id;
		$query_args = array( 'post__not_in' => array( $post->ID ), 'posts_per_page' => -1, 'no_found_rows' => 1, 'post_status' => 'publish', 'post_type' => 'product', 'tax_query' => array( 
		array(
		'taxonomy' => 'product_cat',
		'field' => 'id',
		'terms' => $cats_array
    )));
  $r = new WP_Query($query_args);
		
  if ($r->have_posts()) {
    ?>
    
      <?php while ($r->have_posts()) : $r->the_post(); global $product; ?>
	  <div class="similar-product">
        <a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">
    	<?php if (has_post_thumbnail()) the_post_thumbnail('similar_product_size'); else echo '<img src="'. woocommerce_placeholder_img_src() .'" alt="Placeholder" width="'.$woocommerce->get_image_size('similar_product_size').'" height="'.$woocommerce->get_image_size('shop_thumbnail_image_height').'" />'; ?>
    	<?php //if ( get_the_title() ) the_title(); else the_ID(); ?>
        </a> <p>$<?php echo $sale = get_post_meta( get_the_ID(), '_sale_price', true);?></p>
		</div> <!---similar-product--->
      <?php endwhile; ?>
   
    <?php
    // Reset the global $the_post as this query will have stomped on it
    wp_reset_query();
  }
}
?>
<!--************ END OF GETTING POPULAR PRODUCT FROM CATEGORY POST ******************-->		 
     </div>
   </div>
 </div> <!--similar-products-->
<!-------------------------END HERE---------------------------------->


<?php get_footer(); ?>
