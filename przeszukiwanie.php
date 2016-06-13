#!/usr/bin/php
<?php
require_once "init.php";



// pobieramy listę wszystkich kodów kontrahentów, którzy mają przypisany atrybut projektowy (z dowolną wartością)
$return = $client->pobierzKodyKontrahentow(false);
print_r($return);


// pobieramy listę kodów kontrahentów, którzy mają przypisane projekty kolejno 15 i 16
$return = $client->pobierzKodyKontrahentow(15);
print_r($return);

$return = $client->pobierzKodyKontrahentow(16);
print_r($return);


// pobieramy komplet danych kontrahenta o kodzie ADM (istnieje)
$return = $client->pobierzDaneKontrahenta("ADM");
print_r($return);

// pobieramy komplet danych kontrahenta o kodzie ADMx3 (nie istnieje, metoda zwraca wartość false)
$return = $client->pobierzDaneKontrahenta("ADMx3");
var_dump($return);


// niżej pobieramy listy faktur sprzedaży i zakupu, wszystkie lub z ograniczeniem na projekt 15


// przykładowy zakres dat, dla którego niżej ściągamy listę faktur
$od = "2010-01-01 00:00:00";
$do = "2019-12-31 23:59:59";

// wszystkie faktury sprzedaży z podanego okresu
$return = $client->pobierzFakturySprzedazy($od, $do, false);
print_r($return);

// faktury sprzedaży z podanego okresu, z przypisanym projektem 15
$return = $client->pobierzFakturySprzedazy($od, $do, 15);
print_r($return);

// faktury zakupu z podanego okresu, z przypisanym projektem, który nie istnieje (metoda zwraca pusty array)
$return = $client->pobierzFakturyZakupu($od, $do, 1225);
print_r($return);
