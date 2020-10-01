<?php
/* Aqua Tabs Block */
if(!class_exists('AQ_Tabs_Block')) {
	class AQ_Tabs_Block extends AQ_Block {

		function __construct() {
			$block_options = array(
				'name' => 'Tabs &amp; Toggles',
				'size' => 'span6',
			);

			//create the widget
			parent::__construct('AQ_Tabs_Block', $block_options);

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
				'type'	=> 'tab',
				'title' => ''
			);

			$instance = wp_parse_args($instance, $defaults);
			extract($instance);

			$tab_types = array(
				'tab' => 'Tabs',
				'vtab' => 'Vertical Tabs',
				'toggle' => 'Toggles',
				'accordion' => 'Accordion'
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
					Tabs style<br/>
					<?php echo aq_field_select('type', $block_id, $tab_types, $type) ?>
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
							Tab Title<br/>
							<input type="text" id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-title" class="input-full" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][title]" value="<?php echo $tab['title'] ?>" />
						</label>
					</p>
					<p class="tab-desc description">
						<label for="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-content">
							Tab Content<br/>
							<textarea id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-content" class="textarea-full" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][content]" rows="5"><?php echo $tab['content'] ?></textarea>
						</label>
					</p>
					<p class="tab-desc description"><a href="#" class="sortable-delete">Delete</a></p>
				</div>

			</li>
			<?php
		}

		function block($instance) {
			extract($instance);
			$output = '<div class="row-fluid"><div class="span12"><div class="new_content">';
			if ($title):
				$output .= '<h3 class="page-header"><span class="page_header_title">'.$title.'</span></h3>';
			endif;

			if($type == 'tab') {
					$i = 1;
					$output .= '<div class="tabbable horizontal_tab"><ul id="tab'.$number.'" class="nav nav-tabs">';
					foreach( $tabs as $tab ){
						$tab_selected = $i == 1 ? 'active' : '';

							$output .= '<li class="'.$tab_selected.'"><a href="#tabcontent'.$number.'_'.$i.'" data-toggle="tab">';
								$output .= do_shortcode(htmlspecialchars_decode($tab['title']));
							 $output .= '</a></li>';
							 $i++;
					}
					$output .= '</ul>';
					$i = 1;
					$output .= '<div id="tabcontent'.$number.'" class="tab-content">';
					foreach( $tabs as $tab ){
						$tab_selected = $i == 1 ? 'active' : '';

							$output .= '<div class="tab-pane fade '.$tab_selected.' in" id="tabcontent'.$number.'_'.$i.'">';
								$output .= do_shortcode(htmlspecialchars_decode($tab['content']));
							$output .= '</div>';
							$i++;
					}
					$output .= '</div></div>';


			}elseif($type == 'vtab') {
					$i = 1;
					$output .= '<div class="tabbable vertical_tab"><ul id="tab'.$number.'" class="nav nav-tabs">';
					foreach( $tabs as $tab ){
						$tab_selected = $i == 1 ? 'active' : '';

							$output .= '<li class="'.$tab_selected.'"><a href="#tabcontent'.$number.'_'.$i.'" data-toggle="tab">';
								$output .= do_shortcode(htmlspecialchars_decode($tab['title']));
							 $output .= '</a></li>';
							 $i++;
					}
					$output .= '</ul>';
					$i = 1;
					$output .= '<div id="tabcontent'.$number.'" class="tab-content">';
					foreach( $tabs as $tab ){
						$tab_selected = $i == 1 ? 'active' : '';

							$output .= '<div class="tab-pane fade '.$tab_selected.' in" id="tabcontent'.$number.'_'.$i.'">';
								$output .=do_shortcode(htmlspecialchars_decode($tab['content']));
							$output .= '</div>';
							$i++;
					}
					$output .= '</div></div>';


			} elseif ($type == 'toggle') {

				$output .= '<div class="accordion" id="accordion'.$number.'">';

					$i = 1;
					foreach( $tabs as $tab ){
						$tab_selected = $i == 1 ? 'in' : '';
						$output .= '<div class="toggle-group">';
							$output .= '<div class="accordion-heading">';
								$output .= '<a class="accordion-toggle" data-toggle="collapse" href="#collapse_'.$number.'_'.$i.'">';
									$output .= do_shortcode(htmlspecialchars_decode($tab['title']));
								$output .= '</a>';
							$output .= '</div>';
							$output .= '<div id="collapse_'.$number.'_'.$i.'" class="accordion-body collapse">';
								$output .= '<div class="accordion-inner">';
									$output .= do_shortcode(htmlspecialchars_decode($tab['content']));
								$output .= '</div>';
							$output .= '</div>';
						$output .= '</div>';
						$i++;
					}

				$output .= '</div>';

			} elseif ($type == 'accordion') {
				$output .= '<div class="accordion" id="accordion'.$number.'">';

					$i = 1;
					foreach( $tabs as $tab ){
						$tab_selected = $i == 1 ? 'in' : '';
						$output .= '<div class="accordion-group">';
							$output .= '<div class="accordion-heading">';
								$output .= '<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion'.$number.'" href="#collapse_'.$number.'_'.$i.'">';
									$output .= do_shortcode(htmlspecialchars_decode($tab['title']));
								$output .= '</a>';
							$output .= '</div>';
							$output .= '<div id="collapse_'.$number.'_'.$i.'" class="accordion-body collapse '.$tab_selected.'">';
								$output .= '<div class="accordion-inner">';
									$output .= do_shortcode(htmlspecialchars_decode($tab['content']));
								$output .= '</div>';
							$output .= '</div>';
						$output .= '</div>';
						$i++;
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
