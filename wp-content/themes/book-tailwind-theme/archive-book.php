<?php get_header(); ?>
<main class="container mx-auto p-6 max-w-7xl px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold mb-6">Books Available</h1>
    <?php if ( have_posts() ) : ?>
        <ul class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 books-list">
    
            <?php while ( have_posts() ) : the_post(); ?>
            
            <li class="text-black rounded shadow p-4 relative book-card">
                <a href="<?php echo get_permalink(); ?>" class="block hover:opacity-90">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="?php the_title(); ?>" width="600" height="400" class="w-full h-auto rounded mb-3"/>
                    <h2 class="text-xl text-black font-semibold"><?php the_title(); ?></h2>
                    <div class="prose prose-sm mt-2"><?php the_excerpt(); ?></div>
                </a>
            </li> 
            <?php endwhile; ?>

        </ul>

        <?php the_posts_navigation(); 

    else :

        get_template_part( 'template-parts/content', 'none' );

    endif; ?>
</main>
<?php get_footer();
