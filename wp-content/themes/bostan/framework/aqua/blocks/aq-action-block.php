<?php
/** A simple text block **/
class AQ_action_Block extends AQ_Block {

	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Action Button',
			'size' => 'span12',
		);

		//create the block
		parent::__construct('AQ_action_Block', $block_options);
	}

	function form($instance) {

		$defaults = array(
			'text' => '',
			'title' => '',
			'button' => '',
			'url' => '',
			'imageurl' => '',
			'imagewidth' => '',
			'margintop' => '',
			'color' => 'white',
			'button_size' => 'medium',
			'thewidth' => '',
			'buttontarget' => ''
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		$widthes = array(
				'container' => 'Container',
				'fluid' => 'Fluid',
			);
		?>
		<p class="description the_width_field">
			<label for="<?php echo $this->get_field_id('thewidth') ?>">
				Width<br/>
				<?php echo aq_field_select('thewidth', $block_id, $widthes, $thewidth) ?>
			</label>
		</p>
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
			<label for="<?php echo $this->get_field_id('button') ?>">
				Button Text
				<?php echo aq_field_input('button', $block_id, $button, $size = 'full') ?>
			</label>
		</p>

		<p class="description">
			<label for="<?php echo $this->get_field_id('url') ?>">
				Button URL
				<?php echo aq_field_input('url', $block_id, $url, $size = 'full') ?>
			</label>
		</p>
        <?php
		$button_targets = array(
			'default' => 'Same Tab',
			'blank' => 'New Tab',
		);
		?>
        <p class="description">
			<label for="<?php echo $this->get_field_id('buttontarget') ?>">
				Button opens in<br/>
				<?php echo aq_field_select('buttontarget', $block_id, $button_targets, $buttontarget) ?>
			</label>
		</p>
        <p class="description">
			<label for="<?php echo $this->get_field_id('imageurl') ?>">
				Image URL
				<?php echo aq_field_upload('imageurl', $block_id, $imageurl, $size = 'full') ?>
			</label>
		</p>
        <p class="description">
			<label for="<?php echo $this->get_field_id('margintop') ?>">
				Top Margin
				<?php echo aq_field_input('margintop', $block_id, $margintop, $size = 'full') ?>
			</label>
		</p>
        <p class="description">
			<label for="<?php echo $this->get_field_id('imagewidth') ?>">
				Image Width
				<?php echo aq_field_input('imagewidth', $block_id, $imagewidth, $size = 'full') ?>
			</label>
		</p>

		<?php
		$button_colors = array(
			'blue' => 'Blue',
			'orange' => 'Orange',
			'green' => 'Green',
			'pink' => 'Pink',
			'white' => 'White',
			'black' => 'Black'
		);
		?>
		<p class="description">
			<label for="<?php echo $this->get_field_id('color') ?>">
				Button color<br/>
				<?php echo aq_field_select('color', $block_id, $button_colors, $color) ?>
			</label>
		</p>

		<?php
		$button_sizes = array(
			'small' => 'Small',
			'medium' => 'Medium',
			'big' => 'Big'
		);
		?>
		<p class="description">
			<label for="<?php echo $this->get_field_id('button_size') ?>">
				Button Size<br/>
				<?php echo aq_field_select('button_size', $block_id, $button_sizes, $button_size) ?>
			</label>
		</p>

		<?php
	}
	function block($instance) {
		extract($instance);
		?>
				<div class="push_button" <?php if($margintop) { ?> style="margin-top:<?php echo $margintop; ?>px" <?php } ?>>
                <div class="container">
                <div class="row-fluid">
                <div class="span12">
                	<?php if($imageurl) : ?>
                    <div class="push_button_image" <?php if($imagewidth) { ?> style="width:<?php echo $imagewidth; ?>px" <?php } ?>>
                    	<img src="<?php echo strip_tags($imageurl); ?>" alt="<?php if ($title) { ?><?php echo strip_tags($title); ?><?php } ?>" />
                    </div>
                    <?php endif; ?>
                    <?php $content_margin = $imagewidth + 40; ?>
                    <div class="push_button_content" <?php if($imagewidth) { ?> style="margin-<?php if (is_rtl()) { ?>right<?php } else { ?>left<?php } ?>:<?php echo strip_tags($content_margin); ?>px" <?php } ?>>

                        <?php if ($button && $url) : ?>
                        <div class="push_button_button for_desktop"><a <?php if ($buttontarget == "blank") {?> target="_blank" <?php } ?> href="<?php echo strip_tags($url); ?>" class="button <?php echo $button_size; ?> <?php echo $color; ?>"><?php echo strip_tags($button); ?></a></div>
                        <?php endif; ?>

                        <div class="push_button_info">
                        <?php if ($title) : ?><h2><?php echo strip_tags($title); ?></h2><?php endif; ?>
                        <?php if($text) : ?><p><?php echo strip_tags($text); ?></p><?php endif; ?>
                        </div>

                        <?php if ($button && $url) : ?>
                        <div class="push_button_button for_mobile"><a <?php if ($buttontarget == "blank") {?> target="_blank" <?php } ?> href="<?php echo strip_tags($url); ?>" class="button <?php echo $button_size; ?> <?php echo $color; ?>"><?php echo strip_tags($button); ?></a></div>
                        <?php endif; ?>

                	</div>
				</div>
                </div>
                </div>
                </div>
		<?php
	}

}