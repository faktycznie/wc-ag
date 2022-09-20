<?php global $woocommerce; ?>
<a href="<?php echo wc_get_cart_url() ?>" title="<?php _e('Zobacz koszyk', 'foreto'); ?>" class="cart-header">
  <span class="cart-header__icon">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22.4" viewBox="0 0 24 22.4">
      <path d="M0,2.8A.8.8,0,0,1,.8,2H3.2a.8.8,0,0,1,.776.606L4.624,5.2H23.2a.8.8,0,0,1,.776.994l-2.4,9.6a.8.8,0,0,1-.776.606H6.4a.8.8,0,0,1-.776-.606L2.576,3.6H.8A.8.8,0,0,1,0,2.8Zm5.024,4,2,8H20.176l2-8ZM8,19.6a1.6,1.6,0,1,0,1.6,1.6A1.6,1.6,0,0,0,8,19.6ZM4.8,21.2A3.2,3.2,0,1,1,8,24.4,3.2,3.2,0,0,1,4.8,21.2Zm14.4-1.6a1.6,1.6,0,1,0,1.6,1.6A1.6,1.6,0,0,0,19.2,19.6ZM16,21.2a3.2,3.2,0,1,1,3.2,3.2A3.2,3.2,0,0,1,16,21.2Z" transform="translate(0 -2)" fill="#343a40"/>
    </svg>
    <span class="cart-header__count"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'foreto'), $woocommerce->cart->cart_contents_count);?></span>
  </span>
  <span class="cart-header__total"><?php echo $woocommerce->cart->get_cart_total() ?></span>
</a>