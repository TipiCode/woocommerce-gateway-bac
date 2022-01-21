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
 * FAC_Gateway_Http_Abstract class.
 */
abstract class FAC_Gateway_Http_Abstract {


	/**
	 * FAC Order status.
	 *
	 * @var array $order_status
	 */
	protected $order_status;

	/**
	 * Gateway Object
	 *
	 * @var FAC_Gateway $gateway
	 */
	protected $gateway;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->order_status = include dirname(__FILE__) . '/../order-status-fac.php';
		$this->gateway = FAC_Gateway::get_instance();
	}

	/**
	 * Places request to gateway.
	 *
	 * @param  TransferInterface $transfer_object Transafer Factory.
	 * @return array|null
	 * @throws Exception Exception.
	 */
	public function place_request( $requestArr) {
		$this->order_status = include dirname(__FILE__) . '/../order-status-fac.php';
		$log['path'] = __METHOD__;
		try {
			$log['response'] = $requestArr;
			$result = $this->post_process($requestArr);
			return $result;
		} catch (Exception $e) {
			return new WP_Error('error', $e->getMessage());
		} finally {
			$this->gateway->debug($log);
		}
	}
	
	
	/**
	 * Create product to get redirect url
	 *
	 * @param  TransferInterface $transfer_object Transafer Factory.
	 * @return array|null
	 * @throws Exception Exception.
	 */
	public function create_order( $requestArr,) {
		$this->order_status = include dirname(__FILE__) . '/../order-status-fac.php';
		$log['path'] = __METHOD__;
		try {
			$log['response'] = "Create url";
			$domain = $this->gateway->get_option('domain');
			$wsdlurl = 'https://' . $domain . '/PGService/HostedPage.svc?wsdl';
			$soapUrl = 'https://' . $domain . '/PGService/HostedPage.svc';

			$options = array(
				'location' => $soapUrl,
				'soap_version'=>SOAP_1_1,
				'exceptions'=>0,
				'trace'=>1,
				'cache_wsdl'=>WSDL_CACHE_NONE
			);
			$client = new SoapClient($wsdlurl, $options);

			$facId = $this->gateway->get_option('facId');
			$password = $this->gateway->get_option('password');
			$acquirerId = $this->gateway->get_option('acquirerId');
			$orderNumber = "Order-".$requestArr["orderId"];
			$amount = $requestArr["amount"];
			$pageset = $this->gateway->get_option('page_set');
			$pagename = $this->gateway->get_option('page_name');
			$transCode = "TransCode-".$requestArr["orderId"];

			$amountFormatted = str_pad(''.($amount*100), 12, "0", STR_PAD_LEFT);
			$currency = '320';

			$signature = $this->Sign($password, $facId, $acquirerId, $orderNumber, $amountFormatted, $currency);

			$TransactionDetails = array(
				'AcquirerId' => $acquirerId,
				'Amount' => $amountFormatted,
				'Currency' => $currency,
				'CurrencyExponent' => 2,
				'IPAddress' => '',
				'MerchantId' => $facId,
				'OrderNumber' => $orderNumber,
				'Signature' => $signature,
				'SignatureMethod' => 'SHA1',
				'TransactionCode' => $transCode
			);
			$CardHolderResponseUrl = site_url() . "/wc-api/faconline";

			$HostedPageRequest = array(
				'Request' => array(
					'TransactionDetails' => $TransactionDetails,
					'CardHolderResponseURL' => $CardHolderResponseUrl
				)
			);

			$result = $client->HostedPageAuthorize($HostedPageRequest);
			$log['HostResponse'] = $result;
			if($result->HostedPageAuthorizeResult->ResponseCode != 0) {
				$log['HostErrorResponse'] = $result;
			}
			$token = $result->HostedPageAuthorizeResult->SingleUseToken;

			$PaymentPageUrl = 'https://' . $domain . '/MerchantPages/' . $pageset . '/' . $pagename . '/';

			$RedirectURL = $PaymentPageUrl . $token;
			$log['HostURL'] = $RedirectURL;
			return $RedirectURL;
			
		} catch (Exception $e) {
			return new WP_Error('error', $e->getMessage());
		} finally {
			$this->gateway->debug($log);
		}
	}

	private function Sign($passwd, $facId, $acquirerId, $orderNumber, $amount, $currency) {
		$stringtohash = $passwd.$facId.$acquirerId.$orderNumber.$amount.$currency;
		$hash = sha1($stringtohash, true);
		$signature = base64_encode($hash);
		return $signature;
	}
	/**
	 * Processing of API request body
	 *
	 * @param  array $data Data.
	 * @return string|array
	 */
	abstract protected function pre_process( array $data);

	/**
	 * Processing of API response
	 *
	 * @param  array $response Response.
	 * @return array|null
	 */
	abstract protected function post_process( $response);
}
