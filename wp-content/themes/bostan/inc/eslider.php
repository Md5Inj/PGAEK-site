<?php 

function eslider_items() {
	global $asalah_data;
	if ($asalah_data['asalah_home_eslider']):
	$slidernum = $asalah_data['asalah_home_eslider_num'];
	$wp_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => $slidernum, 'post_status' => 'publish'));
	if ( $wp_query ) :
	?>
    <div class="visible-desktop eslider_content row-fluid clearfix" >
        <div id="ei-slider" class="ei-slider span12">
            <ul class="ei-slider-large">
                <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                <li>
                    <?php asalah_blog_thumb(570, 321); ?>
                    <div class="ei-title">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php if (get_the_excerpt()):?>
                        <h3><?php the_excerpt(); ?></h3>
                        <?php endif; ?>
                        
                    </div>
                </li>
                <?php endwhile;  ?>
             </ul>
             <ul class="ei-slider-thumbs">
                <li class="ei-slider-element">Current</li>
                <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                <li>
                    <a href="#"><?php the_title(); ?></a><?php asalah_blog_thumb(170, 100); ?>
                </li>
                <?php endwhile;  ?>
             </ul>
    	</div>
    </div>
    
    <script type="text/javascript">
		jQuery(function() {
			jQuery('#ei-slider').eislideshow({
				animation			: 'center',
				autoplay			: true,
				slideshow_interval	: 3000,
				titlesFactor		: 0,
				thumbMaxWidth		: false,
				speed: 600,
			});
		});
	</script>

        
        
    <?php
    endif; //if wp_query

endif; //if slider is enables
}

?>