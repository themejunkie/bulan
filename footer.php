		</div><!-- .wide-container -->
	</div><!-- #content -->

	<?php get_sidebar( 'footer' ); // Loads the sidebar-footer.php template.  ?>

	<footer id="colophon" class="site-footer" <?php hybrid_attr( 'footer' ); ?>>
		<div class="wide-container">

			<div class="site-info">
				<?php bulan_footer_text(); ?>
			</div><!-- .site-info -->

			<?php bulan_social_links(); // Get the social links data. ?>

		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
