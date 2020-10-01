<?php

if ( function_exists( 'vc_disable_frontend' ) ) {
	vc_disable_frontend();
}

if (function_exists('vc_license')) {
	if ( ! vc_license()->isActivated() ) {
		add_action( 'vc_before_init', 'your_prefix_vcSetAsTheme' );
		function your_prefix_vcSetAsTheme() {
		    vc_set_as_theme();
		}
	}
}

add_action( 'vc_load_default_templates_action','home_template_for_vc' ); // Hook in

function home_template_for_vc() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Home 1', 'asalah' ); // Assign name for your custom template
    $data['weight']     = 1; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', get_template_directory() . '/vc_templates/Home1.png' ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'home_1_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
		[vc_row full_width="stretch_row"][vc_column][revslider alias="home1slider"][/vc_column][/vc_row][vc_row][vc_column width="1/4"][service title="Responsive Design" text="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis." icon_family="bostan-fontello" icon_class_fontello="icon-desktop"][/vc_column][vc_column width="1/4"][service title="Retina Ready" text="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis." icon_family="bostan-fontello" icon_class_fontello="icon-diamond"][/vc_column][vc_column width="1/4"][service title="Easy Customize" text="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis." icon_family="bostan-fontello" icon_class_fontello="icon-umbrella"][/vc_column][vc_column width="1/4"][service title="Web Solution" text="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis." icon_family="bostan-fontello" icon_class_fontello="icon-sound"][/vc_column][/vc_row][vc_row][vc_column][projects title="Projects test" number="6" max="3"][/vc_column][/vc_row][vc_row][vc_column][action title="Purchase Bostan Now!" text="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis." button="Purchase" url="http://themeforest.net/item/bostan-retina-responsive-multipurpose-theme/5030415?ref=ahmadworks" img_src_type="external" imageexternal="https://ahmad.works/bostan/wp-content/uploads/2013/06/photodune-219463-time-is-making-fools-of-us-again-confused-man-holding-a-clock-m5.png" margintop="80" imagewidth="230" color="white"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][bloglist title="Blog" url="http://ahmad.works/bostan/?page_id=162" postnumber="2"][/vc_column][vc_column width="1/2"][accordions title="Why Bostan?"][accordion title="Page Builder" icon_family="bostan-fontello" icon_class_fontello="icon-cogs" icon_color="#26bdef"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis. Sed non leo nisl, ac euismod nisi. Aenean augue dolor, facilisis id fringilla ut, tempus vitae nibh. Nullam nec diam risus.[/accordion][accordion title="Unlimited Colors" icon_family="bostan-fontello" icon_class_fontello="icon-magic" icon_color="#26bdef"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis. Sed non leo nisl, ac euismod nisi. Aenean augue dolor, facilisis id fringilla ut, tempus vitae nibh. Nullam nec diam risus.[/accordion][accordion title="Revolution Slider" icon_family="bostan-fontello" icon_class_fontello="icon-heart" icon_color="#26bdef"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis. Sed non leo nisl, ac euismod nisi. Aenean augue dolor, facilisis id fringilla ut, tempus vitae nibh. Nullam nec diam risus.[/accordion][/accordions][/vc_column][/vc_row][vc_row][vc_column][clients title="Clients" show_number="6"][/vc_column][/vc_row][vc_row][vc_column][space][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
}

add_action( 'vc_load_default_templates_action','home2_template_for_vc' ); // Hook in

function home2_template_for_vc() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Home 2', 'asalah' ); // Assign name for your custom template
    $data['weight']     = 2; // Weight of your template in the template list
    $data['custom_class'] = 'home_2_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
		[vc_row full_width="stretch_row"][vc_column][revslider alias="home1slider"][/vc_column][/vc_row][vc_row][vc_column][asalah_richtext]
<div style="text-align: center;">
<h3>WITH BOSTAN YOU CAN BUILD YOUR YOUR BUSINESS WEBSITE IN MINUTES</h3>
Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
[/asalah_richtext][/vc_column][/vc_row][vc_row][vc_column][projects title="Projects" url="http://ahmad.works/bostan/?page_id=2453" number="6" max="4"][/vc_column][/vc_row][vc_row][vc_column][shadow_separator][/vc_column][/vc_row][vc_row][vc_column width="2/3"][tabs][tab title="Why Bostan?"]<img style="float: right; width: 180px; margin: 0 20px 0px 20px;" src="https://ahmad.works/bostan/wp-content/uploads/2013/05/photodune-656292-handyman-with-thumbs-up-m.png" />
<h4>Why Bostan?</h4>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis. Sed non leo nisl, ac euismod nisi. Aenean augue dolor, facilisis id fringilla ut, tempus vitae nibh. Nullam nec diam risus. Donec laoreet ultricies rhoncus. Aliquam adipiscing, erat ac scelerisque convallis, sapien mauris egestas diam, sit amet tempus risus massa eget velit.

[iconlist type="hand"]
<ul>
	<li>100% Responsive Design</li>
	<li>Drag &amp; Drop Page Builder</li>
	<li>Unlimited Colors &amp; Fonts</li>
	<li>Advanced Option Panel</li>
	<li>Translation &amp; WPML Ready</li>
</ul>
[/iconlist][/tab][tab title="Solution"]<img style="float: right; width: 260px; margin: 0 0px 0px 20px;" src="https://ahmad.works/bostan/wp-content/uploads/2013/05/photodune-219463-time-is-making-fools-of-us-again-confused-man-holding-a-clock-m.png" />
<h4>Need Solution?.</h4>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis. Sed non leo nisl, ac euismod nisi. Aenean augue dolor, facilisis id fringilla ut, tempus vitae nibh. Nullam nec diam risus. Donec laoreet ultricies rhoncus. Aliquam adipiscing, erat ac scelerisque convallis.

[iconlist type="hand"]
<ul>
	<li>100% Responsive Design</li>
	<li>Drag &amp; Drop Page Builder</li>
	<li>Unlimited Colors &amp; Fonts</li>
	<li>Advanced Option Panel</li>
	<li>Translation &amp; WPML Ready</li>
</ul>
[/iconlist][/tab][tab title="Try Now!"]<img style="float: right; width: 180px; margin: 0 20px 0px 20px;" src="https://ahmad.works/bostan/wp-content/uploads/2013/05/photodune-213585-whatever-you-want-s1.png" />
<h4>Try Now!</h4>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis. Sed non leo nisl, ac euismod nisi. Aenean augue dolor, facilisis id fringilla ut, tempus vitae nibh. Nullam nec diam risus. Donec laoreet ultricies rhoncus. Aliquam adipiscing, erat ac scelerisque convallis, sapien mauris egestas diam, sit amet tempus risus massa eget velit.

[iconlist type="hand"]
<ul>
	<li>100% Responsive Design</li>
	<li>Drag &amp; Drop Page Builder</li>
	<li>Unlimited Colors &amp; Fonts</li>
	<li>Advanced Option Panel</li>
	<li>Translation &amp; WPML Ready</li>
</ul>
[/iconlist][/tab][/tabs][/vc_column][vc_column width="1/3"][pricingblock tableid="13038"][/vc_column][/vc_row][vc_row][vc_column][shadow_separator][/vc_column][/vc_row][vc_row][vc_column][asalah_richtext]
<div style="text-align: center;">
<h3>FIND OUR LOCATION ON MAP</h3>
<span style="color: #fe603c; margin-right: 6px;">[icon type='map-marker' size='18']</span> 123 Street St. City, CN 10044</div>
[/asalah_richtext][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces"][vc_column][googlemap src="https://maps.google.com/maps/ms?msid=212261688122193312302.0004dca6a4049cd50ea59&amp;msa=0&amp;ll=30.606853,32.300105&amp;spn=0.018007,0.033023" height="300"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][bloglist title="News" url="http://ahmad.works/bostan/blog/" postnumber="2"][/vc_column][vc_column width="1/2"][progresscon title="Our Skills" type="animated"][progress title="Web Design" percent="100"][progress title="Improving SEO" percent="70"][progress title="Online Marketing" percent="65"][progress title="Web Hosting" percent="75"][/progresscon][/vc_column][/vc_row][vc_row][vc_column][shadow_separator][/vc_column][/vc_row][vc_row][vc_column][clients title="Clients" show_number="6"][/vc_column][/vc_row][vc_row][vc_column][space][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
}

add_action( 'vc_load_default_templates_action','home3_template_for_vc' ); // Hook in

function home3_template_for_vc() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Home 3', 'asalah' ); // Assign name for your custom template
    $data['weight']     = 3; // Weight of your template in the template list
    $data['custom_class'] = 'home_3_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
		[vc_row full_width="stretch_row"][vc_column][revslider alias="home1slider"][/vc_column][/vc_row][vc_row][vc_column][asalah_richtext]
<div style="text-align: center;">
<h3>WITH BOSTAN YOU CAN BUILD YOUR YOUR BUSINESS WEBSITE IN MINUTES</h3>
See our pricing table and choose the service you like

</div>
[/asalah_richtext][/vc_column][/vc_row][vc_row][vc_column][pricingblock tableid="13012" columns="four"][/vc_column][/vc_row][vc_row][vc_column][shadow_separator][/vc_column][/vc_row][vc_row][vc_column][projects title="Clients Projects" url="http://ahmad.works/bostan/portfolio-2/" number="6" max="4"][/vc_column][/vc_row][vc_row][vc_column][action title="Need Help ?" text="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis." button="Contact Our Staff" url="#" img_src_type="external" imageexternal="https://ahmad.works/bostan/wp-content/uploads/2013/06/photodune-219463-time-is-making-fools-of-us-again-confused-man-holding-a-clock-m5.png" margintop="67" imagewidth="230" color="white" button_size="medium"][/vc_column][/vc_row][vc_row][vc_column][clients title="Clients" show_number="6"][/vc_column][/vc_row][vc_row][vc_column][space][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
}

add_action( 'vc_load_default_templates_action','home4_template_for_vc' ); // Hook in

function home4_template_for_vc() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Home 4', 'asalah' ); // Assign name for your custom template
    $data['weight']     = 4; // Weight of your template in the template list
    $data['custom_class'] = 'home_4_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
		[vc_row full_width="stretch_row_content_no_spaces"][vc_column][revslider alias="home1slider"][/vc_column][/vc_row][vc_row][vc_column][asalah_richtext]
<div style="text-align: center;">
<h3>WITH BOSTAN YOU CAN BUILD YOUR YOUR BUSINESS WEBSITE IN MINUTES</h3>
Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
[/asalah_richtext][/vc_column][/vc_row][vc_row][vc_column][shadow_separator][/vc_column][/vc_row][vc_row][vc_column width="1/2"][testimonials title="Testimonials" number="1"][/vc_column][vc_column width="1/2"][progresscon title="Our Skills" type="animated"][progress title="Web Design" percent="100"][progress title="Improving SEO" percent="70"][progress title="Online Marketing" percent="65"][/progresscon][/vc_column][/vc_row][vc_row][vc_column][shadow_separator][/vc_column][/vc_row][vc_row][vc_column][teamblock title="Our Team" postnumber="4" max="4"][/vc_column][/vc_row][vc_row][vc_column][shadow_separator][/vc_column][/vc_row][vc_row][vc_column][clients title="Clients" show_number="6"][/vc_column][/vc_row][vc_row][vc_column][space][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
}

add_action( 'vc_load_default_templates_action','home5_template_for_vc' ); // Hook in

function home5_template_for_vc() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Home 5', 'asalah' ); // Assign name for your custom template
    $data['weight']     = 5; // Weight of your template in the template list
    $data['custom_class'] = 'home_5_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
		[vc_row full_width="stretch_row"][vc_column][revslider alias="home1slider"][/vc_column][/vc_row][vc_row][vc_column][asalah_richtext]
<div style="text-align: center;">
<h3>WITH BOSTAN YOU CAN BUILD YOUR YOUR BUSINESS WEBSITE IN MINUTES</h3>
Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
[/asalah_richtext][/vc_column][/vc_row][vc_row][vc_column][shadow_separator][/vc_column][/vc_row][vc_row][vc_column width="2/3"][tabs][tab title="Why Bostan?" icon_family="bostan-fontello" icon_class_fontello="icon-cogs" icon_color="#26bdef"]<img style="float: right; width: 180px; margin: 0 20px 0px 20px;" src="https://ahmad.works/bostan/wp-content/uploads/2013/05/photodune-656292-handyman-with-thumbs-up-m.png" />
<h4>Why Bostan?</h4>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis. Sed non leo nisl, ac euismod nisi. Aenean augue dolor, facilisis id fringilla ut, tempus vitae nibh. Nullam nec diam risus. Donec laoreet ultricies rhoncus. Aliquam adipiscing, erat ac scelerisque convallis, sapien mauris egestas diam, sit amet tempus risus massa eget velit.

[iconlist type="hand"]
<ul>
	<li>100% Responsive Design</li>
	<li>Drag &amp; Drop Page Builder</li>
	<li>Unlimited Colors &amp; Fonts</li>
	<li>Advanced Option Panel</li>
	<li>Translation &amp; WPML Ready</li>
</ul>
[/iconlist][/tab][tab title="Solution" icon_family="bostan-fontello" icon_class_fontello="icon-leaf" icon_color="#26bdef"]<img style="float: right; width: 260px; margin: 0 0px 0px 20px;" src="https://ahmad.works/bostan/wp-content/uploads/2013/05/photodune-219463-time-is-making-fools-of-us-again-confused-man-holding-a-clock-m.png" />
<h4>Need Solution?.</h4>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis. Sed non leo nisl, ac euismod nisi. Aenean augue dolor, facilisis id fringilla ut, tempus vitae nibh. Nullam nec diam risus. Donec laoreet ultricies rhoncus. Aliquam adipiscing, erat ac scelerisque convallis.

[iconlist type="hand"]
<ul>
	<li>100% Responsive Design</li>
	<li>Drag &amp; Drop Page Builder</li>
	<li>Unlimited Colors &amp; Fonts</li>
	<li>Advanced Option Panel</li>
	<li>Translation &amp; WPML Ready</li>
</ul>
[/iconlist][/tab][tab title="Try Now!" icon_family="bostan-fontello" icon_class_fontello="icon-heart" icon_color="#26bdef"]<img style="float: right; width: 180px; margin: 0 20px 0px 20px;" src="https://ahmad.works/bostan/wp-content/uploads/2013/05/photodune-213585-whatever-you-want-s1.png" />
<h4>Try Now!</h4>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis. Sed non leo nisl, ac euismod nisi. Aenean augue dolor, facilisis id fringilla ut, tempus vitae nibh. Nullam nec diam risus. Donec laoreet ultricies rhoncus. Aliquam adipiscing, erat ac scelerisque convallis, sapien mauris egestas diam, sit amet tempus risus massa eget velit.

[iconlist type="hand"]
<ul>
	<li>100% Responsive Design</li>
	<li>Drag &amp; Drop Page Builder</li>
	<li>Unlimited Colors &amp; Fonts</li>
	<li>Advanced Option Panel</li>
	<li>Translation &amp; WPML Ready</li>
</ul>
[/iconlist][/tab][/tabs][/vc_column][vc_column width="1/3"][pricingblock tableid="13038"][/vc_column][/vc_row][vc_row][vc_column][shadow_separator][/vc_column][/vc_row][vc_row][vc_column][projects title="Projects" desc="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis. " url="http://ahmad.works/bostan/?page_id=2453" number="6" max="3" pos="side"][/vc_column][/vc_row][vc_row][vc_column][shadow_separator][/vc_column][/vc_row][vc_row][vc_column][clients title="Clients" show_number="6"][/vc_column][/vc_row][vc_row][vc_column][space][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
}

add_action( 'vc_load_default_templates_action','google_map_template_for_vc' ); // Hook in

function google_map_template_for_vc() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Maps', 'asalah' ); // Assign name for your custom template
    $data['weight']     = 6; // Weight of your template in the template list
    $data['custom_class'] = 'google_map_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
		[vc_row][vc_column][googlemap src="https://maps.google.com/maps/ms?msid=212261688122193312302.0004dca6a4049cd50ea59&amp;msa=0&amp;ll=30.606853,32.300105&amp;spn=0.018007,0.033023"][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
}

add_action( 'vc_load_default_templates_action','tabs_toggles_template_for_vc' ); // Hook in

function tabs_toggles_template_for_vc() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Tabs & Toggles', 'asalah' ); // Assign name for your custom template
    $data['weight']     = 7; // Weight of your template in the template list
    $data['custom_class'] = 'tabs_toggles_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
		[vc_row][vc_column][divider title="Tabs"][tabs][tab title="Tab 1"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis. Sed non leo nisl, ac euismod nisi. Aenean augue dolor, facilisis id fringilla ut, tempus vitae nibh. Nullam nec diam risus.[/tab][tab title="Tab 2"]Aliquam adipiscing, erat ac scelerisque convallis, sapien mauris egestas diam, sit amet tempus risus massa eget velit. Morbi auctor accumsan velit, sed gravida nibh posuere vitae. Nulla egestas nisi vel purus dapibus et ultrices sapien cursus. Vivamus et elit tellus. Praesent sit amet lectus ipsum, id mollis nisi.[/tab][tab title="Tab 3"]Sed sollicitudin euismod velit. Suspendisse pretium tempus sollicitudin. Proin augue felis, posuere id elementum et, accumsan at sem Morbi posuere, augue adipiscing cursus ullamcorper, turpis urna volutpat urna, a pulvinar massa sem sit amet diam. Etiam at ante erat, id aliquam nisi.[/tab][/tabs][/vc_column][/vc_row][vc_row][vc_column][divider title="Tabs"][tabs vertical="true"][tab title="Tab 1"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis. Sed non leo nisl, ac euismod nisi. Aenean augue dolor, facilisis id fringilla ut, tempus vitae nibh. Nullam nec diam risus. Donec laoreet ultricies rhoncus. Aliquam adipiscing, erat ac scelerisque convallis, sapien mauris egestas diam, sit amet tempus risus massa eget velit. Morbi auctor accumsan velit, sed gravida nibh posuere vitae. Nulla egestas nisi vel purus dapibus et ultrices sapien cursus. Vivamus et elit tellus. Praesent sit amet lectus ipsum, id mollis nisi. Proin sodales elit eget turpis ultricies sollicitudin. Sed laoreet tempor sem, nec posuere tortor feugiat sed.[/tab][tab title="Tab 2"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis. Sed non leo nisl, ac euismod nisi. Aenean augue dolor, facilisis id fringilla ut, tempus vitae nibh. Nullam nec diam risus. Donec laoreet ultricies rhoncus. Aliquam adipiscing, erat ac scelerisque convallis, sapien mauris egestas diam, sit amet tempus risus massa eget velit. Morbi auctor accumsan velit, sed gravida nibh posuere vitae. Nulla egestas nisi vel purus dapibus et ultrices sapien cursus. Vivamus et elit tellus. Praesent sit amet lectus ipsum, id mollis nisi. Proin sodales elit eget turpis ultricies sollicitudin. Sed laoreet tempor sem, nec posuere tortor feugiat sed.[/tab][tab title="Tab 3"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis. Sed non leo nisl, ac euismod nisi. Aenean augue dolor, facilisis id fringilla ut, tempus vitae nibh. Nullam nec diam risus. Donec laoreet ultricies rhoncus. Aliquam adipiscing, erat ac scelerisque convallis, sapien mauris egestas diam, sit amet tempus risus massa eget velit. Morbi auctor accumsan velit, sed gravida nibh posuere vitae. Nulla egestas nisi vel purus dapibus et ultrices sapien cursus. Vivamus et elit tellus. Praesent sit amet lectus ipsum, id mollis nisi. Proin sodales elit eget turpis ultricies sollicitudin. Sed laoreet tempor sem, nec posuere tortor feugiat sed.[/tab][/tabs][/vc_column][/vc_row][vc_row][vc_column][divider title="Toggle"][toggle title="Opened Tab" state="open"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis. Sed non leo nisl, ac euismod nisi. Aenean augue dolor, facilisis id fringilla ut, tempus vitae nibh. Nullam nec diam risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis. Sed non leo nisl, ac euismod nisi. Aenean augue dolor, facilisis id fringilla ut.
[/toggle][toggle title="Closed Tab"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis. Sed non leo nisl, ac euismod nisi. Aenean augue dolor, facilisis id fringilla ut, tempus vitae nibh. Nullam nec diam risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis. Sed non leo nisl, ac euismod nisi. Aenean augue dolor, facilisis id fringilla ut.
[/toggle][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
}

add_action( 'vc_load_default_templates_action','boxes_alerts_template_for_vc' ); // Hook in

function boxes_alerts_template_for_vc() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Boxes and Alerts', 'asalah' ); // Assign name for your custom template
    $data['weight']     = 6; // Weight of your template in the template list
    $data['custom_class'] = 'boxes_alerts_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
		[vc_row][vc_column][divider title="Boxes"][box type="download"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis. Sed non leo nisl, ac euismod nisi. Aenean augue dolor, facilisis id fringilla ut.[/box][box type="warning"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis. Sed non leo nisl, ac euismod nisi. Aenean augue dolor, facilisis id fringilla ut.[/box][box type="info"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis. Sed non leo nisl, ac euismod nisi. Aenean augue dolor, facilisis id fringilla ut.[/box][box type="success"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis. Sed non leo nisl, ac euismod nisi. Aenean augue dolor, facilisis id fringilla ut.[/box][box type="shadow"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis. Sed non leo nisl, ac euismod nisi. Aenean augue dolor, facilisis id fringilla ut.[/box][space][divider title="Alerts"][alert type="alert-info"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula.[/alert][alert type="alert-success"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula.[/alert][alert]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula.[/alert][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
}

add_action( 'vc_load_default_templates_action','buttons_template_for_vc' ); // Hook in

function buttons_template_for_vc() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Buttons', 'asalah' ); // Assign name for your custom template
    $data['weight']     = 7; // Weight of your template in the template list
    $data['custom_class'] = 'buttons_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
		[vc_row][vc_column][divider title="Small Buttons"][button link="http://test.com" target="blank" color="blue" size="small"]Button[/button][button link="http://" target="blank" size="small"]Button[/button][button link="http://test.com" target="blank" color="orange" size="small"]Button[/button][button link="http://test.com" target="blank" color="green" size="small"]Button[/button][button link="http://test.com" target="blank" color="pink" size="small"]Button[/button][button link="http://test.com" target="blank" color="purple" size="small"]Button[/button][divider title="Medium Buttons"][button link="http://test.com" target="blank" color="blue" size="medium"]Button[/button][button link="http://" target="blank" size="medium"]Button[/button][button link="http://test.com" target="blank" color="orange" size="medium"]Button[/button][button link="http://test.com" target="blank" color="green" size="medium"]Button[/button][button link="http://test.com" target="blank" color="pink" size="medium"]Button[/button][button link="http://test.com" target="blank" color="purple" size="medium"]Button[/button][divider title="Big Buttons"][button link="http://test.com" target="blank" color="blue" size="big"]Button[/button][button link="http://" target="blank" size="big"]Button[/button][button link="http://test.com" target="blank" color="orange" size="big"]Button[/button][button link="http://test.com" target="blank" color="green" size="big"]Button[/button][button link="http://test.com" target="blank" color="pink" size="big"]Button[/button][button link="http://test.com" target="blank" color="purple" size="big"]Button[/button][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
}

add_action( 'vc_load_default_templates_action','pricingtables_template_for_vc' ); // Hook in

function pricingtables_template_for_vc() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Pricing Tables', 'asalah' ); // Assign name for your custom template
    $data['weight']     = 7; // Weight of your template in the template list
    $data['custom_class'] = 'pricingtables_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
		[vc_row][vc_column][divider title="4 Pricing Table"][pricingblock tableid="13012" columns="four"][/vc_column][/vc_row][vc_row][vc_column width="2/3"][divider title="Our Featured Package"][asalah_richtext][dropcap]L[/dropcap]orem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis. Sed non leo nisl, ac euismod nisi. Aenean augue dolor, facilisis id fringilla ut, tempus vitae nibh. Nullam nec diam risus. Donec laoreet ultricies rhoncus. Aliquam adipiscing, erat ac scelerisque convallis, sapien mauris egestas diam, sit amet tempus risus massa eget velit. Morbi auctor accumsan velit, sed gravida nibh posuere vitae. Nulla egestas nisi vel purus dapibus et ultrices sapien cursus. Vivamus et elit tellus. Praesent sit amet lectus ipsum, id mollis nisi. Proin sodales elit eget turpis ultricies sollicitudin. Sed laoreet tempor sem, nec posuere tortor feugiat sed.
Morbi posuere, augue adipiscing cursus ullamcorper, turpis urna volutpat urna, a pulvinar massa sem sit amet diam. Etiam at ante erat, id aliquam nisi. Integer vitae nibh tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi rhoncus lorem ac risus iaculis adipiscing. Sed sollicitudin euismod velit. Suspendisse pretium tempus sollicitudin.[/asalah_richtext][/vc_column][vc_column width="1/3"][pricingblock tableid="13038" column="one"][/vc_column][/vc_row]
CONTENT;

    vc_add_default_templates( $data );
}

add_action( 'vc_before_init', 'asalah_shortcodes_to_vc' );

function asalah_shortcodes_to_vc() {
  vc_map( array(
        "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
        "name" => __("Action Button", 'bostan'),
        "base" => "action",
        "class" => "",
        "category" => __('Bostan', 'bostan'),
        "params" => array(

          array(
    				"type" => "textfield",
    				"holder" => "div",
    				"class" => "",
    				"heading" => __("Title (optional)", 'bostan'),
    				"param_name" => "title",
    				"value" => '',
    			),
          array(
    				"type" => "textarea",
    				"holder" => "div",
    				"class" => "",
    				"heading" => __("Content", 'bostan'),
    				"param_name" => "text",
    				"value" => '',
    			),
          array(
    				"type" => "textfield",
    				"holder" => "div",
    				"class" => "",
    				"heading" => __("Button Text", 'bostan'),
    				"param_name" => "button",
    				"value" => '',
    			),
          array(
    				"type" => "textfield",
    				"holder" => "div",
    				"class" => "",
    				"heading" => __("Button URL", 'bostan'),
    				"param_name" => "url",
    				"value" => '',
    			),
          array(
    				"type" => "dropdown",
    				"holder" => "div",
    				"class" => "",
    				"heading" => __("Button Opens in", 'bostan'),
    				"param_name" => "buttontarget",
    				"value" => array_flip(array(
        			'default' => 'Same Tab',
        			'blank' => 'New Tab',
        		)),
    			),
					array(
						 "type" => "dropdown",
						 "class" => "",
						 "heading" => "Image Source",
						 "param_name" => "img_src_type",
						 "value" =>  array(
							 "Media" => 'media',
							 "External Link" => "external",
					 )
					),
			 array(
				 "type" => "attach_image",
				 "class" => "",
				 "heading" => 'Image',
				 "param_name" => "imageurl",
				 'dependency' => array(
						 'element' => 'img_src_type',
						 'value' => 'media',
					),
				 "value" =>  '',
			 ),
			 array(
				 "type" => "textfield",
				 "class" => "",
				 "heading" => 'Image URL',
				 "param_name" => "imageexternal",
				 'dependency' => array(
						 'element' => 'img_src_type',
						 'value' => 'external',
					),
				 "value" =>  '',
					),
          array(
    				"type" => "textfield",
    				"holder" => "div",
    				"class" => "",
    				"heading" => __("Top Margin", 'bostan'),
    				"param_name" => "margintop",
    				"value" => '',
    			),
          array(
    				"type" => "textfield",
    				"holder" => "div",
    				"class" => "",
    				"heading" => __("Image Width", 'bostan'),
    				"param_name" => "imagewidth",
    				"value" => '',
    			),
          array(
    				"type" => "dropdown",
    				"holder" => "div",
    				"class" => "",
    				"heading" => __("Button Color", 'bostan'),
    				"param_name" => "color",
    				"value" => array_flip(array(
        			'blue' => 'Blue',
        			'orange' => 'Orange',
        			'green' => 'Green',
        			'pink' => 'Pink',
        			'white' => 'White',
        			'black' => 'Black'
        		)),
    			),
          array(
    				"type" => "dropdown",
    				"holder" => "div",
    				"class" => "",
    				"heading" => __("Button Size", 'bostan'),
    				"param_name" => "button_size",
    				"value" => array_flip(array(
        			'small' => 'Small',
        			'medium' => 'Medium',
        			'big' => 'Big'
        		)),
    			),
        ),
      ));

  vc_map( array(
        "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
        "name" => __("Button", 'bostan'),
        "base" => "button",
				"is_container" => true,
        "class" => "",
        "category" => __('Bostan', 'bostan'),
        "params" => array(
          array(
    				"type" => "textarea",
    				"holder" => "div",
    				"class" => "",
    				"heading" => __("Content", 'bostan'),
    				"param_name" => "content",
    				"value" => '',
    			),
          array(
    				"type" => "textfield",
    				"holder" => "div",
    				"class" => "",
    				"heading" => __("Button URL", 'bostan'),
    				"param_name" => "link",
    				"value" => '',
    			),
          array(
    				"type" => "dropdown",
    				"holder" => "div",
    				"class" => "",
    				"heading" => __("Button Opens in", 'bostan'),
    				"param_name" => "target",
    				"value" => array_flip(array(
        			'default' => 'Same Tab',
        			'blank' => 'New Tab',
        		)),
    			),
          array(
    				"type" => "dropdown",
    				"holder" => "div",
    				"class" => "",
    				"heading" => __("Align", 'bostan'),
    				"param_name" => "align",
						"value" => array_flip(array(
        			'right' => 'Right',
        			'center' => 'Center',
        			'left' => 'Left',
        		)),
    			),
          array(
    				"type" => "dropdown",
    				"holder" => "div",
    				"class" => "",
    				"heading" => __("Button Color", 'bostan'),
    				"param_name" => "color",
    				"value" => array_flip(array(
							'primary' => 'Primary',
							'red' => 'Red',
							'gray' => 'Grey',
							'purple' => 'Purple',
        			'blue' => 'Blue',
        			'orange' => 'Orange',
        			'green' => 'Green',
        			'pink' => 'Pink',
        			'white' => 'White',
        			'black' => 'Black'
        		)),
    			),
          array(
    				"type" => "dropdown",
    				"holder" => "div",
    				"class" => "",
    				"heading" => __("Button Size", 'bostan'),
    				"param_name" => "button_size",
    				"value" => array_flip(array(
        			'small' => 'Small',
        			'medium' => 'Medium',
        			'big' => 'Big'
        		)),
    			),
        ),
      ));

      vc_map( array(
        "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
        "name" => __("Boxes", 'bostan'),
        "base" => "box",
        "class" => "",
        "category" => __('Bostan', 'bostan'),
        "params" => array(

          array(
     				"type" => "textarea_html",
     				"class" => "",
     				"heading" => "Box Text (required)",
     				"param_name" => "content",
     				"value" => '',
             ),
          array(
     				"type" => "dropdown",
     				"class" => "",
     				"heading" => "Box Type",
     				"param_name" => "type",
     				"value" => array_flip(array(
							false => 'Select Box Type',
      				'download' => 'Download',
      				'warning' => 'Warning',
      				'info' => 'Info',
							'success' => 'Succuss',
							'shadow' => 'Shadow',
      			)),
             ),
           ),
         ));

      vc_map( array(
        "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
        "name" => __("Alerts", 'bostan'),
        "base" => "alert",
        "class" => "",
        "category" => __('Bostan', 'bostan'),
        "params" => array(
					array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Title",
     				"param_name" => "title",
     				"value" => '',
             ),
          array(
     				"type" => "textarea_html",
     				"class" => "",
     				"heading" => "Alert Text (required)",
     				"param_name" => "content",
     				"value" => '',
             ),
          array(
     				"type" => "dropdown",
     				"class" => "",
     				"heading" => "Alert Type",
     				"param_name" => "type",
     				"value" => array_flip(array(
      				'alert-block' => 'Note',
      				'alert-info' => 'Info',
      				'alert-success' => 'Success',
      			)),
             ),
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Additional inline css styling (optional)",
     				"param_name" => "style",
     				"value" => '',
             ),
           ),
         ));

			$categories = get_categories();
	 		$cats_array = array(esc_attr__("All Categories", 'daynight') => '');
	 		foreach ($categories as $cat) {
	 		    $cats_array[$cat->name] = $cat->slug;
	 		}

			$order_array = array(
				'Date' => 'date',
				'Name' => 'name',
				'Comments Count' => 'comment_count',
				'Random' => 'rand',
			);
			$projects_order_array = array(
				'Date' => 'date',
				'Name' => 'name',
				'Random' => 'rand',
			);

      vc_map( array(
        "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
        "name" => __("Blog Posts List", 'bostan'),
        "base" => "bloglist",
        "class" => "",
        "category" => __('Bostan', 'bostan'),
        "params" => array(
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Title",
     				"param_name" => "title",
     				"value" =>  '',
             ),
          array(
     				"type" => "dropdown",
     				"class" => "",
     				"heading" => "Show Meta",
     				"param_name" => "show_meta",
     				"value" =>  array(
							'No' => 'no',
							'Yes' => 'yes',
						),
             ),
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Blog Page URL",
     				"param_name" => "url",
     				"value" =>  '',
             ),
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Number Of Posts",
     				"param_name" => "postnumber",
     				"value" =>  '',
             ),
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Read more text (leave blank for default 'Read more...')",
     				"param_name" => "readmore_pharse",
     				"value" =>  '',
             ),
						 array(
	      				"type" => "dropdown",
	      				"class" => "",
	      				"heading" => "Categories",
	      				"param_name" => "cats",
	      				"value" =>  $cats_array,
	              ),
						 array(
	      				"type" => "dropdown",
	      				"class" => "",
	      				"heading" => "Order",
	      				"param_name" => "order",
	      				"value" =>  $order_array,
	              ),
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Tags (Seperated by comma)",
     				"param_name" => "tags_ids",
     				"value" =>  '',
             ),
           ),
         ));

      vc_map( array(
        "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
        "name" => __("Clear", 'bostan'),
        "base" => "clear",
        "class" => "",
        "category" => __('Bostan', 'bostan'),
        "params" => array(
          array(
     				"type" => "dropdown",
     				"class" => "",
     				"heading" => "Pick a horizontal line",
     				"param_name" => "horizontal_line",
     				"value" =>  array(
        			'None' => 'none',
        			'Single' => 'single',
        			'Double' => 'double',
        			'Use Image' => 'image',
        		),
             ),
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Height (optional)",
     				"param_name" => "height",
     				"value" =>  '',
             ),
          array(
     				"type" => "colorpicker",
     				"class" => "",
     				"heading" => "Pick a line color",
     				"param_name" => "line_color",
     				"value" =>  '',
             ),
           ),
         ));
				 $clients_order_array = array(
					 'Date' => 'date',
					 'Name' => 'title',
					 'Random' => 'rand',
				 );
      vc_map( array(
        "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
        "name" => __("Clients Carousel", 'bostan'),
        "base" => "clients",
        "class" => "",
        "category" => __('Bostan', 'bostan'),
        "params" => array(
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Title (optional)",
     				"param_name" => "title",
     				"value" =>  '',
             ),
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Number",
     				"param_name" => "number",
     				"value" =>  '',
             ),
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Number to show per slide",
     				"param_name" => "show_number",
     				"value" =>  '',
             ),
          array(
     				"type" => "dropdown",
     				"class" => "",
     				"heading" => "Clients Order",
     				"param_name" => "client_order",
     				"value" =>  $clients_order_array,
             ),
          array(
     				"type" => "dropdown",
     				"class" => "",
     				"heading" => "Autoplay Carousel",
     				"param_name" => "autoplay_car",
     				"value" =>  array(
							'No' => 'no',
							'Yes' => 'yes',
						),
             ),
           ),
         ));

      vc_map( array(
        "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
        "name" => __("Bostan - Map", 'bostan'),
        "base" => "googlemap",
        "class" => "",
        "category" => __('Bostan', 'bostan'),
        "params" => array(
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "URL",
     				"param_name" => "src",
     				"value" =>  '',
             ),
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Width",
     				"param_name" => "width",
     				"value" =>  '',
             ),
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Height",
     				"param_name" => "height",
     				"value" =>  '',
             ),
           ),
         ));

      vc_map( array(
        "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
        "name" => __("Projects Carousel", 'bostan'),
        "base" => "projects",
        "class" => "",
        "category" => __('Bostan', 'bostan'),
        "params" => array(
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Title",
     				"param_name" => "title",
     				"value" =>  '',
             ),
          array(
     				"type" => "textarea",
     				"class" => "",
     				"heading" => "Description Text",
     				"param_name" => "desc",
     				"value" =>  '',
             ),
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Portfolio Page URL",
     				"param_name" => "url",
     				"value" =>  '',
             ),
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Number Of Posts",
     				"param_name" => "number",
     				"value" =>  '',
             ),
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Max Number To Appear In Page",
     				"param_name" => "max",
     				"value" =>  '',
             ),
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Number Of Items To Switch Each Cycle",
     				"param_name" => "cycle",
     				"value" =>  '',
             ),
						 array(
	      				"type" => "dropdown",
	      				"class" => "",
	      				"heading" => "Autoplay Carousel",
	      				"param_name" => "autoplay_car",
	      				"value" =>  array(
	 							'No' => 'no',
	 							'Yes' => 'yes',
	 						),
	              ),
						 array(
	      				"type" => "dropdown",
	      				"class" => "",
	      				"heading" => "Link image icon to preview url",
	      				"param_name" => "external_link",
	      				"value" =>  array(
	 							'No' => 'no',
	 							'Yes' => 'yes',
	 						),
	              ),
          array(
     				"type" => "dropdown",
     				"class" => "",
     				"heading" => "Heading Position",
     				"param_name" => "pos",
     				"value" =>  array_flip(array(
      				'top' => 'Top',
      				'side' => 'Left Side',
      				'hidden' => 'Hidden',
      			)),
             ),
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Tags (Seperated by comma)",
     				"param_name" => "tags_ids",
     				"value" =>  '',
             ),
						 array(
	      				"type" => "dropdown",
	      				"class" => "",
	      				"heading" => "Projects Order",
	      				"param_name" => "projects_order",
	      				"value" =>  $clients_order_array,
	              ),
								array(
			     				"type" => "textfield",
			     				"class" => "",
			     				"heading" => "Thumbnails Height (blank for default)",
			     				"param_name" => "thumb_height",
			     				"value" =>  '',
			             ),
           ),
         ));

      vc_map( array(
        "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
        "name" => __("Pricing Table", 'bostan'),
        "base" => "pricingblock",
        "class" => "",
        "category" => __('Bostan', 'bostan'),
        "params" => array(

          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Title (optional)",
     				"param_name" => "title",
     				"value" =>  '',
             ),
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Table ID (required)",
     				"param_name" => "tableid",
     				"value" =>  '',
             ),
          array(
     				"type" => "dropdown",
     				"class" => "",
     				"heading" => "Columns",
     				"param_name" => "columns",
     				"value" =>  array_flip(array(
      				'one' => 'One',
      				'two' => 'Two',
      				'three' => 'Three',
      				'four' => 'Four',
      				'five' => 'Five',
      			)),
             ),
           ),
         ));

      vc_map( array(
        "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
        "name" => __("Progress Container", 'bostan'),
        "base" => "progresscon",
        "as_parent" => array('only' => 'progress'),
        "is_container" => true,
        "class" => "",
				"content_element" => true,
        "category" => __('Bostan', 'bostan'),
        "params" => array(
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Title",
     				"param_name" => "title",
     				"value" =>  '',
             ),
          array(
     				"type" => "dropdown",
     				"class" => "",
     				"heading" => "Progress Style",
     				"param_name" => "type",
     				"value" =>  array_flip(array(
      				'basic' => 'basic',
      				'striped' => 'striped',
      				'animated' => 'Animated'
      			)),
             ),
           ),
           "js_view" => 'VcColumnView',
         ));

      vc_map( array(
        "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
        "name" => __("Progress Bar", 'bostan'),
        "base" => "progress",
        "as_child" => array('only' => 'progresscon'),
        "class" => "",
        "category" => __('Bostan', 'bostan'),
        "params" => array(
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Progress Title",
     				"param_name" => "title",
     				"value" =>  '',
             ),
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Percent",
     				"param_name" => "percent",
     				"value" =>  '',
             ),
           ),
         ));

         //Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
						if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
						    class WPBakeryShortCode_progresscon extends WPBakeryShortCodesContainer {
						    }
						}
						if ( class_exists( 'WPBakeryShortCode' ) ) {
						    class WPBakeryShortCode_progress extends WPBakeryShortCode {
						    }
						}

      vc_map( array(
        "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
        "name" => __("Revolution Slider", 'bostan'),
        "base" => "revslider",
        "class" => "",
        "category" => __('Bostan', 'bostan'),
        "params" => array(
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Slider Alias (required)",
     				"param_name" => "alias",
     				"value" =>  '',
             ),
           ),
         ));

      vc_map( array(
        "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
        "name" => __("Bostan - RichText", 'bostan'),
        "base" => "asalah_richtext",
        "class" => "",
        "category" => __('Bostan', 'bostan'),
        "params" => array(
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Title (optional)",
     				"param_name" => "title",
     				"value" =>  '',
             ),
          array(
     				"type" => "textarea_html",
     				"class" => "",
     				"heading" => "Content",
     				"param_name" => "content",
     				"value" =>  '',
             ),
          array(
     				"type" => "checkbox",
     				"class" => "",
     				"heading" => "Disable Wpautop (fix text format issues if any)",
     				"param_name" => "disable_wpautop",
     				"default" =>  false,
             ),
           ),
         ));

         //get all registered sidebars
     		global $wp_registered_sidebars;
     		$sidebar_options = array(); $default_sidebar = '';
     		foreach ($wp_registered_sidebars as $registered_sidebar) {
     			$default_sidebar = empty($default_sidebar) ? $registered_sidebar['id'] : $default_sidebar;
     			$sidebar_options[$registered_sidebar['id']] = $registered_sidebar['name'];
     		}

      vc_map( array(
        "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
        "name" => __("Bostan - Widget", 'bostan'),
        "base" => "widget",
        "class" => "",
        "category" => __('Bostan', 'bostan'),
        "params" => array(
          array(
     				"type" => "dropdown",
     				"class" => "",
     				"heading" => "Choose Widget Area",
     				"param_name" => "sidebar",
     				"value" =>  array_flip($sidebar_options),
             ),
           ),
         ));

      vc_map( array(
        "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
        "name" => __("Bostan - Space", 'bostan'),
        "base" => "space",
        "class" => "",
        "category" => __('Bostan', 'bostan'),
        "params" => array(),
         ));
      vc_map( array(
        "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
        "name" => __("Bostan - Shadow Separator", 'bostan'),
        "base" => "shadow_separator",
        "class" => "",
        "category" => __('Bostan', 'bostan'),
        "params" => array(),
         ));


      vc_map( array(
        "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
        "name" => __("Bostan - Title Divider", 'bostan'),
        "base" => "divider",
        "class" => "",
        "category" => __('Bostan', 'bostan'),
        "params" => array(
					array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Title",
     				"param_name" => "title",
     				"value" =>  '',
             ),
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Size (h1, h2, h3, h4, h5, h6)",
     				"param_name" => "size",
     				"value" =>  '',
             ),
          array(
     				"type" => "dropdown",
     				"class" => "",
     				"heading" => "Icon Family",
     				"param_name" => "icon_family",
     				"value" =>  array(
							"Select Font Family" => '',
							"Fontello" => 'bostan-fontello',
							"Fontawesome" => "fontawesome",
						)
          ),
          array(
     				"type" => "iconpicker",
     				"class" => "",
     				"heading" => 'Icon Class (Fontello)',
     				"param_name" => "icon_class_fontello",
						"settings" => array('emptyIcon' => false,'type' => 'bostan-fontello','iconsPerPage' => 200,),
						'dependency' => array(
                'element' => 'icon_family',
                'value' => 'bostan-fontello',
             ),
     				"value" =>  '',
             ),
          array(
     				"type" => "iconpicker",
     				"class" => "",
     				"heading" => 'Icon Class (Fontawesome)',
						"description" => '<bold>Remember</bold> to Activate Fontawesome from Theme Options',
     				"param_name" => "icon_class_fontawesome",
						"settings" => array('emptyIcon' => false,'type' => 'fontawesome','iconsPerPage' => 200,),
						'dependency' => array(
                'element' => 'icon_family',
                'value' => 'fontawesome',
             ),
     				"value" =>  '',
             ),
				),
         ));

      vc_map( array(
        "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
        "name" => __("Service", 'bostan'),
        "base" => "service",
        "class" => "",
        "category" => __('Bostan', 'bostan'),
        "params" => array(
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Title",
     				"param_name" => "title",
     				"value" =>  '',
             ),
          array(
     				"type" => "textarea",
     				"class" => "",
     				"heading" => "Content",
     				"param_name" => "text",
     				"value" =>  '',
             ),
          array(
     				"type" => "dropdown",
     				"class" => "",
     				"heading" => "Icon Family",
     				"param_name" => "icon_family",
     				"value" =>  array(
							"Select Font Family" => '',
							"Fontello" => 'bostan-fontello',
							"Fontawesome" => "fontawesome",
						)
          ),
          array(
     				"type" => "iconpicker",
     				"class" => "",
     				"heading" => 'Icon Class (Fontello)',
     				"param_name" => "icon_class_fontello",
						"settings" => array('emptyIcon' => false,'type' => 'bostan-fontello','iconsPerPage' => 200,),
						'dependency' => array(
                'element' => 'icon_family',
                'value' => 'bostan-fontello',
             ),
     				"value" =>  '',
             ),
          array(
     				"type" => "iconpicker",
     				"class" => "",
     				"heading" => 'Icon Class (Fontawesome)',
						"description" => 'Remember to Activate Fontawesome from Theme Options',
     				"param_name" => "icon_class_fontawesome",
						"settings" => array('emptyIcon' => false,'type' => 'fontawesome','iconsPerPage' => 200,),
						'dependency' => array(
                'element' => 'icon_family',
                'value' => 'fontawesome',
             ),
     				"value" =>  '',
             ),
						 array(
	      				"type" => "dropdown",
	      				"class" => "",
	      				"heading" => "Image Source",
	      				"param_name" => "img_src_type",
	      				"value" =>  array(
									"Media" => 'media',
									"External Link" => "external",
	 						)
	           ),
          array(
     				"type" => "attach_image",
     				"class" => "",
     				"heading" => 'Custom Image (Attach your custom photo to use instead of Fontello icon.)',
     				"param_name" => "custom_image",
						'dependency' => array(
                'element' => 'img_src_type',
                'value' => 'media',
             ),
     				"value" =>  '',
          ),
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => 'Custom Image Url (Put the url of your custom photo to use instead of Fontello icon.)',
     				"param_name" => "custom_image_url",
						'dependency' => array(
                'element' => 'img_src_type',
                'value' => 'external',
             ),
     				"value" =>  '',
             ),
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => 'URL',
     				"param_name" => "url",
     				"value" =>  '',
             ),
           ),
         ));

      vc_map( array(
        "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
        "name" => __("Bostan - Tabs", 'bostan'),
        "base" => "tabs",
        "as_parent" => array('only' => 'tab'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
				"content_element" => true,
				"is_container" => true,
        "class" => "",
        "category" => __('Bostan', 'bostan'),
        "params" => array(
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Title",
     				"param_name" => "title",
     				"value" =>  '',
             ),
          array(
     				"type" => "dropdown",
     				"class" => "",
     				"heading" => "Vertical",
     				"param_name" => "vertical",
     				"value" =>  array(
							false => 'Select Tabs Type',
              'True' => 'true',
              'False' => 'false',
            ),
             ),
           ),
           "js_view" => 'VcColumnView',
         ));

				 vc_map( array(
	         "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
	         "name" => __("Bostan - Toggle Group", 'bostan'),
	         "base" => "toggles",
	         "as_parent" => array('only' => 'toggle'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	 				"content_element" => true,
	 				"is_container" => true,
	         "class" => "",
	         "category" => __('Bostan', 'bostan'),
					 "params" => array(
	           array(
	      				"type" => "textfield",
	      				"class" => "",
	      				"heading" => "Title",
	      				"param_name" => "title",
	      				"value" =>  '',
	              ),
							),
	         "js_view" => 'VcColumnView',
	       ));

				 vc_map( array(
	         "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
	         "name" => __("Bostan - Accordion Group", 'bostan'),
	         "base" => "accordions",
	         "as_parent" => array('only' => 'accordion'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	 				"content_element" => true,
	 				"is_container" => true,
	         "class" => "",
	         "category" => __('Bostan', 'bostan'),
					 "params" => array(
	           array(
	      				"type" => "textfield",
	      				"class" => "",
	      				"heading" => "Title",
	      				"param_name" => "title",
	      				"value" =>  '',
	              ),
							),
	         "js_view" => 'VcColumnView',
	       ));

      vc_map( array(
        "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
        "name" => __("Bostan - Tab", 'bostan'),
        "base" => "tab",
        "as_child" => array('only' => 'tabs'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)

        "class" => "",
        "category" => __('Bostan', 'bostan'),
        "params" => array(
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Title",
     				"param_name" => "title",
     				"value" =>  '',
             ),
						 array(
	      				"type" => "dropdown",
	      				"class" => "",
	      				"heading" => "Icon Family",
	      				"param_name" => "icon_family",
	      				"value" =>  array(
	 							"Select Font Family" => '',
	 							"Fontello" => 'bostan-fontello',
	 							"Fontawesome" => "fontawesome",
	 						)
	           ),
	           array(
	      				"type" => "iconpicker",
	      				"class" => "",
	      				"heading" => 'Icon Class (Fontello)',
	      				"param_name" => "icon_class_fontello",
	 						"settings" => array('emptyIcon' => false,'type' => 'bostan-fontello','iconsPerPage' => 200,),
	 						'dependency' => array(
	                 'element' => 'icon_family',
	                 'value' => 'bostan-fontello',
	              ),
	      				"value" =>  '',
	              ),
	           array(
	      				"type" => "iconpicker",
	      				"class" => "",
	      				"heading" => 'Icon Class (Fontawesome)',
	 						"description" => 'Remember to Activate Fontawesome from Theme Options',
	      				"param_name" => "icon_class_fontawesome",
	 						"settings" => array('emptyIcon' => false,'type' => 'fontawesome','iconsPerPage' => 200,),
	 						'dependency' => array(
	                 'element' => 'icon_family',
	                 'value' => 'fontawesome',
	              ),
	      				"value" =>  '',
	              ),
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Icon Size (px)",
     				"param_name" => "icon_size",
						'dependency' => array(
								 'element' => 'icon_family',
								 'value' => array('fontawesome', 'bostan-fontello'),
							),
     				"value" =>  '16',
             ),
          array(
     				"type" => "colorpicker",
     				"class" => "",
     				"heading" => "Icon Color",
     				"param_name" => "icon_color",
						'dependency' => array(
								 'element' => 'icon_family',
								 'value' => array('fontawesome', 'bostan-fontello'),
							),
     				"value" =>  '',
             ),
          array(
     				"type" => "textarea_html",
     				"class" => "",
     				"heading" => "Content",
     				"param_name" => "content",
     				"value" =>  '',
             ),
           ),
         ));

				 vc_map( array(
	         "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
	         "name" => __("Bostan - Toggle", 'bostan'),
	         "base" => "toggle",
	         "as_child" => array('only' => 'ِToggle Group'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)

	         "class" => "",
	         "category" => __('Bostan', 'bostan'),
	         "params" => array(
	           array(
	      				"type" => "textfield",
	      				"class" => "",
	      				"heading" => "Title",
	      				"param_name" => "title",
	      				"value" =>  '',
	              ),
								array(
	 	      				"type" => "dropdown",
	 	      				"class" => "",
	 	      				"heading" => "Icon Family",
	 	      				"param_name" => "icon_family",
	 	      				"value" =>  array(
	 	 							"Select Font Family" => '',
	 	 							"Fontello" => 'bostan-fontello',
	 	 							"Fontawesome" => "fontawesome",
	 	 						)
	 	           ),
	 	           array(
	 	      				"type" => "iconpicker",
	 	      				"class" => "",
	 	      				"heading" => 'Icon Class (Fontello)',
	 	      				"param_name" => "icon_class_fontello",
	 	 						"settings" => array('emptyIcon' => false,'type' => 'bostan-fontello','iconsPerPage' => 200,),
	 	 						'dependency' => array(
	 	                 'element' => 'icon_family',
	 	                 'value' => 'bostan-fontello',
	 	              ),
	 	      				"value" =>  '',
	 	              ),
	 	           array(
	 	      				"type" => "iconpicker",
	 	      				"class" => "",
	 	      				"heading" => 'Icon Class (Fontawesome)',
	 	 						"description" => 'Remember to Activate Fontawesome from Theme Options',
	 	      				"param_name" => "icon_class_fontawesome",
	 	 						"settings" => array('emptyIcon' => false,'type' => 'fontawesome','iconsPerPage' => 200,),
	 	 						'dependency' => array(
	 	                 'element' => 'icon_family',
	 	                 'value' => 'fontawesome',
	 	              ),
	 	      				"value" =>  '',
	 	              ),
	           array(
	      				"type" => "textfield",
	      				"class" => "",
	      				"heading" => "Icon Size (px)",
	      				"param_name" => "icon_size",
								'dependency' => array(
	 	 								 'element' => 'icon_family',
	 	 								 'value' => array('fontawesome', 'bostan-fontello'),
	 	 							),
	      				"value" =>  '16',
	              ),
								array(
	 	      				"type" => "colorpicker",
	 	      				"class" => "",
	 	      				"heading" => "Icon Color",
	 	      				"param_name" => "icon_color",
	 	 						'dependency' => array(
	 	 								 'element' => 'icon_family',
	 	 								 'value' => array('fontawesome', 'bostan-fontello'),
	 	 							),
	 	      				"value" =>  '',
	 	              ),
	           array(
	      				"type" => "textarea_html",
	      				"class" => "",
	      				"heading" => "Content",
	      				"param_name" => "content",
	      				"value" =>  '',
	              ),
	            ),
	          ));
				 vc_map( array(
	         "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
	         "name" => __("Bostan - Accordion", 'bostan'),
	         "base" => "accordion",
	         "as_child" => array('only' => 'Accordion Group'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)

	         "class" => "",
	         "category" => __('Bostan', 'bostan'),
	         "params" => array(
	           array(
	      				"type" => "textfield",
	      				"class" => "",
	      				"heading" => "Title",
	      				"param_name" => "title",
	      				"value" =>  '',
	              ),
								array(
	 	      				"type" => "dropdown",
	 	      				"class" => "",
	 	      				"heading" => "Icon Family",
	 	      				"param_name" => "icon_family",
	 	      				"value" =>  array(
	 	 							"Select Font Family" => '',
	 	 							"Fontello" => 'bostan-fontello',
	 	 							"Fontawesome" => "fontawesome",
	 	 						)
	 	           ),
	 	           array(
	 	      				"type" => "iconpicker",
	 	      				"class" => "",
	 	      				"heading" => 'Icon Class (Fontello)',
	 	      				"param_name" => "icon_class_fontello",
	 	 						"settings" => array('emptyIcon' => false,'type' => 'bostan-fontello','iconsPerPage' => 200,),
	 	 						'dependency' => array(
	 	                 'element' => 'icon_family',
	 	                 'value' => 'bostan-fontello',
	 	              ),
	 	      				"value" =>  '',
	 	              ),
	 	           array(
	 	      				"type" => "iconpicker",
	 	      				"class" => "",
	 	      				"heading" => 'Icon Class (Fontawesome)',
	 	 						"description" => 'Remember to Activate Fontawesome from Theme Options',
	 	      				"param_name" => "icon_class_fontawesome",
	 	 						"settings" => array('emptyIcon' => false,'type' => 'fontawesome','iconsPerPage' => 200,),
	 	 						'dependency' => array(
	 	                 'element' => 'icon_family',
	 	                 'value' => 'fontawesome',
	 	              ),
	 	      				"value" =>  '',
	 	              ),
	           array(
	      				"type" => "textfield",
	      				"class" => "",
	      				"heading" => "Icon Size (px)",
	      				"param_name" => "icon_size",
								'dependency' => array(
										 'element' => 'icon_family',
										 'value' => array('fontawesome', 'bostan-fontello'),
									),
	      				"value" =>  '16',
	              ),
								array(
	 							 "type" => "colorpicker",
	 							 "class" => "",
	 							 "heading" => "Icon Color",
	 							 "param_name" => "icon_color",
		 						 'dependency' => array(
		 									'element' => 'icon_family',
		 									'value' => array('fontawesome', 'bostan-fontello'),
		 							 ),
	 							 "value" =>  '',
	 							 ),
	           array(
	      				"type" => "textarea_html",
	      				"class" => "",
	      				"heading" => "Content",
	      				"param_name" => "content",
	      				"value" =>  '',
	              ),
	            ),
	          ));

         //Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
							if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
									class WPBakeryShortCode_tabs extends WPBakeryShortCodesContainer {
									}
							}
							if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
									class WPBakeryShortCode_toggles extends WPBakeryShortCodesContainer {
									}
							}
							if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
									class WPBakeryShortCode_accordions extends WPBakeryShortCodesContainer {
									}
							}
							if ( class_exists( 'WPBakeryShortCode' ) ) {
									class WPBakeryShortCode_tab extends WPBakeryShortCode {
									}
							}
							if ( class_exists( 'WPBakeryShortCode' ) ) {
									class WPBakeryShortCode_toggle extends WPBakeryShortCode {
									}
							}
							if ( class_exists( 'WPBakeryShortCode' ) ) {
									class WPBakeryShortCode_accordion extends WPBakeryShortCode {
									}
							}



      vc_map( array(
        "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
        "name" => __("Testimonials  Carousel", 'bostan'),
        "base" => "testimonials",
        "class" => "",
        "category" => __('Bostan', 'bostan'),
        "params" => array(
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Title",
     				"param_name" => "title",
     				"value" =>  '',
             ),
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Number Of Testimonials",
     				"param_name" => "number",
     				"value" =>  '',
             ),
						 array(
	      				"type" => "textfield",
	      				"class" => "",
	      				"heading" => "Number Of Testimonials to show in one slide",
	      				"param_name" => "slides",
	      				"value" =>  '1',
	              ),
           ),
         ));


      vc_map( array(
        "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
        "name" => __("Bostan - Video", 'bostan'),
        "base" => "video",
        "class" => "",
        "category" => __('Bostan', 'bostan'),
        "params" => array(
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Video url",
     				"param_name" => "video_url",
     				"value" =>  '',
             ),
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Height",
     				"param_name" => "height",
     				"value" =>  '',
             ),
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Width",
     				"param_name" => "width",
     				"value" =>  '',
             ),
           ),
         ));


      vc_map( array(
        "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
        "name" => __("Bostan - Icon", 'bostan'),
        "base" => "icon",
        "class" => "",
        "category" => __('Bostan', 'bostan'),
        "params" => array(

					array(
						 "type" => "dropdown",
						 "class" => "",
						 "heading" => "Icon Family",
						 "param_name" => "font_family",
						 "value" =>  array(
						 "Select Font Family" => '',
						 "Fontello" => 'bostan-fontello',
						 "Fontawesome" => "fontawesome",
					 )
					),
					array(
						 "type" => "iconpicker",
						 "class" => "",
						 "heading" => 'Icon Class (Fontello)',
						 "param_name" => "icon_class_fontello",
					 "settings" => array('emptyIcon' => false,'type' => 'bostan-fontello','iconsPerPage' => 200,),
					 'dependency' => array(
								'element' => 'font_family',
								'value' => 'bostan-fontello',
						 ),
						 "value" =>  '',
						 ),
					array(
						 "type" => "iconpicker",
						 "class" => "",
						 "heading" => 'Icon Class (Fontawesome)',
					 "description" => 'Remember to Activate Fontawesome from Theme Options',
						 "param_name" => "icon_class_fontawesome",
					 "settings" => array('emptyIcon' => false,'type' => 'fontawesome','iconsPerPage' => 200,),
					 'dependency' => array(
								'element' => 'font_family',
								'value' => 'fontawesome',
						 ),
						 "value" =>  '',
						 ),
			 array(
				 "type" => "textfield",
				 "class" => "",
				 "heading" => "Icon Size (px)",
				 "param_name" => "size",
				 'dependency' => array(
							'element' => 'icon_family',
							'value' => array('fontawesome', 'bostan-fontello'),
					 ),
				 "value" =>  '16',
					),
			 array(
				 "type" => "colorpicker",
				 "class" => "",
				 "heading" => "Icon Color",
				 "param_name" => "icon_color",
				 'dependency' => array(
							'element' => 'icon_family',
							'value' => array('fontawesome', 'bostan-fontello'),
					 ),
				 "value" =>  '',
					),
				)));


      vc_map( array(
        "icon" => get_template_directory_uri().'/img/defau1lt.jpg',
        "name" => __("Team Carousel", 'bostan'),
        "base" => "teamblock",
        "class" => "",
        "category" => __('Bostan', 'bostan'),
        "params" => array(

          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Title",
     				"param_name" => "title",
     				"value" =>  '',
             ),
          array(
     				"type" => "textarea",
     				"class" => "",
     				"heading" => "Description Text",
     				"param_name" => "desc",
     				"value" =>  '',
             ),
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Number Of Members",
     				"param_name" => "postnumber",
     				"value" =>  '',
             ),
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Max Number To Appear In Page",
     				"param_name" => "max",
     				"value" =>  '',
             ),
          array(
     				"type" => "textfield",
     				"class" => "",
     				"heading" => "Number Of Items To Switch Each Cycle",
     				"param_name" => "cycle",
     				"value" =>  '',
             ),
						 array(
	      				"type" => "dropdown",
	      				"class" => "",
	      				"heading" => "Team Order",
	      				"param_name" => "team_order",
	      				"value" =>  $clients_order_array,
	              ),
	           array(
	      				"type" => "dropdown",
	      				"class" => "",
	      				"heading" => "Autoplay Carousel",
	      				"param_name" => "autoplay_car",
	      				"value" =>  array(
	 							'No' => 'no',
	 							'Yes' => 'yes',
	 						),
	              ),
	           array(
	      				"type" => "dropdown",
	      				"class" => "",
	      				"heading" => "Link Members to their page",
	      				"param_name" => "link_member_page",
	      				"value" =>  array(
	 							'No' => 'no',
	 							'Yes' => 'yes',
	 						),
	              ),
           ),
         ));

}
function vc_iconpicker_type_bostan_fontello($icons) {

$bostan_fontello = asalah_font_icons_list( 'bostan-fontello');
if (isset($bostan_fontello)) {
	$vc_bostan_fontello = $bostan_fontello;
	return array_merge($icons, $vc_bostan_fontello);
}
}
add_filter( 'vc_iconpicker-type-bostan-fontello', 'vc_iconpicker_type_bostan_fontello' );


function vc_iconpicker_css() {
	wp_register_style( 'vc_asalah_fontello_css', get_template_directory_uri().'/framework/fontello/css/fontello.css');
}
add_action( 'vc_base_register_front_css', 'vc_iconpicker_css' );
add_action( 'vc_base_register_admin_css', 'vc_iconpicker_css' );
function vc_iconpicker_css_enq() {
	wp_enqueue_style( 'vc_asalah_fontello_css' );
}
add_action( 'vc_backend_editor_enqueue_js_css', 'vc_iconpicker_css_enq' );
add_action( 'vc_frontend_editor_enqueue_js_css', 'vc_iconpicker_css_enq' );