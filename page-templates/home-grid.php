<?php
/**
 * Template Name: Blog Grid Template
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main grid" role="main" <?php hybrid_attr( 'content' ); ?>>

			<?php 
			$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
			$args = apply_filters( 'bulan_blog_grid_query', array( 
				'post_type' => 'post',
				'paged'     => $paged
			) ); 
			?>
			<?php $wp_query = new WP_Query( $args ); ?>

			<?php if ( $wp_query->have_posts() ) : ?>

				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

					<?php if ( is_sticky() ) : ?>
						<?php get_template_part( 'content', 'home' ); ?>
					<?php else : ?>
						<?php get_template_part( 'content', 'blog-grid' ); ?>
					<?php endif; ?>

				<?php endwhile; ?>
				
				<?php get_template_part( 'loop', 'nav' ); // Loads the loop-nav.php template  ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; wp_reset_postdata(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
