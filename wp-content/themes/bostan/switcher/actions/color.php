<?php


function asalah_switcher_hex_shift($supplied_hex, $shift_method, $percentage = 50) {
    $shifted_hex_value = null;
    $valid_shift_option = false;
    $current_set = 1;
    $RGB_values = array();
    $valid_shift_up_args = array('up', '+', 'lighter', '>');
    $valid_shift_down_args = array('down', '-', 'darker', '<');
    $shift_method = strtolower(trim($shift_method));
    // Check Factor
    if (!is_numeric($percentage) || ( $percentage = (int) $percentage ) < 0 || $percentage > 100
    )
        trigger_error("Invalid factor", E_USER_NOTICE);
    // Check shift method
    foreach (array($valid_shift_down_args, $valid_shift_up_args) as $options) {
        foreach ($options as $method) {
            if ($method == $shift_method) {
                $valid_shift_option = !$valid_shift_option;
                $shift_method = ( $current_set === 1 ) ? '+' : '-';
                break 2;
            }
        }
        ++$current_set;
    }
    if (!$valid_shift_option)
        trigger_error("Invalid shift method", E_USER_NOTICE);
    // Check Hex string
    switch (strlen($supplied_hex = ( str_replace('#', '', trim($supplied_hex)) ))) {
        case 3:
            if (preg_match('/^([0-9a-f])([0-9a-f])([0-9a-f])/i', $supplied_hex)) {
                $supplied_hex = preg_replace('/^([0-9a-f])([0-9a-f])([0-9a-f])/i', '\\1\\1\\2\\2\\3\\3', $supplied_hex);
            } else {
                trigger_error("Invalid hex color value", E_USER_NOTICE);
            }
            break;
        case 6:
            if (!preg_match('/^[0-9a-f]{2}[0-9a-f]{2}[0-9a-f]{2}$/i', $supplied_hex)) {
                trigger_error("Invalid hex color value", E_USER_NOTICE);
            }
            break;
        default:
            trigger_error("Invalid hex color length", E_USER_NOTICE);
    }
    // Start shifting
    $RGB_values['R'] = hexdec($supplied_hex{0} . $supplied_hex{1});
    $RGB_values['G'] = hexdec($supplied_hex{2} . $supplied_hex{3});
    $RGB_values['B'] = hexdec($supplied_hex{4} . $supplied_hex{5});
    foreach ($RGB_values as $c => $v) {
        switch ($shift_method) {
            case '-':
                $amount = round(( ( 255 - $v ) / 100 ) * $percentage) + $v;
                break;
            case '+':
                $amount = $v - round(( $v / 100 ) * $percentage);
                break;
            default:
                trigger_error("Oops. Unexpected shift method", E_USER_NOTICE);
        }
        $shifted_hex_value .= $current_value = ( strlen($decimal_to_hex = dechex($amount)) < 2 ) ?
                '0' . $decimal_to_hex : $decimal_to_hex;
    }
    return '#' . $shifted_hex_value;
}


$the_new_color = $_POST['color'];



        $color = '#' . $the_new_color;
        /* generate darker and and lighter color from the current skin color */
        $lighter_color = asalah_switcher_hex_shift($color, "lighter", 30);
        $darker_color = asalah_switcher_hex_shift($color, "darker", 30);
        $extra_lighter_color = asalah_switcher_hex_shift($color, "lighter", 50);
        $extra_darker_color = asalah_switcher_hex_shift($color, "darker", 50);


        
                                  	$output .= ".main_content aside .widget_nav_menu ul > li.current_page_item {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                 	                 	$output .= ".btn-3:active {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                 	                 	$output .= ".btn-3:hover {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                 	                 	$output .= ".btn-3 {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                 	                 	$output .= ".progress-striped .bar {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                 	                 	$output .= ".portfolio_thumbnail .center-bar a {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                 	                 	$output .= ".gototop {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                 	                 	$output .= ".plan_buy a {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                 	                 	$output .= "input[type='submit'] {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                 	                 	$output .= ".cars_nav_control:hover {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                 	                 	$output .= ".cars_arrow_control:hover {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                 	                 	$output .= ".navbar .nav>.active>a:focus {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                 	                 	$output .= ".navbar .nav>.active>a:hover {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                 	                 	$output .= ".navbar .nav>.active>a {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                 	                 	$output .= "::-webkit-scrollbar-thumb {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                 	                 	$output .= ".plan_title.recommended_plan_title {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                 	                 	$output .= ".tweets_ticker_section {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                 	                 	$output .= ".input-prepend .add-on {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                 	                 	$output .= ".add-on {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                 	                 	$output .= ".input-append {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                 	                 	$output .= ".text_banner {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                 	                 	$output .= ".blog_month {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                 	                 	$output .= ".blog_type {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                 	                 	$output .= ".slider_caption p {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                 	                 	$output .= ".blog_format {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                 	                 	$output .= ".top_header_tools_holder {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                 	                 	$output .= ".hi-icon-effect-3 .hi-icon:after {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                 	                 	$output .= ".push_button {";                 		$output .= "background-color: " . $color . ";";                 	$output .= "}";                                  	$output .= ".contact_info_line, .input-append .add-on, .input-prepend .add-on, .portfolio_thumbnail .center-bar a, .widget_container .page_header_title, .site_footer .widget_container .page_header_title, .blog_box_item.post_type_box_item  {";                 		$output .= "border-color: " . $color . "!important;";                 	$output .= "}";                 	                 	$output .= "a, .slider_caption h2, .dropdown-menu li>a:hover, .dropdown-menu li>a:focus, .dropdown-submenu:hover>a, .post-tooltip, .clients_list .post-tooltip, .plan_price, a.comment-reply-link, .cars_portfolio_control, .service_icon i, .main_navbar.navbar .nav>li:hover .menu_icon, .service_icon a, .hi-icon, .no-touch .hi-icon-effect-3a .hi-icon:hover, .blog_box_item.post_type_box_item, .divider_icon, .icon, .asalah_list li::before {";                 		$output .= "color: " . $color . ";";                 	$output .= "} ";                 	                 	$output .= ".hi-icon-effect-3 .hi-icon {";                 		$output .= "box-shadow: 0 0 0 4px " . $color . ";";                 	$output .= "} ";                 	                 	$output .= ".blog_thumbnail img, .dropdown-menu, .page_header_title, .page-header a, .navbar .nav li.dropdown>.dropdown-toggle .caret, .portfolio_item:hover .portfolio_info {";                 		$output .= "border-bottom-color: " . $color . ";";                 	$output .= "} ";                 	                 	$output .= ".navbar .nav li.dropdown>.dropdown-toggle .caret {";                 		$output .= "border-top-color: " . $color . ";";                 	$output .= "} ";	
                         
                                     
    
    
echo '<style>' . $output . '</style>';
?>

