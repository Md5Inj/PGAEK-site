<?php
/** A simple text block **/
class AQ_video_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Video',
			'size' => 'span6',
		);
		
		//create the block
		parent::__construct('AQ_video_Block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'text' => '',
			'title' => '',
			'height' => '',
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
				URL
				<?php echo aq_field_input('text', $block_id, $text, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('height') ?>">
				Height
				<?php echo aq_field_input('height', $block_id, $height, $size = 'full') ?>
			</label>
		</p>
		
		<?php
	}

	function block($instance) {
		extract($instance);
		?>
		<div class="video_container">
			<div class="row-fluid">
				<?php if ($title) : ?><h3 class="page-header"><span class="page_header_title"><?php echo strip_tags($title); ?></span></h3><?php endif; ?>
				<div class="inner_container thumbnail">
					<?php 
					if($text) :
						$prov = asalah_video_prov($text);
						$vid = asalah_video_id($prov, $text);
						asalah_video_iframe($prov, $vid, $height); 
					endif; 
					?>
				</div>
			</div>
		</div>
		<?php
	}
	
}