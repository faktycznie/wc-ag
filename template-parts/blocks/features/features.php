<?php

$id = 'features-' . $block['id'];
$features = get_field('features');

if($features ) :
?>
<div class="features">
  <?php foreach($features as $feature) : ?>
    <div class="features__item">
      <?php if( $feature['icon_svg'] ) : ?>
        <div class="features__icon">
        <?= $feature['icon_svg'] ?>
        </div>
      <?php endif ?>
      <div class="features__content">
        <?php if( $feature['title'] ) : ?>
          <h3 class="features__title">
          <?= $feature['title'] ?>
          </h3>
        <?php endif ?>
        <?php if( $feature['desc'] ) : ?>
          <div class="features__desc">
          <?= $feature['desc'] ?>
          </div>
        <?php endif ?>
      </div>
    </div>
  <?php endforeach ?>
</div>
<?php
endif;