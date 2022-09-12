<?php

    /*
    Plugin Name: Simple Empty Cart Button
    Plugin URI: https://github.dev/mukatr/WooCommerce-Empty-Cart-Button
    Description: Plugin to create [Empty Cart button] and place it any where in your website pages/sections
    Version: 1.0
    Author: Katr
    Author URI: https://katr.info
    Requires at least: 5.3
    Tested up to: 6.0.1
    License: GPLv2 or later
    Text Domain: mukatr
    */

	// Just use shortcode [empty_cart_muka] in Cart Page

	add_action( 'init', 'woocommerce_clear_cart_url' );

	function woocommerce_clear_cart_url(){
		$recart_url = wc_get_cart_url();
		if ( isset( $_GET['clear-cart'] ) ) {
			global
			$woocommerce; $woocommerce->cart->empty_cart();
			header("Location: $recart_url");
			exit();
		}
	}

	function empty_cart_muka() {
		$cart_url = wc_get_cart_url();
		$cartsuff = "?clear-cart";
		if ( WC()->cart->get_cart_contents_count() !== 0 ) {
			echo "<a class='empty_cart_muka' href='" .$cart_url.$cartsuff. "'>Empty Cart</a>";
		}
	}

	add_shortcode('empty_cart_muka', 'empty_cart_muka');

	/* Button Styling */
	add_action( 'wp_head', function () { ?>
	<style>
		
		.empty_cart_muka, .empty_cart_muka:hover{
			color: white;
			background-color: black;
			padding: 5px 10px;
		}
		
	</style>

<?php } );
