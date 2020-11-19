<?php

//incluimos la clase nusoap.php
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');

//creamos el objeto de tipo soap_server
$ns = "http://localhost/nusoap-0.9.5/samples";
$server = new soap_server;
$server->configureWSDL('VerifyPass', $ns);
$server->wsdl->schemaTargetNamespace = $ns;

//registramos la función que vamos a implementar
$server->register(
    'VerifyPass',
    array('x' => 'xsd:string', 'y' => 'xsd:int'),
    array('z' => 'xsd:string'),
    $ns
);

//implementamos la función
function VerifyPass($x, $y)
{
    if ($y == 1010) {
        $dictionary = fopen("../txt/toppasswords.txt", "r");
        while (!feof($dictionary)) {
            $linea = fgets($dictionary);
            if ($x == $linea) {
                return "INVALIDA";
            }
        }
        fclose($dictionary);
        return "VALIDA";
    } else {
        return "SIN SERVICIO";
    }
}

if (!isset($HTTP_RAW_POST_DATA)) $HTTP_RAW_POST_DATA = file_get_contents('php://input');
$server->service($HTTP_RAW_POST_DATA);
