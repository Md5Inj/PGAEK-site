<?php get_header(); ?>
<!-- post title holder -->

<?php
$project_overview = (!empty($asalah_data['asalah_translate_projectoverview'])) ? $asalah_data['asalah_translate_projectoverview'] : 'Project Overview' ;
$project_details = (!empty($asalah_data['asalah_translate_projectdetails'])) ? $asalah_data['asalah_translate_projectdetails'] : 'Описание' ;
$other_projects = (!empty($asalah_data['asalah_translate_otherprojects'])) ? $asalah_data['asalah_translate_otherprojects'] : 'Другие события' ;

?>
<?php while (have_posts()) : the_post(); ?>
<?php if (get_post_meta($post->ID, 'asalah_custom_title_bg', true)): ?>
    <style>
        .page_title_holder {
            background-image: url('<?php echo get_post_meta($post->ID, 'asalah_custom_title_bg', true); ?>');
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
<div class="page_title_holder container-fluid">
    <div class="container">
        <div class="page_info">
            <h1><?php the_title(); ?></h1>
            <?php asalah_breadcrumbs(); ?>

        </div>
        <?php if (asalah_cross_option('asalah_projects_navigation_show') != 'hide') { ?>
        <div class="page_nav clearfix">
            <?php
            $next_post = get_next_post();
            $prev_post = get_previous_post();
            ?>
            <?php if (asalah_cross_option('asalah_translate_project_single') != '' ) { $next_project = 'Next '.asalah_cross_option('asalah_translate_project_single'); $prev_project = 'Previous '.asalah_cross_option('asalah_translate_project_single'); } else { $prev_project = __("Next Project", 'asalah'); $next_project =  __("Previous Project", 'asalah'); } ?>

            <?php if (!empty($prev_post)): ?>
                <a title="<?php $prev_project; ?>" href="<?php echo get_permalink($prev_post->ID); ?>" id="right_nav_arrow" class="cars_nav_control right_nav_arrow"><i class="icon-angle-right"></i></a>
            <?php endif; ?>

            <?php if ($asalah_data['asalah_portfolio_url']): ?>
                <a href="<?php echo $asalah_data['asalah_portfolio_url']; ?>" id="main_portfolio_arrow" class="cars_portfolio_control"><i class="icon-th-large"></i></a>
            <?php endif; ?>

            <?php if (!empty($next_post)): ?>
                <a title="<?php echo $next_project; ?>" href="<?php echo get_permalink($next_post->ID); ?>" id="left_nav_arrow" class="cars_nav_control left_nav_arrow"><i class="icon-angle-left"></i></a>
            <?php endif; ?>
        </div>
        <?php } ?>
    </div>
</div>
<!-- end post title holder -->
<section class="main_content">
    <!-- start single portfolio container -->

      <?php
      // Project Layout
      $portfolio_layout = asalah_cross_option('asalah_project_layout');
      if (get_post_meta($post->ID, 'asalah_post_layout', true) != '') {
        $portfolio_layout = get_post_meta($post->ID, 'asalah_post_layout', true);
      }
      // Project Details
      $project_details_show = asalah_cross_option('asalah_project_meta_info');
      if (get_post_meta($post->ID, 'asalah_post_meta_info', true) != '') {
        $project_details_show = get_post_meta($post->ID, 'asalah_post_meta_info', true);
      }
      // Project Share
      $project_share_show = asalah_cross_option('asalah_project_share_box');
      if (get_post_meta($post->ID, 'asalah_post_share_box', true) != '') {
        $project_share_show = get_post_meta($post->ID, 'asalah_post_share_box', true);
      }

      ?>
        <div class="container new_section">
            <?php if ($portfolio_layout != 'full'): ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class('project_post row-fluid'); ?>>
                    <div class="span8 portfolio_banner blog_main_content <?php if ($portfolio_layout == 'left') {echo " pull-right";} ?>">
                      <?php asalah_banner(); ?>
                    </div>
                    <div class="span4 portfolio_details_content side_content <?php if ($portfolio_layout == 'left') {echo " pull-left";} ?>">
                      <?php if (asalah_cross_option('asalah_project_overview_show') != 'hide') { ?>
                        <div class="new_content">
                            <div class="portfolio_section_title">
                              <h4 class="page-header"><span class="page_header_title"><?php echo $project_overview; ?></span></h4>
                            </div>
                            <div class="portfolio_section_title">
                              <?php the_content(); ?>
                              <?php if (get_post_meta($post->ID, 'project_url', true) != ''):
                                $text = __("Live Preview ...", "asalah");
                                if (asalah_cross_option('asalah_preview_button_text') != '') {
                                  $text = asalah_cross_option('asalah_preview_button_text');
                                }?>
                                    <div class="live_preview_link"><a target="_blank" href="<?php echo get_post_meta($post->ID, 'project_url', true); ?>"><?php echo $text; ?></a></div>
                              <?php endif; ?>
                            </div>
                        </div>
                        <?php } ?>

                        <?php if ( $project_details_show != 'hide'): ?>
                            <div class="new_content">
                                <div class="portfolio_section_title">
                                  <h4 class="page-header"><span class="page_header_title"><?php echo $project_details; ?></span></h4>
                                </div>
                                <div class="portfolio_details_content">
                                  <?php if (get_post_meta($post->ID, 'asalah_project_client', true) != '') { ?>
                                        <div class="portfolio_details_item"><p><strong><?php _e("Client", "asalah"); ?>: </strong><?php echo get_post_meta($post->ID, 'asalah_project_client', true); ?></p></div>
                                  <?php } ?>
                                  <?php if (asalah_cross_option('asalah_project_show_date') != 'hide') { ?>
                                    <div class="portfolio_details_item">
                                      <p><strong><?php _e("Дата", "asalah"); ?>: </strong><?php echo $date = get_the_date('', $post->ID); ?></p>
                                    </div>
                                    <?php } ?>
                                    <?php if (asalah_cross_option('asalah_project_show_tag') != 'hide') { ?>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php
                        if (get_post_meta($post->ID, 'asalah_review_pos', true) == 'bottom') {
                            asalah_project_skills_list();
                        }
                        ?>

                        <?php
                        if ($project_share_show != 'hide') {
                              asalah_post_share();
                        }
                        ?>

                    </div>
                </div>
            <?php else: ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class('project_post'); ?>>
                    <div class="row-fluid new_content">
                        <div class="span12">
                          <?php asalah_banner(); ?>
                        </div>
                    </div>
                    <div class="row-fluid new_content full_width_project_details">
                        <div class="span12 ">
                          <?php if (asalah_cross_option('asalah_project_overview_show') != 'hide') { ?>
                            <div class="new_content">
                                <div class="portfolio_section_title">
                                  <h4 class="page-header"><span class="page_header_title"><?php echo $project_overview; ?></span></h4>
                                </div>
                                <?php the_content(); ?>
                                <?php if (get_post_meta($post->ID, 'project_url', true) != ''):
                                  $text = __("Live Preview ...", "asalah");
                                  if (asalah_cross_option('asalah_preview_button_text') != '') {
                                    $text = asalah_cross_option('asalah_preview_button_text');
                                  }?>
                                      <div class="live_preview_link"><a target="_blank" href="<?php echo get_post_meta($post->ID, 'project_url', true); ?>"><?php echo $text; ?></a></div>
                                <?php endif; ?>
                            </div>
                            <?php } ?>

                            <?php if ($project_details_show != 'hide'): ?>
                              <div class="new_content clearfix">
                                  <div class="portfolio_section_title">
                                    <h4 class="page-header"><span class="page_header_title"><?php echo $project_details; ?></span></h4>
                                  </div>
                                  <div class="portfolio_details_content">
                                    <?php if (get_post_meta($post->ID, 'asalah_project_client', true) != '') { ?>
                                          <div class="portfolio_details_item">
                                            <p><strong><?php _e("Client", "asalah"); ?>: </strong><?php echo get_post_meta($post->ID, 'asalah_project_client', true); ?></p>
                                          </div>
                                    <?php } ?>
                                    <?php if (asalah_cross_option('asalah_project_show_date') != 'hide') { ?>
                                    <div class="portfolio_details_item">
                                      <p><strong><?php _e("Date", "asalah"); ?>: </strong><?php echo $date = get_the_date('', $post->ID); ?></p>
                                    </div>
                                    <?php } ?>
                                    <?php if (asalah_cross_option('asalah_project_show_tag') != 'hide') { ?>
                                    <div class="portfolio_details_item">
                                      <p><strong><?php _e("Tags", "asalah"); ?>: </strong><?php $tags_list = get_the_term_list($post->ID, 'tagportfolio', '', ', ', ''); echo $tags_list; ?></p>
                                    </div>
                                    <?php } ?>
                                  </div>
                              </div>
                          <?php endif; ?>

                          <?php
                          if (get_post_meta($post->ID, 'asalah_review_pos', true) == 'bottom') {
                              asalah_project_skills_list();
                          }
                          if ($project_share_show != 'hide') {
                                asalah_post_share();
                          }
                          ?>
                      </div>
                  </div>
              </div>
          <?php endif ?>
        </div>

<?php if (asalah_cross_option('asalah_post_other') == 'show'): ?>
  <?php if(asalah_cross_option('asalah_other_projects_num') != '') {
    $other_pro_num = asalah_cross_option('asalah_other_projects_num');
    } else {
    $other_pro_num = '9';
  } ?>
  <?php if(asalah_cross_option('asalah_other_projects_slide_num') != '') {
    $other_pro_slide_num = asalah_cross_option('asalah_other_projects_slide_num');
    } else {
    $other_pro_slide_num = '3';
  } ?>
  <div class="container-fluid another_projects new_section">
    <div class="container">
      <div id="anotherprojects-<?php the_ID(); ?>" class="row-fluid">
        <div class="span12">
          <?php asalah_posts_carousel('anotherprojects-' . get_the_ID(), 'project', '', $other_pro_num, $other_projects, "", $other_pro_slide_num, "", "top", $post->ID); ?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>


<?php endwhile; ?>
<!-- end single portfolio container -->


<?php get_footer(); ?>