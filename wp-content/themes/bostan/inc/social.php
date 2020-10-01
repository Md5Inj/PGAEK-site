<?php

function asalah_post_share() {
    ?>
    <div class="social_share clearfix">
        <div class="fbshare socialbutton">
            <div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-width="260" data-show-faces="true"></div>
        </div>

        <div class="twtweet socialbutton">
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-lang="en">Tweet</a>
            <script>!function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (!d.getElementById(id)) {
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "https://platform.twitter.com/widgets.js";
                        fjs.parentNode.insertBefore(js, fjs);
                    }
                }(document, "script", "twitter-wjs");</script>
        </div>

        <div class="gpbutton socialbutton">
            <!-- Place this tag where you want the +1 button to render. -->
            <div class="g-plusone" data-size="medium" data-href="<?php the_permalink(); ?>"></div>

            <!-- Place this tag after the last +1 button tag. -->
            <script type="text/javascript">
                (function() {
                    var po = document.createElement('script');
                    po.type = 'text/javascript';
                    po.async = true;
                    po.src = 'https://apis.google.com/js/plusone.js';
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(po, s);
                })();
            </script>
        </div>

        <div class="pinit socialbutton">
            <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo asalah_post_thumb(); ?>" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
        </div>

    </div>
    <?php
}

// social icons
function asalah_social_icons() {
    global $asalah_data;
    ?>
    <li><a href="https://www.youtube.com/channel/UCtqeuXgR4GGcQC7KsPaEgTw" target="_blank"><i class="icon-youtube" title="Youtube"></i></a></li>
    <li><a href="https://vk.com/pgaek" target="_blank"><i class="icon-vk" title="VK"></i></a></li>
    <?php if ($asalah_data['asalah_pin_url']): ?>
        <li><a href="<?php echo $asalah_data['asalah_pin_url']; ?>" target="_blank"><i class="icon-pinterest" title="Pinterest"></i></a></li>
    <?php endif; ?>
    <?php if ($asalah_data['asalah_500px_url']): ?>
        <li><a href="<?php echo $asalah_data['asalah_500px_url']; ?>" target="_blank"><i class="icon-fivehundredpx" title="500PX"></i></a></li>
    <?php endif; ?>
    <?php if ($asalah_data['asalah_github_url']): ?>
        <li><a href="<?php echo $asalah_data['asalah_github_url']; ?>" target="_blank"><i class="icon-github-circled" title="Github"></i></a></li>
            <?php endif; ?>

    <?php if ($asalah_data['asalah_flickr_url']): ?>
        <li><a href="<?php echo $asalah_data['asalah_flickr_url']; ?>" target="_blank"><i class="icon-flickr" title="Flickr"></i></a></li>
    <?php endif; ?>
        <li class="lang notranslate en united-states" data-attr="English" data-lang="English"><a>EN</a></li>
        <li class="lang notranslate be Belarusian" data-attr="Belarusian" data-lang="Belarusian"><a>BY</a></li>
        <li class="lang notranslate ru Russian" data-attr="Russian" data-lang="Russian"><a>RU</a></li>
        <?php if (get_current_user_id() != 0 && get_userdata(get_current_user_id())->user_level < 10) { ?>
        <li class="lang"><a href="<?php echo wp_logout_url( "/" ); ?>"><i class="icon-logout" title="logout"></i>Выйти</a></li>
        <?php } ?>
        
    <?php if (!is_user_logged_in()): ?><li><a href="/wp-login.php" target="_blank" class="langChanger"><i class="icon-login" title="login"></i>Войти</a></li>
    <?php endif; ?> 

    <?php
}

// Facebook Open Graph
add_action('wp_head', 'add_algarida_og', 30);

function add_algarida_og() {
    global $asalah_data;
    if ($asalah_data['asalah_use_og']):
        ?>
        <?php if ($asalah_data['asalah_fb_id']): ?>
            <meta property="fb:app_id" content="<?php echo $asalah_data['asalah_fb_id']; ?>" />
        <?php endif; ?>
        <?php
        if (is_single() || is_page()) {
            global $post;
            $image = asalah_post_thumb();
            $title = single_post_title('', FALSE);
            $description = strip_tags(get_the_excerpt());
            $url = get_permalink();
            ?>
            <meta property="og:title" content="<?php echo $title; ?>" />
            <meta property="og:description" content="<?php echo $description; ?>" />
            <meta property="og:type" content="article" />
            <meta property="og:image" content="<?php echo $image; ?>" />
            <meta property="og:url" content="<?php echo $url; ?>"/>
        <?php
        } else {
            $sitename = get_bloginfo('name');
            $description = get_bloginfo('description');
            $url = home_url();
            $image = asalah_default_image();
            ?>
            <meta property="og:site_name" content="<?php echo $sitename; ?>" />
            <meta property="og:description" content="<?php echo $description; ?>" />
            <meta property="og:type" content="website" />
            <meta property="og:image" content='<?php echo $image; ?>' />
            <meta property="og:url" content="<?php echo $url; ?>"/>
        <?php } ?>
        <?php
    endif;
}
?>
