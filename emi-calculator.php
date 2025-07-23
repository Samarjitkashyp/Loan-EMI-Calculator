<?php
/**
 * Plugin Name:       Loan EMI Calculator
 * Plugin URI:        https://github.com/Samarjitkashyp/loan-emi-calculator
 * Description:       A simple and elegant Loan EMI Calculator plugin with a live donut chart, user input form, and persistent data storage.
 * Version:           1.2.4
 * Requires at least: 5.5
 * Tested up to:      6.5.3
 * Requires PHP:      7.4
 * Author:            Samarjit Kashyp
 * Author URI:        https://digihiveassam.com
 * License:           GPLv2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       loan-emi-calculator
 * Tags: loan calculator, emi calculator,  financial calculator
 * Domain Path:       /languages
 */


if (!defined('ABSPATH')) exit;

// Load settings page file
require_once plugin_dir_path(__FILE__) . 'includes/admin-settings.php';

// Enqueue scripts & styles
function lec_enqueue_assets() {
    wp_enqueue_style('lec-style', plugin_dir_url(__FILE__) . 'css/style.css');
    wp_enqueue_script('chart-js', 'https://cdn.jsdelivr.net/npm/chart.js', [], null, true);
    wp_enqueue_script('lec-script', plugin_dir_url(__FILE__) . 'js/script.js', ['chart-js'], null, true);
}
add_action('wp_enqueue_scripts', 'lec_enqueue_assets');

// Shortcode output
function lec_emi_calculator_shortcode() {
    ob_start();

    // Get default values from options (same name as in admin-settings.php)
    $default_loan = get_option('loanemi_default_amount', 100000);
    $default_interest = get_option('loanemi_default_interest', 10);
    $default_years = get_option('loanemi_default_tenure_years', 1);
    $default_months = get_option('loanemi_default_tenure_months', 0);

    $default_total_months = ($default_years * 12) + $default_months;
    ?>
    <div class="lec-container">
        <div class="lec-form">
            <h3>Loan EMI Calculator</h3>

            <label>Loan Amount</label>
            <input type="number" id="loanAmount" value="<?php echo esc_attr($default_loan); ?>" min="1"> INR

            <label>Interest Rate (%)</label>
            <input type="number" id="interestRate" value="<?php echo esc_attr($default_interest); ?>" step="0.1" min="0.1"> %

            <label>Loan Tenure (Months)</label>
            <input type="number" id="loanTenure" value="<?php echo esc_attr($default_total_months); ?>" min="1">

            <button id="calculateBtn">Calculate</button>

            <div class="lec-results">
                <div class="lec-inner-wrap">
                <p><strong>Loan EMI:</strong> <span id="emiAmount">--</span></p>
                <p><strong>Total Interest Payable:</strong> <span id="totalInterest">--</span></p>
                <p><strong>Total Payment (Principal + Interest):</strong> <span id="totalPayment">--</span></p>
                </div>
            </div>
        </div>
        <div class="lec-chart">
            <canvas id="emiChart"></canvas>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('loan_emi_calculator', 'lec_emi_calculator_shortcode');
