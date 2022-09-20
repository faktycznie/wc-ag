<?php
add_shortcode('login_form', 'foreto_login_form');
function foreto_login_form()
{
    if ( is_user_logged_in() ) {
        wp_redirect( get_permalink( wc_get_page_id( 'shop' ) ) );
        exit;
    }
    ob_start();
?>
    <div class="ag-login-wrapper">
        <div class="ag-login-container">
            <form class="woocommerce-form woocommerce-form-login login ag-login needs-validation" novalidate method="post">
                <?php do_action('woocommerce_login_form_start'); ?>
                <div class="row g-3 align-items-center">
                    <div class="col-4">
                        <label for="username" class="form-label"><?php esc_html_e('Username or email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
                    </div>
                    <div class="col-8">
                        <input required type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="username" id="username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" />
                    </div>
                </div>
                <?php // @codingStandardsIgnoreLine 
                ?>
                <div class="row g-3 align-items-center">
                    <div class="col-4">
                        <label for="password" class="form-label"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
                    </div>
                    <div class="col-8">
                        <div class="input-group mb-3">
                            <input required class="woocommerce-Input woocommerce-Input--text input-text form-control" type="password" name="password" id="password" autocomplete="current-password" aria-describedby="loginPageShowPassword" />
                            <button class="btn-password" type="button" id="loginPageShowPassword">pokaż</button>
                        </div>
                    </div>
                </div>
                <?php do_action('woocommerce_login_form'); ?>
                <div class="woocommerce-LostPassword lost_password row">
                    <div class="col d-flex justify-content-center">
                        <a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col d-flex justify-content-center">
                        <button type="submit" class="woocommerce-button button woocommerce-form-login__submit btn" name="login" value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('Log in', 'woocommerce'); ?></button>
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
                </div>
                <?php do_action('woocommerce_login_form_end'); ?>
            </form>
            <div class="login-box-divider"></div>
            <div class="row g-3 align-items-center">
                <div class="col d-flex justify-content-center">
                    <p> Nie masz jeszcze konta? <a href="/rejestracja" class="register-link">Zarejestruj się</a></p>
                </div>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col d-flex justify-content-center">
                    <?php
                    if (class_exists('NextendSocialLogin', false)) {
                        echo NextendSocialLogin::renderButtonsWithContainer();
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
    return ob_get_clean();
}
