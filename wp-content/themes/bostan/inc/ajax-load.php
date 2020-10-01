<?php

define('WP_USE_THEMES', false);
$wpdir = explode( "wp-content" , __FILE__ );
require $wpdir[0] . "wp-load.php";

$loopFile        = $_POST['loop_file'];
$paged           = $_POST['page_no'];
$posts_per_cycle  = $_POST['posts_per_page'];
$post_type  = $_POST['post_type'];
$ajaxpost_id = $_POST['pageid'];
$tag = $_POST['tag'];
$projectspan = $_POST['projectspan'];
if ( isset($_POST['exclude']) && $_POST['exclude'] != '' ) {
  $excluded_array = explode(",", $_POST['exclude']);
  $args['post__not_in'] = $excluded_array;
}
if ( isset( $_GET[ 'wpml_lang' ] ) ) {
    do_action( 'wpml_switch_language',  $_GET[ 'wpml_lang' ] ); // switch the content language
}
if (isset ($_POST['query_vars'])) {
$query_vars = $_POST['query_vars'];
$query_vars = json_decode(stripslashes($query_vars), true);
if (array_key_exists("page", $query_vars)) {
  $args = array();
} else {
$args = $query_vars;
}
}
# Load the posts
$args['posts_per_page'] = $posts_per_cycle;
$args['paged'] = $paged;
$args['post_type'] = $post_type;
$args['tagportfolio'] = $tag;
$showall_tag = '';
if ($tag == '') {
  $showall_tag = 'showallposts';
}
$wp_query = new WP_Query($args);

while (have_posts()) : the_post(); ?>
<li class="portfolio_element <?php asalah_portfolio_tag(); echo ' '.$showall_tag; echo ' '.$projectspan; ?>" data-projectid="<?php echo $post->ID; ?>">
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
<?php endwhile;
wp_reset_query();
exit;
?>