<?php

add_action("admin_init", "asalah_post_meta");
function asalah_post_meta(){
	$types = array( 'post', 'page');

	foreach( $types as $type ) {
		  add_meta_box("post_options", sprintf( __( '%s - Post Options.', 'asalah' ) , theme_name ), "post_options", $type, "normal", "default");
	}

	add_meta_box("post_options", sprintf( __( '%s - Post Options.', 'asalah' ) , theme_name ), "project_options", 'project', "normal", "high");
	add_meta_box("testimonials_options", sprintf( __( '%s - Testimonials Options.', 'asalah' ) , theme_name ), "testimonial_options", 'testimonial', "normal", "high");
	add_meta_box("team_options", sprintf( __( '%s - свойства преподавателей.', 'asalah' ) , theme_name ), "team_options", 'team', "normal", "high");
	add_meta_box("admin_options", sprintf( __( '%s - свойства администрации.', 'asalah' ) , theme_name ), "admin_options", 'admin', "normal", "high");

}

function post_options(){
	global $post ;
	global $asalah_data;
	$get_meta = get_post_custom($post->ID);
?>
		<script type="text/javascript">
			jQuery(document).ready( function() {
				jQuery('.vc-composer-icon.vc-c-icon-add').click( function() {
					if ((jQuery('select#page_template').val() != 'page-builder.php') && (jQuery('select#page_template').val() != 'page-builder-container.php'))
					jQuery('select#page_template').val('page-builder.php').change();
				});
			});
		</script>
		<style>
			.asalah_post_options .option-item {
				margin-bottom: 26px;
			}
			.asalah_post_options .option-item .label {
			font-weight: bold;
			padding-bottom: 6px;
			display: block;
			margin-left: 2px;
			}
			.asalah_post_options input[type="text"] {
			color: #777;
			border: none;
			border: solid 1px #EEE;
			border-bottom: solid 1px #DDD;
			background: white;
			font: 13px/22px 'Merriweather', Georgia, serif;
			width: 300px;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			-webkit-appearance: none;
			display: block;
			}
			.asalah_post_options textarea {
			color: #777;
			border: none;
			border: solid 1px #EEE;
			border-bottom: solid 1px #DDD;
			background: white;
			font: 13px/22px 'Merriweather', Georgia, serif;
			width: 100%;
			padding: 10px;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			-webkit-appearance: none;
			display: block;
			height: 150px;
			}
			.asalah_post_options select {
			width: 200px;
			color: #777;
			border: 0;
			height: 30px;
			border: 1px #E2E2E2 solid;
			}
			.criteria_slider {
margin: 2px 7px 8px;
width: 290px;
}
		</style>

        <div class="asalah_post_options">
					<script type='text/javascript'>
					jQuery(document).ready( function() {
					var selected_page_template = jQuery("select#page_template option:selected ").val();

					function show_hide_post_options(value) {
						jQuery('.asalah_post_options .option-item').hide();
						if (value == 'page-portfolio2.php' || (value == 'page-portfolio.php') || (value == 'page-portfolio3.php') || (value == 'taxonomy-tagportfolio.php')) {
							jQuery('.asalah_post_options .option-item.depend_portfolio').show();

						} else if (value == 'page-builder.php' || value == 'page-builder-container.php') {
							jQuery('.asalah_post_options .option-item.depend_builder').show();
							jQuery('#asalah_builder_page_tag-item').show();
							jQuery('#asalah_portfolio_page_tag-item').hide();
						} else if (value == 'page-blog.php') {
							jQuery('.asalah_post_options .option-item.depend_blog').show();
						} else if (value == 'page-clients.php') {
							jQuery('.asalah_post_options .option-item.depend_builder').show();
							jQuery('.asalah_post_options .option-item.depend_clients').show();
						} else if (value == 'page-members.php') {
							jQuery('.asalah_post_options .option-item.depend_builder').show();
							jQuery('.asalah_post_options .option-item.depend_members').show();
						else if (value == 'admin-members.php') {
							jQuery('.asalah_post_options .option-item.depend_builder').show();
							jQuery('.asalah_post_options .option-item.depend_members').show();
						} else {
							jQuery('.asalah_post_options .option-item.depend_page').show();
						}
						}
						show_hide_post_options(selected_page_template);
					jQuery("select[name='page_template']").change(function(){
					var changed_page_template = jQuery(this).val();
					// hide portfolio and blog template boxes before checking
					// show portfolio template box in case portfolio page selected
					show_hide_post_options(changed_page_template);
				});
			});
			jQuery(document).on('click', '.aq_upload_button', function(event) {
        var $clicked = jQuery(this), frame,
            input_id = $clicked.prev().attr('id'),
            media_type = $clicked.attr('rel');

        event.preventDefault();

        // If the media frame already exists, reopen it.
        if ( frame ) {
            frame.open();
            return;
        }

        // Create the media frame.
        frame = wp.media.frames.aq_media_uploader = wp.media({
            // Set the media type
            library: {
                type: media_type
            },
            view: {

            }
        });

        // When an image is selected, run a callback.
        frame.on( 'select', function() {
            // Grab the selected attachment.
            var attachment = frame.state().get('selection').first();

            jQuery('#' + input_id).val(attachment.attributes.url);

            if(media_type == 'image') jQuery('#' + input_id).parent().parent().parent().find('.screenshot img').attr('src', attachment.attributes.url);

        });

        frame.open();
    });
		</script>
			<?php

			asalah_post_options(
				array(	"name" => __("Layout", 'asalah'),
						"id" => "asalah_post_layout",
						"type" => "select",
						"page" => array('page','blog'),
						"options" => array(
							false => 'Same As Theme Options',
							'right'=> 'Right Sidebar',
							'left'=> 'Left Sidebar',
							'full'=> 'No Sidebar'
						)));

			$custom_sidebars_options = array (false => 'Same As Theme Options', 'none' => 'None');
			$sidebars = $asalah_data['asalah_custom_sidebars'];
			if ($sidebars):

				foreach ($sidebars as $option) {
					$siebar_id = "asalah_custom_sidebar_". $option['order'];

					if (!empty($option['title'])) {
						$custom_sidebars_options[$siebar_id] = $option['title'];
					} else {
						$custom_sidebars_options[$siebar_id] = 'Sidebar '.$option['order'];
					}
				}

			endif;
			asalah_post_options(
				array(	"name" => __("Custom Sidebar", 'asalah'),
						"id" => "asalah_custom_sidebar",
						"type" => "select",
						"page" => array('page','blog'),
						"options" => $custom_sidebars_options,
						));

			asalah_post_options(
				array(	"name" => __("Tags to be shown", 'asalah'),
						"id" => "asalah_portfolio_page_tag",
						"type" => "text",
						"page" => array("portfolio"),
						));

			asalah_post_options(
				array(	"name" => __("Number of projects", 'asalah'),
						"id" => "asalah_portfolio_number",
						"type" => "text",
						"page" => array("portfolio"),
						));

			asalah_post_options(
				array(	"name" => __("Number of Team Members", 'asalah'),
						"id" => "asalah_team_member_number",
						"type" => "text",
						"page" => array("members"),
						));
			asalah_post_options(
				array(	"name" => __("Number of admin Members", 'asalah'),
						"id" => "asalah_admin_member_number",
						"type" => "text",
						"page" => array("admin"),
						));
			asalah_post_options(
				array(	"name" => __("Number of Clients", 'asalah'),
						"id" => "asalah_client_number",
						"type" => "text",
						"page" => array("clients"),
						));

			asalah_post_options(
				array(	"name" => __("Order By", 'asalah'),
						"id" => "asalah_team_member_order",
						"type" => "select",
						"options" => array(
							false => 'Date',
							'name'=> 'Name',
						),
						"page" => array("members"),
						));
			asalah_post_options(
				array(	"name" => __("Order By", 'asalah'),
						"id" => "asalah_admin_member_order",
						"type" => "select",
						"options" => array(
							false => 'Date',
							'name'=> 'Name',
						),
						"page" => array("admin"),
						));
			asalah_post_options(
				array(	"name" => __("Order By", 'asalah'),
						"id" => "asalah_client_order",
						"type" => "select",
						"options" => array(
							false => 'Date',
							'name'=> 'Name',
						),
						"page" => array("clients"),
						));

			asalah_post_options(
				array(	"name" => __("Page Builder Top Space (px)", 'asalah'),
						"id" => "asalah_builder_top_space",
						'value' => '0',
						"type" => "text",
						"page" => array("builder"),
						));

			asalah_post_options(
				array(	"name" => __("Page Title Holder", 'asalah'),
						"id" => "asalah_title_holder",
						"type" => "select",
						"page" => array('page','blog','builder', 'portfolio'),
						"options" => array(
							false => 'Same As Theme Options',
							'show'=> 'Show',
							'hide'=> 'Hide',
						)));

			asalah_post_options(
				array(	"name" => __("Page Title", 'asalah'),
						"id" => "asalah_page_title",
						"page" => array('page'),
						"type" => "select",
						"options" => array(
							false => 'Same As Theme Options',
							'show'=> 'Show',
							'hide'=> 'Hide',
						)));

			asalah_post_options(
				array(	"name" => __("Meta Info", 'asalah'),
						"id" => "asalah_post_meta_info",
						"type" => "select",
						"page" => array("page"),
						"options" => array(
							false => 'Same As Theme Options',
							'show'=> 'Show',
							'hide'=> 'Hide',
						)));

			asalah_post_options(
				array(	"name" => __("Meta Date", 'asalah'),
						"id" => "asalah_post_meta_info_date",
						"type" => "select",
						"page" => array("page"),
						"options" => array(
							false => 'Same As Theme Options',
							'show'=> 'Show',
							'hide'=> 'Hide',
						)));

			asalah_post_options(
				array(	"name" => __("Meta Comments", 'asalah'),
						"id" => "asalah_post_meta_info_comment",
						"type" => "select",
						"page" => array("page"),
						"options" => array(
							false => 'Same As Theme Options',
							'show'=> 'Show',
							'hide'=> 'Hide',
						)));

			asalah_post_options(
				array(	"name" => __("Meta Categories", 'asalah'),
						"id" => "asalah_post_meta_info_category",
						"type" => "select",
						"page" => array("page"),
						"options" => array(
							false => 'Same As Theme Options',
							'show'=> 'Show',
							'hide'=> 'Hide',
						)));

			asalah_post_options(
				array(	"name" => __("Meta Tags", 'asalah'),
						"id" => "asalah_post_meta_info_tag",
						"type" => "select",
						"page" => array("page"),
						"options" => array(
							false => 'Same As Theme Options',
							'show'=> 'Show',
							'hide'=> 'Hide',
						)));


			asalah_post_options(
				array(	"name" => __("Author Box", 'asalah'),
						"id" => "asalah_post_author_box",
						"type" => "select",
						"page" => array("page"),
						"options" => array(
							false => 'Same As Theme Options',
							'show'=> 'Show',
							'hide'=> 'Hide',
						)));

			asalah_post_options(
				array(	"name" => __("Post Share Icons", 'asalah'),
						"id" => "asalah_post_share_box",
						"type" => "select",
						"page" => array("page"),
						"options" => array(
							false => 'Same As Theme Options',
							'show'=> 'Show',
							'hide'=> 'Hide',
						)));

			asalah_post_options(
				array(	"name" => __("Post Type Icon", 'asalah'),
						"id" => "asalah_post_format_icon",
						"type" => "select",
						"page" => array("page"),
						"options" => array(
							false => 'Same As Theme Options',
							'show'=> 'Show',
							'hide'=> 'Hide',
						)));

			// asalah_post_options(
			// 	array(	"name" => __("Post banner", 'asalah'),
			// 			"id" => "asalah_post_type",
			// 			"type" => "select",
			// 			"options" => array(
			// 				''=> 'None',
			// 				'video'=> 'Video',
			// 				'featured'=> 'Featured Image',
			// 				'attached'=> 'Attached Images',
			// 				'quote' => 'Quotation',
			// 				'soundcloud' => 'Soundcloud',
			// 				'url' => 'URL'
			// 			)));
			//
			// asalah_post_options(
			// 	array(	"name" => __("Youtube or Vimeo video URL", 'asalah'),
			// 			"id" => "asalah_video_url",
			// 			"type" => "text"));
			//
			// asalah_post_options(
			// 	array(	"name" => __("Soundcloud URL", 'asalah'),
			// 			"id" => "asalah_soundcloud_url",
			// 			"type" => "text"));
			//
			// asalah_post_options(
			// 	array(	"name" => __("Your quotation text", 'asalah'),
			// 			"id" => "asalah_quote_text",
			// 			"type" => "textarea"));
			//
			// asalah_post_options(
			// 	array(	"name" => __("Quotation author", 'asalah'),
			// 			"id" => "asalah_quote_author",
			// 			"type" => "text"));
			//
			// asalah_post_options(
			// 	array(	"name" => __("URL", 'asalah'),
			// 			"id" => "asalah_url_destination",
			// 			"type" => "text"));
			//
			// asalah_post_options(
			// 	array(	"name" => __("URL text", 'asalah'),
			// 			"id" => "asalah_url_text",
			// 			"type" => "text"));

                        asalah_post_options(
				array(	"name" => __("Custom page title background URL", 'asalah'),
						"id" => "asalah_custom_title_bg",
						"page" => array('page','blog','builder','portfolio'),
						"type" => "image"));

			?>
		</div>

  <?php
}


function project_options(){
	global $post ;
	$get_meta = get_post_custom($post->ID);
?>

		<style>
			.asalah_post_options .option-item {
				margin-bottom: 26px;
			}
			.asalah_post_options .option-item .label {
			font-weight: bold;
			padding-bottom: 6px;
			display: block;
			margin-left: 2px;
			}
			.asalah_post_options input[type="text"] {
			color: #777;
			border: none;
			border: solid 1px #EEE;
			border-bottom: solid 1px #DDD;
			background: white;
			font: 13px/22px 'Merriweather', Georgia, serif;
			width: 300px;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			-webkit-appearance: none;
			display: block;
			}
			.asalah_post_options textarea {
			color: #777;
			border: none;
			border: solid 1px #EEE;
			border-bottom: solid 1px #DDD;
			background: white;
			font: 13px/22px 'Merriweather', Georgia, serif;
			width: 100%;
			padding: 10px;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			-webkit-appearance: none;
			display: block;
			height: 150px;
			}
			.asalah_post_options select {
			width: 200px;
			color: #777;
			border: 0;
			height: 30px;
			border: 1px #E2E2E2 solid;
			}
			.criteria_slider {
margin: 2px 7px 8px;
width: 290px;
}

		#post-formats-select .post-format-quote, #post-format-quote, #post-formats-select .post-format-link, #post-format-link {
			display: none;
		}
		</style>
		<script type='text/javascript'>
jQuery(document).on('click', '.aq_upload_button', function(event) {
	var $clicked = jQuery(this), frame,
			input_id = $clicked.prev().attr('id'),
			media_type = $clicked.attr('rel');

	event.preventDefault();

	// If the media frame already exists, reopen it.
	if ( frame ) {
			frame.open();
			return;
	}

	// Create the media frame.
	frame = wp.media.frames.aq_media_uploader = wp.media({
			// Set the media type
			library: {
					type: media_type
			},
			view: {

			}
	});

	// When an image is selected, run a callback.
	frame.on( 'select', function() {
			// Grab the selected attachment.
			var attachment = frame.state().get('selection').first();

			jQuery('#' + input_id).val(attachment.attributes.url);

			if(media_type == 'image') jQuery('#' + input_id).parent().parent().parent().find('.screenshot img').attr('src', attachment.attributes.url);

	});

	frame.open();
});
</script>

        <div class="asalah_post_options">

			<?php

			asalah_post_options(
				array(	"name" => __("Layout", 'asalah'),
						"id" => "asalah_post_layout",
						"type" => "select",
						"options" => array(
							false => 'Same as Theme Options',
							'right'=> 'right',
							'left'=> 'left',
							'full'=> 'Full Width'
						)));


			asalah_post_options(
				array(	"name" => __("Project Overview", 'asalah'),
						"id" => "asalah_project_overview_show",
						"type" => "select",
						"options" => array(
							false => 'Same as Theme Options',
							'show'=> 'Show',
							'hide'=> 'Hide',
						)));

			/*asalah_post_options(
				array(	"name" => __("Project Details", 'asalah'),
						"id" => "asalah_post_meta_info",
						"type" => "select",
						"options" => array(
							false => 'Same as Theme Options',
							'show'=> 'Show',
							'hide'=> 'Hide',
						)));*/

			asalah_post_options(
				array(	"name" => __("Project Date", 'asalah'),
						"id" => "asalah_project_show_date",
						"type" => "select",
						"options" => array(
							false => 'Same as Theme Options',
							'show'=> 'Show',
							'hide'=> 'Hide',
						)));

			asalah_post_options(
				array(	"name" => __("Project Tags", 'asalah'),
						"id" => "asalah_project_show_tag",
						"type" => "select",
						"options" => array(
							false => 'Same as Theme Options',
							'show'=> 'Show',
							'hide'=> 'Hide',
						)));


			asalah_post_options(
				array(	"name" => __("Social Share", 'asalah'),
						"id" => "asalah_post_share_box",
						"type" => "select",
						"options" => array(
							false => 'Same as Theme Options',
							'show'=> 'Show',
							'hide'=> 'Hide',
						)));

			asalah_post_options(
				array(	"name" => __("Other Projects", 'asalah'),
						"id" => "asalah_post_other",
						"type" => "select",
						"options" => array(
							false => 'Same as Theme Options',
							'show'=> 'Show',
							'hide'=> 'Hide',
						)));

			asalah_post_options(
				array(	"name" => __("Number of projects to show at Other Projects (default is 9)", 'asalah'),
						"id" => "asalah_other_projects_num",
						"type" => "text"));

			asalah_post_options(
				array(	"name" => __("Number of projects to show per slide at Other Projects (default 3)", 'asalah'),
						"id" => "asalah_other_projects_slide_num",
						"type" => "text"));

									asalah_post_options(
										array(	"name" => __("Custom page title background URL", 'asalah'),
												"id" => "asalah_custom_title_bg",
												"type" => "image"));
			?>
		</div>



  <?php
}


function project_skills_options(){
	global $post ;
	$get_meta = get_post_custom($post->ID);
	$asalah_project_skills_item = unserialize($get_meta["asalah_project_skills_item"][0]);
?>

		<style>
			.asalah_post_options .option-item {
				margin-bottom: 26px;
			}
			.asalah_post_options .option-item .label {
			font-weight: bold;
			padding-bottom: 6px;
			display: block;
			margin-left: 2px;
			}
			.asalah_post_options input[type="text"] {
			color: #777;
			border: none;
			border: solid 1px #EEE;
			border-bottom: solid 1px #DDD;
			background: white;
			font: 13px/22px 'Merriweather', Georgia, serif;
			width: 300px;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			-webkit-appearance: none;
			display: block;
			}
			.asalah_post_options textarea {
			color: #777;
			border: none;
			border: solid 1px #EEE;
			border-bottom: solid 1px #DDD;
			background: white;
			font: 13px/22px 'Merriweather', Georgia, serif;
			width: 100%;
			padding: 10px;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			-webkit-appearance: none;
			display: block;
			height: 150px;
			}
			.asalah_post_options select {
			width: 200px;
			color: #777;
			border: 0;
			height: 30px;
			border: 1px #E2E2E2 solid;
			}
			.criteria_slider {
margin: 2px 7px 8px;
width: 290px;
}
		</style>
		<?php
		wp_register_script( 'asalah_ui_slider', get_template_directory_uri() . '/js/ui/jquery-ui-1.10.0.custom.min.js', array( 'jquery' ), false, true );
		wp_register_style( 'asalah_ui_slider_css', get_template_directory_uri().'/js/ui/jquery-ui-1.10.0.custom.min.css', array(), '', 'all' );
		wp_enqueue_script( 'asalah_ui_slider' );
		wp_enqueue_style( 'asalah_ui_slider_css' );
		?>


        <div class="asalah_review_options asalah_post_options">
        <?php
		asalah_post_options(
				array(	"name" => __("Show Review", 'asalah'),
						"id" => "asalah_review_pos",
						"type" => "select",
						"options" => array(
							'hide'=> 'Hide',
							'bottom'=> 'Show',
						)));
		?>
			<?php  for($i=1 ; $i<=25 ; $i++ ){ ?>
            <div class="option-item review-item">
                <span class="label">Skill <?php echo $i ?></span>
                <input name="asalah_project_skills_item[<?php echo $i ?>][name]" type="text" value="<?php echo $asalah_project_skills_item[$i]['name'] ?>" />
                <div class="clear"></div><br />
                <span class="label">Percent <?php echo $i ?></span>
                <div id="criteria<?php echo $i ?>-slider" class="criteria_slider"></div>
                <input type="text" id="criteria<?php echo $i ?>" value="<?php if( $asalah_project_skills_item[$i]['score'] ) echo $asalah_project_skills_item[$i]['score']; else echo 0; ?>" name="asalah_project_skills_item[<?php echo $i ?>][score]" />
                <script>
                  jQuery(document).ready(function() {
                    jQuery("#criteria<?php echo $i ?>-slider").slider({
                        range: "min",
                        min: 0,
                        max: 100,
                        value: <?php if( $asalah_project_skills_item[$i]['score'] ) echo $asalah_project_skills_item[$i]['score']; else echo 0; ?>,
                        slide: function(event, ui) {
                            jQuery('#criteria<?php echo $i ?>').attr('value', ui.value );
                        }
                        });
                    });
                </script>
            </div>

                <?php
            }
            ?>
        </div>

  <?php
}

function testimonial_options(){
	global $post ;
	$get_meta = get_post_custom($post->ID);
?>

		<style>
			.asalah_post_options .option-item {
				margin-bottom: 26px;
			}
			.asalah_post_options .option-item .label {
			font-weight: bold;
			padding-bottom: 6px;
			display: block;
			margin-left: 2px;
			}
			.asalah_post_options input[type="text"] {
			color: #777;
			border: none;
			border: solid 1px #EEE;
			border-bottom: solid 1px #DDD;
			background: white;
			font: 13px/22px 'Merriweather', Georgia, serif;
			width: 300px;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			-webkit-appearance: none;
			display: block;
			}
			.asalah_post_options textarea {
			color: #777;
			border: none;
			border: solid 1px #EEE;
			border-bottom: solid 1px #DDD;
			background: white;
			font: 13px/22px 'Merriweather', Georgia, serif;
			width: 100%;
			padding: 10px;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			-webkit-appearance: none;
			display: block;
			height: 150px;
			}
			.asalah_post_options select {
			width: 200px;
			color: #777;
			border: 0;
			height: 30px;
			border: 1px #E2E2E2 solid;
			}
			.criteria_slider {
margin: 2px 7px 8px;
width: 290px;
}
		</style>
		<?php
		wp_register_script( 'asalah_ui_slider', get_template_directory_uri() . '/js/ui/jquery-ui-1.10.0.custom.min.js', array( 'jquery' ), false, true );
		wp_register_style( 'asalah_ui_slider_css', get_template_directory_uri().'/js/ui/jquery-ui-1.10.0.custom.min.css', array(), '', 'all' );
		wp_enqueue_script( 'asalah_ui_slider' );
		wp_enqueue_style( 'asalah_ui_slider_css' );
		?>

        <div class="asalah_post_options asalah_testimonial_options">

			<?php

			asalah_post_options(
				array(	"name" => __("Author Name", 'asalah'),
						"id" => "asalah_testimonial_author",
						"type" => "text"));

			asalah_post_options(
				array(	"name" => __("Author Job", 'asalah'),
						"id" => "asalah_testimonial_job",
						"type" => "text"));

			asalah_post_options(
				array(	"name" => __("Author Url", 'asalah'),
						"id" => "asalah_testimonial_url",
						"type" => "text"));

			?>
		</div>

  <?php
}


function team_options(){
	global $post ;
	$get_meta = get_post_custom($post->ID);
?>

		<style>
			.asalah_post_options .option-item {
				margin-bottom: 26px;
			}
			.asalah_post_options .option-item .label {
			font-weight: bold;
			padding-bottom: 6px;
			display: block;
			margin-left: 2px;
			}
			.asalah_post_options input[type="text"] {
			color: #777;
			border: none;
			border: solid 1px #EEE;
			border-bottom: solid 1px #DDD;
			background: white;
			font: 13px/22px 'Merriweather', Georgia, serif;
			width: 300px;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			-webkit-appearance: none;
			display: block;
			}
			.asalah_post_options textarea {
			color: #777;
			border: none;
			border: solid 1px #EEE;
			border-bottom: solid 1px #DDD;
			background: white;
			font: 13px/22px 'Merriweather', Georgia, serif;
			width: 100%;
			padding: 10px;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			-webkit-appearance: none;
			display: block;
			height: 150px;
			}
			.asalah_post_options select {
			width: 200px;
			color: #777;
			border: 0;
			height: 30px;
			border: 1px #E2E2E2 solid;
			}
			.criteria_slider {
margin: 2px 7px 8px;
width: 290px;
}
		</style>

        <div class="asalah_post_options asalah_testimonial_options">

			<?php


			asalah_post_options(
				array(	"name" => __("Должность", 'asalah'),
						"id" => "asalah_team_position",
						"type" => "text"));

			asalah_post_options(
				array(	"name" => __("Образование", 'asalah'),
						"id" => "asalah_team_fb",
						"type" => "text"));

			asalah_post_options(
				array(	"name" => __("Категория", 'asalah'),
						"id" => "asalah_team_tw",
						"type" => "text"));

			asalah_post_options(
				array(	"name" => __("Педагогический стаж", 'asalah'),
						"id" => "asalah_team_gp",
						"type" => "text"));

			asalah_post_options(
				array(	"name" => __("Кабинет", 'asalah'),
						"id" => "asalah_team_yt",
						"type" => "text"));

			?>
		</div>

  <?php
}

function admin_options(){
	global $post ;
	$get_meta = get_post_custom($post->ID);
?>

		<style>
			.asalah_post_options .option-item {
				margin-bottom: 26px;
			}
			.asalah_post_options .option-item .label {
			font-weight: bold;
			padding-bottom: 6px;
			display: block;
			margin-left: 2px;
			}
			.asalah_post_options input[type="text"] {
			color: #777;
			border: none;
			border: solid 1px #EEE;
			border-bottom: solid 1px #DDD;
			background: white;
			font: 13px/22px 'Merriweather', Georgia, serif;
			width: 300px;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			-webkit-appearance: none;
			display: block;
			}
			.asalah_post_options textarea {
			color: #777;
			border: none;
			border: solid 1px #EEE;
			border-bottom: solid 1px #DDD;
			background: white;
			font: 13px/22px 'Merriweather', Georgia, serif;
			width: 100%;
			padding: 10px;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			-webkit-appearance: none;
			display: block;
			height: 150px;
			}
			.asalah_post_options select {
			width: 200px;
			color: #777;
			border: 0;
			height: 30px;
			border: 1px #E2E2E2 solid;
			}
			.criteria_slider {
margin: 2px 7px 8px;
width: 290px;
}
		</style>

        <div class="asalah_post_options asalah_testimonial_options">

			<?php


			asalah_post_options(
				array(	"name" => __("Должность", 'asalah'),
						"id" => "asalah_admin_position",
						"type" => "text"));

			asalah_post_options(
				array(	"name" => __("Образование", 'asalah'),
						"id" => "asalah_admin_fb",
						"type" => "text"));

			asalah_post_options(
				array(	"name" => __("Категория", 'asalah'),
						"id" => "asalah_admin_tw",
						"type" => "text"));
			?>
		</div>

  <?php
}

function pricing_pack_options() {

	global $post ;
	$get_meta = get_post_custom($post->ID);
?>

		<style>
			.asalah_post_options .option-item {
				margin-bottom: 26px;
			}
			.asalah_post_options .option-item .label {
			font-weight: bold;
			padding-bottom: 6px;
			display: block;
			margin-left: 2px;
			}
			.asalah_post_options input[type="text"] {
			color: #777;
			border: none;
			border: solid 1px #EEE;
			border-bottom: solid 1px #DDD;
			background: white;
			font: 13px/22px 'Merriweather', Georgia, serif;
			width: 300px;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			-webkit-appearance: none;
			display: block;
			}
			.asalah_post_options textarea {
			color: #777;
			border: none;
			border: solid 1px #EEE;
			border-bottom: solid 1px #DDD;
			background: white;
			font: 13px/22px 'Merriweather', Georgia, serif;
			width: 100%;
			padding: 10px;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			-webkit-appearance: none;
			display: block;
			height: 150px;
			}
			.asalah_post_options select {
			width: 200px;
			color: #777;
			border: 0;
			height: 30px;
			border: 1px #E2E2E2 solid;
			}
			.criteria_slider {
margin: 2px 7px 8px;
width: 290px;
}
		</style>

        <div class="portfolio_meta_control asalah_project_details_options">

			<?php


			asalah_post_options(
				array(	"name" => __("Recommended Package?", 'asalah'),
						"id" => "asalah_package_recommend",
						"type" => "select",
						"options" => array(
							'no'=> 'No',
							'yes'=> 'Yes',
						)));

			?>
		</div>

  <?php
}

function project_details_options() {
	global $post ;
	$get_meta = get_post_custom($post->ID);
?>

        <div class="portfolio_meta_control asalah_project_details_options">

			<?php


			asalah_post_options(
				array(	"name" => __("Client", 'asalah'),
						"id" => "asalah_project_client",
						"type" => "text"));

			?>
		</div>

  <?php
}

if ( ! isset( $content_width ) ) $content_width = 670;

function asalah_post_options($value){
	global $post;
	$depends_on = '';
	if (isset($value['page'])) {
	if ($value['page'] != '') {
		$array = $value['page'];
		foreach ($array as $depend) {
			$depends_on .= ' depend_'.$depend;
		}
	}
}
?>
	<div class="option-item<?php echo $depends_on; ?>" id="<?php echo $value['id'] ?>-item">
		<span class="label"><?php  echo $value['name']; ?></span>
	<?php
		$id = $value['id'];
		$get_meta = get_post_custom($post->ID);

		if( isset( $get_meta[$id][0] ) ){
			$current_value = $get_meta[$id][0];
		}else{
			$current_value = '';
		}

	switch ( $value['type'] ) {

		case 'text': ?>
			<input  name="<?php echo $value['id']; ?>" id="<?php  echo $value['id']; ?>" type="text" value="<?php echo $current_value; ?>" />
		<?php
		break;

		case 'select':
		?>
			<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
				<?php foreach ($value['options'] as $key => $option) { ?>
				<option value="<?php echo $key ?>" <?php if ( $current_value == $key) { echo ' selected="selected"' ; } ?>><?php echo $option; ?></option>
				<?php } ?>
			</select>
		<?php
		break;
		case 'image':
                ?>
                <input  name="<?php echo esc_attr($value['id']); ?>" id="<?php echo esc_attr($value['id']); ?>" class="input-upload" type="text" value="<?php echo ($current_value) ?>" />
                <a href="#" class="aq_upload_button button" rel="image">Upload</a><p></p>
                <?php
                break;

		case 'textarea':
		?>
			<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo $current_value ?></textarea>
		<?php
		break;
	} ?>
	</div>
<?php
}

add_action('save_post', 'save_post');
function save_post(){
	global $post;

	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		return $post_id;

 	$custom_meta_fields = array(
		'asalah_post_layout',
		'asalah_portfolio_page_tag',
		'asalah_portfolio_number',
		'asalah_team_member_number',
		'asalah_admin_member_number',
		'asalah_client_number',
		'asalah_team_member_order',
		'asalah_admin_member_order',
		'asalah_client_order',
		'asalah_bubble_post_meta_info',
		'asalah_post_meta_info',
		'asalah_post_meta_info_tag',
		'asalah_post_meta_info_date',
		'asalah_post_meta_info_comment',
		'asalah_post_meta_info_category',
		'asalah_post_share_box',
		'asalah_post_format_icon',
		'asalah_post_author_box',
		'asalah_post_type',
		'asalah_video_url',
		'asalah_embed_video',
		'asalah_quote_text',
		'asalah_quote_author',
		'asalah_url_destination',
		'asalah_url_text',
		'asalah_soundcloud_url',
		'asalah_review_desc',
		'asalah_review_pos',
		'asalah_post_show_ads',
		'asalah_testimonial_author',
		'asalah_testimonial_job',
		'asalah_testimonial_url',
		'asalah_team_position',
		'asalah_team_fb',
		'asalah_team_tw',
		'asalah_team_gp',
		'asalah_team_yt',
		'asalah_team_linked',
		'asalah_team_pin',
		'asalah_team_mail',
		'asalah_admin_position',
		'asalah_admin_fb',
		'asalah_admin_tw',
		'asalah_admin_gp',
		'asalah_admin_yt',
		'asalah_admin_linked',
		'asalah_admin_pin',
		'asalah_admin_mail',
		'asalah_project_client',
		'asalah_package_recommend',
		'asalah_post_other',
		'asalah_other_projects_num',
		'asalah_other_projects_slide_num',
		'asalah_project_overview_show',
		'asalah_project_show_date',
		'asalah_project_show_tag',
		'asalah_custom_sidebar',
                'asalah_custom_title_bg',
                'asalah_title_holder',
								'asalah_page_title',
								'asalah_builder_top_space'
		);

	foreach( $custom_meta_fields as $custom_meta_field ){
		if(isset($_POST[$custom_meta_field]) ):
			update_post_meta($post->ID, $custom_meta_field, htmlspecialchars(stripslashes($_POST[$custom_meta_field])) );
		else:
			if (isset($post->ID) && isset($custom_meta_field) && $custom_meta_field != '') {
			delete_post_meta($post->ID, $custom_meta_field);
			}
		endif;
	}
	if(isset($_POST['asalah_project_skills_item']) ):
	update_post_meta($post->ID, 'asalah_project_skills_item', $_POST['asalah_project_skills_item']);
	endif;
}

?>