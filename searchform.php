<?php
/**
 * The template for displaying search forms 
 * @package Aberration Lite
 */
?>



<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<span class="screen-reader-text"><?php _x( 'Search for:', 'Screen reader text', 'aberration-lite' ); ?></span>
	<div class="form-group">		
      		<input type="text" class="form-control" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" placeholder="<?php _x( 'Enter search words', 'Search field placeholder','aberration-lite' ) ; ?>">
   </div>           
   <div class="form-group">
        <input class="button-search" type="submit" value="<?php echo _x( 'Search', 'submit button', 'aberration-lite' ); ?>">   
    </div>
</form>   
