<?php
add_action('init', 'team_init');
/* SECTION - project_custom_init */
function team_init()
{
    $labels = array(
    'name' => _x('Преподаватели', 'post type general name', 'asalah'),
    'singular_name' => _x('Преподаватель', 'post type singular name', 'asalah'),
    'add_new' => _x('Добавить нового преподавателя', 'member', 'asalah'),  
    'add_new_item' => __('Добавить нового преподавателя', 'asalah'),
    'edit_item' => __('Изменить преподавателя', 'asalah'),
    'new_item' => __('Новый преподаватель', 'asalah'),
    'view_item' => __('Просмотреть преподавателя', 'asalah'),
    'search_items' => __('Поиск преподавателей', 'asalah'),
    'not_found' =>  __('Преподавателей не найдено', 'asalah'),
    'not_found_in_trash' => __('No members found in Trash', 'asalah'),
    'parent_item_colon' => '',
    'menu_name' => 'Преподаватели'
	);
	// Some arguments and in the last line 'supports', we say to WordPress what features are supported on the member post type
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => true,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail'),
        'taxonomies'          => array( 'category' ),
	);
	// We call this function to register the custom post type
	register_post_type('team',$args);
}

/*--- Custom Messages - project_updated_messages ---*/
add_filter('post_updated_messages', 'team_updated_messages');
function team_updated_messages( $messages ) {
  global $post, $post_ID;
  $messages['team'] = array(
    0 => '', // Unused. Messages start at index 1.
    1 => sprintf( __('Преподаватель обновлён. <a href="%s">Просмотреть преподавателя</a>', 'asalah'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.', 'asalah'),
    3 => __('Custom field deleted.', 'asalah'),
    4 => __('Преподаватель обновлён.', 'asalah'),
    /* translators: %s: date and time of the revision */
    5 => isset($_GET['revision']) ? sprintf( __('Преподаватель восстановлен %s', 'asalah'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Преподаватель опубликован. <a href="%s">Просмотреть преподавателя</a>', 'asalah'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Member saved.', 'asalah'),
    8 => sprintf( __('Преподаватель подтверждён. <a href="%s">Просмотреть преподавателя</a>', 'asalah'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Member scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview member</a>', 'asalah'),
      // translators: Publish box date format, see http://php.net/date
      date_i18n( __( 'M j, Y @ G:i' , 'asalah'), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Member draft updated. <a target="_blank" href="%s">Preview member</a>', 'asalah'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}

add_action('init', 'administration_init');
/* SECTION - administration_init */
function administration_init()
{
    $labels = array(
    'name' => _x('Администрация', 'post type general name', 'asalah'),
    'singular_name' => _x('Администрация', 'post type singular name', 'asalah'),
    'add_new' => _x('Добавить нового члена администрации', 'member', 'asalah'),  
    'add_new_item' => __('Добавить нового члена администрации', 'asalah'),
    'edit_item' => __('Изменить члена администрации', 'asalah'),
    'new_item' => __('Новый член администрации', 'asalah'),
    'view_item' => __('Просмотреть члена администрации', 'asalah'),
    'search_items' => __('Поиск членов администрации', 'asalah'),
    'not_found' =>  __('Члена администрации не найдено', 'asalah'),
    'not_found_in_trash' => __('Члена администрации не найдено', 'asalah'),
    'parent_item_colon' => '',
    'menu_name' => 'Администрация'
	);
	// Some arguments and in the last line 'supports', we say to WordPress what features are supported on the member post type
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => true,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail'),
        'taxonomies'          => array( 'category' ),
	);
	// We call this function to register the custom post type
	register_post_type('admin',$args);
}

/*--- Custom Messages - project_updated_messages ---*/
add_filter('post_updated_messages', 'admin_updated_messages');
function admin_updated_messages( $messages ) {
  global $post, $post_ID;
  $messages['admin'] = array(
    0 => '', // Unused. Messages start at index 1.
    1 => sprintf( __('Член администрации изменён. <a href="%s">Посмотреть</a>', 'asalah'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.', 'asalah'),
    3 => __('Custom field deleted.', 'asalah'),
    4 => __('Член администрации обновлён.', 'asalah'),
    /* translators: %s: date and time of the revision */
    5 => isset($_GET['revision']) ? sprintf( __('Member restored to revision from %s', 'asalah'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Member published. <a href="%s">View member</a>', 'asalah'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Member saved.', 'asalah'),
    8 => sprintf( __('Member submitted. <a target="_blank" href="%s">Preview member</a>', 'asalah'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Member scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview member</a>', 'asalah'),
      // translators: Publish box date format, see http://php.net/date
      date_i18n( __( 'M j, Y @ G:i' , 'asalah'), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Member draft updated. <a target="_blank" href="%s">Preview member</a>', 'asalah'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
?>