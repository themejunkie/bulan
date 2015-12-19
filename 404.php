<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">

				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'bulan' ); ?></h1>
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search or browse our latest posts below.', 'bulan' ); ?></p>
				</header><!-- .page-header -->

				<?php bulan_posts_query_404(); // Custom query to display latest posts. ?>

			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
