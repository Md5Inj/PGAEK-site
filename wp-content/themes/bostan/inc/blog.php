<?php
function home_page_news_cat() {
	global $asalah_data;
	$layout = $asalah_data['asalah_home_buildier_slider'];
	if ($layout):

		foreach ($layout as $option) {
			$box_title = $option['title'];
			$box_type = $option['type'];
			$cat_id = $option['cat'];
			
		if ($box_type == 'cat_news') {
			$wp_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 4, 'cat' => $cat_id, 'post_status' => 'publish'));
			
			if ( $wp_query->have_posts() ) :
			$category = get_the_category($cat_id);
			$order = 0;
			?>
				<div class="news_row row">
					<header class="content_banner news_cat_banner span8 clearfix">
						<?php asalah_cat_banner ($cat_id); ?>
						<div class="category_title" style="background:<?php echo $asalah_data["asalah_cat_". $cat_id . "_color2"]; ?>">
							<a href="<?php echo get_category_link( $cat_id ); ?>"><h3><?php echo $box_title; ?></h3></a>
						</div>
					</header>
					<div class="category_latest span8">
						<div class="row">
						<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
							<?php $order .= +1; ?>
							<?php if ($order == 1) { ?>
							<div class="category_latest_first span4">
								<div class="row">
									<div class="span4 post_thumbnail thumbeffect">
										<a href="<?php the_permalink(); ?>">
										<div class="dark-background"><div class="hoverplus"><i class="icon-link"></i></div></div>
										<?php asalah_blog_thumb(370, 220); ?></a>
									</div>
									<div class="span4 post_title">
										<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
									</div>
									<div class="span4 post_desc"><?php the_excerpt(); ?></div>
									<div class="span4 post_meta">
										<div class="meta_info">
										<span class="icon-time meta_icon"></span><span class="meta_text"><?php echo get_the_date(); ?> - <?php echo get_the_time(); ?></span>
										</div>
										
										<div class="meta_info">
										<span class="icon-pencil meta_icon"></span><span class="meta_text"><?php the_author_posts_link(); ?> </span>
										</div>
									</div>
								</div>
							</div>
							<div class="category_latest_more span4">
							<?php } ?>
							
							
							<?php if ($order > 1) { ?>
								<div class="row more_post_row">
									<div class="more_post span4">
										<div class="row">
											<div class="span post_thumbnail thumbeffect">
												<a href="<?php the_permalink(); ?>">
												<div class="dark-background"><div class="hoverplus"><i class="icon-link"></i></div></div>
												<?php asalah_blog_thumb(100, 100); ?></a>
											</div>
											<div class="post_desc">
												<div class="post_title">
													<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
												</div>
												
												<div class="post_meta visible-desktop visible-phone">
													<div class="meta_info">
													<span class="icon-time meta_icon"></span><span class="meta_text"><?php echo get_the_date(); ?> - <?php echo get_the_time(); ?></span>
													</div>
													
													<div class="meta_info">
													<span class="icon-pencil meta_icon"></span><span class="meta_text"><?php the_author_posts_link(); ?> </span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						<?php endwhile; ?>	
							</div>
							
							
						</div>
					</div>
				</div>
			<?php
			endif;
		}elseif($box_type == 'blog_style') {
			
			$wp_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 4, 'cat' => $cat_id, 'post_status' => 'publish'));
			
			if ( $wp_query->have_posts() ) :
			$category = get_the_category($cat_id);
			$order = 0;
			?>
				<div class="news_row_blog row">
					<header class="content_banner news_cat_banner span8 clearfix">
						<?php asalah_cat_banner ($cat_id); ?>
						<div class="category_title" style="background:<?php echo $asalah_data["asalah_cat_". $cat_id . "_color2"]; ?>">
							<a href="<?php echo get_category_link( $cat_id ); ?>"><h3><?php echo $box_title; ?></h3></a>
						</div>
					</header>
					<div class="blog_post_style_cats span8">
						<div class="row">
						<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
							<div class="category_latest span8">
							<?php get_template_part( 'content' ); ?>
                            </div>
						<?php endwhile; ?>								
						</div>
					</div>
				</div>
			<?php
			endif;
		
		}elseif($box_type == 'video_show') {
			home_page_video_show($box_title, $cat_id);
		}
		
		}// end foreach

	endif;
}

?>