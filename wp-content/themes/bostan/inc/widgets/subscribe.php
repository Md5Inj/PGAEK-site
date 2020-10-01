<?php
add_action('widgets_init', 'subscribe_widget_init');

function subscribe_widget_init() {
    register_widget('subscribe_widget');
}

class subscribe_widget extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'subscribe-widget', 'description' => '');
        $control_ops = array('width' => 250, 'height' => 350, 'id_base' => 'subscribe-widget');
        parent::__construct('subscribe-widget', theme_name . ' - subscribe', $widget_ops, $control_ops);
    }

    function widget($args, $instance) {
        extract($args);
        $title = (isset($instance['title'])) ? apply_filters('widget_title', $instance['title'] ) : '' ;
        $fb = isset($instance['fb']) ? $instance['fb'] : '' ;
        $fbappid = isset($instance['fbappid']) ? $instance['fbappid'] : '' ;
        $fbappsecret = isset($instance['fbappsecret']) ? $instance['fbappsecret'] : '' ;
        $tw = isset($instance['tw']) ? $instance['tw'] : '' ;
        $rss = isset($instance['rss']) ? $instance['rss'] : '' ;

        echo $before_widget;
        if ($title) :
            echo $before_title;
            echo $title;
            echo $after_title;
        endif;
        ?>


        <div class="subcscribe_widget_wrapper">
        <?php if (isset($fb) && !empty($fbappid) && !empty($fbappsecret)) { ?>
            <?php
            $url = wp_remote_get("https://graph.facebook.com/" . $fb. "?fields=name,fan_count,likes&access_token=".$fbappid."|".$fbappsecret."");
            if (wp_remote_retrieve_response_code($url) != '404') {
              $opengraph = json_decode(wp_remote_retrieve_body($url));
              if (isset($opengraph) && !isset($opengraph->error)) {
                $counter_number = $opengraph->fan_count;
                ?>
                    <div class="facebook_counter social_counter clearfix">
                        <a href="https://www.facebook.com/<?php echo $fb; ?>" class="social_counter_link">
                            <span class="counter_icon facebook_counter_icon"><i class="icon-facebook"></i></span>
                            <strong class="counter_number"><?php echo $counter_number; ?></strong>
                            <span class="counter_users_word"><?php _e("fans", "asalah"); ?></span>
                        </a>
                    </div>
                <?php
              } else {
                echo __('Incorrect Data, please recheck', 'asalah');
              }
            } else {
              echo __('Cannot connect to the internet', 'asalah');
            }

           } ?>

            <?php if ($tw) { ?>
                <?php
                $tw_username = $tw;
                $data = wp_remote_retrieve_body(wp_remote_get('https://cdn.syndication.twimg.com/widgets/followbutton/info.json?screen_names='.$tw_username));
                $parsed =  json_decode($data,true);
                $tw_followers =  $parsed[0]['followers_count'];
                ?>
                <div class="twitter_counter social_counter clearfix">
                    <a href="https://twitter.com/<?php echo $tw; ?>" class="social_counter_link">
                        <span class="counter_icon twitter_counter_icon"><i class="icon-twitter"></i></span>
                        <strong class="counter_number"><?php echo $tw_followers; ?></strong>
                        <span class="counter_users_word"><?php _e("Followers", "asalah"); ?></span>
                    </a>
                </div>
            <?php } ?>

            <?php if ($rss) { ?>
                <div class="rss_counter social_counter clearfix">
                    <a href="<?php echo $tw; ?>" class="social_counter_link">
                        <span class="counter_icon rss_counter_icon"><i class="icon-rss"></i></span>
                        <strong class="counter_number"><?php _e("Subscribe", "asalah"); ?></strong>
                        <span class="counter_users_word"><?php _e("To RSS", "asalah"); ?></span>
                    </a>
                </div>
            <?php } ?>
        </div>


        <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['fb'] = $new_instance['fb'];
        $instance['fbappid'] = $new_instance['fbappid'];
        $instance['fbappsecret'] = $new_instance['fbappsecret'];
        $instance['tw'] = $new_instance['tw'];
        $instance['rss'] = $new_instance['rss'];
        return $instance;
    }

    function form($instance) {
        $defaults = array('title' => __('Subscribe', 'asalah'), 'fb' => '', 'fbappid' => '', 'fbappsecret' => '', 'tw' => '', 'rss' => '');
        $instance = wp_parse_args((array) $instance, $defaults);
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'asalah'); ?>: </label>
            <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('fb'); ?>"><?php _e('Facebook Page ID/Username', 'asalah'); ?>: </label>
            <input id="<?php echo $this->get_field_id('fb'); ?>" name="<?php echo $this->get_field_name('fb'); ?>" value="<?php echo $instance['fb']; ?>" class="widefat" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('fbappid'); ?>"><?php _e('Facebook App ID', 'asalah'); ?>: </label>
            <input id="<?php echo $this->get_field_id('fbappid'); ?>" name="<?php echo $this->get_field_name('fbappid'); ?>" value="<?php echo $instance['fbappid']; ?>" class="widefat" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('fbappsecret'); ?>"><?php _e('Facebook App Secret ID', 'asalah'); ?>: </label>
            <input id="<?php echo $this->get_field_id('fbappsecret'); ?>" name="<?php echo $this->get_field_name('fbappsecret'); ?>" value="<?php echo $instance['fbappsecret']; ?>" class="widefat" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('tw'); ?>"><?php _e('Twitter Profile Username', 'asalah'); ?>: </label>
            <input id="<?php echo $this->get_field_id('tw'); ?>" name="<?php echo $this->get_field_name('tw'); ?>" value="<?php echo $instance['tw']; ?>" class="widefat" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('rss'); ?>"><?php _e('RSS URL', 'asalah'); ?>: </label>
            <input id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" value="<?php echo $instance['rss']; ?>" class="widefat" type="text" />
        </p>

        <?php
    }

}
?>
