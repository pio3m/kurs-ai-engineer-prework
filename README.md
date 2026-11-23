# Kurs AI Engineer: przeglądarka slajdów (prework)

Statyczna strona, która wczytuje plik Markdown pobrany z narzędzia do tworzenia kursów
i pokazuje go jako prezentację Reveal.js, tak samo jak widzi ją kursant w narzędziu
(nagłówek, dwie kolumny, ramki kodu, spis treści, wyszukiwarka).

Same pliki statyczne (HTML, CSS, JS, fonty). Nie potrzeba bazy, PHP, Node ani Dockera,
a strona nie pobiera niczego z zewnętrznych serwerów.

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

Otwórz `…/?m=module-0&print-pdf` w Chrome lub Edge, poczekaj na wczytanie, potem Ctrl+P,
„Zapisz jako PDF”, układ poziomy, marginesy „Brak”, zaznacz „Grafika tła”.

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
