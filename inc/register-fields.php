<?php

function foreto_get_field_value($name)
{
	$value = '';
	if (isset($_POST[$name])) {
		$value = $_POST[$name];
	} elseif (is_user_logged_in()) {
		$user = $user = wp_get_current_user();
		if (!empty($user->{$name})) $value = $user->{$name};
	}
	return $value;
}

add_action('woocommerce_register_form_start', 'foreto_before_register_fields');
add_action('woocommerce_edit_account_form_start', 'foreto_before_register_fields');
function foreto_before_register_fields()
{ ?>
	<p class="form-row form-row-wide form-row--user-type" id="billing_user_type_field">
		<label for="billing_user_type_hobby"><?php _e('Rodzaj działalności', 'foreto'); ?><span class="required">*</span></label>
		<span class="woocommerce-input-wrapper">
			<input type="radio" class="input-radio" value="hobby" name="billing_user_type" id="billing_user_type_hobby" <?php if (empty(foreto_get_field_value('billing_user_type')) || (!empty(foreto_get_field_value('billing_user_type')) && foreto_get_field_value('billing_user_type') == 'hobby')) echo 'checked="checked"' ?>><label for="billing_user_type_hobby" class="radio">Hobbysta</label>
			<input type="radio" class="input-radio" value="pro" name="billing_user_type" id="billing_user_type_pro" <?php if (!empty(foreto_get_field_value('billing_user_type')) && foreto_get_field_value('billing_user_type') == 'pro') echo 'checked="checked"' ?>><label for="billing_user_type_pro" class="radio">Profesjonalista</label>
		</span>
	</p>

	<p class="form-row form-row-first form-row--name">
		<label for="reg_billing_first_name"><?php _e('First name', 'woocommerce'); ?><span class="required">*</span></label>
		<input type="text" class="input-text form-control" name="billing_first_name" id="reg_billing_first_name" value="<?php if (!empty(foreto_get_field_value('billing_first_name'))) esc_attr_e(foreto_get_field_value('billing_first_name')); ?>" />
	</p>
	<p class="form-row form-row-last form-row--surname">
		<label for="reg_billing_last_name"><?php _e('Last name', 'woocommerce'); ?><span class="required">*</span></label>
		<input type="text" class="input-text form-control" name="billing_last_name" id="reg_billing_last_name" value="<?php if (!empty(foreto_get_field_value('billing_last_name'))) esc_attr_e(foreto_get_field_value('billing_last_name')); ?>" />
	</p>

	<p class="form-row form-row-wide form-row--company">
		<label for="reg_billing_company"><?php _e('Company', 'woocommerce'); ?><span class="required">*</span></label>
		<input type="text" class="input-text form-control" name="billing_company" id="reg_billing_company" value="<?php if (!empty(foreto_get_field_value('billing_company'))) esc_attr_e(foreto_get_field_value('billing_company')); ?>" />
	</p>

	<p class="form-row form-row-wide form-row--phone">
		<label for="reg_billing_phone"><?php _e('Phone', 'woocommerce'); ?><span class="required">*</span></label>
		<input type="text" class="input-text form-control" name="billing_phone" id="reg_billing_phone" value="<?php if (!empty(foreto_get_field_value('billing_phone'))) esc_attr_e(foreto_get_field_value('billing_phone')); ?>" />
		<span><em><?= __('przykład poprawnego formatu: +48 000 000 000', 'foreto') ?></em></span>
	</p>
<?php
}

add_action('woocommerce_register_form', 'foreto_extra_register_fields');
add_action('woocommerce_edit_account_form', 'foreto_extra_register_fields');
function foreto_extra_register_fields()
{
?>

	<p class="form-row form-row-wide form-row--farm">
		<label for="reg_billing_farm"><?php _e('Wielkość gospodarstwa', 'foreto'); ?><span class="required">*</span></label>
		<input type="text" class="input-text" name="billing_farm" id="billing_farm" value="<?php if (!empty(foreto_get_field_value('billing_farm'))) esc_attr_e(foreto_get_field_value('billing_farm')); ?>" />
		<span><em><?= __('prosimy podać wielkość w hektarach (ha)', 'foreto') ?></em></span>
	</p>

	<p class="form-row form-row-wide form-row--address1">
		<label for="reg_billing_address_1"><?php _e('Ulica', 'foreto'); ?></label>
		<input type="text" class="input-text" name="billing_address_1" id="billing_address_1" value="<?php if (!empty(foreto_get_field_value('billing_address_1'))) esc_attr_e(foreto_get_field_value('billing_address_1')); ?>" />
	</p>

	<p class="form-row form-row-first form-row--nrbudynku">
		<label for="reg_billing_nr_budynku"><?php _e('Numer budynku', 'foreto'); ?></label>
		<input type="text" class="input-text" name="billing_nr_budynku" id="reg_billing_nr_budynku" value="<?php if (!empty(foreto_get_field_value('billing_nr_budynku'))) esc_attr_e(foreto_get_field_value('billing_nr_budynku')); ?>" />
	</p>
	<p class="form-row form-row-last form-row--nrlokalu">
		<label for="reg_billing_nr_lokalu"><?php _e('Numer lokalu', 'foreto'); ?></label>
		<input type="text" class="input-text" name="billing_nr_lokalu" id="reg_billing_nr_lokalu" value="<?php if (!empty(foreto_get_field_value('billing_nr_lokalu'))) esc_attr_e(foreto_get_field_value('billing_nr_lokalu')); ?>" />
	</p>

	<p class="form-row form-row-wide form-row--postcode">
		<label for="reg_billing_postcode"><?php _e('Kod pocztowy', 'foreto'); ?></label>
		<input type="text" class="input-text" name="billing_postcode" id="billing_postcode" value="<?php if (!empty(foreto_get_field_value('billing_postcode'))) esc_attr_e(foreto_get_field_value('billing_postcode')); ?>" />
		<span><em><?= __('przykład poprawnego formatu: 00-000', 'foreto') ?></em></span>
	</p>

	<p class="form-row form-row-wide form-row--city">
		<label for="reg_billing_city"><?php _e('Miejscowość', 'foreto'); ?></label>
		<input type="text" class="input-text" name="billing_city" id="billing_city" value="<?php if (!empty(foreto_get_field_value('billing_city'))) esc_attr_e(foreto_get_field_value('billing_city')); ?>" />
	</p>

	<p class="form-row form-row-wide form-row--nip">
		<label for="reg_billing_nip"><?php _e('NIP', 'foreto'); ?><span class="required">*</span></label>
		<input type="text" class="input-text" name="billing_nip" id="billing_nip" value="<?php if (!empty(foreto_get_field_value('billing_nip'))) esc_attr_e(foreto_get_field_value('billing_nip')); ?>" />
	</p>

	<p class="form-row form-row-wide form-row--pesel">
		<label for="reg_billing_pesel"><?php _e('PESEL', 'foreto'); ?><span class="required">*</span></label>
		<input type="text" class="input-text" name="billing_pesel" id="billing_pesel" value="<?php if (!empty(foreto_get_field_value('billing_pesel'))) esc_attr_e(foreto_get_field_value('billing_pesel')); ?>" />
	</p>

	<?php
	woocommerce_form_field('billing_doctype', array(
		'type'        => 'select',
		'required'    => false,
		'label'       => __('Typ dokumentu', 'foreto'),
		'options' => array(
			'vat' => 'VAT',
			'paragon' => 'Paragon'
		),
	), foreto_get_field_value('billing_doctype'));
	?>

	<?php
	woocommerce_form_field('billing_rules', array(
		'type'        => 'checkbox',
		'class' => array('input-checkbox'),
		'required'    => true,
		'label'       => __('Akceptuję regulamin sklepu i regulamin konta', 'foreto'),
	), foreto_get_field_value('billing_rules'));
	?>

	<div class="clear"></div>
<?php
}

add_action('woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3);
function wooc_validate_extra_register_fields($username, $email, $validation_errors)
{
	if (isset($_POST['billing_first_name']) && empty($_POST['billing_first_name'])) {
		$validation_errors->add('billing_first_name_error', __('<strong>Błąd</strong>: Imię jest wymagane!', 'foreto'));
	}
	if (isset($_POST['billing_last_name']) && empty($_POST['billing_last_name'])) {
		$validation_errors->add('billing_last_name_error', __('<strong>Błąd</strong>: Nazwisko jest wymagane!', 'foreto'));
	}
	if (isset($_POST['billing_company']) && empty($_POST['billing_company'])) {
		$validation_errors->add('billing_company_error', __('<strong>Błąd</strong>: Nazwa firmy jest wymagana!', 'foreto'));
	}
	if (isset($_POST['billing_phone']) && empty($_POST['billing_phone'])) {
		$validation_errors->add('billing_phone_error', __('<strong>Błąd</strong>: Telefon wymagany!', 'foreto'));
	}
	if (isset($_POST['billing_nip']) && empty($_POST['billing_nip'])) {
		$validation_errors->add('billing_nip_error', __('<strong>Błąd</strong>: NIP jest wymagany!', 'foreto'));
	}
	if (isset($_POST['billing_pesel']) && empty($_POST['billing_pesel'])) {
		$validation_errors->add('billing_pesel_error', __('<strong>Błąd</strong>: PESEL jest wymagany!', 'foreto'));
	}
	if (isset($_POST['billing_rules']) && empty($_POST['billing_rules'])) {
		$validation_errors->add('billing_rules_error', __('<strong>Błąd</strong>: Musisz zaakceptować regulamin!', 'foreto'));
	}
	if (isset($_POST['billing_farm']) && empty($_POST['billing_farm'])) {
		$validation_errors->add('billing_farm_error', __('<strong>Błąd</strong>: Wielkość gospodarstwa jest wymagana!', 'foreto'));
	}
	return $validation_errors;
}

add_action('woocommerce_created_customer', 'wooc_save_extra_register_fields');
add_action('woocommerce_save_account_details', 'wooc_save_extra_register_fields');
function wooc_save_extra_register_fields($customer_id)
{

	$address_2 = '';

	if (isset($_POST['billing_user_type'])) {
		update_user_meta($customer_id, 'billing_user_type', sanitize_text_field($_POST['billing_user_type']));
	}

	if (isset($_POST['billing_first_name'])) {
		//First name field which is by default
		update_user_meta($customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']));
		update_user_meta($customer_id, 'billing_first_name', sanitize_text_field($_POST['billing_first_name']));
	}
	if (isset($_POST['billing_last_name'])) {
		// Last name field which is by default
		update_user_meta($customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']));
		update_user_meta($customer_id, 'billing_last_name', sanitize_text_field($_POST['billing_last_name']));
	}

	if (isset($_POST['billing_company'])) {
		update_user_meta($customer_id, 'billing_company', sanitize_text_field($_POST['billing_company']));
	}

	if (isset($_POST['billing_phone'])) {
		update_user_meta($customer_id, 'billing_phone', sanitize_text_field($_POST['billing_phone']));
	}

	if (isset($_POST['billing_farm'])) {
		update_user_meta($customer_id, 'billing_farm', sanitize_text_field($_POST['billing_farm']));
	}

	if (isset($_POST['billing_nr_budynku'])) {
		update_user_meta($customer_id, 'billing_nr_budynku', sanitize_text_field($_POST['billing_nr_budynku']));
		$address_2 .= sanitize_text_field($_POST['billing_nr_budynku']);
	}
	if (isset($_POST['billing_nr_lokalu'])) {
		update_user_meta($customer_id, 'billing_nr_lokalu', sanitize_text_field($_POST['billing_nr_lokalu']));
		$address_2 .= ' m ' . sanitize_text_field($_POST['billing_nr_lokalu']);
	}

	if (isset($_POST['billing_address_1'])) {
		update_user_meta($customer_id, 'billing_address_1', sanitize_text_field($_POST['billing_address_1']));
	}
	if (!empty($address_2)) {
		update_user_meta($customer_id, 'billing_address_2', $address_2);
	}

	if (isset($_POST['billing_postcode'])) {
		update_user_meta($customer_id, 'billing_postcode', sanitize_text_field($_POST['billing_postcode']));
	}

	if (isset($_POST['billing_city'])) {
		update_user_meta($customer_id, 'billing_city', sanitize_text_field($_POST['billing_city']));
	}

	if (isset($_POST['billing_nip'])) {
		update_user_meta($customer_id, 'billing_nip', sanitize_text_field($_POST['billing_nip']));
	}

	if (isset($_POST['billing_pesel'])) {
		update_user_meta($customer_id, 'billing_pesel', sanitize_text_field($_POST['billing_pesel']));
	}

	if (isset($_POST['billing_rules'])) {
		update_user_meta($customer_id, 'billing_rules', sanitize_text_field($_POST['billing_rules']));
	}
}


// My Account - Edit Form -- Billing fields
// Checkout - Edit Form - Billing Fields
add_filter('woocommerce_billing_fields', 'add_woocommerce_billing_fields');
function add_woocommerce_billing_fields($billing_fields)
{
	$first = array();

	$first['billing_user_type'] = array(
		'type' => 'radio',
		'label' => __('Rodzaj działalności', 'foreto'),
		'class' => array('form-row-wide'),
		'required' => true,
		'options'  => array('hobby' => 'Hobbysta', 'pro' => 'Profesjonalista'),
		'clear' => true
	);

	$billing_fields['billing_nip'] = array(
		'type' => 'text',
		'label' => __('NIP', 'foreto'),
		'class' => array('form-row-wide'),
		'required' => true,
		'clear' => true

	);

	$billing_fields['billing_pesel'] = array(
		'type' => 'text',
		'label' => __('PESEL', 'foreto'),
		'class' => array('form-row-wide'),
		'required' => true,
		'clear' => true
	);

	return $first + $billing_fields;
}

// (1) Printing the Billing Address on My Account
add_filter('woocommerce_my_account_my_address_formatted_address', 'custom_my_account_my_address_formatted_address', 10, 3);
function custom_my_account_my_address_formatted_address($fields, $customer_id, $type)
{

	if ($type == 'billing') {
		$fields['nip'] = get_user_meta($customer_id, 'billing_nip', true);
	}

	if ($type == 'billing') {
		$fields['pesel'] = get_user_meta($customer_id, 'billing_pesel', true);
	}

	return $fields;
}

// (2) Checkout -- Order Received (printed after having completed checkout)
add_filter('woocommerce_order_formatted_billing_address', 'custom_add_vat_formatted_billing_address', 10, 2);
function custom_add_vat_formatted_billing_address($fields, $order)
{
	$values = get_post_custom($order->get_id());

	if (isset($values['_billing_nip'][0])) {
		$fields['nip'] = $values['_billing_nip'][0];
	}
	if (isset($values['_billing_pesel'][0])) {
		$fields['pesel'] = $values['_billing_pesel'][0];
	}

	return $fields;
}

// Creating variables for address printing formatting
add_filter('woocommerce_formatted_address_replacements', 'custom_formatted_address_replacements', 10, 2);
function custom_formatted_address_replacements($address, $args)
{
	$address['{nip}'] = '';
	$address['{pesel}'] = '';

	if (!empty($args['nip'])) {
		$address['{nip}'] = $args['nip'];
	}
	if (!empty($args['pesel'])) {
		$address['{pesel}'] = $args['pesel'];
	}
	return $address;
}

//Defining the Polish formatting to print the address, including variables
add_filter('woocommerce_localisation_address_formats', 'custom_localisation_address_format');
function custom_localisation_address_format($formats)
{
	$formats['PL'] = "{name}\n{company}\n{address_1} {address_2}\n{postcode} {city}\n{state}\n{country}\n{nip}\n{pesel}";

	return $formats;
}

//Filter to add meta fields (user profile field on the billing address grouping)
add_filter('woocommerce_customer_meta_fields', 'custom_customer_meta_fields');
function custom_customer_meta_fields($fields)
{

	$fields['billing']['fields']['billing_nip'] = array(
		'label'       => __('NIP', 'foreto'),
		'description' => 'test',
	);
	$fields['billing']['fields']['billing_pesel'] = array(
		'label'       => __('Pesel', 'foreto'),
		'description' => '',
	);

	return $fields;
}

//Filter to add field to the Edit Form on:  Order --  Admin page
add_filter('woocommerce_admin_billing_fields', 'custom_admin_billing_fields');
function custom_admin_billing_fields($fields)
{
	$fields['nip'] = array(
		'label' => __('NIP', 'foreto'),
		'show'  => true
	);
	$fields['pesel'] = array(
		'label' => __('Pesel', 'foreto'),
		'show'  => true
	);

	return $fields;
}

//Filter to copy fields from User meta fields to the Order Admin form (after clicking dedicated button on admin page)
add_filter('woocommerce_found_customer_details', 'custom_found_customer_details');
function custom_found_customer_details($customer_data)
{
	$customer_data['billing_nip'] = get_user_meta($_POST['user_id'], 'billing_nip', true);
	$customer_data['billing_pesel'] = get_user_meta($_POST['user_id'], 'billing_pesel', true);

	return $customer_data;
}
