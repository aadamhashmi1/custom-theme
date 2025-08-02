<aside class="sidebar">
  <?php if (is_active_sidebar('main-sidebar')) : ?>
    <?php dynamic_sidebar('main-sidebar'); ?>
  <?php else : ?>
    <p>Add widgets via Appearance > Widgets</p>
  <?php endif; ?>
</aside>
