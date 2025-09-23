<?php get_header(); ?>
<main class="container mx-auto p-6">
  <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl">Hello Tailwind + WordPress 👋</h1>
  <?php if ( have_posts() ) : ?>
  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
        <h2><?php the_title(); ?></h2>
        <div><?php the_content(); ?></div>
    <?php endwhile; ?>
  </div>
  <?php endif; ?>
</main>
<?php get_footer(); ?>