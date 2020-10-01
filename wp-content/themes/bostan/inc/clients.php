<?php
add_action('init', 'client_init');
/* SECTION - project_custom_init */
function client_init()
{
    $labels = array(
    'name' => _x('Гос. ресурсы', 'post type general name', 'asalah'),
    'singular_name' => _x('Гос. ресурс', 'post type singular name', 'asalah'),
    'add_new' => _x('Добавить новый', 'Client', 'asalah'),
    'add_new_item' => __('Добавить новый', 'asalah'),
    'edit_item' => __('Отредактировать гос. ресурс', 'asalah'),
    'new_item' => __('Новый гос. ресурс', 'asalah'),
    'view_item' => __('Просмотр гос. ресурса', 'asalah'),
    'search_items' => __('', 'asalah'),
    'not_found' =>  __('Гос. ресурса не найдено', 'asalah'),
    'not_found_in_trash' => __('No clients found in Trash', 'asalah'),
    'parent_item_colon' => '',
    'menu_name' => 'Гос. ресурсы'
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
		'supports' => array('title','thumbnail')
	);
	// We call this function to register the custom post type
	register_post_type('client',$args);
}

/*--- Custom Messages - project_updated_messages ---*/
add_filter('post_updated_messages', 'client_updated_messages');
function client_updated_messages( $messages ) {
  global $post, $post_ID;
  $messages['client'] = array(
    0 => '', // Unused. Messages start at index 1.
    1 => sprintf( __('Гос. ресурс успешно отредактирован. <a href="%s">Перейти</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.', 'asalah'),
    3 => __('Custom field deleted.', 'asalah'),
    4 => __('client updated.', 'asalah'),
    /* translators: %s: date and time of the revision */
    5 => isset($_GET['revision']) ? sprintf( __('client restored to revision from %s', 'asalah'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Гос. ресурс успешно добавлен. <a href="%s">Перейти</a>', 'asalah'), esc_url( get_permalink($post_ID) ) ),
    7 => __('client saved.', 'asalah'),
    8 => sprintf( __('client submitted. <a target="_blank" href="%s">Preview slider</a>', 'asalah'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('client scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview slider</a>', 'asalah'),
      // translators: Publish box date format, see http://php.net/date
      date_i18n( __( 'M j, Y @ G:i', 'asalah' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('client draft updated. <a target="_blank" href="%s">Preview client</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
/*--- #end SECTION - project_updated_messages ---*/



/*--- Demo URL meta box ---*/
add_action('admin_init','client_meta_init');
function client_meta_init()
{
    // add a meta box for WordPress 'project' type
    add_meta_box('client_meta', 'Ссылка', 'client_meta_setup', 'client', 'side', 'low');
    // add a callback function to save any data a user enters in
    add_action('save_post','client_meta_save');
}
function client_meta_setup()
{
    global $post;
    ?>
        <div class="portfolio_meta_control">
            <label>URL</label>
            <p>
                <input type="text" name="client_url" value="<?php echo get_post_meta($post->ID,'client_url',TRUE); ?>" style="width: 100%;" />
            </p>
        </div>
    <?php
    // create for validation
    echo '<input type="hidden" name="meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}
function client_meta_save($post_id)
{
    // check nonce
    if (!isset($_POST['meta_noncename']) || !wp_verify_nonce($_POST['meta_noncename'], __FILE__)) {
       return $post_id;
    }
    // check capabilities
    if ('post' == $_POST['post_type']) {
        if (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_page', $post_id)) {
        return $post_id;
    }
    // exit on autosave
    if (defined('DOING_AUTOSAVE')) {
        if (defined('DOING_AUTOSAVE') == $DOING_AUTOSAVE) {
            return $post_id;
        }
    }
    if(isset($_POST['client_url']))
    {
        update_post_meta($post_id, 'client_url', $_POST['client_url']);
    } else
    {
        delete_post_meta($post_id, 'client_url');
    }
}
/*--- #end  Demo URL meta box ---*/


function client_url() {
	global $post;
	$url = get_post_meta($post->ID, 'client_url', true);
	if ($url) {
		?>
		<a href="<?php echo $url; ?>" target="_blank">Live Preview →</a>
        <?php
	}
}

function client_logo() {
	global $asalah_data;
	global $post;
	if ( has_post_thumbnail($post->ID) ){
			$image_id = get_post_thumbnail_id($post->ID);
			$image_url = wp_get_attachment_image_src($image_id,'large');
			$image_url = $image_url[0];
			$theimage = $image_url;

				the_post_thumbnail('');

	}else{
		echo "<span class='client_logo_text'>";
		echo the_title();
		echo "</span>";
	}
}

function get_client_logo() {
	global $asalah_data;
  global $post;
	if ( has_post_thumbnail($post->ID) ){
			$image_id = get_post_thumbnail_id($post->ID);
			$image_url = wp_get_attachment_image_src($image_id,'large');
			$image_url = $image_url[0];
			$theimage = $image_url;

				return get_the_post_thumbnail($post->ID, '');


	}else{
		return "<span class='client_logo_text'>";
		return the_title();
		return "</span>";
	}
}

function clients_items() {
	?>
	 <?php
		$wp_query = new WP_Query(array('post_type' => 'Client', 'posts_per_page' => 6));
		$count =0;
	?>
	<?php if ( $wp_query ) : ?>
    <div class="content_container clients_container">
        <div class="content_title">
            <h2><?php echo sa_option( 'asalah_home_clients_text'); ?></h2>
            <div class="title_sep"><?php echo sa_option( 'asalah_home_clients_desc'); ?></div>
        </div>
        <div class="content homeclients">
            <?php /* Start the Loop */ ?>
            <div class="clients">
            <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                <?php echo get_post_format(); ?>
                <?php get_template_part( 'content', 'clients' ); ?>
            <?php endwhile; ?>
            </div>
        <?php endif; ?>
        </div>
    </div>
<?php
}
?>