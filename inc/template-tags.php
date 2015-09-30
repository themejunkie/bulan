<?php
/**
 * Custom template tags for this theme.
 * Eventually, some of the functionality here could be replaced by core features.
 * 
 * @package    Bulan
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

if ( ! function_exists( 'bulan_site_branding' ) ) :
/**
 * Site branding for the site.
 * 
 * Display site title by default, but user can change it with their custom logo.
 * They can upload it on Customizer page.
 * 
 * @since  1.0.0
 */
function bulan_site_branding() {

	// Get the customizer value.
	$prefix  = 'bulan-';
	$logo_id = bulan_mod( $prefix . 'logo' );

	// Check if logo available, then display it.
	if ( $logo_id ) :
		echo '<div id="logo" itemscope itemtype="http://schema.org/Brand">' . "\n";
			echo '<a href="' . esc_url( get_home_url() ) . '" itemprop="url" rel="home">' . "\n";
				echo '<img itemprop="logo" src="' . esc_url( wp_get_attachment_url( $logo_id ) ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" />' . "\n";
			echo '</a>' . "\n";
		echo '</div>' . "\n";

	// If not, then display the Site Title and Site Description.
	elseif ( display_header_text() ) :
		echo '<div id="logo">'. "\n";
			echo '<h1 class="site-title" ' . hybrid_get_attr( 'site-title' ) . '><a href="' . esc_url( get_home_url() ) . '" itemprop="url" rel="home"><span itemprop="headline">' . esc_attr( get_bloginfo( 'name' ) ) . '</span></a></h1>'. "\n";
		echo '</div>'. "\n";
	endif;

}
endif;

if ( ! function_exists( 'bulan_attachment_posted_on' ) ) :
/**
 * Attachment page meta information
 *
 * @since 1.0.0
 */
function bulan_attachment_posted_on() {

	// Theme prefix
	$prefix = 'bulan-';

	// Get the data set in customizer
	$date       = bulan_mod( $prefix . 'post-date' );
	$author     = bulan_mod( $prefix . 'post-author' );
	$date_style = bulan_mod( $prefix . 'post-date-style' );

	// Set up empty variable
	$style = '';
	if ( $date_style == 'absolute' ) {
		$style = esc_html( get_the_date() );
	} else {
		$style = sprintf( __( '%s ago', 'bulan' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) );
	}
	?>

	<?php if ( $date ) : ?>
		<time class="entry-date published entry-side" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" <?php hybrid_attr( 'entry-published' ); ?>><?php printf( __( 'Published: %s', 'bulan' ), '<span>' . $style . '</span>' ); ?></time>
	<?php endif; ?>
	
	<?php if ( $author ) : ?>
		<span class="entry-author author vcard entry-side" <?php hybrid_attr( 'entry-author' ) ?>>
			<?php printf( __( 'Author: %s', 'bulan' ), '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" itemprop="url"><span itemprop="name">' . esc_html( get_the_author() ) . '</span></a>' ); ?>
		</span>
	<?php endif; ?>

	<?php if ( is_attachment() && wp_attachment_is_image() ) : ?>

		<?php 
		$metadata = wp_get_attachment_metadata(); // Retrieve attachment metadata.
		$camera   = $metadata['image_meta']['camera'];
		$aperture = $metadata['image_meta']['aperture'];
		$focal    = $metadata['image_meta']['focal_length'];
		$iso      = $metadata['image_meta']['iso'];
		$shutter  = $metadata['image_meta']['shutter_speed'];
		?>
		
		<span class="full-size-link entry-side">
			<?php printf( __( 'Size: %s', 'bulan' ), '<a href="' . esc_url( wp_get_attachment_url() ) . '">' . $metadata['width'] . ' &times; ' . $metadata['height'] . '</a>' ); ?>
		</span>
		
		<?php if ( $camera ) : ?>
			<span class="camera entry-side">
				<?php printf( __( 'Camera: %s', 'bulan' ), '<span>' . $camera . '</span>' ); ?>
			</span>
		<?php endif; ?>
		
		<?php if ( $aperture ) : ?>
			<span class="apparture entry-side">
				<?php printf( __( 'Aperture: %s', 'bulan' ), '<span>' . $aperture . '</span>' ); ?>
			</span>
		<?php endif; ?>
		
		<?php if ( $focal ) : ?>
			<span class="focal-length entry-side">
				<?php printf( __( 'Focal Length: %s', 'bulan' ), '<span>' . $focal . '</span>' ); ?>
			</span>
		<?php endif; ?>
		
		<?php if ( $iso ) : ?>
			<span class="iso entry-side">
				<?php printf( __( 'ISO: %s', 'bulan' ), '<span>' . $iso . '</span>' ); ?>
			</span>
		<?php endif; ?>
		
		<?php if ( $shutter ) : ?>
			<span class="shutter-speed entry-side">
				<?php printf( __( 'Shutter Speed: %s', 'bulan' ), '<span>' . $shutter . '</span>' ); ?>
			</span>
		<?php endif; ?>
	
	<?php endif; ?>

	<?php
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @since  1.0.0
 * @return bool
 */
function bulan_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'bulan_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'bulan_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so bulan_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so bulan_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in bulan_categorized_blog.
 *
 * @since 1.0.0
 */
function bulan_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'bulan_categories' );
}
add_action( 'edit_category', 'bulan_category_transient_flusher' );
add_action( 'save_post',     'bulan_category_transient_flusher' );

if ( ! function_exists( 'bulan_post_author' ) ) :
/**
 * Author post informations.
 *
 * @since  1.0.0
 */
function bulan_post_author() {

	// Theme prefix
	$prefix = 'bulan-';

	// Get the data set in customizer
	$enable = bulan_mod( $prefix . 'post-author' );

	// Disable if user choose it.
	if ( $enable == 0 ) {
		return;
	}

	// Bail if not on the single post.
	if ( ! is_single() ) {
		return;
	}

	// Bail if user hasn't fill the Biographical Info field.
	if ( ! get_the_author_meta( 'description' ) ) {
		return;
	}
?>

	<div class="author-bio" <?php hybrid_attr( 'entry-author' ) ?>>
		<?php echo get_avatar( is_email( get_the_author_meta( 'user_email' ) ), apply_filters( 'bulan_author_bio_avatar_size', 80 ), '', strip_tags( get_the_author() ) ); ?>
		<div class="description">
			<h3 class="author-title name">
				<a class="author-name url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author" itemprop="url"><span itemprop="name"><?php echo strip_tags( get_the_author() ); ?></span></a>
			</h3>
			<p class="bio" itemprop="description"><?php echo stripslashes( get_the_author_meta( 'description' ) ); ?></p>
			<ul class="author-social">
				<?php if ( get_the_author_meta( 'url' ) ) : ?>
					<li class="website">
						<a href="<?php echo esc_url( get_the_author_meta( 'url' ) ); ?>"><i class="fa fa-home"></i></a>
					</li>
				<?php endif; ?>
				<?php if ( get_the_author_meta( 'twitter' ) ) : ?>
					<li class="twitter">
						<a href="<?php echo esc_url( get_the_author_meta( 'twitter' ) ); ?>"><i class="fa fa-twitter"></i></a>
					</li>
				<?php endif; ?>
				<?php if ( get_the_author_meta( 'facebook' ) ) : ?>
					<li class="facebook">
						<a href="<?php echo esc_url( get_the_author_meta( 'facebook' ) ); ?>"><i class="fa fa-facebook"></i></a>
					</li>
				<?php endif; ?>
				<?php if ( get_the_author_meta( 'gplus' ) ) : ?>
					<li class="gplus">
						<a href="<?php echo esc_url( get_the_author_meta( 'gplus' ) ); ?>"><i class="fa fa-google-plus"></i></a>
					</li>
				<?php endif; ?>
				<?php if ( get_the_author_meta( 'instagram' ) ) : ?>
					<li class="instagram">
						<a href="<?php echo esc_url( get_the_author_meta( 'instagram' ) ); ?>"><i class="fa fa-instagram"></i></a>
					</li>
				<?php endif; ?>
				<?php if ( get_the_author_meta( 'linkedin' ) ) : ?>
					<li class="linkedin">
						<a href="<?php echo esc_url( get_the_author_meta( 'linkedin' ) ); ?>"><i class="fa fa-linkedin"></i></a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</div><!-- .author-bio -->

<?php
}
endif;

if ( ! function_exists( 'bulan_related_posts' ) ) :
/**
 * Related posts.
 *
 * @since  1.0.0
 */
function bulan_related_posts() {
	global $post;

	// Theme prefix
	$prefix = 'bulan-';

	// Get the data set in customizer
	$enable  = bulan_mod( $prefix . 'related-posts' );
	$img     = bulan_mod( $prefix . 'related-posts-img' );
	$title   = bulan_mod( $prefix . 'related-posts-title' );

	// Disable if user choose it.
	if ( $enable == 0 ) {
		return;
	}

	// Get the taxonomy terms of the current page for the specified taxonomy.
	$terms = wp_get_post_terms( $post->ID, 'category', array( 'fields' => 'ids' ) );

	// Bail if the term empty.
	if ( empty( $terms ) ) {
		return;
	}
	
	// Posts query arguments.
	$query = array(
		'post__not_in' => array( $post->ID ),
		'tax_query'    => array(
			array(
				'taxonomy' => 'category',
				'field'    => 'id',
				'terms'    => $terms,
				'operator' => 'IN'
			)
		),
		'posts_per_page' => 3,
		'post_type'      => 'post',
	);

	// Allow dev to filter the query.
	$args = apply_filters( 'bulan_related_posts_args', $query );

	// The post query
	$related = new WP_Query( $args );

	if ( $related->have_posts() ) : ?>

		<div class="related-posts">
			<h3><?php echo wp_filter_post_kses( $title ); ?></h3>
			<ul>
				<?php while ( $related->have_posts() ) : $related->the_post(); ?>
					<li>
						<?php if ( has_post_thumbnail() && $img ) : ?>
							<a class="thumbnail-link" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large', array( 'class' => 'related-thumbnail', 'alt' => esc_attr( get_the_title() ) ) ); ?></a>
						<?php endif; ?>
						<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
						<time class="published" datetime="<?php echo esc_html( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>
	
	<?php endif;

	// Restore original Post Data.
	wp_reset_postdata();

}
endif;

if ( ! function_exists( 'bulan_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since  1.0.0
 */
function bulan_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>" <?php hybrid_attr( 'comment' ); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="comment-container">
			<p <?php hybrid_attr( 'comment-content' ); ?>><?php _e( 'Pingback:', 'bulan' ); ?> <span <?php hybrid_attr( 'comment-author' ); ?>><span itemprop="name"><?php comment_author_link(); ?></span></span> <?php edit_comment_link( __( '(Edit)', 'bulan' ), '<span class="edit-link">', '</span>' ); ?></p>
		</article>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>" <?php hybrid_attr( 'comment' ); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="comment-container">

			<div class="comment-avatar">
				<?php echo get_avatar( $comment, apply_filters( 'bulan_comment_avatar_size', 125 ) ); ?>
				<span class="name" <?php hybrid_attr( 'comment-author' ); ?>><span itemprop="name"><?php echo get_comment_author_link(); ?></span></span>
				<?php echo bulan_comment_author_badge(); ?>
			</div>

			<div class="comment-body">
				<div class="comment-wrapper">
						
					<div class="comment-head">
						<?php
							printf( '<span class="date"><a href="%1$s" ' . hybrid_get_attr( 'comment-permalink' ) . '><time datetime="%2$s" ' . hybrid_get_attr( 'comment-published' ) . '>%3$s</time></a> %4$s</span>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'bulan' ), get_comment_date(), get_comment_time() ),
								sprintf( __( '%1$s&middot; Edit%2$s', 'bulan' ), '<a href="' . get_edit_comment_link() . '" title="' . esc_attr__( 'Edit Comment', 'bulan' ) . '">', '</a>' )
							);
						?>
					</div><!-- comment-head -->
					
					<div class="comment-content comment-entry" <?php hybrid_attr( 'comment-content' ); ?>>
						<?php if ( '0' == $comment->comment_approved ) : ?>
							<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'bulan' ); ?></p>
						<?php endif; ?>
						<?php comment_text(); ?>
						<span class="reply">
							<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( '<i class="fa fa-reply"></i> Reply', 'bulan' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
						</span><!-- .reply -->
					</div><!-- .comment-content -->

				</div>
			</div>

		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'bulan_comment_author_badge' ) ) :
/**
 * Custom badge for post author comment
 * 
 * @since  1.0.0
 */
function bulan_comment_author_badge() {

	// Set up empty variable
	$output = '';

	// Get comment classes
	$classes = get_comment_class();

	if ( in_array( 'bypostauthor', $classes ) ) {
		$output = '<span class="author-badge">' . __( 'Author', 'bulan' ) . '</span>';
	}

	// Display the badge
	return apply_filters( 'bulan_comment_author_badge', $output );
}
endif;

if ( ! function_exists( 'bulan_social_links' ) ) :
/**
 * Social profile links
 * 
 * @since  1.0.0
 */
function bulan_social_links() {

	// Theme prefix
	$prefix = 'bulan-';

	// Get the data set in customizer
	$twitter   = bulan_mod( $prefix . 'twitter' );
	$facebook  = bulan_mod( $prefix . 'facebook' );
	$gplus     = bulan_mod( $prefix . 'gplus' );
	$linkedin  = bulan_mod( $prefix . 'linkedin' );
	$dribbble  = bulan_mod( $prefix . 'dribbble' );
	$instagram = bulan_mod( $prefix . 'instagram' );

	// Display the data
	echo '<div class="social-links">';
		if ( $twitter ) {
			echo '<a href="' . esc_url( $twitter ) . '"><i class="fa fa-twitter"></i></a>';
		}
		if ( $facebook ) {
			echo '<a href="' . esc_url( $facebook ) . '"><i class="fa fa-facebook"></i></a>';
		}
		if ( $gplus ) {
			echo '<a href="' . esc_url( $gplus ) . '"><i class="fa fa-google-plus"></i></a>';
		}
		if ( $linkedin ) {
			echo '<a href="' . esc_url( $linkedin ) . '"><i class="fa fa-linkedin"></i></a>';
		}
		if ( $dribbble ) {
			echo '<a href="' . esc_url( $dribbble ) . '"><i class="fa fa-dribbble"></i></a>';
		}
		if ( $instagram ) {
			echo '<a href="' . esc_url( $instagram ) . '"><i class="fa fa-instagram"></i></a>';
		}
	echo '</div>';

}
endif;

if ( ! function_exists( 'bulan_footer_text' ) ) :
/**
 * Footer Text
 */
function bulan_footer_text() {

	// Theme prefix
	$prefix = 'bulan-';

	// Get the customizer data 
	$footer_text = bulan_mod( $prefix . 'footer-text' );

	// Display the data
	echo '<p class="copyright">' . stripslashes( $footer_text ) . '</p>';
	
}
endif;

if ( ! function_exists( 'bulan_posts_query_404' ) ) :
/**
 * Custom query to display latest posts on 404 page.
 * 
 * @since  1.0.0
 */
function bulan_posts_query_404() {

	// Posts arguments
	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => 6
	);

	// Allow dev to filter the arguments
	$posts = apply_filters( 'bulan_posts_query_404_args', $args );

	// Our hero!
	$posts = new WP_Query( $args );

	// Display the posts
	if ( $posts->have_posts() ) :
		while ( $posts->have_posts() ) : $posts->the_post();
			get_template_part( 'content', '404' );
		endwhile;
	endif;

	// Reset the query.
	wp_reset_postdata();

}
endif;