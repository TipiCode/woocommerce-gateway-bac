<?php

/**
 * Payment Gateway class for FAC Online
 *
 * @package Abzer
 */
if (!defined('ABSPATH')) {
	exit;
}

/**
 * FAC_Gateway_Config class.
 */
class FAC_Gateway_Config {

	/**
	 * Pointer to gateway making the request.
	 *
	 * @var FAC_Gateway
	 */
	public $gateway;

	/**
	 * Constructor.
	 *
	 * @param FAC_Gateway $gateway FAC Online gateway object.
	 */
	public function __construct( FAC_Gateway $gateway) {
		$this->gateway = $gateway;
	}

	/**
	 * Retrieve apikey and outletReferenceId empty or not
	 *
	 * @return bool
	 */
	public function is_complete() {
		return ( 
			!empty($this->get_password()) && 
			!empty($this->get_facId()) && 
			!empty($this->get_domain()) && 
			!empty($this->get_acquirerId()) &&
			!empty($this->get_page_set()) &&
			!empty($this->get_page_name())
		) ? (bool) true : (bool) false;
	}

	/**
	 * Get Password
	 *
	 * @return string
	 */
	public function get_password() {
		return $this->gateway->get_option('password');
	}

	/**
	 * Get FAC id
	 *
	 * @return string
	 */
	public function get_facId() {
		return $this->gateway->get_option('facId');
	}

	/**
	 * Get Domain
	 *
	 * @return string
	 */
	public function get_domain() {
		return $this->gateway->get_option('domain');
	}

	/**
	 * Get Acquirer Id
	 *
	 * @return string
	 */
	public function get_acquirerId() {
		return $this->gateway->get_option('acquirerId');
	}

	/**
	 * Get Page Set Name
	 *
	 * @return string
	 */
	public function get_page_set() {
		return $this->gateway->get_option('page_set');
	}

	/**
	 * Get Page Name
	 *
	 * @return string
	 */
	public function get_page_name() {
		return $this->gateway->get_option('page_name');
	}

	/**
	 * Get Error Message
	 *
	 * @return string
	 */
	public function get_error_msg() {
		return $this->gateway->get_option('error_msg');
	}
}
