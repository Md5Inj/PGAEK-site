<?php
// popular list
function popular_posts_view_list($number = "3", $width="wide"){  
        global $wpdb, $post_views_table; 
        $popular = $wpdb->get_results("SELECT * FROM {$post_views_table} ORDER BY views DESC LIMIT 0,{$number}",ARRAY_N);
		?>
        <?php
        foreach($popular as $post){  
            $ID = $post[1];
            $views = number_format($post[2]);
            $post_url = get_permalink($ID);
            $title = get_the_title($ID);
			$date = get_the_date('', $ID);
			$time = get_the_time('', $ID);
			
			
			?>
            <div class="row-fluid <?php if ($width == "wide") { echo "wide_post_list ";}elseif($width == "narrow") { echo "narrow_post_list ";} ?> post_list_row">
            
                <div class="<?php if ($width == "wide") { echo "span12 ";}elseif($width == "narrow") { echo "span6 ";} ?> post_list_thumbnail thumbeffect">
                    <?php if ($width == "wide") {
						?><a href="<?php echo $post_url; ?>">
						<div class="dark-background"><div class="hoverplus"><i class="icon-link"></i></div></div>
						<?php
						asalah_blog_thumb(370, 136, $ID);
						?></a><?php
					}elseif($width == "narrow") {
						?><a href="<?php echo $post_url; ?>">
						<div class="dark-background"><div class="hoverplus"><i class="icon-link"></i></div></div>
						<?php
						asalah_blog_thumb(370, 226, $ID);
						?></a><?php
					} ?>
					
                    
                </div>
                
                <div class="<?php if ($width == "wide") { echo "span12 ";}elseif($width == "narrow") { echo "span6 ";} ?> post_list_title">
                    <a href='<?php echo $post_url; ?>'><h5><?php echo $title; ?></h5></a>
                    <div class="post_meta">
                        <div class="meta_info">
                        <span class="meta_text"><?php echo $date; ?> - <?php echo $time; ?></span>
                        </div>
                    </div>
                </div>
                           
            </div>
            <?php
        }
		?>
        <?php  
}

function latest_reviews_list($number = "3", $width="wide"){  
		$wp_query = new WP_Query(array('meta_key' => 'asalah_review_pos', 'meta_value' => 'bottom', 'post_type' => 'post', 'posts_per_page' => $number));
		?>
        <?php
		if ( $wp_query->have_posts() ) :
        while ( $wp_query->have_posts() ) : $wp_query->the_post();  
            $ID = get_the_ID();
            $post_url = get_permalink($ID);
            $title = get_the_title($ID);
			$date = get_the_date('', $ID);
			$time = get_the_time('', $ID);
			
			
			?>
            <div class="row-fluid <?php if ($width == "wide") { echo "wide_post_list ";}elseif($width == "narrow") { echo "narrow_post_list ";} ?> post_list_row">
            
                <div class="<?php if ($width == "wide") { echo "span12 ";}elseif($width == "narrow") { echo "span6 ";} ?> post_list_thumbnail thumbeffect">
                    <?php if ($width == "wide") {
						?>
                        <a href="<?php echo $post_url; ?>">
						<div class="dark-background"><div class="hoverplus"><i class="icon-bar-chart"></i></div></div>
						<?php
						asalah_blog_thumb(370, 136, $ID);
						?></a><?php
					}elseif($width == "narrow") {
						?><a href="<?php echo $post_url; ?>">
						<div class="dark-background"><div class="hoverplus"><i class="icon-bar-chart"></i></div></div>
						<?php
						asalah_blog_thumb(370, 226, $ID);
						?></a><?php
					} ?>
					
                    
                </div>
                
                <div class="<?php if ($width == "wide") { echo "span12 ";}elseif($width == "narrow") { echo "span6 ";} ?> post_list_title">
                    <a href='<?php echo $post_url; ?>'><h5><?php echo $title; ?></h5></a>
                    <div class="post_meta">
                        <div class="meta_info">
                        <span class="meta_text"><?php echo $date; ?> - <?php echo $time; ?></span>
                        </div>
                    </div>
                </div>
                           
            </div>
            <?php
        endwhile;
		endif;
		?>
        <?php  
} 

// latest list
function recent_posts_list($number = "3", $width="wide"){
		$wp_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => $number, 'post_status' => 'publish'));
		?>
        <?php
		if ( $wp_query->have_posts() ) :
        while ( $wp_query->have_posts() ) : $wp_query->the_post();  
            $ID = get_the_ID();
            $post_url = get_permalink($ID);
            $title = get_the_title($ID);
			$date = get_the_date('', $ID);
			$time = get_the_time('', $ID);
			
			
			?>
            <div class="row-fluid <?php if ($width == "wide") { echo "wide_post_list ";}elseif($width == "narrow") { echo "narrow_post_list ";} ?> post_list_row">
            
                <div class="<?php if ($width == "wide") { echo "span12 ";}elseif($width == "narrow") { echo "span6 ";} ?> post_list_thumbnail thumbeffect">
                    <?php if ($width == "wide") {
						?>
                        <a href="<?php echo $post_url; ?>">
						<div class="dark-background"><div class="hoverplus"><i class="icon-link"></i></div></div>
						<?php
						asalah_blog_thumb(370, 136, $ID);
						?></a><?php
					}elseif($width == "narrow") {
						?><a href="<?php echo $post_url; ?>">
						<div class="dark-background"><div class="hoverplus"><i class="icon-link"></i></div></div>
						<?php
						asalah_blog_thumb(370, 226, $ID);
						?></a><?php
					} ?>
					
                    
                </div>
                
                <div class="<?php if ($width == "wide") { echo "span12 ";}elseif($width == "narrow") { echo "span6 ";} ?> post_list_title">
                    <a href='<?php echo $post_url; ?>'><h5><?php echo $title; ?></h5></a>
                    <div class="post_meta">
                        <div class="meta_info">
                        <span class="meta_text"><?php echo $date; ?> - <?php echo $time; ?></span>
                        </div>
                    </div>
                </div>
                           
            </div>
            <?php
        endwhile;
		endif;
		?>
        <?php  
} 

// random list
function random_posts_list($number = "3", $width="wide"){
		$wp_query = new WP_Query(array('orderby' => 'rand', 'post_type' => 'post', 'posts_per_page' => $number, 'post_status' => 'publish'));
		?>
        <?php
		if ( $wp_query->have_posts() ) :
        while ( $wp_query->have_posts() ) : $wp_query->the_post();  
            $ID = get_the_ID();
            $post_url = get_permalink($ID);
            $title = get_the_title($ID);
			$date = get_the_date('', $ID);
			$time = get_the_time('', $ID);
			
			
			?>
            <div class="row-fluid <?php if ($width == "wide") { echo "wide_post_list ";}elseif($width == "narrow") { echo "narrow_post_list ";} ?> post_list_row">
            
                <div class="<?php if ($width == "wide") { echo "span12 ";}elseif($width == "narrow") { echo "span6 ";} ?> post_list_thumbnail thumbeffect">
                    <?php if ($width == "wide") {
						?><a href="<?php echo $post_url; ?>">
						<div class="dark-background"><div class="hoverplus"><i class="icon-link"></i></div></div>
						<?php
						asalah_blog_thumb(370, 136, $ID);
						?></a><?php
					}elseif($width == "narrow") {
						?><a href="<?php echo $post_url; ?>">
						<div class="dark-background"><div class="hoverplus"><i class="icon-link"></i></div></div>
						<?php
						asalah_blog_thumb(370, 226, $ID);
						?></a><?php
					} ?>
					
                    
                </div>
                
                <div class="<?php if ($width == "wide") { echo "span12 ";}elseif($width == "narrow") { echo "span6 ";} ?> post_list_title">
                    <a href='<?php echo $post_url; ?>'><h5><?php echo $title; ?></h5></a>
                    <div class="post_meta">
                        <div class="meta_info">
                        <span class="meta_text"><?php echo $date; ?> - <?php echo $time; ?></span>
                        </div>
                    </div>
                </div>
                           
            </div>
            <?php
        endwhile;
		endif;
		?>
        <?php  
} 

function ticker_news_list($number = "10"){
		$wp_query = new WP_Query(array('orderby' => 'rand', 'post_type' => 'post', 'posts_per_page' => $number, 'post_status' => 'publish'));
		?>
            
        <?php if ( $wp_query->have_posts() ) : ?>
        <ul id="js-news" class="hidden" name="<?php _e('LATEST', 'asalah'); ?>">
        <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
			<li class="news-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
        </ul>
        <?php endif;
}
?>