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
        'show_in_rest'        => true,
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

function book_api_on_post_save( $post_id, $post, $update ) {
    // Prevent infinite loops if the API call modifies the post
    if ( wp_is_post_revision( $post_id ) || wp_is_post_autosave( $post_id) ) {
        return;
    }

    // Check if the post status is 'publish' or 'future;
    // You might want to adjust this based on when you want to trigger the API call
    if ( $post->post_status !== 'publish' && $post->post_status !== 'future' ) {
        return;
    }

    // Prepare data for the API call
    $api_data = array(
        'secret'    => 'supersecret',
        'slug' => 'books',
        // Add any other relevant post data
    );

    // Make the API call
    $api_url = 'YOUR_API_ENDPOINT_HERE'; // Replace with your actual API endpoint
    $response = wp_remote_post( $api_url, array(
        'method'    => 'POST',
        'headers'   => array( 'Content-Type' => 'application/x-www-form-urlencoded' ),
        'body'      => $api_data,
        'timeout'   => 45, // Optional: set a timeout for the API request
    ));

    // Handle API response (optional)
    if ( is_wp_error( $response ) ) {
        error_log( 'API Error on post save: ' . $response->get_error_message() );
    } else {
        $body = wp_remote_retrieve_body( $response );
        // Process the API response if needed
        // error_log( 'API Response: ' . $body );
    }
}
add_action( 'save_post_book', 'book_api_on_post_save', 10, 3 );