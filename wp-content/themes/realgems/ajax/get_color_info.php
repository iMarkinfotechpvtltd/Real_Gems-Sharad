<?php
include('../../../../wp-config.php');

$id=$_POST['id']; 
$post_id=$_POST['post_id'];


$result = $wpdb->get_results("SELECT * FROM  im_product_info  WHERE id ='".$id."'",OBJECT);
$color = $wpdb->get_results("SELECT * FROM  im_product_info  WHERE post_id ='".$post_id."'",OBJECT);	
 
?>
<script>
jQuery(document).ready(function()
{
	jQuery('.slides:first').hide();

	jQuery('.thumb_image').click(function()
	{
		jQuery('.video_box').hide();
		jQuery('.slides:first').show(); 
	});	 
	
}); 

jQuery(document).ready(function()
{
    jQuery('#p-carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth:80,
        itemMargin:10,
        asNavFor: '#slider'
      });

jQuery('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#p-carousel",
        start: function(slider){
          jQuery('body').removeClass('loading');
        }
      });
 
}); 
</script>


<div class="video_box"><!--Div for video-->	
	<?php 
	foreach($result as $row) 
	{
	?>		
		<video id="videoplayer" controls="" width="600" height="600" loop="" autoplay="" style="border-radius: 12px">
			<source src="<?php echo $row->video;?>" type="video/mp4">
		</video>
	<?php
	}
	?>
</div><!--end of video div-->
<div class="slider">  
	<div id="slider" class="sliderss flexslider ">
		<ul class="slides">
					<?php 
					foreach($result as $row) 
					{
						$gal=$row->gallery;
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
					}
					?>
		</ul>
	</div><!--End div of large images-->
	<div class="color_sel"><!--div for color selection-->
		<?php
		
			foreach($color as $row) 
			{
		?>
				<a href="javascript:void(0);" onclick="get_color_info(<?php echo $row->id;?>);"><?php echo $row->color;?></a>
	
		<?php 
				
			}
		?>					
	</div><!--End div of color selection-->	
	 <div id="p-carousel"  class="flexslider sliderthamb">
		<ul class="slides">
				<?php
					foreach($result as $row) 
					{
						$gal=$row->gallery;
						$arr1=get_numerics($gal);
			        ?>
						<?php
						foreach($arr1 as $val) 
						{
							$small_image_url1 = wp_get_attachment_image_src($val, 'p_product_size');		
						?>
						<li class="thumb_image">
							<img src="<?php echo $small_image_url1[0]; ?>" />
						</li>
						<?php
						}		
					}
					?>
		</ul>
	</div><!--End of thumbnail div--> 
</div><!--End of main slider div-->  
