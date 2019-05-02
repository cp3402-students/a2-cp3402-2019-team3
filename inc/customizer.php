<?php
/**
 * Aberration Lite Theme Customizer.
 * @package Aberration Lite
 */

 
 
// function aberration_lite_customizer_registers() {
	
// 	wp_enqueue_script( 'aberration_lite_customizer_script', get_template_directory_uri() . '/js/aberration_lite_customizer.js', array("jquery"), '1.0', true  );
// 	wp_localize_script( 'aberration_lite_customizer_script', 'aberrationliteCustomizerObject', array(
// 		'setup' => __( 'Setup Tutorials', 'aberration-lite' ),
// 		'support' => __( 'Theme Support', 'aberration-lite' ),
// 		'review' => __( 'Please Rate Aberration Lite', 'aberration-lite' ),		
// 		'pro' => __( 'Get the Pro Version', 'aberration-lite' ),
// 	) );
// }
// add_action( 'customize_controls_enqueue_scripts', 'aberration_lite_customizer_registers' );
 
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aberration_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	// lets remove the default background color setting to move it in the Background Image section
	$wp_customize->remove_control('background_color');	
	
	
// Begin theme options

	// Setting group to show the site title  
  	$wp_customize->add_setting( 'show_site_title',  array(
		'default' => 1,
		'sanitize_callback' => 'aberration_lite_sanitize_checkbox'
   	 ) );  
 	 $wp_customize->add_control( 'show_site_title', array(
		'type'     => 'checkbox',
		'priority' => 1,
		'label'    => esc_html__( 'Show Site Title', 'aberration-lite' ),
		'section'  => 'title_tagline',
 	 ) );

	// Setting group to show the tagline  
	 $wp_customize->add_setting( 'show_tagline', array(
		'default' => 1,
		'sanitize_callback' => 'aberration_lite_sanitize_checkbox'
	  ) );  
	$wp_customize->add_control( 'show_tagline', array(
		'type'     => 'checkbox',
		'priority' => 2,
		'label'    => esc_html__( 'Show Tagline', 'aberration-lite' ),
		'section'  => 'title_tagline',
	) );
	 
	$wp_customize->add_setting( 'site_logo', array( 
	'default' => '',	
	'sanitize_callback' => 'esc_url_raw',
	) );	
		
	$wp_customize->add_control( new WP_Customize_Image_Control( 	$wp_customize,	'site_logo',	array(
		'settings'		=> 'site_logo',
		'section'		=> 'title_tagline',
		'label'    => esc_html__('Your Logo', 'aberration-lite'),
		'description'	=> __( 'Select the image to be used for the site logo.', 'aberration-lite' ),
		'priority' => 3,
	) ) );
	
	// Setting group to adjust logo padding  
	 $wp_customize->add_setting( 'logo_padding', array(
		'default' => 0,
		'sanitize_callback' => 'aberration_lite_sanitize_checkbox'
	  ) );  
	$wp_customize->add_control( 'logo_padding', array(
		'type'     => 'checkbox',
		'priority' => 4,
		'label'    => esc_html__( 'Logo Box Spacing', 'aberration-lite' ),
		'description' => esc_html__( 'When using just a logo, you can remove the outer padding to fill the full box with your logo, which gives you 100px height', 'aberration-lite' ),
		'section'  => 'title_tagline',
	) );

	
/*
 * Create a new customizer section
 * Name: Site Options
 */    
	$wp_customize->add_section( 'site_options', array(
		'title' => esc_html__( 'Site Options', 'aberration-lite' ),
		'priority'       => 30,
	) ); 

	// Setting group to 
	 $wp_customize->add_setting( 'page_padding', array(
		'default' => 0,
		'sanitize_callback' => 'aberration_lite_sanitize_checkbox'
	  ) );  
	$wp_customize->add_control( 'page_padding', array(
		'type'     => 'checkbox',
		'priority' => 1,
		'label'    => esc_html__( 'Page Left &amp; Right Padding', 'aberration-lite' ),
		'description' => esc_html__( 'Remove the padding on the left and right sides of the page.', 'aberration-lite' ),
		'section'  => 'site_options',
	) );
	
	// Setting group to enable font awesome 
	$wp_customize->add_setting( 'load_fontawesome',	array(
		'default' => 1,
		'sanitize_callback' => 'aberration_lite_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'load_fontawesome', array(
		'type'     => 'checkbox',
		'priority' => 5,
		'label'    => esc_html__( 'Load Font Awesome', 'aberration-lite' ),
		'description' => esc_html__( 'Load Font Awesome if not you are not using a plugin for it.', 'aberration-lite' ),
		'section'  => 'site_options',
	) );

	// Setting group to enable bootstrap
	$wp_customize->add_setting( 'load_bootstrap',	array(
		'default' => 1,
		'sanitize_callback' => 'aberration_lite_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'load_bootstrap', array(
		'type'     => 'checkbox',
		'priority' => 6,
		'label'    => esc_html__( 'Load Bootstrap CSS', 'aberration-lite' ),
		'description' => esc_html__( 'Load the Bootstrap grid layout and some limited CSS elements if nothing else is loading it for you.', 'aberration-lite' ),
		'section'  => 'site_options',
	) );


 // Setting group to show the edit links 
  $wp_customize->add_setting( 'show_edit',  array(
      'default' => 0,
      'sanitize_callback' => 'aberration_lite_sanitize_checkbox',
    ) );  
  $wp_customize->add_control( 'show_edit', array(
    'type'     => 'checkbox',
    'priority' => 7,
    'label'    => esc_html__( 'Show Edit Link', 'aberration-lite' ),
	'description' => esc_html__( 'Show the Edit Link on posts and pages.', 'aberration-lite' ),
    'section'  => 'site_options',
  ) );


// Setting group for a Copyright
$wp_customize->add_setting( 'copyright', array(
	'default'        => esc_html__( 'Your Name', 'aberration-lite' ),
	'sanitize_callback' => 'aberration_lite_sanitize_text',
) );
$wp_customize->add_control( 'copyright', array(
	'settings' => 'copyright',
	'label'    => esc_html__( 'Your Copyright Name', 'aberration-lite' ),
	'section'  => 'site_options',		
	'type'     => 'text',
	'priority' => 10,
) );


/*
 * Create a new customizer section
 * Name: Blog Options
 */    
	$wp_customize->add_section( 'blog_options', array(
		'title' => esc_html__( 'Blog Options', 'aberration-lite' ),
		'priority'       => 35,
	) ); 


// Setting group for blog layout  
$wp_customize->add_setting( 'blog_style', array(
	'default' => 'top-featured-right',
	'sanitize_callback' => 'aberration_lite_sanitize_blogstyle',
) );  
$wp_customize->add_control( 'blog_style', array(
	  'type' => 'radio',
	  'label' => esc_html__( 'Blog Style', 'aberration-lite' ),
	  'section' => 'blog_options',
	  'priority' => 1,
	  'choices' => array(
			'top-featured-centered' => esc_html__( 'Top Featured Image Centered', 'aberration-lite' ),
			'top-featured-left' => esc_html__( 'Top Featured Image Left Sidebar', 'aberration-lite' ),
			'top-featured-right' => esc_html__( 'Top Featured Image Right Sidebar', 'aberration-lite' ),
			'top-left-right-featured' => esc_html__( 'Top Featured Image Left &amp; Right Sidebar', 'aberration-lite' ),
	) ) );

// Setting group for Single layout  
	$wp_customize->add_setting( 'single_layout', array(
		'default' => 'right-column',
		'sanitize_callback' => 'aberration_lite_sanitize_singlestyle',
	) );  
	$wp_customize->add_control( 'single_layout', array(
		  'type' => 'radio',
		  'label' => esc_html__( 'Single Style', 'aberration-lite' ),
		  'section' => 'blog_options',
		  'priority' => 2,
		  'choices' => array(		
			  'right-column' => esc_html__( 'Right Column Layout', 'aberration-lite' ),
			  'left-column' => esc_html__( 'Left Column Layout', 'aberration-lite' ),
			  'full-width' => esc_html__( 'Full Width', 'aberration-lite' ),
	) ) );


// Setting for content or excerpt
	$wp_customize->add_setting( 'excerpt_content', array(
		'default' => 'content',
		'sanitize_callback' => 'aberration_lite_sanitize_excerpt',
	) );
// Control for Content or excerpt
	$wp_customize->add_control( 'excerpt_content', array(
    'label'   => esc_html__( 'Content or Excerpt', 'aberration-lite' ),
    'section' => 'blog_options',
	'priority'       => 5,
    'type'    => 'radio',
        'choices' => array(
            'content' => esc_html__( 'Content', 'aberration-lite' ),
            'excerpt' => esc_html__( 'Excerpt', 'aberration-lite' ),	
        ) ) );

// Setting group for a excerpt
	$wp_customize->add_setting( 'excerpt_limit', array(
		'default'        => '50',
		'sanitize_callback' => 'aberration_lite_sanitize_integer',
	) );
	$wp_customize->add_control( 'excerpt_limit', array(
		'settings' => 'excerpt_limit',
		'label'    => esc_html__( 'Excerpt Length', 'aberration-lite' ),
		'section'  => 'blog_options',
		'type'     => 'text',
		'priority'   => 6,
	) );

// Setting group to show the date  
  $wp_customize->add_setting( 'show_entry_post_date',  array(
      'default' => 1,
      'sanitize_callback' => 'aberration_lite_sanitize_checkbox',
    )
  );  
  $wp_customize->add_control( 'show_entry_post_date', array(
    'type'     => 'checkbox',
    'priority' => 12,
    'label'    => esc_html__( 'Show Summary Post Date', 'aberration-lite' ),
	'description' => esc_html__( 'Show the Post Date on blog summary posts.', 'aberration-lite' ),
    'section'  => 'blog_options',
  ) );

// Setting group to show published by  
  $wp_customize->add_setting( 'show_entry_post_author',   array(
      'default' => 0,
      'sanitize_callback' => 'aberration_lite_sanitize_checkbox',
    )
  ); 
  $wp_customize->add_control( 'show_entry_post_author', array(
    'type'     => 'checkbox',
    'priority' => 13,
    'label'    => esc_html__( 'Show Summary Post Author', 'aberration-lite' ),
	'description' => esc_html__( 'Show the author name on blog summary posts.', 'aberration-lite' ),
    'section'  => 'blog_options',
  ) );

// Setting group to show comments link  
  $wp_customize->add_setting( 'show_comments_link',   array(
      'default' => 0,
      'sanitize_callback' => 'aberration_lite_sanitize_checkbox',
    )
  ); 
  $wp_customize->add_control( 'show_comments_link', array(
    'type'     => 'checkbox',
    'priority' => 15,
    'label'    => esc_html__( 'Show Summary Comments Link', 'aberration-lite' ),
	'description' => esc_html__( 'Show the comments link on blog summary posts.', 'aberration-lite' ),
    'section'  => 'blog_options',
  ) );

// Setting group to show share buttons  
  $wp_customize->add_setting( 'show_single_thumbnail',   array(
      'default' => 1,
      'sanitize_callback' => 'aberration_lite_sanitize_checkbox',
    )
  );  
  $wp_customize->add_control( 'show_single_thumbnail', array(
    'type'     => 'checkbox',
    'priority' => 17,
    'label'    => esc_html__( 'Show Full Post Featured Image', 'aberration-lite' ),
	'description' => esc_html__( 'Show the Featured Image on the full post view.', 'aberration-lite' ),
    'section'  => 'blog_options',
  ) );	   
// Setting group to show published by  
  $wp_customize->add_setting( 'show_single_post_author',   array(
      'default' => 0,
      'sanitize_callback' => 'aberration_lite_sanitize_checkbox',
    )
  ); 
  $wp_customize->add_control( 'show_single_post_author', array(
    'type'     => 'checkbox',
    'priority' => 13,
    'label'    => esc_html__( 'Show Full Post Author', 'aberration-lite' ),
	'description' => esc_html__( 'Show the author name on the full post view.', 'aberration-lite' ),
    'section'  => 'blog_options',
  ) );
	   
// Setting group to show the categories  
  $wp_customize->add_setting( 'show_single_categories',  array(
      'default' => 1,
      'sanitize_callback' => 'aberration_lite_sanitize_checkbox',
    )
  );  
  $wp_customize->add_control( 'show_single_categories', array(
    'type'     => 'checkbox',
    'priority' => 18,
    'label'    => esc_html__( 'Show Full Post Categories List', 'aberration-lite' ),
	'description' => esc_html__( 'Show the list of categories at the bottom of each full post.', 'aberration-lite' ),
    'section'  => 'blog_options',
  ) );  

// Setting group to show tags  
  $wp_customize->add_setting( 'show_tags_list',  array(
      'default' => 1,
      'sanitize_callback' => 'aberration_lite_sanitize_checkbox',
    )
  );  
  $wp_customize->add_control( 'show_tags_list', array(
    'type'     => 'checkbox',
    'priority' => 19,
    'label'    => esc_html__( 'Show Full Post Tags List', 'aberration-lite' ),
	'description' => esc_html__( 'Show the list of tags at the bottom of each full post.', 'aberration-lite' ),
    'section'  => 'blog_options',
  ) );
  
 // Setting group for the single post next prev nav
  $wp_customize->add_setting( 'show_next_prev',  array(
      'default' => 1,
      'sanitize_callback' => 'aberration_lite_sanitize_checkbox'
    )
  );  
  $wp_customize->add_control( 'show_next_prev', array(
    'type'        => 'checkbox',
    'priority'    => 20,
    'label'       => esc_html__( 'Show Full Post Navigation', 'aberration-lite' ),
	'description' => esc_html__( 'Show the Next and Previous post navigation at the bottom of each full post.', 'aberration-lite' ),
    'section'     => 'blog_options',
   ) ); 
  
 // Setting group for the author bio on full post
  $wp_customize->add_setting( 'show_author_bio',  array(
      'default' => 1,
      'sanitize_callback' => 'aberration_lite_sanitize_checkbox'
    )
  );  
  $wp_customize->add_control( 'show_author_bio', array(
    'type'        => 'checkbox',
    'priority'    => 21,
    'label'       => esc_html__( 'Show Full Post Author Bio', 'aberration-lite' ),
	'description' => esc_html__( 'Show the Author Bio at the bottom of each full post.', 'aberration-lite' ),
    'section'     => 'blog_options',
   ) );

/*
 * Lets add to the Colour section
 */ 

// Page background
 	$wp_customize->add_setting( 'background_color', array(
		'default'        => '#fff',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
		'label'   => esc_html__( 'Page Background', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'background_color',
		'priority' => 1,			
	) ) );

// content background
 	$wp_customize->add_setting( 'content_bg', array(
		'default'        => '#fff',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_bg', array(
		'label'   => esc_html__( 'Content Area Background', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'content_bg',
		'priority' => 2,			
	) ) );
	
// body text colour
 	$wp_customize->add_setting( 'body_text', array(
		'default'        => '#505050',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_text', array(
		'label'   => esc_html__( 'Body Text Colour', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'body_text',
		'priority' => 2,			
	) ) );
	
// body link colour
 	$wp_customize->add_setting( 'body_link', array(
		'default'        => '#B2995D',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_link', array(
		'label'   => esc_html__( 'Body Link Colour', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'body_link',
		'priority' => 3,			
	) ) );	
	
// body link hover colour
 	$wp_customize->add_setting( 'body_linkh', array(
		'default'        => '#505050',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_linkh', array(
		'label'   => esc_html__( 'Body Link Hover Colour', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'body_linkh',
		'priority' => 4,			
	) ) );	
	
	
// body horizontal rule line colour
 	$wp_customize->add_setting( 'horizontal_rule', array(
		'default'        => '#e8e8e8',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'horizontal_rule', array(
		'label'   => esc_html__( 'Content Horizontal Rule Line Colour', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'horizontal_rule',
		'priority' => 5,			
	) ) );	


// Title box
 	$wp_customize->add_setting( 'title_box', array(
		'default'        => '#d7dbde',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'title_box', array(
		'label'   => esc_html__( 'Title Box', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'title_box',
		'priority' => 6,			
	) ) );
// Site Title
 	$wp_customize->add_setting( 'site_title', array(
		'default'        => '#000',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_title', array(
		'label'   => esc_html__( 'Site Title', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'site_title',
		'priority' => 7,			
	) ) );
// Site description
 	$wp_customize->add_setting( 'site_desc', array(
		'default'        => '#000',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_desc', array(
		'label'   => esc_html__( 'Site Description', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'site_desc',
		'priority' => 8,			
	) ) );

// no banner background
 	$wp_customize->add_setting( 'no_banner', array(
		'default'        => '#f5f5f5',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'no_banner', array(
		'label'   => esc_html__( 'No Banner Background', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'no_banner',
		'priority' => 9,			
	) ) );
		
// bottom background
 	$wp_customize->add_setting( 'bottom_bg', array(
		'default'        => '#f5f5f5',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_bg', array(
		'label'   => esc_html__( 'Bottom Sidebar Background', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'bottom_bg',
		'priority' => 22,			
	) ) );

// bottom text
 	$wp_customize->add_setting( 'bottom_text', array(
		'default'        => '#505050',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_text', array(
		'label'   => esc_html__( 'Bottom Text', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'bottom_text',
		'priority' => 23,			
	) ) );

// bottom heading
 	$wp_customize->add_setting( 'bottom_hd', array(
		'default'        => '#333',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_hd', array(
		'label'   => esc_html__( 'Bottom Headings', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'bottom_hd',
		'priority' => 24,			
	) ) );

// bottom links
 	$wp_customize->add_setting( 'bottom_link', array(
		'default'        => '#B2995D',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_link', array(
		'label'   => esc_html__( 'Bottom Links', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'bottom_link',
		'priority' => 25,			
	) ) );

// bottom links on hover
 	$wp_customize->add_setting( 'bottom_linkh', array(
		'default'        => '#505050',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_linkh', array(
		'label'   => esc_html__( 'Bottom Link Hover', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'bottom_linkh',
		'priority' => 26,			
	) ) );
	
// bottom widget list border colour
 	$wp_customize->add_setting( 'bottom_widget_list_border', array(
		'default'        => '#e6e6e6',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_widget_list_border', array(
		'label'   => esc_html__( 'Bottom Widget List Border', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'bottom_widget_list_border',
		'priority' => 27,			
	) ) );


// left and right sidebar widget text
 	$wp_customize->add_setting( 'lrwidget_text', array(
		'default'        => '#505050',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lrwidget_text', array(
		'label'   => esc_html__( 'Left &amp; Right Widget Text', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'lrwidget_text',
		'priority' => 28,			
	) ) );
// left and right sidebar widget list links
 	$wp_customize->add_setting( 'lrwidget_list_link', array(
		'default'        => '#505050',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lrwidget_list_link', array(
		'label'   => esc_html__( 'Left &amp; Right Widget List Link', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'lrwidget_list_link',
		'priority' => 28,			
	) ) );

// left and right sidebar widget list link hover
 	$wp_customize->add_setting( 'lrwidget_list_linkh', array(
		'default'        => '#B2995D',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lrwidget_list_linkh', array(
		'label'   => esc_html__( 'Left &amp; Right Widget List Link Hover', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'lrwidget_list_linkh',
		'priority' => 29,			
	) ) );

// left and right sidebar widget list border colour
 	$wp_customize->add_setting( 'lrwidget_list_border', array(
		'default'        => '#e6e6e6',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lrwidget_list_border', array(
		'label'   => esc_html__( 'Left &amp; Right Widget List Border', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'lrwidget_list_border',
		'priority' => 30,			
	) ) );

// left and right tag border colour
 	$wp_customize->add_setting( 'lrtag_border', array(
		'default'        => '#d9d9d9',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lrtag_border', array(
		'label'   => esc_html__( 'Left &amp; Right Tags Border', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'lrtag_border',
		'priority' => 31,			
	) ) );

// left and right tag text colour
 	$wp_customize->add_setting( 'lrtag_text', array(
		'default'        => '#686868',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lrtag_text', array(
		'label'   => esc_html__( 'Left &amp; Right Tags Text', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'lrtag_text',
		'priority' => 32,			
	) ) );

// left and right tag text hover colour
 	$wp_customize->add_setting( 'lrtag_texth', array(
		'default'        => '#f3f3f3',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lrtag_texth', array(
		'label'   => esc_html__( 'Left &amp; Right Tags Text Hover', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'lrtag_texth',
		'priority' => 33,			
	) ) );

// left and right tag bg hover colour
 	$wp_customize->add_setting( 'lrtag_bgh', array(
		'default'        => '#303030',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lrtag_bgh', array(
		'label'   => esc_html__( 'Left &amp; Right Tags Background Hover', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'lrtag_bgh',
		'priority' => 34,			
	) ) );

// left and right tag border colour
 	$wp_customize->add_setting( 'bottom_tag_border', array(
		'default'        => '#d9d9d9',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_tag_border', array(
		'label'   => esc_html__( 'Bottom Tags Border', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'bottom_tag_border',
		'priority' => 35,			
	) ) );

// left and right tag text colour
 	$wp_customize->add_setting( 'bottom_tag_text', array(
		'default'        => '#686868',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_tag_text', array(
		'label'   => esc_html__( 'Bottom Tags Text', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'bottom_tag_text',
		'priority' => 36,			
	) ) );

// left and right tag text hover colour
 	$wp_customize->add_setting( 'bottom_tag_texth', array(
		'default'        => '#f3f3f3',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_tag_texth', array(
		'label'   => esc_html__( 'Bottom Tags Text Hover', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'bottom_tag_texth',
		'priority' => 37,			
	) ) );

// left and right tag bg hover colour
 	$wp_customize->add_setting( 'bottom_tag_bgh', array(
		'default'        => '#303030',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_tag_bgh', array(
		'label'   => esc_html__( 'Bottom Tags Background Hover', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'bottom_tag_bgh',
		'priority' => 38,			
	) ) );

// headings
 	$wp_customize->add_setting( 'headings', array(
		'default'        => '#333',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'headings', array(
		'label'   => esc_html__( 'Headings', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'headings',
		'priority' => 39,			
	) ) );

// links
 	$wp_customize->add_setting( 'body_link', array(
		'default'        => '#b2995d',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_link', array(
		'label'   => esc_html__( 'Body Link Colour', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'body_link',
		'priority' => 40,			
	) ) );

// links on hover
 	$wp_customize->add_setting( 'body_linkh', array(
		'default'        => '#505050',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_linkh', array(
		'label'   => esc_html__( 'Body Link Hover Colour', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'body_linkh',
		'priority' => 40,			
	) ) );

// Social bg
 	$wp_customize->add_setting( 'social_bg', array(
		'default'        => '#c4bf9f',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_bg', array(
		'label'   => esc_html__( 'Social Icon Background', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'social_bg',
		'priority' => 41,			
	) ) );	
// Social icon
 	$wp_customize->add_setting( 'social_icon', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_icon', array(
		'label'   => esc_html__( 'Social Icon Colour', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'social_icon',
		'priority' => 42,			
	) ) );

// Social bg hover
 	$wp_customize->add_setting( 'social_hbg', array(
		'default'        => '#d5d1b8',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_hbg', array(
		'label'   => esc_html__( 'Social Icon Hover Background', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'social_hbg',
		'priority' => 43,			
	) ) );	
// Social icon hover
 	$wp_customize->add_setting( 'social_hicon', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_hicon', array(
		'label'   => esc_html__( 'Social Icon Hover Colour', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'social_hicon',
		'priority' => 44,			
	) ) );

// footer top border
 	$wp_customize->add_setting( 'footer_border', array(
		'default'        => '#e6e6e6',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_border', array(
		'label'   => esc_html__( 'Footer Top Border', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'footer_border',
		'priority' => 50,			
	) ) );
	
// footer text colour
 	$wp_customize->add_setting( 'footer_colour', array(
		'default'        => '#a7a7a7',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_colour', array(
		'label'   => esc_html__( 'Footer Text Colour', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'footer_colour',
		'priority' => 51,			
	) ) );	
	
// footer link colour
 	$wp_customize->add_setting( 'footer_link', array(
		'default'        => '#a7a7a7',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_link', array(
		'label'   => esc_html__( 'Footer Link Colour', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'footer_link',
		'priority' => 52,			
	) ) );	

// footer link hover colour
 	$wp_customize->add_setting( 'footer_linkh', array(
		'default'        => '#505050',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_linkh', array(
		'label'   => esc_html__( 'Footer Link Hover Colour', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'footer_linkh',
		'priority' => 53,			
	) ) );

// footer background colour
 	$wp_customize->add_setting( 'footer_bg', array(
		'default'        => '#fff',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg', array(
		'label'   => esc_html__( 'Footer Background Colour', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'footer_bg',
		'priority' => 54,			
	) ) );


// mobile menu button
 	$wp_customize->add_setting( 'mobile_button_style', array(
		'default'        => '#f3f3f3',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_button_style', array(
		'label'   => esc_html__( 'Mobile Menu Button Style', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'mobile_button_style',
		'priority' => 54,			
	) ) );

// mobile menu button hover
 	$wp_customize->add_setting( 'mobile_button_styleh', array(
		'default'        => '#000',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_button_styleh', array(
		'label'   => esc_html__( 'Mobile Menu Button Hover', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'mobile_button_styleh',
		'priority' => 55,			
	) ) );

// mobile menu button when no banner
 	$wp_customize->add_setting( 'nobanner_mobile_button_style', array(
		'default'        => '#303030',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nobanner_mobile_button_style', array(
		'label'   => esc_html__( 'Mobile Menu Button Style No Banner', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'nobanner_mobile_button_style',
		'priority' => 56,			
	) ) );

// mobile menu link colour
 	$wp_customize->add_setting( 'mobile_menu_links', array(
		'default'        => '#000',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_menu_links', array(
		'label'   => esc_html__( 'Mobile Menu Link Colour', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'mobile_menu_links',
		'priority' => 57,			
	) ) );

// mobile menu link hover colour
 	$wp_customize->add_setting( 'mobile_menu_hlinks', array(
		'default'        => '#b2995d',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_menu_hlinks', array(
		'label'   => esc_html__( 'Mobile Menu Hover Colour', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'mobile_menu_hlinks',
		'priority' => 57,			
	) ) );
	
// mobile menu link border colour
 	$wp_customize->add_setting( 'mobile_menu_link_border', array(
		'default'        => '#e6e6e6',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_menu_link_border', array(
		'label'   => esc_html__( 'Mobile Menu Link Borders', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'mobile_menu_link_border',
		'priority' => 58,			
	) ) );

// mobile menu background
 	$wp_customize->add_setting( 'mobile_menu_bg', array(
		'default'        => '#f3f3f3',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_menu_bg', array(
		'label'   => esc_html__( 'Mobile Menu Background', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'mobile_menu_bg',
		'priority' => 58,			
	) ) );

// Main menu link colour
 	$wp_customize->add_setting( 'nav_link_colour', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_link_colour', array(
		'label'   => esc_html__( 'Main Menu Text', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'nav_link_colour',
		'priority' => 59,			
	) ) );	

// Main menu link hover colour
 	$wp_customize->add_setting( 'nav_link_colourh', array(
		'default'        => '#f7e5d2',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_link_colourh', array(
		'label'   => esc_html__( 'Main Menu Text Hover/Active', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'nav_link_colourh',
		'priority' => 60,			
	) ) );
	
// Main menu link colour no banner
 	$wp_customize->add_setting( 'nav_link_colour_nobanner', array(
		'default'        => '#000000',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_link_colour_nobanner', array(
		'label'   => esc_html__( 'Main Menu Text - No Banner', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'nav_link_colour_nobanner',
		'priority' => 61,			
	) ) );	

// Main menu link colour hover no banner
 	$wp_customize->add_setting( 'nav_link_colourh_nobanner', array(
		'default'        => '#b2995d',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_link_colourh_nobanner', array(
		'label'   => esc_html__( 'Main Menu Text Hover/Active - No Banner ', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'nav_link_colourh_nobanner',
		'priority' => 62,			
	) ) );	

// Main menu submenu colour
 	$wp_customize->add_setting( 'nav_submenu_colour', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_submenu_colour', array(
		'label'   => esc_html__( 'Submenu Text', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'nav_submenu_colour',
		'priority' => 63,			
	) ) );	
	
// Main menu submenu colour no banner
 	$wp_customize->add_setting( 'nav_submenu_colour_nobanner', array(
		'default'        => '#444444',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_submenu_colour_nobanner', array(
		'label'   => esc_html__( 'Submenu Text - No Banner', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'nav_submenu_colour_nobanner',
		'priority' => 64,			
	) ) );	

// submenu background
 	$wp_customize->add_setting( 'submenu_bg_nobanner', array(
		'default'        => '#f5f5f5',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_bg_nobanner', array(
		'label'   => esc_html__( 'Submenu Background No Banner', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'submenu_bg_nobanner',
		'priority' => 66,			
	) ) );	
	
// submenu left border
 	$wp_customize->add_setting( 'submenu_border', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_border', array(
		'label'   => esc_html__( 'Submenu Border', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'submenu_border',
		'priority' => 67,			
	) ) );		
	
// submenu left border no banner
 	$wp_customize->add_setting( 'submenu_border_nobanner', array(
		'default'        => '#e5e5e5',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_border_nobanner', array(
		'label'   => esc_html__( 'Submenu Border - No Banner', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'submenu_border_nobanner',
		'priority' => 68,			
	) ) );		
		
// Back to Top background
 	$wp_customize->add_setting( 'backtop_bg', array(
		'default'        => '#000000',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'backtop_bg', array(
		'label'   => esc_html__( 'Back to Top Button Background', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'backtop_bg',
		'priority' => 72,			
	) ) );
// Back to Top background hover
 	$wp_customize->add_setting( 'backtop_hbg', array(
		'default'        => '#565656',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'backtop_hbg', array(
		'label'   => esc_html__( 'Back to Top Button Hover Background', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'backtop_hbg',
		'priority' => 73,			
	) ) );
// Back to Top text
 	$wp_customize->add_setting( 'backtop_text', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'backtop_text', array(
		'label'   => esc_html__( 'Back to Top Button Text', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'backtop_text',
		'priority' => 74,			
	) ) );	


// quote format background colour
 	$wp_customize->add_setting( 'quotepf_bg', array(
		'default'        => '#c4bf9f',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'quotepf_bg', array(
		'label'   => esc_html__( 'Quote Post Format Background', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'quotepf_bg',
		'priority' => 75,			
	) ) );	

// quote format text colour
 	$wp_customize->add_setting( 'quotepf_text', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'quotepf_text', array(
		'label'   => esc_html__( 'Quote Post Format Text', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'quotepf_text',
		'priority' => 76,			
	) ) );
	
// image format text colour
 	$wp_customize->add_setting( 'imagepf_title', array(
		'default'        => '#cccccc',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'imagepf_title', array(
		'label'   => esc_html__( 'Image Post Format Title', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'imagepf_title',
		'priority' => 77,			
	) ) );	
	
// Setting group for the error page  button
  $wp_customize->add_setting( 'error_button',	array(
 		'default'        => esc_html__( 'Back to Home', 'aberration-lite' ),
		'sanitize_callback' => 'aberration_lite_sanitize_text',
	) );  
  $wp_customize->add_control( 'error_button', array(
		'type'     => 'text',
		'priority' => 81,
		'label'    => esc_html__( 'Error Button Label', 'aberration-lite' ),
		'section'  => 'colors',
  	) );
	
// Error box text colour
 	$wp_customize->add_setting( 'error_text_colour', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_text_colour', array(
		'label'   => esc_html__( 'Error Text Colour', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'error_text_colour',
		'priority' => 82,			
	) ) );	




// Setting group for the error page button background
 	$wp_customize->add_setting( 'default_button_bg', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'default_button_bg', array(
		'label'   => esc_html__( 'default Button Background', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'default_button_bg',
		'priority' => 83,			
	) ) );	
// Setting group for the error page button text
 	$wp_customize->add_setting( 'default_button_text_colour', array(
		'default'        => '#505050',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'default_button_text_colour', array(
		'label'   => esc_html__( 'default Button Label Text', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'default_button_text_colour',
		'priority' => 84,			
	) ) );	
	
// Setting group for the error page button background hover
 	$wp_customize->add_setting( 'default_button_bgh', array(
		'default'        => '#303030',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'default_button_bgh', array(
		'label'   => esc_html__( 'default Button Hover Background', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'default_button_bgh',
		'priority' => 85,			
	) ) );	
// Setting group for the error page button text hover
 	$wp_customize->add_setting( 'default_button_text_colourh', array(
		'default'        => '#f3f3f3',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'default_button_text_colourh', array(
		'label'   => esc_html__( 'default Button Label Hover Text', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'default_button_text_colourh',
		'priority' => 86,			
	) ) );		
		
// Setting group for the error page button border
 	$wp_customize->add_setting( 'default_button_border', array(
		'default'        => '#c4c4c4',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'default_button_border', array(
		'label'   => esc_html__( 'default Button Border', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'default_button_border',
		'priority' => 87,			
	) ) );	
// Setting group for the error page button border
 	$wp_customize->add_setting( 'default_button_hborder', array(
		'default'        => '#303030',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'default_button_hborder', array(
		'label'   => esc_html__( 'Default Button Border Hover', 'aberration-lite' ),
		'section' => 'colors',
		'settings'   => 'default_button_hborder',
		'priority' => 88,			
	) ) );	

/*
 * Create a new customizer section
 * Name: Typography Options
 */    
	$wp_customize->add_section( 'typography_options', array(
		'title' => esc_html__( 'Typography Options', 'aberration-lite' ),
		'priority'       => 50,
	) ); 

	// Setting group to show the site title  
  	$wp_customize->add_setting( 'load_cyrillic_subset',  array(
		'default' => 0,
		'sanitize_callback' => 'aberration_lite_sanitize_checkbox'
   	 ) );  
 	 $wp_customize->add_control( 'load_cyrillic_subset', array(
		'type'     => 'checkbox',
		'section'  => 'typography_options',
		'priority' => 1,
		'label'    => esc_html__( 'Load Cyrillic Font Subsets', 'aberration-lite' ),
		'description' => esc_html__( 'If you need to add Cyrillic font subsets for the custom fonts Aberration Lite uses, check this box.', 'aberration-lite' ),
 	 ) );	

	 	
// Setting group for global font size
	$wp_customize->add_setting( 'base_font_size', array(
		'default'        => '100',
		'sanitize_callback' => 'aberration_lite_sanitize_integer',
	) );
	$wp_customize->add_control( 'base_font_size', array(
		'settings' => 'base_font_size',
		'section'  => 'typography_options',
		'priority' => 1,
		'type'     => 'text',
		'label'    => esc_html__( 'Base Font Size', 'aberration-lite' ),	
		'description' => esc_html__( 'This sets the base font size for everything in your site and changing this will have a global effect to most elements that do not use px as a size attribute. Default size is 100', 'aberration-lite' ),	
	) );	
	
// Setting group for the main content text size
	$wp_customize->add_setting( 'content_text_size', array(
		'default'        => '0.813rem',
		'sanitize_callback' => 'aberration_lite_sanitize_text',
	) );
	$wp_customize->add_control( 'content_text_size', array(
		'settings' => 'content_text_size',
		'section'  => 'typography_options',
		'priority' => 2,
		'type'     => 'text',
		'label'    => esc_html__( 'Content Text Size', 'aberration-lite' ),	
		'description' => 	esc_html__( 'Default is 0.875rem', 'aberration-lite' ),	
	) );
	
// Setting group for the comment text size
	$wp_customize->add_setting( 'comment_text_size', array(
		'default'        => '0.813rem',
		'sanitize_callback' => 'aberration_lite_sanitize_text',
	) );
	$wp_customize->add_control( 'comment_text_size', array(
		'settings' => 'comment_text_size',
		'section'  => 'typography_options',
		'priority' => 3,
		'type'     => 'text',
		'label'    => esc_html__( 'Comment Text Size', 'aberration-lite' ),	
		'description' => 	esc_html__( 'Default is 0.813rem', 'aberration-lite' ),	
	) );
		

// Setting group for the main menu font size
	$wp_customize->add_setting( 'menu_font_size', array(
		'default'        => '1rem',
		'sanitize_callback' => 'aberration_lite_sanitize_text',
	) );
	$wp_customize->add_control( 'menu_font_size', array(
		'settings' => 'menu_font_size',
		'section'  => 'typography_options',
		'priority' => 7,
		'type'     => 'text',
		'label'    => esc_html__( 'Main Menu Font Size', 'aberration-lite' ),	
		'description' => 	esc_html__( 'Default is 0.938rem', 'aberration-lite' ),	
	) );

// Setting group for the main submenu font size
	$wp_customize->add_setting( 'submenu_font_size', array(
		'default'        => '0.875rem',
		'sanitize_callback' => 'aberration_lite_sanitize_text',
	) );
	$wp_customize->add_control( 'submenu_font_size', array(
		'settings' => 'submenu_font_size',
		'section'  => 'typography_options',
		'priority' => 8,
		'type'     => 'text',
		'label'    => esc_html__( 'Main Submenu Font Size', 'aberration-lite' ),	
		'description' => 	esc_html__( 'Default is 0.813rem', 'aberration-lite' ),	
	) );

// Setting group for h1 font size
	$wp_customize->add_setting( 'h1_font_size', array(
		'default'        => '1.75rem',
		'sanitize_callback' => 'aberration_lite_sanitize_text',
	) );
	$wp_customize->add_control( 'h1_font_size', array(
		'settings' => 'h1_font_size',
		'section'  => 'typography_options',
		'priority' => 8,
		'type'     => 'text',
		'label'    => esc_html__( 'H1 Font Size', 'aberration-lite' ),
		'description' => 	esc_html__( 'Default is 1.75rem', 'aberration-lite' ),	
	) );
	
// Setting group for h2 font size
	$wp_customize->add_setting( 'h2_font_size', array(
		'default'        => '1.5rem',
		'sanitize_callback' => 'aberration_lite_sanitize_text',
	) );
	$wp_customize->add_control( 'h2_font_size', array(
		'settings' => 'h2_font_size',
		'section'  => 'typography_options',
		'priority' => 9,
		'type'     => 'text',
		'label'    => esc_html__( 'H2 Font Size', 'aberration-lite' ),	
		'description' => 	esc_html__( 'Default is 1.5rem', 'aberration-lite' ),	
	) );

// Setting group for h3 font size
	$wp_customize->add_setting( 'h3_font_size', array(
		'default'        => '1.25rem',
		'sanitize_callback' => 'aberration_lite_sanitize_text',
	) );
	$wp_customize->add_control( 'h3_font_size', array(
		'settings' => 'h3_font_size',
		'section'  => 'typography_options',
		'priority' => 10,
		'type'     => 'text',
		'label'    => esc_html__( 'H3 Font Size', 'aberration-lite' ),	
		'description' => 	esc_html__( 'Default is 1.25rem', 'aberration-lite' ),	
	) );

// Setting group for h4 font size
	$wp_customize->add_setting( 'h4_font_size', array(
		'default'        => '1.125rem',
		'sanitize_callback' => 'aberration_lite_sanitize_text',
	) );
	$wp_customize->add_control( 'h4_font_size', array(
		'settings' => 'h4_font_size',
		'section'  => 'typography_options',
		'priority' => 11,
		'type'     => 'text',
		'label'    => esc_html__( 'H4 Font Size', 'aberration-lite' ),	
		'description' => 	esc_html__( 'Default is 1.125rem', 'aberration-lite' ),	
	) );
	
// Setting group for h5 font size
	$wp_customize->add_setting( 'h5_font_size', array(
		'default'        => '1rem',
		'sanitize_callback' => 'aberration_lite_sanitize_text',
	) );
	$wp_customize->add_control( 'h5_font_size', array(
		'settings' => 'h5_font_size',
		'section'  => 'typography_options',
		'priority' => 12,
		'type'     => 'text',
		'label'    => esc_html__( 'H5 Font Size', 'aberration-lite' ),		
		'description' => 	esc_html__( 'Default is 1rem', 'aberration-lite' ),
	) );	
	
// Setting group for h5 font size
	$wp_customize->add_setting( 'h6_font_size', array(
		'default'        => '0.75rem',
		'sanitize_callback' => 'aberration_lite_sanitize_text',
	) );
	$wp_customize->add_control( 'h6_font_size', array(
		'settings' => 'h6_font_size',
		'section'  => 'typography_options',
		'priority' => 13,
		'type'     => 'text',
		'label'    => esc_html__( 'H6 Font Size', 'aberration-lite' ),	
		'description' => 	esc_html__( 'Default is 0.75rem', 'aberration-lite' ),	
	) );	
	
 // Setting group for bottom widget title  size
	$wp_customize->add_setting( 'bottom_widget_title_size', array(
		'default'        => '1.125rem',
		'sanitize_callback' => 'aberration_lite_sanitize_text',
	) );
	$wp_customize->add_control( 'bottom_widget_title_size', array(
		'settings' => 'bottom_widget_title_size',
		'section'  => 'typography_options',
		'priority' => 14,
		'type'     => 'text',
		'label'    => esc_html__( 'Bottom Widget Title Size', 'aberration-lite' ),
		'description' => 	esc_html__( 'Default is 1.125rem', 'aberration-lite' ),	
	) );	
	

/*
 * Create a section
 * Name: Error Page
 */  
	$wp_customize->add_section( 'error_page',	array(
		'title' => esc_html__( 'Error Page', 'aberration-lite' ),
		'priority' => 51,
	)  );		

// Setting group for the error page image	
   $wp_customize->add_setting( 'error_image', array(
            'default' => get_template_directory_uri() . '/images/error-image.jpg',
            'sanitize_callback' => 'esc_url_raw',
     ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'error_image', array(
               'label'          => esc_html__( 'Upload your own Error Image', 'aberration-lite' ),
			   'description' => esc_html__( 'I recommend a maximum image size of 2560x1100 to accommodate large resolutions, including retina displays.', 'aberration-lite' ),
               'type'           => 'image',
               'section'        => 'error_page',
               'settings'       => 'error_image',
               'priority'       => 1,
     ) ) );
	
// Error box text colour
 	$wp_customize->add_setting( 'error_text_colour', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_text_colour', array(
		'label'   => esc_html__( 'Error Text Colour', 'aberration-lite' ),
		'section' => 'error_page',
		'settings'   => 'error_text_colour',
		'priority' => 5,			
	) ) );	




// Setting group for the error page button background
 	$wp_customize->add_setting( 'error_button_bg', array(
		'default'        => '',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_button_bg', array(
		'label'   => esc_html__( 'Error Button Background', 'aberration-lite' ),
		'section' => 'error_page',
		'settings'   => 'error_button_bg',
		'priority' => 6,			
	) ) );	
// Setting group for the error page button text
 	$wp_customize->add_setting( 'error_button_text_colour', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_button_text_colour', array(
		'label'   => esc_html__( 'Error Button Label Text', 'aberration-lite' ),
		'section' => 'error_page',
		'settings'   => 'error_button_text_colour',
		'priority' => 7,			
	) ) );	
	
// Setting group for the error page button background hover
 	$wp_customize->add_setting( 'error_button_bgh', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_button_bgh', array(
		'label'   => esc_html__( 'Error Button Hover Background', 'aberration-lite' ),
		'section' => 'error_page',
		'settings'   => 'error_button_bgh',
		'priority' => 8,			
	) ) );	
// Setting group for the error page button text hover
 	$wp_customize->add_setting( 'error_button_text_colourh', array(
		'default'        => '#505050',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_button_text_colourh', array(
		'label'   => esc_html__( 'Error Button Label Hover Text', 'aberration-lite' ),
		'section' => 'error_page',
		'settings'   => 'error_button_text_colourh',
		'priority' => 9,			
	) ) );		
		
// Setting group for the error page button border
 	$wp_customize->add_setting( 'error_button_border', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'aberration_lite_sanitize_hex_colour',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_button_border', array(
		'label'   => esc_html__( 'Error Button Border', 'aberration-lite' ),
		'section' => 'error_page',
		'settings'   => 'error_button_border',
		'priority' => 11,			
	) ) );	


	
}
add_action( 'customize_register', 'aberration_lite_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function aberration_lite_customize_preview_js() {
	wp_enqueue_script( 'aberration_lite_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'aberration_lite_customize_preview_js' );






/******************* This is our theme sanitization settings ************************
		Remember to sanitize any additional theme settings you add to the customizer.
**************************************************************************/
 
// adds sanitization callback function : checkbox
if ( ! function_exists( 'aberration_lite_sanitize_checkbox' ) ) :
	function aberration_lite_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}	 
endif;

// adds sanitization callback function for background size
if ( ! function_exists( 'aberration_lite_sanitize_background_size' ) ) :
  function aberration_lite_sanitize_background_size( $value ) {
    $background_sizes = array( 'auto', 'cover', 'contain' );
    if ( ! in_array( $value, $background_sizes ) ) {
      $value = 'cover';
    }

    return $value;
  }
endif;

// adds sanitization callback function : text 
if ( ! function_exists( 'aberration_lite_sanitize_text' ) ) :
	function aberration_lite_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
	}
endif;

// adds sanitization callback function : colours
if ( ! function_exists( 'aberration_lite_sanitize_hex_colour' ) ) :
	function aberration_lite_sanitize_hex_colour( $color ) {
		if ( $unhashed = sanitize_hex_color_no_hash( $color ) )
			return '#' . $unhashed;
	
		return $color;
	}
endif;

// adds sanitization callback function : absolute integer
if ( ! function_exists( 'aberration_lite_sanitize_integer' ) ) :
function aberration_lite_sanitize_integer( $input ) {
	return absint( $input );
}
endif;


// adds sanitization callback function for the excerpt : radio
	function aberration_lite_sanitize_excerpt( $input ) {
		$valid = array(
			'content' => esc_html__( 'Content', 'aberration-lite' ),
			'excerpt' => esc_html__( 'Excerpt', 'aberration-lite' ),
		);
	 
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}

// adds sanitization callback function for the blog style : radio
	function aberration_lite_sanitize_blogstyle( $input ) {
		$valid = array( 
			'top-featured-centered' => esc_html__( 'Top Featured Image Centered', 'aberration-lite' ),
			'top-featured-left' => esc_html__( 'Top Featured Image Left Sidebar', 'aberration-lite' ),
			'top-featured-right' => esc_html__( 'Top Featured Image Right Sidebar', 'aberration-lite' ),
			'top-left-right-featured' => esc_html__( 'Top Featured Image Left &amp; Right Sidebar', 'aberration-lite' ),
		);
	 
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}	
	
// adds sanitization callback function for the single style : radio
	function aberration_lite_sanitize_singlestyle( $input ) {
		$valid = array(
			'right-column' => esc_html__( 'Right Column Layout', 'aberration-lite' ),
			'left-column' => esc_html__( 'Left Column Layout', 'aberration-lite' ),
			'full-width' => esc_html__( 'Full Width', 'aberration-lite' ),
		);
	 
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}		
