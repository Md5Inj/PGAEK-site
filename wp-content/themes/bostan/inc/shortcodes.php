<?php
function fn_googleMaps($atts, $content = null) {
   extract(shortcode_atts(array(
      "width" => '640',
      "height" => '480',
      "src" => ''
   ), $atts));
   $text_align = (is_rtl()) ? 'right' : 'left';
   return '<iframe width="'.$width.'" height="'.$width.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$src.'" style="color:#0000FF;text-align:'.$text_align.'">View Larger Map</a></small>';    
}


add_shortcode("googlemap", "fn_googleMaps");
?>