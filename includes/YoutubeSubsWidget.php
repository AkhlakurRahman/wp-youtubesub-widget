<?php

/**
 * Adds YoutubeSubsWidget widget.
 */
class YoutubeSubsWidget extends WP_Widget
{

  /**
   * Register widget with WordPress.
   */
  function __construct()
  {
    parent::__construct(
      'youtubesubs_widget', // Base ID

      esc_html__('Youtube Subscriber', 'yts_domain'), // Name

      array('description' => esc_html__('Widget to display Youtube Subscriber', 'yts_domain'),) // Args
    );
  }

  /**
   * Front-end display of widget.
   *
   * @see WP_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget($args, $instance)
  {
    echo $args['before_widget'];

    if (!empty($instance['title'])) {
      echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
    }

    echo '<div class="g-ytsubscribe" data-channel="' . $instance['channel'] . '" data-layout="' . $instance['channel_layout'] . '" data-count="' . $instance['channel_subs_count'] . '"></div>';

    echo $args['after_widget'];
  }

  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  public function form($instance)
  {
    $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Youtube Subscriber', 'yts_domain');

    $channel = !empty($instance['channel']) ? $instance['channel'] : esc_html__('techguyweb', 'yts_domain');

    $channel_layout = !empty($instance['channel_layout']) ? $instance['channel_layout'] : esc_html__('full', 'yts_domain');

    $channel_subs_count = !empty($instance['channel_subs_count']) ? $instance['channel_subs_count'] : esc_html__('default', 'yts_domain');
?>

    <!-- Title -->
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
        <?php esc_attr_e('Title:', 'yts_domain'); ?>
      </label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
    </p>

    <!-- Channel -->
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('channel')); ?>">
        <?php esc_attr_e('Channel Name:', 'yts_domain'); ?>
      </label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('channel')); ?>" name="<?php echo esc_attr($this->get_field_name('channel')); ?>" type="text" value="<?php echo esc_attr($channel); ?>">
    </p>

    <!-- Channel Layout -->
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('channel_layout')); ?>">
        <?php esc_attr_e('Channel Layout:', 'yts_domain'); ?>
      </label>
      <select class="widefat" id="<?php echo esc_attr($this->get_field_id('channel_layout')); ?>" name="<?php echo esc_attr($this->get_field_name('channel_layout')); ?>" ?>">
        <option value="default" <?php echo ($channel_layout) == 'default' ? 'selected' : '' ?>>Default</option>
        <option value="full" <?php echo ($channel_layout) == 'full' ? 'selected' : '' ?>>Full</option>
      </select>
    </p>

    <!-- Channel Subscriber Count -->
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('channel_subs_count')); ?>">
        <?php esc_attr_e('Channel Subscriber Count:', 'yts_domain'); ?>
      </label>
      <select class="widefat" id="<?php echo esc_attr($this->get_field_id('channel_subs_count')); ?>" name="<?php echo esc_attr($this->get_field_name('channel_subs_count')); ?>" ?>">
        <option value="default" <?php echo ($channel_subs_count) == 'default' ? 'selected' : '' ?>>Show</option>
        <option value="hidden" <?php echo ($channel_subs_count) == 'hidden' ? 'selected' : '' ?>>Hide</option>
      </select>
    </p>
<?php
  }

  /**
   * Sanitize widget form values as they are saved.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance Values just sent to be saved.
   * @param array $old_instance Previously saved values from database.
   *
   * @return array Updated safe values to be saved.
   */
  public function update($new_instance, $old_instance)
  {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';

    $instance['channel'] = (!empty($new_instance['channel'])) ? sanitize_text_field($new_instance['channel']) : '';

    $instance['channel_layout'] = (!empty($new_instance['channel_layout'])) ? sanitize_text_field($new_instance['channel_layout']) : '';

    $instance['channel_subs_count'] = (!empty($new_instance['channel_subs_count'])) ? sanitize_text_field($new_instance['channel_subs_count']) : '';

    return $instance;
  }
} // class YoutubeSubsWidget
