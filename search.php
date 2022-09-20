<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Foreto
 */

get_header();

?>
<main class="main">
  <div class="main__container container">
    <header class="search-header mb-40 mb-md-60">
      <h1 class="search-header__title h2">
        <?php
        printf(esc_html__('Wyniki wyszukiwania: %s', 'foreto'), '<span>' . get_search_query() . '</span>');
        ?>
      </h1>
    </header>
    <div class="row gx-5">
      <div class="col-12">
        <div class="search__wrapper">
          <div class="search__items woocommerce">
            <ul class="search__list products">
              <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                  <li class="search__item product">
                    <a href="<?= get_the_permalink() ?>" class="search__item-link woocommerce-LoopProduct-link woocommerce-loop-product__link">
                      <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail() ?>
                      <?php endif ?>
                      <h2 class="search__item-title woocommerce-loop-product__title"><?= get_the_title() ?></h2>
                      <?php /* <div class="entry-summary">
                      <?php the_excerpt(); ?>
                    </div> */ ?>
                    </a>
                  </li>
                <?php endwhile; // end of the loop. 
                ?>
              <?php else : ?>
                <h3><?= __('Nic nie znaleziono', 'foreto') ?></h3>
              <?php endif; ?>
            </ul>
          </div>
        </div>
        <nav class="search__pagination pagination">
          <?php foreto_pagination(); ?>
        </nav>

      </div>
    </div>
  </div>
</main>

<?php
get_footer();
