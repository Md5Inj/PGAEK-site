<?php get_header(); ?>

<?php if ( $wp_query ) : ?>
<?php while ( have_posts() ) : the_post(); ?>

<?php $blog_layout = asalah_cross_option('asalah_post_layout'); ?>
<!-- post title holder -->
<?php if (asalah_cross_option('asalah_title_holder') != 'hide'): ?>
    <?php if (asalah_cross_option('asalah_custom_title_bg')): ?>
      <style>
      .page_title_holder {
          background-image: url('<?php echo asalah_cross_option('asalah_custom_title_bg');  ?>');
          background-repeat: no-repeat;
      }
      </style>
    <?php endif; ?>
    <div class="page_title_holder container-fluid">
            <div class="container">
                    <div class="page_info">
                            <h1><?php the_title(); ?></h1>
                            <?php asalah_breadcrumbs(); ?>
                    </div>
                    <?php if (asalah_cross_option('asalah_posts_navigation_show') != 'no') { ?>
                    <div class="page_nav clearfix">
                    <?php
                                            $next_post = get_next_post();
                                            $prev_post = get_previous_post();
                                            ?>

                        <?php if (!empty( $prev_post )): ?>
                            <a title="<?php _e("Next Post", 'asalah'); ?>" href="<?php echo get_permalink( $prev_post->ID ); ?>" id="right_nav_arrow" class="cars_nav_control right_nav_arrow"><i class="icon-angle-right"></i></a>
                        <?php endif; ?>

                        <?php if ($asalah_data['asalah_blog_url']): ?>
                            <a href="<?php echo $asalah_data['asalah_blog_url']; ?>" id="main_portfolio_arrow" class="cars_portfolio_control"><i class="icon-th-large"></i></a>
                        <?php endif; ?>

                        <?php if (!empty( $next_post )): ?>
                            <a title="<?php _e("Previous Post", 'asalah'); ?>" href="<?php echo get_permalink( $next_post->ID ); ?>" id="left_nav_arrow" class="cars_nav_control left_nav_arrow"><i class="icon-angle-left"></i></a>
                        <?php endif; ?>
                    </div>
                    <?php } ?>
            </div>
    </div>
<?php endif; ?>
<!-- end post title holder -->

<section class="main_content">
	<div class="container single_blog blog_posts new_section">
		<div class="row-fluid">
    	<?php if ($blog_layout != 'full') {
        $blog_class = 'span9 blog_main_content';
        if ($blog_layout == 'left') {
          $blog_class .= " pull-right";
        }
      } else {
        $blog_class = 'span12';
      }
      ?>

      <div class="<?php echo $blog_class; ?>">

					<article id="post-<?php the_ID(); ?>" <?php if ($blog_layout != 'full') { post_class('blog_post'); } else {post_class('blog_post row-fluid');} ?>>

						<div class="blog_info clearfix">
              <?php if (asalah_cross_option('asalah_post_format_icon') != 'hide') { ?>
                            <div class="blog_box_item post_type_box_item">
                                <?php asalah_blog_icon(); ?>
                            </div>
                            <?php } ?>
							<div class="blog_heading">
								<div class="blog_title<?php if (asalah_cross_option('asalah_post_meta_info') == 'hide' ) { echo ' title_no_meta';} ?><?php if (asalah_cross_option('asalah_post_format_icon') == 'hide' && asalah_cross_option('asalah_post_meta_info') == 'hide') { echo '_no_icon'; } ?>">
									<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
								</div>
                <?php if (asalah_cross_option('asalah_post_meta_info') != 'hide' ):
                  asalah_meta_info();
                endif; ?>
							</div>

						</div>
            <?php if ((get_post_meta($post->ID, 'asalah_post_type', true) != '') || (get_post_format($post->ID) != '')): ?>
              <div class="blog_banner clearfix">
							    <?php asalah_banner() ?>
					    </div>
            <?php endif; ?>
						<div class="blog_description">
							<?php the_content();
              wp_reset_query(); ?>

							<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>

              <?php if (asalah_cross_option('asalah_post_meta_info_tag') != 'hide') { ?>
              <div class="blog_post_tags clearfix"><?php the_tags("", "", ""); ?></div>
              <?php } ?>
							<?php
							if (asalah_cross_option('asalah_post_share_box') == 'show' ):
								asalah_post_share();
							endif;
							?>
						</div>

						<!-- start post author box -->
						<?php if (!(asalah_cross_option('asalah_post_author_box')) || (asalah_cross_option('asalah_post_author_box') != 'hide') ): ?>
            <div class="new_section">
  						<div class="row-fluid content_boxes clearfix">
  							<div class="about_author span12">
                              	<h3 class="page-header"><?php _e('About Author','asalah'); ?></h3>
  								<div class="author_info_box clearfix">
  									<div class="author_image"><?php echo get_avatar( get_the_author_meta('ID'), 100); ?></div>
  									<div class="author_info">
  											<div class=" author_name"><h4><?php the_author(); ?></h4></div>
  											<div class=" author_desc">
  											      <p><?php echo get_the_author_meta('description'); ?></p>
  											</div>
  											<div class=" author_social_profiles">
  												<ul>

  													<?php if ( get_the_author_meta('url') ): ?>
  													               <li><a href="<?php the_author_meta('url'); ?>" class="profile_social_icon icon-globe"></a></li>
  													<?php endif; ?>
  													<?php if ( get_the_author_meta('twitter') ): ?>
  													               <li><a href="<?php the_author_meta('twitter'); ?>" class="profile_social_icon icon-twitter"></a></li>
  													<?php endif; ?>
  													<?php if ( get_the_author_meta('facebook') ): ?>
  													               <li><a href="<?php the_author_meta('facebook'); ?>" class="profile_social_icon icon-facebook"></a></li>
  													<?php endif; ?>
  													<?php if ( get_the_author_meta('plus') ): ?>
  													               <li><a href="<?php the_author_meta('plus'); ?>" class="profile_social_icon icon-google-plus"></a></li>
  													<?php endif; ?>
  													<?php if ( get_the_author_meta('linkedin') ): ?>
  													               <li><a href="<?php the_author_meta('linkedin'); ?>" class="profile_social_icon icon-linkedin"></a></li>
  													<?php endif; ?>

  												</ul>
  											</div>
  									</div>
  								</div>
  							</div>
  						</div>
            </div>
						<?php endif; ?>
						<!-- end post author box -->

						<?php if (comments_open()) { ?>
						<!-- start post comments -->
						<?php comments_template( '', true ); ?>
						<!-- end post comments -->
						<?php } ?>

					</article>

			</div>
      <?php if ($blog_layout != 'full') { ?>
			<aside class="span3 side_content <?php if ($blog_layout == 'left') { echo " pull-left";} ?>">
				<h3 class="hidden"><?php _e('Post Sidebar','asalah'); ?></h3>
				<?php
					$asalah_have_custom_sidebar = asalah_cross_option('asalah_custom_sidebar');

					if (!isset($asalah_have_custom_sidebar) || $asalah_have_custom_sidebar == '' || $asalah_have_custom_sidebar == 'none') {
						get_sidebar( 'single' );
					}else{

						$custom_sidebar_id = asalah_cross_option('asalah_custom_sidebar');
						if ( is_active_sidebar( $custom_sidebar_id ) ) :
							dynamic_sidebar( $custom_sidebar_id );
						endif;
					}
				?>
			</aside>
      <?php } ?>

		</div>
	</div>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>