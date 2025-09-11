<?php
/**
 * Plugin Name: Books CPT
 * Description: Registers the "Book" custom post type and "Genre" taxonomy.
 */

add_action('init', function () {
    register_post_type('book', [
        'labels' => [
            'name'          => __('Books'),
            'singular_name' => __('Book'),
            'add_new_item'  => __('Add New Book'),
            'edit_item'     => __('Edit Book'),
        ],
        'public'             => true,
        'show_in_menu'       => true,
        'has_archive'        => true,              // enables /books
        'rewrite'            => ['slug' => 'books'],
        'supports'           => ['title','editor','thumbnail','excerpt','custom-fields'],
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-book-alt',
        'show_in_rest'       => true,              // Gutenberg + REST API
        'capability_type'    => 'post',
        'map_meta_cap'       => true,
        'show_in_rest'        => true,
        'show_in_graphql'     => true,
        'graphql_single_name' => 'Book',
        'graphql_plural_name' => 'Books',
    ]);

    // --- Taxonomy: Genre ---
    register_taxonomy('genre', ['book'], [
        'labels'       => ['name' => __('Genres')],
        'hierarchical' => true,
        'public'       => true,
        'rewrite'      => ['slug' => 'genre'],
        'show_in_rest' => true,
        'show_in_graphql'     => true,
        'graphql_single_name' => 'Genre',
        'graphql_plural_name' => 'Genres',
    ]);

    // --- Taxonomy: Author ---
    register_taxonomy('author', ['book'], [
        'labels'       => ['name' => __('Author')],
        'hierarchical' => true,
        'public'       => true,
        'rewrite'      => ['slug' => 'author'],
        'show_in_rest' => true,
        'show_in_graphql'     => true,
        'graphql_single_name' => 'Author',
        'graphql_plural_name' => 'Authors',
    ]);

    // --- Taxonomy: Publisher ---
    register_taxonomy('publisher', ['book'], [
        'labels'       => ['name' => __('Publisher')],
        'hierarchical' => true,
        'public'       => true,
        'rewrite'      => ['slug' => 'publisher'],
        'show_in_rest' => true,
        'show_in_graphql'     => true,
        'graphql_single_name' => 'Publisher',
        'graphql_plural_name' => 'Publishers',
    ]);
});