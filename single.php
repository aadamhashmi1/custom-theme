<?php get_header(); ?>

<main class="container">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article class="single-post">
      <h1><?php the_title(); ?></h1>

      <div class="meta">
        <span>Published on <?php echo get_the_date(); ?></span> |
        <span>Categories: <?php the_category(', '); ?></span>
      </div>

      <?php if (has_post_thumbnail()) : ?>
        <div class="featured-image">
          <?php the_post_thumbnail('large'); ?>
        </div>
      <?php endif; ?>

      <div class="content">
        <?php the_content(); ?>
      </div>
    </article>
  <?php endwhile; endif; ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
