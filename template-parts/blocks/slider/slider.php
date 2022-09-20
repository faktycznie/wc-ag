<?php

$id = 'slider-' . $block['id'];
$slides = get_field('slides');

if($slides) :
?>
<div id="<?= esc_attr($id) ?>" class="slider" data-slick='{"slidesToShow": 1}'>
  <?php foreach($slides as $slide) : ?>
    <div class="slider__slide">
      <?php 
      $image_id = $slide['image']['id'];
      echo wp_get_attachment_image( $image_id, 'slider' );
      ?>
      <?php if( $slide['name'] && $slide['link'] ) : ?>
        <div class="slider__content">
          <a href="<?= esc_url($slide['link']) ?>" class="btn btn--slider"><?= esc_html($slide['name']) ?></a>
        </div>
      <?php endif ?>
    </div>
  <?php endforeach ?>
</div>
<script>
  jQuery( document ).ready((e) => {
    jQuery('#<?= esc_attr($id) ?>').slick({
          prevArrow: '<div class="slick-prev"></div>',
          nextArrow: '<div class="slick-next"></div>'
        });
  });
</script>
<?php
endif;
