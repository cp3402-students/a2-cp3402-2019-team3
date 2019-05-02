<?php
/**
 * The template for displaying image post formats
 *
 * @package aberration
 */
?>

<?php if  (esc_attr(get_theme_mod('blog_style','left-featured')) == 'grid-style' ) : ?>
<li class="grid-article col-sm-12 col-md-6 col-lg-4 col-xl-3">
<?php else : ?>
<?php endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
  <?php
global $post;
$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 1140,1000 ), false, '' );
?>
  <div class="featured-image" style="background-image: url(<?php echo $src[0]; ?> );"  itemprop="image">
  
    <div class="format-image-overlay">
    
        <header class="entry-header">
		<?php 
        if( is_sticky() && is_home() ) :
			$sticky = esc_html( get_theme_mod( 'sticky_post_label', 'Featured' ) ) ;
			$blogstyle = get_theme_mod( 'blog_style', '' );	
			if ( $blogstyle == 'top-centered-featured' || $blogstyle == 'grid-style' || $blogstyle == 'masonry-style') :	
		
				the_title( sprintf( '<span class="featured">' . $sticky . '</span><h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			else :
			  	the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><span class="featured">' . $sticky . '</span><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		 
        else :
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		endif; 
		?> 
        
        <?php if ( 'post' === get_post_type() ) : ?>
        <div class="entry-meta post-date">
          <?php aberration_lite_posted_on(); ?>
          </div>
        <?php endif; ?>
      </header>
      
      <div class="entry-content" itemprop="text">
        <?php 		  
            echo '<p class="more-link-wrapper"><a class="more-link" href="' . get_permalink() . '" itemprop="url">', esc_attr_e( 'See More', 'aberration-lite') . '</a></p>' ; 
            ?>
      </div>
      
      <?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
	?>
      
      <footer class="entry-footer"></footer>
    </div>
  </div>

</article>

<?php if  (esc_attr(get_theme_mod('blog_style','left-featured')) == 'grid-style' ) : ?>
</li>
<?php else : ?>


<?php endif; ?>