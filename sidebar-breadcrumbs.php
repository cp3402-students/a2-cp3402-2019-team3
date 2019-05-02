<?php

/**
 * Breadcrumbs sidebar 
 * @package Aberration Lite
 * 
 */


if (   ! is_active_sidebar( 'breadcrumbs'  )	)

		return;
	// If we get this far, we have widgets. Let do this.
?>

<div id="sidebar-breadcrumbs-wrapper" class="container">
    <div id="breadcrumbs" class="widget-area row">
	<aside class="col-md-12">
         <?php dynamic_sidebar( 'breadcrumbs' ); ?>
    </aside>
	</div>
</div>
