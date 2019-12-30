<?php

// Add scripts to plugin
function yts_add_scripts()
{
  // Add styles
  wp_enqueue_style('yts-main-style', plugins_url() . '/youtubesubs/assets/css/styles.css');

  // Add js
  wp_enqueue_script('yts-main-js', plugins_url() . '/youtubesubs/assets/js/scripts.js');

  // Add google script
  wp_register_script('google', 'https://apis.google.com/js/platform.js');
  wp_enqueue_script('google');
}

add_action('wp_enqueue_scripts', 'yts_add_scripts');
