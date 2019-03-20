<?php
 /*
Plugin Name: SlideUp Social
Plugin URI:
Description: SlideUp social links when scroll down.
Version: 1.0
Author: Fahem Ahmed
Author URI: http://f4h3m.com
License: GPLv2 or later
Text Domain: slideup-social
Domain Path: /languages/
*/

require_once('options/option.php');


function slideup_load_textdomain()
{
	load_plugin_textdomain("slideup-social", false, dirname(__FILE__) . "/languages");
}
add_action("plugins_loaded", "slideup_load_textdomain");

function slideup_loadassets()
{
	wp_enqueue_style("slideup-css", plugins_url('/assets/css/slideup-social.css', __FILE__));
	wp_enqueue_script('slideup-js', plugins_url('/assets/js/slideup-social.js', __FILE__), 'jquery', 1.0, true);
	wp_enqueue_script('slideupmain-js', plugins_url('/assets/js/slideup-main.js', __FILE__), 'slideup-js', 1.0, true);
	wp_localize_script('slideup-js', 'slideup_plugin_url', array('Url' => plugin_dir_url(__FILE__)));
	wp_localize_script('slideupmain-js', 'slideup_get_options', array(
		'fb_username' => get_option('fb_username'),
	    'tw_username' => get_option('tw_username'),
	    'ins_username' => get_option('ins_username'),
		'fb_url' => get_option('fb_url'),
		'tw_url' => get_option('tw_url'),
		'ins_url' => get_option('ins_url'),
    ));
}



function slideup_loadmarkup()
{ ?>
<!-- Slideup social -->
<div class="float-banner nav-down">
    <div class="float-container">
        <div class="float-row">
            <div class="float-banner-wrap">
                <div class="btn-close" id="btn-close">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" enable-background="new 0 0 40 40">
                        <line x1="5" y1="5" x2="35" y2="35" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-miterlimit="10"></line>
                        <line x1="35" y1="5" x2="5" y2="35" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-miterlimit="10"></line>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

}

add_action("wp_enqueue_scripts", "slideup_loadassets");
add_action("wp_footer", "slideup_loadmarkup");


