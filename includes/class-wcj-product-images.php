<?php
/**
 * WooCommerce Jetpack Product Images
 *
 * The WooCommerce Jetpack Product Images class.
 *
 * @version 2.7.2
 * @since   2.2.0
 * @author  Algoritmika Ltd.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'WCJ_Product_Images' ) ) :

class WCJ_Product_Images extends WCJ_Module {

	/**
	 * Constructor.
	 *
	 * @version 2.7.2
	 */
	function __construct() {

		$this->id         = 'product_images';
		$this->short_desc = __( 'Product Images', 'woocommerce-jetpack' );
		$this->desc       = __( 'Customize WooCommerce products images, thumbnails and sale flashes.', 'woocommerce-jetpack' );
		$this->link       = 'http://booster.io/features/woocommerce-product-images/';
		parent::__construct();

		if ( $this->is_enabled() ) {

			// Product Image & Thumbnails
			if ( 'yes' === get_option( 'wcj_product_images_and_thumbnails_enabled', 'no' ) ) {

				// Single
				if ( 'yes' === get_option( 'wcj_product_images_and_thumbnails_hide_on_single', 'no' ) ) {
					add_action( 'init', array( $this, 'product_images_and_thumbnails_hide_on_single' ), PHP_INT_MAX );
				} else {
					add_filter( 'woocommerce_single_product_image_html',           array( $this, 'customize_single_product_image_html' ), PHP_INT_MAX, 2 );
					add_filter( 'woocommerce_single_product_image_thumbnail_html', array( $this, 'customize_single_product_image_thumbnail_html' ) );
				}

				// Archives
				add_action( 'woocommerce_before_shop_loop_item',       array( $this, 'product_images_hide_on_archive' ) );
				add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'customize_archive_product_image_html' ), 10 );
				add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'hide_per_product_image_on_archives_start' ), 1 );
				add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'hide_per_product_image_on_archives_end' ), PHP_INT_MAX );

				// Single Product Thumbnails Columns Number
				add_filter( 'woocommerce_product_thumbnails_columns', array( $this, 'change_product_thumbnails_columns_number' ), PHP_INT_MAX );

				// Per product options
				add_action( 'add_meta_boxes',    array( $this, 'add_meta_box' ) );
				add_action( 'save_post_product', array( $this, 'save_meta_box' ), PHP_INT_MAX, 2 );

				// Per product - CSS
				add_action( 'wp_head', array( $this, 'maybe_add_css' ) );
			}

			// Sale flash
			if ( 'yes' === get_option( 'wcj_product_images_sale_flash_enabled', 'no' ) ) {
				add_filter( 'woocommerce_sale_flash', array( $this, 'customize_sale_flash' ), PHP_INT_MAX, 3 );
			}
		}
	}

	/**
	 * maybe_add_css.
	 *
	 * @version 2.7.2
	 * @since   2.7.2
	 */
	function maybe_add_css() {
		$post_id = get_the_ID();
		if ( $post_id > 0 && 'yes' === get_post_meta( $post_id, '_' . 'wcj_product_css_enabled', true ) ) {
			if ( '' != ( $css = get_post_meta( $post_id, '_' . 'wcj_product_css', true ) ) ) {
				echo '<style>' . $css . '</style>';
			}
		}
	}

	/**
	 * hide_per_product_image_on_archives_start.
	 *
	 * @version 2.5.2
	 * @since   2.5.2
	 */
	function hide_per_product_image_on_archives_start() {
		$post_id = get_the_ID();
		if ( $post_id > 0 && 'yes' === get_post_meta( $post_id, '_' . 'wcj_product_images_hide_image_on_archives', true ) ) {
			remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
		}
	}

	/**
	 * hide_per_product_image_on_archives_end.
	 *
	 * @version 2.5.2
	 * @since   2.5.2
	 */
	function hide_per_product_image_on_archives_end() {
		$post_id = get_the_ID();
		if ( $post_id > 0 && 'yes' === get_post_meta( $post_id, '_' . 'wcj_product_images_hide_image_on_archives', true ) ) {
			add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
		}
	}

	/**
	 * customize_archive_product_image_html.
	 *
	 * @version 2.5.2
	 * @since   2.2.6
	 */
	function customize_archive_product_image_html() {
		$post_id = get_the_ID();
		if ( $post_id > 0 && '' != get_post_meta( $post_id, '_' . 'wcj_product_images_meta_custom_on_archives', true ) ) {
			echo get_post_meta( $post_id, '_' . 'wcj_product_images_meta_custom_on_archives', true );
		} elseif ( '' != get_option( 'wcj_product_images_custom_on_archives', '' ) ) {
			echo get_option( 'wcj_product_images_custom_on_archives' );
		}
	}

	/**
	 * product_images_hide_on_archive.
	 *
	 * @version 2.2.6
	 */
	function product_images_hide_on_archive() {
		if (
			'yes' === get_option( 'wcj_product_images_hide_on_archive', 'no' ) ||
			'' != get_option( 'wcj_product_images_custom_on_archives', '' ) ||
			( ( $post_id = get_the_ID() ) > 0 && '' != get_post_meta( $post_id, '_' . 'wcj_product_images_meta_custom_on_archives', true ) )
		) {
			remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
		}
	}

	/**
	 * product_images_and_thumbnails_hide_on_single.
	 */
	function product_images_and_thumbnails_hide_on_single() {
		remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
	}

	/**
	 * customize_single_product_image_html.
	 *
	 * @version 2.5.2
	 */
	function customize_single_product_image_html( $image_link, $post_id ) {
		if ( '' != get_post_meta( $post_id, '_' . 'wcj_product_images_meta_custom_on_single', true ) ) {
			return get_post_meta( $post_id, '_' . 'wcj_product_images_meta_custom_on_single', true );
		} elseif ( '' != get_option( 'wcj_product_images_custom_on_single', '' ) ) {
			return get_option( 'wcj_product_images_custom_on_single' );
		} elseif ( 'yes' === get_option( 'wcj_product_images_hide_on_single', 'no' ) ) {
			return '';
		} elseif ( 'yes' === get_post_meta( $post_id, '_' . 'wcj_product_images_hide_image_on_single', true ) ) {
			return '';
		}
		return $image_link;
	}

	/**
	 * customize_single_product_image_thumbnail_html.
	 *
	 * @version 2.5.2
	 */
	function customize_single_product_image_thumbnail_html( $image_link ) {
		$post_id = get_the_ID();
		if ( '' != get_option( 'wcj_product_images_thumbnails_custom_on_single', '' ) ) {
			return get_option( 'wcj_product_images_thumbnails_custom_on_single' );
		} elseif ( 'yes' === get_option( 'wcj_product_images_thumbnails_hide_on_single', 'no' ) ) {
			return '';
		} elseif ( $post_id > 0 && 'yes' === get_post_meta( $post_id, '_' . 'wcj_product_images_hide_thumb_on_single', true ) ) {
			return '';
		}
		return $image_link;
	}

	/**
	 * change_product_thumbnails_columns.
	 */
	function change_product_thumbnails_columns_number( $columns_number ) {
		return get_option( 'wcj_product_images_thumbnails_columns', 3 );
	}

	/**
	 * customize_sale_flash.
	 *
	 * @version 2.7.0
	 */
	function customize_sale_flash( $sale_flash_html, $post, $product ) {
		// Hiding
		if ( 'yes' === get_option( 'wcj_product_images_sale_flash_hide_on_archives', 'no' ) && is_archive() ) {
			return '';
		}
		if ( 'yes' === get_option( 'wcj_product_images_sale_flash_hide_on_single', 'no' )   && is_single() && get_the_ID() === wcj_get_product_id_or_variation_parent_id( $product ) ) {
			return '';
		}
		// Content
		return do_shortcode( get_option( 'wcj_product_images_sale_flash_html' , '<span class="onsale">' . __( 'Sale!', 'woocommerce' ) . '</span>' ) );
	}

}

endif;

return new WCJ_Product_Images();
