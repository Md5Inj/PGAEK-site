<?php
/*
Template Name: Team Members
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
	$post_number = 6;
	if (asalah_cross_option('asalah_admin_member_number')) {
		$post_number = asalah_cross_option('asalah_admin_member_number');
	}

  $orderby = "date";
  if (asalah_cross_option('asalah_admin_member_order')) {
    $orderby = asalah_cross_option('asalah_admin_member_order');
  }
  $order = 'DESC';
  if ($orderby == 'name') {
    $order = 'ASC';
  }

	$wp_query = new WP_Query(array('post_type' => 'admin', 'paged' => get_query_var( 'paged' ), 'posts_per_page' => $post_number, "orderby" => $orderby, 'order' => $order));
?>
<!-- end post title holder -->
<section class="main_content page_team_members">
    <div class="container">
	<!-- start single portfolio container -->
	<?php if ( $wp_query ) : ?>
    <?php $count = 1; ?>
    <div id="page_team_members">

                <div class="blog_description">
                  <?php the_content(); ?>
                </div>
                <div class="team_carousel">
                    <div class="carousel">
                        <div class="slides row-fluid list_carousel responsive clearfix">

                              <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                                                <?php $get_meta = get_post_custom($post->ID); ?>
                                    <div class="span4 the_portfolio_list_li_div<?php if ($count == 3) { echo ' third_item';}?>" id="post-<?php the_ID(); ?>">
                                        <div class="team_item portfolio_item">
                                          <a href="<?php echo get_permalink(); ?>">
                                            <div class="portfolio_thumbnail">
                                                <?php asalah_blog_thumb("500", "528") ?>
                                            </div>
                                            </a>
                                            <div class="portfolio_info">
                                              <a href="<?php echo get_permalink(); ?>">
                                                <h4><?php the_title(); ?></h4>
                                                </a>
  <?php if ($get_meta['asalah_admin_position'][0] != ''): ?>
                                                    <div class="portfolio_time"><?php echo $get_meta['asalah_admin_position'][0]; ?></div>
                                                <?php endif; ?>


                                                        <?php if ($get_meta['asalah_admin_fb'][0] != '' || $get_meta['asalah_admin_tw'][0] != '' || $get_meta['asalah_admin_gp'][0] != '' || $get_meta['asalah_admin_linked'][0] != '' || $get_meta['asalah_admin_pin'][0] != '' || $get_meta['asalah_admin_mail'][0] != '') { ?>
                                                    <div class="team_social_bar clearfix ав">
                                                        <ul class="team_social_list">
                                                          
                                                            <?php if ($get_meta['asalah_admin_tw'][0] != '') { ?>
                                                                <li><a target="_blank" href="<?php echo $get_meta['asalah_admin_tw'][0]; ?>"><i class="icon-twitter" title="Twitter"></i></a></li>
                                                            <?php } ?>
                                                            <?php if ($get_meta['asalah_admin_gp'][0] != '') { ?>
                                                                <li><a target="_blank" href="<?php echo $get_meta['asalah_admin_gp'][0]; ?>"><i class="icon-gplus" title="Google Plus"></i></a></li>
                                                            <?php } ?>
                                                            <?php if ($get_meta['asalah_admin_linked'][0] != '') { ?>
                                                                <li><a target="_blank" href="<?php echo $get_meta['asalah_admin_linked'][0]; ?>"><i class="icon-linkedin" title="Linkedin"></i></a></li>
                                                            <?php } ?>
                                                            <?php if ($get_meta['asalah_admin_pin'][0] != '') { ?>
                                                                <li><a target="_blank" href="<?php echo $get_meta['asalah_admin_pin'][0]; ?>"><i class="icon-pinterest" title="Pinterest"></i></a></li>
                                                            <?php } ?>
    <?php if ($get_meta['asalah_admin_mail'][0] != '') { ?>
                                                                <li><a href="mailto:<?php echo $get_meta['asalah_admin_mail'][0]; ?>"><i class="icon-mail" title="Mail"></i></a></li>
                                                    <?php } ?>
                                                        </ul>
                                                    </div>
  <?php } ?>


                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if ($count == 3) {
                                      $count = 1;
                                    } else {
                                      $count++;
                                    }
                                     ?>
                                  <?php endwhile; ?>

                        </div>
                    </div>
                </div>

        </div>
        <?php asalah_bootstrap_pagination(); ?>
	<?php endif; ?>
	<!-- end single portfolio container -->
</div>

<?php get_footer(); ?>