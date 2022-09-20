<?php
/**
 * The template for displaying all single posts
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
      <header class="single-entry__header d-flex flex-column flex-md-row justify-content-md-between mb-4 mb-md-5">
        <div class="single-entry__header-inner">
          <?php the_title('<h1 class="h2 single-entry__title mb-2">', '</h1>') ?>
          <div class="single-entry__meta d-flex flex-wrap gx-3">
              <span class="single-entry__date"><?= get_post_time('d.m.Y') ?></span>
              <span class="single-entry__categories"><?php the_category(', ') ?></span>
              <span class="single-entry__readtime">
                <svg xmlns="http://www.w3.org/2000/svg" width="14.138" height="14.138" viewBox="0 0 14.138 14.138">
                  <g id="time" transform="translate(-2.25 -2.25)">
                    <path d="M9.319,16.388a7.069,7.069,0,1,1,7.069-7.069A7.069,7.069,0,0,1,9.319,16.388Zm0-13.128a6.059,6.059,0,1,0,6.059,6.059A6.059,6.059,0,0,0,9.319,3.26Z" transform="translate(0 0)" fill="#69737a"/>
                    <path d="M19.7,15.449l-2.823-2.823V7.875h1.01v4.332l2.525,2.53Z" transform="translate(-8.061 -3.1)" fill="#69737a"/>
                  </g>
                </svg>
                <?= foreto_readingtime( get_the_content() ) ?>
              </span>
              <span class="single-entry__meta-author">
                <svg xmlns="http://www.w3.org/2000/svg" width="10.917" height="14.426" viewBox="0 0 10.917 14.426">
                  <g id="Group_1299" data-name="Group 1299" transform="translate(-380.762 -988)">
                    <path d="M17.667,25.831H16.575V24.089a2.739,2.739,0,0,0-2.729-2.742H10.571a2.739,2.739,0,0,0-2.729,2.742v1.742H6.75V24.089a3.834,3.834,0,0,1,3.821-3.839h3.275a3.834,3.834,0,0,1,3.821,3.839Z" transform="translate(374.012 976.594)" fill="#69737a"/>
                    <path d="M13.964,3.347a2.742,2.742,0,1,1-2.742,2.742,2.742,2.742,0,0,1,2.742-2.742m0-1.1A3.839,3.839,0,1,0,17.8,6.089,3.839,3.839,0,0,0,13.964,2.25Z" transform="translate(372.256 985.75)" fill="#69737a"/>
                  </g>
                </svg>
                <?php the_author() ?>
              </span>
          </div>
        </div>
      </header>

      <?php if( has_post_thumbnail() ) : ?>
      <div class="single-entry__photo mb-40 mb-md-64">
        <?php the_post_thumbnail(); ?>
      </div>
      <?php endif; ?>

      <div class="single-entry__content">
        <?php the_content() ?>
      </div>

      <div class="single-entry__author author d-flex flex-column flex-md-row align-items-center mt-80">
        <div class="author__photo flex-shrink-0"><?= get_avatar( get_the_author_meta('user_email'), 160 ) ?></div>
        <div class="author__content">
          <p class="author__name h4 mb-4 text-center text-md-start"><?php the_author() ?></p>
          <p class="author__bio"><?= get_the_author_meta('user_description') ?></p>
        </div>
      </div>

    <?php endwhile; ?>
    </div>
  </div>

</main>
<?php

get_footer();
