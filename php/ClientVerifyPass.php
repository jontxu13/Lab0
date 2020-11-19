<?php
//incluimos la clase nusoap.php
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');
//creamos el objeto de tipo soapclient.
//http://www.mydomain.com/server.php se refiere a la url
//donde se encuentra el servicio SOAP que vamos a utilizar.
$soapclient = new nusoap_client('../php/VerifyPassWS?wsdl', true);
//Llamamos la función que habíamos implementado en el Web Service
//e imprimimos lo que nos devuelve
if (isset($_POST['Pass'])) {
  echo $soapclient->call('VerifyPass', array('x' => $_POST['Pass'], 'y' => 1010));
}
?>