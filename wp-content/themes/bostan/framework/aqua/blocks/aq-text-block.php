<?php
/** A simple text block **/
class AQ_Text_Block extends AQ_Block {

	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Text',
			'size' => 'span12',
			'disable_wpautop' => false
		);

		//create the block
		parent::__construct('aq_text_block', $block_options);
	}

	function form($instance) {

		$defaults = array(
			'text' => '',
			'thewidth' => ''
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
			<label for="<?php echo $this->get_field_id('disable_wpautop') ?>">
				<?php echo aq_field_checkbox('disable_wpautop', $block_id, $disable_wpautop, $size = 'full') ?>
				Disable Wpautop (in case of text formatting issues).
			</label>
		</p>

		<?php
	}

	function block($instance) {
		extract($instance);

		if($title) echo '<h3 class="page-header"><span class="page_header_title">'.do_shortcode(htmlspecialchars_decode($title)).'</span></h3>';
		if ($disable_wpautop) {
			echo do_shortcode(htmlspecialchars_decode($text));
		} else {
			echo wpautop(do_shortcode(htmlspecialchars_decode($text)));
		}
	}

}