<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

function loanemi_register_settings() {
    add_option('loanemi_default_amount', 100000);
    add_option('loanemi_default_interest', 10);
    add_option('loanemi_default_tenure_years', 1);
    add_option('loanemi_default_tenure_months', 0);

    register_setting('loanemi_options_group', 'loanemi_default_amount', ['type' => 'number']);
    register_setting('loanemi_options_group', 'loanemi_default_interest', ['type' => 'number']);
    register_setting('loanemi_options_group', 'loanemi_default_tenure_years', ['type' => 'number']);
    register_setting('loanemi_options_group', 'loanemi_default_tenure_months', ['type' => 'number']);
}

add_action('admin_init', 'loanemi_register_settings');

function loanemi_register_options_page() {
    add_menu_page(
        'Loan EMI Settings',
        'Loan EMI Settings',
        'manage_options',
        'loanemi-settings',
        'loanemi_options_page_html',
        'dashicons-chart-pie',
        80
    );
}

add_action('admin_menu', 'loanemi_register_options_page');

function loanemi_options_page_html() {
    ?>
    <div class="wrap">
        <h1>Loan EMI Default Settings</h1>
        <form method="post" action="options.php">
            <?php settings_fields('loanemi_options_group'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="loanemi_default_amount">Loan Amount</label></th>
                    <td><input type="number" id="loanemi_default_amount" name="loanemi_default_amount" value="<?php echo esc_attr(get_option('loanemi_default_amount')); ?>" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="loanemi_default_interest">Interest Rate (%)</label></th>
                    <td><input type="number" step="0.01" id="loanemi_default_interest" name="loanemi_default_interest" value="<?php echo esc_attr(get_option('loanemi_default_interest')); ?>" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="loanemi_default_tenure_years">Tenure (Years)</label></th>
                    <td><input type="number" id="loanemi_default_tenure_years" name="loanemi_default_tenure_years" value="<?php echo esc_attr(get_option('loanemi_default_tenure_years')); ?>" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="loanemi_default_tenure_months">Tenure (Months)</label></th>
                    <td><input type="number" id="loanemi_default_tenure_months" name="loanemi_default_tenure_months" value="<?php echo esc_attr(get_option('loanemi_default_tenure_months')); ?>" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
