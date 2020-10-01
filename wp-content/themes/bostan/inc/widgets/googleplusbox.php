<?php
add_action( 'widgets_init', 'gplusbox_widget_init' );
function gplusbox_widget_init() {
	register_widget( 'gplusbox_widget' );
}

class gplusbox_widget extends WP_Widget {
	function __construct() {
			$widget_ops = array( 'classname' => 'gplusbox-widget', 'description' => ''  );
			$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'gplusbox-widget' );
			parent::__construct( 'gplusbox-widget',theme_name .' - Google Plus Box', $widget_ops, $control_ops );
		}

	function widget( $args, $instance ) {
		extract( $args );
		$title = (isset($instance['title'])) ? apply_filters('widget_title', $instance['title'] ) : '' ;
		$gpurl = (isset($instance['gpurl'])) ? $instance['gpurl'] : '' ;

		echo $before_widget;
		if ( $title ) :
			echo $before_title;
			echo $title ;
			echo $after_title;
		endif;
			?>


        <?php if ($gpurl) { ?>
        <!-- Place this tag in your head or just before your close body tag. -->
		<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
          {parsetags: 'explicit'}
        </script>

        <!-- Place this tag where you want the badge to render. -->
        <div class="g-plus" data-width="366" data-href="<?php echo $gpurl ?>" data-rel="publisher"></div>

        <!-- Place this render call where appropriate. -->
        <script type="text/javascript">gapi.plus.go();</script>

		<?php } ?>


		<?php
            echo $after_widget;
    }

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['gpurl'] = $new_instance['gpurl'] ;
		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' =>__('Google Plus Box', 'asalah') );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        <p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title', 'asalah'); ?>: </label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'gpurl' ); ?>"><?php _e('Google Plus URL', 'asalah'); ?>: </label>
			<input id="<?php echo $this->get_field_id( 'gpurl' ); ?>" name="<?php echo $this->get_field_name( 'gpurl' ); ?>" value="<?php echo $instance['gpurl']; ?>" class="widefat" type="text" />
		</p>


	<?php
	}
}


?>