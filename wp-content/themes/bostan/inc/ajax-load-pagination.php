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
if (asalah_cross_option('asalah_portfolio_number', $ajaxpost_id)) {
  $args['posts_per_page'] = asalah_cross_option('asalah_portfolio_number', $ajaxpost_id);
} else {
  $args['posts_per_page'] = $posts_per_cycle;
}
$args['paged'] = $paged;
$args['post_type'] = $post_type;
$args['tagportfolio'] = $tag;

$wp_query = new WP_Query($args);
echo '<div class="pagination-tag" data-pagtag="'.$tag.'" data-tag="'.$tag.'" data-posttype="project" data-postsperpage="'.$posts_per_cycle.'" data-loopfile="project-content.php" data-pageid="">';
asalah_bootstrap_pagination();
echo "</div>";
?>