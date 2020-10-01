<?php
define ( 'JS_PATH' , get_template_directory_uri().'/inc/shortcodes/customcodes.js');


add_action('admin_head','html_quicktags');
function html_quicktags() {

	$output = "<script type='text/javascript'>\n
	/* <![CDATA[ */ \n";
	wp_print_scripts( 'quicktags' );

	$buttons = array();

	/*$buttons[] = array(
		'name' => 'raw',
		'options' => array(
			'display_name' => 'raw',
			'open_tag' => '\n[raw]',
			'close_tag' => '[/raw]\n',
			'key' => ''
	));*/


	$buttons[] = array(
		'name' => 'ads1',
		'options' => array(
			'display_name' => 'ADS1',
			'open_tag' => '\n[ads1]',
			'close_tag' => '',
			'key' => ''
	));

	$buttons[] = array(
		'name' => 'ads2',
		'options' => array(
			'display_name' => 'ADS2',
			'open_tag' => '\n[ads2]',
			'close_tag' => '',
			'key' => ''
	));

	$buttons[] = array(
		'name' => 'is_logged_in',
		'options' => array(
			'display_name' => 'is logged in',
			'open_tag' => '\n[is_logged_in]',
			'close_tag' => '[/is_logged_in]\n',
			'key' => ''
	));

	$buttons[] = array(
		'name' => 'is_guest',
		'options' => array(
			'display_name' => 'is guest',
			'open_tag' => '\n[is_guest]',
			'close_tag' => '[/is_guest]\n',
			'key' => ''
	));


	$buttons[] = array(
		'name' => 'one_third',
		'options' => array(
			'display_name' => 'one third',
			'open_tag' => '\n[one_third]',
			'close_tag' => '[/one_third]\n',
			'key' => ''
	));

	$buttons[] = array(
		'name' => 'one_third_last',
		'options' => array(
			'display_name' => 'one third last',
			'open_tag' => '\n[one_third_last]',
			'close_tag' => '[/one_third_last]\n',
			'key' => ''
	));

	$buttons[] = array(
		'name' => 'two_third',
		'options' => array(
			'display_name' => 'two third',
			'open_tag' => '\n[two_third]',
			'close_tag' => '[/two_third]\n',
			'key' => ''
	));

	$buttons[] = array(
		'name' => 'two_third_last',
		'options' => array(
			'display_name' => 'two third last',
			'open_tag' => '\n[two_third_last]',
			'close_tag' => '[/two_third_last]\n',
			'key' => ''
	));

	$buttons[] = array(
		'name' => 'one_half',
		'options' => array(
			'display_name' => 'one half',
			'open_tag' => '\n[one_half]',
			'close_tag' => '[/one_half]\n',
			'key' => ''
	));

	$buttons[] = array(
		'name' => 'one_half_last',
		'options' => array(
			'display_name' => 'one half last',
			'open_tag' => '\n[one_half_last]',
			'close_tag' => '[/one_half_last]\n',
			'key' => ''
	));

	$buttons[] = array(
		'name' => 'one_fourth',
		'options' => array(
			'display_name' => 'one fourth',
			'open_tag' => '\n[one_fourth]',
			'close_tag' => '[/one_fourth]\n',
			'key' => ''
	));

	$buttons[] = array(
		'name' => 'one_fourth_last',
		'options' => array(
			'display_name' => 'one fourth last',
			'open_tag' => '\n[one_fourth_last]',
			'close_tag' => '[/one_fourth_last]\n',
			'key' => ''
	));

	$buttons[] = array(
		'name' => 'three_fourth',
		'options' => array(
			'display_name' => 'three fourth',
			'open_tag' => '\n[three_fourth]',
			'close_tag' => '[/three_fourth]\n',
			'key' => ''
	));

	$buttons[] = array(
		'name' => 'three_fourth_last',
		'options' => array(
			'display_name' => 'three fourth last',
			'open_tag' => '\n[three_fourth_last]',
			'close_tag' => '[/three_fourth_last]\n',
			'key' => ''
	));

	$buttons[] = array(
		'name' => 'one_fifth',
		'options' => array(
			'display_name' => 'one fifth',
			'open_tag' => '\n[one_fifth]',
			'close_tag' => '[/one_fifth]\n',
			'key' => ''
	));

	$buttons[] = array(
		'name' => 'one_fifth_last',
		'options' => array(
			'display_name' => 'one fifth last',
			'open_tag' => '\n[one_fifth_last]',
			'close_tag' => '[/one_fifth_last]\n',
			'key' => ''
	));

	$buttons[] = array(
		'name' => 'two_fifth',
		'options' => array(
			'display_name' => 'two fifth',
			'open_tag' => '\n[two_fifth]',
			'close_tag' => '[/two_fifth]\n',
			'key' => ''
	));

	$buttons[] = array(
		'name' => 'two_fifth_last',
		'options' => array(
			'display_name' => 'two fifth last',
			'open_tag' => '\n[two_fifth_last]',
			'close_tag' => '[/two_fifth_last]\n',
			'key' => ''
	));

	$buttons[] = array(
		'name' => 'three_fifth',
		'options' => array(
			'display_name' => 'three fifth',
			'open_tag' => '\n[three_fifth]',
			'close_tag' => '[/three_fifth]\n',
			'key' => ''
	));

	$buttons[] = array(
		'name' => 'three_fifth_last',
		'options' => array(
			'display_name' => 'three fifth last',
			'open_tag' => '\n[three_fifth_last]',
			'close_tag' => '[/three_fifth_last]\n',
			'key' => ''
	));

	$buttons[] = array(
		'name' => 'four_fifth',
		'options' => array(
			'display_name' => 'four fifth',
			'open_tag' => '\n[four_fifth]',
			'close_tag' => '[/four_fifth]\n',
			'key' => ''
	));

	$buttons[] = array(
		'name' => 'four_fifth_last',
		'options' => array(
			'display_name' => 'four fifth last',
			'open_tag' => '\n[four_fifth_last]',
			'close_tag' => '[/four_fifth_last]\n',
			'key' => ''
	));

	$buttons[] = array(
		'name' => 'one_sixth',
		'options' => array(
			'display_name' => 'one sixth',
			'open_tag' => '\n[one_sixth]',
			'close_tag' => '[/one_sixth]\n',
			'key' => ''
	));

	$buttons[] = array(
		'name' => 'one_sixth_last',
		'options' => array(
			'display_name' => 'one sixth last',
			'open_tag' => '\n[one_sixth_last]',
			'close_tag' => '[/one_sixth_last]\n',
			'key' => ''
	));

	$buttons[] = array(
		'name' => 'five_sixth',
		'options' => array(
			'display_name' => 'five sixth',
			'open_tag' => '\n[five_sixth]',
			'close_tag' => '[/five_sixth]\n',
			'key' => ''
	));

	$buttons[] = array(
		'name' => 'five_sixth_last',
		'options' => array(
			'display_name' => 'five sixth last',
			'open_tag' => '\n[five_sixth_last]',
			'close_tag' => '[/five_sixth_last]\n',
			'key' => ''
	));


	for ($i=0; $i <= (count($buttons)-1); $i++) {
		$output .= "edButtons[edButtons.length] = new edButton('ed_{$buttons[$i]['name']}'
			,'{$buttons[$i]['options']['display_name']}'
			,'{$buttons[$i]['options']['open_tag']}'
			,'{$buttons[$i]['options']['close_tag']}'
			,'{$buttons[$i]['options']['key']}'
		); \n";
	}

	$output .= "\n /* ]]> */ \n
	</script>";
	echo $output;
}



function asalah_custom_addbuttons() {
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		return;

	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "add_tcustom_tinymce_plugin");
		add_filter('mce_buttons_3', 'register_tcustom_button');
	}
}
function register_tcustom_button($buttons) {
	array_push(
		$buttons,
		"AddBox",
		"AddAlert",
		"AddButtons",		"Toggle",
		"|",
		"AddMap",
		"|",
		"highlight",
		"dropcap",
		"|",
		"checklist",
		"starlist",
		"|",
		"Video",
		"|",
		"Tooltip",
		"ShareButtons",
		"divider"	);
	return $buttons;
}
function add_tcustom_tinymce_plugin($plugin_array) {
	$plugin_array['asalahShortCodes'] = JS_PATH;
	return $plugin_array;
}


## Team -------------------------------------------------- #
function asalah_shortcode_team( $atts, $content = null ) {
    @extract($atts);
	//title
	//number
	$title = (isset($title)) ? ' '.$title : __('Team', 'asalah');
	$number = (isset($number)) ? ' '.$number : '4';
	$max = (isset($max)) ? ' '.$max : '4';
	$block_id = "team_car_".random_id(25);
	$url ="";
	$number;
	$desc = "";
	$cycle ="";
	$link_member_page = (isset($link_member_page) && $link_member_page === 'yes') ? true : false ;
	$wp_query = new WP_Query(array('post_type' => 'team', 'posts_per_page' => $number));



	$out = '<div class="team_carousel team_car" id="'. $block_id.'">';
		$out .= '<h3 class="page-header"><span class="page_header_title">'.$title.'</span><span class="right_car_arrow3 cars_arrow_control right_car_arrow hidden" style="display: none;"><i class="icon-angle-right"></i></span><span class="left_car_arrow3 cars_arrow_control left_car_arrow hidden" style="display: none;"><i class="icon-angle-left"></i></span></h3>';
		$out .= '<div class="carousel">';
			$out .= '<div class="slides list_carousel responsive clearfix">';
			$out .= '<div class="team_cars">';
				while ( $wp_query->have_posts() ) : $wp_query->the_post();
				$get_meta = get_post_custom(get_the_ID());
				$out .= '<div class="the_portfolio_list_li_div" id="post-' . get_the_ID() . '">';
				$out .= '<div class="portfolio_item team_item">';
				if ($link_member_page) {
					$out .= '<a href="'.get_permalink().'">';
				}
					$out .= '<div class="portfolio_thumbnail">';
						$out .= asalah_get_blog_thumb("370","240");
						if ($link_member_page) {
							$out .= '</a>';
						}
					$out .='</div>';
					$out .= '<div class="portfolio_info">';
					if ($link_member_page) {
						$out .= '<a href="'.get_permalink().'">';
					}
						$out .='<h4>'.get_the_title().'</h4>';
						if ($link_member_page) {
							$out .= '</a>';
						}
						if ($get_meta["asalah_team_position"][0] != "" ):
						$out .= '<div class="portfolio_time">'.$get_meta["asalah_team_position"][0].'</div>';
						endif;

						if ($get_meta["asalah_team_fb"][0] != "" || $get_meta["asalah_team_tw"][0] != "" || $get_meta["asalah_team_gp"][0] != "" || $get_meta["asalah_team_linked"][0] != "" || $get_meta["asalah_team_pin"][0] != "" || $get_meta["asalah_team_mail"][0] != "") {

						$out .= '<div class="team_social_bar clearfix">';
							$out .= '<ul class="team_social_list">';
								if ($get_meta["asalah_team_fb"][0] != "") {
									$out .= '<li><a target="_blank" href="'.$get_meta["asalah_team_fb"][0].'"><i class="icon-facebook" title="Facebook"></i></a></li>';
								}
								if ($get_meta["asalah_team_tw"][0] != "" ) {
									$out .= '<li><a target="_blank" href="'. $get_meta["asalah_team_tw"][0].'"><i class="icon-twitter" title="Twitter"></i></a></li>';
								}
								if ($get_meta["asalah_team_gp"][0] != "" ) {
									$out .='<li><a target="_blank" href="'.$get_meta["asalah_team_gp"][0].'"><i class="icon-gplus" title="Google Plus"></i></a></li>';
								}
								if ($get_meta["asalah_team_linked"][0] != "" ) {
									$out .= '<li><a target="_blank" href="'.$get_meta["asalah_team_linked"][0].'"><i class="icon-linkedin" title="Linkedin"></i></a></li>';
								}
								if ($get_meta["asalah_team_pin"][0] != "" ) {
									$out .= '<li><a target="_blank" href="'.$get_meta["asalah_team_pin"][0].'"><i class="icon-pinterest" title="Pinterest"></i></a></li>';
								}
								if ($get_meta["asalah_team_mail"][0] != "" ) {
									$out .='<li><a href="mailto:'.$get_meta["asalah_team_mail"][0].'"><i class="icon-mail" title="Mail"></i></a></li>';
								}
							$out .='</ul>';
						$out .='</div>';
					   }

					$out .='</div>';
				$out .= '</div>';
				$out .= '</div>';
				endwhile;
			$out .= '</div>';
			$out .= '</div>';
		$out .= '</div>';
	$out .= '</div>';

	$out .='<script type="text/javascript" language="javascript">';
	$out .= 'jQuery(document).ready(function() {';
	$out .= 'var owl = jQuery("#'.$block_id.' .team_cars");';
	$out .= 'var';
	if (is_rtl()) {
		$out .= 'prevArrow';
		} else {
		$out .= 'nextArrow';
		}
		$out .= '= jQuery("#'.$block_id.' .right_car_arrow3");';
		$out .= 'var ';
		if (is_rtl()) {
			 $out .= 'nextArrow ';
		 } else {
			 $out .= 'prevArrow ';
		 }
		 $out .= '= jQuery("#'.$block_id.' .left_car_arrow3");';
		 $out .= 'owl.slideDown();';
		 $out .= 'owl.owlCarousel({';
		 $out .= 'loop: ';
		 if ($max >= $number) {
			 $out .= 'false ';
		 } else {
			 $out .= 'true ';
		 }
		 $out .= ',';
		 $out .= 'rewind: false,';
		 $out .= 'margin:14,';
 	 	 $out .= 'responsive:{';
		 $out .= '0:{';
		 $out .= 'items:1,';
		 $out .= 'loop: true,';
		 $out .= '},';
		 $out .= '369:{';
		 $out .= 'items: 2,';
		 $out .= 'loop: true,';
		 $out .= '},';
		 $out .= '784:{';
		 $out .= 'items:'.$max.'';
		 $out .= '}';
		 $out .= '},';
		 if ($cycle != '') :
			 $out .= 'slideBy: '.$cycle.',';
		 else:
			 $out .= "slideBy: 'page',";
 	 	 endif;
 	 	 $out .= 'responsiveClass:true,';
 	 	 $out .= "responsiveBaseElement: '#".$block_id."',";
 	 	 $out .= 'dots: false,';
 	 	 $out .= 'autoPlay: '.$autoplay.',';
 	 	 if (is_rtl()) {
			 $out .= 'rtl: true';
		 }
	 	 $out .= '});';
		 if ($max >= $number) {
			 $out .= 'if (jQuery(window).width() > 784) {';
			 $out .= 'nextArrow.hide();';
			 $out .= 'prevArrow.hide();';
		   $out .= '}';
		 }
		 // Custom Navigation Events
		 $out .= 'nextArrow.click(function(){';
		 $out .= "owl.trigger('next.owl.carousel');";
	 	 $out .= '});';
		 $out .= 'prevArrow.click(function(){';
		 $out .= "owl.trigger('prev.owl.carousel');";
	 	 $out .= '});';
		 $out .= "owl.imagesLoaded( function () {";
		 $out .= "owl.trigger('refresh.owl.carousel');";
	 	 $out .= "});";
		 $out .= "jQuery(window).resize( function() {";
		 $out .= "if (jQuery(window).width() < 784) {";
		 $out .= "nextArrow.show();";
		 $out .= "prevArrow.show();";
	 	 $out .= "}";
		 if ($max >= $number) {
			 $out .= "else {";
			 $out .= "nextArrow.hide();";
			 $out .= "prevArrow.hide();";
		 	 $out .= "}";
		 }
		 $out .= "owl.trigger('refresh.owl.carousel');";
	 	 $out .= "});";
	 	 $out .= "});";
	$out .= '</script>';
	return $out;
	wp_reset_query();
}
add_shortcode('team', 'asalah_teamblock_shortcode');

function asalah_shortcode_admin( $atts, $content = null ) {
	@extract($atts);
//title
//number
$title = (isset($title)) ? ' '.$title : __('Admin', 'asalah');
$number = (isset($number)) ? ' '.$number : '4';
$max = (isset($max)) ? ' '.$max : '4';
$block_id = "admin_car_".random_id(25);
$url ="";
$number;
$desc = "";
$cycle ="";
$link_member_page = (isset($link_member_page) && $link_member_page === 'yes') ? true : false ;
$wp_query = new WP_Query(array('post_type' => 'admin', 'posts_per_page' => $number));



$out = '<div class="team_carousel team_car" id="'. $block_id.'">';
	$out .= '<h3 class="page-header"><span class="page_header_title">'.$title.'</span><span class="right_car_arrow3 cars_arrow_control right_car_arrow hidden" style="display: none;"><i class="icon-angle-right"></i></span><span class="left_car_arrow3 cars_arrow_control left_car_arrow hidden" style="display: none;"><i class="icon-angle-left"></i></span></h3>';
	$out .= '<div class="carousel">';
		$out .= '<div class="slides list_carousel responsive clearfix">';
		$out .= '<div class="team_cars">';
			while ( $wp_query->have_posts() ) : $wp_query->the_post();
			$get_meta = get_post_custom(get_the_ID());
			$out .= '<div class="the_portfolio_list_li_div" id="post-' . get_the_ID() . '">';
			$out .= '<div class="portfolio_item team_item">';
			if ($link_member_page) {
				$out .= '<a href="'.get_permalink().'">';
			}
				$out .= '<div class="portfolio_thumbnail">';
					$out .= asalah_get_blog_thumb("370","240");
					if ($link_member_page) {
						$out .= '</a>';
					}
				$out .='</div>';
				$out .= '<div class="portfolio_info">';
				if ($link_member_page) {
					$out .= '<a href="'.get_permalink().'">';
				}
					$out .='<h4>'.get_the_title().'</h4>';
					if ($link_member_page) {
						$out .= '</a>';
					}
					if ($get_meta["asalah_admin_position"][0] != "" ):
					$out .= '<div class="portfolio_time">'.$get_meta["asalah_admin_position"][0].'</div>';
					endif;

					if ($get_meta["asalah_admin_fb"][0] != "" || $get_meta["asalah_admin_tw"][0] != "" || $get_meta["asalah_admin_gp"][0] != "" || $get_meta["asalah_admin_linked"][0] != "" || $get_meta["asalah_admin_pin"][0] != "" || $get_meta["asalah_admin_mail"][0] != "") {

					$out .= '<div class="team_social_bar clearfix">';
						$out .= '<ul class="team_social_list">';
							if ($get_meta["asalah_admin_fb"][0] != "") {
								$out .= '<li><a target="_blank" href="'.$get_meta["asalah_admin_fb"][0].'"><i class="icon-facebook" title="Facebook"></i></a></li>';
							}
							if ($get_meta["asalah_admin_tw"][0] != "" ) {
								$out .= '<li><a target="_blank" href="'. $get_meta["asalah_admin_tw"][0].'"><i class="icon-twitter" title="Twitter"></i></a></li>';
							}
							if ($get_meta["asalah_admin_gp"][0] != "" ) {
								$out .='<li><a target="_blank" href="'.$get_meta["asalah_admin_gp"][0].'"><i class="icon-gplus" title="Google Plus"></i></a></li>';
							}
							if ($get_meta["asalah_admin_linked"][0] != "" ) {
								$out .= '<li><a target="_blank" href="'.$get_meta["asalah_admin_linked"][0].'"><i class="icon-linkedin" title="Linkedin"></i></a></li>';
							}
							if ($get_meta["asalah_admin_pin"][0] != "" ) {
								$out .= '<li><a target="_blank" href="'.$get_meta["asalah_admin_pin"][0].'"><i class="icon-pinterest" title="Pinterest"></i></a></li>';
							}
							if ($get_meta["asalah_admin_mail"][0] != "" ) {
								$out .='<li><a href="mailto:'.$get_meta["asalah_admin_mail"][0].'"><i class="icon-mail" title="Mail"></i></a></li>';
							}
						$out .='</ul>';
					$out .='</div>';
					 }

				$out .='</div>';
			$out .= '</div>';
			$out .= '</div>';
			endwhile;
		$out .= '</div>';
		$out .= '</div>';
	$out .= '</div>';
$out .= '</div>';

$out .='<script type="text/javascript" language="javascript">';
$out .= 'jQuery(document).ready(function() {';
$out .= 'var owl = jQuery("#'.$block_id.' .team_cars");';
$out .= 'var';
if (is_rtl()) {
	$out .= 'prevArrow';
	} else {
	$out .= 'nextArrow';
	}
	$out .= '= jQuery("#'.$block_id.' .right_car_arrow3");';
	$out .= 'var ';
	if (is_rtl()) {
		 $out .= 'nextArrow ';
	 } else {
		 $out .= 'prevArrow ';
	 }
	 $out .= '= jQuery("#'.$block_id.' .left_car_arrow3");';
	 $out .= 'owl.slideDown();';
	 $out .= 'owl.owlCarousel({';
	 $out .= 'loop: ';
	 if ($max >= $number) {
		 $out .= 'false ';
	 } else {
		 $out .= 'true ';
	 }
	 $out .= ',';
	 $out .= 'rewind: false,';
	 $out .= 'margin:14,';
		 $out .= 'responsive:{';
	 $out .= '0:{';
	 $out .= 'items:1,';
	 $out .= 'loop: true,';
	 $out .= '},';
	 $out .= '369:{';
	 $out .= 'items: 2,';
	 $out .= 'loop: true,';
	 $out .= '},';
	 $out .= '784:{';
	 $out .= 'items:'.$max.'';
	 $out .= '}';
	 $out .= '},';
	 if ($cycle != '') :
		 $out .= 'slideBy: '.$cycle.',';
	 else:
		 $out .= "slideBy: 'page',";
		 endif;
		 $out .= 'responsiveClass:true,';
		 $out .= "responsiveBaseElement: '#".$block_id."',";
		 $out .= 'dots: false,';
		 $out .= 'autoPlay: '.$autoplay.',';
		 if (is_rtl()) {
		 $out .= 'rtl: true';
	 }
		$out .= '});';
	 if ($max >= $number) {
		 $out .= 'if (jQuery(window).width() > 784) {';
		 $out .= 'nextArrow.hide();';
		 $out .= 'prevArrow.hide();';
		 $out .= '}';
	 }
	 // Custom Navigation Events
	 $out .= 'nextArrow.click(function(){';
	 $out .= "owl.trigger('next.owl.carousel');";
		$out .= '});';
	 $out .= 'prevArrow.click(function(){';
	 $out .= "owl.trigger('prev.owl.carousel');";
		$out .= '});';
	 $out .= "owl.imagesLoaded( function () {";
	 $out .= "owl.trigger('refresh.owl.carousel');";
		$out .= "});";
	 $out .= "jQuery(window).resize( function() {";
	 $out .= "if (jQuery(window).width() < 784) {";
	 $out .= "nextArrow.show();";
	 $out .= "prevArrow.show();";
		$out .= "}";
	 if ($max >= $number) {
		 $out .= "else {";
		 $out .= "nextArrow.hide();";
		 $out .= "prevArrow.hide();";
			$out .= "}";
	 }
	 $out .= "owl.trigger('refresh.owl.carousel');";
		$out .= "});";
		$out .= "});";
$out .= '</script>';
return $out;
wp_reset_query();
}
add_shortcode('admin', 'asalah_adminblock_shortcode');


## Projects -------------------------------------------------- #
function asalah_shortcode_projects( $atts, $content = null ) {
    @extract($atts);

	$title = (isset($title)) ? $title : '';
	$number = (isset($number)) ? $number : '';
	$max = (isset($max)) ? $max : '';
	$url = (isset($url)) ? $url : '';
	$block_id = "project_car_".random_id(25);
	$desc = (isset($desc)) ? $desc : "";
	$cycle = (isset($cycle)) ? $cycle : "";
	$pos = (isset($pos)) ? $pos : 'top' ;
	$tags_ids = (isset($tags_ids)) ? $tags_ids : '' ;
	$exception = (isset($exception)) ? $exception : '' ;
	$posttype= (isset($posttype)) ? $posttype : 'project';
	$projects_order = (isset($projects_order)) ? $projects_order : '';
	$autoplay = (isset($autoplay_car) && ($autoplay_car == 'yes')) ? 'true' : 'false';
	$thumb_height = (isset($thumb_height)) ? $thumb_height : '' ;
	$external_link = (isset($external_link)) ? $external_link : '';
	if (intval($thumb_height) == '') { $thumb_height = "193";}
	$out = '';
	ob_start();
	asalah_posts_carousel($block_id, 'project', $url, $number, $title, $desc, $max, $cycle, $pos, '', $tags_ids, $projects_order, $autoplay, $thumb_height, $external_link);
	$out .= ob_get_contents();
	ob_end_clean();
	return $out;
	wp_reset_query();
}
add_shortcode('projects', 'asalah_shortcode_projects');

## Clients -------------------------------------------------- #
function asalah_shortcode_clients( $atts, $content = null ) {
    @extract($atts);
	//title
	//number
	$title = (isset($title)) ? ' '.$title : '';
	$number = (isset($number)) ? ' '.$number : '';
	$block_id = "clients_car_".mt_rand();
	$show_number = ((isset($show_number))&&($show_number != '')) ? $show_number : '';
	$client_order = ((isset($client_order))&&($client_order != '')) ? ' '.$client_order : '';
	$autoplay_car = ((isset($autoplay_car))&&($autoplay_car != '')) ? ' '.$autoplay_car : '';
	ob_start();
	asalah_clients_carousel($block_id,$number, $title, $client_order, $show_number, $autoplay_car);
	$out = ob_get_contents();
	ob_end_clean();
	return $out;
	wp_reset_query();
}
add_shortcode('clients', 'asalah_shortcode_clients');

## Testimonials -------------------------------------------------- #
function asalah_shortcode_testimonials( $atts, $content = null ) {
    @extract($atts);
	//title
	//number
	$title = (isset($title)) ? $title : __('Testimonials', 'asalah');
	$number = (isset($number)) ? $number : '3';
	$slides = (isset($slides)) ? $slides : '1';

	$block_id = "testimonials_car_".random_id(25);
	ob_start();
	asalah_testimonials_carousel($block_id,$number,$title, $slides);
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
add_shortcode('testimonials', 'asalah_shortcode_testimonials');


## Tooltip -------------------------------------------------- #
function asalah_shortcode_Tooltip( $atts, $content = null ) {
    @extract($atts);
	if( empty($direction) ) $direction = 'n';
	$out = '<span class="post-tooltip tooltip-'.$direction.'" title="'.$text.'">'.$content.'</span>';
   return $out;
}
add_shortcode('tooltip', 'asalah_shortcode_Tooltip');

## Boxes -------------------------------------------------- #
function asalah_shortcode_box( $atts, $content = null ) {
    @extract($atts);
	// type : download, warning, info, shadow, success
	$type =  (isset($type))  ? ' '.$type  :'shadow' ;
	$align = (isset($align)) ? ' '.$align : '';
	$class = (isset($class)) ? ' '.$class : '';
	$width = (isset($width)) ? ' style="width:'.$width.'"' : '';

	$out = '<div class="box'.$type.$class.$align.'"'.$width.'><div>
			' .do_shortcode($content). '
			</div></div>';
    return $out;
}
add_shortcode('box', 'asalah_shortcode_box');


## Alerts --------------------------------------------------#

function asalah_shortcode_alert($atts, $content = null) {
    @extract($atts);
	// type : alert-success, alert-block, alert-info
	$type =  (isset($type))  ? ' '.$type  :'shadow' ;
	$class = (isset($class)) ? ' '.$class : '';
	$title = (isset($title)) ? '<h4>'.$title.'</h4>' : '';

	$out = '<div class="alert '.$type.'" "' . $class.'">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	'.$title.''.do_shortcode($content). '</div>';

	return $out;
}
add_shortcode('alert', 'asalah_shortcode_alert');


## Toggle -------------------------------------------------- #
function asalah_shortcode_toggles( $atts, $content = null ) {
   @extract($atts);
	 $output = '';
	 if ($title):
		 $output .= '<h3 class="page-header"><span class="page_header_title">'.$title.'</span></h3>';
	 endif;
    $output .= do_shortcode( $content );
    return $output;
}
add_shortcode('toggles', 'asalah_shortcode_toggles');

function asalah_shortcode_Toggle( $atts, $content = null ) {
    @extract($atts);
	//state : open
	if( !isset($GLOBALS['toggle_current_collapse']) )
      $GLOBALS['toggle_current_collapse'] = 0;
    else
      $GLOBALS['toggle_current_collapse']++;

	$state =  (isset($state))  ? $state  :'' ;
	$title = (isset($title)) ? $title : '';
	$icon_family = (isset($icon_family)) ? $icon_family : '';
	if ($icon_family) {
		if ($icon_family == 'fontawesome') { $icon = $icon_class_fontawesome; } else { $icon = $icon_class_fontello; };
		$size = (isset($icon_size)) ? intval($icon_size) : 16;
		$color = (isset($icon_color)) ? $icon_color : '';
		$title = '[icon font_family="'.$icon_family.'" type="'.$icon.'" size="'.$size.'" icon_color="'.$color.'"] '.$title;
	}
	$output = "";
	if ($state == "open") { $state = " in"; }
	$output .= '<div class="toggle-group">';
		$output .= '<div class="accordion-heading">';
			$output .= '<a class="accordion-toggle" data-toggle="collapse" href="#collapse_' . $GLOBALS['toggle_current_collapse'] . '">';
				$output .= do_shortcode( $title );
			$output .= '</a>';
		$output .= '</div>';
		$output .= '<div id="collapse_' . $GLOBALS['toggle_current_collapse'] . '" class="accordion-body collapse ' . $state . '">';
			$output .= '<div class="accordion-inner">';
				$output .= do_shortcode($content);
			$output .= '</div>';
		$output .= '</div>';
	$output .= '</div>';

	return $output;
}
add_shortcode('toggle', 'asalah_shortcode_Toggle');

## Accordion -------------------------------------------------- #
function asalah_shortcode_accordions( $atts, $content = null ) {
   @extract($atts);
	 if( isset($GLOBALS['accordion_id']) )
      $GLOBALS['accordion_id']++;
    else
      $GLOBALS['accordion_id'] = 0;

			$id = $GLOBALS['accordion_id'];
			$output = '';
			if ($title):
				$output .= '<h3 class="page-header"><span class="page_header_title">'.$title.'</span></h3>';
			endif;
			$output .= '<div class="accordions_shortcode_group accordion" id="accordion'.$id.'" >';
    $output .= do_shortcode( $content );
		$output .= "</div>";
    return $output;
}
add_shortcode('accordions', 'asalah_shortcode_accordions');
function asalah_shortcode_Accordion( $atts, $content = null ) {
    @extract($atts);
	//state : open
	if( !isset($GLOBALS['accordion_current_collapse']) )
      $GLOBALS['accordion_current_collapse'] = 1;
    else
      $GLOBALS['accordion_current_collapse']++;

	$id = (isset($GLOBALS['accordion_id'])) ? $GLOBALS['accordion_id'] : '1';
	$state =  (isset($state))  ? $state  :'' ;
	$title = (isset($title)) ? $title : '';
	$icon_family = (isset($icon_family)) ? $icon_family : '';
	if ($icon_family) {
		if ($icon_family == 'fontawesome') { $icon = $icon_class_fontawesome; } else { $icon = $icon_class_fontello; };
		$size = (isset($icon_size)) ? intval($icon_size) : 16;
		$color = (isset($icon_color)) ? $icon_color : '';
		$title = '[icon font_family="'.$icon_family.'" type="'.$icon.'" size="'.$size.'" icon_color="'.$color.'"] '.$title;
	}
	$output = "";
	if ($state == "open") { $state = " in"; } elseif ($GLOBALS['accordion_current_collapse'] == 1) {  $state = " in"; };
	$output .= '<div class="accordion-group">';
		$output .= '<div class="accordion-heading">';
			$output .= '<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion'.$id.'" href="#collapse_'.$id.'_' . $GLOBALS['accordion_current_collapse'] . '">';
				$output .= do_shortcode( $title );
			$output .= '</a>';
		$output .= '</div>';
		$output .= '<div id="collapse_'.$id.'_' . $GLOBALS['accordion_current_collapse'] . '" class="accordion-body collapse ' . $state . '">';
			$output .= '<div class="accordion-inner">';
				$output .= do_shortcode($content);
			$output .= '</div>';
		$output .= '</div>';
	$output .= '</div>';

	return $output;
}
add_shortcode('accordion', 'asalah_shortcode_Accordion');


## Buttons -------------------------------------------------- #
function asalah_shortcode_button( $atts, $content = null ) {
    @extract($atts);
	//size: small, medium, big
	// color: primary, red, orange, blue, green, black, gray, white, pink, purple
	// target: _blank
	$size  = (isset($size))  ? ' '.$size  :' small' ;
	$color = (isset($color)) ? ' '.$color : ' primary';
	$align = (isset($align)) ? ' '.$align : '';
	$link  = (isset($link)) ? ' '.$link : '';
	$target = (isset($target)) ? ' target="_blank"' : '';

	$out = '<a href="'.$link.'"'.$target.' class="button'.$size.$color.$align.'">' .do_shortcode($content). '</a>';
    return $out;
}
add_shortcode('button', 'asalah_shortcode_button');


## Google Map -------------------------------------------------- #
function asalah_shortcode_googlemap( $atts, $content = null ) {
    @extract($atts);
	// src
	$src = (isset($src)) ? $src : '' ;
	$width  = (isset($width))  ? $width  :'100%' ;
	$height = (isset($height)) ? $height : '440';

	return asalah_google_maps( $src , $width, $height );
}
add_shortcode('googlemap', 'asalah_shortcode_googlemap');



## is_logged_in shortcode -------------------------------------------------- #
function asalah_shortcode_is_logged_in( $atts, $content = null ) {
	global $user_ID ;
	if( $user_ID )
		return do_shortcode($content) ;
}
add_shortcode('is_logged_in', 'asalah_shortcode_is_logged_in');


## is_guest shortcode -------------------------------------------------- #
function asalah_shortcode_is_guest( $atts, $content = null ) {
	global $user_ID ;
	if( !$user_ID  )
		return do_shortcode($content) ;
}
add_shortcode('is_guest', 'asalah_shortcode_is_guest');


## Follow Twitter -------------------------------------------------- #
function asalah_shortcode_follow( $atts, $content = null ) {
	//id
	// count = true, false
	// size: large
    @extract($atts);

	if($size == "large") $size = 'data-size="large"' ;
		else $size="";

	if($count == "true") $count = "true" ;
	else $count = "false" ;

	$out = '
	<a href="https://twitter.com/'. $id .'" class="twitter-follow-button" data-show-count="'.$count.'" '.$size.'>Follow @'. $id .'</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';

    return $out;
}
add_shortcode('follow', 'asalah_shortcode_follow');




## AddVideo -------------------------------------------------- #
function asalah_shortcode_AddVideo( $atts, $content = null ) {
    @extract($atts);


	$video_url = @parse_url($content);
	$height = (isset($height)) ? $height : '' ;
	$width = (isset($width)) ? $width : "" ;


	if ( $video_url['host'] == 'www.youtube.com' || $video_url['host']  == 'youtube.com' ) {
		parse_str( @parse_url( $content, PHP_URL_QUERY ), $my_array_of_vars );
		$video =  $my_array_of_vars['v'] ;
		$out ='<div class="video_fit_container"><iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$video.'?wmode=transparent&wmode=opaque" frameborder="0" allowfullscreen></iframe></div>';
	}
	elseif( $video_url['host'] == 'www.vimeo.com' || $video_url['host']  == 'vimeo.com' ){
		$video = (int) substr(@parse_url($content, PHP_URL_PATH), 1);
		$out='<div class="video_fit_container"> <iframe src="http://player.vimeo.com/video/'.$video.'" width="'.$width.'" height="'.$height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
	}

    return $out;
}
add_shortcode('video', 'asalah_shortcode_AddVideo');


## Facebook Subscribe-------------------------------------------------- #
function asalah_facebooksub_shortcode( $atts, $content = null ) {
	@extract($atts);
	$username  = (isset($username))  ? $username  : '' ;
	$app_id = (isset($app_id)) ? $app_id : '' ;
	$secret_id = (isset($secret_id)) ? $secret_id : '' ;
	$url = 'https://graph.facebook.com/' . $username. '?fields=name,likes&access_token='.$app_id.'|'.$secret_id.'';

	return '<div class="facebook_counter social_counter clearfix">
                <a href="https://www.facebook.com/'.$username.'" class="social_counter_link">
                    <span class="counter_icon facebook_counter_icon"><i class="icon-facebook"></i></span>
                    <strong class="counter_number">'. json_decode(file_get_contents($url))->likes.'</strong>
                    <span class="counter_users_word">'. __("fans", "asalah").'</span>
                </a>
            </div>';
}
add_shortcode("facebook_subscribe", "asalah_facebooksub_shortcode");

## Twitter Subscribe-------------------------------------------------- #
function asalah_twittersub_shortcode( $atts, $content = null ) {
	@extract($atts);
	$username  = (isset($username))  ? $username  :'' ;
	$data = file_get_contents('https://cdn.syndication.twimg.com/widgets/followbutton/info.json?screen_names='.$username);
	$parsed =  json_decode($data,true);
	$tw_followers =  $parsed[0]['followers_count'];
	return '<div class="twitter_counter social_counter clearfix">
                <a href="https://twitter.com/'.$username.'" class="social_counter_link">
                    <span class="counter_icon twitter_counter_icon"><i class="icon-twitter"></i></span>
                    <strong class="counter_number">'.$tw_followers.'</strong>
                    <span class="counter_users_word">'. __("Followers", "asalah").'</span>
                </a>
            </div>';

}
add_shortcode("twitter_subscribe", "asalah_twittersub_shortcode");

## RSS Subscribe-------------------------------------------------- #
function asalah_rsssub_shortcode( $atts, $content = null ) {
	@extract($atts);
	$url  = (isset($url))  ? $url  :'' ;

	return '<div class="rss_counter social_counter clearfix">
                <a href="' . $url .'" class="social_counter_link">
                    <span class="counter_icon rss_counter_icon"><i class="icon-rss"></i></span>
                    <strong class="counter_number">'. __("Subscribe", "asalah") .'</strong>
                    <span class="counter_users_word">'. __("To RSS", "asalah") . '</span>
                </a>
            </div>';

}
add_shortcode("rss_subscribe", "asalah_rsssub_shortcode");


## highlight -------------------------------------------------- #
function asalah_highlight_shortcode( $atts, $content = null ) {
    return '<span class="highlight">'.$content.'</span>';
}
add_shortcode("highlight", "asalah_highlight_shortcode");


## Dropcap  -------------------------------------------------- #
function asalah_dropcap_shortcode( $atts, $content = null ) {
    return '<span class="dropcap">'.$content.'</span>';
}
add_shortcode("dropcap", "asalah_dropcap_shortcode");



## checklist -------------------------------------------------- #
function asalah_checklist_shortcode( $atts, $content = null ) {
    return '<div class="checklist">'.do_shortcode($content).'</div>';
}
add_shortcode("checklist", "asalah_checklist_shortcode");


## starlist -------------------------------------------------- #
function asalah_starlist_shortcode( $atts, $content = null ) {
    return '<div class="starlist">'.do_shortcode($content).'</div>';
}
add_shortcode("starlist", "asalah_starlist_shortcode");


## iconlist -------------------------------------------------- #
function asalah_iconlist_shortcode( $atts, $content = null ) {
	//type : check, star, empty, finish, circle, right, hand
	extract(shortcode_atts(array(
      "type" => 'check',
    ), $atts));
    return '<div class="asalah_list list-'.$type.'">'.do_shortcode($content).'</div>';
}
add_shortcode("iconlist", "asalah_iconlist_shortcode");

## Facebook -------------------------------------------------- #
function asalah_facebook_shortcode( $atts, $content = null ) {
	global $post;
		return '<div class="fb-like" data-href="'.get_permalink($post->ID).'" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>';
}
add_shortcode("facebook", "asalah_facebook_shortcode");


## Tweet -------------------------------------------------- #
function asalah_tweet_shortcode( $atts, $content = null ) {
	global $post, $asalah_data;
    return '<a href="https://twitter.com/share" class="twitter-share-button" data-url="'. get_permalink($post->ID) .'" data-text="'. get_the_title($post->ID) .'" data-via="'. $asalah_data['asalah_tw_url'] .'" data-lang="en" data-count="vertical" >tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>';
}
add_shortcode("tweet", "asalah_tweet_shortcode");


## Digg -------------------------------------------------- #
function asalah_digg_shortcode( $atts, $content = null ) {
	global $post;
	$output = '<a style="text-decoration:none;" href="http://digg.com/" rel="nofollow" onclick="window.open(\'http://digg.com/submit?phase=2&amp;url=\'+encodeURIComponent(location.href)+\'&amp;bodytext=&amp;tags=&amp;title=\'+encodeURIComponent(document.title));return false;" title="Digg it"><img src="https://3.bp.blogspot.com/-HsmMH6ibC8U/Vx9Z4Ee2AsI/AAAAAAAABT0/p3KFsK_Vfbc3W2FXKB1uaDujTv9gLXrqACLcB/s1600/Digg_icon.png" style="height:32px; width:32px;" /></a>';

  return $output;
}
add_shortcode("digg", "asalah_digg_shortcode");


## stumble -------------------------------------------------- #
function asalah_stumble_shortcode( $atts, $content = null ) {
	global $post;
    return "<su:badge layout='5' location='". get_permalink($post->ID) ."'></su:badge>
<script type='text/javascript'>
  (function() {
    var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true;
    li.src = 'https://platform.stumbleupon.com/1/widgets.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s);
  })();
</script>";
}
add_shortcode("stumble", "asalah_stumble_shortcode");



## Google + -------------------------------------------------- #
function asalah_google_shortcode( $atts, $content = null ) {
	global $post;
    return "<g:plusone size='tall'></g:plusone>
<script type='text/javascript'>
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
";
}
add_shortcode("google", "asalah_google_shortcode");




## Tabs -------------------------------------------------- #
function asalah_shortcode_tabs( $atts, $content = null ) {
   if( isset($GLOBALS['tabs_count']) )
      $GLOBALS['tabs_count']++;
    else
      $GLOBALS['tabs_count'] = 0;
    extract( shortcode_atts( array(
		'title' => '',
    'tabtype' => 'nav-tabs',
    'tabdirection' => '',
	'vertical' => '',
  ), $atts ) );
    preg_match_all( '/\[tab (.*?)\]/i', $content, $matches, PREG_OFFSET_CAPTURE );

    $tab_titles = array();
    if( isset($matches[1]) ){ $tab_titles = $matches[1]; }

    $output = '';
		if ($title):
			$output .= '<h3 class="page-header"><span class="page_header_title">'.$title.'</span></h3>';
		endif;
	$pos_class = "";
    if ($vertical == 'true') {
		$pos_class = "vertical_tab";
	}else{
		$pos_class = "horizontal_tab";
	}
    if( count($tab_titles) ){
      $output .= '<div class="tabbable tabs-'.$tabdirection.' '.$pos_class.'"><ul class="nav '. $tabtype .'" id="custom-tabs-'. rand(1, 100) .'">';

      $i = 0;
      foreach( $tab_titles as $tab ){

				$tab_args = $tab[0];
				preg_match_all('/title="([^\"]+)"/i', $tab_args, $title);
				preg_match_all('/icon_family="([^\"]+)"/i', $tab_args, $icon_family);
				preg_match_all('/icon_class_fontello="([^\"]+)"/i', $tab_args, $icon_class_fontello);
				preg_match_all('/icon_class_fontawesome="([^\"]+)"/i', $tab_args, $icon_class_fontawesome);
				preg_match_all('/icon_size="([^\"]+)"/i', $tab_args, $icon_size);
				preg_match_all('/icon_color="([^\"]+)"/i', $tab_args, $icon_color);
				$title = (isset($title[1][0])) ? $title[1][0] : '' ;
				$icon_family = (isset($icon_family[1][0])) ? $icon_family[1][0] : '';
				$icon_class_fontello = (isset($icon_class_fontello[1][0])) ? $icon_class_fontello[1][0] : '';
				$icon_class_fontawesome = (isset($icon_class_fontawesome[1][0])) ? $icon_class_fontawesome[1][0] : '';
				$icon_size = (isset($icon_size[1][0])) ? $icon_size[1][0] : '';
				$icon_color = (isset($icon_color[1][0])) ? $icon_color[1][0] : '';

        if($i == 0)
          $output .= '<li class="active">';
        else
          $output .= '<li>';


					if ($icon_family) {

						if ($icon_family == 'fontawesome') { $icon = $icon_class_fontawesome; } else { $icon = $icon_class_fontello; };
						$size = (isset($icon_size) && (intval($icon_size) != 0)) ? intval($icon_size) : 16;
						$color = (isset($icon_color)) ? $icon_color : '';
						$title = '[icon font_family="'.$icon_family.'" type="'.$icon.'" size="'.$size.'" icon_color="'.$color.'"] '.$title;
					}
					$title = do_shortcode($title);
        $output .= '<a href="#custom-tab-' . $GLOBALS['tabs_count'] . '-' . str_replace(' ', '_', strip_tags( $title )) . '"  data-toggle="tab">' . $title . '</a></li>';
        $i++;
      }

        $output .= '</ul>';
        $output .= '<div class="tab-content">';
        $output .= do_shortcode( $content );
        $output .= '</div></div>';
    } else {
      $output .= do_shortcode( $content );
    }

    return $output;
}
function asalah_shortcode_tab( $atts, $content = null ) {

    if( !isset($GLOBALS['current_tabs']) ) {
      $GLOBALS['current_tabs'] = $GLOBALS['tabs_count'];
      $state = 'active';
    } else {

      if( $GLOBALS['current_tabs'] == $GLOBALS['tabs_count'] ) {
        $state = '';
      } else {
        $GLOBALS['current_tabs'] = $GLOBALS['tabs_count'];
        $state = 'active';
      }
    }

    $defaults = array( 'title' => 'Tab',
		'icon_family' => '',
		'icon_class_fontello' => '',
		'icon_class_fontawesome' => '',
		'icon_size' => '',
		'icon_color' => ''
		);
    extract( shortcode_atts( $defaults, $atts ) );

    return '<div id="custom-tab-' . $GLOBALS['tabs_count'] . '-'. str_replace(' ', '_', strip_tags( $title )) .'" class="tab-pane ' . $state . '">'. do_shortcode( $content ) .'</div>';
  }
add_shortcode('tabs', 'asalah_shortcode_tabs');
add_shortcode('tab', 'asalah_shortcode_tab');


## Divider -------------------------------------------------- #
function asalah_shortcode_divider( $atts, $content = null ) {
	@extract($atts);

	$title = (isset($title)) ? $title : '';
	$icon_family = (isset($icon_family)) ? $icon_family : '';
	$size = (isset($size)) ? $size : 'h3';
	$icon = (isset($icon)) ? $icon : 'h3';

	if ($title == '') {
	$out ='<hr class="bs-docs-separator">';
	}else{
	$out ='<'.$size.' class="page-header">';
		if ($icon_family != '') {
			if ($icon_class_fontello != '') {
				$out .='<i class="divider_icon '.$icon_class_fontello.'"></i> ';
			} elseif ($icon_class_fontawesome) {
				$out .='<i class="divider_icon '.$icon_class_fontawesome.'"></i> ';
			}
		} else {
		if ($icon != '') {
			$out .='<i class="divider_icon icon-'.$icon.'"></i> ';
		}
	}
	$out .= $title;
	$out .= '</'.$size.'>';
	}
   return $out;

}
add_shortcode('divider', 'asalah_shortcode_divider');

## progress -------------------------------------------------- #
function asalah_shortcode_progress( $atts, $content = null ) {
	@extract($atts);
	//pos: right, left
	$title = (isset($title)) ? $title : '';
	$percent = (isset($percent)) ? $percent : '';
	$type = (isset($type)) ? $type : 'striped' ;

	if (isset($GLOBALS['prog_bar_type'])) {
		$type = $GLOBALS['prog_bar_type'];
	}

	if ($type == 'striped') {
		$style = 'progress-striped';
	} else if ($type == 'animated') {
		$style = 'progress-striped active';
	} else {
		$style = '';
	}

	if ($title != '' && $percent != '') {
		$out = '<div class="skills_content">';
			$out .= '<span class="skill_title meta_title">'.$title .' '. $percent .'%</span>';
			$out .= '<div class="progress '. $style .'">';
				$out .= '<div class="bar" style="width: '. $percent .'%;"></div>';
			$out .= '</div>';
		$out .= '</div>';


	}else{
		$out = '';
	}
   return $out;

}
add_shortcode('progress', 'asalah_shortcode_progress');


## pullquote -------------------------------------------------- #
function asalah_shortcode_pull( $atts, $content = null ) {
	@extract($atts);
	//pos: right, left
	$pos = (isset($pos)) ? $pos : '';

	if ($pos == 'left') {
	$out ='<span class="pullquote text-left">' . $content .'</span>';
	}elseif($pos == 'right'){
	$out ='<span class="pullquote text-right">' . $content .'</span>';
	}else{
	$out ='<blockquote>' . $content .'</blockquote>';
	}
   return $out;

}
add_shortcode('pull', 'asalah_shortcode_pull');

## Icons
function asalah_shortcode_icon( $atts, $content = null ) {
    extract(shortcode_atts(array(
      "type" => '',
      "size" => 'normal',
			'font_family' => '',
			'icon_color' => '',
			'icon_class_fontello' => '',
			'icon_class_fontawesome' => ''
    ), $atts));
		if (intval($size) != '') {
			$size = $size . 'px';
		}
		if ($icon_color) {
			$color = 'color:'.$icon_color.';';
		} else {
			$color = '';
		}
		if ($font_family) {
			if ($font_family == 'bostan-fontello' && $icon_class_fontello != '') {
				$type = $icon_class_fontello;
			} else if ( $icon_class_fontawesome != '') {
				$type = $icon_class_fontawesome;
			}
			return '<i class="'.$type.'" style="font-size:'. $size .'; '.$color.'"></i>';
		} else {
			return '<i class="icon icon-'.$type.'" style="font-size:'. $size .'; '.$color.'"></i>';
		}
  }

  add_shortcode('icon', 'asalah_shortcode_icon');

/* Action Block Shortcode */

add_shortcode( 'action', 'asalah_action_shortcode' );
function asalah_action_shortcode($atts, $content) {
	extract(shortcode_atts( array(
		'text' => '',
		'title' => '',
		'button' => '',
		'url' => '',
		'img_src_type' => '',
		'imageexternal' => '',
		'imageurl' => '',
		'imagewidth' => '',
		'margintop' => '',
		'color' => 'white',
		'button_size' => 'small',
		'buttontarget' => ''
	), $atts));

	$output = '';

	$output .= '<div class="push_button"';
	if($margintop) {
		$output .= 'style="margin-top:'.$margintop.'px;" ';
	}
	$output .= '>';

	$output .= '<div class="container">';
	$output .= '<div class="row-fluid">';
	$output .= '<div class="span12">';

	if ($imageurl || $imageexternal) :
		if ($img_src_type != 'external') {
			$imageurl = wp_get_attachment_image_src($imageurl, 'large');
			$output .= '<div class="push_button_image" ';
			if($imagewidth) {
				$output .= 'style="width:'. $imagewidth .'px;" ';
			}
			$output .= '>';
				$output .= '<img src="'. strip_tags($imageurl[0]) .'" alt="';
				if ($title) {
					$output .= strip_tags($title);
				}
				$output .= '" />';
			$output .= '</div>';
		} else {
			$imageurl = $imageexternal;
			$output .= '<div class="push_button_image" ';
			if($imagewidth) {
				$output .= 'style="width:'. $imagewidth .'px;" ';
			}
			$output .= '>';
				$output .= '<img src="'. strip_tags($imageurl) .'" alt="';
				if ($title) {
					$output .= strip_tags($title);
				}
				$output .= '" />';
			$output .= '</div>';
		}
	endif;
	$content_margin = $imagewidth + 40;
	$output .= '<div class="push_button_content" ';
	if($imagewidth) {
		$align = (is_rtl()) ? 'right' : 'left';
		$output .= 'style="margin-'.$align.': '. strip_tags($content_margin).'px;"';
	}
	$output .= '>';


	if ($button && $url) :
					$output .=  '<div class="push_button_button for_desktop"><a ';
					if ($buttontarget == "blank") {
						$output .= ' target="_blank" ';
					}
					$output .= ' href=" '. strip_tags($url) .'" class="button '. $button_size .' '. $color .' ">'. strip_tags($button) .'</a></div>';
	endif;

	$output .=  '<div class="push_button_info">';
	  if ($title) :
			$output .=  '<h2>'. strip_tags($title) .'</h2>';
		endif;
	  if($text) :
			$output .= '<p>'. strip_tags($text) .'</p>';
		endif;
	$output .=  '</div>';

	if ($button && $url) :
		$output .=  '<div class="push_button_button for_mobile"><a ';
		if ($buttontarget == "blank") {
			$output .= 'target="_blank"';
		}
		$output .= ' href="'. strip_tags($url) .'" class="button '. $button_size .' '. $color .'">'. strip_tags($button) .'</a></div>';
	endif;

	$output .=  '</div>';
	$output .=  '</div>';
	$output .=  '</div>';
	$output .=  '</div>';
	$output .=  '</div>';


	return $output;
}

add_shortcode( 'bloglist', 'asalah_bloglist_shortcode' );
function asalah_bloglist_shortcode($atts, $content) {
	extract(shortcode_atts( array(
		'title' => '',
		'url' => '',
		'postnumber' => '',
		'tags_ids' => '',
		'readmore_pharse' => '',
		'cats' => '',
		'order' => '',
		'show_meta' => ''
	), $atts));

	$output = '';



	$output .= '<div class="row-fluid"><div class="span12">';
	if ($title) :
						$output .= '<h3 class="page-header">';
							if ($url) :
									$output .= '<a href="'. $url .'"><span class="page_header_title">'. strip_tags($title) .'</span></a>';
							else:
									$output .= '<span class="page_header_title">'. strip_tags($title) .'</span>';
							endif;
						$output .= '</h3>';
	endif;
	ob_start();
	asalah_blog_posts($postnumber, $tags_ids, $readmore_pharse, $cats, $order, $show_meta);
	$output .= ob_get_contents();
	ob_end_clean();
	$output .= '</div></div>';

	$output .= '';
	return $output;
}


add_shortcode( 'clear', 'asalah_clear_shortcode' );
function asalah_clear_shortcode($atts, $content) {
	extract(shortcode_atts( array(
		'horizontal_line' => 'none',
		'line_color' => '#353535',
		'pattern' => '1',
		'height' => ''
	), $atts));

	$output = '';

	switch($horizontal_line) {
		case 'none':
			break;
		case 'single':
			$output .= '<hr class="aq-block-clear aq-block-hr-single" style="background:'.$line_color.';"/>';
			break;
		case 'double':
			$output .= '<hr class="aq-block-clear aq-block-hr-double" style="background:'.$line_color.';"/>';
			$output .= '<hr class="aq-block-clear aq-block-hr-single" style="background:'.$line_color.';"/>';
			break;
		case 'image':
			$output .= '<hr class="aq-block-clear aq-block-hr-image cf"/>';
			break;
	}

	if($height) {
		$output .= '<div class="cf" style="height:'.$height.'px;"></div>';
	}

	$output .= '';
	return $output;
}


add_shortcode( 'pricingblock', 'asalah_pricingblock_shortcode' );
function asalah_pricingblock_shortcode($atts, $content) {
	extract(shortcode_atts(  array(
		'tableid' => '',
		'columns'	=> '',
		'title' => '',
	), $atts));

	$output = '';
	$columns = ($columns != '') ? $columns : 'one';

	$output .= '<div class="row-fluid">';
		$output .= '<div class="span12">';
				if ($title) :
					$output .= '<h3 class="page-header"><span class="page_header_title">'. strip_tags($title) .'</span></h3>';
				endif;
				$output .= do_shortcode('[pricing_table id="'.$tableid.'" column="'.$columns.'"]');
		$output .= '</div>';
	$output .= '</div>';

	$output .= '';
	return $output;
}


add_shortcode( 'revslider', 'asalah_revslider_shortcode' );
function asalah_revslider_shortcode($atts) {
	extract(shortcode_atts( array(
		'alias' => '',
	), $atts));

	$output = '';

	$output .= '<div class="row-fluid">';
		$output .= '<div class="span12">';
		ob_start();
		if (function_exists('putRevSlider')) {
			putRevSlider($alias);
		}
			$output .= ob_get_contents();
			ob_end_clean();
		$output .= '</div>';
	$output .= '</div>';

	$output .= '';
	return $output;
}



add_shortcode( 'asalah_richtext', 'asalah_richtext_shortcode' );
function asalah_richtext_shortcode($atts, $content) {
	extract(shortcode_atts( array(
		'title' => '',
		'disable_wpautop' => false
	), $atts));

	$output = '';

	if($title) $output .= '<h4 class="aq-block-title">'.strip_tags($title).'</h4>';
	if ($disable_wpautop) {
		$output .= do_shortcode(htmlspecialchars_decode($content));
	} else {
		$output .= wpautop(do_shortcode(htmlspecialchars_decode($content)));
	}

	$output .= '';
	return $output;
}



add_shortcode( 'widget', 'asalah_widget_shortcode' );
function asalah_widget_shortcode($atts, $content) {
	global $wp_registered_sidebars;
	$sidebar_options = array(); $default_sidebar = '';
	foreach ($wp_registered_sidebars as $registered_sidebar) {
		$default_sidebar = empty($default_sidebar) ? $registered_sidebar['id'] : $default_sidebar;
		$sidebar_options[$registered_sidebar['id']] = $registered_sidebar['name'];
	}

	extract(shortcode_atts( array(
		'sidebar' => $default_sidebar,
	), $atts));

	$output = '';

	ob_start();
  $output = '';
  dynamic_sidebar($sidebar);
  $output .= ob_get_contents();
  ob_end_clean();

	$output .= '';
	return $output;
}



add_shortcode( 'space', 'asalah_space_shortcode' );
function asalah_space_shortcode($atts, $content) {
	extract(shortcode_atts( array(), $atts));

	$output = '';

	$output .= '<div class="new_section" style="margin-top: 40px;"></div>';

	return $output;
}

add_shortcode( 'shadow_separator', 'asalah_shadow_separator_shortcode' );
function asalah_shadow_separator_shortcode($atts, $content) {
	extract(shortcode_atts( array(), $atts));

	$output = '';

	$output .= '<div class="new_section"><div class="shadow_separator"></div></div>';

	return $output;
}



add_shortcode( 'service', 'asalah_service_shortcode' );
function asalah_service_shortcode($atts, $content) {
	extract(shortcode_atts( array(
		'title' => '',
		'text' => '',
		'icon_family' => '',
		'icon_class' => '',
		'icon_class_fontello' => '',
		'icon_class_fontawesome' => '',
		'img_src_type' => '',
		'custom_image' => '',
		'custom_image_url' => '',
		'url' => '',
	), $atts));

	$output = '';

	$output .= '<div class="row-fluid">';
	$output .= '<div class="span12 service_item new_lifted">';

				if ($url) :
					$output .= '<a href="'. $url .'">';
				endif;

				if ($custom_image || $custom_image_url) :
					if ($img_src_type != 'external') {
						$custom_image = wp_get_attachment_image_src( $custom_image );
						$output .= '<div class="service_icon_image">';
						$output .= '<img src="'. $custom_image[0] .'" />';
						$output .= '</div>';
					} else {
						if ($custom_image_url) {
							$custom_image = esc_url($custom_image_url);
							$output .= '<div class="service_icon_image">';
							$output .= '<img src="'. $custom_image .'" />';
							$output .= '</div>';
						}
					}
				elseif($icon_class || ($icon_class_fontello || $icon_class_fontawesome)) :
				$output .= '<div class="service_icon hi-icon-wrap hi-icon-effect-3 hi-icon-effect-3a">';
				if ($icon_family && ($icon_class_fontello || $icon_class_fontawesome)) {
					if ($icon_family == 'fontawesome') {
						$output .= '<i class="'. $icon_class_fontawesome .' hi-icon"></i>';
					} else {
						$output .= '<a ';
						if ($url) {
							$output .= 'href="'. $url .'"';
						}
						$output .= ' class="'. $icon_class_fontello .' hi-icon"></a>';
					}
				} else {
					$output .= '<a ';
					if ($url) {
						$output .= 'href="'. $url .'"';
					}
					$output .= ' class="'. $icon_class .' hi-icon"></a>';
				}
				$output .=  '</div>';
				endif;

				if ($url) :
					$output .= '</a>';
				endif;

		$output .=  '<div class="services_info">';
		if ($url) :
			$output .= '<a href="'. $url .'">';
		endif;
		if ($title) :
			$output .=  '<h3>'. strip_tags($title) .'</h3>';
		endif;
		if ($url) :
			$output .= '</a>';
		endif;
		if($text) :
			$output .= '<p>'. wpautop(do_shortcode(htmlspecialchars_decode($text))) .'</p>';
		endif;
		$output .=  '</div>';
	$output .=  '</div>';
	$output .=  '</div>';

	$output .= '';
	return $output;
}



add_shortcode( 'progresscon', 'asalah_prog_con_shortcode' );
function asalah_prog_con_shortcode($atts, $content) {
	extract(shortcode_atts( array(
		'type'	=> 'basic',
		'title' => '',
	), $atts));

	$output = '';
	$GLOBALS['prog_bar_type'] = $type;

	$output .= '<div class="row-fluid"><div class="span12"><div class="new_content"><h3 class="page-header"><span class="page_header_title">'.$title.'</span></h3>';
	$output .= do_shortcode( $content );
	$output .= '</div></div></div>';
	$output .= '';
	return $output;
}

add_shortcode( 'teamblock', 'asalah_teamblock_shortcode' );
function asalah_teamblock_shortcode( $atts, $content)  {
	extract(shortcode_atts( array(
		'title' => '',
		'desc' => '',
		'url' => '',
		'postnumber' => '',
		'max' => '',
		'cycle' => '',
		'team_order' => '',
		'autoplay_car' => '',
		'link_member_page' => ''
	), $atts));

	$output = '';

	if (isset($link_member_page) && $link_member_page === 'yes') {
		$link_member_page = true;
	} else {
		$link_member_page = false;
	}

	$the_id = "aq-block-row" . random_id(5);

	$output .= '<div class="row-fluid">';
	$output .= '<div class="span12">';
	ob_start();
	asalah_team_carousel($the_id, $url, $postnumber, $title, $desc, $max, $cycle, $team_order, $autoplay_car, $link_member_page);
	$output .= ob_get_contents();
	ob_end_clean();
	$output .= '</div>';
	$output .= '</div>';

	$output .= '';
	return $output;
}


## Columns  -------------------------------------------------- #
function asalah_one_third( $atts, $content = null ) {
   return '<div class="one_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'asalah_one_third');

function asalah_one_third_last( $atts, $content = null ) {
   return '<div class="one_third last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_third_last', 'asalah_one_third_last');

function asalah_two_third( $atts, $content = null ) {
   return '<div class="two_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third', 'asalah_two_third');

function asalah_two_third_last( $atts, $content = null ) {
   return '<div class="two_third last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('two_third_last', 'asalah_two_third_last');

function asalah_one_half( $atts, $content = null ) {
   return '<div class="one_half">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'asalah_one_half');

function asalah_one_half_last( $atts, $content = null ) {
   return '<div class="one_half last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_half_last', 'asalah_one_half_last');

function asalah_one_fourth( $atts, $content = null ) {
   return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'asalah_one_fourth');

function asalah_one_fourth_last( $atts, $content = null ) {
   return '<div class="one_fourth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_fourth_last', 'asalah_one_fourth_last');

function asalah_three_fourth( $atts, $content = null ) {
   return '<div class="three_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourth', 'asalah_three_fourth');

function asalah_three_fourth_last( $atts, $content = null ) {
   return '<div class="three_fourth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('three_fourth_last', 'asalah_three_fourth_last');

function asalah_one_fifth( $atts, $content = null ) {
   return '<div class="one_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fifth', 'asalah_one_fifth');

function asalah_one_fifth_last( $atts, $content = null ) {
   return '<div class="one_fifth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_fifth_last', 'asalah_one_fifth_last');

function asalah_two_fifth( $atts, $content = null ) {
   return '<div class="two_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_fifth', 'asalah_two_fifth');

function asalah_two_fifth_last( $atts, $content = null ) {
   return '<div class="two_fifth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('two_fifth_last', 'asalah_two_fifth_last');

function asalah_three_fifth( $atts, $content = null ) {
   return '<div class="three_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fifth', 'asalah_three_fifth');

function asalah_three_fifth_last( $atts, $content = null ) {
   return '<div class="three_fifth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('three_fifth_last', 'asalah_three_fifth_last');

function asalah_four_fifth( $atts, $content = null ) {
   return '<div class="four_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('four_fifth', 'asalah_four_fifth');

function asalah_four_fifth_last( $atts, $content = null ) {
   return '<div class="four_fifth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('four_fifth_last', 'asalah_four_fifth_last');

function asalah_one_sixth( $atts, $content = null ) {
   return '<div class="one_sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_sixth', 'asalah_one_sixth');

function asalah_one_sixth_last( $atts, $content = null ) {
   return '<div class="one_sixth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_sixth_last', 'asalah_one_sixth_last');

function asalah_five_sixth( $atts, $content = null ) {
   return '<div class="five_sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('five_sixth', 'asalah_five_sixth');

function asalah_five_sixth_last( $atts, $content = null ) {
   return '<div class="five_sixth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('five_sixth_last', 'asalah_five_sixth_last');
?>