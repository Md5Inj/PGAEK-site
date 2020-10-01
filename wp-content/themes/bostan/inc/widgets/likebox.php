<?php
add_action( 'widgets_init', 'likebox_widget_init' );
function likebox_widget_init() {
	register_widget( 'likebox_widget' );
}

class likebox_widget extends WP_Widget {
	function __construct() {
			$widget_ops = array( 'classname' => 'likebox-widget', 'description' => ''  );
			$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'likebox-widget' );
			parent::__construct( 'likebox-widget',theme_name .' - likebox', $widget_ops, $control_ops );
		}

	function widget( $args, $instance ) {
		extract( $args );
		$title = (isset($instance['title'])) ? apply_filters('widget_title', $instance['title'] ) : '' ;
		$fburl = (isset($instance['fburl'])) ? $instance['fburl'] : '' ;

		echo $before_widget;
		if ( $title ) :
			echo $before_title;
			echo $title ;
			echo $after_title;
		endif;
			?>


        <?php if ($fburl) { ?>
        <div class="fblike_box">
        <iframe class="social_box" src="//www.facebook.com/plugins/like.php?href=<?php echo $fburl ?>&amp;send=false&amp;layout=standard&amp;show_faces=true&amp;font&amp;colorscheme=light&amp;action=like&amp;height=80&amp;appId=306094126095426" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%;" allowTransparency="true"></iframe>
        </div>
		<?php } ?>


		<?php
            echo $after_widget;
    }

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['fburl'] = $new_instance['fburl'] ;
		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' =>__('Facebook Like Box', 'asalah') );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title', 'asalah'); ?>: </label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_id( 'fburl' ); ?>"><?php _e('Facebook Page URL', 'asalah'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'fburl' ); ?>" name="<?php echo $this->get_field_name( 'fburl' ); ?>" value="<?php echo $instance['fburl']; ?>" class="widefat" type="text" />
		</p>


	<?php
	}
}


?>