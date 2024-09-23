<?php

/**
 * This is another file for theme settings
 */

function customize_register_cb($wp_customize)
{
    $wp_customize->add_panel('mockup', array(
        'title' => __('Mockup'),
        'description' => 'Panel Description',
        'priority' => 10,
    ));
    $wp_customize->add_section('add_section_title', array(
        'title' => 'Add Section Title',
        'panel' => 'mockup',
    ));
    $wp_customize->add_setting('title_id', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => '',
    ));
    $wp_customize->add_control('title_id', array(
        'type' => 'text',
        'section' => 'add_section_title',
        'label' => 'Add Title',
    ));

    $wp_customize->add_setting('desc_id', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => '',
    ));
    $wp_customize->add_control('desc_id', array(
        'type' => 'textarea',
        'section' => 'add_section_title',
        'label' => 'Add Description',
    ));
}

add_action('customize_register', 'customize_register_cb');
