<?php
add_action( 'widgets_init', 'postlist_widget_init' );
function postlist_widget_init() {
	register_widget( 'postlist_widget' );
}

class postlist_widget extends WP_Widget {
	function __construct() {
			$widget_ops = array( 'classname' => 'postlist-widget', 'description' => ''  );
			$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'postlist-widget' );
			parent::__construct( 'postlist-widget',theme_name .' - Posts List', $widget_ops, $control_ops );
		}

	function widget( $args, $instance ) {
		extract( $args );

		$title = (isset($instance['title'])) ? apply_filters('widget_title', $instance['title'] ) : '' ;
		$type = (isset($instance['type'])) ? $instance['type'] : '' ;
		$number = (isset($instance['number'])) ? $instance['number'] : '' ;
		$order = (isset($instance['order'])) ? $instance['order'] : '' ;
		if ($type == 'project') {
			$cat = '';
		} else {
		$cat = (isset($instance['cat'])) ? $instance['cat'] : '' ;
		}
		echo $before_widget;

		if ( $title ) :
			echo $before_title;
			echo $title ;
			echo $after_title;
		endif;
			?>
        	<?php
			asalah_posts_list($type, $number, $order, $cat);
			?>
		<?php
        echo $after_widget;
    }

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['type'] = $new_instance['type'] ;
		$instance['number'] = $new_instance['number'] ;
		$instance['order'] = $new_instance['order'] ;
		$instance['cat'] = $new_instance['cat'] ;
		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' =>__('Post List', 'asalah'), 'type' => '', 'number' => '', 'order' => '', 'cat' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title', 'asalah'); ?>: </label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_id( 'type' ); ?>"><?php _e('Posts Type', 'asalah'); ?>: </label>
			<select id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" >
				<option value="post" <?php if( $instance['type'] == 'post' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e('Posts', 'asalah'); ?></option>
				<option value="project" <?php if( $instance['type'] == 'project' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e('Projects', 'asalah'); ?></option>
			</select>
		</p>
        <p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number Of Posts', 'asalah'); ?>: </label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" type="text" size="3" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_id( 'order' ); ?>"><?php _e('Post Order', 'asalah'); ?>: </label>
			<select id="<?php echo $this->get_field_id( 'order' ); ?>" name="<?php echo $this->get_field_name( 'order' ); ?>" >
				<option value="date" <?php if( $instance['order'] == 'date' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e('Date', 'asalah'); ?></option>
				<option value="comment_count" <?php if( $instance['order'] == 'comment_count' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e('Comment Count', 'asalah'); ?></option>
                <option value="rand" <?php if( $instance['order'] == 'rand' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e('Random', 'asalah'); ?></option>
			</select>
		</p>

		<?php $categories = get_categories();
	?>
        <p class="<?php echo $this->get_field_id( 'cat' ).' '; if ($instance['type'] == 'project') { echo 'hide_cat';} else { echo 'show_cat'; } ?>">
			<label for="<?php echo $this->get_field_id( 'cat' ); ?>"><?php _e('Category', 'asalah'); ?>: </label>
			<select id="<?php echo $this->get_field_id( 'cat' ); ?>" name="<?php echo $this->get_field_name( 'cat' ); ?>" >
				<option value="" <?php if( $instance['cat'] == '' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e('All Categories', 'asalah'); ?></option>
				<?php foreach ($categories as $cat) {
						$cat_value = $cat->slug;
						$cat_name = $cat->name;
						?>
						<option value="<?php echo $cat_value; ?>" <?php if( $instance['cat'] == $cat_value ) echo "selected=\"selected\""; else echo ""; ?>><?php echo $cat_name; ?></option>
						<?php
				}
				?>
			</select>
		</p>
		<script type="text/javascript">
		jQuery(document).ready( function() {
			jQuery('select#<?php echo $this->get_field_id( 'type' ); ?>').on('change', function() {
  			if (this.value == 'project') {
					jQuery('.<?php echo $this->get_field_id( 'cat' );?>.show_cat').addClass('hide_cat').removeClass('show_cat');
				} else {
					jQuery('.<?php echo $this->get_field_id( 'cat' );?>.hide_cat').addClass('show_cat').removeClass('hide_cat');
				}
});
		});
		</script>
		<style>
			.show_cat { display: block;}
			.hide_cat { display: none;}
		</style>
	<?php
	}
}



?>