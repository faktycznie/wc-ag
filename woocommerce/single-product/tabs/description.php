<?php
/**
 * Description tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.0.0
 */

defined( 'ABSPATH' ) || exit;

global $post;

$important_characteristics = get_field('important_characteristics');
$columns = ( !empty($important_characteristics) ) ? 'col-md-6' : '';

?>
<div class="prod-desc">
	<div class="prod-desc__row row">
		<div class="prod-desc__col col-12 <?= $columns ?>">
			<?php the_content(); ?>
		</div>
		<?php if( !empty($important_characteristics) ) : ?>
		<div class="prod-desc__col col-12 <?= $columns ?>">
			<div class="prod-desc__label desc-label"><?= __('Najwaniejsze cechy produktu:', 'foreto') ?></div>
			<table class="prod-desc__table table">
			<?php foreach($important_characteristics as $attr) : ?>
				<tr><td><?= $attr['name'] ?></td><td><?= $attr['desc'] ?></td></tr>
			<?php endforeach ?>
			</table>
		</div>
		<?php endif ?>
	</div>
</div>