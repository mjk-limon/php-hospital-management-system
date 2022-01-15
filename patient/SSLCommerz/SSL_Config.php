<?php

$SSLC = array_map(function ($val) {
	return explode("_-_", $val);
}, DBQuery::getSingle(
	"pmnt_gateways",
	"id = 5"
));

$SSLC['api_url'] = (IS_LOCALHOST
	? 'https://sandbox.sslcommerz.com'
	: 'https://securepay.sslcommerz.com');

if (!$SSLC['ins_1'][1])
	exit(json_encode(['error' => 'SSL Store not initialized! Please try again later..']));

return [
	'projectPath' => Models::baseUrl(),
	'apiDomain' => $SSLC['api_url'],
	'apiCredentials' => [
		'store_id' => $SSLC['ins_1'][1],
		'store_password' => $SSLC['ins_2'][1],
	],
	'apiUrl' => [
		'make_payment' => "/gwprocess/v4/api.php",
		'transaction_status' => "/validator/api/merchantTransIDvalidationAPI.php",
		'order_validate' => "/validator/api/validationserverAPI.php",
		'refund_payment' => "/validator/api/merchantTransIDvalidationAPI.php",
		'refund_status' => "/validator/api/merchantTransIDvalidationAPI.php",
	],
	'connect_from_localhost' => constant("IS_LOCALHOST"),
	'success_url' => 'ajax/',
	'failed_url' => 'ajax/',
	'cancel_url' => 'ajax/',
	'ipn_url' => 'ajax/',
];
