<?php

/**
 * Parametrized shortcode 
 * 
 * [param_shortcode] paste it (if you want to use default attributes).
 * [param_shortcode link="https://www.google.com/" text="Google Link"]    paste it (if you want to use your custom data)
 */

if (!function_exists('parametrized_shortcode_cb')) {
    function parametrized_shortcode_cb($atts)
    {
        $atts = array_change_key_case($atts, CASE_LOWER);
        $args = array(
            'link' => '#',
            'text' => 'Button link'
        );

        $atts = shortcode_atts($args, $atts);

        ob_start();

        echo '<a href="' . esc_url($atts['link']) . '">' . esc_html($atts['text']) . '</a>';

        $html = ob_get_clean();
        return $html;
    }
}

add_shortcode('param_shortcode', 'parametrized_shortcode_cb');
