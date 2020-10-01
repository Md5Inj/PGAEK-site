<?php
/*
Template Name: Page Builder (Container Width)
*/
?>
<?php get_header(); ?>

<!-- post title holder -->
<?php if (get_post_meta($post->ID, 'asalah_title_holder', true) == 'show'): ?>
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
<!-- end post title holder -->

<section class="main_content page_builder_content">
  <div class="container">

		<?php while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('blog_post'); ?>>
			<?php the_content(); ?>
		</div>
		<?php endwhile; ?>
  </div>


<?php get_footer(); ?>