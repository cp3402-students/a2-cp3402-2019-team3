<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aberration Lite
 */

?>

	<?php get_sidebar( 'content-bottom' ); ?>
	<?php get_sidebar( 'bottom' ); ?>

	</div><!-- #content -->

<a class="back-to-top"><span class="fa fa-angle-up"></span></a>

<footer id="colophon" class="site-footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter">

               
                <?php get_sidebar( 'footer' ); ?>   
 
        
            <?php if ( has_nav_menu( 'social' ) ) :
					echo '<nav class="social-menu">';
						wp_nav_menu( array(
							'theme_location' => 'social', 'depth' => 1, 'container' => false, 'menu_class' => 'social-icons', 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>',
						) );
					echo '</nav>';
            endif; ?>
 
         <nav id="footer-nav">
            <?php wp_nav_menu( array( 
                    'theme_location' => 'footer', 
                    'fallback_cb' => false, 
                    'depth' => 1,
                    'container' => false, 
                    'menu_id' => 'footer-menu', 
                ) ); 
            ?>
        </nav>
               
         <div class="site-info">
          <?php esc_html_e('Copyright &copy;', 'aberration-lite'); ?> 
          <?php echo date('Y'); ?> <?php echo esc_html(get_theme_mod( 'copyright', 'Shaped Pixels' )); ?>.&nbsp;<?php esc_html_e('All rights reserved.', 'aberration-lite'); ?>
        </div>
        
	</footer><!-- #colophon -->
    
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
