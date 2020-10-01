<?php
add_action( 'widgets_init', 'video_widget_init' );
function video_widget_init() {
	register_widget( 'video_widget' );
}

class video_widget extends WP_Widget {
	function __construct() {
		$widget_ops = array( 'classname' => 'video-widget', 'description' => ''  );
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'video-widget' );
		parent::__construct( 'video-widget',theme_name .' - Video', $widget_ops, $control_ops );
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
        	<?php
			$prov = asalah_video_prov($url);
			$vid = asalah_video_id($prov, $url);
			asalah_video_iframe($prov, $vid);
			?>
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
		$defaults = array( 'title' =>__('News Video', 'asalah') );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title', 'asalah'); ?>: </label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e('Video URL', 'asalah'); ?>: </label>
			<input id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" value="<?php echo $instance['url']; ?>" class="widefat" type="text" />
			<small><?php _e('Vimeo Or Youtube URL', 'asalah'); ?></small>
		</p>

	<?php
	}
}


?>