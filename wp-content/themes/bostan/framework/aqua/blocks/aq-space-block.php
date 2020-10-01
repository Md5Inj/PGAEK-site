<?php
/** A simple text block **/
class AQ_Space_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Empty Space',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('AQ_Space_Block', $block_options);
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
		
		<?php
	}
	/* block header */
	 	function before_block($instance) {
	 	}
	 	
	 	/* block footer */
	 	function after_block($instance) {
			
	 	}
	function block($instance) {
		extract($instance);
		
		echo '<div class="new_section"></div>';
	}
	
}