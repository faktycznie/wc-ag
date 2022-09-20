<div class="weight-discount-box">
  <div class="weight-discount-box__text">
    <svg xmlns="http://www.w3.org/2000/svg" width="25.503" height="27.007" viewBox="0 0 25.503 27.007">
      <g id="Group_1472" data-name="Group 1472" transform="translate(-0.052 -0.028)">
        <path id="Path_3253" data-name="Path 3253" d="M18.334,26.285H7.256c-4.069,0-7.19-1.47-6.3-7.385l1.032-8.016C2.532,7.932,4.414,6.8,6.066,6.8H19.573c1.676,0,3.449,1.215,4.081,4.081L24.686,18.9C25.439,24.147,22.4,26.285,18.334,26.285Zm.182-19.774S15.949.778,12.783.778h0A5.733,5.733,0,0,0,7.026,6.511h0" transform="translate(0 0)" fill="none" stroke="#200e32" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" fill-rule="evenodd" />
        <line id="Line_17" data-name="Line 17" x1="0.045" transform="translate(16.668 12.487)" fill="none" stroke="#200e32" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
        <line id="Line_18" data-name="Line 18" x1="0.046" transform="translate(8.926 12.487)" fill="none" stroke="#200e32" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
      </g>
    </svg>
    <p class="weight-discount-message">
      <?php printf(__('Dobierz %1$s do %2$s, aby cieszyć się', 'foreto'), '<b>' . $args['weight'] . '</b>', $args['discount_weight']) ?>
      <strong><?= __('zniżką na produkty zamawiane!', 'foreto') ?></strong>
    </p>
  </div>
  <div class="weight-discount-box__link">
    <a href="<?= get_permalink(wc_get_page_id('shop')) ?>"><?= __('Dodaj', 'foreto') ?></a>
  </div>
</div>