<?php
/**
 * The template for displaying all pages, single posts and attachments.
 * This is a new template file that WordPress introduced in
 * version 4.3. Note that it uses conditional logic to display
 * different content based on the post type.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aberration Lite
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

                <div class="container">
                        <div class="row">
 
			<?php 
			// Load this for the default page template
				if ( is_singular( 'page' ) ) {
					
				echo '<div class="col-md-8" itemprop="mainContentOfPage">';	
					while ( have_posts() ) : the_post();	
						get_template_part( 'template-parts/content', 'page' );
						if ( comments_open() || get_comments_number() ) : comments_template(); endif;
					endwhile;
				echo '</div><div class="col-md-4">';
						get_sidebar( 'right' );	
				echo '</div>';	
									
				} else { 
								
				if ( esc_attr(get_theme_mod('single_layout','right-column')) == 'left-column' ) :
					echo '<div class="col-md-8 col-md-push-4 ' . esc_attr(get_theme_mod( 'single_layout', 'right-column' )) . '">';	
				elseif ( esc_attr(get_theme_mod('single_layout','right-column')) == 'full-width' ) :
					echo '<div class="col-md-12" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">';
				else :
					echo '<div class="col-md-8  ' . esc_attr(get_theme_mod( 'single_layout', 'right-column' )) . '" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">	';
				endif;
				
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'single' );
					
					
						// show the comments form unless it is the quote post format
						if ( !has_post_format( 'quote' ) && comments_open() || get_comments_number() ) : comments_template();  endif;
					
					
				endwhile;	
					echo '</div>';
					
				if ( esc_attr(get_theme_mod('single_layout','right-column')) == 'left-column' ) : 
					echo '<div class="col-md-4 col-md-pull-8" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">';
						get_sidebar( 'left' );	
					echo '</div></div>';
				endif;	
				
				if ( esc_attr(get_theme_mod('single_layout','right-column')) == 'right-column' ) :
					echo '<div class="col-md-4">';
						get_sidebar( 'right' );	
					echo '</div></div>';
				endif;	
					
				}
			
 			 ?>

                        </div>
                </div>
        
        </main><!-- #main -->
</div><!-- #primary --> 


<?php get_footer(); ?>
