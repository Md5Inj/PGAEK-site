<?php
add_action('init', 'graduates_init');
/* SECTION - graduates_init */
function graduates_init()
{
    $labels = array(
        'name' => _x('Портфолио', 'post type general name', 'asalah'),
        'singular_name' => _x('Портфолио', 'post type singular name', 'asalah'),
        'add_new' => _x('Добавить новое портфолио', 'member', 'asalah'),
        'add_new_item' => __('Добавить новое портфолио', 'asalah'),
        'edit_item' => __('Изменить портфолио', 'asalah'),
        'new_item' => __('Новое портфолио', 'asalah'),
        'view_item' => __('Просмотреть портфолио', 'asalah'),
        'search_items' => __('Поиск портфолио', 'asalah'),
        'not_found' => __('Портфолио не найдено', 'asalah'),
        'not_found_in_trash' => __('Портфолио не найдено в корзине', 'asalah'),
        'parent_item_colon' => '',
        'menu_name' => 'Портфолио выпускников'
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
        'supports' => array('title', 'thumbnail')
    );
    // We call this function to register the custom post type
    register_post_type('graduates', $args);
}

/*--- Custom Messages - project_updated_messages ---*/
add_filter('post_updated_messages', 'graduates_updated_messages');
function graduates_updated_messages($messages)
{
    global $post, $post_ID;
    $messages['graduates'] = array(
        0 => '', // Unused. Messages start at index 1.
        1 => sprintf(__('Портфолио обновлено. <a href="%s">Просмотреть портфолио</a>', 'asalah'), esc_url(get_permalink($post_ID))),
        2 => __('Поле обновлено.', 'asalah'),
        3 => __('Поле удалено.', 'asalah'),
        4 => __('Портфолио обновлено.', 'asalah'),
        /* translators: %s: date and time of the revision */
        5 => isset($_GET['revision']) ? sprintf(__('Портфолио восстановлено %s', 'asalah'), wp_post_revision_title((int)$_GET['revision'], false)) : false,
        6 => sprintf(__('Портфолио опубликовано. <a href="%s">Просмотреть портфолио</a>', 'asalah'), esc_url(get_permalink($post_ID))),
        7 => __('Member saved.', 'asalah'),
        8 => sprintf(__('Портфолио подтверждено. <a href="%s">Просмотреть портфолио</a>', 'asalah'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
        9 => sprintf(__('Портфолио запланировано на: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Предпросмотр портфолио</a>', 'asalah'),
            // translators: Publish box date format, see http://php.net/date
            date_i18n(__('M j, Y @ G:i', 'asalah'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
        10 => sprintf(__('Проект портфолио обновлён. <a target="_blank" href="%s">Предпросмотр портфолио</a>', 'asalah'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
    );
    return $messages;
}
?>