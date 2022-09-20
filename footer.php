<?php

$footer_address = foreto_get_option('footer_address');
$footer_partners = foreto_get_option('footer_partners');
$footer_copy = foreto_get_option('copyrights');

?>
    <footer class="footer">
        <div class="footer__container container">
            <div class="row gy-5">
                <div class="col-12 col-md-3">
                    <div class="footer__logo logo">
                        <a class="logo__link" href="<?= get_site_url(); ?>"><img class="logo__image" src="<?= get_template_directory_uri() ?>/assets/img/logo-white.svg" alt="<?= get_bloginfo( 'name' ); ?>" /></a>
                    </div>
                    <div class="footer__address"><?= wpautop($footer_address) ?></div>
                </div>
                <div class="col-12 col-md-3">
                    <h3 class="footer__heading"><?= __('Obsługa klienta', 'foreto') ?></h3>
                    <nav class="footer__menu footer-menu">
                        <?php
                            wp_nav_menu(
                                array(
                                    'theme_location'  => 'footer-1',
                                    'menu_class'      => 'footer-menu__list',
                                    'container_class' => 'footer-menu__container',
                                )
                            );
                        ?>
                    </nav>
                </div>
                <div class="col-12 col-md-3">
                    <h3 class="footer__heading"><?= __('Przydatne linki', 'foreto') ?></h3>
                    <nav class="footer__menu footer-menu">
                        <?php
                            wp_nav_menu(
                                array(
                                    'theme_location'  => 'footer-2',
                                    'menu_class'      => 'footer-menu__list',
                                    'container_class' => 'footer-menu__container',
                                )
                            );
                        ?>
                    </nav>
                    <div class="footer__social">
                        <?php get_template_part( 'template-parts/header/social' ); ?>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="footer__newsletter newsletter">
                        <h3 class="footer__heading"><?= __('Newsletter', 'foreto') ?></h3>
                        <p class="newsletter__desc"><?= __('Zapisz się do newslettera i bądź na bieżąco z naszą ofertą!', 'foreto') ?></p>
                        <?php echo do_shortcode('[newsletter_form form="1"]') ?>
                    </div>
                    <?php if( $footer_partners ) : ?>
                    <div class="footer__partners partners">
                        <h3 class="footer__heading"><?= __('Partnerzy', 'foreto') ?></h3>
                        <div class="partners__row">
                        <?php foreach($footer_partners as $partner) : ?>
                            <img src="<?= $partner['url'] ?>" alt="" loading="lazy">
                        <?php endforeach ?>
                        </div>
                    </div>
                    <?php endif ?>
                </div>

            </div>
        </div>
        <div class="footer__copyrights copyrights">
            <div class="copyrights__container container">
                <div class="copyrights__info">
                    <?= $footer_copy ?>
                </div>
                <div class="copyrights__author">
                    <p class="copyrights__label"><?= __('Created by:', 'foreto') ?></p>
                    <a class="copyrights__link" href="https://formimpress.com">
                        <svg id="Formimpress-logo_final_en" xmlns="http://www.w3.org/2000/svg" width="133" height="24.286" viewBox="0 0 133 24.286">
                            <path d="M0,0,14.13,24.286,27.965.01ZM25.969.762,11.6,9.432,1.855.754ZM1.886,1.744l9.355,8.32,2.326,11.761ZM14.4,22.3,11.963,10.054l.083-.05L26.3,1.4ZM26.662.764Z" fill="#f0f0f0"/>
                            <path d="M180.17,11.831v5.343h5.638v.506H180.17v4.095h-.55V11.31h7v.521Z" transform="translate(-144.81 -9.118)" fill="#f0f0f0"/>
                            <path d="M231.018,27.388a4.346,4.346,0,1,1-4.331-4.108A4.221,4.221,0,0,1,231.018,27.388Zm-.533,0a3.814,3.814,0,1,0-3.8,3.576A3.7,3.7,0,0,0,230.485,27.388Z" transform="translate(-179.251 -18.768)" fill="#f0f0f0"/>
                            <path d="M278.333,25.342a2.893,2.893,0,0,1,2.713-2.062,3.083,3.083,0,0,1,1.382.333l-.124.527a2.936,2.936,0,0,0-1.291-.3c-1.587,0-2.671,1.483-2.671,3.382v4.2h-.533V23.42h.533Z" transform="translate(-223.972 -18.768)" fill="#f0f0f0"/>
                            <path d="M323.423,26.795v4.614h-.535V26.795a2.794,2.794,0,0,0-2.951-3.012A3.577,3.577,0,0,0,317.206,25a3.942,3.942,0,0,1,.388,1.8v4.614h-.535V26.795c0-1.938-1.163-3.012-2.671-3.012a4.114,4.114,0,0,0-2.952,1.112v6.513H310.9V23.4h.535v.969a4.145,4.145,0,0,1,2.983-1.112,2.959,2.959,0,0,1,2.61,1.335,3.619,3.619,0,0,1,2.938-1.335A3.257,3.257,0,0,1,323.423,26.795Z" transform="translate(-250.649 -18.752)" fill="#f0f0f0"/>
                            <path d="M388.992,21.775H386.86V11.31h2.132Z" transform="translate(-311.888 -9.118)" fill="#f0f0f0"/>
                            <path d="M421.248,26.7v4.5h-2.062V26.7c0-1.246-.624-1.855-1.744-1.855a2.217,2.217,0,0,0-1.6.638,4.354,4.354,0,0,1,.089,1.246V31.2h-2.072V26.7c0-1.231-.548-1.855-1.616-1.855a2.473,2.473,0,0,0-1.744.638V31.2H408.43V23.143h2.076v.5A3.585,3.585,0,0,1,412.6,23a3.128,3.128,0,0,1,2.671,1.023A3.7,3.7,0,0,1,417.788,23C420.168,23,421.248,24.092,421.248,26.7Z" transform="translate(-329.278 -18.542)" fill="#f0f0f0"/>
                            <path d="M492.006,27.163a4.014,4.014,0,0,1-4.081,4.155,4.705,4.705,0,0,1-2.343-.609v3.085H483.52V23.136h2.062v.475a4.758,4.758,0,0,1,2.343-.61A4,4,0,0,1,492.006,27.163Zm-2.033,0a2.315,2.315,0,0,0-2.419-2.314,3.039,3.039,0,0,0-1.973.7v3.234a2.969,2.969,0,0,0,1.973.682A2.277,2.277,0,0,0,489.973,27.163Z" transform="translate(-389.816 -18.543)" fill="#f0f0f0"/>
                            <path d="M537.188,24.269A3.056,3.056,0,0,1,539.724,23a1.551,1.551,0,0,1,.5.089v2.236a5.916,5.916,0,0,0-.994-.118,1.931,1.931,0,0,0-2.046,2.107V31.2H535.11V23.141h2.078Z" transform="translate(-431.408 -18.541)" fill="#f0f0f0"/>
                            <path d="M567.832,27.758a2.226,2.226,0,0,0,2.3,1.795,2.577,2.577,0,0,0,2.085-.994l1.322,1.1a4.437,4.437,0,0,1-3.636,1.663A4.159,4.159,0,0,1,569.892,23c2.479,0,3.917,1.795,3.917,4.3,0,.163-.016.328-.016.461Zm.015-1.322h3.982a1.776,1.776,0,0,0-1.938-1.795A2.1,2.1,0,0,0,567.848,26.436Z" transform="translate(-456.134 -18.543)" fill="#f0f0f0"/>
                            <path d="M613.263,28.977a6.405,6.405,0,0,0,2.76.653c.95,0,1.32-.357,1.32-.775,0-.459-.459-.667-1.705-.934-1.744-.388-3-.95-3-2.508,0-1.453,1.2-2.463,3.072-2.463a8.086,8.086,0,0,1,3.145.653l-.682,1.514a7.5,7.5,0,0,0-2.508-.519c-.787,0-1.186.281-1.186.711s.488.653,1.779.921c1.87.388,2.953,1.039,2.953,2.508,0,1.527-1.163,2.537-3.234,2.537a7.062,7.062,0,0,1-3.488-.775Z" transform="translate(-493.792 -18.502)" fill="#f0f0f0"/>
                            <path d="M652.383,28.977a6.406,6.406,0,0,0,2.76.653c.948,0,1.32-.357,1.32-.775,0-.459-.459-.667-1.705-.934-1.744-.388-3-.95-3-2.508,0-1.453,1.2-2.463,3.072-2.463a8.093,8.093,0,0,1,3.145.653l-.682,1.514a7.511,7.511,0,0,0-2.508-.515c-.787,0-1.188.281-1.188.711s.49.653,1.781.921c1.87.388,2.951,1.039,2.951,2.508,0,1.527-1.163,2.537-3.232,2.537a7.062,7.062,0,0,1-3.488-.775Z" transform="translate(-525.331 -18.502)" fill="#f0f0f0"/>
                            <path d="M181.384,99.48a1.744,1.744,0,0,1-1.3-.479,1.764,1.764,0,0,1-.479-1.3,1.67,1.67,0,0,1,.477-1.267,1.785,1.785,0,0,1,1.3-.457,1.824,1.824,0,0,1,1.471.647l-.145.122a1.618,1.618,0,0,0-1.326-.581,1.6,1.6,0,0,0-1.163.409,1.5,1.5,0,0,0-.422,1.136,1.583,1.583,0,0,0,.426,1.163,1.539,1.539,0,0,0,1.163.434,1.626,1.626,0,0,0,1.326-.581l.145.12a1.816,1.816,0,0,1-1.475.634Z" transform="translate(-144.799 -77.375)" fill="#f0f0f0"/>
                            <path d="M216.116,99.582l-.882-1.209a2.466,2.466,0,0,1-.273.015h-1.027v1.194h-.194V96.146h1.277a1.328,1.328,0,0,1,.917.281,1.039,1.039,0,0,1,.312.816,1.142,1.142,0,0,1-.213.715,1.045,1.045,0,0,1-.61.376l.915,1.248Zm-1.163-1.357a1.188,1.188,0,0,0,.818-.252.917.917,0,0,0,.283-.723q0-.926-1.046-.926H213.93v1.9Z" transform="translate(-172.318 -77.51)" fill="#f0f0f0"/>
                            <path d="M244.57,96.16h2.26v.163H244.75v1.515h1.777V98H244.75v1.419h2.182v.171H244.57Z" transform="translate(-197.173 -77.525)" fill="#f0f0f0"/>
                            <path d="M275.031,98.6h-1.979l-.428.969h-.194l1.55-3.436h.139l1.55,3.436h-.194Zm-1.9-.171h1.826l-.915-2.062Z" transform="translate(-219.634 -77.5)" fill="#f0f0f0"/>
                            <path d="M303.646,96.291H302.4V96.12h2.684v.171h-1.252v3.265h-.194Z" transform="translate(-243.796 -77.492)" fill="#f0f0f0"/>
                            <path d="M333.72,96.16h.194V99.6h-.194Z" transform="translate(-269.046 -77.525)" fill="#f0f0f0"/>
                            <path d="M354.539,96.16l-1.55,3.45h-.109l-1.55-3.45h.194l1.4,3.153,1.409-3.153Z" transform="translate(-283.244 -77.525)" fill="#f0f0f0"/>
                            <path d="M384.53,96.16h2.262v.163h-2.079v1.515h1.777V98h-1.777v1.419h2.182v.171H384.53Z" transform="translate(-310.01 -77.525)" fill="#f0f0f0"/>
                            <path d="M434.461,98.6h-1.979l-.428.969h-.194l1.55-3.436h.142l1.55,3.436h-.194Zm-1.9-.171h1.828l-.915-2.062Z" transform="translate(-348.167 -77.5)" fill="#f0f0f0"/>
                            <path d="M466.75,97.86v1.233a2.519,2.519,0,0,1-1.477.409,1.814,1.814,0,0,1-1.32-.475,1.9,1.9,0,0,1,0-2.552,1.8,1.8,0,0,1,1.31-.483,1.915,1.915,0,0,1,1.357.486l-.12.136a1.761,1.761,0,0,0-1.238-.442,1.612,1.612,0,0,0-1.176.428,1.7,1.7,0,0,0,0,2.287,1.634,1.634,0,0,0,1.184.426,2.392,2.392,0,0,0,1.3-.326v-.955h-1.39v-.171Z" transform="translate(-373.645 -77.388)" fill="#f0f0f0"/>
                            <path d="M498.2,96.16h2.262v.163H498.38v1.515h1.779V98H498.38v1.419h2.184v.171H498.2Z" transform="translate(-401.651 -77.525)" fill="#f0f0f0"/>
                            <path d="M530.72,96.16V99.6h-.12l-2.519-3.1v3.1h-.18V96.16h.122l2.519,3.089V96.16Z" transform="translate(-425.595 -77.525)" fill="#f0f0f0"/>
                            <path d="M561.981,99.48a1.649,1.649,0,0,1-1.773-1.777,1.678,1.678,0,0,1,.475-1.267,1.791,1.791,0,0,1,1.3-.457,1.826,1.826,0,0,1,1.473.647l-.147.122a1.618,1.618,0,0,0-1.326-.581,1.6,1.6,0,0,0-1.163.409,1.5,1.5,0,0,0-.424,1.136,1.583,1.583,0,0,0,.426,1.163,1.55,1.55,0,0,0,1.163.434,1.626,1.626,0,0,0,1.326-.581l.147.12A1.824,1.824,0,0,1,561.981,99.48Z" transform="translate(-451.638 -77.376)" fill="#f0f0f0"/>
                            <path d="M593.78,98.406V99.6h-.194v-1.19L592.23,96.16h.213l1.229,2.062L594.9,96.16h.223Z" transform="translate(-477.458 -77.525)" fill="#f0f0f0"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>
<?php wp_footer(); ?>
</body>
</html>