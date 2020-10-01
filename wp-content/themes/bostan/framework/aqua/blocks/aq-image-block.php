<?php

/** A simple text block * */
class AQ_Image_Block extends AQ_Block {

    //set and create block
    function __construct() {
        $block_options = array(
            'name' => 'Image',
            'size' => 'span12',
        );

        //create the block
        parent::__construct('AQ_Image_Block', $block_options);
    }

    function form($instance) {

        $defaults = array(
            'image' => '',
            'thewidth' => ''
        );
        $instance = wp_parse_args($instance, $defaults);
        extract($instance);
        $widthes = array(
            'container' => 'Container',
            'fluid' => 'Fluid',
        );

        $image_aligns = array(
            'none' => 'None',
            'left' => 'Left',
            'right' => 'Right',
            'center' => 'Center'
        );

        $targets = array(
            '_self' => 'Same Page',
            '_black' => 'New Tab'
        );
        ?>

        <p class="description">
            <label for="<?php echo $this->get_field_id('title') ?>">
                Title (optional)
        <?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
            </label>
        </p>

        <p class="description">
            <label for="<?php echo $this->get_field_id('url') ?>">
                Image URL
        <?php echo aq_field_upload('url', $block_id, $url, $size = 'full') ?>
            </label>
        </p>

        <p class="description">
            <label for="<?php echo $this->get_field_id('target_url') ?>">
                Target URL
        <?php echo aq_field_input('target_url', $block_id, $target_url, $size = 'full') ?>
            </label>
        </p>

        <p class="description">
            <label for="<?php echo $this->get_field_id('target') ?>">
                Open In<br/>
        <?php echo aq_field_select('target', $block_id, $targets, $target) ?>
            </label>
        </p>

        <p class="description">
            <label for="<?php echo $this->get_field_id('align') ?>">
                Align<br/>
        <?php echo aq_field_select('align', $block_id, $image_aligns, $align) ?>
            </label>
        </p>

        <?php
    }

    function block($instance) {
        extract($instance);

        if ($title)
            echo '<h3 class="page-header"><span class="page_header_title">' . do_shortcode(htmlspecialchars_decode($title)) . '</span></h3>';
            if ($target_url) {
            	echo '<a href="'.$target_url.'" target="'.$target.'">';
            }
        echo "<img src='" . $url . "' class='align".$align."' />";
        if ($target_url) {
        	echo '</a>';
        }
    }

}