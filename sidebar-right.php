<?php
/**
 * Right sidebar column. 
 * @package Aberration Lite
 */


if (   ! is_active_sidebar( 'blogright'  )
	&& ! is_active_sidebar( 'pageright' ) 
	)
	return;

if ( is_page() ) {   
	
	echo '<aside id="sidebar-right" class="widget-area" itemscope="" itemtype="http://schema.org/WPSideBar">';
	dynamic_sidebar( 'pageright' );	
	echo '</aside>';	

} else {

	echo '<aside id="sidebar-right" class="widget-area" itemscope="" itemtype="http://schema.org/WPSideBar">';  
	dynamic_sidebar( 'blogright' );
	echo '</aside>';
		
}
?>