<?php
/**
 * Social widget.
 *
 * @package    Bulan
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class Bulan_Social_Widget extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'   => 'widget_social',
			'description' => __( 'Display your social media icons.', 'bulan' )
		);

		// Create the widget.
		parent::__construct(
			'bulan-social',                // $this->id_base
			__( 'Social Icons', 'bulan' ), // $this->name
			$widget_options                // $this->widget_options
		);
	}

	/**
	 * Outputs the widget based on the arguments input through the widget controls.
	 *
	 * @since 1.0.0
	 */
	function widget( $args, $instance ) {
		extract( $args );

		// Output the theme's $before_widget wrapper.
		echo $before_widget;

		// If the title not empty, display it.
		if ( $instance['title'] ) {
			echo $before_title . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $after_title;
		}

			// Display the social icons.
			echo '<div class="social-icons">';
				if ( $instance['facebook'] ) {
					echo '<a class="facebook" href="' . esc_url( $instance['facebook'] ) . '"><i class="fa fa-facebook"></i></a>';
				} 
				if ( $instance['twitter'] ) {
					echo '<a class="twitter" href="' . esc_url( $instance['twitter'] ) . '"><i class="fa fa-twitter"></i></a>';
				}
				if ( $instance['gplus'] ) {
					echo '<a class="google-plus" href="' . esc_url( $instance['gplus'] ) . '"><i class="fa fa-google-plus"></i></a>';
				}
				if ( $instance['pinterest'] ) {
					echo '<a class="pinterest" href="' . esc_url( $instance['pinterest'] ) . '"><i class="fa fa-pinterest"></i></a>';
				}
				if ( $instance['linkedin'] ) {
					echo '<a class="linkedin" href="' . esc_url( $instance['linkedin'] ) . '"><i class="fa fa-linkedin"></i></a>';
				}
				if ( $instance['instagram'] ) {
					echo '<a class="instagram" href="' . esc_url( $instance['instagram'] ) . '"><i class="fa fa-instagram"></i></a>';
				}
				if ( $instance['rss'] ) {
					echo '<a class="rss" href="' . esc_url( $instance['rss'] ) . '"><i class="fa fa-rss"></i></a>';
				}
			echo '</div>';

		// Close the theme's widget wrapper.
		echo $after_widget;

	}

	/**
	 * Updates the widget control options for the particular instance of the widget.
	 *
	 * @since 1.0.0
	 */
	function update( $new_instance, $old_instance ) {

		$instance = $new_instance;

		$instance['title']      = strip_tags( $new_instance['title'] );
		$instance['facebook']   = esc_url( $new_instance['facebook'] );
		$instance['twitter']    = esc_url( $new_instance['twitter'] );
		$instance['gplus']      = esc_url( $new_instance['gplus'] );
		$instance['pinterest']  = esc_url( $new_instance['pinterest'] );
		$instance['linkedin']   = esc_url( $new_instance['linkedin'] );
		$instance['instagram']  = esc_url( $new_instance['instagram'] );
		$instance['rss']        = esc_url( $new_instance['rss'] );

		return $instance;
	}

	/**
	 * Displays the widget control options in the Widgets admin screen.
	 *
	 * @since 1.0.0
	 */
	function form( $instance ) {

		// Default value.
		$defaults = array(
			'title'      => esc_html__( 'Follow us', 'bulan' ),
			'facebook'   => '',
			'twitter'    => '',
			'gplus'      => '',
			'pinterest'  => '',
			'linkedin'   => '',
			'instagram'  => '',
			'rss'        => ''
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( 'Title', 'bulan' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'facebook' ); ?>">
				<?php _e( 'Facebook', 'bulan' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo esc_url( $instance['facebook'] ); ?>" placeholder="<?php echo  esc_attr( 'http://' ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'twitter' ); ?>">
				<?php _e( 'Twitter', 'bulan' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo esc_url( $instance['twitter'] ); ?>" placeholder="<?php echo  esc_attr( 'http://' ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'gplus' ); ?>">
				<?php _e( 'Google Plus', 'bulan' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'gplus' ); ?>" name="<?php echo $this->get_field_name( 'gplus' ); ?>" value="<?php echo esc_url( $instance['gplus'] ); ?>" placeholder="<?php echo  esc_attr( 'http://' ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'pinterest' ); ?>">
				<?php _e( 'Pinterest', 'bulan' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" value="<?php echo esc_url( $instance['pinterest'] ); ?>" placeholder="<?php echo  esc_attr( 'http://' ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'linkedin' ); ?>">
				<?php _e( 'LinkedIn', 'bulan' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="<?php echo esc_url( $instance['linkedin'] ); ?>" placeholder="<?php echo  esc_attr( 'http://' ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'instagram' ); ?>">
				<?php _e( 'Instagram', 'bulan' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" value="<?php echo esc_url( $instance['instagram'] ); ?>" placeholder="<?php echo  esc_attr( 'http://' ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'rss' ); ?>">
				<?php _e( 'RSS Feed', 'bulan' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" value="<?php echo esc_url( $instance['rss'] ); ?>" placeholder="<?php echo  esc_attr( 'http://' ); ?>" />
		</p>

	<?php

	}

}