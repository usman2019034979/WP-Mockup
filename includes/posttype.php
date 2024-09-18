<?php

/**
 * Create wordpress custom post type
 */

if (!function_exists('create_custom_post_type')) {
    function create_custom_post_type()
    {
        $labels = array(
            'name'               => 'Books',
            'singular_name'      => 'Book',
            'menu_name'          => 'Books',
            'name_admin_bar'     => 'Book',
            'add_new'            => 'Add New',
            'add_new_item'       => 'Add New Book',
            'new_item'           => 'New Book',
            'edit_item'          => 'Edit Book',
            'view_item'          => 'View Book',
            'all_items'          => 'All Books',
            'search_items'       => 'Search Books',
            'parent_item_colon'  => 'Parent Books:',
            'not_found'          => 'No books found.',
            'not_found_in_trash' => 'No books found in Trash.',
        );
        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => 'book'),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        );
        register_post_type('book', $args);
    }
}

add_action('init', 'create_custom_post_type');

/**
 * Create wordpress custom post type taxonomy
 */

if (!function_exists('create_custom_post_type_taxonomy')) {
    function create_custom_post_type_taxonomy()
    {
        $labels = array(
            'name'              => 'Book Categories',
            'singular_name'     => 'Book Category',
            'search_items'      => 'Search Book Categories',
            'all_items'         => 'All Book Categories',
            'parent_item'       => 'Parent Book Category',
            'parent_item_colon' => 'Parent Book Category:',
            'edit_item'         => 'Edit Book Category',
            'update_item'       => 'Update Book Category',
            'add_new_item'      => 'Add New Book Category',
            'new_item_name'     => 'New Book Category Name',
            'menu_name'         => 'Book Categories',
        );
        $args = array(
            'labels'            => $labels,
            'hierarchical'      => true,
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array('slug' => 'book-category'),
        );

        register_taxonomy('book_category', array('book'), $args);
    }
}
add_action('init', 'create_custom_post_type_taxonomy');
