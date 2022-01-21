<?php

/**
 * Settings for CyberSource Online Gateway.
 *
 * @package Abzer
 */
defined('ABSPATH') || exit;

return array(
	'enabled' => array(
		'title' => __('Enable/Disable', 'woocommerce'),
		'label' => __('Enable FAC Payment Gateway', 'woocommerce'),
		'type' => 'checkbox',
		'default' => 'no',
	),
	'title' => array(
		'title' => __('Title', 'woocommerce'),
		'type' => 'text',
		'description' => __('The title which the user sees during checkout.', 'woocommerce'),
		'default' => __('FAC Payment Gateway', 'woocommerce'),
	),
	'description' => array(
		'title' => __('Description', 'woocommerce'),
		'type' => 'textarea',
		'css' => 'width: 400px;height:60px;',
		'description' => __('The description which the user sees during checkout.', 'woocommerce'),
		'default' => __('You will be redirected to FAC payment gateway.', 'woocommerce'),
	),
	'order_status' => array(
		'title' => __('Status of new order', 'woocommerce'),
		'type' => 'select',
		'class' => 'wc-enhanced-select',
		'options' => array(
			'fac_pending' => __('FAC Pending', 'woocommerce'),
		),
		'default' => 'fac_pending',
	),
	'facId' => array(
		'title' => __('FacId', 'woocommerce'),
		'type' => 'text',
	),
	'password' => array(
		'title' => __('Password', 'woocommerce'),
		'type' => 'text',
	),
	'acquirerId' => array(
		'title' => __('AcquirerId', 'woocommerce'),
		'type' => 'text',
	),
	'page_set' => array(
		'title' => __('Page set name', 'woocommerce'),
		'type' => 'text',
	),
	'page_name' => array(
		'title' => __('Page name', 'woocommerce'),
		'type' => 'text',
	),
	'domain' => array(
		'title' => __('domain', 'woocommerce'),
		'type' => 'text',
		'description' => __('Test: ecm.firstatlanticcommerce.com - Live: marlin.firstatlanticcommerce.com', 'woocommerce'),
	),
	'error_msg' => array(
		'title' => __('Error message', 'woocommerce'),
		'type' => 'text',
		'default' => 'Opps, ocurrio un error.',
	),
	'debug' => array(
		'title' => __('Debug Log', 'woocommerce'),
		'type' => 'checkbox',
		'label' => __('Enable logging', 'woocommerce'),
		/* translators: %s: file path */
		'description' => sprintf(__('Log file will be %s', 'woocommerce'), '<code>' . WC_Log_Handler_File::get_log_file_path('fac') . '</code>'),
		'default' => 'no',
	),
);
