<?php
/*
Plugin Name: WP E-Commerce shop styling
Plugin URI: http://haet.at
Description: Style and generate PDF invoices for your wp e-commerce store, format emails and transaction results
Version: 0.1
Author: haet webdevelopment
Author URI: http://haet.at
License: CF Commercial-to-GPL License
*/

/*  Copyright 2012 haet (email : contact@haet.at) */


define( 'HAET_SHOP_STYLING_PATH', plugin_dir_path(__FILE__) );
define( 'HAET_SHOP_STYLING_URL', plugin_dir_url(__FILE__) );

require HAET_SHOP_STYLING_PATH . 'includes/class-haetshopstyling.php';
load_plugin_textdomain('haetshopstyling', false, dirname( plugin_basename( __FILE__ ) ) . '/translations' );





if (class_exists("HaetShopStyling")) {
	$wp_haetshopstyling = new HaetShopStyling();
}

//Actions and Filters	
if (isset($wp_haetshopstyling)) {
	add_action('admin_menu', 'add_haetshopstyling_adminpage');
	add_action('activate_haetshopstyling/haetshopstyling.php',  array(&$wp_haetshopstyling, 'init'));
        add_filter('wpsc_purchlogitem_links_start',array(&$wp_haetshopstyling, 'showLogInvoiceLink'));
        //add_action('wpsc_confirm_checkout', array(&$wp_haetshopstyling, 'sendInvoiceMail'));
        add_action('wpsc_transaction_result_cart_item', array(&$wp_haetshopstyling, 'sendInvoiceMail'));
        add_filter('wp_mail',array(&$wp_haetshopstyling, 'styleMail'),12,1);
        //if ( version_compare( WPSC_VERSION, '3.8.9', '>=' ) )
        add_filter('wpsc_get_transaction_html_output',array(&$wp_haetshopstyling, 'transactionResultsFilter'),10,1);
        add_action( 'wpsc_update_purchase_log_status', array(&$wp_haetshopstyling, 'setGlobalPurchaseId'), 9, 4 );
}



function add_haetshopstyling_adminpage() {
		global $wp_haetshopstyling;
		if (!isset($wp_haetshopstyling)) {
			return;
		}
		if (function_exists('add_options_page')) {
                    add_options_page(__('style your store','haetshopstyling'), __('Shop styling','haetshopstyling'), 'manage_options', basename(__FILE__), array(&$wp_haetshopstyling, 'printAdminPage'));
		}
}
	
	


?>