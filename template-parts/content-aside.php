<?php
/**
 * The template for displaying aside post formats
 *
 * 
 * @package Aberration Lite
 */
?>

<?php if  (esc_attr(get_theme_mod('blog_style','left-featured')) == 'grid-style' ) : ?>
<li class="grid-article col-sm-12 col-md-6 col-lg-4 col-xl-3">
<?php else : ?>
<?php endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
    <div class="aside-wrapper">
        <header class="entry-header">
        
        <?php if ( is_single() ) :
        echo '<h1 class="entry-title" itemprop="headline">';		
        	if(the_title( '', '', false ) !='') the_title(); 
        	else _e('Untitled', 'aberration-lite'); 
       		 echo '</h1>';
        else :
			the_title( '<h2 class="screen-reader-text entry-title"  itemprop="headline">', '</h2>' );
        endif; ?>
        
       		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php aberration_lite_aside_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
        
        </header>
        
        <div class="entry-content clearfix" itemprop="text">
        <?php the_content(); ?>
        </div>
    
    	<footer class="entry-footer"></footer>
    </div>

</article>

<?php if  (esc_attr(get_theme_mod('blog_style','left-featured')) == 'grid-style' ) : ?>
</li>
<?php else : ?>
<?php endif; ?>
