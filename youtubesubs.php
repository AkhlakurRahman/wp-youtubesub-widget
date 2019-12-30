<?php
/*
Plugin Name: Youtube Subs
Plugin URI: https://akrahman.me
Description: Displaying total subscriber and subscribe button
Version: 1.0.0
Author: Akhlakur Rahman
Author URI: https://akrahman.me
*/

if (!defined('ABSPATH')) {
  exit();
}

// Load scripts
require_once(plugin_dir_path(__FILE__) . '/includes/youtubesubs-scripts.php');

// Load widget
require_once(plugin_dir_path(__FILE__) . '/includes/YoutubeSubsWidget.php');

// Register widget
function youtubesubs_register_widget()
{
  register_widget('YoutubeSubsWidget');
}

// Hook widget to action
add_action('widgets_init', 'youtubesubs_register_widget');
