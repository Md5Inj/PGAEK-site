<?php
/**
 * Plugin Name: WP Statistics
 * Plugin URI: https://wp-statistics.com/
 * Description: Complete WordPress Analytics and Statistics for your site!
 * Version: 12.6.13
 * Author: VeronaLabs
 * Author URI: http://veronalabs.com/
 * Text Domain: wp-statistics
 * Domain Path: languages
 */

define( 'WP_STATISTICS_MAIN_FILE', __FILE__ );
require_once plugin_dir_path( __FILE__ ) . 'includes/classes/class-wp-statistics.php';

function wp_stat_init() {
    if (current_user_can('view_statistics'))
    {
        $WP_Statistics = new WP_Statistics;
        $WP_Statistics->run();
    }
}

add_action('init', 'wp_stat_init');