<?php
/**
 * Booster for WooCommerce - Settings - Product Visibility by Country
 *
 * @version 3.1.0
 * @since   2.9.0
 * @author  Algoritmika Ltd.
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

return array(
	array(
		'title'    => __( 'Visibility Options', 'woocommerce-jetpack' ),
		'type'     => 'title',
		'id'       => 'wcj_product_by_country_options',
	),
	array(
		'title'    => __( 'Hide Visibility', 'woocommerce-jetpack' ),
		'desc_tip' => __( 'This will hide selected products in shop and search results. However product still will be accessible via direct link.', 'woocommerce-jetpack' ),
		'desc'     => __( 'Enable', 'woocommerce-jetpack' ),
		'id'       => 'wcj_product_by_country_visibility',
		'default'  => 'yes',
		'type'     => 'checkbox',
	),
	array(
		'title'    => __( 'Make Non-purchasable', 'woocommerce-jetpack' ),
		'desc_tip' => __( 'This will make selected products non-purchasable (i.e. product can\'t be added to the cart).', 'woocommerce-jetpack' ),
		'desc'     => __( 'Enable', 'woocommerce-jetpack' ),
		'id'       => 'wcj_product_by_country_purchasable',
		'default'  => 'no',
		'type'     => 'checkbox',
	),
	array(
		'title'    => __( 'Modify Query', 'woocommerce-jetpack' ),
		'desc_tip' => __( 'This will hide selected products completely (including direct link).', 'woocommerce-jetpack' ),
		'desc'     => __( 'Enable', 'woocommerce-jetpack' ),
		'id'       => 'wcj_product_by_country_query',
		'default'  => 'no',
		'type'     => 'checkbox',
	),
	array(
		'type'     => 'sectionend',
		'id'       => 'wcj_product_by_country_options',
	),
	array(
		'title'    => __( 'User Country Selection Options', 'woocommerce-jetpack' ),
		'type'     => 'title',
		'id'       => 'wcj_product_by_country_selection_options',
	),
	array(
		'title'    => __( 'User Country Selection Method', 'woocommerce-jetpack' ),
		'desc_tip' => __( 'Possible values: "Automatically by IP" or "Manually".', 'woocommerce-jetpack' ),
		'desc'     => sprintf(
			__( 'If "Manually" option is selected, you can add country selection drop box to frontend with "%s" widget or %s shortcode.', 'woocommerce-jetpack' ),
			__( 'Booster - Selector', 'woocommerce-jetpack' ),
			'<code>' . '[wcj_selector selector_type="country"]' . '</code>' ) . ' ' . apply_filters( 'booster_get_message', '', 'desc' ),
		'id'       => 'wcj_product_by_country_selection_method',
		'default'  => 'by_ip',
		'type'     => 'select',
		'options'  => array(
			'by_ip'  => __( 'Automatically by IP', 'woocommerce-jetpack' ),
			'manual' => __( 'Manually', 'woocommerce-jetpack' ),
		),
		'custom_attributes' => apply_filters( 'booster_get_message', '', 'disabled' ),
	),
	array(
		'type'     => 'sectionend',
		'id'       => 'wcj_product_by_country_selection_options',
	),
	array(
		'title'    => __( 'Admin Options', 'woocommerce-jetpack' ),
		'type'     => 'title',
		'id'       => 'wcj_product_by_country_admin_options',
	),
	array(
		'title'    => __( 'Admin Products List Column', 'woocommerce-jetpack' ),
		'desc_tip' => __( 'This will add "Countries" column to the admin products list.', 'woocommerce-jetpack' ),
		'desc'     => __( 'Add', 'woocommerce-jetpack' ),
		'id'       => 'wcj_product_by_country_add_column_visible_countries',
		'default'  => 'no',
		'type'     => 'checkbox',
	),
	array(
		'type'     => 'sectionend',
		'id'       => 'wcj_product_by_country_admin_options',
	),
);
