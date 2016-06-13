#!/usr/bin/php
<?php
require_once "init.php";



// status odbiorcy - zawartość tego pola steruje całą "obróbką podatkową" po
// stronie Optimy dokumentów związanych z tym kontrahentem, prawidłowe jego
// wypełnienie jest ekstremalnie ważne, jeśli robimy w Optimie księgowość!
//   0–krajowy
//   1–pozaunijny
//   2–pozaunijny (zwrot VAT)
//   3–wewnątrzunijny
//   4–wewnątrzunijny trójstronny
//   5–podatnikiem jest nabywca
//   6–poza terytorium kraju
//   7–poza terytorium kraju (stawka np)
$eksport = 0;

// czy dodawany kontrahent jest płatnikiem VAT? również bardzo ważne pole!
$platnik = 1;

// typ kontrahenta:
//   0-tylko odbiorca/dostawca (ustaw też kolejne 2 zmienne na 0/1)
//   3-konkurencja
//   4-partner
//   5-potencjalny
$typ = 0;
$dostawca = 1;
$odbiorca = 1;

// nazwa grupy, do której mają być dodawane tworzone podmioty
// (grupa musi już istnieć w Optimie)
$grupa = "ODB_FIRMY";

// nazwa ceny domyślnej (standardowo: zakupu, hurtowa 1-3, detaliczna)
$ceny = "hurtowa 2";

// numer konta bankowego - podawać można w dowolnym formacie, jeśli
// chodzi o spacje i myślniki, ale bez prefiksu PL czy innego kraju
//
// a jeśli chcemy dodać podmiot bez konta bankowego (uwaga: w Optimie
// nie może być wyłączona płatność gotówkowa w tzw. kasie), przekazujemy
// pusty string:
//
//    $konto = "";
//
$konto = "38203014591259632895621458";

//
// wywołujemy metodę SOAP - albo zwróci liczbę (ID nowego kontrahenta
//                          w bazie), albo rzuci wyjątkiem
//
// generalna zasada odnośnie pustych pól: jeśli chcemy jakieś pole
// tekstowe zostawić puste, wstawiamy "", a nie null/false/0 itp.
//
$return = $client->dodajKontrahenta(
	$typ,
	$dostawca,
	$odbiorca,
	$eksport,
	$platnik,
	$ceny,
	$grupa,
	"ADM9",           // kod (wymagany i unikalny)
	"ADM 9 S.A.",     // nazwa podmiotu
	"",               // druga część nazwy (opcjonalna)
	"tutaj jakiś opcjonalny opis",
	"Polska",
	"wielkopolskie",
	"61-123",
	"Poznań",
	"Lipna",          // ulica
	"1",              // numer domu
	"2",              // numer lokalu
	"111-111-11-11",  // NIP (same cyfry i ew. spacje lub myślniki, bez kodu kraju)
	"",               // kod ISO-3166 kraju dla NIP-ów zagranicznych w ramach UE, np. DE, GB (dla Polski puste pole)
	"+48 123 45 67",
	"+48 61 123 456",
	"test-dodawania-kontrahenta@tomaszklim.pl",
	$konto,
	"15"              // wartość atrybutu przypisującego kontrahenta do projektu (albo 0)
);

var_dump($return);
