<?php $gallery_type = asalah_post_gallery_type(); ?>

<div id="asalah_box_for_post-format-gallery" class="asalah_format_field asalah_format_field_gallery <?php echo 'asalah_gallery_postoptions_'.$gallery_type; ?>" >

	<label><span><?php _e('Gallery Images', 'asalah'); ?></span></label>

	<div class="cf-elm-container cfpf-gallery-options">
		<p class="asalah_gallrey_revslider_field">
			<input type="radio" name="_format_gallery_type" value="revslider" <?php checked($gallery_type, 'revslider' ); ?> id="cfpf-format-gallery-type-revslider"  />
			<label for="cfpf-format-gallery-type-revslider"><?php _e('Revolution Slider ID', 'asalah'); ?></label>
			<input type="text" name="_format_gallery_revslider" value="<?php echo esc_attr(get_post_meta(get_the_id(), '_format_gallery_revslider', true)); ?>" id="cfpf-format-gallery-revslider" />
		</p>

		<p class="asalah_gallrey_shortcode_field">
			<input type="radio" name="_format_gallery_type" value="shortcode" <?php checked($gallery_type, 'shortcode' ); ?> id="cfpf-format-gallery-type-shortcode" />
			<label for="cfpf-format-gallery-type-shortcode"><?php _e('Images uploaded to this post', 'asalah'); ?></label>
			<input type="text" name="_format_gallery_shortcode" value="<?php echo esc_attr(get_post_meta(get_the_id(), '_format_gallery_shortcode', true)); ?>" id="cfpf-format-gallery-shortcode" />
		</p>

		<div class="srp-gallery clearfix">

		<?php // running this in the view so it can be used by multiple functions

		if( get_post_meta(get_the_id(), '_format_gallery_shortcode', true) ){
			$att_ids = '';
			$arr_shortcode = '';

			$shortcode = get_post_meta(get_the_id(), '_format_gallery_shortcode', true);

			if( $shortcode ){
	            // parse shortcode to get 'ids' param
	            $pattern = get_shortcode_regex();
	            preg_match("/$pattern/s", $shortcode, $match);
	            $arr_shortcode = shortcode_parse_atts($match[3]);
	        }


	        if (isset($arr_shortcode['ids'])) {
		        $att_ids = explode(',',  $arr_shortcode['ids']);
		    }
		    // Shortcodes Ultimate Plugin Gallery
		    elseif (isset ($arr_shortcode['source'])){
		        $su_source_ids = explode(':',  $arr_shortcode['source']);

		        if( count($su_source_ids[1]) > 0 ){
		            $att_ids = explode(',',  $su_source_ids[1]);
		        }
		    }

		    if(is_array($att_ids) && count($att_ids) > 0 ){
		    	$img_attributes = $img_src = $img_title = '';

		    	foreach ($att_ids as $att_id) {
		    		$img_attributes = wp_get_attachment_image_src($att_id);
		    		if( $img_attributes ){
		    			$img_src = $img_attributes[0];

		    			if (is_ssl()) {
			    			$img_src = str_replace('http://', 'https://', $img_src);
						}
		    		}
		    		echo '<span data-id="' . $att_id . '" title="' . $img_title . '"><img src="' . esc_url($img_src) . '" alt="" /><i class="srp-dashicons"></i></span>';

		    	}
		    }
		} else {
			$att_ids = '';
			$arr_shortcode = '';
			$attachments = get_posts(array(
				'post_type' => 'attachment',
				'post_mime_type' => 'image',
				'post_status' => null,
				'post_parent' => $post->ID,
				'order' => 'ASC',
				'orderby' => 'menu_order',
			));
			if ($attachments != '') {

				$attachement_ids = '';
				foreach ( $attachments as $attachment ) {
					if ($attachement_ids != '') {
					$attachement_ids .= ','.$attachment->ID;
				} else {
					$attachement_ids .= $attachment->ID;
				}
				}


		if ($attachement_ids != '') {
			$att_ids = explode(',',  $attachement_ids);
		}

		if(is_array($att_ids) && count($att_ids) > 0 ){
			$img_attributes = $img_src = $img_title = '';

			foreach ($att_ids as $att_id) {
				$img_attributes = wp_get_attachment_image_src($att_id);
				if( $img_attributes ){
					$img_src = $img_attributes[0];

					if (is_ssl()) {
						$img_src = str_replace('http://', 'https://', $img_src);
				}
				}
				echo '<span data-id="' . $att_id . '" title="' . $img_title . '"><img src="' . esc_url($img_src) . '" alt="" /><i class="srp-dashicons"></i></span>';

			}
		}
	}
		} ?>

		</div>

		<p class="none" id="gallery_attached_upload" style="float: none; clear: both;">
			<a href="#" class="button"><?php _e('Upload Images', 'asalah'); ?></a>
		</p>
	</div>
</div>
