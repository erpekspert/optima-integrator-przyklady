#!/usr/bin/php
<?php
require_once "init.php";



$zmiany = array(
	"nazwa1"   => "ADM 9 SA",
	"opis"     => "jakiś inny opis",
	"miasto"   => "Poznan",
	"telefon1" => "+48 123 45 89",
	"email"    => "test-edycji-kontrahenta@tomaszklim.pl",
);

$return = $client->edytujKontrahenta("ADM9", $zmiany);
var_dump($return);
