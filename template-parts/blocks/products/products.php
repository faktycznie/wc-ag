<?php
$id = 'products-' . $block['id'];

$orderby = ( get_field('orderby') ) ? get_field('orderby') : 'publish_date';
$limit = ( get_field('limit') ) ? get_field('limit') : '12';

$args = array(
  'post_type' => 'product',
  'post_status' => 'publish',
  'ignore_sticky_posts' => 1,
  'posts_per_page' => $limit,
);

if( $orderby == 'total_sales' ) {
  $args['meta_key'] = 'total_sales';
  $args['orderby'] = 'meta_value_num';
  $args['order'] = 'DESC';
} else {
  $args['orderby'] = 'publish_date';
  $args['order'] = 'DESC';
}

$product_query = new WP_Query($args);
$className = ( !empty($block['className']) ) ? sanitize_html_class($block['className']) : '';

if ( $product_query->have_posts() ) { ?>
  <div class="woocommerce-products <?= $className ?>">
  <?php
  woocommerce_product_loop_start();
  while ( $product_query->have_posts() ) {
    $product_query->the_post();
    get_template_part( 'template-parts/blocks/products/content-product' );
  } ?>
  <?php
  wp_reset_postdata();
  woocommerce_product_loop_end();
  ?>
  </div>
  <?php
}



