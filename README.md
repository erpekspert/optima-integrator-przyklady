# Integrator SOAP dla Comarch Optima

To repozytorium zawiera przykładowego klienta SOAP dla integratora Comarch Optima, demonstrującego uniwersalne funkcjonalności, które są przez nas utrzymywane dla każdej wersji Optimy.

### Możliwości

- tworzenie kontrahenta
- edycja danych kontrahenta
- wyszukiwanie kontrahentów po kodzie lub po wartości ustalonego wcześniej atrybutu
- wyszukiwanie faktur sprzedaży
- wyszukiwanie faktur zakupu
- pobieranie stanów magazynowych
- tworzenie rezerwacji odbiorcy

### Architektura

Część serwerowa instalowana jest na serwerze z Optimą (lub dowolnym innym serwerze z Windows, mającym dostęp sieciowy do serwera MSSQL Optimy), w postaci:

- serwera Apache 2.4
- interpretera PHP 5.4
- sterownika php-sqlsrv
- naszej aplikacji PHP

Część kliencka może być zainstalowana na dowolnej platformie (Linux, Windows, FreeBSD itp., czyli np. również na zewnętrznym koncie hostingowym):

- dla której dostępny jest PHP wraz z modułem SoapClient
- mającej dostęp sieciowy do Apache będącego serwerem SOAP (bezpośredni, VPN itp.)

Nasza standardowa konfiguracja nie przewiduje żadnej autoryzacji, szyfrowania itp. - takie rzeczy konfigurowane są każdorazowo pod wymagania danego klienta.

### Kontakt ws. technicznych

Tomasz Klim
tel. 603 252 633
integrator-optima@tomaszklim.pl
