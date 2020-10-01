<?php

add_action('init', 'of_options');
include (TEMPLATEPATH . '/inc/fonts.php');
if (!function_exists('of_options')) {

    function of_options() {
        //Access the WordPress Categories via an Array
        $of_categories = array();
        $of_categories_obj = get_categories('hide_empty=0');
        foreach ($of_categories_obj as $of_cat) {
            $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;
        }
        $categories_tmp = array_unshift($of_categories, "Select a category:");

        //Access the WordPress Pages via an Array
        $of_pages = array();
        $of_pages_obj = get_pages('sort_column=post_parent,menu_order');
        foreach ($of_pages_obj as $of_page) {
            $of_pages[$of_page->ID] = $of_page->post_name;
        }
        $of_pages_tmp = array_unshift($of_pages, "Select a page:");

        //Testing
        $of_options_select = array("one", "two", "three", "four", "five");
        $of_options_radio = array("one" => "One", "two" => "Two", "three" => "Three", "four" => "Four", "five" => "Five");

        //Sample Homepage blocks for the layout manager (sorter)
        $of_options_homepage_blocks = array
            (
            "disabled" => array(
                "placebo" => "placebo", //REQUIRED!
                "block_one" => "Block One",
                "block_two" => "Block Two",
                "block_three" => "Block Three",
            ),
            "enabled" => array(
                "placebo" => "placebo", //REQUIRED!
                "block_four" => "Block Four",
            ),
        );


        //Stylesheets Reader
        $alt_stylesheet_path = LAYOUT_PATH;
        $alt_stylesheets = array();

        if (is_dir($alt_stylesheet_path)) {
            if ($alt_stylesheet_dir = opendir($alt_stylesheet_path)) {
                while (($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false) {
                    if (stristr($alt_stylesheet_file, ".css") !== false) {
                        $alt_stylesheets[] = $alt_stylesheet_file;
                    }
                }
            }
        }


        //Background Images Reader
        $bg_images_path = get_stylesheet_directory() . '/images/bg/'; // change this to where you store your bg images
        $bg_images_url = get_template_directory_uri() . '/images/bg/'; // change this to where you store your bg images
        $bg_images = array();

        if (is_dir($bg_images_path)) {
            if ($bg_images_dir = opendir($bg_images_path)) {
                while (($bg_images_file = readdir($bg_images_dir)) !== false) {
                    if (stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
                        $bg_images[] = $bg_images_url . $bg_images_file;
                    }
                }
            }
        }


        /* ----------------------------------------------------------------------------------- */
        /* TO DO: Add options/functions that use these */
        /* ----------------------------------------------------------------------------------- */

        //More Options
        $uploads_arr = wp_upload_dir();
        $all_uploads_path = $uploads_arr['path'];
        $all_uploads = get_option('of_uploads');
        $other_entries = array("Select a number:", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19");
        $body_repeat = array("no-repeat", "repeat-x", "repeat-y", "repeat");
        $body_pos = array("top left", "top center", "top right", "center left", "center center", "center right", "bottom left", "bottom center", "bottom right");

        // Image Alignment radio box
        $of_options_thumb_align = array("alignleft" => "Left", "alignright" => "Right", "aligncenter" => "Center");

        // Image Links to Options
        $of_options_image_link_to = array("image" => "The Image", "post" => "The Post");


        /* ----------------------------------------------------------------------------------- */
        /* The Options Array */
        /* ----------------------------------------------------------------------------------- */

// Set the Options Array
        global $of_options;
        $of_options = array();

        $of_options[] = array("name" => "General Settings",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "asalah_home.png"
        );

        $of_options[] = array("name" => "Logo URL",
            "desc" => "Put the URL of your logo, or upload new one",
            "id" => "asalah_logo_url",
            "std" => "",
            "type" => "media");

        $of_options[] = array("name" => "Retina Logo URL",
            "desc" => "It should be double size as default logo",
            "id" => "asalah_logo_url_retina",
            "std" => "",
            "type" => "media");

        $of_options[] = array("name" => "Default Logo Width in pixel",
            "desc" => "",
            "id" => "asalah_logo_url_w",
            "std" => "200",
            "min" => "1",
            "max" => "600",
            "type" => "sliderui"
        );

        $of_options[] = array("name" => "Default Logo Height in pixel",
            "desc" => "",
            "id" => "asalah_logo_url_h",
            "std" => "200",
            "min" => "1",
            "max" => "600",
            "type" => "sliderui"
        );

        $of_options[] = array("name" => "Favicon URL",
            "desc" => "",
            "id" => "asalah_fav_url",
            "std" => "",
            "type" => "media");

        $of_options[] = array("name" => "Apple Iphone Icon",
            "desc" => "57px X 57px",
            "id" => "asalah_apple_57",
            "std" => "",
            "type" => "media");

        $of_options[] = array("name" => "Apple Ipad Icon",
            "desc" => "72px X 72px",
            "id" => "asalah_apple_72",
            "std" => "",
            "type" => "media");

        $of_options[] = array("name" => "Apple Retina Icon",
            "desc" => "144px X 114px",
            "id" => "asalah_apple_114",
            "std" => "",
            "type" => "media");

        $of_options[] = array("name" => "Apple Iphone Icon",
            "desc" => "57px X 57px",
            "id" => "asalah_apple_57",
            "std" => "",
            "type" => "media");

        $of_options[] = array("name" => "Default Image",
            "desc" => "Choose and image to be the default image of your website, this image will be the thumbnail of posts without any image, and also will appear on Facebook and social sites if some one shares a post without and image.",
            "id" => "asalah_default_image",
            "std" => "",
            "type" => "media");

        $of_options[] = array("name" => "Header Phone Number",
            "desc" => "",
            "id" => "asalah_header_phone",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Header Email Address",
            "desc" => "",
            "id" => "asalah_header_mail",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Copyright Text",
            "desc" => "Copyright Text",
            "id" => "asalah_copyright_text",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Make E-mail linkable",
            "desc" => "",
            "id" => "asalah_linkable_email",
            "std" => 0,
            "type" => "switch"
        );
        $of_options[] = array("name" => "Make Phone number linkable",
            "desc" => "",
            "id" => "asalah_linkable_phone",
            "std" => 0,
            "type" => "switch"
        );
        $of_options[] = array("name" => "Enable hover effects for Social icons",
            "desc" => "",
            "id" => "header_socialicons_hover",
            "std" => 0,
            "type" => "switch"
        );
        $of_options[] = array("name" => "Enable Search at Top Bar",
            "desc" => "",
            "id" => "asalah_enable_searchbar",
            "std" => 0,
            "type" => "switch"
        );
        $of_options[] = array("name" => "Search Scope",
            "desc" => "",
            "id" => "asalah_search_scope",
            "std" => "",
            "type" => "select",
            "options" => array(
              ''=> 'Default',
              'posts'=> 'Posts Only',
              'projects'=> 'Projects Only',
              'pages'=> 'Pages Only',
              'posts_pages'=> 'Posts and Pages Only',
              'posts_projects'=> 'Posts and Projects Only',
              'pages_projects'=> 'Pages and Projects Only',
              'all_content'=> 'Posts and Projects and Pages'
            ));
        $of_options[] = array("name" => "Disable PrettyPhoto plugin (images popup when clicked)",
            "desc" => "",
            "id" => "asalah_disable_prettophoto",
            "std" => 0,
            "type" => "switch"
        );

        $of_options[] = array("name" => "Hide Social share at images popup",
            "desc" => "",
            "id" => "asalah_hide_prettophoto_social",
            "std" => 0,
            "type" => "switch"
        );

        $of_options[] = array("name" => "Add FontAwesome Icons",
            "desc" => "",
            "id" => "asalah_enable_fontawesome",
            "std" => 0,
            "type" => "switch"
        );

        $of_options[] = array("name" => "Header Custom Code",
            "desc" => "",
            "id" => "asalah_header_code",
            "std" => "",
            "type" => "textarea");

        $of_options[] = array("name" => "Footer Custom Code",
            "desc" => "",
            "id" => "asalah_footer_code",
            "std" => "",
            "type" => "textarea");

        $of_options[] = array("name" => "CSS Custom Code",
            "desc" => "",
            "id" => "asalah_custom_css",
            "std" => "",
            "type" => "textarea");

        $of_options[] = array("name" => "Layout Settings",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "asalah_layout.png");

        $of_options[] = array("name" => "1200px Width Layout",
            "desc" => "",
            "id" => "asalah_1200_layout",
            "std" => 0,
            "type" => "switch"
        );

        $of_options[] = array("name" => "Color switcher",
            "desc" => "",
            "id" => "asalah_color_switcher",
            "std" => 0,
            "type" => "switch"
        );

        $of_options[] = array("name" => "Boxed Layout",
            "desc" => "",
            "id" => "asalah_boxed_layout",
            "std" => 0,
            "type" => "switch"
        );

        $of_options[] = array("name" => "Sticky Header",
            "desc" => "",
            "id" => "asalah_sticky_header",
            "std" => 0,
            "type" => "switch"
        );

        $of_options[] = array(
            "name" => "Disable Breadcrumbs",
            "desc" => "",
            "id" => "asalah_disable_breadcrumb",
            "std" => 0,
            "type" => "switch"
        );
        if (function_exists('yoast_breadcrumb')) {
          $of_options[] = array(
              "name" => "Use Yoast SEO Breadcrumbs",
              "desc" => "",
              "id" => "asalah_yoast_breadcrumb",
              "std" => 0,
              "type" => "switch"
          );
        }

        $of_options[] = array("name" => "Logo Margin Top",
            "desc" => "The space between logo and top menu in px, add the number you want for example 30",
            "id" => "asalah_logo_margin",
            "std" => 30,
            "type" => "text");

        $of_options[] = array("name" => "Main Menu Margin Top",
            "desc" => "The space between main menu and top in px, add the number you want for example 22",
            "id" => "asalah_menu_margin",
            "std" => 22,
            "type" => "text");


        $of_options[] = array("name" => "Portfolio Page URL",
            "desc" => "",
            "id" => "asalah_portfolio_url",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Number Of Posts In Portfolio Page",
            "desc" => "",
            "id" => "asalah_portfolio_number",
            "std" => 12,
            "type" => "text");

        $portfolio_icon_options = array("fancybox" => "Fancybox", "url" => "URL");
        $of_options[] = array("name" => "Portfolio Icon Open as",
            "desc" => "",
            "id" => "asalah_portfolio_icon",
            "std" => "fancybox",
            "type" => "select",
            "options" => $portfolio_icon_options);


        $of_options[] = array("name" => "Blog Page URL",
            "desc" => "",
            "id" => "asalah_blog_url",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Number Of Posts In Blog Page",
            "desc" => "",
            "id" => "asalah_blog_number",
            "std" => 6,
            "type" => "text");


        $of_options[] = array("name" => "Sidebars Settings",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "asalah_layout.png");

        $of_options[] = array("name" => "Custom Sidebars",
            "desc" => "Here you can add custom sidebars to use theme with pages and posts.",
            "id" => "asalah_custom_sidebars",
            "std" => "",
            "type" => "sidebars"
        );

        $of_options[] = array("name" => "Posts Settings",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "asalah_layout.png"
        );

        $of_options[] = array("name" => "Posts Layout",
            "desc" => "",
            "id" => "asalah_post_layout",
            "std" => "",
            "type" => "select",
            "options" => array(
							'right'=> 'Right Sidebar',
							'left'=> 'Left Sidebar',
							'full'=> 'No Sidebar'
						));

        global $asalah_data;
        $custom_sidebars_options = array ('none' => 'None');
        if (isset($asalah_data['asalah_custom_sidebars']) && ($asalah_data['asalah_custom_sidebars'] != '')) {
        $sidebars = $asalah_data['asalah_custom_sidebars'];
        }
        if (isset($sidebars)):

          foreach ($sidebars as $option) {
            $siebar_id = "asalah_custom_sidebar_". $option['order'];
            if (!empty($option['title'])) {
              $custom_sidebars_options[$siebar_id] = $option['title'];
            } else {
              $custom_sidebars_options[$siebar_id] = 'Sidebar '.$option['order'];
            }
          }
        endif;

        $of_options[] = array("name" => "Posts Custom Sidebar",
            "desc" => "",
            "id" => "asalah_custom_sidebar",
            "std" => "",
            "type" => "select",
            "options" => $custom_sidebars_options
          );

        $of_options[] = array("name" => "Posts Page Title Holder",
            "desc" => "",
            "id" => "asalah_title_holder",
            "std" => "",
            "type" => "select",
            "options" => array(
							'show'=> 'Show',
							'hide'=> 'Hide',
						),
          );

        $of_options[] = array("name" => "Posts Custom page title background URL",
            "desc" => "",
            "id" => "asalah_custom_title_bg",
            "std" => "",
            "type" => "media");

        $of_options[] = array("name" => "Posts Author Box",
            "desc" => "",
            "id" => "asalah_post_author_box",
            "std" => "",
            "type" => "select",
            "options" => array(
							'show'=> 'Show',
							'hide'=> 'Hide',
						),
          );

        $of_options[] = array("name" => "Posts Share Icons",
            "desc" => "",
            "id" => "asalah_post_share_box",
            "std" => "",
            "type" => "select",
            "options" => array(
							'show'=> 'Show',
							'hide'=> 'Hide',
						),
          );

        $of_options[] = array("name" => "Posts Meta Info",
            "desc" => "",
            "id" => "asalah_post_meta_info",
            "std" => "",
            "type" => "select",
            "options" => array(
							'show'=> 'Show',
							'hide'=> 'Hide',
						),
          );

        $of_options[] = array("name" => "Posts Meta Date",
            "desc" => "",
            "id" => "asalah_post_meta_info_date",
            "std" => "",
            "type" => "select",
            "options" => array(
							'show'=> 'Show',
							'hide'=> 'Hide',
						),
          );

        $of_options[] = array("name" => "Posts Meta Comments",
            "desc" => "",
            "id" => "asalah_post_meta_info_comment",
            "std" => "",
            "type" => "select",
            "options" => array(
							'show'=> 'Show',
							'hide'=> 'Hide',
						),
          );

        $of_options[] = array("name" => "Posts Meta Categories",
            "desc" => "",
            "id" => "asalah_post_meta_info_category",
            "std" => "",
            "type" => "select",
            "options" => array(
							'show'=> 'Show',
							'hide'=> 'Hide',
						),
          );

        $of_options[] = array("name" => "Posts Meta Tags",
            "desc" => "",
            "id" => "asalah_post_meta_info_tag",
            "std" => "",
            "type" => "select",
            "options" => array(
							'show'=> 'Show',
							'hide'=> 'Hide',
						),
          );

        $of_options[] = array("name" => "Posts Type Icon",
            "desc" => "",
            "id" => "asalah_post_format_icon",
            "std" => "",
            "type" => "select",
            "options" => array(
							'show'=> 'Show',
							'hide'=> 'Hide',
						),
          );

        $of_options[] = array("name" => "Posts Navigation",
            "desc" => "",
            "id" => "asalah_post_navigation_show",
            "std" => "",
            "type" => "select",
            "options" => array(
							'show'=> 'Show',
							'hide'=> 'Hide',
						),
          );

        $of_options[] = array("name" => "Pages Settings",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "asalah_layout.png"
        );

        $of_options[] = array("name" => "Pages Layout",
            "desc" => "",
            "id" => "asalah_page_layout",
            "std" => "",
            "type" => "select",
            "options" => array(
							'right'=> 'Right Sidebar',
							'left'=> 'Left Sidebar',
							'full'=> 'No Sidebar'
						));

        $of_options[] = array("name" => "Pages Page Title Holder",
            "desc" => "",
            "id" => "asalah_page_title_holder",
            "std" => "",
            "type" => "select",
            "options" => array(
							'show'=> 'Show',
							'hide'=> 'Hide',
						),
          );

        $of_options[] = array("name" => "Pages Custom page title background URL",
            "desc" => "",
            "id" => "asalah_page_custom_title_bg",
            "std" => "",
            "type" => "media");

        $of_options[] = array("name" => "Pages Author Box",
            "desc" => "",
            "id" => "asalah_page_author_box",
            "std" => "",
            "type" => "select",
            "options" => array(
							'show'=> 'Show',
							'hide'=> 'Hide',
						),
          );
          $of_options[] = array("name" => "Pages Page Title",
              "desc" => "",
              "id" => "asalah_page_title",
              "std" => "",
              "type" => "select",
              "options" => array(
  							'show'=> 'Show',
  							'hide'=> 'Hide',
  						),
            );

        $of_options[] = array("name" => "Pages Share Icons",
            "desc" => "",
            "id" => "asalah_page_share_box",
            "std" => "",
            "type" => "select",
            "options" => array(
							'show'=> 'Show',
							'hide'=> 'Hide',
						),
          );

        $of_options[] = array("name" => "Pages Meta Info",
            "desc" => "",
            "id" => "asalah_page_meta_info",
            "std" => "",
            "type" => "select",
            "options" => array(
							'show'=> 'Show',
							'hide'=> 'Hide',
						),
          );

        $of_options[] = array("name" => "Pages Meta Date",
            "desc" => "",
            "id" => "asalah_page_meta_info_date",
            "std" => "",
            "type" => "select",
            "options" => array(
							'show'=> 'Show',
							'hide'=> 'Hide',
						),
          );

        $of_options[] = array("name" => "Pages Meta Comments",
            "desc" => "",
            "id" => "asalah_page_meta_info_comment",
            "std" => "",
            "type" => "select",
            "options" => array(
							'show'=> 'Show',
							'hide'=> 'Hide',
						),
          );

        $of_options[] = array("name" => "Pages Type Icon",
            "desc" => "",
            "id" => "asalah_page_format_icon",
            "std" => "",
            "type" => "select",
            "options" => array(
							'show'=> 'Show',
							'hide'=> 'Hide',
						),
          );

        $of_options[] = array("name" => "Projects Settings",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "asalah_layout.png"
        );

        $of_options[] = array("name" => "Projects Layout",
            "desc" => "",
            "id" => "asalah_project_layout",
            "std" => "",
            "type" => "select",
            "options" => array(
              'right'=> 'right',
							'left'=> 'left',
							'full'=> 'Full Width'
						),
          );

          $of_options[] = array("name" => "Projects Overview",
              "desc" => "",
              "id" => "asalah_project_overview_show",
              "std" => "",
              "type" => "select",
              "options" => array(
                'show'=> 'Show',
  							'hide'=> 'Hide',
  						),
            );

          $of_options[] = array("name" => "Projects Details",
              "desc" => "",
              "id" => "asalah_project_meta_info",
              "std" => "",
              "type" => "select",
              "options" => array(
                'show'=> 'Show',
  							'hide'=> 'Hide',
  						),
            );

          $of_options[] = array("name" => "Projects Date",
              "desc" => "",
              "id" => "asalah_project_show_date",
              "std" => "",
              "type" => "select",
              "options" => array(
                'show'=> 'Show',
  							'hide'=> 'Hide',
  						),
            );

          $of_options[] = array("name" => "Projects Tags",
              "desc" => "",
              "id" => "asalah_project_show_tag",
              "std" => "",
              "type" => "select",
              "options" => array(
                'show'=> 'Show',
  							'hide'=> 'Hide',
  						),
            );

      $of_options[] = array("name" => "Projects Social Share",
          "desc" => "",
          "id" => "asalah_project_share_box",
          "std" => "",
          "type" => "select",
          "options" => array(
            'show'=> 'Show',
            'hide'=> 'Hide',
          ),
        );

        $of_options[] = array("name" => "Other Projects",
            "desc" => "",
            "id" => "asalah_post_other",
            "std" => "",
            "type" => "select",
            "options" => array(
              'show'=> 'Show',
              'hide'=> 'Hide',
            ),
          );

        $of_options[] = array("name" => "Projects Navigation",
            "desc" => "",
            "id" => "asalah_projects_navigation_show",
            "std" => "",
            "type" => "select",
            "options" => array(
              'show'=> 'Show',
              'hide'=> 'Hide',
            ),
          );

          $of_options[] = array("name" => "Preview Button text (leave blank for default 'Live Preview...')",
              "desc" => "",
              "id" => "asalah_preview_button_text",
              "std" => "",
              "type" => "text");

              $of_options[] = array("name" => "Projects Filter Links",
                  "desc" => "",
                  "id" => "asalah_project_filter_links",
                  "std" => 0,
                  "type" => "switch"
              );

          $of_options[] = array("name" => "Number of projects to show at Other Projects (default 9)",
              "desc" => "",
              "id" => "asalah_other_projects_num",
              "std" => "",
              "type" => "text");

          $of_options[] = array("name" => "Number of projects to show per slide at Other Projects (default 3)",
              "desc" => "",
              "id" => "asalah_other_projects_slide_num",
              "std" => "",
              "type" => "text");

          $of_options[] = array("name" => "Projects Page Title Background",
              "desc" => "Custom page title background URL for projects and portfolio",
              "id" => "asalah_custom_title_bg_projects",
              "std" => "",
              "type" => "media");

        $of_options[] = array("name" => "Social Settings",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "asalah_social.png");

        $of_options[] = array("name" => "Hide RSS Icon",
            "desc" => "",
            "id" => "asalah_disable_rss",
            "std" => 0,
            "type" => "switch"
        );

        $of_options[] = array("name" => "RSS Feed URL",
            "desc" => "",
            "id" => "asalah_rss_url",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Facebook Page URL",
            "desc" => "",
            "id" => "asalah_fb_url",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Twitter Username",
            "desc" => "",
            "id" => "asalah_tw_url",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Google Plus URL",
            "desc" => "",
            "id" => "asalah_gp_url",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Linkedin URL",
            "desc" => "",
            "id" => "asalah_linked_url",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Youtube URL",
            "desc" => "",
            "id" => "asalah_youtube_url",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Vimeo URL",
            "desc" => "",
            "id" => "asalah_vimeo_url",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "VK URL",
            "desc" => "",
            "id" => "asalah_vk_url",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Instagram URL",
            "desc" => "",
            "id" => "asalah_instagram_url",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Pinterest URL",
            "desc" => "",
            "id" => "asalah_pin_url",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "500PX URL",
            "desc" => "",
            "id" => "asalah_500px_url",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Github URL",
            "desc" => "",
            "id" => "asalah_github_url",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Flickr URL",
            "desc" => "",
            "id" => "asalah_flickr_url",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Facebook APP ID",
            "desc" => "",
            "id" => "asalah_fb_id",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Use our opengraph tags",
            "desc" => "Adds your opengraph tags to your header, for showing image and correct info about your page on facebook like.",
            "id" => "asalah_use_og",
            "std" => 1,
            "type" => "checkbox");

        $of_options[] = array("name" => "Add facebook SDK library to header",
            "desc" => "Disable this if any conflict with another plugin which has (social plugins).",
            "id" => "asalah_use_sdk",
            "std" => 1,
            "type" => "checkbox");

        $of_options[] = array("name" => "Twitter Access token",
            "desc" => "",
            "id" => "asalah_at_id",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Twitter Access token secret",
            "desc" => "",
            "id" => "asalah_ats_id",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Consumer key",
            "desc" => "",
            "id" => "asalah_conk_id",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Consumer secret",
            "desc" => "",
            "id" => "asalah_cons_id",
            "std" => "",
            "type" => "text");


        global $fontsarray;


        $decode = json_decode($fontsarray, true);

        $webfonts = array('none' => 'Default');

        foreach ($decode['items'] as $key => $property) {

            $item_family = $decode['items'][$key]['family'];

            $item_family_trunc = str_replace(' ', '+', $item_family);

            $webfonts[$item_family_trunc] = $item_family;
        }

        $of_options[] = array("name" => "Fonts",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "asalah_fonts.png");

            $of_options[] = array("name" => "Load Theme Fonts Locally? (instead of Google Fonts CDN)",
                "desc" => "",
                "id" => "asalah_fonts_load_locally",
                "std" => "no",
                "type" => "select",
                "options" => array(
                  'no' => 'No',
                  'yes' => 'Yes',
                ));


        $fontsclasses = array(
            "body" => "Main Font",
            "h1,h2,h3,h4,h5,h6, .logo, .below_header .navbar .nav > .active > a, .below_header .navbar .nav > .active > a:hover, .below_header .navbar .nav > .active > a:focus, .below_header .navbar .nav > li > a, .testimonial_box, .plan_title, .plan_price" => "Titles Font"
        );

        foreach ($fontsclasses as $class => $title) {
            $id = str_replace(' ', '', $class);
            $id = str_replace('.', '~', $id);
            $id = str_replace(',', '*', $id);
            $id = str_replace('[', '%', $id);
            $id = str_replace(']', '%', $id);
            $id = str_replace("'", '!', $id);
            $id = "asalah_gfonts_" . $id;

            $of_options[] = array("name" => $title,
                "id" => $id,
                "std" => "none",
                "type" => "select_google_font",
                "preview" => array(
                    "text" => "This is my preview text!", //this is the text from preview box
                    "size" => "30px" //this is the text size from preview box
                ),
                "options" => $webfonts
            );
        }

        foreach ($fontsclasses as $class => $title) {
            $id = str_replace(' ', '', $class);
            $id = str_replace('.', '~', $id);
            $id = str_replace(',', '*', $id);
            $id = str_replace('[', '%', $id);
            $id = str_replace(']', '%', $id);
            $id = str_replace("'", '!', $id);
            $id = "asalah_gfonts_" . $id;

            if ($asalah_data[$id] != '' && $asalah_data[$id] != 'none') {
              $webfonts_subsets = array();
              foreach ($decode['items'] as $key => $property) {

                  $item_family = $decode['items'][$key]['family'];

                  if ($asalah_data[$id] == $item_family) {
                    $item_subset = $decode['items'][$key]['subsets'];

                    foreach ($item_subset as $subset) {
                      $webfonts_subsets[$subset] = $subset;
                    }
                  }
              }

              $of_options[] = array("name" => $title . ' Subsets',
              "id" => $id.'_subset',
              "std" => "none",
              "type" => "multiselect",
              "options" => $webfonts_subsets
            );
            }
        }

        $of_options[] = array("name" => "Typography",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "asalah_typo.png");

        $of_options[] = array("name" => "Google Fonts List",
            "desc" => "Auto Update Google Fonts List (We recomment not to use this feature and we will provide update to google fonts list.",
            "id" => "asalah_update_googlefonts",
            "std" => 0,
            "folds" => 1,
            "type" => "checkbox");

        $of_options[] = array("name" => "Your Google Fonts API",
            "desc" => "",
            "id" => "asalah_googlefonts_api",
            "std" => "",
            "fold" => "asalah_update_googlefonts",
            "type" => "text");

        $typographyclasses = array(
            "body" => "Main Typography",
            "a" => "Site Links",
            "h1" => "h1",
            "h2" => "h2",
            "h3" => "h3",
            "h4" => "h4",
            "h5" => "h5",
            "h6" => "h6",
            ".contact_info_item" => "Header Contact Info",
            ".below_header .navbar .nav > li > a" => "Main Menu",
            ".page-header a" => "Block Title",
            ".services_info h3" => "Service Block Title",
            ".portfolio_info h5" => "Project Title",
            ".blog_title h4" => "Blog Title",
            ".widget_container h3" => "Widget Title",
            ".site_footer" => "Footer Text",
            ".site_footer a" => "Footer Links",
            ".site_secondary_footer" => "Second Footer Text",
            ".site_secondary_footer a" => "Second Footer Links",
            ".page_title_holder h1" => "Page Title Holder",
            ".page_title_holder .breadcrumb, .page_title_holder .breadcrumb a" => "Breadcrumbs"
        );
        foreach ($typographyclasses as $class => $title) {
            $id = str_replace(' ', '', $class);
            $id = str_replace('.', '^', $id);
            $id = str_replace('[', '%', $id);
            $id = str_replace(']', '%', $id);
            $id = str_replace("'", '!', $id);
            $id = "asalah_typo_" . $id;
            $of_options[] = array("name" => $title,
                "desc" => "",
                "id" => $id,
                "std" => array('size' => '0', 'style' => '', 'height' => '0', 'color' => ''),
                "type" => "typography");
        }


        $of_options[] = array("name" => "colors Settings",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "asalah_colors.png");

        $of_options[] = array("name" => "Skin",
            "desc" => "Change Your Site Color.",
            "id" => "asalah_skin_color",
            "std" => "",
            "type" => "color");

        $colorclasses = array(
            "body" => "Body",
            ".top_header" => "Top Header",
            ".below_header" => "Main Header Area",
            "a:hover, a:active" => "Links Hover/Active",
            "input[type='submit']" => 'Submit Buttons',
            "input[type='submit']:hover" => "Submit Button Hover",
            ".site_footer" => "Site Footer",
            ".site_secondary_footer" => "Second Footer",
            ".progress-striped .bar" => "Progress And Skills Bars",
            ".gototop" => "Go To Top Button",
            ".top_header_tools_holder" => "Header Social Icons Background",
        );

        foreach ($colorclasses as $class => $title) {
            $id = str_replace(' ', '', $class);
            $id = str_replace('.', '^', $id);
            $id = str_replace('[', '%', $id);
            $id = str_replace(']', '%', $id);
            $id = str_replace("'", '!', $id);
            $id = "asalah_bgcolor_" . $id;
            $of_options[] = array("name" => $title,
                "desc" => "",
                "id" => $id,
                "std" => "",
                "type" => "color");
        }

        $of_options[] = array("name" => "Translating",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "asalah_social.png");



        $of_options[] = array("name" => "Projects (Plural)",
            "desc" => "",
            "id" => "asalah_translate_projects",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Projects link",
            "desc" => "",
            "id" => "asalah_portfolio_slug",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Project (Single)",
            "desc" => "",
            "id" => "asalah_translate_project_single",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Project Overview",
            "desc" => "",
            "id" => "asalah_translate_projectoverview",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Project Details",
            "desc" => "",
            "id" => "asalah_translate_projectdetails",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Other Projects",
            "desc" => "",
            "id" => "asalah_translate_otherprojects",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Show all (in project filter bar)",
            "desc" => "",
            "id" => "asalah_translate_showall",
            "std" => "",
            "type" => "text");

        $of_options[] = array("name" => "Other Members (Single Team Member page)",
        "desc" => "",
        "id" => "asalah_othermembers_phrase",
        "std" => "",
        "type" => "text");
// Backup Options
        $of_options[] = array("name" => "Backgrounds",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "asalah_back.png");


        $of_options[] = array("name" => "Site Custom Background",
            "desc" => "Enable custom background for body",
            "id" => "asalah_enable_html_background",
            "std" => 0,
            "folds" => 1,
            "type" => "checkbox");

        $of_options[] = array("name" => "Site Background Images",
            "desc" => "Select a background pattern.",
            "id" => "asalah_html_custom_bg",
            "std" => $bg_images_url . "bg0.png",
            "fold" => 'asalah_enable_html_background',
            "type" => "tiles",
            "options" => $bg_images,
        );

        $of_options[] = array("name" => "Body Custom Background",
            "desc" => "Enable custom background for body",
            "id" => "asalah_enable_bg_background",
            "std" => 0,
            "folds" => 1,
            "type" => "checkbox");

        $of_options[] = array("name" => "Body Background Images",
            "desc" => "Select a background pattern.",
            "id" => "asalah_body_custom_bg",
            "std" => $bg_images_url . "bg0.png",
            "fold" => 'asalah_enable_bg_background',
            "type" => "tiles",
            "options" => $bg_images,
        );


        $of_options[] = array("name" => "Upload your own custom backgrounds!",
            "desc" => "",
            "id" => "asalah_custom_bg_instructions",
            "std" => "<h3 style=\"margin: 0 0 10px;\">Upload Your Own Custom Backgrounds.</h3>
                    You can uer below fields to upload your own custom background for your website sections, if you upload custom background for your body you should disable the body background option above.",
            "icon" => true,
            "type" => "info");

        $bgclasses = array(// themes-style
            "html" => "HTML (All Site Background)",
            "body" => "Body",
            ".below_header" => "Header",
            ".site_footer" => "Footer",
            ".site_middle_content" => "Site Content",
            ".page_title_holder" => "Page Title Holder"
        );
        foreach ($bgclasses as $class => $title) {
            $id = str_replace(' ', '', $class);
            $id = str_replace('.', '^', $id);
            $id = str_replace('[', '%', $id);
            $id = str_replace(']', '%', $id);
            $id = str_replace("'", '!', $id);
            $id = "asalah_customebg_" . $id;
            $of_options[] = array("name" => $title,
                "desc" => "",
                "id" => $id,
                "std" => "",
                "type" => "media");
            $repeat_options_radio = array("repeat" => "repeat", "repeat-x" => "repeat-x", "repeat-y" => "repeat-y", "no-repeat" => "no-repeat");
            $of_options[] = array("name" => "",
                "desc" => "",
                "id" => $id . "_repeat",
                "std" => "",
                "type" => "select",
                "options" => $repeat_options_radio);

            $of_options[] = array("name" => "",
                "desc" => "Make This Background Fixed",
                "id" => $id . "_is_fixed",
                "std" => 0,
                "type" => "checkbox");
        }

        $page_holder_options = array("default" => "Default", "black" => "Black", "white" => "White");
        $of_options[] = array("name" => "Page Holder Title Color (Title and links)",
            "desc" => "",
            "id" => "asalah_pageholder_color",
            "std" => "default",
            "type" => "select",
            "options" => $page_holder_options);

// Backup Options
        $of_options[] = array("name" => "Backup Options",
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "icon-slider.png"
        );
        //
        //
        // $of_options[] = array("name" => "Themeforest Username",
        //     "desc" => "",
        //     "id" => "asalah_tf_username",
        //     "std" => "",
        //     "type" => "text");
        //
        // $of_options[] = array("name" => "Themeforest API",
        //     "desc" => "",
        //     "id" => "asalah_tf_api",
        //     "std" => "",
        //     "type" => "text");

        $of_options[] = array("name" => "Backup and Restore Options",
            "id" => "of_backup",
            "std" => "",
            "type" => "backup",
            "desc" => 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
        );

        $of_options[] = array("name" => "Transfer Theme Options Data",
            "id" => "of_transfer",
            "std" => "",
            "type" => "transfer",
            "desc" => 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
        );
        $of_options[] = array( "name" => "Import Demo Theme Options",
            "desc" => "This will import the Demo Theme Options only",
            "id" => "demo_data",
            "std" => admin_url('?import_theme_options_demo=1'),
            "btntext" => 'Import Options',
            "type" => "button"
        );
        if (class_exists('OCDI_Plugin')) {
          $of_options[] = array( "name" => "Import Main Site",
              "desc" => "Importing demo content will copy sliders, theme options, posts, pages and portfolio posts, this will replicate the live demo. WARNING: clicking this button will replace your current theme options, sliders and widgets.  It can also take a minute to complete. (Install One Demo Import plugin for better importing)",
              "id" => "demo_data",
              "std" => admin_url('themes.php?page=pt-one-click-demo-import'),
              "btntext" => 'Import Demo Content',
              "type" => "button"
          );
        } else {
        $of_options[] = array( "name" => "Import Main Site",
            "desc" => "Importing demo content will copy sliders, theme options, posts, pages and portfolio posts, this will replicate the live demo. WARNING: clicking this button will replace your current theme options, sliders and widgets.  It can also take a minute to complete. (Install One Demo Import plugin for better importing)",
            "id" => "demo_data",
            "std" => admin_url('themes.php?page=optionsframework') . "&import_data_content=true&import_demo_name=main",
            "btntext" => 'Import Demo Content',
            "type" => "button"
        );
      }

    }

//End function: of_options()
}//End chack if function exists: of_options()
?>
