<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<a class="thumbnail-link" href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'medium', array( 'class' => 'entry-thumbnail', 'alt' => esc_attr( get_the_title() ) ) ); ?>
		</a>
	<?php endif; ?>

	<div class="entry-text-content">
		
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
				<?php endif; // End if categories ?>
			<?php endif; ?>
				
			<?php the_title( sprintf( '<h2 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '><a href="%s" rel="bookmark" itemprop="url">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		</header>

		<div class="entry-summary" <?php hybrid_attr( 'entry-summary' ); ?>>
			<?php the_excerpt(); ?>
		</div>

	</div>
	
</article><!-- #post-## -->
