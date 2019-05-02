<?php
/**
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Aberration Lite
 */
 
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'aberration-lite' ); ?></a>

    <header id="masthead" class="site-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
    
           <div id="site-branding-wrapper">
              <div id="site-branding">
                <?php if ( get_theme_mod( 'site_logo')) : ?>               
              		<div class="site-logo" itemscope itemtype="http://schema.org/Organization">
                    	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url">
                        	<img src="<?php echo esc_url( get_theme_mod( 'site_logo') ); ?>"  alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" itemprop="logo">
                        </a>    
                    </div>                
                <?php  endif;  ?>
				          
                 <?php  if( esc_attr(get_theme_mod( 'show_site_title', 1 ) ) ) :  ?>
                    
                        <div class="site-title" itemprop="headline"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
                        
                 <?php endif; ?>
                    
                    <?php  if ( esc_attr(get_theme_mod( 'show_tagline', 1 ) ) ) : ?>
              			<div class="site-description" itemprop="description"><p><?php bloginfo( 'description' ); ?></p></div>
               		<?php endif;  ?>    

            </div><!-- .site-branding --> 			
        	</div><!-- #site-branding-wrapper -->
            
            <nav id="site-navigation" class="main-navigation">
                <div class="toggle-container visible-xs visible-sm hidden-md hidden-lg">
				
					 <?php // if our page has no banner
                    if ( ! is_active_sidebar( 'banner' ) ) :
                            echo '<button class="menu-toggle nobanner">', esc_html_e( 'Menu', 'aberration-lite' ), '</button>';
                        else: // if our page has a banner
                            echo '<button class="menu-toggle">', esc_html_e( 'Menu', 'aberration-lite' ), '</button>';
                        endif;
                    ?>
                </div>
                                
                <?php // if our page has no banner
				if ( ! is_active_sidebar( 'banner' ) ) : 
                    wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu nobanner' ) );	
                    else: // if our page has a banner
                        wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) );
                    endif;
                ?>                            
            </nav><!-- #site-navigation -->
            
    </header>

    <div id="banner-wrapper">
        <?php // if our page has no banner
        if ( ! is_active_sidebar( 'banner' ) ) :
                echo '<div id="no-banner"></div>';
            else: // if our page has a banner
                get_sidebar( 'banner' );
            endif;
        ?>
    </div>



<div id="content" class="site-content clearfix">

<?php get_sidebar( 'breadcrumbs' ); ?>

<?php get_sidebar( 'content-top' ); ?>