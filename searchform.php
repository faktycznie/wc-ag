<?php
$sid = uniqid('search');
?>
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
  <div class="form-group">
    <label for="<?= $sid; ?>" class="screen-reader-text"><?php echo _x( 'Szukaj:', 'foreto' ) ?></label>
    <input id="<?= $sid; ?>" type="search" class="form-control search-form__input"
        placeholder="<?php echo esc_attr__( 'Wpisz, czego szukasz?', 'foreto' ) ?>"
        value="<?php echo get_search_query() ?>" name="s"
        title="<?php echo esc_attr__( 'Szukaj:', 'foreto' ) ?>" />
    <button class="search-form__btn" type="submit" aria-label="<?php echo esc_attr__( 'Szukaj', 'foreto' ) ?>">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="23.997" viewBox="0 0 24 23.997">
      <path id="search" d="M17.613,15.514a9.75,9.75,0,1,0-2.1,2.1h0a1.754,1.754,0,0,0,.147.172l5.775,5.775a1.5,1.5,0,0,0,2.122-2.121l-5.775-5.775s-.111-.1-.172-.15ZM18,9.749A8.25,8.25,0,1,1,9.75,1.5,8.25,8.25,0,0,1,18,9.749Z" transform="translate(0.001 -0.002)" fill="#fff"/>
    </svg>
    </button>
  </div>
</form>