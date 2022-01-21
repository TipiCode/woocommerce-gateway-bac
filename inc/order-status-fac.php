<?php

/**
 * Order statuses for CyberSource Online Gateway.
 *
 * @package Abzer
 */
defined('ABSPATH') || exit;

return array(
	array(
		'status' => 'wc-pending',
		'label' => 'FAC Pending',
	),
	array(
		'status' => 'wc-completed',
		'label' => 'FAC Complete',
	),
	array(
		'status' => 'wc-error',
		'label' => 'FAC Error',
	),
	array(
		'status' => 'wc-reject',
		'label' => 'FAC Reject',
	),
	array(
		'status' => 'wc-review',
		'label' => 'FAC Review',
	),
	array(
		'status' => 'wc-failed',
		'label' => 'FAC Failed',
	),
	array(
		'status' => 'wc-declined',
		'label' => 'FAC Declined',
	),
);
