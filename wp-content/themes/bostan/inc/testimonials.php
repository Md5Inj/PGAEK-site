<?php 
//add_action('init', 'testimonials_init');  
/* SECTION - project_custom_init */  
function testimonials_init()  
{  
    $labels = array(  
    'name' => _x('Testimonial', 'post type general name', 'asalah'),  
    'singular_name' => _x('Testimonial', 'post type singular name', 'asalah'),  
    'add_new' => _x('Add New', 'Testimonial', 'asalah'),  
    'add_new_item' => __('Add New Testimonial', 'asalah'),  
    'edit_item' => __('Edit Testimonial', 'asalah'),  
    'new_item' => __('New Testimonial', 'asalah'),  
    'view_item' => __('View Testimonial', 'asalah'),  
    'search_items' => __('Search Testimonial', 'asalah'),  
    'not_found' =>  __('No Testimonial found', 'asalah'),  
    'not_found_in_trash' => __('No Testimonial found in Trash', 'asalah'),  
    'parent_item_colon' => '',  
    'menu_name' => 'Testimonial'  
	);  
	// Some arguments and in the last line 'supports', we say to WordPress what features are supported on the Project post type  
	$args = array(  
		'labels' => $labels,  
		'public' => true,  
		'publicly_queryable' => true,  
		'show_ui' => true,  
		'show_in_menu' => true,  
		'query_var' => true,  
		'rewrite' => true,  
		'capability_type' => 'post', 
		'hierarchical' => false,  
		'menu_position' => null,  
		'supports' => array('title','editor', 'thumbnail')  
	);  
	// We call this function to register the custom post type  
	register_post_type('testimonial',$args);   
}  

/*--- Custom Messages - project_updated_messages ---*/  
add_filter('post_updated_messages', 'testimonial_updated_messages');  
function testimonial_updated_messages( $messages ) {  
  global $post, $post_ID;  
  $messages['testimonial'] = array(  
    0 => '', // Unused. Messages start at index 1.  
    1 => sprintf( __('Testimonial updated. <a href="%s">View Testimonial</a>', 'asalah'), esc_url( get_permalink($post_ID) ) ),  
    2 => __('Custom field updated.', 'asalah'),  
    3 => __('Custom field deleted.', 'asalah'),  
    4 => __('Testimonial updated.', 'asalah'),  
    /* translators: %s: date and time of the revision */  
    5 => isset($_GET['revision']) ? sprintf( __('Testimonial restored to revision from %s', 'asalah'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,  
    6 => sprintf( __('Testimonial published. <a href="%s">View Testimonial</a>', 'asalah'), esc_url( get_permalink($post_ID) ) ),  
    7 => __('slider saved.', 'asalah'),  
    8 => sprintf( __('Testimonial submitted. <a target="_blank" href="%s">Preview Testimonial</a>', 'asalah'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),  
    9 => sprintf( __('Testimonial scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Testimonial</a>', 'asalah'),  
      // translators: Publish box date format, see http://php.net/date  
      date_i18n( __( 'M j, Y @ G:i' , 'asalah'), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),  
    10 => sprintf( __('Testimonial draft updated. <a target="_blank" href="%s">Preview Testimonial</a>', 'asalah'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),  
  );  
  return $messages;  
}  
/*--- #end SECTION - project_updated_messages ---*/ 

function testimonial_author() {
	global $post;
	$author = get_post_meta($post->ID, 'asalah_testimonial_author', true);
	if ($author) {
		?>
		<?php echo $author; ?>
        <?php
	}
}

function testimonial_url() {
	global $post;
	$url = get_post_meta($post->ID, 'asalah_testimonial_url', true);
	if ($url) {
		?>
		<?php echo $url; ?>
        <?php
	}
}

function testimonial_job() {
	global $post;
	$job = get_post_meta($post->ID, 'asalah_testimonial_job', true);
	if ($job) {
		?>
		<?php echo $job; ?>
        <?php
	}
}


function get_testimonial_author() {
	global $post;
	$author = get_post_meta($post->ID, 'asalah_testimonial_author', true);
	if ($author) {
		?>
		<?php return $author; ?>
        <?php
	}
}

function get_testimonial_url() {
	global $post;
	$url = get_post_meta($post->ID, 'asalah_testimonial_url', true);
	if ($url) {
		?>
		<?php return $url; ?>
        <?php
	}
}

function get_testimonial_job() {
	global $post;
	$job = get_post_meta($post->ID, 'asalah_testimonial_job', true);
	if ($job) {
		?>
		<?php return $job; ?>
        <?php
	}
}

function testimonial_items() {
	?>
	 <?php  
		$wp_query = new WP_Query(array('post_type' => 'testimonial', 'posts_per_page' => 5));  
		$count =0;  
	?>  
	<?php if ( $wp_query ) : ?>
    <div class="content_title">
        <h2><?php echo sa_option( 'asalah_home_testimonials_text'); ?></h2>
        <div class="title_sep"><?php echo sa_option( 'asalah_home_testimonials_desc'); ?></div>
    </div>
    <div class="content flexslidertest">
        <?php /* Start the Loop */ ?>
        <ul class="slides">
        <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
            <?php echo get_post_format(); ?>
            <?php get_template_part( 'content', 'testimonial' ); ?>
        <?php endwhile; ?>
        </ul>
    <?php endif; ?>
    </div>
    
    <script>
	// Can also be used with $(document).ready()
		jQuery(document).ready(function() {
		  jQuery('.flexslidertest').flexslider({
			animation: "slide",
			controlNav: false,
			directionNav: false,
		  });
		});
	</script>
<?php
}

?>