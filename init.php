#!/usr/bin/php
<?php

// konfiguracja logowania błędów PHP - tutaj wyświetlamy wszystko
// na ekranie, docelowo można to ograć tak jak się chce
ini_set("display_errors", "1");
error_reporting(E_ALL);


// tutaj należy wstawić poprawny URL do serwera
$location = "http://192.168.231.15/soap.php";


//
// od tego miejsca nic już nie dotykamy, chyba że wiemy, co robimy
//

$endpoint = array(
	"location" => $location,
	"uri"      => "http://erpekspert.optima/"
);

ini_set("soap.wsdl_cache_enabled", "0");
$client = new SoapClient(null, $endpoint);

//
// w tym miejscu jesteśmy już połączeni z serwerem SOAP, niżej jest kod funkcjonalny
//

echo "connected to Optima SOAP interface\n";
