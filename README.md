# PHP_System_raportowania
 System raportowania dla firmy Chassis Brakes

Podczas praktyk w 2018 zostałem poproszony o stworzenie nowego systemu raportowania o wyniku każdej ze zmian uzupełnianej przez lidera.
Cały projekt został wstępnie wykonany przy użyciu wirtualnego serwera Xampp i działał prawidłowo.

Zadaniem lidera było wejść na stronę www, która docelowo miała znajdować się na serwerze firmy. Stworzono system logowania oraz dwa pliki .php z formularzami do uzupełnienia. Informacje wysyłane były metodą POST, następnie w języku php komunikowano się z bazą danych i językiem mySQL informacje te były dostarczane do rozbudowanej bazy danych.

Projekt posiadał również możliwość wglądu do danych za pomocą raportów. Posłużono się biblioteką fpdf.php do generowania gotowych do druku plików .pdf na podstawie danych z bazy danych. Generowane tabele sumowały produkcję z różnych przedziałów czasowych i formatowały dane koorem dla zwiększenia czytelności.

Dla informatyka pracującego w firmie stworzono plik setup.php tworzący cały szkielet bazy danych oraz plik readme tłumaczący jak zaimplementować projekt na serwer firmy. Projekt nie został wprowadzony w firmie przez brak wsparcia dla projektu (wraz z końcem praktyk nie miałem więcej styczności z firmą), a potrzebne byłyby stałe modyfikacje systemu wprowadzania danych oraz przeprowadzenie szkoleń dla liderów.
