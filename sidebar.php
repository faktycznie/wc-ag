<?php if ( is_active_sidebar( 'category' ) ) : ?>
  <aside class="col-12 col-md-3">
    <?php if( is_active_sidebar( 'category-mobile' ) ) : ?>
      <div class="sidebar sidebar--mobile">
      <?php dynamic_sidebar( 'category-mobile' ); ?>
      </div>
    <?php endif ?>
    <div class="sidebar sidebar--desktop">
      <a href="#" class="mobile-filters-close"><?= __('Zamknij', 'foreto') ?></a>
      <?php dynamic_sidebar( 'category' ); ?>
    </div>
  </aside>
<?php endif; ?>