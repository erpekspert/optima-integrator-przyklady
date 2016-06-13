#!/usr/bin/php
<?php
require_once "init.php";



// wskazówka generalna: jeśli w cenniku mamy kilkanaście-kilkadziesiąt
// towarów, sensowniejsze będzie ściąganie wszystkich stanów (chyba, że
// w aplikacji zewnętrznej operujemy na jednym konkretnym towarze),
// zamiast wykonywania np. 3-4 zapytań o konkretne towary
//
// jeśli zaś w cenniku mamy kilkaset lub kilka tysięcy towarów, lepiej
// jest zrobić kilka osobnych zapytań o pojedyncze towary (będzie to
// mniej obciążało serwer, niż ciągnięcie po sieci megabajtów danych)



// pobieramy stan pojedynczego towaru
$return = $client->pobierzStanTowaru("SEKATOR");
print_r($return);

// pobieramy stan towaru, który nie istnieje - zwracany jest pusty array
$return = $client->pobierzStanTowaru("SEKATOR323");
print_r($return);

// pobieramy stany wszystkich towarów
$return = $client->pobierzStany();
print_r($return);
