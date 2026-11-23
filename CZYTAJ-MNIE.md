# Slajdy kursu: instrukcja wdrożenia

Ten folder to gotowa strona ze slajdami. Same statyczne pliki (HTML, CSS, JS, fonty), więc
działa na każdym hostingu, także tym z WordPressem. Nie potrzeba bazy danych, PHP, Node ani
Dockera, a strona nie pobiera niczego z zewnętrznych serwerów.

## 1. Pierwsze wgranie

1. Rozpakuj `slajdy-kursu.zip`.
2. Wgraj **cały folder `slajdy-kursu`** (razem z ukrytym plikiem `.htaccess`) przez FTP/SFTP
   albo menedżer plików hostingu do katalogu strony, obok WordPressa, np.:

   ```
   public_html/
   ├── wp-admin/  wp-content/  wp-includes/  ...   (WordPress, bez zmian)
   └── slajdy-kursu/
       ├── index.html
       ├── .htaccess
       ├── assets/          (Reveal.js, fonty, logo: nie ruszać)
       └── slajdy/
           ├── moduly.json  (lista modułów na stronie startowej)
           └── module-0.md  (pliki ze slajdami)
   ```

3. Otwórz `https://twoja-domena.pl/slajdy-kursu/`. Zobaczysz listę modułów, kliknięcie otwiera
   prezentację. WordPress nie przeszkadza: jego reguły `.htaccess` przepuszczają istniejące
   pliki i foldery.

Nazwę folderu możesz zmienić (np. `kurs`), wtedy adres to `/kurs/`.

## 2. Dodanie albo podmiana modułu (to robisz za każdym razem)

Dostajesz ode mnie plik `.md` (np. `module-1.md`).

1. Wgraj go do `slajdy-kursu/slajdy/`. Jeśli plik o tej nazwie już tam jest, po prostu go nadpisz.
2. Tylko gdy to **nowy** moduł: dopisz go w `slajdy/moduly.json`, np.:

   ```json
   [
     { "plik": "module-0.md", "tytul": "Moduł 0: Prework" },
     { "plik": "module-1.md", "tytul": "Moduł 1: Pierwsze wywołanie LLM API" }
   ]
   ```

   Pilnuj przecinków między pozycjami i cudzysłowów. Kolejność w pliku = kolejność na liście.
   Opcjonalne pole `"etykieta"` zmienia znaczek modułu (domyślnie `module-0` to „Prework”,
   `module-1` to „Moduł 1”).

3. Odśwież stronę (najlepiej Ctrl+F5).

Nazwy plików: tylko litery, cyfry, `-`, `_` i `.`, bez spacji i polskich znaków.

## 3. Adresy

- Lista modułów: `/slajdy-kursu/`
- Konkretny moduł: `/slajdy-kursu/?m=module-1` (nazwa pliku bez `.md`)
- Konkretny slajd: `/slajdy-kursu/?m=module-1#/12` (numer slajdu od 0; adres zmienia się sam przy przewijaniu)

W prezentacji: strzałki zmieniają slajdy, `T` otwiera spis treści, `Ctrl+F` lub `/` wyszukiwarkę,
`F` pełny ekran, `Esc` widok wszystkich slajdów. Kliknięcie znaczka modułu w stopce wraca do listy.

## 4. Osadzenie w stronie WordPressa (opcjonalnie)

Na stronie lub we wpisie dodaj blok „Własny HTML” z:

```html
<iframe src="/slajdy-kursu/?m=module-1" style="width:100%;aspect-ratio:16/9;border:0;" allowfullscreen></iframe>
```

## 5. PDF (opcjonalnie)

Otwórz `/slajdy-kursu/?m=module-1&print-pdf` w Chrome lub Edge, poczekaj aż się wczyta, potem
Ctrl+P, „Zapisz jako PDF”, układ poziomy, marginesy „Brak”, zaznacz „Grafika tła”.

## 6. Podgląd bez serwera

Otwarcie `index.html` prosto z dysku pokaże komunikat, bo przeglądarka nie pozwala stronie
z dysku czytać innych plików. Na dole strony startowej jest przycisk „Wybierz plik Markdown”:
wskazujesz plik `.md` i od razu widzisz prezentację. Przydaje się, żeby sprawdzić plik przed wgraniem.

## Gdy coś nie działa

- **„Nie mogę wczytać slajdy/moduly.json”**: brak pliku albo błąd w JSON (zwykle przecinek
  za ostatnią pozycją). Wklej treść do https://jsonlint.com i popraw.
- **„Nie mogę wczytać pliku … (HTTP 404)”**: plik `.md` ma inną nazwę niż w adresie lub
  w `moduly.json`, albo nie leży w `slajdy/`. Na Linuksie wielkość liter ma znaczenie.
- **Widzę stary moduł po podmianie**: Ctrl+F5. Jeśli hosting ma wtyczkę cache (np. LiteSpeed
  Cache, WP Rocket, Cloudflare), wyłącz cache dla `/slajdy-kursu/` albo wyczyść go po podmianie.
- **Plik `.md` się pobiera zamiast pokazywać**: to normalne przy otwieraniu samego pliku,
  zawsze otwieraj adres folderu (`/slajdy-kursu/?m=…`).
- **Serwer to nginx, nie Apache**: `.htaccess` jest wtedy ignorowany, ale strona i tak działa.
