<?php
/** A simple text block **/
class AQ_service_Block extends AQ_Block {

	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Service',
			'size' => 'span3',
		);

		//create the block
		parent::__construct('AQ_service_Block', $block_options);
	}

	function form($instance) {

		$defaults = array(
			'title' => '',
			'text' => '',
			'icon_class' => '',
			'custom_image' => '',
			'url' => '',
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);

		?>
		<p class="description">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Title (optional)
				<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
			</label>
		</p>

		<p class="description">
			<label for="<?php echo $this->get_field_id('text') ?>">
				Content
				<?php echo aq_field_textarea('text', $block_id, $text, $size = 'full') ?>
			</label>
		</p>
		<p class="description">
			<label for="<?php echo $this->get_field_id('icon_class') ?>">
                            Icon Class (Fontello Icon Class to add icon go to <a target='_blank' href="http://www.fontello.com/">Fontello</a>, choose your icon, hover on it to see it's name then write icon-name in this field for example: icon-search)
				<?php echo aq_field_input('icon_class', $block_id, $icon_class, $size = 'full') ?>
			</label>
		</p>
		<p class="description">
			<label for="<?php echo $this->get_field_id('custom_image') ?>">
				Custom Image Url (Put the url of your custom photo to use instead of Fontello icon.)
				<?php echo aq_field_upload('custom_image', $block_id, $custom_image, $size = 'full') ?>
			</label>
		</p>
		<p class="description">
			<label for="<?php echo $this->get_field_id('url') ?>">
				URL
				<?php echo aq_field_input('url', $block_id, $url, $size = 'full') ?>
			</label>
		</p>

		<?php
	}

	function block($instance) {
		extract($instance);
		?>
		<div class="row-fluid">
		<div class="span12 service_item new_lifted">

        	<?php if ($url) : ?><a href="<?php echo $url; ?>"><?php endif; ?>

                <?php if ($custom_image) : ?>
                <div class="service_icon_image">
                <img src="<?php echo $custom_image; ?>" />
                </div>
                <?php elseif($icon_class) : ?>
                <div class="service_icon hi-icon-wrap hi-icon-effect-3 hi-icon-effect-3a">
                <a <?php if ($url) { ?>href="<?php echo $url; ?>"<?php } ?> class="<?php echo $icon_class; ?> hi-icon"></a>
                </div>
                <?php endif; ?>

            <?php if ($url) : ?></a><?php endif; ?>

			<div class="services_info">
			<?php if ($url) : ?><a href="<?php echo $url; ?>"><?php endif; ?>
			<?php if ($title) : ?><h3><?php echo strip_tags($title); ?></h3><?php endif; ?>
			<?php if ($url) : ?></a><?php endif; ?>
			<?php if($text) : ?><p><?php echo wpautop(do_shortcode(htmlspecialchars_decode($text))); ?></p><?php endif; ?>
			</div>
		</div>
		</div>
		<?php
	}

}