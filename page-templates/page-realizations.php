<?php
/*
* Template Name: Realizacje
*/


get_header();

$args = [
  'post_type' => 'page',
  'fields' => 'ids',
  'nopaging' => true,
  'meta_key' => '_wp_page_template',
  'meta_value' => 'page-templates/page-realizations.php'
];
$pages = get_posts( $args );

$page_id = ( !empty($pages) ) ? $pages[0] : get_the_ID();

$realizations_heading = get_the_title( $page_id );
$realizations_description = get_the_content(null, false, $page_id);
$realizations_image = get_the_post_thumbnail_url( $page_id );

get_template_part( 'template-parts/category-header', null, array(
  'category_heading'     => $realizations_heading,
  'category_description' => $realizations_description,
  'category_image'       => $realizations_image,
  'section_class'        => 'mb-0'
) );

$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

$r_cat = 0;
$r_industry = 0;

if( get_query_var( 'realization_cat' ) ) {
  $r_cat = get_queried_object()->term_id;
}

if( get_query_var( 'realization_industry' ) ) {
  $r_industry = get_queried_object()->term_id;
}

?>
<main class="main pt-00 pb-40 pt-md-80 pb-md-80">
  <div class="main__container container">
    <div class="row gx-5">

      <div class="col-12 col-md-3">
        <?php get_sidebar('realizations'); ?>
      </div>

      <div class="col-12 col-md-9">
        <div class="latest latest--realizations">
          <?php get_template_part( 'template-parts/realization-list', null, array(
            'paged' => $paged,
            'r_cat' => $r_cat,
            'r_industry' => $r_industry,
          ) );
          ?>
        </div>
      </div>

    </div>
  </div>
</main>

<?php
get_template_part( 'template-parts/contact' );
get_template_part( 'template-parts/footer-seo' );

get_footer();