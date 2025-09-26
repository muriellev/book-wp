<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>

<header role="banner" class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 header-container">
        <div class="flex h-16 items-center justify-between">
            <a href="/" class="flex items-center space-x-2">
                <img src="<?php echo wp_get_attachment_url( get_theme_mod( 'custom_logo' ) )?>" alt="Book Boutique" width=200 height=100 />
            </a>

            <?php
            wp_nav_menu( array(
                'theme_location' => 'header-menu',
                'container'      => 'nav', // Optional: wrap the menu in a <nav> tag
                'container_class'=> 'header-nav', // Optional: add a class to the container
                'menu_class'     => 'main-menu md:flex space-x-6', // Optional: add a class to the <ul> element
                'fallback_cb'    => false, // Optional: prevent fallback to default page list
            ) );
            ?>
        </div>
    </div>
</header>