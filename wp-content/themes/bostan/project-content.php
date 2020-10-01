<?php while (have_posts()) : the_post(); ?>
<li class="portfolio_element span4 <?php asalah_portfolio_tag(); ?>" data-projectid="<?php echo $post->ID; ?>">
  <div class="portfolio_item">
                <?php asalah_slideshow(); ?>
    <div class="portfolio_thumbnail">
      <?php asalah_blog_thumb("720","518") ?>
      <div class="portfolio_overlay">
                        </div>
                        <?php if (isset($asalah_data['asalah_portfolio_icon']) && $asalah_data['asalah_portfolio_icon'] == 'url'): ?>
                        <div class="center-bar">
                            <a class="icon-link" href="<?php the_permalink(); ?>"></a>
                        </div>
                        <?php else: ?>
                        <div class="center-bar">
                            <a class="prettyPhotolink icon-search goup" rel="slideshow_<?php echo $post->ID; ?>"></a>
                        </div>
                        <?php endif; ?>

    </div>
    <div class="portfolio_info">
      <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
                    <span class="portfolio_category"><?php $tags_list = get_the_term_list( $post->ID, 'tagportfolio', '',', ',''); echo $tags_list; ?></span>
    </div>
  </div>
</li>
<?php endwhile; ?>