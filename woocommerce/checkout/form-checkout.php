<?php

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */
if (!defined('ABSPATH')) {
	exit;
}
do_action('woocommerce_before_checkout_form', $checkout);
// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
	echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
	return;
}
global $wp;
?>
<div class="container page-checkout">
	<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
		<div class="row">
			<div class="col">
				<div class="checkout-review-order">
					<div class="accordion accordion-flush" id="checkoutSteps">
						<div class="accordion-item">
							<h2 class="accordion-header" id="step-headingOne">
								<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#step-collapseOne" aria-expanded="true" aria-controls="step-collapseOne">
									<h2>
										<div class="step-number">1</div><?= __('Dane osobowe', 'foreto') ?>
									</h2>
								</button>
							</h2>
							<div id="step-collapseOne" class="accordion-collapse collapse show" aria-labelledby="step-headingOne" data-bs-parent="#checkoutSteps">
								<div class="accordion-body">
									<?php if (is_user_logged_in()) :
										$user = wp_get_current_user();
									?>
										<p class="logged__message"><?= __('Jesteś zalogowany/na jako', 'foreto') ?> <a href="<?= get_permalink(get_option('woocommerce_myaccount_page_id')) ?>"><?= $user->display_name ?></a></p>
										<p class="logged__logout"><?= __('Nie ty?', 'foreto') ?> <a href="<?= wp_logout_url(home_url($wp->request)) ?>"><?= __('Wyloguj się', 'foreto') ?></a></p>
										<p class="logged__warning">Jeśli teraz wylogujesz się, twój koszyk zostanie anulowany.</p>
									<?php else : ?>
										<p class="not-logged__message"><?php echo apply_filters('woocommerce_checkout_login_message', esc_html__('Returning customer?', 'woocommerce')) . ' <a href="#" class="showlogin">' . esc_html__('Click here to login', 'woocommerce') . '</a>'; ?></p>
									<?php endif ?>
									<button type="button" class="btn-confirm" data-bs-toggle="collapse" data-bs-target="#step-collapseTwo" aria-expanded="false" aria-controls="step-collapseTwo">
										Potwierdzam
									</button>
								</div>
							</div>
						</div>
						<div class="accordion-item">
							<h2 class="accordion-header" id="step-headingTwo">
								<button disabled class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#step-collapseTwo" aria-expanded="false" aria-controls="step-collapseTwo">
									<h2>
										<div class="step-number">2</div><?= __('Adresy', 'foreto') ?>
									</h2>
								</button>
							</h2>
							<div id="step-collapseTwo" class="accordion-collapse collapse" aria-labelledby="step-headingOne" data-bs-parent="#checkoutSteps">
								<div class="accordion-body">
									<?php if ($checkout->get_checkout_fields()) : ?>
										<?php do_action('woocommerce_checkout_before_customer_details'); ?>
										<div class="col2-set" id="customer_details">
											<div class="col-1">
												<?php do_action('woocommerce_checkout_billing'); ?>
											</div>
											<div class="col-2">
												<?php do_action('woocommerce_checkout_shipping'); ?>
											</div>
										</div>
										<?php do_action('woocommerce_checkout_after_customer_details'); ?>
									<?php endif; ?>
									<button type="button" class="btn-confirm" data-bs-toggle="collapse" data-bs-target="#step-collapseThree" aria-expanded="false" aria-controls="step-collapseThree">
										Potwierdzam
									</button>
								</div>
							</div>
						</div>
						<div class="accordion-item">
							<h2 class="accordion-header" id="step-headingOne">
								<button disabled class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#step-collapseThree" aria-expanded="false" aria-controls="step-collapseThree">
									<h2>
										<div class="step-number">3</div><?= __('Sposób dostawy', 'foreto') ?>
									</h2>
								</button>
							</h2>
							<div id="step-collapseThree" class="accordion-collapse collapse" aria-labelledby="step-headingOne" data-bs-parent="#checkoutSteps">
								<div class="accordion-body">
									<?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>
										<?php do_action('woocommerce_cart_totals_before_shipping'); ?>
										<?php wc_cart_totals_shipping_html(); ?>
										<?php do_action('woocommerce_cart_totals_after_shipping'); ?>
									<?php elseif (WC()->cart->needs_shipping() && 'yes' === get_option('woocommerce_enable_shipping_calc')) : ?>
										<?php woocommerce_shipping_calculator(); ?>
									<?php endif; ?>
									<button type="button" class="btn-confirm" data-bs-toggle="collapse" data-bs-target="#step-collapseFour" aria-expanded="false" aria-controls="step-collapseFour">
										Potwierdzam
									</button>
								</div>
							</div>
						</div>
						<div class="accordion-item">
							<h2 class="accordion-header" id="step-headingOne">
								<button disabled class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#step-collapseFour" aria-expanded="false" aria-controls="step-collapseFour">
									<h2>
										<div class="step-number">4</div><?= __('Dokument sprzedaży', 'foreto') ?>
									</h2>
								</button>
							</h2>
							<div id="step-collapseFour" class="accordion-collapse collapse" aria-labelledby="step-headingOne" data-bs-parent="#checkoutSteps">
								<div class="accordion-body">
									<?php
									//TODO: sync this filed with biling_doctype form user options after merge
									$checked = (!empty($checkout->get_value('order_doctype'))) ? $checkout->get_value('order_doctype') : 'paragon';
									?>
									<p class="form-row order-doctype form-row-wide validate-required" id="order_doctype_field" data-priority="">
										<span class="woocommerce-input-wrapper">
											<ul class="woocommerce-order_doctype">
												<li>
													<div class="styled-radio<?= $checked == "paragon" ? " checked" : ""; ?>"></div>
													<input hidden type="radio" class="input-radio " value="paragon" name="order_doctype" id="order_doctype_paragon" <?= $checked == "paragon" ? "checked='checked'" : ""; ?>>
													<label for="order_doctype_paragon" class="radio ">Paragon</label>
												</li>
												<li>
													<div class="styled-radio<?= $checked == "vat" ? " checked" : ""; ?>"></div>
													<input hidden type="radio" class="input-radio " value="vat" name="order_doctype" id="order_doctype_vat" <?= $checked == "vat" ? "checked='checked'" : ""; ?>>
													<label for="order_doctype_vat" class="radio ">Faktura</label>
												</li>
											</ul>
										</span>
									</p>
									<button type="button" class="btn-confirm" data-bs-toggle="collapse" data-bs-target="#step-collapseFive" aria-expanded="false" aria-controls="step-collapseFive">
										Potwierdzam
									</button>
								</div>
							</div>
						</div>
						<div class="accordion-item">
							<h2 class="accordion-header" id="step-headingOne">
								<button disabled class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#step-collapseFive" aria-expanded="false" aria-controls="step-collapseFive">
									<h2>
										<div class="step-number">5</div><?= __('Metoda płatności', 'foreto') ?>
									</h2>
								</button>
							</h2>
							<div id="step-collapseFive" class="accordion-collapse collapse" aria-labelledby="step-headingOne" data-bs-parent="#checkoutSteps">
								<div class="accordion-body">
									<?php do_action('foreto_checkout_payment'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col col-480">
				<div class="checkout-review-order">
					<?php do_action('woocommerce_checkout_before_order_review_heading'); ?>
					<?php do_action('woocommerce_checkout_before_order_review'); ?>
					<div id="order_review" class="woocommerce-checkout-review-order page-checkout__review">
						<?php do_action('woocommerce_checkout_order_review'); ?>
					</div>
					<?php do_action('woocommerce_checkout_after_order_review'); ?>
				</div>
			</div>
		</div>
	</form>
</div>
<?php do_action('woocommerce_after_checkout_form', $checkout); ?>