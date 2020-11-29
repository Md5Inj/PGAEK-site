<?php
    get_header();
    global $post;
    $post_meta = get_post_meta($post->ID); setup_postdata($post);
    const SPECIALITY = [
        'buaik' => 'Бухгалтерский учёт, анализ и контроль',
        'pravo' => 'Правоведение',
        'poit' => 'Программное обеспечение информационных технологий',
        'odvl' => 'Операционная деятельность в логистике'
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

<section class="main_content">
    <div class="container new_section">
        <div id="post-<?php the_ID(); ?>" <?php post_class('project_post row-fluid team-single'); ?>>
            <section class="information">
                <div class="container-fluid">
                    <div class="row students-row pt-4 pb-4 pr-2">
                        <div class="col-md-3 col-xs-12 person-info">
                            <div class="card" style="width: 97%; border-radius: 16px; border-width: 0">
                                <div class="card-body">
                                    <div class="card-body-title">
                                        <?php echo get_the_post_thumbnail($post, 'thumbnail', "mx-auto d-block img-fluid" ); ?>
                                        <h5 class="profilecard-title-custom text-center"><?php echo explode(" ", get_the_title($post))[0] ?></h5>
                                        <h6 class="profilecard-subtitle-custom text-center">
                                            <?php echo explode(" ", get_the_title($post))[1] . " " . explode(" ", get_the_title($post))[2] ?>
                                        </h6>
                                    </div>
                                    <div class="main-information">
                                        <h5 class="main-information-title">Образование</h5>
                                        <p class="education-text">
                                            <?php echo $post_meta["asalah_graduate_education"][0]; ?>
                                        </p>
                                        <p class="speciality" style="margin-bottom: 0">
                                            <span class="keyword">Специальность</span>
                                            <?php echo SPECIALITY[$post_meta["asalah_graduate_speciality"][0]]; ?>
                                        </p>
                                        <p class="qualification" style="margin-bottom: 0">
                                            <span class="keyword">Квалификация</span>
                                            <?php echo $post_meta["asalah_graduate_qualification"][0]; ?>
                                        </p>
                                        <h5 class="main-information-title">Контактные данные</h5>
                                        <p class="mobile-phone" style="margin-bottom: 0">
                                            <span class="keyword">Мобильный телефон:</span>
                                        </p>
                                        <p class="number" style="margin-bottom: 0">
                                            <?php echo $post_meta["asalah_graduate_modbile"][0]; ?>
                                        </p>
                                        <p class="email" style="margin-bottom: 0">
                                            <span class="keyword">Электронная почта:</span>
                                        </p>
                                        <p class="address" style="margin-bottom: 0">
                                            <?php echo $post_meta["asalah_graduate_email"][0]; ?>
                                        </p>
                                        <h5 class="main-information-title">Социальные сети</h5>
                                        <div class="social">
                                            <?php if ($post_meta["asalah_graduate_twitter"][0] !== "" && isset($post_meta["asalah_graduate_twitter"][0])) { ?>
                                                <a href="<?php echo $post_meta["asalah_graduate_twitter"][0] ?>" target="_blank"><div class="icon icon-twitter"></div></a>
                                            <?php } ?>

                                            <?php if ($post_meta["asalah_graduate_fb"][0] !== "" && isset($post_meta["asalah_graduate_fb"][0])) { ?>
                                                <a href="<?php echo $post_meta["asalah_graduate_fb"][0] ?>" target="_blank"><div class="icon icon-facebook"></div></a>
                                            <?php } ?>

                                            <?php if (isset($post_meta["asalah_graduate_vk"][0])) { ?>
                                                <a href="<?php echo $post_meta["asalah_graduate_vk"][0] ?>" target="_blank"><div class="icon icon-vk"></div></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 main-information-block">
                            <div class="container-fluid">
                                <div class="row">
                                    <div
                                            class="card"
                                            style="width: 97%; border-radius: 16px; border-width: 0"
                                    >
                                        <div class="card-body">
                                            <h5 class="information-header-text">Карьерная цель</h5>
                                            <p class="text-information">
                                                <?php echo $post_meta["asalah_graduate_goal"][0]; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-4">
                                    <div
                                            class="card"
                                            style="width: 97%; border-radius: 16px; border-width: 0"
                                    >
                                        <div class="card-body">
                                            <h5 class="information-header-text">Достижения</h5>
                                            <p class="text-information">
                                                <?php echo $post_meta["asalah_graduate_achievements"][0]; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-4">
                                    <div
                                            class="card"
                                            style="width: 97%; border-radius: 16px; border-width: 0"
                                    >
                                        <div class="card-body">
                                            <h5 class="information-header-text">Личные качества</h5>
                                            <p class="text-information">
                                                <?php echo $post_meta["asalah_graduate_qualities"][0]; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($post_meta["asalah_graduate_speciality"][0] === "poit"): ?>
                                <div class="row pt-4">
                                    <div
                                            class="card"
                                            style="width: 97%; border-radius: 16px; border-width: 0"
                                    >
                                        <div class="card-body">
                                            <h5 class="information-header-text">Репозиторий</h5>
                                            <p class="text-information">
                                                <a href="<?php echo $post_meta["asalah_graduate_repo"][0]; ?>"><?php echo $post_meta["asalah_graduate_repo"][0]; ?></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12 soft-skills">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="card" style="width: 97%; border-radius: 16px; border-width: 0">
                                        <div class="card-body">
                                            <h5 class="information-header-text">Профессиональные навыки</h5>
                                            <p class="text-information">
                                                <?php echo $post_meta["asalah_graduate_skills"][0]; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-4">
                                    <div
                                            class="card"
                                            style="width: 97%; border-radius: 16px; border-width: 0"
                                    >
                                        <div class="card-body">
                                            <h5 class="information-header-text">Иностранные языки</h5>
                                            <p class="text-information">
                                                <?php echo $post_meta["asalah_graduate_languages"][0]; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

<?php get_footer(); ?>
