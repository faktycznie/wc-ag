<?php
/*
* Template Name: Kolekcja
*/

get_header();

$collection_heading = ( get_field('collection_heading', get_the_ID()) ) ? get_field('collection_heading', get_the_ID()) : get_the_title();
$collection_description = get_the_content();

$collection_slider = get_field('collection_slider', get_the_ID());
$collection_images = get_field('collection_images', get_the_ID());

?>

<div class="page-collection">
  <div class="page-collection__container container">
    <div class="collection-grid mb-40 mb-md-160">
      <div class="collection-grid__item collection-grid__item--title">
        <h1 class="h3 collection-grid__heading"><?= $collection_heading ?></h1>
      </div>
      <div class="collection-grid__item collection-grid__item--slider rounded-right overflow-hidden">
        <div class="collection-grid__swiper swiper">
          <div class="collection-grid__swiper-wrapper swiper-wrapper">
          <?php 
          $i = 0;
          foreach($collection_slider as $slide) : $i++; ?>
            <div class="collection-grid__slide swiper-slide item-<?= $i ?>">
              <img src="<?= $slide['sizes']['collections_big'] ?>" alt="" loading="lazy">
            </div>
          <?php endforeach; ?>
          </div>
          <div class="collection-grid__arrows collection-grid__arrows--prev swiper-button-prev"></div>
          <div class="collection-grid__arrows collection-grid__arrows--next swiper-button-next"></div>
        </div>
      </div>
      <div class="collection-grid__item collection-grid__item--imga rounded-right overflow-hidden">
        <img src="<?= $collection_images[0]['sizes']['collections_small'] ?>" alt="" loading="lazy">
      </div>
      <div class="collection-grid__item collection-grid__item--content pe-5">
        <?= $collection_description ?>
      </div>
      <div class="collection-grid__item collection-grid__item--imgb rounded-right overflow-hidden">
        <img src="<?= $collection_images[1]['sizes']['collections_small'] ?>" alt="" loading="lazy">
      </div>
      <div class="collection-grid__item collection-grid__item--imgc rounded-right overflow-hidden">
        <img src="<?= $collection_images[2]['sizes']['collections_small'] ?>" alt="" loading="lazy">
      </div>
    </div>

    <?php 
    if ($post->post_parent) :
      $pagelist = get_pages("child_of=".$post->post_parent."&parent=".$post->post_parent."&sort_column=menu_order&sort_order=asc");
      $pages = array();
      foreach ($pagelist as $page) {
        $pages[] += $page->ID;
      }

      $current = array_search($post->ID, $pages);
      $prevID = ( !empty($pages[$current-1]) ) ? $pages[$current-1] : 0;
      $nextID = ( !empty($pages[$current+1]) ) ? $pages[$current+1] : 0;
    ?>
    <nav class="post-pagination mb-40 mb-md-160" role="navigation">
      <div class="post-pagination__links d-flex">
          <?php if (!empty($prevID)) : ?>
            <div class="post-pagination__prev d-flex flex-column">
              <span class="post-pagination__label mb-2"><?= __('Poprzednia kolekcja', 'foreto') ?></span>
              <a class="post-pagination__link post-pagination__link--prev arrow-left-link" rel="prev" href="<?php echo get_permalink($prevID); ?>" title="<?php echo get_the_title($prevID); ?>"><?php echo get_the_title($prevID); ?></a>
            </div>
          <?php endif;
          if (!empty($nextID)) : ?>
          <div class="post-pagination__next d-flex flex-column ms-auto">
            <span class="post-pagination__label mb-2"><?= __('Kolejna kolekcja', 'foreto') ?></span>
            <a class="post-pagination__link post-pagination__link--next arrow-right-link" rel="next" href="<?php echo get_permalink($nextID); ?>" title="<?php echo get_the_title($nextID); ?>"><?php echo get_the_title($nextID); ?></a>
          </div>
          <?php endif ?>
      </div>
    </nav>
    <?php endif ?>
  </div>
</div>

<?php

get_template_part( 'template-parts/contact' );
get_template_part( 'template-parts/footer-seo' );

get_footer();