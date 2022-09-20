<?php
/**
 * Benefits tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.0.0
 */

defined( 'ABSPATH' ) || exit;

global $post;

$benefits = get_field('benefits');
$benefits_arr = foreto_get_more_parts($benefits);

$columns = ( count($benefits_arr) > 1 ) ? 'col-md-6' : '';

?>
<div class="prod-benefits">
  <div class="prod-benefits__row row">
    <div class="prod-benefits__col col-12 <?= $columns ?>">
      <?php echo $benefits_arr[0]; ?>
    </div>
    <?php if( count($benefits_arr) > 1 ) : ?>
    <div class="prod-benefits__col col-12 <?= $columns ?>">
      <?php echo $benefits_arr[1]; ?>
    </div>
    <?php endif ?>
  </div>
</div>