<?php get_header(); ?>
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
            $posts = get_posts(array(
                'numberposts' => 20,
                'post_type' => 'graduates'
            ));
            ?>
            <section class="students-page">
                <div class="container-fluid">
                    <div class="row students-row pt-4 text-center">
                        <?php foreach ($posts as $post): ?>
                            <?php $post_meta = get_post_meta($post->ID); ?>
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
                                                <?php } else if (round($rating) == $rate+1) { ?>
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


<?php get_footer(); ?>