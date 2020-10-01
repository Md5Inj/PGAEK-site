<?php
/*
Template Name: Portfolio 3 Culomns
*/
?>
<?php get_header(); ?>
<!-- post title holder -->
<?php if (get_post_meta($post->ID, 'asalah_title_holder', true) != 'hide'): ?>
    <?php if (get_post_meta($post->ID, 'asalah_custom_title_bg', true)): ?>
    <style>
    .page_title_holder {
        background-image: url('<?php echo get_post_meta($post->ID, 'asalah_custom_title_bg', true);  ?>');
        background-repeat: no-repeat;
    }
    </style>
  <?php elseif (!empty($asalah_data['asalah_custom_title_bg_projects'])) : ?>
    <style>
        .page_title_holder {
            background-image: url('<?php echo $asalah_data['asalah_custom_title_bg_projects']; ?>');
            background-repeat: no-repeat;
        }
    </style>
<?php endif; ?>
    <div class="page_title_holder  container-fluid">
            <div class="container">
                    <div class="page_info">
                            <h1><?php the_title(); ?></h1>
                            <?php asalah_breadcrumbs(); ?>
                    </div>
                    <div class="page_nav">

                    </div>
            </div>
    </div>
<?php endif; ?>
<?php
	$post_number = 12;
	if (asalah_cross_option('asalah_portfolio_number')) {
		$post_number = asalah_cross_option('asalah_portfolio_number');
	}
  if (get_post_meta($post->ID, 'asalah_portfolio_page_tag', true) != '') {
    $tags = get_post_meta($post->ID, 'asalah_portfolio_page_tag', true);
    $tags = explode(',', $tags);
    $tags_array = array();
    if (count($tags) > 0) {
        foreach ($tags as $tag) {
            if (!empty($tag)) {
                $tags_array[] = $tag;
            }
        }
    }
  } else {
    $tags_array = '';
  }
	$wp_query = new WP_Query(array('post_type' => 'project', 'paged' => get_query_var( 'paged' ), 'posts_per_page' => $post_number, 'tagportfolio' => $tags_array ));
	$count =0;
?>
<!-- end post title holder -->
<section class="main_content">
	<!-- start single portfolio container -->
	<?php if ( $wp_query ) : ?>
	<div class="container services new_section">
		<div id="post-<?php the_ID(); ?>" <?php post_class('portfolio_page row'); ?>>
			<nav id="portfolio_filter_options" class="span12 navbar">
        <?php if (get_post_meta($post->ID, 'asalah_portfolio_page_tag', true) == '') { ?>
  				<div class="navbar-inner">
  				<?php asalah_portfolio_tag_list(); ?>
  				</div>
        <?php }?>
			</nav>
			<div class="span12 portfolio_items">
				<ul div id="portfolio_container" <?php if ($wp_query->max_num_pages <= 1) { echo 'data-ajax-load="no"'; } ?>  class="thumbnails<?php if (asalah_cross_option('asalah_project_filter_links')) { echo ' projects_filter_links'; } ?>">
					<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
						<li class="portfolio_element span4 <?php asalah_portfolio_tag(); ?> showallposts" data-projectid="<?php echo $post->ID; ?>" >
							<div class="portfolio_item">
                            <?php asalah_slideshow(); ?>
								<div class="portfolio_thumbnail">
									<?php asalah_blog_thumb("720","518") ?>
									<div class="portfolio_overlay">
                                    </div>
                                    <?php if (isset($asalah_data['asalah_portfolio_icon']) && $asalah_data['asalah_portfolio_icon'] == 'url'): ?>
                                    <div class="center-bar">
                                        <a class="icon-link" href="<?php the_permalink(); ?>"></a>
                                    </div>
                                    <?php else: ?>
                                    <div class="center-bar">
                                        <a class="prettyPhotolink icon-search goup" rel="slideshow_<?php echo $post->ID; ?>"></a>
                                    </div>
                                    <?php endif; ?>

								</div>
								<div class="portfolio_info">
									<a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
                            		<span class="portfolio_category"><?php $tags_list = get_the_term_list( $post->ID, 'tagportfolio', '',', ',''); echo $tags_list; ?></span>
								</div>
							</div>
						</li>
					<?php endwhile; ?>
				</ul>
				<?php asalah_bootstrap_pagination(); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<!-- end single portfolio container -->


<?php get_footer(); ?>