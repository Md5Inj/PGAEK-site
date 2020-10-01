<?php get_header(); ?>
<!-- post title holder -->
<div class="page_title_holder container-fluid">
	<div class="container">
		<div class="page_info">
			<h1>
            <?php if ( is_day() ) : ?>
				<?php printf( __( 'Daily Archives: %s', 'asalah' ), '<span>' . get_the_date() . '</span>' ); ?>
            <?php elseif ( is_month() ) : ?>
                <?php printf( __( 'Monthly Archives: %s', 'asalah' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'asalah' ) ) . '</span>' ); ?>
            <?php elseif ( is_year() ) : ?>
                <?php printf( __( 'Yearly Archives: %s', 'asalah' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'asalah' ) ) . '</span>' ); ?>
            <?php else : ?>
                <?php _e( 'Blog Archives', 'asalah' ); ?>
            <?php endif; ?>
            </h1>
            <?php if ( is_day() ) : ?>
				<?php asalah_breadcrumbs(get_the_date()); ?>
            <?php elseif ( is_month() ) : ?>
                <?php asalah_breadcrumbs(get_the_date( _x( 'F Y', 'monthly archives date format', 'asalah' ) )); ?>
            <?php elseif ( is_year() ) : ?>
                <?php asalah_breadcrumbs(get_the_date( _x( 'Y', 'yearly archives date format', 'asalah' ) )); ?>
            <?php else : ?>
                <?php asalah_breadcrumbs(__( 'Blog Archives', 'asalah' )); ?>
            <?php endif; ?>
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
					<article class="blog_post">
						<div class="blog_banner clearfix">
							<?php asalah_banner() ?>
						</div>
						<div class="blog_info clearfix">
							<div class="blog_heading">
								<div class="blog_title">
									<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
								</div>
							</div>
						</div>
						<div class="blog_description">
							<p><?php echo excerpt(60); ?></p>
                            <div class="read_more_link"><a href="<?php the_permalink(); ?>"><?php _e("Читать далее", "asalah"); ?></a></div>
						</div>
                        <div class="blog_info_box clearfix">
													<?php if (asalah_cross_option('asalah_post_format_icon') != 'hide') { ?>
                        	<div class="blog_box_item post_type_box_item">
                            	<?php asalah_blog_icon(); ?>
                            </div>
														<?php } ?>
                            <?php if (asalah_cross_option('asalah_post_meta_info') != 'hide' ) {
																asalah_meta_info();
														 } ?>

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