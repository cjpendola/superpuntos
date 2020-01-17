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
		            'id'=>'0905390662');

	$data = $soap->ConsPuntosDisponibles($params);
}
catch(Exception $e) {
	die($e->getMessage());
}

var_dump($data);

echo $data->ConsPuntosDisponiblesResult;
echo '<br >';
echo $data->mensaje;
echo '<br >';
echo $data->puntosDisp;
echo '<br >';
echo $data->puntosxCad;
