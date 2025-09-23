<?php

function booktailwind_enqueue_styles() {
    wp_enqueue_style('my-tailwind', get_stylesheet_directory_uri() . '/dist/main.css');
    wp_enqueue_style('my-tailwind-custom', get_stylesheet_directory_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'booktailwind_enqueue_styles');

function register_my_header_menu() {
    register_nav_menus(
        array (
            'header-menu' => __( 'Header Menu' ),
        )
        );
}

add_action('after_setup_theme', function () {
  add_theme_support('editor-styles');          // allow custom CSS in block editor
  add_editor_style('dist/main.css');           // load Tailwind in editor
  add_theme_support('post-thumbnails');
  add_theme_support('title-tag');
  add_theme_support( 'custom-logo' );
  register_my_header_menu();
});