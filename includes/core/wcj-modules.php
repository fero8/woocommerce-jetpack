<?php
/**
 * Booster for WooCommerce - Modules
 *
 * @version 3.3.0
 * @since   3.2.4
 * @author  Algoritmika Ltd.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$wcj_module_files = array(
	'class-wcj-admin-tools.php',
	'class-wcj-price-labels.php',
	'class-wcj-call-for-price.php',
	'class-wcj-free-price.php',
	'class-wcj-product-listings.php',
	'class-wcj-tax-display.php',
	'class-wcj-admin-products-list.php',
	'class-wcj-products-per-page.php',
	'class-wcj-sorting.php',
	'class-wcj-product-custom-info.php',
	'class-wcj-product-info.php',
	'class-wcj-product-add-to-cart.php',
	'class-wcj-add-to-cart-button-visibility.php',
	'class-wcj-related-products.php',
	'class-wcj-sku.php',
	'class-wcj-stock.php',
	'class-wcj-product-tabs.php',
	'class-wcj-product-input-fields.php',
	'class-wcj-product-bulk-price-converter.php',
	'class-wcj-product-bulk-meta-editor.php',
	'class-wcj-purchase-data.php',
	'class-wcj-product-bookings.php',
	'class-wcj-crowdfunding.php',
	'class-wcj-product-addons.php',
	'class-wcj-wholesale-price.php',
	'class-wcj-product-open-pricing.php',
	'class-wcj-offer-price.php',
	'class-wcj-price-by-user-role.php',
	'class-wcj-global-discount.php',
	'class-wcj-product-price-by-formula.php',
	'class-wcj-product-images.php',
	'class-wcj-sale-flash.php',
	'class-wcj-product-by-country.php',
	'class-wcj-product-custom-visibility.php',
	'class-wcj-product-by-time.php',
	'class-wcj-product-by-date.php',
	'class-wcj-product-by-user-role.php',
	'class-wcj-product-by-user.php',
	'class-wcj-add-to-cart.php',
	'class-wcj-more-button-labels.php',
	'class-wcj-cart.php',
	'class-wcj-cart-customization.php',
	'class-wcj-empty-cart-button.php',
	'class-wcj-mini-cart.php',
	'class-wcj-checkout-core-fields.php',
	'class-wcj-checkout-custom-fields.php',
	'class-wcj-checkout-files-upload.php',
	'class-wcj-checkout-custom-info.php',
	'class-wcj-checkout-customization.php',
	'class-wcj-payment-gateways.php',
	'class-wcj-payment-gateways-icons.php',
	'class-wcj-payment-gateways-fees.php',
	'class-wcj-payment-gateways-per-category.php',
	'class-wcj-payment-gateways-currency.php',
	'class-wcj-payment-gateways-by-currency.php',
	'class-wcj-payment-gateways-min-max.php',
	'class-wcj-payment-gateways-by-country.php',
	'class-wcj-payment-gateways-by-user-role.php',
	'class-wcj-payment-gateways-by-shipping.php',
	'class-wcj-shipping.php',
	'class-wcj-shipping-options.php',
	'class-wcj-left-to-free-shipping.php',
	'class-wcj-shipping-calculator.php',
	'class-wcj-shipping-by-user-role.php',
	'class-wcj-shipping-by-products.php',
	'class-wcj-shipping-by-order-amount.php',
	'class-wcj-address-formats.php',
	'class-wcj-orders.php',
	'class-wcj-admin-orders-list.php',
	'class-wcj-order-min-amount.php',
	'class-wcj-order-numbers.php',
	'class-wcj-order-custom-statuses.php',
	'class-wcj-order-quantities.php',
	'class-wcj-pdf-invoicing.php',
	'class-wcj-emails.php',
	'class-wcj-email-options.php',
	'class-wcj-emails-verification.php',
	'class-wcj-currencies.php',
	'class-wcj-multicurrency.php',
	'class-wcj-multicurrency-product-base-price.php',
	'class-wcj-currency-per-product.php',
	'class-wcj-currency-external-products.php',
	'class-wcj-price-by-country.php',
	'class-wcj-currency-exchange-rates.php',
	'class-wcj-price-formats.php',
	'class-wcj-general.php',
	'class-wcj-track-users.php',
	'class-wcj-breadcrumbs.php',
	'class-wcj-url-coupons.php',
	'class-wcj-coupon-code-generator.php',
	'class-wcj-admin-bar.php',
	'class-wcj-my-account.php',
	'class-wcj-custom-css.php',
	'class-wcj-custom-js.php',
	'class-wcj-products-xml.php',
	'class-wcj-export-import.php',
	'class-wcj-eu-vat-number.php',
	'class-wcj-old-slugs.php',
	'class-wcj-reports.php',
	'class-wcj-wpml.php',
	'class-wcj-modules-by-user-roles.php',
	'pdf-invoices/submodules/class-wcj-pdf-invoicing-numbering.php',
	'pdf-invoices/submodules/class-wcj-pdf-invoicing-templates.php',
	'pdf-invoices/submodules/class-wcj-pdf-invoicing-styling.php',
	'pdf-invoices/submodules/class-wcj-pdf-invoicing-header.php',
	'pdf-invoices/submodules/class-wcj-pdf-invoicing-footer.php',
	'pdf-invoices/submodules/class-wcj-pdf-invoicing-page.php',
	'pdf-invoices/submodules/class-wcj-pdf-invoicing-emails.php',
	'pdf-invoices/submodules/class-wcj-pdf-invoicing-display.php',
	'pdf-invoices/submodules/class-wcj-pdf-invoicing-advanced.php',
);

$this->modules = array();
$wcj_modules_dir = WCJ_PLUGIN_PATH . '/includes/';
foreach ( $wcj_module_files as $wcj_module_file ) {
	$module = include_once( $wcj_modules_dir . $wcj_module_file );
	$this->modules[ $module->id ] = $module;
}
