<?php

// Add scripts to plugin
function yts_add_scripts()
{
  // Add styles
  wp_enqueue_style('yts-main-style', plugins_url() . '/youtubesubs/assets/css/styles.css');

  // Add js
  wp_enqueue_script('yts-main-js', plugins_url() . '/youtubesubs/assets/js/scripts.js');
}
