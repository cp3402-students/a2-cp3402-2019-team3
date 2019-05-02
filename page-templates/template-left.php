<?php
/**
 * Template Name: Left Column
 * @package Aberration Lite
*/

get_header(); ?>


    
 <div id="primary" class="content-area container">
    <main id="main" class="site-main row">
 
                  <div class="col-md-8 col-md-push-4" itemprop="mainContentOfPage">        
                    <?php
						// Start the loop.
						while ( have_posts() ) : the_post();
						
						// Include the page content template.
						get_template_part( 'template-parts/content', 'page' );
						
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						
						// End the loop.
						endwhile;
						?>           
                  </div>
            
            	<div class="col-md-4 col-md-pull-8">        
              	<?php get_sidebar( 'left' ); ?>       
              	</div>
              
        
    </main>
</div>   
    
  
<?php get_footer(); ?>    