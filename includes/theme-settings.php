<?php

/**
 * Create WordPress Theme Settings
 */

function theme_settings_admin_page()
{
    add_menu_page("Theme Settings", "Theme Settings", "manage_options", "theme_settings", "theme_settings_cb", "", 99);
}

add_action('admin_menu', 'theme_settings_admin_page');

// Callback function for theme settings
function theme_settings_cb()
{
    echo '<form method="post" action="options.php">';
    settings_fields('theme_register_settings');
    do_settings_sections('theme_settings');
    submit_button();
    echo '</form>';
}

// Register Theme Settings 
function register_theme_settings()
{
    register_setting('theme_register_settings', 'theme_register_settings_site_name');
    register_setting('theme_register_settings', 'theme_register_settings_site_tagline');

    add_settings_section('theme_register_setting', 'Theme Settings Sections', 'theme_settings_section_cb', 'theme_settings');
    add_settings_field('theme_register_setting', 'Theme Settings Fields', 'theme_settings_field_cb', 'theme_settings', 'theme_register_setting');
}

add_action('admin_init', 'register_theme_settings');

// Settings Section Callback
function theme_settings_section_cb() {}

// Settings Field Callback
function theme_settings_field_cb()
{
    $site_name = get_option('theme_register_settings_site_name');
    echo "<input type='text' placeholder='Enter Your site name' name='theme_register_settings_site_name' value='" . esc_attr($site_name) . "' />";

    echo '<br><br>';

    $site_tagline = get_option('theme_register_settings_site_tagline');
    echo "<input type='text' placeholder='Enter site tagline' name='theme_register_settings_site_tagline' value='" . esc_attr($site_tagline) . "' />";
}
