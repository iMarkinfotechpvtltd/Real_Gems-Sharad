<?php
include('../../../../wp-config.php');

$display_count=3;

$offSet=$_GET['page_val1'];
$counter=$_GET['count'];

$offSet = ( $offSet - 1 ) * $display_count; 

?>

<?php
	$args = array (  'post_type' => 'testimonials', 'order'=> 'DESC','posts_per_page'=>$display_count,'offset'=>$offSet);
			$loop = new WP_Query( $args );
			$i=$counter;
			while ( $loop->have_posts() ) : $loop->the_post();

			  
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
echo '1';
?>
	
	
		
