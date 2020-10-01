<?php get_header(); ?>
<!-- post title holder -->
<div class="page_title_holder container-fluid">
	<div class="container">
		<div class="page_info">
			<h1><?php single_tag_title(); ?></h1>
            <?php
			global $wp_query;
			$tag = $wp_query->get_queried_object();
			$current_tag = $tag->name;
			?>
			<?php asalah_breadcrumbs($current_tag); ?>
		</div>
		<div class="page_nav">

		</div>
	</div>
</div>

<!-- end post title holder -->
<section class="main_content">
	<!-- start single portfolio container -->

	<div class="container blog_style_1 blog_page blog_posts new_section">
		<div class="row-fluid">
			<div class="span9 blog_main_content">
				<?php if ( $wp_query ) : ?>
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					<article class="blog_post clearfix">
						<?php if ((get_post_meta($post->ID, 'asalah_post_type', true) != 'none') || (get_post_format($post->ID) != '')): ?>
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
																<?php if (asalah_cross_option('asalah_post_meta_info') != 'hide' ) {
																		asalah_meta_info();
																 } ?>
                                <div class="blog_description">
                                    <p><?php echo excerpt(60); ?></p>
																		<?php if (asalah_cross_option('asalah_post_meta_info_tag') != 'hide') { ?>
                                    <div class="blog_post_tags clearfix"><?php the_tags("", "", ""); ?></div>
																		<?php } ?>
                                    <div class="read_more_link read_more_button"><a href="<?php the_permalink(); ?>" class="btn btn-3 btn-3e icon-forward"><?php _e("Read more ...", "asalah"); ?></a></div>
                                </div>
							</div>

						</div>

					</article>
				<?php endwhile; ?>
				<?php asalah_bootstrap_pagination(); ?>
				<?php endif; ?>
			</div>
			<aside class="span3">
				<h3 class="hidden"><?php _e('Blog Sidebar','asalah'); ?></h3>

				<?php
					get_sidebar( 'cat' );
				?>
			</aside>
		</div>
	</div>


	<!-- end single portfolio container -->


<?php get_footer(); ?>