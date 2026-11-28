# Changelog

## 2026-11-27

### Dodane
- **Zgłaszanie sugestii do slajdów** (wymaga hostingu z PHP i SQLite): przycisk „Zgłoś
  sugestię” w stopce, zapis kto / kiedy / który slajd, panel `api/admin.php` ze statusami,
  usuwaniem i eksportem CSV. Link w panelu otwiera slajd po stałym kluczu.
- **Tryb testowy** `?demo=1` (np. na GitHub Pages): formularz działa, zapis zostaje tylko
  w przeglądarce.
- **Eksport do PDF:** przycisk „Pobierz PDF”. Za wysokie slajdy są zmniejszane, aż mieszczą
  się nad stopką.
- **Plik z dysku:** przyciski „Wczytaj inny plik” i „Usuń plik”.
- **Lokalny stack w Dockerze** (`docker compose up -d`, http://localhost:8080).

### Zmienione
- Docker używa PHP z Apache.
- README: lokalny test, PDF, zgłaszanie sugestii i wdrożenie.

## 2026-11-23

### Dodane
- Pierwsza wersja przeglądarki slajdów (Reveal.js, pliki statyczne) na GitHub Pages
  z modułem prework.
- README z instrukcją użycia i osadzania w WordPressie (zamiast `CZYTAJ-MNIE.md`).

### Zmienione
- Na liście modułów został tylko prework.
- Repo przemianowane na `kurs-ai-engineer-prework`.
