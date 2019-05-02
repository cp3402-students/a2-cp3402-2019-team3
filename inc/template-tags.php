<?php
/**
 * Custom template tags for this theme.
 * Eventually, some of the functionality here could be replaced by core features.
 * @package Aberration Lite
 */
 
 


// Prints HTML with meta information for the current post-date/time and author.
if ( ! function_exists( 'aberration_lite_posted_on' ) ) :

function aberration_lite_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s" itemprop="datePublished">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s" >%2$s</time><time class="updated" datetime="%3$s" itemprop="dateUpdated">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'aberration-lite' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'aberration-lite' ),
		'<span class="author vcard" itemprop="name"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	
if ( esc_attr(get_theme_mod( 'show_entry_post_date', 1 )) ) :
	echo '<span class="posted-on">' . $posted_on . '</span>';
endif;

if ( esc_attr(get_theme_mod( 'show_entry_post_author', 0 )) ) :	
	echo '<span class="byline" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author"> ' . $byline . '</span>'; // WPCS: XSS OK.
endif;

if ( esc_attr(get_theme_mod( 'show_comments_link', 0 )) ) :
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'aberration-lite' ), esc_html__( '1 Comment', 'aberration-lite' ), esc_html__( '% Comments', 'aberration-lite' ) );
		echo '</span>';
	}
endif;

if( esc_attr(get_theme_mod( 'show_edit', 0 ) ) ) {	
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'aberration-lite' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);	
	}	
}
endif;


/**
 * meta information for the single post page
 */
if ( ! function_exists( 'aberration_lite_single_posted_on' ) ) :
function aberration_lite_single_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s" itemprop="datePublished">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s" itemprop="datePublished">%2$s</time><time class="updated" datetime="%3$s" itemprop="dateUpdated">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'aberration-lite' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'aberration-lite' ),
		'<span class="author vcard" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" itemprop="url"><span itemprop="name">' . esc_html( get_the_author() ) . '</span></a></span>'
	);
	
	
	$format = get_post_format();
	if ( current_theme_supports( 'post-formats', $format ) ) {
		printf( '<span class="entry-format"><a href="%2$s">%3$s %1$s</a></span>',
			sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Post', 'Used After post format.', 'aberration-lite' ) ),
			esc_url( get_post_format_link( $format ) ),
			get_post_format_string( $format )
		);
	}	


	echo '<span class="posted-on">' . $posted_on . '</span>';
		if ( esc_attr(get_theme_mod( 'show_single_post_author', 0 )) ) :
			echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
		endif;
}
endif;


// Meta info for the aside post format
if ( ! function_exists( 'aberration_lite_aside_posted_on' ) ) :

function aberration_lite_aside_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'aberration-lite' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);
	
if ( esc_attr(get_theme_mod( 'show_entry_post_date', 1 )) ) :
	echo '<span class="posted-on">' . $posted_on . '</span>';
endif;
}
endif;




// Prints HTML with meta information for the categories, tags and comments.
if ( ! function_exists( 'aberration_lite_entry_footer' ) ) :

function aberration_lite_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		 if( esc_attr(get_theme_mod( 'show_single_categories', 1 ) ) ) :
		$categories_list = get_the_category_list( esc_html__( ', ', 'aberration-lite' ) );
		if ( $categories_list && aberration_lite_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'aberration-lite' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}
		endif;
		/* translators: used between list items, there is a space after the comma */
		if ( !is_search() && ( esc_attr(get_theme_mod( 'show_tags_list', 1 ) ) ) ):
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'aberration-lite' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'aberration-lite' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
		endif;
	}

	if ( ! is_search () && ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'aberration-lite' ), esc_html__( '1 Comment', 'aberration-lite' ), esc_html__( '% Comments', 'aberration-lite' ) );
		echo '</span>';
	}

if( esc_attr(get_theme_mod( 'show_edit', 0 ) ) ) :	
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'aberration-lite' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
	endif;
}
endif;




/**
 * Multi-page navigation.
 */
if ( ! function_exists( 'aberration_lite_multipage_nav' ) ) :
function aberration_lite_multipage_nav() {
	wp_link_pages( array(
		'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'aberration-lite' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
		'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'aberration-lite' ) . ' </span>%',
		'separator'   => ', ',
	) );
}
endif;

/**
 * Blog pagination when more than one page of post summaries.
 * Add classes to next_posts_link and previous_posts_link
 */
add_filter('next_posts_link_attributes', 'aberration_lite_posts_link_attributes_1');
add_filter('previous_posts_link_attributes', 'aberration_lite_posts_link_attributes_2');

function aberration_lite_posts_link_attributes_1() {
    return 'class="post-nav-older"';
}
function aberration_lite_posts_link_attributes_2() {
    return 'class="post-nav-newer"';
}

// Output the pagination navigation
if ( ! function_exists( 'aberration_lite_blog_pagination' ) ) :
function aberration_lite_blog_pagination() {	
		echo '<div class="pagination clearfix">';
		echo get_next_posts_link( __('Older Posts', 'aberration-lite'));		
		echo get_previous_posts_link( __('Newer Posts', 'aberration-lite'));
		echo '</div>';	
}
endif;


// Output the format gallery pagination 
if ( ! function_exists( 'aberration_lite_gallery_pagination' ) ) :
function aberration_lite_gallery_pagination() {	
		echo '<div class="gallery-pagination clearfix">';
		echo get_next_posts_link( __('Older Posts', 'aberration-lite'));		
		echo get_previous_posts_link( __('Newer Posts', 'aberration-lite'));
		echo '</div>';	
}
endif;


/**
 * Single Post previous or next navigation.
 */

if ( ! function_exists( 'aberration_lite_post_pagination' ) ) :
function aberration_lite_post_pagination() {
	the_post_navigation( array(	
		'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post', 'aberration-lite' ) . '</span> ' .
			'<span class="screen-reader-text">' . __( 'Next Post:', 'aberration-lite' ) . '</span> ' .
			'<span class="post-title">%title</span>',
			
		'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous Post', 'aberration-lite' ) . '</span> ' .
			'<span class="screen-reader-text">' . __( 'Previous Post:', 'aberration-lite' ) . '</span> ' .
			'<span class="post-title">%title</span>',
	) );
}
endif;





/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 * Custom filter for changing the default archive title labels.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
 
if ( ! function_exists( 'aberration_lite_archive_title' ) ) :

function aberration_lite_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( ( '%s' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( esc_html__( 'Posts Tagged with %s', 'aberration-lite' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( esc_html__( 'Posts by %s', 'aberration-lite' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( esc_html__( 'Posts from: %s', 'aberration-lite' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'aberration-lite' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( esc_html__( 'Posts from %s', 'aberration-lite' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'aberration-lite' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( esc_html__( 'Posts from %s', 'aberration-lite' ), get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'aberration-lite' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = esc_html_x( 'Asides', 'post format archive title', 'aberration-lite' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = esc_html_x( 'Galleries', 'post format archive title', 'aberration-lite' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = esc_html_x( 'Images', 'post format archive title', 'aberration-lite' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = esc_html_x( 'Videos', 'post format archive title', 'aberration-lite' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = esc_html_x( 'Quotes', 'post format archive title', 'aberration-lite' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = esc_html_x( 'Links', 'post format archive title', 'aberration-lite' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = esc_html_x( 'Statuses', 'post format archive title', 'aberration-lite' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = esc_html_x( 'Audio', 'post format archive title', 'aberration-lite' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = esc_html_x( 'Chats', 'post format archive title', 'aberration-lite' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( esc_html__( 'Archives: %s', 'aberration-lite' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( esc_html__( '%1$s: %2$s', 'aberration-lite' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = esc_html__( 'Archives', 'aberration-lite' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;  // WPCS: XSS OK.
	}
}
endif;

if ( ! function_exists( 'aberration_lite_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function aberration_lite_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;  // WPCS: XSS OK.
	}
}
endif;




// Returns true if a blog has more than 1 category.
function aberration_lite_categorized_blog() {
	
	if ( false === ( $all_the_cool_cats = get_transient( 'aberration_lite_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'aberration_lite_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so aberration_lite_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so aberration_lite_categorized_blog should return false.
		return false;
	}
}

// Flush out the transients used in aberration_lite_categorized_blog.
function aberration_lite_category_transient_flusher() {
	
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'aberration_lite_categories' );
}
add_action( 'edit_category', 'aberration_lite_category_transient_flusher' );
add_action( 'save_post',     'aberration_lite_category_transient_flusher' );
