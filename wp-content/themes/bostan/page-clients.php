<?php
/*
Template Name: Clients
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
  if (asalah_cross_option('asalah_client_number')) {
    $post_number = asalah_cross_option('asalah_client_number');
  }

  $order = "date";
  if (asalah_cross_option('asalah_client_order')) {
    $order = asalah_cross_option('asalah_client_order');
  }
	$wp_query = new WP_Query(array('post_type' => 'client', 'paged' => get_query_var( 'paged' ), 'posts_per_page' => $post_number, 'orderby' => $order));
?>
<!-- end post title holder -->
<section class="main_content page_client">
    <div class="container">
	<!-- start single portfolio container -->
	<?php if ( $wp_query ) : ?>
    <div id="clients_page">
          <div class="blog_description">
            <?php the_content(); ?>
          </div>
          <div class="clients_content">
              <div class="clients_box ">
                <ul class="clients_list ">
                  <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

                  <?php $the_client_url = get_post_meta($post->ID, 'client_url', true); ?>

                  <li class="span3">
                    <?php if ($the_client_url != '') { ?>
                    <a style="display:block" target="_blank" href="<?php echo $the_client_url; ?>" class="post-tooltip tooltip-n" original-title="<?php the_title(); ?>">
                    <?php } else { ?>
                    <div style="display:block" class="post-tooltip tooltip-n" original-title="<?php the_title(); ?>">
                    <?php } ?>
                      <div class="client_item clearfix" style="position: relative;"><?php client_logo(); ?></div>
                      <?php if ($the_client_url != '') { ?>
                      </a>
                      <?php } else { ?>
                      </div>
                      <?php } ?>
                  </li>
                  <?php endwhile; ?>
                </ul>
              </div>
          </div>
          </div>

          <?php asalah_bootstrap_pagination(); ?>
	<?php endif; ?>
	<!-- end single portfolio container -->
</div>

<?php get_footer(); ?>