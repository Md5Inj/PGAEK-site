<?php
/* Aqua Tabs Block */
if(!class_exists('AQ_prog_Block')) {
	class AQ_prog_Block extends AQ_Block {
	
		function __construct() {
			$block_options = array(
				'name' => 'Progress',
				'size' => 'span6',
			);
			
			//create the widget
			parent::__construct('AQ_prog_Block', $block_options);
			
			//add ajax functions
			add_action('wp_ajax_aq_block_tab_add_new', array($this, 'add_tab'));
			
		}
		
		function form($instance) {
		
			$defaults = array(
				'tabs' => array(
					1 => array(
						'title' => 'My New Tab',
						'content' => 'My tab contents',
					)
				),
				'type'	=> 'basic',
				'title' => '',
			);
			
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			$progress_types = array(
				'basic' => 'basic',
				'striped' => 'striped',
				'animated' => 'Animated'
			);
			
			?>
			<div class="description cf">
				<ul id="aq-sortable-list-<?php echo $block_id ?>" class="aq-sortable-list" rel="<?php echo $block_id ?>">
					<?php
					$tabs = is_array($tabs) ? $tabs : $defaults['tabs'];
					$count = 1;
					foreach($tabs as $tab) {	
						$this->tab($tab, $count);
						$count++;
					}
					?>
				</ul>
				<p></p>
				<a href="#" rel="tab" class="aq-sortable-add-new button">Add New</a>
				<p></p>
			</div>
			<p class="description">
				<label for="<?php echo $this->get_field_id('title') ?>">
					Title<br/>
					<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
				</label>
			</p>
			<p class="description">
				<label for="<?php echo $this->get_field_id('type') ?>">
					Progress style<br/>
					<?php echo aq_field_select('type', $block_id, $progress_types, $type) ?>
				</label>
			</p>
			
			<?php
		}
		
		function tab($tab = array(), $count = 0) {
				
			?>
			<li id="<?php echo $this->get_field_id('tabs') ?>-sortable-item-<?php echo $count ?>" class="sortable-item" rel="<?php echo $count ?>">
				
				<div class="sortable-head cf">
					<div class="sortable-title">
						<strong><?php echo $tab['title'] ?></strong>
					</div>
					<div class="sortable-handle">
						<a href="#">Open / Close</a>
					</div>
				</div>
				
				<div class="sortable-body">
					<p class="tab-desc description">
						<label for="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-title">
							Progress Title<br/>
							<input type="text" id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-title" class="input-full" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][title]" value="<?php echo $tab['title'] ?>" />
						</label>
					</p>
					<p class="tab-desc description">
						<label for="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-content">
							Percent<br/>
							<input type="text" id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-content" class="input-full" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][content]" value="<?php echo $tab['content'] ?>" />
						</label>
					</p>
					<p class="tab-desc description"><a href="#" class="sortable-delete">Delete</a></p>
				</div>
				
			</li>
			<?php
		}
		
		function block($instance) {
			extract($instance);
			
			$output = '<div class="row-fluid"><div class="span12"><div class="new_content"><h3 class="page-header"><span class="page_header_title">'.$title.'</span></h3>';
			if($type == 'basic') {
				$output .= '<div id="aq_block_toggles_wrapper_'.rand(1,100).'" class="aq_block_toggles_wrapper">';
				
				foreach( $tabs as $tab ){
					$output  .= '<span class="skill_title meta_title">'. $tab['title'] .' - ' . $tab['content'] .'% </span>';
					$output  .= '<div class="progress">';
					  $output  .= '<div class="bar" style="width: ' . $tab['content'] .'%;"></div>';
					$output  .= '</div>';
				}
				
				$output .= '</div>';
			}elseif($type == 'striped') {
				$output .= '<div id="aq_block_toggles_wrapper_'.rand(1,100).'" class="aq_block_toggles_wrapper">';
				
				foreach( $tabs as $tab ){
					$output  .= '<span class="skill_title meta_title">'. $tab['title'] .' - ' . $tab['content'] .'% </span>';
					$output  .= '<div class="progress progress-striped">';
					  $output  .= '<div class="bar" style="width: ' . $tab['content'] .'%;"></div>';
					$output  .= '</div>';
				}
				
				$output .= '</div>';
			}elseif($type == 'animated') {
				$output .= '<div id="aq_block_toggles_wrapper_'.rand(1,100).'" class="aq_block_toggles_wrapper">';
				
				foreach( $tabs as $tab ){
					$output  .= '<span class="skill_title meta_title">'. $tab['title'] .' - ' . $tab['content'] .'% </span>';
					$output  .= '<div class="progress progress-striped active">';
					  $output  .= '<div class="bar" style="width: ' . $tab['content'] .'%;"></div>';
					$output  .= '</div>';
				}
				
				$output .= '</div>';
			}
			
			$output .= '</div></div></div>';
			echo $output;
			
		}
		
		/* AJAX add tab */
		function add_tab() {
			$nonce = $_POST['security'];	
			if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
			
			$count = isset($_POST['count']) ? absint($_POST['count']) : false;
			$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
			
			//default key/value for the tab
			$tab = array(
				'title' => 'New Tab',
				'content' => ''
			);
			
			if($count) {
				$this->tab($tab, $count);
			} else {
				die(-1);
			}
			
			die();
		}
		
		function update($new_instance, $old_instance) {
			$new_instance = aq_recursive_sanitize($new_instance);
			return $new_instance;
		}
	}
}
