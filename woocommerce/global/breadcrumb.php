<?php

/**
 * Shop breadcrumb
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if (!defined('ABSPATH')) {
	exit;
}

if (!empty($breadcrumb)) {

	$color = false;
	$bg = false;

	$num = count($breadcrumb);

	if (is_shop()) {
		$title = $breadcrumb[$num - 1][0];
	} elseif (is_product_category()) {
		$term = get_queried_object();
		$color = get_field('color', $term);
		$bg = get_field('breadcrumb_image', $term);
		$title = $term->name;
	} elseif (is_product()) {
		$terms = get_the_terms(get_the_ID(), 'product_cat');
		$color = get_field('color', $terms[0]);
		$bg = get_field('breadcrumb_image', $terms[0]);
		$title = $breadcrumb[$num - 2][0];
	}

	$template_directory = get_template_directory_uri();
	$background_url = $template_directory . '/assets/img/breadcrumb_nawozy_grupy_azoty.png';
	$style_color = ($color) ?  $color  : '#0079bc';
	$style_bg = ($bg) ? 'style="background-image: url(' . $bg['url'] . ');"' : 'style="background-image: url(' . $background_url . ');"';



	echo '<div class="breadcrumbs breadcrumbs--wc breadcrumbs--img"  style="background-color: ' . $style_color . ';"><div class="breadcrumbs__container container" ' . $style_bg . '>';

	$heading_tag = (is_product()) ? 'div' : 'h1';
	if (!empty($title)) echo '<' . $heading_tag . ' class="breadcrumbs__title">' . $title . '</' . $heading_tag . '>';

	echo $wrap_before;

	if (is_product() && !empty($breadcrumb[1])) {
		$breadcrumb[1][0] = '...'; // Products
	}

	foreach ($breadcrumb as $key => $crumb) {

		echo $before;

		if (!empty($crumb[1]) && sizeof($breadcrumb) !== $key + 1) {
			echo '<a href="' . esc_url($crumb[1]) . '">' . esc_html($crumb[0]) . '</a>';
		} else {
			echo '<span class="active">' . esc_html($crumb[0]) . '</span>';
		}

		echo $after;

		if (sizeof($breadcrumb) !== $key + 1) {
			echo '<span class="delimiter">
			<svg xmlns="http://www.w3.org/2000/svg" width="5.871" height="10.121" viewBox="0 0 5.871 10.121">
				<path d="M3886.877,524.493l4.077,4.061,3.923-4.061" transform="translate(-523.432 3895.938) rotate(-90)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" opacity="0.7"/>
			</svg>
			</span>';
		}
	}

	echo $wrap_after;

	echo '</div></div>';
}
