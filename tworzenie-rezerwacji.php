#!/usr/bin/php
<?php
require_once "init.php";



//
// wywołujemy metodę SOAP - albo zwróci liczbę (ID nowej rezerwacji
//                          w bazie), albo rzuci wyjątkiem
//
// generalna zasada odnośnie pustych pól: jeśli chcemy jakieś pole
// tekstowe zostawić puste, wstawiamy "", a nie null/false/0 itp.
//
$return = $client->dodajRezerwacjeOdbiorcy(
	"NUMER/OBCY/2015/8/2355",   // numer obcy (pełna dowolność: można zostawić pusty, wpisać sam identyfikator z jakiegoś systemu, albo numer tekstowy)
	"ADM2",                     // kod kontrahenta
	"TK",                       // seria operatora (jeśli konfiguracja serii dokumentów w Optimie przewiduje ten człon, to dla każdego operatora będzie odrębna numeracja)
	"2015-08-23",               // data dokumentu
	7,                          // termin płatności w dniach
	"przelew",                  // forma płatności
	"brak uwag",                // opcjonalny komentarz
	array (
		array (                 // pierwsza pozycja dokumentu
			"SEKATOR",          // kod towaru
			4,                  // ilość
			"9.38",             // cena bazowa netto (cena wynikająca z cennika)
			"8.91",             // cena sprzedaży netto (realna cena, po jakiej sprzedajemy 1 sztukę towaru w ramach tej konkretnej transakcji)
			5,                  // procent rabatu dla pozycji
		),
		array (                 // druga pozycja dokumentu
			"STOJAK",           // kod towaru
			1,                  // ilość
			"10.63",            // cena bazowa netto (cena wynikająca z cennika)
			"10.63",            // cena sprzedaży netto (realna cena, po jakiej sprzedajemy 1 sztukę towaru w ramach tej konkretnej transakcji)
			0,                  // procent rabatu dla pozycji
		),
));

var_dump($return);
