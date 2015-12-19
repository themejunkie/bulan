<?php
// Theme prefix
$prefix = 'bulan-';

// Get the data set in customizer
$cat        = bulan_mod( $prefix . 'post-cat' );
$date       = bulan_mod( $prefix . 'post-date' );
$tag        = bulan_mod( $prefix . 'post-tag' );
$date_style = bulan_mod( $prefix . 'post-date-style' );

// Set up empty variable
$style = '';
if ( $date_style == 'absolute' ) {
	$style = esc_html( get_the_date() );
} else {
	$style = sprintf( __( '%s ago', 'bulan' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) );
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

	<header class="entry-header">

		<?php if ( 'post' == get_post_type() ) : ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'bulan' ) );
				if ( $categories_list && bulan_categorized_blog() && $cat ) :
			?>
			<span class="cat-links" <?php hybrid_attr( 'entry-terms', 'category' ); ?>>
				<?php echo $categories_list; ?>
			</span>
			<i class="fa fa-circle"></i>
			<?php endif; // End if categories ?>
		<?php endif; ?>

		<?php if ( $date ) : ?>
			<time class="published" datetime="<?php echo esc_html( get_the_date( 'c' ) ); ?>" <?php hybrid_attr( 'entry-published' ); ?>><?php echo esc_html( $style ); ?></time>
		<?php endif; ?>

		<?php the_title( '<h1 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '>', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<?php if ( has_excerpt() ) : ?>
		<div class="page-header">
			<?php the_excerpt(); ?>
		</div><!-- .page-header -->
	<?php endif; ?>

	<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'bulan' ),
				'after'  => '</div>',
			) );
		?>

	</div>

	<footer class="entry-footer">

		<?php
			$tags = get_the_tags();
			if ( $tags && $tag ) :
		?>
			<span class="tag-links" <?php hybrid_attr( 'entry-terms', 'post_tag' ); ?>>
				<?php foreach( $tags as $tag ) : ?>
					<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"><span>#</span><?php echo esc_attr( $tag->name ); ?></a>
				<?php endforeach; ?>
			</span>
		<?php endif; ?>

	</footer>

	<div class="jetpack-share-like">
		<?php if ( function_exists( 'sharing_display' ) ) { sharing_display( '', true ); } ?>
		<?php if ( class_exists( 'Jetpack_Likes' ) ) { $custom_likes = new Jetpack_Likes; echo $custom_likes->post_likes( '' ); } ?>
	</div>

</article><!-- #post-## -->
