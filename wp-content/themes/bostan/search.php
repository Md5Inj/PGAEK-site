<?php
	get_header();
?>
<!-- post title holder -->
<div class="page_title_holder">
	<div class="container">
		<div class="page_info">
			<h1>
<?php
	echo "Результаты поиска по запросу: \"".get_search_query()."\"";
?>
			</h1>
<?php
	$currbread = get_search_query();
	asalah_breadcrumbs($currbread);
?>
		</div>
	</div>
</div>

<section class="main_content">

	<div class="container blog_style_1 blog_page blog_posts new_section">
		<div class="row-fluid">
			<div class="<?php
if (is_active_sidebar('sidebar-cat')) {
    echo "span12";
} else {
    echo "span12";
}
?>">

<?php
	if (have_posts()):
?>

<?php
    if ($wp_query):
?>

<?php
        while ($wp_query->have_posts()):
            $wp_query->the_post();
?>
					<article>
<?php
	if ((get_post_meta($post->ID, 'asalah_post_type', true) != 'none') || (get_post_format($post->ID) != '')):
?>
                        <div>
<?php
	$post_type = get_post_type();
	switch ($post_type) {
		case 'page':
			$post_type = "Страница";
			break;
		case 'post':
			$post_type = "Новость";
			break;
		default:
			break;
	}

	if (get_post_type() != "team"){
		echo "<div class=\"post_content\">";
		echo "<a class=\"searchTitle\" href=\"".get_permalink()."\">".get_the_title()."</a>";
		echo "<span>".wp_trim_words( get_the_excerpt(), 20)."</span>";
		echo "<span><strong style=\"font-weight: 600;\">Категория: </strong>".$post_type."</span>";
		echo "</div>";
	}
?>
						</div>
<?php
            endif;
?>

						<div class="blog_info clearfix">
							<?php
            if (asalah_cross_option('asalah_post_format_icon') != 'hide') {
?>
                            <div class="blog_box_item post_type_box_item">
                                <?php
                asalah_blog_icon();
?>
                            </div>
                            <?php
            }
?>
							<div class="blog_heading">
								<div class="blog_title">
									<a href="<?php
            the_permalink();
?>"><h3><?php

?></h3></a>
								</div>
								<?php
            if (asalah_cross_option('asalah_post_meta_info') != 'hide') {
                asalah_meta_info();
            }
?>
                                <div class="blog_description">
                                    <p><?php
            echo excerpt(60);
?></p>
																		<?php
            if (asalah_cross_option('asalah_post_meta_info_tag') != 'hide') {
?>
                                    <div class="blog_post_tags clearfix"><?php
                the_tags("", "", "");
?></div>
																		<?php
            }
?>
                                    <div class="read_more_link read_more_button"><a href="<?php
            the_permalink();
?>" class="btn btn-3 btn-3e icon-forward"><?php
            _e("Читать далее...", "asalah");
?></a></div>
                                </div>
							</div>

						</div>

					</article>
				<?php
        endwhile;
        asalah_bootstrap_pagination();
    endif;
else:
?>
		<header class="page-header">
				<h1 class="page-title error_title"><?php
    esc_html_e('Ничего не найдено', 'daynight');
?></h1>
		</header>

		<div class="error_search_container">
				<?php
    get_search_form();
?>
		</div>
	<?php
endif;
?>
			</div>
			<?php
if (is_active_sidebar('sidebar-cat')) {
?>
			<aside class="span3">
				<h3 class="hidden"><?php
    _e('Blog Sidebar', 'asalah');
?></h3>

			</aside>
			<?php
}
?>
		</div>
	</div>

	<!-- end single portfolio container -->

<?php
get_footer();
?>