<?php

$social_icons = get_field('social_icons', 'options');

if( !empty($social_icons) ) :
?>
<ul class="social">
<?php foreach($social_icons as $item) : ?>
    <?php if( !empty($item['link']) && (!empty($item['icon_svg']) || !empty($item['icon'])) ) : ?>
        <li class="social__item social__item--<?= sanitize_html_class($item['name']) ?>">
            <a class="social__link" href="<?= $item['link'] ?>" title="<?= $item['name'] ?>">
            <?php if(!empty($item['icon_svg'])) : ?>
            <?= $item['icon_svg'] ?>
            <?php else : ?>
                <?php echo wp_get_attachment_image( $item['icon'], array('20', '20'), true ); ?>
            <?php endif ?>
            </a>
        </li>
        <?php endif ?>
    <?php endforeach ?>
</ul>
<?php endif;