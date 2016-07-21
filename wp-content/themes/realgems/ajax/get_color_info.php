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
	setTimeout(explode, 1000);
	
	if (jQuery(window).width() > 1199) 
	{      
		
		jQuery('li.thumb_image').click(function()
		{
		
			jQuery('.video_box').addClass('video-hide');
			jQuery('#slider').find('.flex-direction-nav').show(); 
			jQuery('#uniq').addClass('hide-slide');
		
		});	
	 } 
	 else 
	 {
		
		jQuery('#video-slider').click(function()
		{
		     jQuery('#video-slider').addClass('current');
		     jQuery('#image-slider').removeClass('current');
			 jQuery('.video_box').show();
			 jQuery('#uniq').hide(); 
			 jQuery('#p-carousel').hide(); 		 
			
		});	
		jQuery('#image-slider').click(function()
		{ 
			 jQuery('#video-slider').removeClass('current');
		     jQuery('#image-slider').addClass('current');
            			 
			 jQuery('#uniq').show(); 
			 jQuery('#p-carousel').show(); 
			 jQuery('.video_box').hide(); 		
			
		});	 
	  }
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
		<div id="slider" class="flexslider abc">
		<ul id="uniq" class="slides">
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
							<span id="col" style="background-color:#e7cc16;"></span>
						<?php	
							break;
						case "18KR":
							//echo "color is red!";
						?>	
							<span id="col" style="background-color:#ea8134;"></span>
						<?php		
							break;	
						default:
							echo "Your favorite color is neither black, yellow, nor red!";
					}
					?>
				
				<?php echo $row->color;?></a></div>
				<!--<a href="javascript:void(0);" onclick="get_color_info(<?php //echo $row->id;?>);"><?php //echo $row->color;?></a>-->
	
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
<button id="video-slider" class="current" type="button">Video</button> <button id="image-slider" type="button">Images</button>