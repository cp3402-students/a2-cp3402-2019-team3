<?php
/**
 * Add inline styles to the head area
 * These styles represents options from the customizer
 * @package Aberration Lite
 */
 
 // Dynamic styles
function aberration_lite_inline_styles($custom) {
	
// BEGIN CUSTOM CSS

	// base font size
		$base_font_size = get_theme_mod( 'base_font_size', '100' );
		$custom .= "html { font-size: " . esc_attr($base_font_size) . "%;}"."\n";
	
	// body background and text colour
		$background_color = get_theme_mod( 'background_color', '#fff' );
		$body_text = get_theme_mod( 'body_text', '#505050' );
		$custom .= "body {background-color:" . esc_attr($background_color) . "; color:" . esc_attr($body_text) . "}"."\n";

	// Content background
		$content_bg = get_theme_mod( 'content_bg', '#fff' );
		$custom .= "#page, .site-footer {background-color:" . esc_attr($content_bg) . "}"."\n";
		
	// body headings
		$headings = get_theme_mod( 'headings', '#333' );
		$custom .= "h1,h2,h3,h4,h5,h6,.entry-title a, .entry-title a:visited,.widget-title {color:" . esc_attr($headings) . "}"."\n";

	// body links
		$body_link = get_theme_mod( 'body_link', '#b2995d' );
		$body_linkh = get_theme_mod( 'body_linkh', '#505050' );
		$custom .= "a, a:visited, .entry-title a:hover {color:" . esc_attr($body_link) . "}
		a:hover {color:" . esc_attr($body_linkh) . "}"."\n";
					
	// title box
		$title_box = get_theme_mod( 'title_box', '#d7dbde' );
		$custom .= "#site-branding {background-color:" . esc_attr($title_box) . "}"."\n";

	// Site Title
		$site_title = get_theme_mod( 'site_title', '#000' );
		$custom .= ".site-title a, .site-title a:visited, .site-title {color: " . esc_attr($site_title) . ";}
				.site-title:after {background-color:" . esc_attr($site_title) . "}"."\n";		

	if( esc_attr(get_theme_mod( 'logo_padding', 0 ) ) ) {
	// logo no padding
		$custom .= "#site-branding {padding:0!important;}"."\n";		
	}

	// page padding
	if( esc_attr(get_theme_mod( 'page_padding', 0 ) ) ) {
		$custom .= "#page {padding-left:0!important; padding-right:0!important;}"."\n";		
	}	

				
	// Site description
		$site_desc = get_theme_mod( 'site_desc', '#000' );
		$custom .= ".site-description {color: " . esc_attr($site_desc) . ";}"."\n";	

	// menu item size
		$menu_font_size = get_theme_mod( 'menu_font_size', '1rem' );
		$submenu_font_size = get_theme_mod( 'submenu_font_size', '0.875rem' );
		$custom .= ".main-navigation li { font-size: " . esc_attr($menu_font_size) . ";}
			.main-navigation li li > a { font-size: " . esc_attr($submenu_font_size) . ";}"."\n";	
			
	// heading sizes
		$h1_font_size = get_theme_mod( 'h1_font_size', '1.75rem' );
		$h2_font_size = get_theme_mod( 'h2_font_size', '1.5rem' );
		$h3_font_size = get_theme_mod( 'h3_font_size', '1.25rem' );
		$h4_font_size = get_theme_mod( 'h4_font_size', '1.125rem' );
		$h5_font_size = get_theme_mod( 'h5_font_size', '1rem' );
		$h6_font_size = get_theme_mod( 'h6_font_size', '0.75rem' );
		$bottom_widget_title_size = get_theme_mod( 'bottom_widget_title_size', '1.125rem' );
		$custom .= "h1 { font-size: " . esc_attr($h1_font_size) . ";} h2 { font-size: " . esc_attr($h2_font_size) . ";}	h3 { font-size: " . esc_attr($h3_font_size) . ";}	h4 { font-size: " . esc_attr($h4_font_size) . ";}
		h5 { font-size: " . esc_attr($h5_font_size) . ";}	h6 { font-size: " . esc_attr($h6_font_size) . ";} #sidebar-bottom h4 { font-size: " . esc_attr($bottom_widget_title_size) . ";}"."\n";	
	
	// main content text size
		$content_text_size = get_theme_mod( 'content_text_size', '0.813rem' );
		$comment_text_size = get_theme_mod( 'comment_text_size', '0.813rem' );
		$custom .= ".site-content { font-size: " . esc_attr($content_text_size) . ";} .comment { font-size: " . esc_attr($comment_text_size) . ";}"."\n";	
	

	// no banner background
		$no_banner = get_theme_mod( 'no_banner', '#f5f5f5' );
		$custom .= "#no-banner {background-color:" . esc_attr($no_banner) . "}"."\n";

	// horizontal rule line colour
		$horizontal_rule = get_theme_mod( 'horizontal_rule', '#e8e8e8' );
		$custom .= "hr {border-color:" . esc_attr($horizontal_rule) . "}"."\n";
		
	// bottom styling
		$bottom_bg = get_theme_mod( 'bottom_bg', '#f5f5f5' );
		$bottom_text = get_theme_mod( 'bottom_text', '#505050' );
		$bottom_hd = get_theme_mod( 'bottom_hd', '#333' );
		$bottom_link = get_theme_mod( 'bottom_link', '#B2995D' );
		$bottom_linkh = get_theme_mod( 'bottom_linkh', '#505050' );	
		$bottom_widget_list_border = get_theme_mod( 'bottom_widget_list_border', '#e6e6e6' );
		$custom .= "#bottom-wrapper {background-color:" . esc_attr($bottom_bg) . "}
		#bottom-wrapper {color:" . esc_attr($bottom_text) . "}
		#bottom-wrapper .widget-title {color:" . esc_attr($bottom_hd) . "}
		#bottom-wrapper a, #bottom-wrapper a:visited {color:" . esc_attr($bottom_link) . "}
		#bottom-wrapper a:hover {color:" . esc_attr($bottom_linkh) . "}
		#bottom-wrapper .widget_archive li, #bottom-wrapper .widget_categories li, #bottom-wrapper .widget_links li, #bottom-wrapper .widget_meta li, #bottom-wrapper .widget_nav_menu li, #bottom-wrapper .widget_pages li, #bottom-wrapper .widget_recent_comments li, #bottom-wrapper .widget_recent_entries li {border-color:" . esc_attr($bottom_widget_list_border) . " }"."\n";

	// styling the left and right widgets
		$lrwidget_text = get_theme_mod( 'lrwidget_text', '#505050' );
		$lrwidget_list_link = get_theme_mod( 'lrwidget_list_link', '#505050' );
		$lrwidget_list_linkh = get_theme_mod( 'lrwidget_list_linkh', '#B2995D' );
		$lrwidget_list_border = get_theme_mod( 'lrwidget_list_border', '#e6e6e6' );
		$custom .= "#sidebar-right, #sidebar-left {color:" . esc_attr($lrwidget_text) . " }
		.widget_archive a, .widget_categories a, .widget_links a, .widget_meta a, .widget_nav_menu a, .widget_pages a, .widget_recent_comments a, .widget_recent_entries a, .widget_archive a:visited, .widget_categories a:visited, .widget_links a:visited, .widget_meta a:visited, .widget_nav_menu a:visited, .widget_pages a:visited, .widget_recent_comments a:visited, .widget_recent_entries a:visited {color:" . esc_attr($lrwidget_list_link) . " }
		.widget_archive a:hover,.widget_categories a:hover,.widget_links a:hover,.widget_meta a:hover,.widget_nav_menu a:hover,.widget_pages a:hover,.widget_recent_comments a:hover,.widget_recent_entries a:hover {color:" . esc_attr($lrwidget_list_linkh) . " }
		.widget_archive li, .widget_categories li, .widget_links li, .widget_meta li, .widget_nav_menu li, .widget_pages li, .widget_recent_comments li, .widget_recent_entries li {border-color:" . esc_attr($lrwidget_list_border) . " }"."\n";

	// styling tags
		$lrtag_border = get_theme_mod( 'lrtag_border', '#d9d9d9' );
		$lrtag_text = get_theme_mod( 'lrtag_text', '#686868' );
		$lrtag_texth = get_theme_mod( 'lrtag_texth', '#f3f3f3' );
		$lrtag_bgh = get_theme_mod( 'lrtag_bgh', '#303030' );
		$bottom_tag_border = get_theme_mod( 'bottom_tag_border', '#b9bbb2' );
		$bottom_tag_text = get_theme_mod( 'bottom_tag_text', '#686868' );
		$bottom_tag_texth = get_theme_mod( 'bottom_tag_texth', '#f3f3f3' );
		$bottom_tag_bgh = get_theme_mod( 'bottom_tag_bgh', '#303030' );		
		$custom .= ".widget .tagcloud a, .widget .tagcloud a:visited {border-color:" . esc_attr($lrtag_border) . "; color:" . esc_attr($lrtag_text) . " }
		#bottom-wrapper .tagcloud a {border-color:" . esc_attr($bottom_tag_border) . "; color:" . esc_attr($bottom_tag_text) . " }
		.widget .tagcloud a:hover {background-color:" . esc_attr($lrtag_bgh) . "; color:" . esc_attr($lrtag_texth) . " }
		#bottom-wrapper .tagcloud a:hover {background-color:" . esc_attr($bottom_tag_bgh) . "; color:" . esc_attr($bottom_tag_texth) . " }"."\n";

	// footer styling
		$footer_bg = get_theme_mod( 'footer_bg', '#fff' );
		$footer_border = get_theme_mod( 'footer_border', '#e6e6e6' );
		$footer_colour = get_theme_mod( 'footer_colour', '#a7a7a7' );
		$footer_widget_title = get_theme_mod( 'footer_widget_title', '#a7a7a7' );
		$footer_link = get_theme_mod( 'footer_link', '#a7a7a7' );
		$footer_linkh = get_theme_mod( 'footer_linkh', '#505050' );
		$custom .= ".site-footer {background-color:" . esc_attr($footer_bg) . ";: border-color:" . esc_attr($footer_border) . "; color:" . esc_attr($footer_colour) . " }
		.site-footer .widget-title {color:" . esc_attr($footer_widget_title) . " }
		.site-footer a, .site-footer a:visited, #footer-menu li:after {color:" . esc_attr($footer_link) . " }
		.site-footer a:hover {color:" . esc_attr($footer_linkh) . " }
		"."\n";
	
	// social  colour
		$social_bg = get_theme_mod( 'social_bg', '#c4bf9f' );
		$social_icon = get_theme_mod( 'social_icon', '#ffffff' );
		$custom .= ".social-icons a { color: " . esc_attr($social_icon) . "; background-color:" . esc_attr($social_bg) . "}
		#image-navigation a { color: " . esc_attr($social_bg) . "}"."\n";
			
	// social  hover colour
		$social_hbg = get_theme_mod( 'social_hbg', '#d5d1b8' );
		$social_hicon = get_theme_mod( 'social_hicon', '#ffffff' );
		$custom .= ".social-icons a:hover { color: " . esc_attr($social_hicon) . "; background-color:" . esc_attr($social_hbg) . "}	
		#image-navigation a:hover { color: " . esc_attr($social_hbg) . "}"."\n";

	// mobile menu button styling
		$mobile_button_style = get_theme_mod( 'mobile_button_style', '#f3f3f3' );
		$mobile_button_styleh = get_theme_mod( 'mobile_button_styleh', '#000' );
		$custom .= ".menu-toggle { color: " . esc_attr($mobile_button_style) . "; border-color:" . esc_attr($mobile_button_style) . "}
		.menu-toggle:active,.menu-toggle:focus,.menu-toggle:hover,.menu-toggle.nobanner:active,.menu-toggle.nobanner:focus,.menu-toggle.nobanner:hover { border-color: " . esc_attr($mobile_button_styleh) . "; background-color:" . esc_attr($mobile_button_styleh) . "}"."\n";	


	// mobile menu button no banner styling
		$nobanner_mobile_button_style = get_theme_mod( 'nobanner_mobile_button_style', '#303030' );
		$nobanner_mobile_button_styleh = get_theme_mod( 'nobanner_mobile_button_styleh', '#000' );
		$custom .= ".menu-toggle.nobanner { color: " . esc_attr($nobanner_mobile_button_style) . "; border-color:" . esc_attr($nobanner_mobile_button_style) . "}"."\n";	

	// mobile menu link styling
		$mobile_menu_links = get_theme_mod( 'mobile_menu_links', '#000' );
		$mobile_menu_hlinks = get_theme_mod( 'mobile_menu_hlinks', '#b2995d' );
		$mobile_menu_link_border = get_theme_mod( 'mobile_menu_link_border', '#e6e6e6' );
		$mobile_menu_bg = get_theme_mod( 'mobile_menu_bg', '#f3f3f3' );
		$custom .= ".main-navigation.toggled-on a, .main-navigation.toggled-on li.home a { color: " . esc_attr($mobile_menu_links) . ";}
		.main-navigation.toggled-on a:hover, .main-navigation.toggled-on li.home a:hover,
		.main-navigation.toggled-on .nav-menu.nobanner li a:hover, .main-navigation.toggled-on .nav-menu.nobanner li.home a:hover { color: " . esc_attr($mobile_menu_hlinks) . ";}
		.toggled-on li { border-color: " . esc_attr($mobile_menu_link_border) . ";}
		.main-navigation.toggled-on .nav-menu { background-color: " . esc_attr($mobile_menu_bg) . ";}"."\n";	

	// Main menu link styles
		$nav_link_colour = get_theme_mod( 'nav_link_colour', '#ffffff' );
		$nav_link_colour_nobanner = get_theme_mod( 'nav_link_colour_nobanner', '#000000' );
		$custom .= ".main-navigation li a, .main-navigation li.home a { color: " . esc_attr($nav_link_colour) . ";}
		.main-navigation .nav-menu.nobanner a, .main-navigation .nav-menu.nobanner li.home a { color: " . esc_attr($nav_link_colour_nobanner) . ";}"."\n";	
	
	// Main Menu link hover and active colour
		$nav_link_colourh = get_theme_mod( 'nav_link_colourh', '#f7e5d2' );
		$nav_link_colourh_nobanner = get_theme_mod( 'nav_link_colourh_nobanner', '#b2995d' );
		$custom .= ".main-navigation li.home a:hover,	
		.main-navigation a:hover, 
		.main-navigation .current-menu-item > a, 
		.main-navigation .current-menu-item > a, 
		.main-navigation .current-menu-ancestor > a { color: " . esc_attr($nav_link_colourh) . ";}
		.main-navigation .nav-menu.nobanner li.home a:hover,	
		.main-navigation .nav-menu.nobanner a:hover,	
		.main-navigation .nav-menu.nobanner .current-menu-item > a,	
		.main-navigation .nav-menu.nobanner .current-menu-item > a, 
		.main-navigation .nav-menu.nobanner .current-menu-ancestor > a { color: " . esc_attr($nav_link_colourh_nobanner) . ";}"."\n";	
	

	// Main menu submenu styles
		$nav_submenu_colour = get_theme_mod( 'nav_submenu_colour', '#ffffff' );
		$nav_submenu_colour_nobanner = get_theme_mod( 'nav_submenu_colour_nobanner', '#444444' );
		$submenu_bg_nobanner = get_theme_mod( 'submenu_bg_nobanner', '#f5f5f5' );
		$custom .= ".main-navigation li li > a { color: " . esc_attr($nav_submenu_colour) . ";}
		.main-navigation .nav-menu.nobanner li li a { color: " . esc_attr($nav_submenu_colour_nobanner) . ";}
		.main-navigation .nav-menu.nobanner ul { background-color: " . esc_attr($submenu_bg_nobanner) . ";}"."\n";		
	
	// submenu borders
		$submenu_border = get_theme_mod( 'submenu_border', '#ffffff' );
		$submenu_border_nobanner = get_theme_mod( 'submenu_border_nobanner', '#000000' );
		$custom .= ".main-navigation li li a:hover { border-left-color:" . esc_attr($submenu_border) . "}
		.main-navigation .nav-menu.nobanner li li a:hover { border-left-color: " . esc_attr($submenu_border_nobanner) . ";}"."\n";
		
	// featured label bg colour
		$featured_bg = get_theme_mod( 'featured_bg', '#000000' );
		$featured_text = get_theme_mod( 'featured_text', '#ffffff' );
		$custom .= ".featured {background-color:" . esc_attr($featured_bg) . "; color: " . esc_attr($featured_text) . "}"."\n";

	//  Back to top button bg
		$backtop_bg = get_theme_mod( 'backtop_bg', '#000000' );
		$backtop_text = get_theme_mod( 'backtop_text', '#ffffff' );
		$custom .= ".back-to-top {color:" . esc_attr($backtop_text) ."; background-color:" . esc_attr($backtop_bg) ."}"."\n";
		
	//  Back to top button hover bg
		$backtop_hbg = get_theme_mod( 'backtop_hbg', '#565656' );
		$backtop_text = get_theme_mod( 'backtop_text', '#ffffff' );
		$custom .= ".back-to-top:hover { color:" . esc_attr($backtop_text) ."; background-color:" . esc_attr($backtop_hbg) ."}"."\n";
	
	// quote post format background
		$quotepf_bg = get_theme_mod( 'quotepf_bg', '#c4bf9f' );
		$quotepf_text = get_theme_mod( 'quotepf_text', '#ffffff' );
		$custom .= ".format-quote .entry-title, .format-quote p, .format-quote a { color: " . esc_attr($quotepf_text) . ";}
		.format-quote {background-color:" . esc_attr($quotepf_bg) . "}"."\n";
	
	// image post format title colour
		$imagepf_title = get_theme_mod( 'imagepf_title', '#cccccc' );
		$custom .= ".format-image .entry-title a, .grid .format-image .entry-title a { color: " . esc_attr($imagepf_title) . ";}"."\n";


	//  default button
		$default_button_bg = get_theme_mod( 'default_button_bg', '#ffffff' );
		$default_button_text_colour = get_theme_mod( 'default_button_text_colour', '#505050' );
		$default_button_border = get_theme_mod( 'default_button_border', '#c4c4c4' );
		$custom .= "button, input[type=\"button\"],input[type=\"submit\"],input[type=\"reset\"],
		.btn {color:" . esc_attr($default_button_text_colour) ."; border-color: ". esc_attr($default_button_border) ."; background-color:" . esc_attr($default_button_bg) ."}"."\n";		

	//  default button hover
		$default_button_bgh = get_theme_mod( 'default_button_bgh', '#303030' );
		$default_button_text_colourh = get_theme_mod( 'default_button_text_colourh', '#f3f3f3' );
		$default_button_hborder = get_theme_mod( 'default_button_hborder', '#303030' );
		$custom .= "button:hover, input[type=\"button\"]:hover,input[type=\"submit\"]:hover,input[type=\"reset\"]:hover,
		.btn:hover {color:" . esc_attr($default_button_text_colourh) ."; border-color: ". esc_attr($default_button_hborder) ."; background-color:" . esc_attr($default_button_bgh) ."}"."\n";	
	
	//  error page
		$error_text_colour = get_theme_mod( 'error_text_colour', '#ffffff' );
		$custom .= "#error-title, #error-message, #error-title:after {color:" . esc_attr($error_text_colour) ."}"."\n";	
	
	//  error button
		$error_button_bg = get_theme_mod( 'error_button_bg', '' );
		$error_button_text_colour = get_theme_mod( 'error_button_text_colour', '#ffffff' );
		$error_button_border = get_theme_mod( 'error_button_border', '#ffffff' );
		$custom .= "#error-button a, #error-button a:visited {color:" . esc_attr($error_button_text_colour) ."; border-color: ". esc_attr($error_button_border) ."; background-color:" . esc_attr($error_button_bg) ."}"."\n";	
	
	//  error button hover
		$error_button_bgh = get_theme_mod( 'error_button_bgh', '' );
		$error_button_text_colourh = get_theme_mod( 'error_button_text_colourh', '#ffffff' );
		$custom .= "#error-button a:hover {color:" . esc_attr($error_button_text_colourh) ."; border-color: ". esc_attr($error_button_bgh) ."; background-color:" . esc_attr($error_button_bgh) ."}"."\n";	
	

	//Output all the styles
	wp_add_inline_style( 'aberration-style', $custom );	
}
add_action( 'wp_enqueue_scripts', 'aberration_lite_inline_styles' );	