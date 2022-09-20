<?php
add_shortcode('lost_password_form', 'foreto_lost_password_form');
function foreto_lost_password_form()
{
    if (is_admin()) return;
    if (is_user_logged_in()) return;
    ob_start();
    //wc_get_template( 'myaccount/form-lost-password.php' );
?>
    <div class="ag-recover-wrapper">
        <div class="ag-recover-container">
            <form method="post" class="woocommerce-ResetPassword lost_reset_password ag-recover needs-validation" novalidate>

                <p class='form-message'><?php echo apply_filters('woocommerce_lost_password_message', esc_html__('Jeśli zapomniałeś/-aś swojego hasła, podaj adres e-mail przypisany do Twojego konta.
Wysyłamy Ci link do zresetowania hasła.', 'woocommerce')); ?></p><?php // @codingStandardsIgnoreLine 
                                                                    ?>
                <div class="row g-3 align-items-center">
                    <div class="col-4">
                        <label for="user_login" class="form-label"><?php esc_html_e('Adres e-mail', 'woocommerce'); ?><span class="required">*</span></label>
                    </div>
                    <div class="col-8">
                        <input required class="woocommerce-Input woocommerce-Input--text input-text form-control" type="text" name="user_login" id="user_login" autocomplete="username" />
                    </div>
                </div>



                <div class="clear"></div>

                <?php do_action('woocommerce_lostpassword_form'); ?>

                <div class="row g-3 align-items-center">
                    <div class="col d-flex justify-content-center">
                        <input type="hidden" name="wc_reset_password" value="true" />
                        <button type="submit" class="woocommerce-Button button btn" value="<?php esc_attr_e('Reset password', 'woocommerce'); ?>"><?php esc_html_e('KONTYNUUJ', 'woocommerce'); ?></button>
                    </div>
                </div>

                <!-- back button -->
                <div class="row g-3 align-items-center">
                    <div class="col d-flex justify-content-center">
                        <a type="button" class="btn btn-secondary" href="/logowanie/"><?php esc_html_e('Anuluj', 'woocommerce'); ?></a>
                    </div>
                </div>


                <?php wp_nonce_field('lost_password', 'woocommerce-lost-password-nonce'); ?>

            </form>
        </div>
    </div>

<?php
    return ob_get_clean();
}
