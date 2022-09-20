<?php
/*
* Template Name: Lookbook
*/

get_header();

$lookbook_heading = ( get_field('lookbook_heading', get_the_ID()) ) ? get_field('lookbook_heading', get_the_ID()) : get_the_title();
$lookbook_description = get_the_content();
$lookbook_image = get_the_post_thumbnail_url();

get_template_part( 'template-parts/category-header', null, array(
  'category_heading'     => $lookbook_heading,
  'category_description' => $lookbook_description,
  'category_image'       => $lookbook_image,
) );

$lookbook_collections_heading = get_field('lookbook_collections_heading', get_the_ID());
$lookbook_collections_description = get_field('lookbook_collections_description', get_the_ID());
$lookbook_collections = get_field('lookbook_collections', get_the_ID());

get_template_part( 'template-parts/lookbook-collections', null, array(
  'collections_heading'    => $lookbook_collections_heading,
  'collections_descripton' => $lookbook_collections_description,
  'collections_items'      => $lookbook_collections,
) );

get_template_part( 'template-parts/contact' );
get_template_part( 'template-parts/footer-seo' );

get_footer();
