<?php
/** Notifications block **/

if(!class_exists('AQ_clients_Block')) {
	class AQ_clients_Block extends AQ_Block {

		//set and create block
		function __construct() {
			$block_options = array(
				'name' => 'Clients Carousel',
				'size' => 'span12',
			);

			//create the block
			parent::__construct('AQ_clients_Block', $block_options);
		}

		function form($instance) {

			$defaults = array(
				'title' => '',
				'postnumber' => '',
				'thewidth' => '',
				'client_order' => '',
				'show_number' => '6',
				'autoplay_car' => '',
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			$widthes = array(
				'container' => 'Container',
				'fluid' => 'Fluid',
			);
			$order_array = array(
				'date' => 'Date',
				'title' => 'Name',
				'comment_count' => 'Comments Count',
				'rand' => 'Random',
			);

			$autoplay_options = array(
				'no' => 'No',
				'yes' => 'Yes',
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
				<label for="<?php echo $this->get_field_id('postnumber') ?>">
					Number<br/>
					<?php echo aq_field_input('postnumber', $block_id, $postnumber) ?>
				</label>
			</p>
			<p class="description">
				<label for="<?php echo $this->get_field_id('show_number') ?>">
					Number To show per slide<br/>
					<?php echo aq_field_input('show_number', $block_id, $show_number) ?>
				</label>
			</p>
			<p class="description">
		<label for="<?php echo $this->get_field_id('client_order') ?>">
			Clients Order<br/>
			<?php echo aq_field_select('client_order', $block_id, $order_array, $client_order) ?>
		</label>
	</p>
			<p class="description">
		<label for="<?php echo $this->get_field_id('autoplay_car') ?>">
			Autoplay Carousel<br/>
			<?php echo aq_field_select('autoplay_car', $block_id, $autoplay_options, $autoplay_car) ?>
		</label>
	</p>
			<?php

		}

		function block($instance) {
			extract($instance);
			$the_id = "aq-block-" . $number;
			$client_order = (isset($client_order)) ? $client_order : '';
			$show_number = (isset($show_number)) ? $show_number : '';
			$autoplay_car = (isset($autoplay_car)) ? $autoplay_car : '';
			?>
			<div class="row-fluid"><div class="span12">
			<?php asalah_clients_carousel($the_id,$postnumber, $title, $client_order, $show_number, $autoplay_car); ?>
			</div></div>

			<?php
		}

	}
}