<?php

/**
 * Footer sidebar at the bottom of the page 
 * @package Aberration Lite
 * 
 */


if (   ! is_active_sidebar( 'footer'  )	)

		return;
	// If we get this far, we have widgets. Let do this.
?>

<div id="sidebar-footer-wrapper">
    <aside id="sidebar-footer" class="widget-area">
         <?php dynamic_sidebar( 'footer' ); ?>
    </aside>
</div>
