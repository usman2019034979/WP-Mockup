<?php

/**
 * Enable Widgets Option
 */

register_sidebar(
    array(
        'name'          => 'Drop Widget Here',
        'id'            => 'drop_widget_here',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    )
);

/**
 * Create a widget which will show a simple button and can change its text and link also
 */

add_action('widgets_init', 'create_button_widget');
function create_button_widget()
{
    register_widget('register_button_widget');
}

class register_button_widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'register_button_widget',
            __('Simple Button', 'wp-mockup'),
            array('description' => __('Simple Button Description', 'wp-mockup'),)
        );
    }

    public function widget($args, $instance)
    {
        $btn_text     = isset($instance['btn_text']) ? esc_attr($instance['btn_text']) : '';
        $btn_link     = isset($instance['btn_link']) ? esc_attr($instance['btn_link']) : '';

        echo '<a href="' . $btn_link . '">' . $btn_text . '</a>';

        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $btn_text     = isset($instance['btn_text']) ? esc_attr($instance['btn_text']) : '';
        $btn_link     = isset($instance['btn_link']) ? esc_attr($instance['btn_link']) : '';
?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_text')); ?>"><?php _e('Button Text:', 'wp-mockup'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_text')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_text')); ?>" type="text" value="<?php echo esc_attr($btn_text); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link')); ?>"><?php _e('Button Link:', 'wp-mockup'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link')); ?>" type="text" value="<?php echo esc_attr($btn_link); ?>" />
        </p>
<?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['btn_text'] = strip_tags($new_instance['btn_text']);
        $instance['btn_link'] = strip_tags($new_instance['btn_link']);

        return $instance;
    }
}
