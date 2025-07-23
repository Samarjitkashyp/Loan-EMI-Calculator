=== EMI Calculator ===
Contributors: samarjitdas
Tags: emi calculator, loan calculator, finance calculator, mortgage, interest calculator
Requires at least: 5.0
Tested up to: 6.5.3
Requires PHP: 7.0
Stable tag: 1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A simple EMI Calculator plugin with beautiful charts and automatic shortcode integration on the homepage.

== Description ==

The EMI Calculator plugin allows users to quickly calculate Equated Monthly Installments (EMIs) for loans. It comes with a clean and responsive design, includes a graphical chart using Chart.js, and automatically displays the calculator on your homepage.

**Key Features:**

- Instant EMI calculation based on Loan Amount, Interest Rate, and Tenure
- Beautiful pie chart visualization
- Automatic shortcode output on the homepage
- Admin setting to define default loan amount
- Lightweight, no jQuery required
- Mobile-responsive design

This plugin is ideal for financial institutions, personal finance bloggers, and loan-related service providers.

== Installation ==

1. Upload the plugin folder to `/wp-content/plugins/` or install directly from the WordPress plugin repository.
2. Activate the plugin through the ‘Plugins’ menu in WordPress.
3. To manually display the calculator on any page or post, use the shortcode: `[emi_calculator]`

== Frequently Asked Questions ==

= How do I change the default loan amount? =  
Go to **Settings > EMI Calculator**, and enter your preferred default loan amount.

= Where does the calculator show up? =  
By default, it is automatically injected on the homepage using a content filter. You can also use the shortcode `[emi_calculator]` to display it on any page/post.

= Does it support Gutenberg or page builders? =  
Yes. You can paste the shortcode inside any block or widget that supports shortcodes.

== Screenshots ==

1. EMI Calculator Form Interface
2. Result Table and Graphical Chart
3. Admin Settings Page for Default Amount

== Changelog ==

= 1.0 =
* Initial release
* Includes shortcode, settings page, pie chart and auto-display on homepage

== Upgrade Notice ==

= 1.0 =
First stable version with EMI calculation and settings options.

== License ==

This plugin is licensed under the GPLv2 or later. See [https://www.gnu.org/licenses/gpl-2.0.html](https://www.gnu.org/licenses/gpl-2.0.html) for details.
