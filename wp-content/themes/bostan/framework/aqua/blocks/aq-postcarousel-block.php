<?php
/** Notifications block **/

if(!class_exists('AQ_Postcars_Block')) {
	class AQ_Postcars_Block extends AQ_Block {

		//set and create block
		function __construct() {
			$block_options = array(
				'name' => 'Projects Carousel',
				'size' => 'span12',
			);

			//create the block
			parent::__construct('AQ_Postcars_Block', $block_options);
		}

		function form($instance) {

			$defaults = array(
				'title' => '',
				'description' => '',
				'url' => '',
				'postnumber' => '',
				'max' => '',
				'cycle' => '',
				'pos' => '',
				'thewidth' => '',
				'tags_ids' => '',
				'projects_order' => '',
				'autoplay_car' => '',
				'thumb_height' => '',
				'external_link' => '',
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			$post_types = array(
				'project' => 'Projects',
				'post' => 'Posts'
			);
			$positions = array(
				'top' => 'Top',
				'side' => 'Left Side',
				'hidden' => 'Hidden',
			);
			$widthes = array(
				'container' => 'Container',
				'fluid' => 'Fluid',
			);

			$order_array = array(
				'date' => 'Date',
				'title' => 'Name',
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
				<label for="<?php echo $this->get_field_id('description') ?>">
					Description Text<br/>
					<?php echo aq_field_textarea('description', $block_id, $description, $size = 'full') ?>
				</label>
			</p>
			<p class="description">
				<label for="<?php echo $this->get_field_id('url') ?>">
					Portfolio Page URL<br/>
					<?php echo aq_field_input('url', $block_id, $url) ?>
				</label>
			</p>
			<p class="description">
				<label for="<?php echo $this->get_field_id('postnumber') ?>">
					Number Of Posts<br/>
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
		<label for="<?php echo $this->get_field_id('autoplay_car') ?>">
			Autoplay Carousel<br/>
			<?php echo aq_field_select('autoplay_car', $block_id, $autoplay_options, $autoplay_car) ?>
		</label>
	</p>
			<p class="description">
				<label for="<?php echo $this->get_field_id('external_link') ?>">
					Link image icon to preview url<br/>
					<?php echo aq_field_select('external_link', $block_id, $autoplay_options, $external_link) ?>
				</label>
			</p>
			<p class="description">
				<label for="<?php echo $this->get_field_id('pos') ?>">
					Heading Position<br/>
					<?php echo aq_field_select('pos', $block_id, $positions, $pos) ?>
				</label>
			</p>
            <p class="description">
				<label for="<?php echo $this->get_field_id('tags_ids') ?>">
					Tags (Seperated by comma)<br/>
					<?php echo aq_field_input('tags_ids', $block_id, $tags_ids) ?>
				</label>
			</p>
			<p class="description">
		<label for="<?php echo $this->get_field_id('projects_order') ?>">
			Projects Order<br/>
			<?php echo aq_field_select('projects_order', $block_id, $order_array, $projects_order) ?>
		</label>
		<label for="<?php echo $this->get_field_id('thumb_height') ?>">
			Thumbnails Height (blank for default)<br/>
			<?php echo aq_field_input('thumb_height', $block_id, $thumb_height) ?>
		</label>
	</p>
			<?php

		}

		function block($instance) {
			extract($instance);
			$the_id = "aq-block-" . $number;
			$description = (isset($description)) ? $description : '' ;
			$projects_order = (isset($projects_order)) ? $projects_order : '';
			$autoplay_car = (isset($autoplay_car)) ? $autoplay_car : '';
			$thumb_height = (isset($thumb_height)) ? $thumb_height : '';
			$external_link = (isset($external_link)) ? $external_link : '';
			?>
			<div class="row-fluid">
			<div class="span12">
			<?php asalah_posts_carousel($the_id, 'project', $url, $postnumber, $title, $description, $max, $cycle, $pos, '', $tags_ids, $projects_order, $autoplay_car, $thumb_height, $external_link); ?>
			</div>
			</div>

			<?php
		}

	}
}