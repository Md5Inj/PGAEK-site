<?php

/**
* Plugin Name: PGEK graduates
* Plugin Name:       Pgek graduates
* Plugin URI:        /wp-content/plugins/pgek-graduates
* Description:       Frontend for graduates porfolio page
* Version:           1.0.0
* Requires at least: 5.2
* Requires PHP:      7.2
* Author:            Maxim Romashko
* Text Domain:       plugin-slug
* License:           GPL v2 or later
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
*/

Class PgekGraduates {

    /**
     * Function executes on plugin activate
     */
    public function activate_hook() {
        function createPage($title)
        {
            $wordpress_page = array(
                'post_title'    => $title,
                'post_content'  => '',
                'post_status'   => 'publish',
                'post_author'   => 1,
                'post_type' => 'page'
            );
            wp_insert_post( $wordpress_page );
        }

        createPage("Портфолио выпускников ПОИТ");
        createPage("Портфолио выпускников БУАиК");
        createPage("Портфолио выпускников правоведение");
        createPage("Портфолио выпускников ОДвЛ");
        createPage("Выбор специальности");
    }

    public function register_styles() {
        wp_register_style ( 'graduates_styles', plugins_url ( 'css/styles.css', __FILE__ ) );
        wp_register_style ( 'graduates_styles', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css');
        wp_enqueue_style('graduates_styles');
    }
}

register_activation_hook( __FILE__, array('PgekGraduates', 'activate_hook' ));
add_action( 'wp_enqueue_scripts', array('PgekGraduates', 'register_styles' ));