<?php
/**
 * The template for displaying page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package foreto
 */

get_header();

?>
<main class="main mb-64 mb-md-160">
  <div class="main__container container ">
    <div class="single-entry">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php /* ?><header class="single-entry__header d-flex flex-column flex-md-row justify-content-md-between mb-4 mb-md-5">
        <div class="single-entry__header-inner">
          <?php the_title('<h1 class="h2 single-entry__title mb-2">', '</h1>') ?>
        </div>
      <?php </header> */ ?>

      <?php if( has_post_thumbnail() ) : ?>
      <div class="single-entry__photo mb-40 mb-md-64">
        <?php the_post_thumbnail(); ?>
      </div>
      <?php endif; ?>

      <div class="single-entry__content">
        <?php the_content() ?>
      </div>

    <?php endwhile; ?>
    </div>
  </div>
</main>
<?php

get_footer();
