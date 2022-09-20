<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

$downloads = get_field('download');

if( !empty($downloads) ) : ?>
  <div class="product__downloads downloads">
    <a class="downloads__btn btn btn-border" href="#"><?= __('Pobierz dokumenty', 'foreto') ?></a>
    <ul class="downloads__list">
    <?php foreach($downloads as $file) :
      if( empty($file['file']) ) continue;
      $name = ( !empty($file['name']) ) ? $file['name'] : $file['file']['title'];
      $icon = sanitize_html_class($file['file']['subtype']);
      ?>
      <li class="downloads__item <?= $icon ?>">
        <a href="<?=  $file['file']['url'] ?>"><?=  $file['name'] ?></a>
      </li>
    <?php endforeach; ?>
    </ul>
  </div>
  <?php
endif;
