<?php

/**
 * Payment Gateway class for CyberSource Online
 *
 * @package Abzer
 */
if (!defined('ABSPATH')) {
	exit;
}

/**
 * Cybersource_Gateway_Payment class.
 */
class FAC_Gateway_Payment {


	/**
	 * fac Online states
	 */
	const FAC_STARTED = 'STARTED';
	const FAC_ACCEPT = 'ACCEPT';
	const FAC_CANCEL = 'CANCEL';
	const FAC_DECLINE = 'DECLINE';

	/**
	 * Order Status Variable
	 *
	 * @var string Order Status.
	 */
	protected $order_status;

	/**
	 * fac State Variable
	 *
	 * @var string fac Online state
	 */
	protected $fac_state;

	/**
	 * Gateway
	 *
	 * @var FAC_Gateway $gateway
	 */
	protected $gateway;

	/**
	 * Status
	 *
	 * @var string status
	 */
	protected $status_set_to;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->order_status = include dirname(__FILE__) . '/order-status-fac.php';
		$this->gateway = FAC_Gateway::get_instance();
	}

	/**
	 * Execute action.
	 *
	 * @param string $order_ref Order reference.
	 */
	//public function execute(string $order_ref) {
	public function execute( $order, $status ) {
		global $woocommerce;
		$log['path'] = __METHOD__;
		$log['ExecuteStatus'] = $status;
		$redirect_url = $woocommerce->cart->get_checkout_url();

		$log['is_valid_ref'] = true;

		$order_item = wc_get_order($order);
		$orderData = $this->process_order($status, $order_item);
		$redirect_url = $orderData->get_checkout_order_received_url();

		$log['redirected_to'] = $redirect_url;
		$this->gateway->debug($log);
		wp_safe_redirect($redirect_url);
		exit();
	}

	/**
	 * Process Order.
	 *
	 * @param  array  $payment_result Payment Results.
	 * @param  object $order_item Order Item.
	 * @return object
	 */
	public function process_order( $status, $order_item) {
		$log['path'] = __METHOD__;
		$order = $order_item;

		if ($order && $order->get_id()) {
			if ($status == "c") {
				$order->update_status($this->order_status[5]['status'], 'The transaction has been failed.');
				$order->update_status('failed');
				$this->status_set_to = $this->order_status[5]['status'];
				$message = "Cancelado";
				$order->add_order_note($message);
			} else {
				$order->update_status($this->order_status[1]['status']);
				$this->status_set_to = $this->order_status[1]['status'];
				$order->add_order_note($message);
				$log['msg'] = $message;
				$this->gateway->debug($log);
			}
			$this->gateway->debug($log);
			return $order;
		} else {
			return new WP_Error('fac_error', 'Order Not Found');
		}
	}
}
