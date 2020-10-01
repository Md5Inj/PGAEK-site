<div id="asalah_box_for_post-format-link" class="asalah_format_field asalah_format_field_link" >
	<label for="cfpf-format-link-url-field"><?php _e('URL', 'asalah'); ?></label>
	<input type="text" name="_format_link_url" value="<?php echo esc_attr(get_post_meta(get_the_id(), '_format_link_url', true)); ?>" id="cfpf-format-link-url-field" tabindex="1" />
	<label for="cfpf-format-link-url-text-field"><?php _e('Link Text', 'asalah'); ?></label>
	<input type="text" name="_format_link_url_text" value="<?php echo esc_attr(get_post_meta(get_the_id(), '_format_link_url_text', true)); ?>" id="cfpf-format-link-url-text-field" tabindex="1" />
</div>