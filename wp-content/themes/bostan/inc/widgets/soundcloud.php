<?php
add_action( 'widgets_init', 'soundcloud_widget_init' );
function soundcloud_widget_init() {
	register_widget( 'soundcloud_widget' );
}

class soundcloud_widget extends WP_Widget {
	function __construct() {
			$widget_ops = array( 'classname' => 'soundcloud-widget', 'description' => ''  );
			$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'soundcloud-widget' );
			parent::__construct( 'soundcloud-widget',theme_name .' - Soundcloud', $widget_ops, $control_ops );
		}

	function widget( $args, $instance ) {
		extract( $args );
		$title = (isset($instance['title'])) ? apply_filters('widget_title', $instance['title'] ) : '' ;
		$url = (isset($instance['url'])) ? $instance['url'] : '' ;

		echo $before_widget;
		if ( $title ) :
			echo $before_title;
			echo $title ;
			echo $after_title;
		endif;
			?>

		<?php if ( $url ) { ?>
        	<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?php echo $url; ?>"></iframe>

        <?php } ?>

		<?php
            echo $after_widget;
    }

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['url'] = $new_instance['url'] ;
		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' =>__('Sound Track', 'asalah') );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title', 'asalah'); ?>: </label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e('Soundcloud URL', 'asalah'); ?>: </label>
			<input id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" value="<?php echo $instance['url']; ?>" class="widefat" type="text" />
		</p>

	<?php
	}
}


?>