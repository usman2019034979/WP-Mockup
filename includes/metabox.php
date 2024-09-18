<?php

/**
 * Create Custom Meta Box
 */

function add_custom_fields_meta_box()
{
    add_meta_box(
        'book_meta_box',
        'Book Meta Fields',
        'display_book_meta_box_cb',
        'book',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_custom_fields_meta_box');

// Callback function for book meta box
function display_book_meta_box_cb($post)
{
    wp_nonce_field('book_meta_box_nonce', 'book_meta_box_nonce_field');

    $post_heading   =   get_post_meta($post->ID, 'post_heading', true);
    $post_desc   =   get_post_meta($post->ID, 'post_desc', true);
?>
    <label for="post_heading">Post Heading:</label>
    <input type="text" id="post_heading" name="post_heading" value="<?php echo $post_heading; ?>" style="width: 100%; height: 30px; margin-top:10px;">

    <label for="post_desc">Post Heading:</label>
    <input type="text" id="post_desc" name="post_desc" value="<?php echo $post_desc; ?>" style="width: 100%; height: 30px; margin-top:10px;">
<?php
}

// Save Meta Fields data into database
function save_book_fields_data($post_id)
{
    if (!isset($_POST['book_meta_box_nonce_field']) || !wp_verify_nonce($_POST['book_meta_box_nonce_field'], 'book_meta_box_nonce')) {
        return;
    }

    if (isset($_POST['post_heading'])) {
        update_post_meta($post_id, 'post_heading', sanitize_text_field($_POST['post_heading']));
    }

    if (isset($_POST['post_desc'])) {
        update_post_meta($post_id, 'post_desc', sanitize_text_field($_POST['post_desc']));
    }
}
add_action('save_post', 'save_book_fields_data');
