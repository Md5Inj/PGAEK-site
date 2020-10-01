<?php
/** Notifications block **/

if(!class_exists('AQ_bloglist_Block')) {
	class AQ_bloglist_Block extends AQ_Block {

		//set and create block
		function __construct() {
			$block_options = array(
				'name' => 'Blog Posts List',
				'size' => 'span12',
			);

			//create the block
			parent::__construct('AQ_bloglist_Block', $block_options);
		}

		function form($instance) {

			$defaults = array(
				'title' => '',
				'url' => '',
				'postnumber' => '',
				'tags_ids' => '',
				'readmore_pharse' => '',
				'cats' => '',
				'post_order' => '',
				'show_meta' => '',
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);

			$categories = get_categories();
		$cats_array = array('' => esc_attr__("All Categories", 'daynight'));
		foreach ($categories as $cat) {
		    $cats_array[$cat->slug] = $cat->name;
		}

		$order_array = array(
			'date' => 'Date',
			'name' => 'Name',
			'comment_count' => 'Comments Count',
			'rand' => 'Random',
		);
		$show_hide = array(
			'no' => 'No',
			'yes' => 'Yes',
		);

			?>

			<p class="description">
				<label for="<?php echo $this->get_field_id('title') ?>">
					Title<br/>
					<?php echo aq_field_input('title', $block_id, $title) ?>
				</label>
			</p>
			<p class="description">
				<label for="<?php echo $this->get_field_id('show_meta') ?>">
					Show Meta<br/>
					<?php echo aq_field_select('show_meta', $block_id, $show_hide, $show_meta) ?>
				</label>
			</p>
            <p class="description">
				<label for="<?php echo $this->get_field_id('url') ?>">
					Blog Page URL<br/>
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
				<label for="<?php echo $this->get_field_id('readmore_pharse') ?>">
					Read more text (leave blank for default "Read more...")<br/>
					<?php echo aq_field_input('readmore_pharse', $block_id, $readmore_pharse) ?>
				</label>
			</p>
			<p class="description">
		<label for="<?php echo $this->get_field_id('cats') ?>">
			Categories<br/>
			<?php echo aq_field_select('cats', $block_id, $cats_array, $cats) ?>
		</label>
	</p>
			<p class="description">
		<label for="<?php echo $this->get_field_id('post_order') ?>">
			Posts Order<br/>
			<?php echo aq_field_select('post_order', $block_id, $order_array, $post_order) ?>
		</label>
	</p>
            <p class="description">
				<label for="<?php echo $this->get_field_id('tags_ids') ?>">
					Tags (Seperated by comma)<br/>
					<?php echo aq_field_input('tags_ids', $block_id, $tags_ids) ?>
				</label>
			</p>
			<?php

		}

		function block($instance) {
			extract($instance);
			$the_id = "aq-block-" . $number;
			if (!isset($readmore_pharse)) {
				$readmore_pharse = '';
			}
			if (!isset($post_order)) {
				$post_order = '';
			}
			if (!isset($tags_ids)) {
				$tags_ids = '';
			}
			if (!isset($cats)) {
				$cats = '';
			}
			if (!isset($show_meta)) {
				$show_meta = '';
			}
			?>
			<div class="row-fluid"><div class="span12">
			<?php if ($title) : ?>
                <h3 class="page-header">
                	<?php if ($url) : ?>
                    	<a href="<?php echo $url; ?>"><span class="page_header_title"><?php echo strip_tags($title); ?></span></a>
                    <?php else: ?>
                    	<span class="page_header_title"><?php echo strip_tags($title); ?></span>
                    <?php endif; ?>
                </h3>
			<?php endif; ?>

			<?php asalah_blog_posts($postnumber, $tags_ids, $readmore_pharse, $cats, $post_order, $show_meta); ?>
			</div></div>
			<?php
		}

	}
}