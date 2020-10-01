<?php get_header(); ?>
<!-- post title holder -->


<?php while (have_posts()) : the_post(); ?>
    <?php $get_meta = get_post_custom($post->ID); ?>
<?php if (get_post_meta($post->ID, 'asalah_custom_title_bg', true)): ?>
    <style>
        .page_title_holder {
            background-image: url('<?php echo get_post_meta($post->ID, 'asalah_custom_title_bg', true); ?>');
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
    </div>
</div>
<!-- end post title holder -->
<section class="main_content">
    <!-- start single portfolio container -->

        <div class="container new_section">

                <div id="post-<?php the_ID(); ?>" <?php post_class('project_post row-fluid team-single'); ?>>
                    <div class="span4 "> <!-- portfolio_banner blog_main_content -->
                      <?php asalah_blog_thumb(); ?> <br> <br>

                                      <?php if ($get_meta['asalah_admin_position'][0] != ''): ?>
                                    <div class="admin_position"><strong>Должность: </strong><?php echo $get_meta['asalah_admin_position'][0]; ?></div>
                                <?php endif; ?>
                                <?php if ($get_meta['asalah_admin_fb'][0] != '') { ?>
                                          <p><strong>Образование: </strong><?php echo $get_meta['asalah_admin_fb'][0]; ?></p></li>
                                      <?php } ?>
                                      <?php if ($get_meta['asalah_admin_tw'][0] != '') { ?>
                                          <p><strong>Категория: </strong><?php echo $get_meta['asalah_admin_tw'][0]; ?></p></li>
                                      <?php } ?>
                    </div>
                    <div class="span8 portfolio_details_content side_content">
                      <?php if (asalah_cross_option('asalah_project_overview_show') != 'hide') { ?>
                        <div class="new_content">
                            <div class="portfolio_section_title">
                              <h4 class="page-header">
                                <span class="page_header_title"><?php the_title(); ?></span>
                              </h4>
                            </div>
                            <div class="portfolio_section_title">
                              <?php the_content(); ?>
                              <div class="team_social_bar clearfix ">
                                  <ul class="team_social_list">
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
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                </div>
        </div>


<?php endwhile; ?>
<!-- end single portfolio container -->


<?php get_footer(); ?>
