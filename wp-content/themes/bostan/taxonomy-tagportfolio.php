<?php
/*
Template Name: Portfolio
*/
?>
<?php get_header(); ?>
<!-- post title holder -->
<div class="page_title_holder">
	<div class="container">
		<div class="page_info">
        	<?php $current_tag = single_tag_title("", false); ?>
			<h1><?php single_tag_title(); ?></h1>
			<?php asalah_breadcrumbs($current_tag); ?>
		</div>
		<div class="page_nav">

		</div>
	</div>
</div>
<?php
	
	$count =0;
?>
<!-- end post title holder -->
<section class="main_content">
	<!-- start single portfolio container -->
	<?php if ( $wp_query ) : ?>
	<div class="container services new_section">
		<div id="post-<?php the_ID(); ?>" <?php post_class('portfolio_page row'); ?>>
			<div class="span12 portfolio_items">
				<ul div id="portfolio_container" class="thumbnails">
					<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
						<li class="portfolio_element span4 <?php asalah_portfolio_tag(); ?>">
							<div class="portfolio_item">
                            <?php asalah_slideshow(); ?>
								<div class="portfolio_thumbnail">
									<?php asalah_blog_thumb("720","518") ?>
									<div class="portfolio_overlay">
                                    </div>
                                    <div class="center-bar">
                                        <a class="prettyPhotolink icon-search goup" rel="slideshow_<?php echo $post->ID; ?>"></a>
                                    </div>
								</div>
								<div class="portfolio_info">
									<a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
                            		<span class="portfolio_category"><?php $tags_list = get_the_term_list( $post->ID, 'tagportfolio', '',', ',''); echo $tags_list; ?></span>
								</div>
							</div>
						</li>
					<?php endwhile; ?>
				</ul>
				<?php asalah_bootstrap_pagination(); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<!-- end single portfolio container -->


<?php get_footer(); ?>