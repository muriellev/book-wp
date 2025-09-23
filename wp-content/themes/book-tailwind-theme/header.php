<?php wp_head(); ?>
<header role="banner">
    <div class="container mx-auto p-6">
        <div class="flex flex-row">
            <div class="basis-64">
                <div class="logo">
                    <?php the_custom_logo();?>
                </div>
            </div>
            <div class="basis-64"></div>
            <div class="basis-128">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'header-menu',
                    'container'      => 'nav', // Optional: wrap the menu in a <nav> tag
                    'container_class'=> 'header-nav', // Optional: add a class to the container
                    'menu_class'     => 'main-menu flex flex-col md:flex-row', // Optional: add a class to the <ul> element
                    'fallback_cb'    => false, // Optional: prevent fallback to default page list
                ) );
                ?>
            </div>
        </div>
    </div>
</header>