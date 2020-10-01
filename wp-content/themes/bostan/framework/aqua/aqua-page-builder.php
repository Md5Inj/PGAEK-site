<?php
/** بسم الله الرحمن الرحيم **
 *
 * Plugin Name: Aqua Page Builder
 * Plugin URI: http://aquagraphite.com/page-builder
 * Description: Fast, lightweight and intuitive drag-and-drop page builder.
 * Version: 1.1.4
 * Author: Syamil MJ
 * Author URI: http://aquagraphite.com
 * Domain Path: /languages/
 * Text Domain: aqpb-l10n
 *
 */

/**
 * Copyright (c) 2014 Syamil MJ. All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * **********************************************************************
 */

//definitions
if(!defined('AQPB_PATH')) define( 'AQPB_PATH', get_template_directory() . '/framework/aqua/' );
if(!defined('AQPB_DIR')) define( 'AQPB_DIR', get_template_directory_uri() . '/framework/aqua/' );

function aqpb_get_version() {
	$plugin_data = get_plugin_data(__FILE__);
	$version     = $plugin_data['Version'];
	return $version;
}

function aqpb_localisation() {
	load_plugin_textdomain( 'aqpb-i10n', FALSE, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action('init', 'aqpb_localisation');

//required functions & classes
require_once(AQPB_PATH . 'functions/aqpb_config.php');
require_once(AQPB_PATH . 'functions/aqpb_blocks.php');
require_once(AQPB_PATH . 'classes/class-aq-page-builder.php');
require_once(AQPB_PATH . 'classes/class-aq-block.php');
//require_once(AQPB_PATH . 'classes/class-aq-plugin-updater.php');
require_once(AQPB_PATH . 'functions/aqpb_functions.php');

//some default blocks
require_once(AQPB_PATH . 'blocks/aq-text-block.php');
// require_once(AQPB_PATH . 'blocks/aq-richtext-block.php');
require_once(AQPB_PATH . 'blocks/aq-sep-block.php');
require_once(AQPB_PATH . 'blocks/aq-postcarousel-block.php');
require_once(AQPB_PATH . 'blocks/aq-team-block.php');
require_once(AQPB_PATH . 'blocks/aq-testicarousel-block.php');
require_once(AQPB_PATH . 'blocks/aq-bloglist-block.php');
require_once(AQPB_PATH . 'blocks/aq-clients-block.php');
require_once(AQPB_PATH . 'blocks/aq-service-block.php');
require_once(AQPB_PATH . 'blocks/aq-action-block.php');
require_once(AQPB_PATH . 'blocks/aq-map-block.php');
require_once(AQPB_PATH . 'blocks/aq-video-block.php');
// require_once(AQPB_PATH . 'blocks/aq-clear-block.php');
require_once(AQPB_PATH . 'blocks/aq-widgets-block.php');
require_once(AQPB_PATH . 'blocks/aq-space-block.php');
require_once(AQPB_PATH . 'blocks/aq-alert-block.php');
require_once(AQPB_PATH . 'blocks/aq-tabs-block.php');
require_once(AQPB_PATH . 'blocks/aq-prog-block.php');
require_once(AQPB_PATH . 'blocks/aq-revslider-block.php');
require_once(AQPB_PATH . 'blocks/aq-pricing-block.php');
require_once(AQPB_PATH . 'blocks/aq-image-block.php');
//require_once(AQPB_PATH . 'blocks/aq-richtext-block.php'); //buggy

//register default blocks
aq_register_block('AQ_Text_Block');
aq_register_block('AQ_Image_Block');
// aq_register_block('AQ_Richtext_Block');
aq_register_block('AQ_service_Block');
aq_register_block('AQ_Postcars_Block');
aq_register_block('AQ_team_Block');
aq_register_block('AQ_testicar_Block');
aq_register_block('AQ_bloglist_Block');
aq_register_block('AQ_clients_Block');
aq_register_block('AQ_action_Block');
aq_register_block('AQ_map_Block');
aq_register_block('AQ_video_Block');
// aq_register_block('AQ_Clear_Block');
aq_register_block('AQ_Space_Block');
aq_register_block('AQ_Widgets_Block');
aq_register_block('AQ_Alert_Block');
aq_register_block('AQ_Tabs_Block');
aq_register_block('AQ_prog_Block');
aq_register_block('AQ_Rev_Block');
aq_register_block('AQ_sep_Block');
aq_register_block('AQ_Pricing_Block');

//fire up page builder
$aqpb_config = aq_page_builder_config();
$aq_page_builder = new AQ_Page_Builder($aqpb_config);
if(!is_network_admin()) $aq_page_builder->init();
