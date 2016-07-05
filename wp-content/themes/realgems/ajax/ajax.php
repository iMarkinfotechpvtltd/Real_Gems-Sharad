<?php
include('../../../../wp-config.php');

$display_count=3;

$offSet=$_GET['page_val1'];

$offSet = ( $offSet - 1 ) * $display_count; 


/*if($offSet==1)
{
	$offSet=0;
}
else
{
	$offSet = ( $offSet - 1 ) * $display_count; 
}*/

query_posts( array (  'post_type' => 'post', 'order'=> 'DESC','posts_per_page'=>$display_count,'offset'=>$offSet) );
			while ( have_posts() ) : the_post(); ?>
			
			  <div class="blog_bx wow fadeInUp  animated" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="blog_date">
             <div class="blog_date_innr">
              <span><?php the_time('d'); ?> <br> <?php the_time('M'); ?></span>
             </div>    
            </div>
            <div class="blog_cntnt">
             <div class="blog_img">
               <a href="#" title=""><?php the_post_thumbnail(); ?></a>     
             </div>  
             <div class="blog_descp">
              <h2><?php the_title(); ?></h2>  
              <ul>
                <li><a href="#" title=""><i class="fa fa-user" aria-hidden="true"></i>By <?php the_author(); ?></a></li> 
                <li><a href="#" title=""><i class="fa fa-calendar" aria-hidden="true"></i><?php the_time('d M Y') ?></a></li> 
                <li><a href="#" title=""><i class="fa fa-comments" aria-hidden="true"></i><?php comments_number(); ?></a></li>
			 </ul>  
              <p><?php the_excerpt(); ?></p>   
              <a href="<?php the_permalink(); ?>" title="" class="read_more">Read More</a>   
             </div>   
            </div>   
          </div><!--blog_bx end-->
			<?php endwhile;wp_reset_query(); ?>
