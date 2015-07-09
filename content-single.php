<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

	<header class="entry-header">

		<?php if ( 'post' == get_post_type() ) : ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'bulan' ) );
				if ( $categories_list && bulan_categorized_blog() ) :
			?>
			<span class="cat-links" <?php hybrid_attr( 'entry-terms', 'category' ); ?>>
				<?php echo $categories_list; ?>
			</span>
			<i class="fa fa-circle"></i>
			<?php endif; // End if categories ?>
		<?php endif; ?>

		<time class="published" datetime="<?php echo esc_html( get_the_date( 'c' ) ); ?>" <?php hybrid_attr( 'entry-published' ); ?>><?php echo esc_html( get_the_date() ); ?></time>

		<?php the_title( '<h1 class="page-title" ' . hybrid_get_attr( 'entry-title' ) . '>', '</h1>' ); ?>

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
			if ( $tags ) :
		?>
			<span class="tag-links" <?php hybrid_attr( 'entry-terms', 'post_tag' ); ?>>
				<?php foreach( $tags as $tag ) : ?>
					<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"><span>#</span><?php echo esc_attr( $tag->name ); ?></a>
				<?php endforeach; ?>
			</span>
		<?php endif; ?>

	</footer>
	
</article><!-- #post-## -->
