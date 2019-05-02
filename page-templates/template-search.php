<?php
/**
 * Template Name: Search
 * @package Aberration Lite
*/

get_header(); ?>


    
<div id="primary" class="content-area container">
    <main id="main" class="site-main row">                

                <div class="col-md-12" itemprop="mainContentOfPage">     
					<?php
                    // Start the loop.
                    while ( have_posts() ) : the_post();
                    
                    // Include the page content template.
                    get_template_part( 'template-parts/content', 'page' );
                    
					get_search_form(); 
                    
                    // End the loop.
                    endwhile;
                    ?>  
                </div>       
                                                   
    </main>
</div>


    
<?php get_footer(); ?>    