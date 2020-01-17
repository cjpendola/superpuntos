<?php

ini_set('soap.wsdl_cache_enabled', 0);
ini_set('soap.wsdl_cache_ttl', 900);
ini_set('default_socket_timeout', 15);

$wsdl = 'http://172.29.3.14/ts.ws/WSClubBeneficios/?wsdl';
$options = array(
		'uri'=>'http://schemas.xmlsoap.org/soap/envelope/',
		'style'=>SOAP_RPC,
		'use'=>SOAP_ENCODED,
		'soap_version'=>SOAP_1_1,
		'cache_wsdl'=>WSDL_CACHE_NONE,
		'connection_timeout'=>15,
		'trace'=>true,
		'encoding'=>'UTF-8',
		'exceptions'=>true,
	);
try {
	$soap = new SoapClient($wsdl, $options);

	$params = array('estacion'=>'1.1.1.1',
		            'tipoId'=>'C',
		            'id'=>'0905390662',
		            'password'=>'cjpendola',
		            'Origen'=>'SP');

	$data = $soap->CambioClavePWSP($params);
}
catch(Exception $e) {
	die($e->getMessage());
}

echo $data->CambioClavePWSPResult;
echo '<br >';
echo $data->mensaje;
