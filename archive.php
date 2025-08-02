<?php get_header(); ?>

<main class="container">
  <h1><?php the_archive_title(); ?></h1>

  <div class="post-grid">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article class="post-card">
        <a href="<?php the_permalink(); ?>">
          <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('medium'); ?>
          <?php endif; ?>
          <h2><?php the_title(); ?></h2>
          <p><?php the_excerpt(); ?></p>
        </a>
      </article>
    <?php endwhile; ?>

    <div class="pagination">
      <?php the_posts_pagination(); ?>
    </div>
  <?php endif; ?>
  </div>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
