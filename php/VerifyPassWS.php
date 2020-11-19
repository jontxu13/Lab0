<?php
//incluimos la clase nusoap.php
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');
//creamos el objeto de tipo soap_server
$ns = "http://localhost/sw20/php/VerifyPassWS.php?wsdl";
$server = new soap_server;
$server->configureWSDL('verifyPass', $ns);
$server->wsdl->schemaTargetNamespace = $ns;
//registramos la función que vamos a implementar
$server->register(
    'verifyPass',
    array('x' => 'xsd:string', 'y' => 'xsd:int'),
    array('z' => 'xsd:string'),
    $ns
);
//implementamos la función
function verifyPass($x, $y)
{
    if ($y == 1010) {
        $dictionary = fopen("../txt/toppasswords.txt", "r");
        while (!feof($dictionary)) {
            $linea = fgets($dictionary);
            if ($x == $linea) {
                echo "INVALIDA";
            }
        }
        fclose($dictionary);
        echo "VALIDA";
    } else {
        echo "SIN SERVICIO";
    }
}
//llamamos al método service de la clase nusoap antes obtenemos los valores de los parámetros
if (!isset($HTTP_RAW_POST_DATA)) $HTTP_RAW_POST_DATA = file_get_contents('php://input');
$server->service($HTTP_RAW_POST_DATA);
?>