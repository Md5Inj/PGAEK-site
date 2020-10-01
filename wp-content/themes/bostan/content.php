<div id="post-<?php the_ID(); ?>" <?php post_class('row cat_post_row'); ?>>
    <?php global $asalah_data; $bloglayout = $asalah_data['asalah_blogstyle_layout']; ?>
    <div class="span post_thumbnail thumbeffect <?php if ($bloglayout == '50/50') { echo "span4"; }else{ echo 'span3';} ?>">
        <a href="<?php the_permalink(); ?>">
		<div class="dark-background"><div class="hoverplus"><i class="icon-link"></i></div></div>
		<?php asalah_blog_thumb(370, 220); ?></a>
    </div>
        
    <div class="post_desc <?php if ($bloglayout == '50/50') { echo "span4"; }else{ echo 'span5';} ?>">
        <div class="post_title">
            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
        </div>
        <div class="post_desc"><?php the_excerpt(); ?></div>
        <div class="post_meta">
            <div class="meta_info">
            <span class="icon-time meta_icon"></span><span class="meta_text"><?php echo get_the_date(); ?> - <?php echo get_the_time(); ?></span>
            </div>
            
            <div class="meta_info">
            <span class="icon-pencil meta_icon"></span><span class="meta_text"><?php the_author_posts_link(); ?> </span>
            </div>
        </div>
    </div>
</div>