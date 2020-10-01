<?php
/** Notifications block **/

if(!class_exists('AQ_team_Block')) {
	class AQ_team_Block extends AQ_Block {

		//set and create block
		function __construct() {
			$block_options = array(
				'name' => 'Team Carousel',
				'size' => 'span12',
			);

			//create the block
			parent::__construct('AQ_team_Block', $block_options);
		}

		function form($instance) {

			$defaults = array(
				'title' => '',
				'description' => '',
				'url' => '',
				'postnumber' => '',
				'max' => '',
				'cycle' => '',
				'thewidth' => '',
				'team_order' => '',
				'autoplay_car' => '',
				'link_member_page' => ''
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
					Title<br/>
					<?php echo aq_field_input('title', $block_id, $title) ?>
				</label>
			</p>
			<p class="description">
				<label for="<?php echo $this->get_field_id('desc') ?>">
					Description Text<br/>
					<?php echo aq_field_textarea('desc', $block_id, $desc, $size = 'full') ?>
				</label>
			</p>
			<p class="description">
				<label for="<?php echo $this->get_field_id('postnumber') ?>">
					Number Of Members<br/>
					<?php echo aq_field_input('postnumber', $block_id, $postnumber) ?>
				</label>
			</p>
			<p class="description">
				<label for="<?php echo $this->get_field_id('max') ?>">
					Max Number To Appear In Page<br/>
					<?php echo aq_field_input('max', $block_id, $max) ?>
				</label>
			</p>
			<p class="description">
				<label for="<?php echo $this->get_field_id('cycle') ?>">
					Number Of Items To Switch Each Cycle<br/>
					<?php echo aq_field_input('cycle', $block_id, $cycle) ?>
				</label>
			</p>

			<p class="description">
		<label for="<?php echo $this->get_field_id('team_order') ?>">
			Team Order<br/>
			<?php echo aq_field_select('team_order', $block_id, $order_array, $team_order) ?>
		</label>
	</p>
			<p class="description">
		<label for="<?php echo $this->get_field_id('autoplay_car') ?>">
			Autoplay Carousel<br/>
			<?php echo aq_field_select('autoplay_car', $block_id, $autoplay_options, $autoplay_car) ?>
		</label>
	</p>
			<p class="description">
		<label for="<?php echo $this->get_field_id('link_member_page') ?>">
			Link Members to their page<br/>
			<?php echo aq_field_select('link_member_page', $block_id, $autoplay_options, $link_member_page) ?>
		</label>
	</p>
			<?php

		}

		function block($instance) {
			extract($instance);
			$url = (isset($url)) ? $url : '' ;
			$the_id = "aq-block-row" . $number;
			$team_order = (isset($team_order)) ? $team_order : '';
			$autoplay_car = (isset($autoplay_car)) ? $autoplay_car : '';
			$link_member_page = (isset($link_member_page) && $link_member_page === 'yes') ? true : false;
			?>
			<div class="row-fluid">
			<div class="span12">
			<?php asalah_team_carousel($the_id, $url, $postnumber, $title, $desc, $max, $cycle, $team_order, $autoplay_car, $link_member_page); ?>
			</div>
			</div>

			<?php
		}

	}
}