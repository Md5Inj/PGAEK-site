<?php
    get_header();

    const SPECIALITY_PAGE_ID = [
        'buaik' => 28563,
        'pravo' => 28565,
        'poit' => 28561,
        'odvl' => 28567
    ];
?>
    <div class="page_title_holder container-fluid">
        <div class="container">
            <div class="page_info">
                <h1><?php the_title(); ?></h1>
                <?php asalah_breadcrumbs(); ?>
            </div>
        </div>
    </div>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php
            $currentPageId = get_queried_object_id();
            $rating = isset($_GET['rating']) ? $_GET['rating'] : "";
            $skills = isset($_GET['skills']) ? $_GET['skills'] : "";
            $pageNum = explode("/", get_self_link())[5];
            $offset = isset($pageNum) ? ($pageNum * 10) - 10 : 0;
            $args = array(
                'posts_per_page' => 10,
                'offset' => $offset,
                'post_type' => 'graduates',
                'meta_query' => array(
                    'asalah_graduate_speciality' => array(
                        'key' => 'asalah_graduate_speciality',
                        'value' => array_flip(SPECIALITY_PAGE_ID)[$currentPageId]
                    ),
                    'asalah_graduate_rating' => array(
                        'key' => 'asalah_graduate_rating',
                        'value' => $rating === "" ? 0 : $rating*2,
                        'compare' => '>='
                    ),
                    'asalah_graduate_skills' => array(
                        'key' => 'asalah_graduate_skills',
                        'value' => $skills,
                        'compare' => 'LIKE'
                    )
                )
            );
            $posts = get_posts($args);
            $args["posts_per_page"] = -1;
            $postsCount = count(get_posts($args));
            ?>
            <section class="students-page">
                <div class="pagination-wrapper">
                    <div class="filters">
                        <div class="form-group">
                            <form id="rating_form" method="get">
                                <select id="rating_select" name="rating" class="form-control">
                                    <option <?php echo $rating === "1" ? "selected" : $rating === "" ? "selected" : "" ?> value="1">1 и более</option>
                                    <option <?php echo $rating === "2" ? "selected" : "" ?> value="2">2 и более</option>
                                    <option <?php echo $rating === "3" ? "selected" : "" ?> value="3">3 и более</option>
                                    <option <?php echo $rating === "4" ? "selected" : "" ?> value="4">4 и более</option>
                                    <option <?php echo $rating === "5" ? "selected" : "" ?> value="5">5 и более</option>
                                </select>
                                <input type="text" class="form-control" name="skills" value="<?php echo $_GET['skills']; ?>" placeholder="Профессиональные навыки">
                                <input type="submit" value="Применить"/>
                                <input type="submit" value="X" id="reloadPageBtn"/>
                            </form>
                        </div>
                    </div>

                    <?php asalah_bootstrap_pagination(ceil($postsCount / 10)); ?>
                </div>
                <div class="container-fluid">
                    <div class="row students-row pt-4 text-center">
                        <?php foreach ($posts as $post): ?>
                            <?php $post_meta = get_post_meta($post->ID); setup_postdata($post); ?>
                            <div class="offset-md-1 col-md-2 d-flex">
                                <div class="card" style="width: 100%; border-radius: 16px; border-width: 0">
                                    <div class="card-body flex-fill">
                                        <?php echo get_the_post_thumbnail($post, 'thumbnail', array('class' => 'img-fluid')); ?>
                                        <h5 class="card-title-custom"><?php echo explode(" ", get_the_title($post))[0] ?></h5>
                                        <h6 class="card-subtitle-custom"><?php echo explode(" ", get_the_title($post))[1] . " " . explode(" ", get_the_title($post))[2] ?></h6>
                                        <div class="rating">
                                            <?php
                                            $rating = $post_meta["asalah_graduate_rating"][0];
                                            $rating = (double)$rating / 2;
                                            echo $rating;
                                            for ($rate = 0; $rate < 5; $rate++) {
                                                if ($rate < floor($rating)) {
                                                    ?>
                                                    <span class="fa fa-star checked"></span>
                                                <?php } else if (round($rating) == $rate + 1) { ?>
                                                    <span class="fa fa-star half-checked"></span>
                                                <?php } else { ?>
                                                    <span class="fa fa-star"></span>
                                                <?php }
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="card-footer" style="background: none !important; border-top: 0;">
                                        <a href="<?php echo get_post_permalink($post) ?>" class="card-link">
                                            <button class="button-faculty-view">
                                                Просмотреть
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
            </section>
        </main>
    </div>

    <script type="text/javascript">
        let $ = jQuery;
        let reloadUrl = "<?php global $wp; echo home_url(add_query_arg(array(), $wp->request)); ?>"
        $('#reloadPageBtn').click(function (e) {
            e.preventDefault();
            window.location = reloadUrl;
        });
    </script>
<?php get_footer(); ?>