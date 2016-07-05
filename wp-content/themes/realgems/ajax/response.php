<?php
include('../../../../wp-config.php');
// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

global $wpdb;

$post_id = $_GET['id'];

$result = $wpdb->get_results("SELECT * FROM  im_product_info  WHERE id ='".$post_id."'",OBJECT);	

?>

			<div  class="flexslider sliderss">
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
		    </div><!--for large images-->
			 <div  class="flexslider sliderthamb">
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
		    </div><!--for thumb images-->
			
				
		

