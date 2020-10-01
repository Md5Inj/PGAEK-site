<?php
/** Notifications block **/

if(!class_exists('AQ_Alert_Block')) {
	class AQ_Alert_Block extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => 'Alerts',
				'size' => 'span12',
			);
			
			//create the block
			parent::__construct('aq_alert_block', $block_options);
		}
		
		function form($instance) {
			
			$defaults = array(
				'content' => '',
				'type' => 'note',
				'style' => '',
				'thewidth' => ''
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			$type_options = array(
				'alert-block' => 'Note',
				'alert-info' => 'Info',
				'alert-success' => 'Success'
			);
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
					Title (optional)<br/>
					<?php echo aq_field_input('title', $block_id, $title) ?>
				</label>
			</p>
			<p class="description">
				<label for="<?php echo $this->get_field_id('content') ?>">
					Alert Text (required)<br/>
					<?php echo aq_field_textarea('content', $block_id, $content) ?>
				</label>
			</p>
			<p class="description half">
				<label for="<?php echo $this->get_field_id('type') ?>">
					Alert Type<br/>
					<?php echo aq_field_select('type', $block_id, $type_options, $type) ?>
				</label>
			</p>
			<p class="description half last">
				<label for="<?php echo $this->get_field_id('style') ?>">
					Additional inline css styling (optional)<br/>
					<?php echo aq_field_input('style', $block_id, $style) ?>
				</label>
			</p>
			<?php
			
		}
		
		function block($instance) {
			extract($instance);
			echo do_shortcode('[alert type="'.$type.'" ]'.$content.'[/alert]');
			
		}
		
	}
}