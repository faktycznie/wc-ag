<?php
if (function_exists('yoast_breadcrumb')) {
  $title = get_the_title();
  $title_html = (!empty($title)) ? '<h1 class="breadcrumbs__title">' . $title . '</h1>' : '';
  if(is_search()) {
    $title_html = '<h1 class="breadcrumbs__title">' . sprintf( esc_html__( 'Wyniki wyszukiwania: %s', 'foreto' ), '<span>' . get_search_query() . '</span>' ) . '</h1>';
  }
  $template_directory = get_template_directory_uri();
  $background_url = $template_directory . '/assets/img/breadcrumbs.png';
  yoast_breadcrumb('<div class="breadcrumbs breadcrumbs--yoast" style="background-image: url(' . $background_url . ')"><div class="breadcrumbs__container container">' . $title_html, '</div></div>');
}
