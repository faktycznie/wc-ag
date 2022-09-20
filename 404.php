<?php

/**
 * The template for displaying error 404
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package foreto
 */

get_header();

?>
<main class="main mb-64 mb-md-160 error-404">
  <div class="error-404__container">
    <div class="error-404__title">
      <h1 class="h1"><?= __('404', 'foreto') ?></h1>
    </div>
    <div class="error-404__text">
      <p><?= __('Ups', 'foreto') ?></p>
      <p><?= __('Strona nie została odnaleziona', 'foreto') ?></p>
    </div>
    <div class="error-404__button">
      <a class="btn btn--primary" href="<?= get_site_url(); ?>"><?= __('Wróć na stronę główną', 'foreto') ?></a>
    </div>
  </div>
</main>
<?php
get_template_part('template-parts/footer-seo');

get_footer();
