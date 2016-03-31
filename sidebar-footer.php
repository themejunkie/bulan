<?php
// Return early if no widget found.
if ( is_active_sidebar( 'footer-left' ) || is_active_sidebar( 'footer-center' ) || is_active_sidebar( 'footer-right' ) ) :
?>

<div id="tertiary" class="sidebar-footer">
	<div class="wide-container">

		<div class="footer-column footer-column-left">
			<?php dynamic_sidebar( 'footer-left' ); ?>
		</div>

		<div class="footer-column footer-column-center">
			<?php dynamic_sidebar( 'footer-center' ); ?>
		</div>

		<div class="footer-column footer-column-right">
			<?php dynamic_sidebar( 'footer-right' ); ?>
		</div>

	</div><!-- .container -->
</div><!-- #tertiary -->

<?php endif; ?>
