<?php get_header(); ?>
<!-- post title holder -->
<?php
/* Pages Variables */
// Page Layout
$page_layout = asalah_cross_option('asalah_page_layout');
if (get_post_meta($post->ID, 'asalah_post_layout', true)) {
  $page_layout = get_post_meta($post->ID, 'asalah_post_layout', true);
}

// Page Title holder
$page_title_holder = asalah_cross_option('asalah_page_title_holder');
if (get_post_meta($post->ID, 'asalah_title_holder', true)) {
  $page_title_holder = get_post_meta($post->ID, 'asalah_title_holder', true);
}

// Page icon
$page_format_icon = asalah_cross_option('asalah_page_format_icon');
if (get_post_meta($post->ID, 'asalah_post_format_icon', true)) {
  $page_format_icon = get_post_meta($post->ID, 'asalah_post_format_icon', true);
}

// Page Title
$page_title_hide = asalah_cross_option('asalah_page_title');
if (get_post_meta($post->ID, 'asalah_page_title', true)) {
  $page_title_hide = get_post_meta($post->ID, 'asalah_page_title', true);
}

// Page Meta
$page_meta_show = asalah_cross_option('asalah_page_meta_info');
if (get_post_meta($post->ID, 'asalah_post_meta_info', true)) {
  $page_meta_show = get_post_meta($post->ID, 'asalah_post_meta_info', true);
}

// Page Share
$page_share_show = asalah_cross_option('asalah_page_share_box');
if (get_post_meta($post->ID, 'asalah_post_share_box', true)) {
  $page_share_show = get_post_meta($post->ID, 'asalah_post_share_box', true);
}

// Page Author
$page_author_show = asalah_cross_option('asalah_page_author_box');
if (get_post_meta($post->ID, 'asalah_post_author_box', true)) {
  $page_author_show = get_post_meta($post->ID, 'asalah_post_author_box', true);
}

// Custom Page Holder BG
$page_title_holder_bg = asalah_cross_option('asalah_page_custom_title_bg');
if (get_post_meta($post->ID, 'asalah_custom_title_bg', true) && (get_post_meta($post->ID, 'asalah_custom_title_bg', true) != '')) {
  $page_title_holder_bg = get_post_meta($post->ID, 'asalah_custom_title_bg', true);
}

// Custom Sidebar
$page_custom_sidebar = get_post_meta($post->ID, 'asalah_custom_sidebar', true);
?>
<?php if ($page_title_holder != 'hide'): ?>
    <?php if ($page_title_holder_bg != ''): ?>
      <style>
      .page_title_holder {
          background-image: url('<?php echo $page_title_holder_bg;  ?>');
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
            </div>
    </div>
<?php endif; ?>
<!-- end post title holder -->

<section class="main_content">
	<div class="container single_blog blog_posts new_section">
		<div class="row-fluid">
      <?php if ($page_layout != 'full'): ?>
  			<?php if ( $wp_query ) : ?>
  			  <?php while ( have_posts() ) : the_post(); ?>
              <div class="span9 blog_main_content <?php if ($page_layout == 'left') { echo " pull-right";} ?>">

  					        <article id="post-<?php the_ID(); ?>" <?php post_class('blog_post row-fluid'); ?>>
                      <?php if ($page_format_icon != 'hide' || $page_title_hide != 'hide' || $page_meta_show != 'hide') { ?> 
  						              <div class="blog_info clearfix">
                            <?php if ($page_format_icon != 'hide') { ?>
                                <div class="blog_box_item post_type_box_item">
                                    <?php asalah_blog_icon(); ?>
                                </div>
                            <?php } ?>
  							                <div class="blog_heading">
                                  <?php if ($page_title_hide != 'hide') { ?>
                  								<div class="blog_title<?php if ($page_meta_show != 'hide' ) { echo ' title_no_meta';} ?>">
                  									<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                  								</div>
                                  <?php } ?>
                                  <?php if ($page_meta_show != 'hide' ): ?>
                                    <div class="blog_info_box clearfix">
                                        <?php if (asalah_cross_option('asalah_page_meta_info_date') != 'hide') { ?>
                                        <div class="blog_box_item"><span class="blog_date meta_item"><i class="icon-calendar meta_icon"></i> <?php echo get_the_date(); ?></span></div>
                                        <?php } ?>
                                        <?php if (asalah_cross_option('asalah_page_meta_info_comment') != 'hide') {
                                         if (comments_open()) { ?>
                                        <div class="blog_box_item"><span class="blog_comments meta_item"><i class="icon-comment meta_icon"></i> <?php comments_number(); ?></span></div>
                                        <?php }
                                        } ?>
                                    </div>
                                 <?php endif; ?>
  							                </div>

  						              </div>
                            <?php } ?>
                            <?php if ((get_post_meta($post->ID, 'asalah_post_type', true) != '') || (get_post_format($post->ID) != '')): ?>
                              <div class="blog_banner clearfix">
  							                       <?php asalah_banner() ?>
  						                </div>
                            <?php endif; ?>
  						              <div class="blog_description">
  							                    <?php the_content(); wp_reset_query(); ?>
  							                    <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
                      							<?php
                      							if ($page_share_show == 'show' ):
                      								asalah_post_share();
                      							endif;
                      							?>
  						              </div>

                						<!-- start post author box -->
                						<?php if ($page_author_show != 'hide' ): ?>
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
              			<aside class="span3 side_content <?php if ($page_layout == 'left') { echo " pull-left";} ?>">
              				<h3 class="hidden"><?php _e('Post Sidebar','asalah'); ?></h3>
              				<?php

              					if (!$page_custom_sidebar || ($page_custom_sidebar && ($page_custom_sidebar == '' || $page_custom_sidebar == 'none'))) {
              						get_sidebar( 'page' );
              					}else{
              						if ( is_active_sidebar( $page_custom_sidebar ) ) :
              							dynamic_sidebar( $page_custom_sidebar );
              						endif;
              					}
              				?>
              			</aside>
                <?php endwhile; ?>
	            <?php endif; ?>
            <?php else: ?> <!-- if full width -->
              <div class="span12">
      				<?php if ( $wp_query ) : ?>
      				<?php while ( have_posts() ) : the_post(); ?>

      					<article id="post-<?php the_ID(); ?>" <?php post_class('blog_post row-fluid'); ?>>
                  <?php if ($page_format_icon != 'hide' || $page_title_hide != 'hide' || $page_meta_show != 'hide') { ?> 
                  <div class="blog_info_box clearfix">
                    <?php if ($page_format_icon != 'hide') { ?>
                      	  <div class="blog_box_item post_type_box_item">
                          	<?php asalah_blog_icon(); ?>
                          </div>
                    <?php } ?>
                    <div class="blog_heading">
                      <?php if ($page_title_hide != 'hide') { ?>
                    <div class="blog_title<?php if ($page_meta_show != 'hide' ) { echo ' title_no_meta';} ?>">
                      <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                    </div>
                    <?php } ?>
                    <?php if ($page_meta_show != 'hide' ): ?>

                          <?php if (asalah_cross_option('asalah_page_meta_info_date') != 'hide') { ?>
                          <div class="blog_box_item"><span class="blog_date meta_item"><i class="icon-calendar meta_icon"></i> <?php echo get_the_date(); ?></span></div>
                          <?php } ?>
                          <?php if (asalah_cross_option('asalah_page_meta_info_comment') != 'hide') {
                           if (comments_open()) { ?>
                          <div class="blog_box_item"><span class="blog_comments meta_item"><i class="icon-comment meta_icon"></i> <?php comments_number(); ?></span></div>
                          <?php }
                          } ?>

                    <?php endif; ?>
                  </div>
                  </div>
                  <?php } ?>
                  <?php if ((get_post_meta($post->ID, 'asalah_post_type', true) != '') || (get_post_format($post->ID) != '')): ?>
                      <div class="blog_banner clearfix">
      			                   <?php asalah_banner() ?>
      		            </div>
                  <?php endif; ?>
      						<div class="blog_description">
      							<?php the_content(); wp_reset_query(); ?>

      							<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>

      							<?php
      							if ($page_share_show == 'show' ):
      								asalah_post_share();
      							endif;
      							?>
      						</div>

      						<!-- start post author box -->
      						<?php if ($page_author_show != 'hide' ): ?>
                      <div class="new_section">
            						<div class="row-fluid content_boxes">
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
      				<?php endwhile; ?>
      				<?php endif; ?>
      			</div>
          <?php endif; ?> <!-- end if full width -->
		</div>
	</div>
<?php get_footer(); ?>