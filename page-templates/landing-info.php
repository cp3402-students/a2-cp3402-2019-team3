<?php
/**
 * Template Name: Landing - Intro
 * @package Aberration Lite
*/

get_header(); ?>


    
<div id="primary" class="content-area">
    <main id="main" class="site-main" itemprop="mainContentOfPage">                

                <div id="landing-content">     
					<?php  while ( have_posts() ) : the_post(); ?>
                    
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="page-header">
                                <?php the_title( '<h1 class="page-title" itemprop="headline">', '</h1>' ); ?>
                            </header><!-- .entry-header -->
                        
                            <div class="entry-content" itemprop="text">
                                <?php the_content(); ?>	
                            </div>
                        </article>
                    
           			<?php endwhile; ?>  
                </div>       
                                                  
    </main>
</div>

</div><!-- #content -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html> 