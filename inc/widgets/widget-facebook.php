<?php
/**
 * Facebook widget.
 *
 * @package    Bulan
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class Bulan_Facebook_Widget extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'   => 'widget_facebook',
			'description' => __( 'Display a Facebook Like Box to connect visitors to your Facebook Page', 'bulan' )
		);

		// Create the widget.
		parent::__construct(
			'bulan-facebook',                   // $this->id_base
			__( 'Facebook Like Box', 'bulan' ), // $this->name
			$widget_options                     // $this->widget_options
		);

		// Load the facebook page script when the widget is active.
		if ( is_active_widget( false, false, $this->id_base ) ) {
			add_action( 'wp_footer', array( $this, 'bulan_facebook_widget_script' ), 10 );
		}

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

			$hide_cover   = $instance['hide_cover'] ? 'true' : 'false';
			$small_header = $instance['small_header'] ? 'true' : 'false';
			$show_face    = $instance['show_face'] ? 'true' : 'false';
			$show_posts   = $instance['show_posts'] ? 'true' : 'false';

			echo '<div id="fb-root"></div>';
			echo '<div class="fb-page" data-href="' . esc_url( $instance['url'] ) . '" data-small-header="' . $small_header . '" data-adapt-container-width="true" data-hide-cover="' . $hide_cover . '" data-show-facepile="' . $show_face . '" data-show-posts="' . $show_posts . '"><div class="fb-xfbml-parse-ignore"><blockquote cite="' . esc_url( $instance['url'] ) . '"><a href="' . esc_url( $instance['url'] ) . '">Theme Junkie</a></blockquote></div></div>';

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

		$instance['title']        = strip_tags( $new_instance['title'] );
		$instance['url']          = esc_url( $new_instance['url'] );
		$instance['hide_cover']   = isset( $new_instance['hide_cover'] ) ? (bool) $new_instance['hide_cover'] : false;
		$instance['small_header'] = isset( $new_instance['small_header'] ) ? (bool) $new_instance['small_header'] : false;
		$instance['show_face']    = isset( $new_instance['show_face'] ) ? (bool) $new_instance['show_face'] : false;
		$instance['show_posts']   = isset( $new_instance['show_posts'] ) ? (bool) $new_instance['show_posts'] : false;

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
			'title'        => esc_html__( 'Find Us On Facebook', 'bulan' ),
			'url'          => '',
			'hide_cover'   => false,
			'small_header' => false,
			'show_face'    => true,
			'show_posts'   => false,
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
			<label for="<?php echo $this->get_field_id( 'url' ); ?>">
				<?php _e( 'Facebook Page URL', 'bulan' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" value="<?php echo esc_url( $instance['url'] ); ?>" placeholder="<?php echo  esc_attr( 'http://' ); ?>" />
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['hide_cover'] ); ?> id="<?php echo $this->get_field_id( 'hide_cover' ); ?>" name="<?php echo $this->get_field_name( 'hide_cover' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'hide_cover' ); ?>">
				<?php _e( 'Hide cover', 'bulan' ); ?>
			</label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['small_header'] ); ?> id="<?php echo $this->get_field_id( 'small_header' ); ?>" name="<?php echo $this->get_field_name( 'small_header' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'small_header' ); ?>">
				<?php _e( 'Small header', 'bulan' ); ?>
			</label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_face'] ); ?> id="<?php echo $this->get_field_id( 'show_face' ); ?>" name="<?php echo $this->get_field_name( 'show_face' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'show_face' ); ?>">
				<?php _e( 'Show face', 'bulan' ); ?>
			</label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_posts'] ); ?> id="<?php echo $this->get_field_id( 'show_posts' ); ?>" name="<?php echo $this->get_field_name( 'show_posts' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'show_posts' ); ?>">
				<?php _e( 'Show posts', 'bulan' ); ?>
			</label>
		</p>

	<?php

	}

	/**
	 * Facebook page like script
	 *
	 * @since  1.0.0
	 */
	function bulan_facebook_widget_script() { ?>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
	<?php
	}

}