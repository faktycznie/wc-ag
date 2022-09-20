<?php

//require_once('acf.php');

//add_action('acf/init', 'foreto_acf_init');
function foreto_acf_init()
{
	acf_update_setting('google_api_key', 'xxx');
}

add_theme_support('post-thumbnails');

if (function_exists('acf_add_options_page')) {
	acf_add_options_page();
}

add_action('after_setup_theme', 'foreto_wp_redirect');
function foreto_wp_redirect()
{
	global $wp;
	if ('/wp' == $_SERVER['REQUEST_URI'] || '/wp/' == $_SERVER['REQUEST_URI']) {
		wp_redirect(home_url($wp->request));
		exit;
	}
}

add_action('wp_enqueue_scripts', 'foreto_scripts');
function foreto_scripts()
{
	wp_enqueue_style('app_css', get_template_directory_uri() . "/dist/style.bundle.css", 1);
	wp_enqueue_script('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.min.js', [], '5.2.0', 1);
	wp_enqueue_script(
		'app_js',
		get_template_directory_uri() . '/dist/main.bundle.js',
		[],
		wp_get_theme()->get(1),
		true
	);
	wp_localize_script('app_js', 'foreto', array(
		'ajax_url' => admin_url('admin-ajax.php'),
		'rest_url' => get_rest_url(),
	));
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

add_action('after_setup_theme', 'foreto_content_width', 0);
function foreto_content_width()
{
	$GLOBALS['content_width'] = apply_filters('foreto_content_width', 1488);
}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

add_action('after_setup_theme', 'foreto_setup');
function foreto_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Foreto, use a find and replace
		* to change 'foreto' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('foreto', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'topbar-menu' => esc_html__('Topbar menu', 'foreto'),
			'nav-menu'    => esc_html__('Nav menu', 'foreto'),
			'footer-1'    => esc_html__('Footer 1', 'foreto'),
			'footer-2'    => esc_html__('Footer 2', 'foreto'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	add_image_size('cat-icon', 132, 228);
	add_image_size('slider', 1488, 708);

	add_theme_support('woocommerce');
}

add_filter('newsletter_enqueue_style', '__return_false');

//Woocommerce

add_filter('wc_product_sku_enabled', '__return_false');
// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' ); //??

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);

add_action('woocommerce_single_product_summary', 'woocommerce_show_product_sale_flash', 3);
add_action('foreto_single_product_add_to_cart', 'woocommerce_template_single_add_to_cart', 30);

remove_action('woocommerce_cart_collaterals', 'woocommerce_cart_totals', 10);
remove_action('woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20);
add_action('foreto_checkout_payment', 'woocommerce_checkout_payment', 20);

//Widgets
add_action('widgets_init', 'foreto_sidebars');
function foreto_sidebars()
{
	register_sidebar(
		array(
			'id'            => 'category',
			'name'          => __('Product List sidebar', 'foreto'),
			'description'   => __('Sidebar area visible on the woocommerce category', 'foreto'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'category-mobile',
			'name'          => __('Product List sidebar for mobile', 'foreto'),
			'description'   => __('Sidebar area visible on the woocommerce category also on mobile', 'foreto'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'filters',
			'name'          => __('Product List filters', 'foreto'),
			'description'   => __('Filters area visible on the woocommerce category above the loop', 'foreto'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}

//shortcodes
add_shortcode('foreto_terms', 'foreto_terms_custom_taxonomy');
function foreto_terms_custom_taxonomy($atts)
{

	extract(shortcode_atts(array(
		'taxonomy'   => '',
		'show_count' => 1,
	), $atts));

	// arguments for function wp_list_categories
	$args = array(
		'taxonomy' => $taxonomy,
		'show_count' => (int) $show_count,
		'hide_empty' => 0,
		'title_li' => ''
	);

	echo '<ul class="wp-block-categories-list wp-block-categories">';
	echo wp_list_categories($args);
	echo '</ul>';
}

//Other functions

function foreto_pagination($query = false)
{
	global $wp_query;
	if ($query) {
		$wp_query = $query;
	}

	$total_pages = $wp_query->max_num_pages;

	if ($total_pages > 1) {
		$current_page = max(1, get_query_var('paged'));

		echo paginate_links(array(
			'base' => @add_query_arg('paged', '%#%'),
			'format' => '/page/%#%',
			'current' => $current_page,
			'total' => $total_pages,
			'type'  => 'list',
			'prev_text' => '',
			'next_text' => '',
			'prev_next' => false
		));
	}
}

// Returns hierarchical list of menu items
function foreto_get_menu_array($theme_location)
{
	$theme_locations = get_nav_menu_locations();
	$menu_obj = get_term($theme_locations[$theme_location], 'nav_menu');
	$menu_name = $menu_obj->name;
	$array_menu = wp_get_nav_menu_items($menu_name);
	return foreto_sort_menu_items($array_menu);
}

// Takes a flat list of wordpress menu items and returns the top level items
// with children sorted into the 'children' element.
function foreto_sort_menu_items($items)
{
	return foreto_get_children($items, 0, 0);
}

// This is the inner recursive function - do not use directly
function foreto_get_children($items, $parentId, $depth)
{
	$children = array();
	foreach ($items as $id => $child) {
		if ($child->menu_item_parent == $parentId) {
			$child->depth = $depth;
			$child->children = foreto_get_children($items, $child->ID, $depth + 1);
			$children[] = $child;
		}
	}
	return $children;
}

function foreto_terms_hierarchicaly(array $cats, $parentId = 0)
{
	$arr = [];
	foreach ($cats as $i => $cat) {
		if ($cat->parent == $parentId) {
			$cat->children = foreto_terms_hierarchicaly($cats, $cat->term_id);
			$arr[$cat->term_id] = $cat;
		}
	}
	return $arr;
}

//require_once('sample_data.php');

function foreto_get_option($field_name, $default_value = '')
{
	global $sample_data;
	$value = get_field($field_name, 'option');

	if ($value === null && !empty($default_value)) {
		$value = $default_value;
	} elseif ($value === null && !empty($sample_data[$field_name])) {
		$value = $sample_data[$field_name];
	}
	return $value;
}

function foreto_is_parent_category()
{
	global $wp_query;
	$cat = $wp_query->get_queried_object();
	return (is_product_category() && empty($cat->parent)) ? true : false;
}

function foreto_get_the_category_list()
{
	$post_type = get_post_type();
	if ('realization' == $post_type) {
		$html = get_the_term_list(get_the_ID(), 'realization_cat', '', ', ');
		$html .= ', ';
		$html .= get_the_term_list(get_the_ID(), 'realization_industry', '', ', ');
		return $html;
	} else {
		return get_the_category_list();
	}
}

function foreto_get_page_parts($content = '')
{
	if (empty($content)) {
		global $post;
		$content = $post->post_content;
	}
	if (empty($content)) {
		return false;
	}
	$content = str_replace("\n<!-- wp:nextpage -->", '<!-- wp:nextpage -->', $content);
	$content = str_replace("<!-- wp:nextpage -->\n", '<!-- wp:nextpage -->', $content);
	$pages = explode('<!-- wp:nextpage -->', $content);

	return $pages;
}

function foreto_get_more_parts($content)
{
	$content = explode('<!--more-->', $content);
	if (!empty($content[1])) {
		$content[1] = trim(preg_replace("/^(<br \/>)/", "", $content[1], 1));
	}
	return $content;
}

add_action('pre_get_posts', 'foreto_search_filter');
function foreto_search_filter($query)
{
	if (!is_admin() && $query->is_main_query()) {
		if ($query->is_search) {
			$query->set('paged', (get_query_var('paged')) ? get_query_var('paged') : 1);
			$query->set('posts_per_page', 6);
		}
	}
}

add_action('woocommerce_before_add_to_cart_quantity', 'display_quantity_plus');
function display_quantity_plus()
{
	echo '<button type="button" class="plus" >+</button>';
}
add_action('woocommerce_after_add_to_cart_quantity', 'display_quantity_minus');
function display_quantity_minus()
{
	echo '<button type="button" class="minus" >-</button>';
}

add_action('wp_footer', 'add_cart_quantity_plus_minus');
function add_cart_quantity_plus_minus()
{
	// Only run this on the single product page
	if (!is_product()) return; ?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('form.cart').on('click', 'button.plus, button.minus', function() {
				// Get current quantity values
				var qty = $(this).closest('form.cart').find('.qty');
				var val = parseFloat(qty.val());
				var max = parseFloat(qty.attr('max'));
				var min = parseFloat(qty.attr('min'));
				var step = parseFloat(qty.attr('step'));
				// Change the value if plus or minus
				if ($(this).is('.plus')) {
					if (max && (max <= val)) {
						qty.val(max);
					} else {
						qty.val(val + step);
					}
				} else {
					if (min && (min >= val)) {
						qty.val(min);
					} else if (val > 1) {
						qty.val(val - step);
					}
				}
			});
		});
	</script>
<?php
}

add_filter('woocommerce_product_tabs', 'foreto_remove_product_tabs', 98);
function foreto_remove_product_tabs($tabs)
{
	unset($tabs['additional_information']); // To remove the additional information tab
	return $tabs;
}

add_filter('woocommerce_product_tabs', 'my_add_product_tabs');
function my_add_product_tabs($tabs)
{
	$tabs['description']['title'] = __('Opis i skład', 'foreto');
	$tabs['benefits_tab'] = array(
		'title'     => __('Zalety produktu', 'foreto'),
		'priority'  => 50,
		'callback'  => 'foreto_product_tab_benefits'
	);
	$tabs['application_tab'] = array(
		'title'     => __('Zastosowanie', 'foreto'),
		'priority'  => 50,
		'callback'  => 'foreto_product_tab_application'
	);
	$tabs['transport_tab'] = array(
		'title'     => __('Pakowanie i transport', 'foreto'),
		'priority'  => 50,
		'callback'  => 'foreto_product_tab_transport'
	);
	$tabs['storage_tab'] = array(
		'title'     => __('Przechowywanie', 'foreto'),
		'priority'  => 50,
		'callback'  => 'foreto_product_tab_storage'
	);
	return $tabs;
}

function foreto_product_tab_benefits()
{
	wc_get_template('single-product/tabs/benefits.php');
}

function foreto_product_tab_application()
{
	wc_get_template('single-product/tabs/application.php');
}

function foreto_product_tab_transport()
{
	wc_get_template('single-product/tabs/transport.php');
}

function foreto_product_tab_storage()
{
	wc_get_template('single-product/tabs/storage.php');
}

add_filter('woocommerce_display_product_attributes', 'foreto_modify_attributes', 10, 2);
function foreto_modify_attributes($product_attributes, $product)
{
	if (is_product() && !is_admin()) {
		$stock = $product->get_stock_quantity();
		if ($stock) {
			$product_attributes['stock'] = array(
				'label' => __('Dostępność', 'foreto'),
				'value' => $stock,
			);
		}
	}
	return $product_attributes;
}

add_action('woocommerce_before_shop_loop_item_title', 'foreto_new_badge_shop_page', 3);
add_action('woocommerce_single_product_summary', 'foreto_new_badge_shop_page', 3);
function foreto_new_badge_shop_page()
{
	global $product;
	$newness_days = 30;
	$created = strtotime($product->get_date_created());
	if ((time() - (60 * 60 * 24 * $newness_days)) < $created) {
		echo '<span class="itsnew onsale">' . esc_html__('Nowość', 'foreto') . '</span>';
	}
}

add_filter('woocommerce_blocks_product_grid_item_html', 'foreto_custom_render_product_block', 10, 3);
function foreto_custom_render_product_block($html, $data, $post)
{
	$productID = url_to_postid($data->permalink);
	$product = wc_get_product($productID);
	$newness_days = 30;
	$created = strtotime($product->get_date_created());
	if ((time() - (60 * 60 * 24 * $newness_days)) < $created) {
		$new = '<span class="wc-block-grid__product-onsale itsnew">' . esc_html__('Nowość', 'foreto') . '</span>';
		$html = str_replace('<div class="wc-block-grid__product-price price">', $new . '<div class="wc-block-grid__product-price price">', $html);
	}
	return $html;
}

add_filter('wpseo_breadcrumb_separator', 'foreto_wpseo_breadcrumb_separator', 10, 1);
function foreto_wpseo_breadcrumb_separator($this_options_breadcrumbs_sep)
{
	return '<span class="delimiter">
			<svg xmlns="http://www.w3.org/2000/svg" width="5.871" height="10.121" viewBox="0 0 5.871 10.121">
				<path d="M3886.877,524.493l4.077,4.061,3.923-4.061" transform="translate(-523.432 3895.938) rotate(-90)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" opacity="0.7"/>
			</svg>
	</span>';
};

function foreto_plural($x, $a, $b, $c)
{
	if ($x == 1) {
		return $a;
	}
	if ($x % 10 > 1 && $x % 10 < 5 && !($x % 100 >= 10 && $x % 100 <= 21)) {
		return $b;
	}

	return $c;
}

add_action('woocommerce_cart_calculate_fees', 'foreto_weight_discount', 30, 1);
function foreto_weight_discount($cart)
{
	if (is_admin() && !defined('DOING_AJAX'))
		return;

	$cart_weight   = $cart->get_cart_contents_weight();
	$cart_subtotal = $cart->get_subtotal();
	$cart_discount_weight = 24000;
	$percentage    = 0;

	if ($cart_weight >= $cart_discount_weight) {
		$percentage = 15;
	}

	// Apply a calculated discount based on weight
	if ($percentage > 0) {
		$discount = $cart_subtotal * $percentage / 100;
		$cart->add_fee(sprintf(__('Zniżka za wagę -%s', 'foreto'), $percentage . '%'), -$discount);
	}
}

add_action('woocommerce_cart_calculate_fees', 'foreto_customer_discount', 20, 1);
function foreto_customer_discount($cart)
{
	if (is_admin() && !defined('DOING_AJAX'))
		return;

	$cart_subtotal = $cart->get_subtotal();
	$current_user = wp_get_current_user();
	$percentage    = 0;

	if (0 == $current_user->ID) return;

	$args = array(
		'customer_id' => $current_user->ID,
		'limit'       => -1,
	);

	$orders = wc_get_orders($args);

	if (count($orders) >= 1) {
		$percentage = 5;
	}

	// Apply a calculated discount based on weight
	if ($percentage > 0) {
		$discount = $cart_subtotal * $percentage / 100;
		$cart->add_fee(sprintf(__('Zniżka dla stałego klienta -%s', 'foreto'), $percentage . '%'), -$discount);
	}
}

add_action('woocommerce_before_cart_table', 'foreto_weight_discount_box', 10, 1);
function foreto_weight_discount_box()
{
	if (is_admin() && !defined('DOING_AJAX'))
		return;
	$cart_weight = WC()->cart->get_cart_contents_weight();
	$cart_discount_weight = 24000;
	$weight_unit = get_option('woocommerce_weight_unit');
	$needed = 0;

	if ($cart_weight < $cart_discount_weight) {
		$needed = $cart_discount_weight - $cart_weight;
	}

	if ($needed > 0) {
		//cart_discount_weight are in kg

		$_weight_unit = $cart_discount_weight  > 1000 ? 'ton' : $weight_unit;
		$_cart_discount_weight = $cart_discount_weight  > 1000 ? $cart_discount_weight / 1000 : $cart_discount_weight;

		wc_get_template('cart/cart-weigth-discount.php', array(
			'weight' => $needed . ' ' . $weight_unit,
			'discount_weight' => $_cart_discount_weight . ' ' . $_weight_unit,
		));
	}
}

add_action('acf/init', 'foreto_acf_init_block_types');
function foreto_acf_init_block_types()
{
	if (function_exists('acf_register_block_type')) {

		acf_register_block_type(array(
			'name'              => 'slider',
			'title'             => __('Slider'),
			'description'       => __('A custom slider block.'),
			'render_template'   => 'template-parts/blocks/slider/slider.php',
			'category'          => 'formatting',
			'icon'              => 'admin-comments',
			'keywords'          => array('slider', 'slide'),
		));

		acf_register_block_type(array(
			'name'              => 'categories',
			'title'             => __('Categories'),
			'description'       => __('A custom categories block.'),
			'render_template'   => 'template-parts/blocks/categories/categories.php',
			'category'          => 'formatting',
			'icon'              => 'admin-comments',
			'keywords'          => array('categories', 'woocommerce'),
		));

		acf_register_block_type(array(
			'name'              => 'products',
			'title'             => __('Products'),
			'description'       => __('A custom products block.'),
			'render_template'   => 'template-parts/blocks/products/products.php',
			'category'          => 'formatting',
			'icon'              => 'admin-comments',
			'keywords'          => array('products', 'woocommerce'),
		));

		acf_register_block_type(array(
			'name'              => 'features',
			'title'             => __('Features'),
			'description'       => __('A custom features block.'),
			'render_template'   => 'template-parts/blocks/features/features.php',
			'category'          => 'formatting',
			'icon'              => 'admin-comments',
			'keywords'          => array('features'),
		));
	}
}

add_filter('woocommerce_account_menu_items', 'custom_account_menu_items', 10, 2);
function custom_account_menu_items($items, $endpoints)
{
	unset($items['dashboard']);
	unset($items['downloads']); //! is it safe?

	$key = 'edit-account';
	$items = [$key => $items[$key]] + $items; //move to the top

	return $items;
}

add_action('woocommerce_checkout_update_order_meta', 'custom_checkout_field_update_order_meta');
function custom_checkout_field_update_order_meta($order_id)
{
	if (!empty($_POST['order_doctype'])) {
		update_post_meta($order_id, 'order_doctype', sanitize_text_field($_POST['order_doctype']));
	}
}

function showADRCheckbox()
{
	$result = false;
	if (WC()->cart) {
		$items = WC()->cart->get_cart();
		if (!empty($items)) {
			foreach ($items as $item => $values) {
				$type = get_field('special_type', $values['product_id']);
				if (!empty($type) && in_array('adr', $type)) {
					$result = true;
					break;
				}
			}
		}
	}
	return $result;
}

function showCareCheckbox()
{
	$result = false;
	if (WC()->cart) {
		$items = WC()->cart->get_cart();
		if (!empty($items)) {
			foreach ($items as $item => $values) {
				$type = get_field('special_type', $values['product_id']);
				if (!empty($type) && in_array('sor', $type)) {
					$result = true;
					break;
				}
			}
		}
	}
	return $result;
}

add_filter('woocommerce_available_payment_gateways', 'filter_gateways', 1);
function filter_gateways($gateways)
{
	if (WC()->cart) {
		$cart_weight = WC()->cart->get_cart_contents_weight();
		if ($cart_weight >= 1000) {
			return [];
		}
	}
	return $gateways;
}

add_filter('woocommerce_package_rates', 'hide_shipping_based_on_class', 10, 2);
function hide_shipping_based_on_class($available_methods)
{
	if (WC()->cart) {
		$cart_weight = WC()->cart->get_cart_contents_weight();
		if ($cart_weight >= 1000) {
			return [];
		}
	}
	return $available_methods;
}

include_once get_template_directory() . '/shortcode/login-form.php';
include_once get_template_directory() . '/shortcode/register-form.php';
include_once get_template_directory() . '/shortcode/recover-form.php';

include_once get_template_directory() . '/inc/register-fields.php';
