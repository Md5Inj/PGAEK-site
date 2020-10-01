<?php
$googlefonts = array();
$googlefontssubsets = array();

function style_options() {
	global $asalah_data, $googlefonts, $googlefontssubsets;
	$output = '';

	// functions.options
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


	$fontsclasses = array(
	"body" => "Main Font",
	"h1,h2,h3,h4,h5,h6, .logo, .below_header .navbar .nav > .active > a, .below_header .navbar .nav > .active > a:hover, .below_header .navbar .nav > .active > a:focus, .below_header .navbar .nav > li > a, .testimonial_box, .plan_title, .plan_price" => "Titles Font"
	);

	$colorclasses = array(
	"body" =>"Body",
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

	$bgclasses = array( // themes-style
	"html" =>"HTML (All Site Background)",
	"body" =>"Body",
	".below_header" => "Header",
	".site_footer" => "Footer",
	".site_middle_content" => "Site Content",
	".page_title_holder" => "Page Title Holder"
);

	if (intval(asalah_cross_option('asalah_builder_top_space')) != '') {
		$output .= '.main_content.page_builder_content .blog_post > .new_section:first-child, .main_content.page_builder_content .blog_post .aq-template-wrapper > .new_section:first-child { margin-top:'.intval(asalah_cross_option('asalah_builder_top_space')).'px;}';
	} else {
		$output .= '.main_content.page_builder_content .blog_post > .new_section:first-child, .main_content.page_builder_content .blog_post .aq-template-wrapper > .new_section:first-child  { margin-top:0;}';
	}

	if (asalah_cross_option('asalah_hide_prettophoto_social') == true) {
		$output .= ".pp_social {display: none;}";
	}


	if ($asalah_data["asalah_skin_color"]) {

		$output .= ".main_content aside .widget_nav_menu ul > li.current_page_item {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= ".btn-3:active {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= ".btn-3:hover {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= ".btn-3 {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= ".progress-striped .bar {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= ".portfolio_thumbnail .center-bar a {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= ".gototop {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= ".plan_buy a {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= "input[type='submit'] {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= ".cars_nav_control:hover {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= ".cars_arrow_control:hover {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= ".navbar .nav>.active>a:focus {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= ".navbar .nav>.active>a:hover {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= ".navbar .nav>.active>a {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= "::-webkit-scrollbar-thumb {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= ".plan_title.recommended_plan_title {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= ".tweets_ticker_section {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= ".input-prepend .add-on {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= ".add-on {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= ".input-append {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= ".text_banner {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= ".blog_month {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= ".blog_type {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= ".slider_caption p {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= ".blog_format {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= ".top_header_tools_holder, .top_header .top_header_tools_holder, .search_bar_mobile .search#searchform button {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= ".hi-icon-effect-3 .hi-icon:after {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= ".push_button, .sk-folding-cube .sk-cube:before {";
			$output .= "background-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";

		$output .= ".contact_info_line, .input-append .add-on, .input-prepend .add-on, .site_footer .search_text, .portfolio_thumbnail .center-bar a, .widget_container .page_header_title, .site_footer .widget_container .page_header_title, .blog_box_item.post_type_box_item, .clients_list > li a:hover  {";
			$output .= "border-color: " . $asalah_data["asalah_skin_color"] . "!important;";
		$output .= "}";

		$output .= "a, .slider_caption h2, .dropdown-menu li>a:hover, .dropdown-menu li>a:focus, .dropdown-submenu:hover>a, .post-tooltip, .clients_list .post-tooltip, .accordion-heading a, .accordion-heading a, .plan_price, a.comment-reply-link, .cars_portfolio_control, .service_icon i, .main_navbar.navbar .nav>li:hover .menu_icon, .service_icon a, .hi-icon, .no-touch .hi-icon-effect-3a .hi-icon:hover, .blog_box_item.post_type_box_item, .divider_icon, .asalah_list li::before, .vertical_tab .nav-tabs > .active > a, .vertical_tab .nav-tabs > .active > a:hover, .vertical_tab .nav-tabs > .active > a:focus, .vertical_tab .nav-tabs > li > a:hover, .horizontal_tab .nav-tabs > .active > a, .horizontal_tab .nav-tabs > .active > a:hover, .horizontal_tab .nav-tabs > .active > a:focus, .horizontal_tab .nav-tabs > li > a:hover, .widget_container > ul > li > a:hover, .widget_container .menu > li > a:hover {";
			$output .= "color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "} ";

		$output .= ".hi-icon-effect-3 .hi-icon {";
			$output .= "box-shadow: 0 0 0 4px " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "} ";

		$output .= ".blog_thumbnail img, .dropdown-menu, .page_header_title, .page-header a, .navbar .nav li.dropdown>.dropdown-toggle .caret, .portfolio_item:hover .portfolio_info, .single-project .portfolio_section_title .page_header_title {";
			$output .= "border-bottom-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "} ";

		$output .= ".navbar .nav li.dropdown>.dropdown-toggle .caret, .horizontal_tab .nav-tabs > .active > a, .horizontal_tab .nav-tabs > .active > a:hover, .horizontal_tab .nav-tabs > .active > a:focus, .horizontal_tab .nav-tabs > li > a:hover {";
			$output .= "border-top-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "} ";

		$output .= ".vertical_tab .nav-tabs > .active > a, .vertical_tab .nav-tabs > .active > a:hover, .vertical_tab .nav-tabs > .active > a:focus, .vertical_tab .nav-tabs > li > a:hover {";
			$output .= "border-left-color: " . $asalah_data["asalah_skin_color"] . ";";
		$output .= "}";
	}



	foreach ($colorclasses as $class => $title) {
		$id = str_replace(' ', '', $class);
		$id = str_replace('.', '^', $id);
		$id = str_replace('[', '%', $id);
		$id = str_replace(']', '%', $id);
		$id = str_replace("'", '!', $id);
		$id = "asalah_bgcolor_" . $id;

		if ($title == "Links Hover/Active") {
			if (isset($asalah_data[$id]) && ($asalah_data[$id] != '')) {
			$output .= " a:hover, a:active, a.button:hover, .dropdown-menu li>a:hover, .dropdown-menu li>a:focus, .dropdown-submenu:hover>a, .widget_container > ul > li > a:hover {";

					if ($asalah_data[$id]):
					$output .= "color:" . $asalah_data[$id] . ";" ;
					endif;

			$output .= "} ";
			}
		} else {
			if ($asalah_data[$id]) {

			$output .= $class . "{";

					if ($asalah_data[$id]):
					$output .= "background-color:" . $asalah_data[$id] . ";" ;
					endif;

			$output .= "} ";
			}
		}
	}


	foreach ($bgclasses as $class => $title) {
		$id = str_replace(' ', '', $class);
		$id = str_replace('.', '^', $id);
		$id = str_replace('[', '%', $id);
		$id = str_replace(']', '%', $id);
		$id = str_replace("'", '!', $id);
		$id = "asalah_customebg_" . $id;
		if (isset($asalah_data[$id]) && $asalah_data[$id]) {
		$output .= $class . "{";

				if ($asalah_data[$id]):
					$output .= "background-image: url('" . $asalah_data[$id] . "');" ;

					$idrepeat = $id . '_repeat';
					$idfixed = $id . '_is_fixed';
					if (isset($asalah_data[$idfixed]) && ($asalah_data[$idfixed])) {
						$output .= "background-attachment: fixed;" ;
						$output .= "background-size: cover;" ;
					}elseif (isset($asalah_data[$idrepeat]) && ($asalah_data[$idrepeat])) {
						$output .= "background-repeat: " . $asalah_data[$idrepeat] . ";" ;
					}
				endif;

		$output .= "} ";
		}
	}

	foreach ($typographyclasses as $class => $title) {
		$id = str_replace(' ', '', $class);
		$id = str_replace('.', '^', $id);
		$id = str_replace('[', '%', $id);
		$id = str_replace(']', '%', $id);
		$id = str_replace("'", '!', $id);
		$id = "asalah_typo_" . $id;
		if (isset($asalah_data[$id])) {
			if ($asalah_data[$id]["size"] || $asalah_data[$id]["height"] || $asalah_data[$id]["style"] || $asalah_data[$id]["color"]) {

			$output .= $class . "{";

					if ($asalah_data[$id]["size"] && $asalah_data[$id]["size"] != 0):
					$output .= "font-size:" . $asalah_data[$id]["size"] . ";" ;
					endif;

					if ($asalah_data[$id]["height"] && $asalah_data[$id]["height"] != 0):
					$output .= "line-height:" . $asalah_data[$id]["height"] . ";" ;
					endif;

					if ($asalah_data[$id]["style"]):
					$output .= "font-weight:" . $asalah_data[$id]["style"] . ";" ;
					endif;

					if ($asalah_data[$id]["color"] != ''):
					$output .= "color:" . $asalah_data[$id]["color"] . ";" ;
					endif;

			$output .= "} ";
			}
		}
	}

	foreach ($typographyclasses as $class => $title) {
		$id = str_replace(' ', '', $class);
		$id = str_replace('.', '^', $id);
		$id = str_replace('[', '%', $id);
		$id = str_replace(']', '%', $id);
		$id = str_replace("'", '!', $id);
		$id = "asalah_typo_" . $id;
		}


	foreach ($fontsclasses as $class => $title) {
		$id = str_replace(' ', '', $class);
		$id = str_replace('.', '~', $id);
		$id = str_replace(',', '*', $id);
		$id = str_replace('[', '%', $id);
		$id = str_replace(']', '%', $id);
		$id = str_replace("'", '!', $id);
		$id = "asalah_gfonts_" . $id;

		if ($asalah_data[$id] && $asalah_data[$id] != 'none') {
		$output .= $class . "{";

				if ($asalah_data[$id]):
					if (!in_array($asalah_data[$id], $googlefonts)) {
						$googlefonts[] = $asalah_data[$id];
					}
					if ($asalah_data[$id.'_subset']) {
						$googlefontssubsets[$asalah_data[$id]] = $asalah_data[$id.'_subset'];
					}
					$thefont = str_replace('+', ' ', $asalah_data[$id]);
				$output .= "font-family:" . $thefont . ";" ;
				endif;

		$output .= "} ";
		}
	}

	if ($asalah_data["asalah_enable_html_background"] && $asalah_data["asalah_html_custom_bg"]) {
		$output .= "html {";
			$output .= "background-image: url('" . $asalah_data["asalah_html_custom_bg"] . "');";
		$output .= "}";
	}

	if ($asalah_data["asalah_enable_bg_background"] && $asalah_data["asalah_body_custom_bg"]) {
		$output .= "body {";
			$output .= "background-image: url('" . $asalah_data["asalah_body_custom_bg"] . "');";
		$output .= "}";
	}
	if ($asalah_data["asalah_logo_margin"]) {
		$output .= ".logo {";
			$output .= "margin-top:" . $asalah_data["asalah_logo_margin"] . "px;";
		$output .= "}";
	}

	if ($asalah_data["asalah_menu_margin"]) {
		$output .= ".main_navbar {";
			$output .= "margin-top:" . $asalah_data["asalah_menu_margin"] . "px;";
		$output .= "}";
	}

	if ( isset($asalah_data["asalah_pageholder_color"]) && $asalah_data["asalah_pageholder_color"] == 'black') {

		$output .= ".page_title_holder h1 {
					color:#222;
					}
					.page_title_holder a{
					color:#222;
					}
					.page_title_holder{
					color:#222;
					}";
	}elseif( isset($asalah_data["asalah_pageholder_color"]) && $asalah_data["asalah_pageholder_color"] == 'white') {
		$output .= ".page_title_holder h1 {
					color:#fff;
					}
					.page_title_holder a{
					color:#fff;
					}
					.page_title_holder{
					color:#fff;
					}";
	}

	if ($asalah_data['asalah_logo_url_h'] || $asalah_data['asalah_logo_url_w']) {
		$output .= ".logo img {";
			if ($asalah_data['asalah_logo_url_w']) {
				$output .= "width:" . $asalah_data["asalah_logo_url_w"] . "px;";
			}

			if ($asalah_data['asalah_logo_url_h']) {
				$output .= "height:" . $asalah_data["asalah_logo_url_h"] . "px;";
			}

		$output .= "}";
	}

	if (isset($asalah_data['asalah_1200_layout']) && $asalah_data['asalah_1200_layout']) {
		$output .= ".shadow_separator {
					background-image:url(".get_template_directory_uri()."/img/bottom_shadow1200.png);
					}";

		$output .= ".header_shadow_separator {
					background-image:url(".get_template_directory_uri()."/img/bottom_shadow1200.png);
					}";
	}

	if (isset($asalah_data['asalah_disable_prettophoto']) && ($asalah_data['asalah_disable_prettophoto'])) {
		$output .= ".portfolio_thumbnail .center-bar .prettyPhotolink { display: none;}";
	}



	if (isset($output)) {
	return $output;
	}
}



add_action('wp_enqueue_scripts', 'asalah_enqueue_custom_google_font');
function asalah_enqueue_custom_google_font () {
	style_options();
	global $googlefonts, $googlefontssubsets;
	foreach ($googlefonts as $fontname) {
		$fontname = str_replace(' ', '+', $fontname);
		$subset = '';
		if (is_array($googlefontssubsets[$fontname])) {
			foreach ($googlefontssubsets[$fontname] as $value) {
				if ($subset != '') {
					$subset .= ',';
				}
				$subset .= $value;
			}
		}
		$protocol = is_ssl() ? 'https' : 'http';
    $query_args = array(
        'family' => $fontname.':400,100,200,300,500,600,700,800,900',
        'subset' => $subset,
    );

    wp_enqueue_style($fontname,
        add_query_arg($query_args, "$protocol://fonts.googleapis.com/css" ),
        array(), null);
	}
}

function asalah_attach_style_to_header() {
	global $asalah_data;
	echo '<style>';
	echo style_options();
	if ($asalah_data['asalah_custom_css']):
		echo $asalah_data['asalah_custom_css'];
	endif;
	echo '</style>';
}
add_action('wp_head', 'asalah_attach_style_to_header', 30);
?>