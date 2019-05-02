<?php
/**
 * Left sidebar column for the blog and pages. 
 * @package Aberration Lite
 */


if (   ! is_active_sidebar( 'pageleft'  )
	&& ! is_active_sidebar( 'blogleft' ) 
	)
	return;

if ( is_page() ) {
	
	echo '<aside id="sidebar-left" class="widget-area" itemscope="" itemtype="http://schema.org/WPSideBar">';    
	dynamic_sidebar( 'pageleft' );
	echo '</aside>';
	
} else {
	
	echo '<aside id="sidebar-left" class="widget-area" itemscope="" itemtype="http://schema.org/WPSideBar">';   
	dynamic_sidebar( 'blogleft' );
	echo '</aside>';
	
}
?>