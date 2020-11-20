<?php
add_action('init', 'graduates_init');
/* SECTION - project_custom_init */
function graduates_init()
{
    $labels = array(
        'name' => _x('Портфолио', 'post type general name', 'asalah'),
        'singular_name' => _x('Портфолио', 'post type singular name', 'asalah'),
        'add_new' => _x('Добавить нвоое портфолио', 'member', 'asalah'),
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
        'supports' => array('title', 'editor', 'thumbnail'),
        'taxonomies' => array('category'),
    );
    // We call this function to register the custom post type
    register_post_type('graduates', $args);
}

/*--- Custom Messages - project_updated_messages ---*/
add_filter('post_updated_messages', 'graduates_updated_messages');
function graduates_updated_messages($messages)
{
    global $post, $post_ID;
    $messages['team'] = array(
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

add_action('admin_init', 'graduate_meta_init');
function graduate_meta_init()
{
    // add a meta box for WordPress 'project' type
    add_meta_box('graduate_meta', 'Ссылка', 'graduate_meta_init', 'graduate', 'side', 'low');
    // add a callback function to save any data a user enters in
    add_action('save_post', 'graduate_meta_save');
}

function graduate_meta_setup()
{
    global $post;
    ?>
    <div class="portfolio_meta_control">
        <label>URL</label>
        <p>
            <input type="text" name="client_url" value="<?php echo get_post_meta($post->ID, 'client_url', TRUE); ?>"
                   style="width: 100%;"/>
        </p>
    </div>
    <?php
    // create for validation
    echo '<input type="hidden" name="meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}

function graduate_meta_save($post_id)
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
    if (isset($_POST['graduate_img_url'])) {
        update_post_meta($post_id, 'graduate_img_url', $_POST['graduate_img_url']);
    } else {
        delete_post_meta($post_id, 'graduate_img_url');
    }
}

/*--- #end  Demo URL meta box ---*/
?>