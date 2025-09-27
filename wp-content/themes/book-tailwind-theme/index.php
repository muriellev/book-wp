<?php get_header(); ?>
<main class="container mx-auto p-6 max-w-7xl px-4 sm:px-6 lg:px-8">
  <?php if ( have_posts() ) : ?>
  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
        <h2><?php the_title(); ?></h2>
        <div><?php the_content(); ?></div>
    <?php endwhile; ?>
  </div>
  <?php endif; ?>
</main>
<?php get_footer();