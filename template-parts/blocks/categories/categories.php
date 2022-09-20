<?php
$cat_args = array(
    'hide_empty' => false,
    'child_of' =>'0',
    'exclude' => get_option( 'default_product_cat' )
);

$product_categories = get_terms( 'product_cat', $cat_args );

if( !empty($product_categories) ) : ?>
<ul class="boxed-categories">
    <?php foreach ($product_categories as $key => $category) :
      $style = '';
      $color = get_field('color', $category);
      $bg = get_term_meta( $category->term_id, 'thumbnail_id', true );
      if($color) $style .= 'background-color: ' . $color . ';';
      if( !empty($style) ) $style = 'style="' . $style . '"';
      ?>
      <li class="boxed-categories__item">
        <div <?= $style ?>>
          <a class="boxed-categories__link" href="<?= get_term_link($category) ?>">
            <span class="boxed-categories__content">
              <span class="boxed-categories__heading"><?= $category->name ?></span>
              <span class="boxed-categories__btn btn btn--cat"><?= __('Kup teraz', 'foreto') ?></span>
            </span>
            <?php if($bg) : ?>
            <span class="boxed-categories__image">
              <img src="<?= wp_get_attachment_image_url( $bg, 'cat-icon' ) ?>" alt="<?= $category->name ?>" loading="lazy">
            </span>
            <?php endif ?>
          </a>
        </div>
      </li>
    <?php endforeach ?>
</ul>
<?php endif ?>