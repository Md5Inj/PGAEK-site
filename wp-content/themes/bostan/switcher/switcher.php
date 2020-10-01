<?php 

    add_action('wp_enqueue_scripts', 'asalah_switcher_script', 40);

function asalah_switcher_script() {
    global $asalah_data;
    ## Register All Scripts
    wp_register_script('asalah_switcher', get_template_directory_uri() . '/switcher/switcher.js', array('jquery'), '2.6');
    wp_register_script('asalah_switcher_colorpicker', get_template_directory_uri() . '/switcher/colorpicker/js/color-picker.min.js', array('jquery'));
    ## Get Global Scripts
    wp_enqueue_script('asalah_switcher_colorpicker');
    wp_enqueue_script('asalah_switcher');

    
    wp_register_style('asalah_switcher_css', get_template_directory_uri().'/switcher/switcher.css', array(), '', 'all' );


    wp_register_style('asalah_switcher_css_picker', get_template_directory_uri().'/switcher/colorpicker/css/colorpicker.css', array(), '', 'all' );


    ## Get Global css
    wp_enqueue_style('asalah_switcher_css');
    ## Get Global css
    wp_enqueue_style('asalah_switcher_css_picker');
    
    
}
?>