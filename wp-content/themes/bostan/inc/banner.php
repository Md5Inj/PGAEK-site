<?php
// thumbnails
function magic_substr($haystack, $start, $end) {
    $index_start = strpos($haystack, $start);
    $index_start = ($index_start === false) ? 0 : $index_start + strlen($start);
    if (strpos($haystack, $end) == TRUE) {
        $index_end = strpos($haystack, $end, $index_start);
        $length = ($index_end === false) ? strlen($end) : $index_end - $index_start;
        return substr($haystack, $index_start, $length);
    } else {
        return substr($haystack, $index_start);
    }
}

function asalah_convert_banner_type($id) {
	$type = get_post_meta($id, 'asalah_post_type', true);
	if (get_post_format() != '') {
		$post_format = get_post_format($id);
		if ($post_format == 'image') {
			$type = 'featured';
		} else if ($post_format == 'video') {
			$type = 'video';
		} else if ($post_format == 'audio') {
			$type = 'soundcloud';
		} else if ($post_format == 'gallery') {
			$type = 'attached';
		} else if ($post_format == 'link') {
			$type = 'url';
		} else if ($post_format == 'quote') {
			$type = 'quote';
		}
	}

	return $type;
}

function asalah_default_post_image() {
	global $asalah_data;
	if ($asalah_data['asalah_default_image']) {
		return $asalah_data['asalah_default_image'];
	}else{
		return get_template_directory_uri() . '/img/default.jpg';
	}
}

function asalah_default_image() {
	global $asalah_data;
	if ($asalah_data['asalah_default_image']) {
		return $asalah_data['asalah_default_image'];
	}else{
		return get_template_directory_uri().'/img/444.svg';
	}
}


function asalah_video_prov($vurl) {
	if (strpos($vurl,'youtube') !== false) {
		$prov = "youtube";
	}elseif (strpos($vurl,'youtu') !== false) {
		$prov = "youtu";
	}elseif (strpos($vurl,'vimeo') !== false) {
		$prov = "vimeo";
	}else{
		$prov = "none";
	}
	return $prov;
}

function asalah_video_id($prov, $vurl) {
	if ($prov == 'youtube') {
	if (strpos($vurl, 'www.youtube.com/watch?v=')) {
		if (strpos($vurl, 'https') !== false) {
		$id = magic_substr($vurl, "https://www.youtube.com/watch?v=", "&");
	} else {
		$id = magic_substr($vurl, "http://www.youtube.com/watch?v=", "&");
	}
	} else {
		if (strpos($vurl, 'https') !== false) {
		$id = magic_substr($vurl, "http://youtube.com/watch?v=", "&");
	} else {
		$id = magic_substr($vurl, "https://youtube.com/watch?v=", "&");
	}
	}
} elseif ($prov == 'youtu') {
	if (strpos($vurl, 'www.youtu.be/watch?v=')) {
		if (strpos($vurl, 'https') !== false) {
		$id = magic_substr($vurl, "https://www.youtu.be/watch?v=", "&");
	} else {
		$id = magic_substr($vurl, "http://www.youtu.be/watch?v=", "&");
	}
	} else {
		if (strpos($vurl, 'https') !== false) {
		$id = magic_substr($vurl, "https://youtu.be/", "&");
		} else {
		$id = magic_substr($vurl, "http://youtu.be/", "&");
		}
	}
} elseif ($prov == 'vimeo') {
	if (strpos($vurl, 'https') !== false) {
		$id = magic_substr($vurl, "https://vimeo.com/", "?");
	} else {
		$id = magic_substr($vurl, "http://vimeo.com/", "?");
	}
}
	return $id;
}

function asalah_video_iframe($prov, $vid, $height="400") {
	echo '<div class="video_fit_container">';
	if ($prov == 'youtube') {
		?>
		<iframe class="video_iframe" src="https://www.youtube.com/embed/<?php echo $vid; ?>?wmode=transparent&wmode=opaque" frameborder="0" allowfullscreen></iframe>
		<?php
	}elseif ($prov == 'youtu') {
		?>
		<iframe  class="video_iframe" src="https://www.youtube.com/embed/<?php echo $vid; ?>?wmode=transparent&wmode=opaque" frameborder="0" allowfullscreen></iframe>
		<?php
	}elseif ($prov == 'vimeo') {
		?>
		<iframe class="video_iframe" src="https://player.vimeo.com/video/<?php echo $vid; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
		<?php
	}else{

	}
	echo '</div>';
}

function asalah_video_thumb($prov, $vid) {
	if ($prov == 'youtube' || $prov == 'youtu')  {
		$theimage = 'https://img.youtube.com/vi/'.$vid.'/0.jpg';
	}elseif ($prov == 'vimeo') {
		$imgid = $vid;
		$hash = unserialize(file_get_contents("https://vimeo.com/api/v2/video/".$imgid.".php"));
		$theimage = $hash[0]['thumbnail_large'];
	}
	return $theimage;
}

function catch_that_image($id) {
  if ($id && !empty(get_post($id)->post_content)) {
		global $post, $posts;
		$post_id = $id;
		$content_post = get_post($post_id);
		$content = $content_post->post_content;
	}else{
		global $post, $posts;
		$post_id = $post->ID;
		$content = $post->post_content;
	}

  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
  if (isset($matches [1] [0])) {
  $first_img = $matches [1] [0];
  }

  if(($first_img) == ''){
    $first_img = asalah_default_image();
  }
  return $first_img;
}

function asalah_post_thumb($id = ""){
	$post_id = '';
	if ($id == '') {
		global $post;
		$post_id = $post->ID;
	}else{
		global $post;
		$post_id = $id;
	}

	$type = asalah_convert_banner_type($post_id);
	if ($type == 'video') {
		if (get_post_meta(get_the_id(), '_format_video_embed', true)) {
			$vurl = get_post_meta(get_the_id(), '_format_video_embed', true);
		} else {
			$vurl = get_post_meta($post->ID, 'asalah_video_url', true);
		}
		$prov = asalah_video_prov($vurl);
		$vid = asalah_video_id($prov, $vurl);
		if ( has_post_thumbnail($post_id) ){
			$image_id = get_post_thumbnail_id($post_id);
			$image_url = wp_get_attachment_image_src($image_id,'large');
			$image_url = $image_url[0];
			$theimage = $image_url;
		}else{
			$theimage = asalah_video_thumb($prov, $vid);
		}
	}elseif ( has_post_thumbnail($post_id) ){
		$image_id = get_post_thumbnail_id($post_id);
		$image_url = wp_get_attachment_image_src($image_id,'large');
		$image_url = $image_url[0];
		$theimage = $image_url;
	}else{
		$theimage = catch_that_image($post_id);
	}
	return $theimage;
}



function asalah_slideshow() {
	global $post;
	$post_id = $post->ID;
	$type = asalah_convert_banner_type($post_id);
	if ($type == 'video') {
		if (get_post_meta(get_the_id(), '_format_video_embed', true)) {
			$vurl = get_post_meta(get_the_id(), '_format_video_embed', true);
		} else {
			$vurl = get_post_meta($post->ID, 'asalah_video_url', true);
		}
		$prov = asalah_video_prov($vurl);
		$vid = asalah_video_id($prov, $vurl);

		if (strpos($vurl,'youtube') !== false) {
			echo '<a href="https://www.youtube.com/watch?v='.$vid.'" class="prettyPhoto slideshow_'.$post->ID.'" rel="prettyPhoto"></a>';
		}elseif (strpos($vurl,'youtu') !== false) {
			echo '<a href="https://www.youtube.com/watch?v='.$vid.'" class="prettyPhoto slideshow_'.$post->ID.'" rel="prettyPhoto"></a>';
		}elseif (strpos($vurl,'vimeo') !== false) {
			echo '<a href="https://vimeo.com/'.$vid.'" class="prettyPhoto slideshow_'.$post->ID.'" rel="prettyPhoto"></a>';
		}
		?>
		<a href="<?php echo asalah_post_thumb(); ?>" class="prettyPhoto slideshow_<?php echo $post->ID; ?>" rel="prettyPhoto[<?php echo $post->ID; ?>]"></a>
		<?php
	}elseif ($type == 'soundcloud') {
		if (get_post_meta(get_the_id(), '_format_audio_embed', true)) {
			$soundcloudurl = get_post_meta(get_the_id(), '_format_audio_embed', true);
		} else {
			$soundcloudurl = get_post_meta($post->ID, 'asalah_soundcloud_url', true);
		}
		?>
        <header class="content_banner blog_post_banner clearfix">
        <iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?php echo $soundcloudurl; ?>"></iframe>
        </header>
		<?php
	}elseif ($type == 'featured' ){
		?>
        <a href="<?php echo asalah_post_thumb(); ?>" class="prettyPhoto slideshow_<?php echo $post->ID; ?>" rel="prettyPhoto"></a>
		<?php
	}elseif ($type == 'attached') {
		$att_ids = '';
		$arr_shortcode = '';

		$shortcode = get_post_meta(get_the_id(), '_format_gallery_shortcode', true);

		if( $shortcode ){
						// parse shortcode to get 'ids' param
						$pattern = get_shortcode_regex();
						preg_match("/$pattern/s", $shortcode, $match);
						$arr_shortcode = shortcode_parse_atts($match[3]);



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
					$image_url = wp_get_attachment_image_src($att_id,'large');
					$image_attributes = $image_url[0];
					//$image_attributes =wp_get_attachment_url($attachment_id);
					?>
					<a href="<?php echo $image_attributes; ?>" class="prettyPhoto slideshow_<?php echo $post->ID; ?>" rel="prettyPhoto[<?php echo $post->ID; ?>]"></a>
		            <?php
				}
			}
		} else {
		$attachments = get_children( array('post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
		foreach ( $attachments as $attachment_id => $attachment ) {
			$image_url = wp_get_attachment_image_src($attachment_id,'large');
			$image_attributes = $image_url[0];
			//$image_attributes =wp_get_attachment_url($attachment_id);
			?>
			<a href="<?php echo $image_attributes; ?>" class="prettyPhoto slideshow_<?php echo $post->ID; ?>" rel="prettyPhoto[<?php echo $post->ID; ?>]"></a>
            <?php
		}
	}
	}
}

function get_asalah_slideshow() {
	global $post;
	$post_id = $post->ID;
	$type = asalah_convert_banner_type($post_id);
	if ($type == 'video') {
		if (get_post_meta(get_the_id(), '_format_video_embed', true)) {
			$vurl = get_post_meta(get_the_id(), '_format_video_embed', true);
		} else {
			$vurl = get_post_meta($post->ID, 'asalah_video_url', true);
		}
		$prov = asalah_video_prov($vurl);
		$vid = asalah_video_id($prov, $vurl);

		if (strpos($vurl,'youtube') !== false) {
			return '<a href="https://www.youtube.com/watch?v='.$vid.'" class="prettyPhoto slideshow_'.$post->ID.'" rel="prettyPhoto"></a>';
		}elseif (strpos($vurl,'youtu') !== false) {
			return '<a href="https://www.youtube.com/watch?v='.$vid.'" class="prettyPhoto slideshow_'.$post->ID.'" rel="prettyPhoto"></a>';
		}elseif (strpos($vurl,'vimeo') !== false) {
			return '<a href="https://vimeo.com/'.$vid.'" class="prettyPhoto slideshow_'.$post->ID.'" rel="prettyPhoto"></a>';
		}
	}elseif ($type == 'soundcloud') {
		if (get_post_meta(get_the_id(), '_format_audio_embed', true)) {
			$soundcloudurl = get_post_meta(get_the_id(), '_format_audio_embed', true);
		} else {
			$soundcloudurl = get_post_meta($post->ID, 'asalah_soundcloud_url', true);
		}
		?>
        <header class="content_banner blog_post_banner clearfix">
        <iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?php echo $soundcloudurl; ?>"></iframe>
        </header>
		<?php
	}elseif ($type == 'featured' ){
        return '<a href="'. asalah_post_thumb().'" class="prettyPhoto slideshow_'. $post->ID.'" rel="prettyPhoto"></a>';
	}elseif ($type == 'attached') {
		$att_ids = '';
		$arr_shortcode = '';

		$shortcode = get_post_meta(get_the_id(), '_format_gallery_shortcode', true);

		if( $shortcode ){
						// parse shortcode to get 'ids' param
						$pattern = get_shortcode_regex();
						preg_match("/$pattern/s", $shortcode, $match);
						$arr_shortcode = shortcode_parse_atts($match[3]);



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
					$image_url = wp_get_attachment_image_src($att_id,'large');
					$image_attributes = $image_url[0];
					//$image_attributes =wp_get_attachment_url($attachment_id);
					return '<a href="'. $image_attributes.'" class="prettyPhoto slideshow_'. $post->ID.'" rel="prettyPhoto['. $post->ID.']"></a>';
				}
			}
    } else {
		$attachments = get_children( array('post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
		foreach ( $attachments as $attachment_id => $attachment ) {
			$image_url = wp_get_attachment_image_src($attachment_id,'large');
			$image_attributes = $image_url[0];
			//$image_attributes =wp_get_attachment_url($attachment_id);
			return '<a href="'. $image_attributes.'" class="prettyPhoto slideshow_'. $post->ID.'" rel="prettyPhoto['. $post->ID.']"></a>';
		}
	}
	}
}


function asalah_blog_thumb($w="370", $h="240",$size="portfolio", $id = "", $class=""){
	global $asalah_data;
	$post_id = '';
	if (empty($id)) {
		global $post;
		$post_id = $post->ID;
	}else{
		global $post;
		$post_id = $id;
	}

	$type = asalah_convert_banner_type($post_id);
	if ( has_post_thumbnail($post_id) ){
		if (asalah_post_thumb($post_id) != '') {
		?>


            <?php the_post_thumbnail($size);  ?>

		<?php
		}else{
		?>

            <img src="<?php echo asalah_default_image(); ?>" class="featured_image" alt="<?php the_title(); ?>">

		<?php
		}
	}elseif ($type == 'video') {
		if (get_post_meta(get_the_id(), '_format_video_embed', true)) {
			$vurl = get_post_meta(get_the_id(), '_format_video_embed', true);
		} else {
			$vurl = get_post_meta($post->ID, 'asalah_video_url', true);
		}
		$prov = asalah_video_prov($vurl);
		$vid = asalah_video_id($prov, $vurl);
		?>

            <img src="<?php echo asalah_video_thumb($prov, $vid); ?>" width="<?php echo $w; ?>" height="<?php echo $h; ?>" class="featured_image" alt="<?php the_title(); ?>">

		<?php
	}elseif(asalah_post_thumb($post_id) == '') {
		?>

		<img src="<?php echo asalah_default_post_image(); ?>" class="featured_image" alt="<?php the_title(); ?>">

        <?php
	}else{
		?>

		<img src="<?php echo asalah_default_post_image(); ?>" width="<?php echo $w; ?>" height="<?php echo $h; ?>" class="featured_image" alt="<?php the_title(); ?>">

		<?php
	}
}

function asalah_projects_car_thumb($thumb_height){
	global $asalah_data;
	$post_id = '';
	if (empty($id)) {
		global $post;
		$post_id = $post->ID;
	}else{
		global $post;
		$post_id = $id;
	}

	$w = '520';
	$h = '193';
	if ($thumb_height == '') { $thumb_height = '193';}
	$type = asalah_convert_banner_type($post_id);
	if ( has_post_thumbnail($post_id) ){
		if (asalah_post_thumb($post_id) != '') {
		?>


            <?php the_post_thumbnail(array('99999', $thumb_height,false));  ?>

		<?php
		}else{
		?>

            <img src="<?php echo asalah_default_image(); ?>" class="featured_image" alt="<?php the_title(); ?>">

		<?php
		}
	}elseif ($type == 'video') {
		if (get_post_meta(get_the_id(), '_format_video_embed', true)) {
			$vurl = get_post_meta(get_the_id(), '_format_video_embed', true);
		} else {
			$vurl = get_post_meta($post->ID, 'asalah_video_url', true);
		}
		$prov = asalah_video_prov($vurl);
		$vid = asalah_video_id($prov, $vurl);
		?>

            <img src="<?php echo asalah_video_thumb($prov, $vid); ?>" width="<?php echo $w; ?>" height="<?php echo $h; ?>" class="featured_image" alt="<?php the_title(); ?>">

		<?php
	}elseif(asalah_post_thumb($post_id) == '') {
		?>

		<img src="<?php echo asalah_default_image(); ?>" class="featured_image" alt="<?php the_title(); ?>">

        <?php
	}else{
		?>

		<img src="<?php echo asalah_default_image(); ?>" width="<?php echo $w; ?>" height="<?php echo $h; ?>" class="featured_image" alt="<?php the_title(); ?>">

		<?php
	}
}

function asalah_get_blog_thumb($w="370", $h="240",$size="portfolio", $id = "", $class=""){
	global $asalah_data;
	if ($id == '') {
		global $post;
		$post_id = $post->ID;
	}else{
		global $post;
		$post_id = $id;
	}
	$type = asalah_convert_banner_type($post_id);
	if ( has_post_thumbnail($post_id) ){
		if (asalah_post_thumb($post_id) != '') {

			return get_the_post_thumbnail($post_id, $size);

		}else{

			return '<img src="'.asalah_default_image().'" class="featured_image" alt="'.get_the_title().'">';

		}
	}elseif ($type == 'video') {
		if (get_post_meta(get_the_id(), '_format_video_embed', true)) {
			$vurl = get_post_meta(get_the_id(), '_format_video_embed', true);
		} else {
			$vurl = get_post_meta($post->ID, 'asalah_video_url', true);
		}
		$prov = asalah_video_prov($vurl);
		$vid = asalah_video_id($prov, $vurl);

			return '<img src="'.asalah_video_thumb($prov, $vid).'" class="featured_image" alt="'.get_the_title().'">';

	}elseif(asalah_post_thumb($post_id) == '') {

			return '<img src="'.asalah_default_image().'" class="featured_image" alt="'.get_the_title().'">';


	}else{

			return '<img src="'.asalah_default_image().'" class="featured_image" alt="'.get_the_title().'">';



	}
}

function asalah_blog_icon() {
	global $post;
	$post_id = $post->ID;
	$type = asalah_convert_banner_type($post_id);
	if ($type == 'video') {
		echo '<i class="icon-play" title="Video"></i>';
	}elseif ($type == 'soundcloud') {
		echo '<i class="icon-music" title="Audio"></i>';
	}elseif ($type == 'quote') {
		echo '<i class="icon-quote-left" title="Quotation"></i>';
	}elseif ($type == 'url') {
		echo '<i class="icon-link" title="Link"></i>';
	}elseif ($type == 'featured' ){
		echo '<i class="icon-camera" title="Image"></i>';
	}elseif ($type == 'attached') {
		echo '<i class="icon-picture" title="Gallery"></i>';
	}else{
		echo '<i class="icon-pencil" title="Text"></i>';
	}
}

function asalah_banner() {
	global $asalah_data;
	global $post;
	$post_id = $post->ID;
	$type = asalah_convert_banner_type($post_id);
	if ($type == 'video') {
		if (get_post_meta(get_the_id(), '_format_video_embed', true)) {
			$vurl = get_post_meta(get_the_id(), '_format_video_embed', true);
		} else {
			$vurl = get_post_meta($post->ID, 'asalah_video_url', true);
		}
		$prov = asalah_video_prov($vurl);
		$vid = asalah_video_id($prov, $vurl);
		?>
		<header class="content_banner blog_post_banner clearfix"><?php asalah_video_iframe($prov, $vid) ?></header>
		<?php
	}elseif ($type == 'soundcloud') {
		if (get_post_meta(get_the_id(), '_format_audio_embed', true)) {
			$soundcloudurl = get_post_meta(get_the_id(), '_format_audio_embed', true);
		} else {
			$soundcloudurl = get_post_meta($post->ID, 'asalah_soundcloud_url', true);
		}
		?>
        <header class="content_banner blog_post_banner clearfix">
        <iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?php echo $soundcloudurl; ?>"></iframe>
        </header>
		<?php
	}elseif ($type == 'quote') {
		if (get_post_meta(get_the_id(), '_format_quote_source_content', true)) {
			$quote_content = get_post_meta(get_the_id(), '_format_quote_source_content', true);
		} else {
			$quote_content = get_post_meta($post->ID, 'asalah_quote_text', true);
		}
		if (get_post_meta(get_the_id(), '_format_quote_source_name', true)) {
			if (get_post_meta(get_the_id(), '_format_quote_source_url', true)) {
				$author_name = '<a href="'.esc_url(get_post_meta(get_the_id(), '_format_quote_source_url', true)).'">'.get_post_meta(get_the_id(), '_format_quote_source_name', true).'</a>';
			} else {
				$author_name = get_post_meta(get_the_id(), '_format_quote_source_name', true);
			}
		} else {
			$author_name = get_post_meta($post->ID, 'asalah_quote_author', true);
		}
		?>
        <header class="content_banner blog_post_banner clearfix">
        <hgroup class="quotation_banner text_banner single_banner"><h2><?php echo  $quote_content;?></h2><h3><?php echo "- " . $author_name; ?></h3></hgroup>
        </header>
		<?php
	}elseif ($type == 'url') {
		if (get_post_meta(get_the_id(), '_format_link_url', true)) {
			$url_link = esc_url(get_post_meta(get_the_id(), '_format_link_url', true));
		} else {
			$url_link = get_post_meta($post->ID, 'asalah_url_destination', true);
		}
		if (get_post_meta(get_the_id(), '_format_link_url_text', true)) {
			$url_text = get_post_meta(get_the_id(), '_format_link_url_text', true);
		} else {
			$url_text = get_post_meta($post->ID, 'asalah_url_text', true);
		}
		?>
		<a target="_blank" href="<?php echo $url_link; ?>">
        <header class="content_banner blog_post_banner clearfix">
					<hgroup class="url_banner text_banner single_banner"><h2><?php echo $url_link; ?></h2><h3><?php echo "- " . $url_text; ?></h3></hgroup>
        </header>
		</a>
		<?php
	}elseif ($type == 'featured' ){
		?>
		<header class="content_banner blog_post_banner clearfix">
		<a href="<?php echo asalah_post_thumb(); ?>" class="prettyPhoto" rel="prettyPhoto">

            <img src="<?php echo asalah_post_thumb(); ?>" class="featured_image">

        </a>
		</header>
		<?php
	}elseif ($type == 'attached') {
		$att_ids = '';
		$arr_shortcode = '';

		$shortcode = get_post_meta(get_the_id(), '_format_gallery_shortcode', true);
		$revslider = get_post_meta(get_the_id(), '_format_gallery_revslider', true);
    $gallery_type = get_post_meta(get_the_id(), '_format_gallery_type', true);
  if ($gallery_type == 'revslider') {
      if (function_exists('putRevSlider')) {
        putRevSlider($revslider);
      }
    } else if( $shortcode ){
						// parse shortcode to get 'ids' param
						$pattern = get_shortcode_regex();
						preg_match("/$pattern/s", $shortcode, $match);
						$arr_shortcode = shortcode_parse_atts($match[3]);



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

				echo '<header class="content_banner blog_post_banner clearfix">';
				echo '<div class="galleryslider clearfix"><ul class="slides gallerylist clearfix">';
				foreach ($att_ids as $att_id) {

					$image_url = wp_get_attachment_image_src($att_id,'large');
					$image_attributes = $image_url[0];
					//$image_attributes =wp_get_attachment_url($attachment_id);
						?>
			            <?php if (get_post_type() == 'project'): ?>
						<li><a href="<?php echo $image_attributes; ?>" class="prettyPhoto" rel="prettyPhoto[<?php echo $post->ID; ?>]">

			                <img src="<?php echo $image_attributes; ?>" class="featured_image">

			            </a></li>
			            <?php elseif(get_post_type() == 'post'): ?>
			            <li><a href="<?php echo $image_attributes; ?>" class="prettyPhoto" rel="prettyPhoto[<?php echo $post->ID; ?>]">

			            	<img src="<?php echo $image_attributes; ?>" class="featured_image">

			            </a></li>
			            <?php endif; ?>

			            <?php
					}
					echo '</ul></div>';
					echo '</header>';
				}
      } else {
		echo '<header class="content_banner blog_post_banner clearfix">';
		$attachments = get_children( array('post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
		echo '<div class="galleryslider clearfix"><ul class="slides gallerylist clearfix">';
		foreach ( $attachments as $attachment_id => $attachment ) {
			$image_url = wp_get_attachment_image_src($attachment_id,'large');
			$image_attributes = $image_url[0];
			//$image_attributes =wp_get_attachment_url($attachment_id);
			?>
            <?php if (get_post_type() == 'project'): ?>
			<li><a href="<?php echo $image_attributes; ?>" class="prettyPhoto" rel="prettyPhoto[<?php echo $post->ID; ?>]">

                <img src="<?php echo $image_attributes; ?>" class="featured_image">

            </a></li>
            <?php elseif(get_post_type() == 'post'): ?>
            <li><a href="<?php echo $image_attributes; ?>" class="prettyPhoto" rel="prettyPhoto[<?php echo $post->ID; ?>]">

            	<img src="<?php echo $image_attributes; ?>" class="featured_image">

            </a></li>
            <?php endif; ?>

            <?php
		}
		echo '</ul></div>';
		echo '</header>';
	}
	} else {
		if (!is_single() && has_post_thumbnail( $post->ID )) {
			?>
			<header class="content_banner blog_post_banner clearfix">
			<a href="<?php echo asalah_post_thumb(); ?>" class="prettyPhoto" rel="prettyPhoto">

							<img src="<?php echo asalah_post_thumb(); ?>" class="featured_image">

					</a>
			</header>
			<?php
		}
	}
}

?>