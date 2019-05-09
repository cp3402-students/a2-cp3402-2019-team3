<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Coffee_Can
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'the-coffee-can' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<img src="<?php echo get_template_directory_uri(); ?>/images/logo-1-header.png" title="<?php bloginfo('name');?>" alt="<?php echo get_bloginfo( 'description', 'display' );;?>">
           
           
		</div><!-- .site-branding -->
		<div class="site-clock" style="margin-right: 200px;">
		    <div class = "site-clock-icon">
		        <img src="<?php echo get_template_directory_uri();?>/images/clock-icon-header.png">
		    </div>
		    <div class = "site-clock-content" style="width: 480px;">
                <p><?php echo "Monday – Friday 6.30am – 1.30pm, 2.45-4pm" ?></p>
                <p><?php echo "Saturday – Sunday 7am to 1pm" ?></p>		        
		    </div>
		</div> 
       
        <div class="site-contact">
		    <div class = "site-contact-icon">
		        <img src="<?php echo get_template_directory_uri();?>/images/location.png">		        
		    </div>
		    <div class = "site-contact-content" style="width: 440px;">
                <p><?php echo "Address: 1111111111111111111111111" ?></p>
                <p><?php echo "Phone Number: " ?></p>		        
		    </div>
		</div> 
		
		<nav id="site-navigation" class="main-navigation">
		    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <div class="border-menu"></div>
                <div class="border-menu"></div>
                <div class="border-menu"></div>
			    <?php //esc_html_e( 'Primary Menu', 'the-coffee-can' ); ?>
            </button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
