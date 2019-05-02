<?php
/**
 * Custom functions that act independently of the theme templates.
 * Eventually, some of the functionality here could be replaced by core features.
 * @package Aberration Lite
 */

// Adds custom classes to the array of body classes.
function aberration_lite_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'aberration_lite_body_classes' );


/**
 * Move the More Link outside from the contents last summary paragraph tag.
 */
if ( ! function_exists( 'aberration_lite_move_more_link' ) ) :
	function aberration_lite_move_more_link($link) {
			$link = '<p class="more-link-wrapper">'.$link.'</p>';
			return $link;
		}
	add_filter('the_content_more_link', 'aberration_lite_move_more_link');
endif;


/**
 * Filter the except length to the users option setting.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function aberration_lite_custom_excerpt_length( $length ) {
	$excerptlength = esc_attr(get_theme_mod( 'excerpt_limit', '50' ));
    return $excerptlength;
}
add_filter( 'excerpt_length', 'aberration_lite_custom_excerpt_length', 999 );

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function aberration_lite_excerpt_more( $more ) {
	
    return sprintf( '&hellip;<p class="more-link-wrapper"><a class="more-link" href="%1$s">%2$s</a></p>',
        get_permalink( get_the_ID() ),
        esc_html__( 'Continue', 'aberration-lite' )
    );
}
add_filter( 'excerpt_more', 'aberration_lite_excerpt_more' );



/**
 * Special thanks to Justin Tadlock for this.
 * http://justintadlock.com/archives/2012/08/27/post-formats-quote
 */

function aberration_lite_quote_content( $content ) {

	/* Check if we're displaying a 'quote' post. */
	if ( has_post_format( 'quote' ) ) {

		/* Match any <blockquote> elements. */
		preg_match( '/<blockquote.*?>/', $content, $matches );

		/* If no <blockquote> elements were found, wrap the entire content in one. */
		if ( empty( $matches ) )
			$content = "<blockquote>{$content}</blockquote>";
	}

	return $content;
}
add_filter( 'the_content', 'aberration_lite_quote_content' );

/**
 * Custom comments style
 * @package Aberration Lite
 */

if (!function_exists('aberration_lite_comment')) {
function aberration_lite_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>

<li>                        
	<div class="comment-wrapper">
		
			<div class="comment-info">
				<?php echo get_avatar($comment, 50); ?>
				<span class="comment_date">
                
				<cite class="fn"><?php echo get_comment_author_link(); ?></cite>
                        		
					<p><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php echo get_comment_date() . ' at ' . get_comment_time() ?></a>	
					<?php edit_comment_link( esc_html__( 'Edit', 'aberration-lite' ), '', '' ); ?>	
					<?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']) ) ); ?>		</p>
			</div>
        
			<div id="comment-<?php echo comment_ID(); ?>" class="comment">
				<?php comment_text(); ?>
			</div>
		</div>
	                         
                
<?php if ($comment->comment_approved == '0') : ?>
<p><em><?php esc_html_e('Your comment is awaiting moderation.', 'aberration-lite'); ?></em></p>
<?php endif; ?>
<?php 
}
}

	