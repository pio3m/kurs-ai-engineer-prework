# Kurs AI Engineer: przeglądarka slajdów (prework)

Statyczna strona, która wczytuje plik Markdown pobrany z narzędzia do tworzenia kursów
i pokazuje go jako prezentację Reveal.js, tak samo jak widzi ją kursant w narzędziu
(nagłówek, dwie kolumny, ramki kodu, spis treści, wyszukiwarka).

Slajdy to same pliki statyczne (HTML, CSS, JS, fonty): nie potrzeba bazy, PHP, Node ani
Dockera. PHP jest potrzebne tylko do zgłaszania sugestii. Strona nie pobiera niczego z zewnętrznych serwerów.

**Podgląd:** https://pio3m.github.io/kurs-ai-engineer-prework/?m=module-0

## Jak to działa

```
index.html          strona i logika
assets/             Reveal.js, fonty, logo (nie ruszać)
slajdy/
  moduly.json       lista modułów na stronie startowej
  module-0.md       slajdy modułu (plik z narzędzia)
```

Prezentacja czyta plik `.md` o nazwie podanej w adresie: `?m=module-0` otwiera `slajdy/module-0.md`.

## Dodanie lub podmiana modułu

1. Pobierz Markdown z narzędzia (przycisk „Pobierz Markdown”).
2. Wgraj go do folderu `slajdy/` jako np. `module-0.md`. Plik o tej samej nazwie zostanie nadpisany.
3. Nowy moduł dopisz do `slajdy/moduly.json`:

   ```json
   [
     { "plik": "module-0.md", "tytul": "Moduł 0: Prework" },
     { "plik": "module-1.md", "tytul": "Moduł 1: Pierwsze wywołanie LLM API" }
   ]
   ```

   Kolejność w pliku to kolejność na liście. Opcjonalne pole `"etykieta"` zmienia znaczek
   modułu. Pilnuj przecinków między pozycjami.
4. Poczekaj 1–2 minuty na przebudowę GitHub Pages i odśwież stronę (Ctrl+F5).

Nazwy plików: tylko litery, cyfry, `-`, `_` i `.`, bez spacji i polskich znaków.

## Adresy

| Co | Adres |
|---|---|
| Lista modułów | `https://pio3m.github.io/kurs-ai-engineer-prework/` |
| Moduł | `…/?m=module-0` |
| Konkretny slajd | `…/?m=module-0#/12` (numer od 0, adres zmienia się przy przewijaniu) |

Klawisze: strzałki zmieniają slajdy, `T` spis treści, `Ctrl+F` lub `/` wyszukiwarka,
`F` pełny ekran, `Esc` przegląd wszystkich slajdów.

## Lokalny test w Dockerze

Do sprawdzania plików Markdown i zgłoszeń sugestii. Potrzebny jest Docker Desktop.

```powershell
docker compose up -d
```

- Slajdy: http://localhost:8080/?m=module-0
- Panel zgłoszeń: http://localhost:8080/api/admin.php (lokalne hasło: `lokalnie`, zmienisz je
  zmienną `SLAJDY_ADMIN_PASSWORD`, np. w pliku `.env`)

Folder repo jest zamontowany do kontenera (PHP + Apache), więc po podmianie
`slajdy/module-0.md` wystarczy odświeżyć stronę (Ctrl+F5). Port jest dostępny tylko z tego
komputera.

Szybki test bez zmiany `moduly.json`: na stronie startowej http://localhost:8080/ użyj
przycisku „Wybierz plik Markdown”. W stopce są wtedy „Wczytaj inny plik” i „Usuń plik”.
Wgrany plik jest pamiętany tylko w tej karcie przeglądarki i nigdzie nie jest wysyłany.

```powershell
docker compose logs -f     # podgląd logów
docker compose down        # zatrzymanie (zgłoszenia zostają w wolumenie "dane")
```

## Zgłaszanie sugestii do slajdów

Przycisk **„Zgłoś sugestię”** w stopce zapisuje: kto, kiedy, treść, moduł, numer i tytuł
slajdu oraz stały klucz slajdu z pliku `.md`. Prowadzący w `api/admin.php` widzi listę,
zmienia status (nowe / zrobione / odrzucone), usuwa i eksportuje CSV. Link przy zgłoszeniu
otwiera właściwy slajd po kluczu, także gdy numeracja się zmieniła.

**Wymaga hostingu z PHP 7.4+ i SQLite.** Przycisk pokazuje się tylko tam, gdzie działa
`api/suggest.php`.

Wdrożenie:

1. Wgraj cały folder na hosting.
2. Skopiuj `api/config.sample.php` jako `api/config.php` i ustaw mocne hasło.
3. Ustaw w `config.php` ścieżkę bazy poza `public_html` (na nginx to konieczne, bo
   `.htaccess` nie działa). Domyślnie baza powstaje w `api/data/` i zamyka ją `.htaccess`.
4. Panel otwieraj przez HTTPS.

Ograniczenia: bez logowania imię jest tylko deklaracją; limit to 10 zgłoszeń na 10 minut
z jednego adresu IP (grupa za jednym łączem dzieli ten limit).

### Test na GitHub Pages

GitHub Pages nie uruchamia PHP, więc normalnie przycisku tam nie ma. Adres z `&demo=1`
włącza **tryb testowy**: formularz działa, ale zapis zostaje tylko w Twojej przeglądarce:

https://pio3m.github.io/kurs-ai-engineer-prework/?m=module-0&demo=1

## Osadzenie na stronie (WordPress i inne)

Na stronie lub we wpisie dodaj blok „Własny HTML”:

```html
<iframe src="https://pio3m.github.io/kurs-ai-engineer-prework/?m=module-0"
        style="width:100%;aspect-ratio:16/9;border:0;" allowfullscreen></iframe>
```

Działa tak samo w każdym kreatorze stron, który pozwala wkleić HTML. Jeśli slajd ma być
widoczny bez przewijania, ustaw szerokość kontenera na co najmniej 960 px.

## Własny hosting zamiast GitHub Pages

Wgraj cały folder (razem z ukrytym `.htaccess`) przez FTP/SFTP na dowolny hosting, także
obok WordPressa, np. do `public_html/kurs/`. Adres to wtedy `https://twoja-domena.pl/kurs/`.
Nginx ignoruje `.htaccess`, strona i tak działa.

## PDF

Przycisk **„Pobierz PDF”** w stopce otwiera prezentację w trybie wydruku w nowej karcie
i sam pokazuje okno drukowania (poczekaj, aż się wczyta). W Chrome lub Edge ustaw:

- Miejsce docelowe: **Zapisz jako PDF**
- Marginesy: **Brak**
- **Grafika w tle**: zaznaczona

Jeden slajd to jedna strona 16:9. Slajd za wysoki na stronę (zwykle długi kod) jest
zmniejszany, aż zmieści się w całości nad stopką. Przycisk działa też dla pliku wybranego
z dysku. Jeśli przeglądarka zablokuje nową kartę, zezwól na wyskakujące okna dla tej strony.

Ręcznie: otwórz `…/?m=module-0&print-pdf`, potem Ctrl+P.

## Podgląd bez serwera

Otwarcie `index.html` z dysku pokaże komunikat, bo przeglądarka nie pozwala wczytać
plików z dysku. Na stronie startowej jest przycisk „Wybierz plik Markdown”: wskazujesz
plik `.md` i od razu widzisz prezentację. Przydaje się do sprawdzenia pliku przed wgraniem.

## Dostęp

GitHub Pages z publicznego repozytorium jest widoczny dla wszystkich, razem z plikami `.md`.
Do darmowych treści (prework) to wystarcza. Płatne moduły wymagają hostingu z logowaniem.

## Gdy coś nie działa

- **„Nie mogę wczytać pliku … (HTTP 404)”**: plik ma inną nazwę niż w adresie lub w
  `moduly.json`, albo nie leży w `slajdy/`. Wielkość liter ma znaczenie.
- **„Nie mogę wczytać slajdy/moduly.json”**: brak pliku albo błąd w JSON (zwykle przecinek
  po ostatniej pozycji). Sprawdź na https://jsonlint.com.
- **Widzę starą wersję po podmianie**: Ctrl+F5, a przy wtyczce cache (LiteSpeed, WP Rocket,
  Cloudflare) wyczyść cache dla tego folderu.
- **Slajdy łamią się inaczej niż w narzędziu**: sprawdź, czy wgrany plik `.md` pochodzi
  z aktualnej wersji kursu, bo dzielenie długich slajdów („(cd.)”) jest zapisane w pliku.
