<?php
/*
Template Name: Blog Page
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
	$post_number = 10;
	if ($asalah_data['asalah_blog_number']) {
		$post_number = $asalah_data['asalah_blog_number'];
	}
	$wp_query = new WP_Query(array('post_type' => 'post','paged' => get_query_var( 'paged' ), 'posts_per_page' => $post_number));
	$count =0;
?>
<!-- end post title holder -->
<section class="main_content">
	<!-- start single portfolio container -->

	<div class="container blog_style_1 blog_page blog_posts new_section">
		<div class="row-fluid">
        	<?php if (get_post_meta($post->ID, 'asalah_post_layout', true) != 'full'): ?>
			<div class="span9 blog_main_content <?php if (get_post_meta($post->ID, 'asalah_post_layout', true) == 'left') { echo " pull-right";} ?>">
				<?php if ( $wp_query ) : ?>
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					<article class="blog_post clearfix">
						<?php if (get_post_meta($post->ID, 'asalah_post_type', true) != 'none'): ?>
                        
                        <div class="blog_banner clearfix">

							<?php asalah_banner() ?>
						</div>
                        <?php endif; ?>

						<div class="blog_info clearfix">
              <?php if (asalah_cross_option('asalah_post_format_icon') != 'hide') { ?>
                            <div class="blog_box_item post_type_box_item">
                                <?php asalah_blog_icon(); ?>
                            </div>
              <?php } ?>

							<div class="blog_heading">
								<div class="blog_title">
									<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
								</div>

                                <?php if (asalah_cross_option('asalah_post_meta_info') != 'hide' ):
                                  asalah_meta_info();
                                 endif;?>
                                <div class="blog_description">
                                    <p><?php echo excerpt(60); ?></p>
                                    <?php if (asalah_cross_option('asalah_post_meta_info_tag') != 'hide') { ?>
                                    <div class="blog_post_tags clearfix"><?php the_tags("", "", ""); ?></div>
                                    <?php } ?>
                                    <div class="read_more_link read_more_button"><a href="<?php the_permalink(); ?>" class="btn btn-3 btn-3e icon-forward"><?php _e("Читать далее...", "asalah"); ?></a></div>
                                </div>
							</div>

						</div>

					</article>
				<?php endwhile; ?>
				<?php asalah_bootstrap_pagination(); ?>
				<?php endif; ?>
                <?php wp_reset_query(); ?>
			</div>
			<aside class="span3  side_content <?php if (get_post_meta($post->ID, 'asalah_post_layout', true) == 'left') { echo " pull-left";} ?>">
				<h3 class="hidden"><?php _e('Blog Sidebar','asalah'); ?></h3>

				<?php
					get_sidebar( 'blog' );
				?>
			</aside>
            <?php else: ?> <!-- if full width -->
            <div class="span12">
				<?php if ( $wp_query ) : ?>
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					<article class="blog_post clearfix">
						<?php if (get_post_meta($post->ID, 'asalah_post_type', true) != 'none'): ?>
              <div class="blog_banner clearfix">
							         <?php asalah_banner() ?>
				      </div>
            <?php endif; ?>

						<div class="blog_info clearfix">
              <?php if (asalah_cross_option('asalah_post_format_icon') != 'hide') { ?>
                            <div class="blog_box_item post_type_box_item">
                                <?php asalah_blog_icon(); ?>
                            </div>
              <?php } ?>

							<div class="blog_heading">
								<div class="blog_title">
									<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
								</div>
                <?php if (asalah_cross_option('asalah_post_meta_info') != 'hide') {
                    asalah_meta_info();
                 } ?>
                                <div class="blog_description">
                                    <p><?php echo excerpt(60); ?></p>
                                    <?php if (asalah_cross_option('asalah_post_meta_info_tag') != 'hide') { ?>
                                    <div class="blog_post_tags clearfix"><?php the_tags("", "", ""); ?></div>
                                    <?php } ?>
                                    <div class="read_more_link read_more_button"><a href="<?php the_permalink(); ?>" class="btn btn-3 btn-3e icon-forward"><?php _e("Читать далее", "asalah"); ?></a></div>
                                </div>
							</div>

						</div>

					</article>
				<?php endwhile; ?>
				<?php asalah_bootstrap_pagination(); ?>
				<?php endif; ?>
			</div>
            <?php endif; ?> <!-- end if full width -->
		</div>
	</div>


	<!-- end single portfolio container -->


<?php get_footer(); ?>