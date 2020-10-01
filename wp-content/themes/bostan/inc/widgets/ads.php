<?php
add_action( 'widgets_init', 'ads_widget_init' );
function ads_widget_init() {
	register_widget( 'ads_widget' );
}

class ads_widget extends WP_Widget {
	function __construct() {
			$widget_ops = array( 'classname' => 'ads-widget', 'description' => ''  );
			$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'ads-widget' );
			parent::__construct( 'ads-widget',theme_name .' - Advertisement Banner', $widget_ops, $control_ops );
		}

	function widget( $args, $instance ) {
		extract( $args );
		$title = (isset($instance['title'])) ? apply_filters('widget_title', $instance['title'] ) : '' ;
		$image = (isset($instance['image'])) ? $instance['image'] : '' ;
		$url = (isset($instance['url'])) ? $instance['url'] : '' ;
		$code = (isset($instance['code'])) ? $instance['code'] : '' ;

		echo $before_widget;
		if ( $title ) :
			echo $before_title;
			echo $title ;
			echo $after_title;
		endif;
			?>


        <div class="row-fluid">
        	<?php
			if (isset($code) && $code != '') {
				?><div class="ads_container ads_container_widget"><?php
				echo $code;
				?></div><?php
			}elseif(isset($image) && $image != ''){
				?><div class="ads_container ads_container_widget"><?php
				?>
					<?php if(isset($url) && $url != ''){?> <a target="_blank" href="<?php echo $url; ?>"> <?php } ?>
						<img src="<?php echo $image; ?>" />
					<?php if(isset($url) && $url != ''){?> </a> <?php } ?>
				</div>
				<?php
			}
			?>
        </div>


		<?php
            echo $after_widget;
    }

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['image'] = $new_instance['image'] ;
		$instance['url'] = $new_instance['url'] ;
		$instance['code'] = $new_instance['code'] ;
		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' =>__('Advertisement', 'asalah') );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title', 'asalah'); ?>: </label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e('Banner image URL', 'asalah'); ?>: </label>
			<input id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php echo $instance['image']; ?>" class="widefat" type="text" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e('Destination URL', 'asalah'); ?>: </label>
			<input id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" value="<?php echo $instance['url']; ?>" class="widefat" type="text" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_id( 'code' ); ?>"><?php _e('Code', 'asalah'); ?>: </label>
			<textarea id="<?php echo $this->get_field_id( 'code' ); ?>" name="<?php echo $this->get_field_name( 'code' ); ?>" class="widefat" ><?php echo $instance['code']; ?></textarea>
		</p>

	<?php
	}
}


?>