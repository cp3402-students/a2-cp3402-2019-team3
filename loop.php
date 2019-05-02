<?php

/**
 * Various loops for this theme.
 *
 * @package Aberration Lite
 */
 
?>
            

<?php // blog loop
	if ( is_home() ) : 
		 if ( have_posts() ) :
		 
			if ( is_home() && ! is_front_page() ) :		 
				echo '<header><h1 class="page-title screen-reader-text" itemprop="headline">' , single_post_title() , '</h1></header>';	
			endif; 	
				
		 while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', get_post_format() );
		  endwhile;
		  else :
			get_template_part( 'template-parts/content', 'none' ); 
	    endif; 
	
    ?>

<?php elseif (is_archive()) : ?>

		<?php if ( have_posts() ) : 
			 while ( have_posts() ) : the_post(); 
					get_template_part( 'template-parts/content', get_post_format() );
				endwhile; 
				
			else : 
				 get_template_part( 'template-parts/content', 'none' );
		endif; 
	?>
     
<?php elseif (is_search()) : ?>

        <?php if ( have_posts() ) : ?>
          
          <header class="page-header">
            <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'aberration-lite' ), get_search_query() ); ?></h1>
            </header>
          
          <?php
		// Start the loop.
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'search' );
		// End the loop.
		endwhile;
			// Previous/next page navigation.
			aberration_lite_blog_pagination();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>

<?php endif; ?>