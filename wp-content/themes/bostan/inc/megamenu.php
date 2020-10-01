<?php
/**
 *  /!\ This is a copy of Walker_Nav_Menu_Edit class in core
 *
 * Create HTML list of nav menu input items.
 *
 * @package WordPress
 * @since 3.0.0
 * @uses Walker_Nav_Menu
 */
class Walker_Nav_Menu_Edit_Custom extends Walker_Nav_Menu  {
    /**
     * @see Walker_Nav_Menu::start_lvl()
     * @since 3.0.0
     *
     * @param string $output Passed by reference.
     */
    function start_lvl( &$output, $depth = 0, $args = array() ) {
    }

    /**
     * @see Walker_Nav_Menu::end_lvl()
     * @since 3.0.0
     *
     * @param string $output Passed by reference.
     */
    function end_lvl( &$output, $depth = 0, $args = array() ) {
    }

    /**
     * @see Walker::start_el()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param object $args
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $_wp_nav_menu_max_depth;

        $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        ob_start();
        $item_id = esc_attr( $item->ID );
        $removed_args = array(
            'action',
            'customlink-tab',
            'edit-menu-item',
            'menu-item',
            'page-tab',
            '_wpnonce',
        );

        $original_title = '';
        if ( 'taxonomy' == $item->type ) {
            $original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
            if ( is_wp_error( $original_title ) )
                $original_title = false;
        } elseif ( 'post_type' == $item->type ) {
            $original_object = get_post( $item->object_id );
            $original_title = $original_object->post_title;
        }

        $classes = array(
            'menu-item menu-item-depth-' . $depth,
            'menu-item-' . esc_attr( $item->object ),
            'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
        );

        $title = $item->title;

        if ( ! empty( $item->_invalid ) ) {
            $classes[] = 'menu-item-invalid';
            /* translators: %s: title of menu item which is invalid */
            $title = sprintf( __( '%s (Invalid)', 'asalah' ), $item->title );
        } elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
            $classes[] = 'pending';
            /* translators: %s: title of menu item in draft status */
            $title = sprintf( __('%s (Pending)', 'asalah'), $item->title );
        }

        $title = empty( $item->label ) ? $title : $item->label;

        ?>
        <li id="menu-item-<?php echo esc_attr($item_id); ?>" class="<?php echo implode(' ', $classes ); ?>">
            <dl class="menu-item-bar">
                <dt class="menu-item-handle">
                    <span class="item-title"><?php echo esc_html( $title ); ?></span>
                    <span class="item-controls">
                        <span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
                        <span class="item-order hide-if-js">
                            <a href="<?php
                                echo wp_nonce_url(
                                    add_query_arg(
                                        array(
                                            'action' => 'move-up-menu-item',
                                            'menu-item' => $item_id,
                                        ),
                                        remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                                    ),
                                    'move-menu_item'
                                );
                            ?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up', 'asalah'); ?>">&#8593;</abbr></a>
                            |
                            <a href="<?php
                                echo wp_nonce_url(
                                    add_query_arg(
                                        array(
                                            'action' => 'move-down-menu-item',
                                            'menu-item' => $item_id,
                                        ),
                                        remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                                    ),
                                    'move-menu_item'
                                );
                            ?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down', 'asalah'); ?>">&#8595;</abbr></a>
                        </span>
                        <a class="item-edit" id="edit-<?php echo esc_attr($item_id); ?>" title="<?php esc_attr_e('Edit Menu Item', 'asalah'); ?>" href="<?php
                            echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
                        ?>"><?php _e( 'Edit Menu Item', 'asalah' ); ?></a>
                    </span>
                </dt>
            </dl>

            <div class="menu-item-settings wp-clearfix" id="menu-item-settings-<?php echo esc_attr($item_id); ?>">

                <?php if( 'custom' == $item->type ) : ?>
                    <p class="field-url description description-wide">
                        <label for="edit-menu-item-url-<?php echo esc_attr($item_id); ?>">
                            <?php _e( 'URL', 'asalah' ); ?><br />
                            <input type="text" id="edit-menu-item-url-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
                        </label>
                    </p>
                    <p class="field-link-target description description-wide">
            					<label for="edit-menu-item-target-<?php echo esc_attr($item_id); ?>">
            						<input type="checkbox" id="edit-menu-item-target-<?php echo esc_attr($item_id); ?>" value="_blank" name="menu-item-target[<?php echo esc_attr($item_id); ?>]"<?php checked( $item->target, '_blank' ); ?> />
            						<?php _e( 'Open link in a new window/tab' ); ?>
            					</label>
            				</p>
                <?php endif; ?>

                <p class="description description-wide">
                    <label for="edit-menu-item-title-<?php echo esc_attr($item_id); ?>">
                        <?php _e( 'Navigation Label', 'asalah' ); ?><br />
                        <input type="text" id="edit-menu-item-title-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
                    </label>
                </p>

                <p class="field-menuicon description asalah_custom_menu custom_mega_menu_menuicon asalah_custom_megamenu description-wide" style="margin:0 0 5px 0; position:relative;">
                    <label for="edit-menu-item-menuicon-<?php echo esc_attr($item_id); ?>">
                        <?php _e( 'Icon', 'asalah' ); ?><br />
                        <i id="preview_menu_icon"<?php if ($item->menuicon != '') { ?> class="<?php echo $item->menuicon; ?>"<?php } ?>></i>
                        <input  type="text" id="edit-menu-item-menuicon<?php echo esc_attr($item_id); ?>" name="menu-item-menuicon[<?php echo esc_attr($item_id); ?>]"  value="<?php echo esc_attr( $item->menuicon ); ?>" />
                        <button type="button" id="edit-menu-item-menuicon<?php echo esc_attr($item_id); ?>" class="icon_list_modal_launch">Click here for list</button>
                    </label>
                    

                </p>
                <p class="field-css-classes description description-wide">
                    <label for="edit-menu-item-classes-<?php echo $item_id; ?>">
                        <?php _e( 'CSS Classes (optional)' ); ?><br />
                        <input type="text" id="edit-menu-item-classes-<?php echo $item_id; ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo $item_id; ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
                    </label>
                </p>

                <p class="field-custom description asalah_custom_menu custom_mega_menu asalah_custom_megamenu description-wide" style="margin:20px 0 9px 0; padding-top:15px; border-top:1px solid #eee;">
                    <?php
                        $value = $item->megamenu;
                        if($value != "") $value = "checked='checked'";
                    ?>
                    <label for="edit-menu-item-megamenu-<?php echo esc_attr($item_id); ?>">
                        <input type="checkbox" id="edit-menu-item-megamenu-<?php echo esc_attr($item_id); ?>" class="code edit-menu-item-custom" name="menu-item-megamenu[<?php echo esc_attr($item_id); ?>]" value="megamenu" <?php echo esc_attr($value); ?> />
                        <?php _e( "Mega Menu?", 'asalah' ); ?>
                    </label>
                </p>

                <script type="text/javascript">jQuery('input#edit-menu-item-megamenu-<?php echo esc_attr($item_id); ?>').click( function() { if (this.checked) { jQuery('#mega_menu_<?php echo esc_attr($item_id); ?>').show(); } else { jQuery('#mega_menu_<?php echo esc_attr($item_id); ?>').hide(); }}); </script>
                <div id="mega_menu_<?php echo esc_attr($item_id); ?>" <?php if ($item->megamenu == '') {?> style="display:none;"<?php }?>>

                <p class="field-clickable asalah_custom_menu custom_mega_menu_clickable asalah_custom_megamenu description-wide" style="margin:20px 0 9px 0; padding-top:15px; border-top:1px solid #eee;">
                    <?php
                        $value = $item->clickable;
                        if($value != "") $value = "checked='checked'";
                    ?>
                    <label for="edit-menu-item-clickable-<?php echo esc_attr($item_id); ?>">
                        <input type="checkbox" id="edit-menu-item-clickable-<?php echo esc_attr($item_id); ?>" class="code edit-menu-item-custom" name="menu-item-clickable[<?php echo esc_attr($item_id); ?>]" value="clickable" <?php echo esc_attr($value); ?> />
                        <?php _e( "Menu title (not linkable)?", 'asalah' ); ?>
                    </label>
                </p>

                <p class="field-dropdown description asalah_custom_menu custom_mega_menu_dropdown asalah_custom_megamenu description-wide">
                    <label for="edit-menu-item-dropdown-<?php echo esc_attr($item_id); ?>">
                        <?php _e( 'Dropdown Opens To', 'asalah' ); ?><br />
                        <select id="edit-menu-item-dropdown<?php echo esc_attr($item_id); ?>" name="menu-item-dropdown[<?php echo esc_attr($item_id); ?>]">
                            <option value="right" <?php if(esc_attr($item->dropdown) == "right" || esc_attr($item->width) == ""){echo 'selected="selected"';} ?>>Right</option>
                            <option value="left" <?php if(esc_attr($item->dropdown) == "left"){echo 'selected="selected"';} ?>>Left</option>
                        </select>
                    </label>
                </p>

                <p class="field-width description asalah_custom_menu custom_mega_menu_width asalah_custom_megamenu description-wide" style="margin:0 0 5px 0; position:relative;">
                    <label for="edit-menu-item-width-<?php echo esc_attr($item_id); ?>">
                        <?php _e( 'Width', 'asalah' ); ?><br />
                        <?php $width = ($item->width != '')? $item->width : '100' ; ?>

                        <input type="number" id="edit-menu-item-width-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-width" name="menu-item-width[<?php echo esc_attr($item_id); ?>]" min="100" max="1200" value="<?php echo $width; ?>" style="width:140px;"></input>
                    </label>
                </p>

                <p class="field-text description asalah_custom_menu custom_mega_menu_text asalah_custom_megamenu description-wide" style="margin:0 0 5px 0;">
                    <label for="edit-menu-item-text-<?php echo esc_attr($item_id); ?>">
                        <?php _e( 'Text Block (Shortcodes allowed)', 'asalah' ); ?><br />
                        <textarea id="edit-menu-item-text-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-text" rows="3" cols="20" name="menu-item-text[<?php echo esc_attr($item_id); ?>]"><?php echo esc_html( $item->text ); // textarea_escaped ?></textarea>
                    </label>
                </p>
                </div>

                <div class="menu-item-actions description-wide submitbox">
                    <?php if( 'custom' != $item->type && $original_title !== false ) : ?>
                        <p class="link-to-original">
                            <?php printf( __('Original: %s', 'asalah'), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
                        </p>
                    <?php endif; ?>
                    <a class="item-delete submitdelete deletion" id="delete-<?php echo esc_attr($item_id); ?>" href="<?php
                    echo wp_nonce_url(
                        add_query_arg(
                            array(
                                'action' => 'delete-menu-item',
                                'menu-item' => $item_id,
                            ),
                            remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                        ),
                        'delete-menu_item_' . $item_id
                    ); ?>"><?php _e('Remove', 'asalah'); ?></a> <span class="meta-sep"> | </span> <a class="item-cancel submitcancel" id="cancel-<?php echo esc_attr($item_id); ?>" href="<?php echo esc_url( add_query_arg( array('edit-menu-item' => $item_id, 'cancel' => time()), remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ) ) ) );
                        ?>#menu-item-settings-<?php echo esc_attr($item_id); ?>"><?php _e('Cancel', 'asalah'); ?></a>
                </div>

                <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($item_id); ?>" />
                <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
                <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
                <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
                <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
                <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
            </div><!-- .menu-item-settings-->
            <ul class="menu-item-transport"></ul>
        <?php

        $output .= ob_get_clean();

        }
}

// add custom menu fields to menu
add_filter( 'wp_setup_nav_menu_item', 'asalah_add_custom_nav_fields' );

// save menu custom fields
add_action( 'wp_update_nav_menu_item', 'asalah_update_custom_nav_fields', 10, 3 );

// edit menu walker
add_filter( 'wp_edit_nav_menu_walker', 'asalah_edit_walker', 10, 2 );


function asalah_add_custom_nav_fields( $menu_item ) {
    $menu_item->menuicon = get_post_meta( $menu_item->ID, '_menu_item_menuicon', true );
    $menu_item->megamenu = get_post_meta( $menu_item->ID, '_menu_item_megamenu', true );
    $menu_item->clickable = get_post_meta( $menu_item->ID, '_menu_item_clickable', true );
    $menu_item->width = get_post_meta( $menu_item->ID, '_menu_item_width', true );
    $menu_item->dropdown = get_post_meta( $menu_item->ID, '_menu_item_dropdown', true );
    $menu_item->text = get_post_meta( $menu_item->ID, '_menu_item_text', true );
    return $menu_item;
}

/**
 * Save menu custom fields
 *
 * @access      public
 * @since       1.0
 * @return      void
*/
function asalah_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {

        $check = array('menuicon', 'megamenu', 'width', 'text', 'dropdown', 'clickable');

        foreach ( $check as $key )
        {
            if(!isset($_POST['menu-item-'.$key][$menu_item_db_id]))
            {
                $_POST['menu-item-'.$key][$menu_item_db_id] = "";
            }

            $value = $_POST['menu-item-'.$key][$menu_item_db_id];
            update_post_meta( $menu_item_db_id, '_menu_item_'.$key, $value );

        }
}

/**
 * Define new Walker edit
 *
 * @access      public
 * @since       1.0
 * @return      void
*/
function asalah_edit_walker($walker,$menu_id) {

    return 'Walker_Nav_Menu_Edit_Custom';

}


/* Custom WP_NAV_MENU function for top navigation */

if (!class_exists('asalah_header_walker_nav_menu')) {
    class asalah_header_walker_nav_menu extends Walker_Nav_Menu {

      /**
       * @see Walker::start_lvl()
       * @since 3.0.0
       *
       * @param string $output Passed by reference. Used to append additional content.
       * @param int $depth Depth of page. Used for padding.
       */
      function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
      }

      /**
       * @see Walker::start_el()
       * @since 3.0.0
       *
       * @param string $output Passed by reference. Used to append additional content.
       * @param object $item Menu item data object.
       * @param int $depth Depth of menu item. Used for padding.
       * @param int $current_page Menu item ID.
       * @param object $args
       */

      function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        /**
         * Dividers, Headers or Disabled
           * =============================
         * Determine whether the item is a Divider, Header, Disabled or regular
         * menu item. To prevent errors we use the strcasecmp() function to so a
         * comparison that is not case sensitive. The strcasecmp() function returns
         * a 0 if the strings are equal.
         */
        if (strcasecmp($item->attr_title, 'divider') == 0 && $depth === 1) {
          $output .= $indent . '<li role="presentation" class="divider">';
        } else if (strcasecmp($item->attr_title, 'dropdown-header') == 0 && $depth === 1) {
          $output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
        } else if (strcasecmp($item->attr_title, 'disabled') == 0) {
          $output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
        }
                    else {

          $class_names = $value = '';

          $classes = empty( $item->classes ) ? array() : (array) $item->classes;
          $classes[] = 'menu-item-' . $item->ID;

          $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

          if($args->has_children && $depth === 0) { $class_names .= ' dropdown'; }
                            elseif($args->has_children && $depth > 0) { $class_names .= ' dropdown-submenu'; }

          if(in_array('current-menu-item', $classes)) { $class_names .= ' active'; }

          $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

          $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
          $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

          $output .= $indent . '<li' . $id . $value . $class_names .'>';

          $atts = array();
          $atts['title']  = '';
                            /*if(!empty($item->title)):
                                if(strpos($item->title, 'icon-') === 0):
                                    $atts['title'] = '<i class="' . $item->title . '"></i>';
                                endif;
                            else:
                                $atts['title'] = '';
                            endif;*/

          $atts['target'] = ! empty( $item->target ) ? $item->target : '';
          $atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';

          //If item has_children add atts to a
          if($args->has_children && $depth === 0) {
            /* $atts['href'] = '#'; */
            /* $atts['data-toggle']	= 'dropdown'; */

            $atts['data-hover'] = 'dropdown';
            $atts['class'] = 'dropdown-toggle';
          } else {
            $atts['href'] = ! empty( $item->url ) ? $item->url : '';
          }

          $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

          $attributes = '';
          foreach ( $atts as $attr => $value ) {
                                if ( ! empty( $value ) ) {
                                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );

                                    if($value !== 'srp-icon'){
                                        $attributes .= ' ' . $attr . '="' . $value . '"';
                                    }
                                }
          }

          if ($item->megamenu != '') {
            $item_output = $args->before;
            $item_output .= '<style>.widgets_nav.hidden_carousel{top: -3000px;} .open .hidden_carousel{top:100%;}</style>';

                  $dropdown_class = 'left_dropdown';
                  if ($item->dropdown == 'right') {
                  $dropdown_class = 'right_dropdown';
                  }
                  $menu_li_class = 'linkable_mega';
                  if (!empty($item->clickable)) {
                    $menu_li_class = 'nonlinkable_mega';
                  }
                  $classes = empty( $item->classes ) ? array() : (array) $item->classes;
                  $classes[] = 'menu-item-' . $item->ID;

                  $menu_li_class .= ' '.join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
                  $item_output .=  '<li class="menu-item '.$menu_li_class .' mega-menu-item-'. $item->ID .'dropdown">';

                    if (!empty($item->clickable)) {
                    $item_output .= '<a data-hover="dropdown" class="dropdown-toggle" style="cursor: pointer;">';
                    if ($item->menuicon != '') {
                      $item_output .= '<span class="menu_icon"><i class="'.$item->menuicon.'"></i></span>';
                    }
                    $item_output .= $item->title.'</a>';
                    } else {
                    $item_output .= '<a href="'.$item->url.'" data-hover="dropdown" class="dropdown-toggle mega">';
                    if ($item->menuicon != '') {
                      $item_output .= '<span class="menu_icon"><i class="'.$item->menuicon.'"></i></span>';
                    }
                    $item_output .= $item->title.'</a>';
                    }
                    $item_output .= '<ul role="menu" class=" dropdown-menu '.$dropdown_class.' animated fadeInDown widgets_nav" style="display:none">';
                    $item_output .= '<li class="menu-item">';
                          $item_output .= '<div class="widget_nav_wrapper" style="width: '.$item->width.'px;">';
                          $item_output .= do_shortcode(htmlspecialchars_decode($item->text));
                          $item_output .= '</div>';
                        $item_output .= '</li>';
                      $item_output .= '</ul>';
                    //$item_output .= '</li>';
                    $item_output .= $args->after;

                    wp_reset_query();

          } else {
          $item_output = $args->before;

          /*
           * Glyphicons
           * ===========
           * Since the the menu item is NOT a Divider or Header we check the see
           * if there is a value in the attr_title property. If the attr_title
           * property is NOT null we apply it as the class name for the glyphicon.
           */

          if(! empty( $item->attr_title )){
                                if( $item->title === 'srp-icon' ){
                                    $item_output .= '<a'. $attributes . '><i class=" ' . esc_attr( $item->attr_title ) . '"></i>';
                                }
                                else{
                                    $item_output .= '<a'. $attributes .'><i class=" ' . esc_attr( $item->attr_title ) . '"></i>&nbsp;&nbsp;';
                                }

          } else {
                                $item_output .= '<a'. $attributes .'>';
          }
          if ($item->menuicon != '') {
            $item_output .= '<span class="menu_icon"><i class="'.$item->menuicon.'"></i></span>';
          }

                            if( $item->title === 'srp-icon' ){
                                $item_output .= $args->link_before . $args->link_after;
                            }
          else{
                                $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
                            }

                            $item_output .= ($args->has_children) ? ' <i class="icon-down-open"></i></a>' : '</a>';
                            $item_output .= $args->after;
                          }

          $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

        }
      }

      /**
       * Traverse elements to create list from elements.
       *
       * Display one element if the element doesn't have any children otherwise,
       * display the element and its children. Will only traverse up to the max
       * depth and no ignore elements under that depth.
       *
       * This method shouldn't be called directly, use the walk() method instead.
       *
       * @see Walker::start_el()
       * @since 2.5.0
       *
       * @param object $element Data object
       * @param array $children_elements List of elements to continue traversing.
       * @param int $max_depth Max depth to traverse.
       * @param int $depth Depth of current element.
       * @param array $args
       * @param string $output Passed by reference. Used to append additional content.
       * @return null Null on failure with no changes to parameters.
       */

      function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
            if ( !$element ) {
                return;
            }

            $id_field = $this->db_fields['id'];

            //display this element
            if ( is_object( $args[0] ) ) {
               $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
            }

            parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
        }

}}
