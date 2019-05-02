<?php
/**
 * Template part for displaying posts.
 *
 * @package Aberration Lite
 */

?>


<?php if  (esc_attr(get_theme_mod('blog_style','left-featured')) == 'grid-style' ) : ?>
<li class="grid-article col-sm-12 col-md-6 col-lg-4 col-xl-3">
<?php elseif  (esc_attr(get_theme_mod('blog_style','left-featured')) == 'masonry-style' ) : ?>
<div class="box">

<?php else : ?>

<?php endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

	<?php // Check for featured image
    if ( has_post_thumbnail() ) {        
        echo '<a class="featured-image-link" href="' . esc_url( get_permalink() ) . '" aria-hidden="true">';
		
			if  (esc_attr(get_theme_mod('blog_style','left-featured')) == 'grid-style' ) :		
				the_post_thumbnail( 'grid-gallery-thumbnail', array( 'alt' => get_the_title(), 'itemprop' => "image"));		
			elseif  (esc_attr(get_theme_mod('blog_style','left-featured')) == 'masonry-style' ) :		
				the_post_thumbnail( 'masonry-thumbnail', array( 'alt' => get_the_title(), 'itemprop' => "image"));		 
			else :
				the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title(), 'itemprop' => "image"));
			endif;
				
        echo '</a>';
    }
    ?>
   
	<header class="entry-header">
  
		<?php 
        if( is_sticky() && is_home() ) :
			$sticky = esc_html( get_theme_mod( 'sticky_post_label', 'Featured' ) ) ;
			$blogstyle = get_theme_mod( 'blog_style', '' );	
			if ( $blogstyle == 'top-featured-centered' || $blogstyle == 'grid-style' || $blogstyle == 'masonry-style' ) :	
		
				the_title( sprintf( '<span class="featured">' . $sticky . '</span><h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			else :
			  	the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><span class="featured">' . $sticky . '</span><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		 
        else :
			the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		endif; 
		?>    
    

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php aberration_lite_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content" itemprop="text">
    
    
  	<?php if  (esc_attr(get_theme_mod('blog_style','left-featured')) == 'masonry-style' ) : 
	
	        $excerptcontent = esc_attr(get_theme_mod( 'excerpt_content', 'content' ));           
				 switch ($excerptcontent) {
					case "content" :
						the_content( esc_html__( 'Continue', 'aberration-lite') );
					break;
					case "excerpt" : 
						echo '<p>' . the_excerpt() . '</p>' ;
					break;
                }		

	 elseif  (esc_attr(get_theme_mod('blog_style','left-featured')) == 'grid-style' ) : 
	 
	        $excerptcontent = esc_attr(get_theme_mod( 'excerpt_content', 'content' ));           
				 switch ($excerptcontent) {
					case "content" :
						the_content( esc_html__( 'Continue', 'aberration-lite') );
					break;
					case "excerpt" : 
						echo '<p>' . the_excerpt() . '</p>' ;
					break;
                }		
					 
	else : 
	
	        $excerptcontent = esc_attr(get_theme_mod( 'excerpt_content', 'content' ));           
				 switch ($excerptcontent) {
					case "content" :
						the_content( esc_html__( 'Continue', 'aberration-lite') );
					break;
					case "excerpt" : 
						echo '<p>' . the_excerpt() . '</p>' ;
					break;
                }	
    
	endif; ?>
    
    
            <?php   // load our nav is our post is split into multiple pages
            aberration_lite_multipage_nav(); 						
            ?>
           
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //aberration_lite_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->


<?php if  (esc_attr(get_theme_mod('blog_style','left-featured')) == 'grid-style' ) : ?>
</li>
<?php elseif  (esc_attr(get_theme_mod('blog_style','left-featured')) == 'masonry-style' ) : ?>
</div>
<?php else : ?>


<?php endif; ?>