<aside class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas">
    <div class="offcanvas__body offcanvas-body d-flex flex-column">
        <div class="offcanvas__slogan slogan">
            <?= __('Autoryzowany dystrybutor grupy Azoty', 'foreto') ?>
        </div>
        <div class="offcanvas__close">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button><button type="button" class="btn-close-label" data-bs-dismiss="offcanvas"><?= __('Zamknij', 'foreto') ?></button>
        </div>
        <div class="nav-menu nav-menu--offcanvas">
            <?php
            wp_nav_menu(
                array(
                    'theme_location'  => 'nav-menu',
                    'menu_class'      => 'nav-menu__list flex-column align-items-start',
                    'container_class' => 'nav-menu__container',
                    'before'          => '<span>',
                    'after'           =>  '<div class="toggle"></div></span>',
                )
            );
            ?>
        </div>
        <div class="offcanvas__bok bok">
            <div class="bok__text">
                <div class="bok__label"><?= __('Biuro Obsługi Klienta:', 'foreto') ?></div>
                <a class="bok__email" href="mailto:"><?= __('sklepwww@agrochem.com.pl', 'foreto') ?></a>
            </div>
        </div>
        <div class="offcanvas__social">
            <?php get_template_part('template-parts/header/social'); ?>
        </div>
    </div>
</aside>