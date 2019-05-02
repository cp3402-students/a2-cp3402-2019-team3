<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Aberration Lite
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
               
                <img class="error-image" src="<?php  echo esc_url(get_theme_mod('error_image', get_template_directory_uri() . '/images/error-image.jpg') ) ; ?>" alt="Error Page Image" />
                <div id="error-overlay">
                
				<header class="page-header">
					<h1 id="error-title"><?php esc_html_e( '404', 'aberration-lite' ); ?></h1>
				</header>                
                <p id="error-message"><?php esc_html_e( 'It appears the page you were wanting to see is no longer available.', 'aberration-lite' ); ?></p>
                <p id="error-button"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html_e( 'Back to Home', 'aberration-lite' ); ?></a></p>
                </div>

			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
