<?php

function slider_items() {
	global $asalah_data;
	if ($asalah_data['asalah_home_slider']):
	$slidernum = $asalah_data['asalah_home_slider_num'];
	$wp_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => $slidernum, 'post_status' => 'publish'));
	if ( $wp_query ) :
	?>

    <div class="visible-desktop slider_content content row clearfix">
    <div class="flex">
        <ul class="slides mainslider">
        <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
        <li class="single_slide span12">
            <div class="slider_main_row row">
                <div class="slider_image span6">
                    <?php asalah_blog_thumb(570, 321); ?>
                </div>
                <div class="slider_topic span">
                    <div class="row-fluid topic_title">
                        <div class="span12">
                            <a class="clearfix" href="<?php the_permalink(); ?>">
                                <h4><?php the_title(); ?></h4>
                            </a>
                        </div>
                    </div>

                    <div class="row-fluid topic_desc">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
                <div class="slider_related span">
                    <div class="row-fluid relating_title">
                        <div class="span12">
                            <a class="clearfix" href="#">
                                <h5><?php _e('Related','asalah'); ?></h5>
                            </a>
                        </div>
                    </div>
                    <div class="row-fluid related_topics">
                        <ul>
                            <?php $post_id = get_the_ID(); ?>
                            <?php related_posts_list($post_id); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </li>
        <?php endwhile; ?>
        </ul>
    </div>
    <script>
    // Can also be used with $(document).ready()
        jQuery(document).ready(function() {
          jQuery('.slider_content').flexslider({
            animation: "fade",
            controlNav: false

          });
        });
    </script>

    </div>


    <?php
    endif; //if wp_query

endif; //if slider is enables
}

?>