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
        wp_enqueue_style('graduates_styles');
    }
}

register_activation_hook( __FILE__, array('PgekGraduates', 'activate_hook' ));
add_action( 'wp_enqueue_scripts', array('PgekGraduates', 'register_styles' ));

class PageTemplater {

    /**
     * A reference to an instance of this class.
     */
    private static $instance;

    /**
     * The array of templates that this plugin tracks.
     */
    protected $templates;

    /**
     * Returns an instance of this class.
     */
    public static function get_instance() {

        if ( null == self::$instance ) {
            self::$instance = new PageTemplater();
        }

        return self::$instance;

    }

    /**
     * Initializes the plugin by setting filters and administration functions.
     */
    private function __construct() {

        $this->templates = array();
        if ( version_compare( floatval( get_bloginfo( 'version' ) ), '4.7', '<' ) ) {
            add_filter(
                'page_attributes_dropdown_pages_args',
                array( $this, 'register_project_templates' )
            );

        } else {
            add_filter(
                'theme_page_templates', array( $this, 'add_new_template' )
            );

        }
        add_filter(
            'wp_insert_post_data',
            array( $this, 'register_project_templates' )
        );
        add_filter(
            'template_include',
            array( $this, 'view_project_template')
        );
        $this->templates = array(
            'graduate_speciality.php' => 'Специальность выпускника',
        );

    }

    public function add_new_template( $posts_templates ) {
        $posts_templates = array_merge( $posts_templates, $this->templates );
        return $posts_templates;
    }

    public function register_project_templates( $atts ) {
        $cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

        $templates = wp_get_theme()->get_page_templates();
        if ( empty( $templates ) ) {
            $templates = array();
        }

        wp_cache_delete( $cache_key , 'themes');

        $templates = array_merge( $templates, $this->templates );

        wp_cache_add( $cache_key, $templates, 'themes', 1800 );

        return $atts;

    }

    public function view_project_template( $template ) {
        global $post;

        if ( ! $post ) {
            return $template;
        }

        if ( ! isset( $this->templates[get_post_meta(
                $post->ID, '_wp_page_template', true
            )] ) ) {
            return $template;
        }

        $file = plugin_dir_path( __FILE__ ). get_post_meta(
                $post->ID, '_wp_page_template', true
            );

        if ( file_exists( $file ) ) {
            return $file;
        } else {
            echo $file;
        }

        return $template;

    }

}
add_action( 'plugins_loaded', array( 'PageTemplater', 'get_instance' ) );