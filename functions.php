<?php
/**
 * Aberration Lite functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Aberration Lite
 */

if ( ! function_exists( 'aberration_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function aberration_lite_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Aberration Lite, use a find and replace
	 * to change 'aberration-lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'aberration-lite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
	 * @see http://codex.wordpress.org/Function_Reference/add_editor_style
	 */
	add_editor_style( array( 'css/editor-style.css', aberration_lite_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );	
		
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */ 
    add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1140, 9999 );
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'aberration-lite' ),
		'footer' => esc_html__( 'Footer Menu', 'aberration-lite' ),
		'social' => esc_html__( 'Social Menu', 'aberration-lite' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'quote',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'aberration_lite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // aberration_lite_setup
add_action( 'after_setup_theme', 'aberration_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 * @global int $content_width
 */
function aberration_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'aberration_lite_content_width', 1100 );
}
add_action( 'after_setup_theme', 'aberration_lite_content_width', 0 );


/**
 * Register Google fonts.
 * @return string Google fonts URL for the theme.
 */

if ( ! function_exists( 'aberration_lite_fonts_url' ) ) :
function aberration_lite_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
		if( esc_attr(get_theme_mod( 'load_cyrillic_subset', 0 ) ) ) : 
			$subsets   = 'cyrillic,cyrillic-ext';
		else: 
			$subsets   = 'latin,latin-ext';
		endif;
		
	// Translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. 
	if ( 'off' !== esc_html_x( 'on', 'Open Sans font: on or off', 'aberration-lite' ) ) {
		$fonts[] = 'Open Sans:400,600,700';
	}
		
	// Translators: If there are characters in your language that are not supported by Bad Script, translate this to 'off'. Do not translate into your own language. 
	if ( 'off' !== esc_html_x( 'on', 'Bad Script font: on or off', 'aberration-lite' ) ) {
		$fonts[] = 'Bad Script:400';
	}	

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;


/**
 * Enqueue scripts and styles.
 */
function aberration_lite_scripts() {
	
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'aberration-fonts', aberration_lite_fonts_url(), array(), null );	
	
	
	// Add Font Awesome Icons. Unminified version included.
	if( esc_attr(get_theme_mod( 'load_fontawesome', 1 ) ) ) : 
		wp_enqueue_style('fontAwesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.4.0' );
	endif;	

	// Load our responsive stylesheet based on Bootstrap. Unminified version included.
	if( esc_attr(get_theme_mod( 'load_bootstrap', 1 ) ) ) : 
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/grid.min.css', array( ), '3.3.5' );
	endif;
	
	// Load our theme stylesheet.	
	wp_enqueue_style( 'aberration-style', get_stylesheet_uri() );

	// Load our scripts.
	wp_enqueue_script( 'aberration-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '2015', true );
	wp_enqueue_script( 'aberration-functions', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '2015', true );
	wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aberration_lite_scripts' );


/**
 * Lets add more functions to our theme.
 * Any additional function files you have should be added below
 * so they load in your site in an organized methology.
 */

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Custom functions that act independently of the theme templates.
require get_template_directory() . '/inc/extras.php';

// Customizer additions.
require get_template_directory() . '/inc/customizer.php';

// Load Jetpack compatibility file.
require get_template_directory() . '/inc/jetpack.php';

// Load our sidebars.
require get_template_directory() . '/inc/sidebars.php';

//Load our inline styles.
require get_template_directory() . '/inc/inline-styles.php';

/* aberration pro upsell */

require get_template_directory(). '/inc/customizer-extras/class-customize.php';


// display custom admin notice
function aberration_custom_admin_notice() {
	$mor_th_info = wp_get_theme(); 
	$currentversion = str_replace('.','',(esc_html( $mor_th_info->get('Version') )));
	$isitdismissed = 'aberration_notice_dismissed'.$currentversion;
	if ( !get_user_meta( get_current_user_id() , $isitdismissed ) ) { ?>
	<div class="notice notice-success is-dismissible aberration_notice" data-dismissible="disable-done-notice-forever">
		<div>
			<p>	
			<?php _e('Thank you for using the free version of ','aberration-lite'); ?>
			<?php echo esc_html( $mor_th_info->get('Name') );?> - 
			<?php echo esc_html( $mor_th_info->get('Version') );
			 ?>
			<?php _e('theme. Want more features? Check out the', 'aberration-lite'); ?>
			<a href="<?php echo esc_url( 'https://www.shapedpixels.com/themes/aberration/?utm_source=FreeThemes&utm_medium=UpdateMsg&utm_campaign=Aberration');?>" target="_blank" aria-label="Dismiss the welcome panel">
				<strong><?php _e('PRO version','aberration-lite');?></strong>
			</a>
			<?php _e('for more options and professional support!', 'aberration-lite'); ?>
			<a href="?aberration-notice-dismissed<?php echo $currentversion;?>">Dismiss this message</a>
			</p>
		</div>
		
	</div>
	
<?php
	}
 }
add_action('admin_notices', 'aberration_custom_admin_notice');

function aberration_notice_dismissed() {
	$mor_th_info = wp_get_theme(); 
	$currentversion = str_replace('.','',(esc_html( $mor_th_info->get('Version') )));
	$dismissurl = 'aberration_notice_dismissed'.$currentversion;
	$isitdismissed = 'aberration_notice_dismissed'.$currentversion;
    $user_id = get_current_user_id();
    if ( isset( $_GET[$dismissurl] ) )
        add_user_meta( $user_id, $isitdismissed, 'true', true );
}
add_action( 'admin_init', 'aberration_notice_dismissed' );
