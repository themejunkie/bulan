<?php get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main" <?php hybrid_attr( 'content' ); ?>>

			<?php if ( have_posts() ) : ?>

				<header class="page-header author-bio" <?php hybrid_attr( 'entry-author' ) ?>>
					<?php echo get_avatar( is_email( get_the_author_meta( 'user_email' ) ), apply_filters( 'bulan_author_bio_avatar_size', 90 ), '', esc_attr( get_the_author() ) ); ?>
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
				</header><!-- .page-header -->

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

				<?php get_template_part( 'loop', 'nav' ); // Loads the loop-nav.php template ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
