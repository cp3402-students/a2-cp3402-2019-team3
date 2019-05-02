<?php
/**
 * The template for displaying quote post formats
 *
 * 
 * @package Aberration Lite
 */
?>


<?php if  (esc_attr(get_theme_mod('blog_style','left-featured')) == 'grid-style' ) : ?>
<li class="grid-article col-sm-12 col-md-6 col-lg-4 col-xl-3">
<?php else : ?>
<?php endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">


	<?php if ( has_post_thumbnail() ) : 
	global $post;
	$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 1140,1000 ), false, '' )
	?>
  		<div class="featured-image" style="background-image: url(<?php echo $src[0]; ?> );"  itemprop="image">
 		<div class="format-quote-overlay">
 	<?php endif; ?>
 
        <div class="quote-wrapper">
            <header class="entry-header">
            
                <?php if ( is_single() ) :
                echo '<h1 class="entry-title" itemprop="headline">';		
                    if(the_title( '', '', false ) !='') the_title(); 
                    else _e('Untitled', 'aberration-lite'); 
                     echo '</h1>';
                else :
                   the_title( '<h2 class="entry-title"  itemprop="headline">', '</h2>' );
                endif; ?>
                
            </header>
            
            <div class="entry-content" itemprop="text">
            <?php the_content(); ?>
            </div>
        
            <footer class="entry-footer"></footer>
        </div>
        
        <?php if ( has_post_thumbnail() ) :
			echo '</div></div>'; 
		endif; ?>
        
	
</article>

<?php if  (esc_attr(get_theme_mod('blog_style','left-featured')) == 'grid-style' ) : ?>
</li>
<?php else : ?>
<?php endif; ?>