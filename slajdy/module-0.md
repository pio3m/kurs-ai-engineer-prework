# Moduł 0: Prework, przygotowanie środowiska i wyrównanie poziomu

Python AI i Automatyzacja · Prework: przygotowanie przed startem kursu

---

## Spis treści

1. Weryfikacja Środowiska Deweloperskiego i Docker Desktop Runtime
2. Typy, Kolekcje i Sterowanie Przepływem
3. Funkcje, Moduły i Wyjątki
4. Praca z Plikami i Danymi (pathlib, JSON, CSV, datetime)
5. Programowanie Obiektowe (OOP) i Type Hints
6. Generatory i Dekoratory
7. Testowanie Kodu w pytest
8. Protokoły HTTP, JSON REST API i Wprowadzenie do Asyncio
9. Weryfikacja Kont, Klucze API i Zabezpieczenie Sekretów
10. Sprawdź Swój Poziom - Zadania i Projekt (Prework Assessment)

---

# 1. Weryfikacja Środowiska Deweloperskiego i Docker Desktop Runtime

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-01" data-part="0" data-section-number="1" -->
## Dlaczego zaczynamy od przygotowania środowiska

Podczas wykonywania pierwszego ćwiczenia może utknąć na czymś, co w ogóle nie dotyczy pisania kodu. Wystarczy, że komputer nie rozpoznaje polecenia z instrukcji. Kiedy dopiero zaczynasz, trudno ocenić, czy to kwestia instalacji, czy może trzeba coś zmienić w ustawieniach. Szukanie odpowiedzi zajmuje czas, a prowadzący przechodzi już do kolejnego tematu.

To frustrujący początek, zwłaszcza gdy chcesz uczyć się programowania, a większość uwagi poświęcasz temu, żeby cokolwiek uruchomić. Przygotowaniu środowiska poświęcamy osobną sekcję. Dzięki temu podczas ćwiczeń będzie Ci łatwiej nadążać za materiałem.

**Znajdziesz tu instrukcje instalacji narzędzi potrzebnych w kursie.** Przy każdym poleceniu pokazujemy oczekiwany wynik, żeby można było od razu sprawdzić, czy dany krok się udał. Jeśli na Twoim ekranie pojawi się coś innego, pomocne mogą być rozwiązania najczęstszych problemów zebrane na końcu sekcji.

Wcześniejsza znajomość tych narzędzi nie jest potrzebna. Gdy w instrukcji pojawi się nowe pojęcie, wyjaśnimy, co oznacza i do czego będzie Ci potrzebne. Przejdź przez tę część we własnym tempie, warto już teraz sprawdzić, czy możesz uruchomić przykłady, z którymi będziemy później pracować.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-02" data-part="0" data-section-number="1" -->
## Co zbudujesz w kursie: Enterprise Document Assistant

Przez cały kurs budujesz jeden duży projekt: **Enterprise Document Assistant**. To backend AI, który:

- wczytuje dokumenty biznesowe, np. faktury i umowy, a następnie analizuje je przy pomocy modeli językowych (LLM),

- pozwala zadawać pytania o treść dokumentów przez interfejs konwersacyjny i otrzymywać odpowiedzi w czasie rzeczywistym.

Narzędzia, które zainstalujesz w preworku, to dokładnie te, na których ten projekt będzie działał. Przykłady w Module 0 (dokumenty `DOC-001`, umowy NDA, faktury) to zapowiedź tego, co później zbudujesz naprawdę.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-03" data-part="0" data-section-number="1" -->
## Jak czytać te slajdy

Elementy, które pojawiają się na slajdach:

- **Blok kodu** (szare tło, czcionka o stałej szerokości) to komenda lub kod do wpisania. Komendy wklejasz do terminala i zatwierdzasz klawiszem **Enter**.
- **Oznaczenia systemów:** Windows, macOS, Linux. Jeśli przy komendzie jest oznaczenie, wykonaj tylko wersję dla swojego systemu.
- **Oczekiwany wynik** to tekst, który powinien pojawić się w terminalu. **Numery wersji u Ciebie będą inne (zwykle nowsze)** i to jest w porządku. Liczy się to, że komenda zwraca wersję, a nie błąd.
- Linie zaczynające się od `#` w blokach komend to **komentarze**: nie musisz ich wpisywać.

Na końcu sekcji 0.1 jest **Dodatek: rozwiązywanie problemów**. Jeśli coś nie działa, zajrzyj tam, zanim zaczniesz szukać w internecie.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-04" data-part="0" data-section-number="1" -->
## Mapa narzędzi: co instalujemy i po co

| Narzędzie | Czym jest (w jednym zdaniu) | Kiedy w kursie |
|---|---|---|
| **Terminal** | Okno, w którym wydajesz komputerowi polecenia tekstowe | Cały czas |
| **VS Code** | Edytor, w którym piszesz kod | Cały czas |
| **Python 3.11+** | Język i program, który wykonuje Twój kod | Cały czas |
| **uv** | Menedżer pakietów i środowisk wirtualnych | Cały czas |
| **Git** | Zapisuje historię zmian w kodzie | Cały czas, CI/CD w Module 13 |
| **Docker** | Uruchamia gotowe usługi w izolowanych kontenerach | Moduł 7 (Qdrant), Moduł 13 (Compose) |

Instalujemy je w tej kolejności, każde kolejne narzędzie korzysta z poprzednich. Konta i klucze API (GitHub, OpenAI, Anthropic, Hugging Face, Azure) skonfigurujesz w sekcji 0.9.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-05" data-part="0" data-section-number="1" -->
## Czym jest terminal

**Terminal** (inaczej *wiersz poleceń*, *konsola*, ang. *command line*) to program, w którym zamiast klikać, **wpisujesz polecenia tekstowe**, a komputer odpowiada tekstem.

Wpisywanie poleceń zamiast klikania ma kilka praktycznych zalet.

- Terminal pozwala korzystać z narzędzi programistycznych, takich jak Python czy Git, za pomocą poleceń tekstowych.
- Polecenia możesz kopiować i uruchamiać ponownie bez przepisywania.
- Możesz też zautomatyzować wykonywanie poleceń, żeby nie uruchamiać każdego z osobna.
- W kursie podajemy konkretne komendy, dzięki czemu wykonasz te same czynności co prowadzący.

Terminal zawsze działa w określonym folderze na dysku, tak jak otwarte okno Eksploratora plików. Ten folder nazywamy **bieżącym katalogiem** (ang. *current directory*). Komendy działają właśnie w nim.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-06" data-part="0" data-section-number="1" -->
## Jak otworzyć terminal w Twoim systemie

- **Windows:** naciśnij klawisz **Windows**, wpisz `PowerShell` lub `Terminal` i naciśnij **Enter**. W Windows 11 otworzy się aplikacja *Terminal* z kartą PowerShell.

- **macOS:** naciśnij **Cmd + Spacja**, wpisz `Terminal` i naciśnij **Enter**.

- **Linux:** zwykle **Ctrl + Alt + T** albo znajdź aplikację *Terminal* w menu.

**Ważne dla Windows:** w całym kursie używamy **PowerShella**. Nie używaj starego *Wiersza polecenia* (`cmd`) ani *Git Bash* (zainstaluje się razem z Gitem). Każdy z nich ma trochę inną składnię i komendy ze slajdów mogą w nich nie działać. PowerShell jest też domyślnym terminalem w VS Code na Windows.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-07" data-part="0" data-section-number="1" -->
## Pięć komend w terminalu, które musisz znać

| Komenda | Co robi | Przykład |
|---|---|---|
| `pwd` | Pokazuje, w jakim folderze jesteś | `pwd` |
| `ls` | Wyświetla zawartość bieżącego folderu | `ls` |
| `mkdir` | Tworzy nowy folder | `mkdir test` |
| `cd` | Otwiera folder | `cd test` |
| `cd ..` | Wraca do folderu nadrzędnego | `cd ..` |

Te komendy działają tak samo w PowerShellu, na macOS i na Linuksie.

Dwie przydatne sztuczki:
- **Tab** podpowiada i uzupełnia nazwy folderów i plików: wpisz `cd te` i naciśnij Tab.
- **Strzałka w górę** przywołuje poprzednie komendy, nie musisz ich wpisywać od nowa.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-08" data-part="0" data-section-number="1" -->
## Ćwiczenie: pierwsze kroki w terminalu

Otwórz terminal i wykonaj po kolei:

```bash
# Gdzie jestem?
pwd

# Utwórz folder i wejdź do niego
mkdir cwiczenie-terminal
cd cwiczenie-terminal

# Sprawdź, że jesteś w środku
pwd

# Wróć poziom wyżej
cd ..
```

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-08" data-part="1" data-section-number="1" -->
## Ćwiczenie: pierwsze kroki w terminalu (cd.)

**Oczekiwany wynik** (przykład dla Windows, u Ciebie będzie inna nazwa użytkownika):

```text
Path
----
C:\Users\jan

Path
----
C:\Users\jan\cwiczenie-terminal
```

Na macOS i Linuksie zobaczysz ścieżki w stylu `/Users/jan` lub `/home/jan`. Unikaj w nazwach folderów spacji i polskich znaków: oszczędzi Ci to wielu problemów.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-09" data-part="0" data-section-number="1" -->
## PATH i błąd „command not found”

Gdy wpisujesz `python` albo `git`, terminal musi wiedzieć, **gdzie na dysku znajduje się ten program**. Szuka go w folderach zapisanych w zmiennej systemowej **PATH**: to po prostu lista folderów z programami.

Jeśli programu nie ma w żadnym z tych folderów, zobaczysz błąd:

```text
# Windows (PowerShell)
git : The term 'git' is not recognized as the name of a cmdlet, function, script file, or operable program.

# macOS / Linux
zsh: command not found: git
```

Ten błąd oznacza jedno z dwóch: program **nie jest zainstalowany** albo **nie został dodany do PATH**.

**Najważniejsza zasada tej sekcji:** po każdej instalacji **zamknij wszystkie okna terminala i otwórz nowe**. Terminal wczytuje PATH tylko przy starcie, więc stare okno nie „zobaczy” nowo zainstalowanego programu. To najczęstsza przyczyna „przecież zainstalowałem, a nie działa”.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-10" data-part="0" data-section-number="1" -->
## Edytor kodu: VS Code

**Edytor kodu** to program do pisania kodu. Działa jak notatnik, ale z kolorowaniem składni, podpowiedziami, wykrywaniem błędów i wbudowanym terminalem.

W kursie używamy **Visual Studio Code** (VS Code): jest darmowy, działa na każdym systemie i ma najlepsze wsparcie dla Pythona i narzędzi AI. Jeśli wolisz **PyCharm** (wersja Community lub Professional), też możesz go używać, ale instrukcje na slajdach pokazują VS Code.

**Instalacja:**

- **Windows:** pobierz instalator z `https://code.visualstudio.com`. W kreatorze zaznacz **„Add to PATH”** oraz **„Add 'Open with Code' action”**.

- **macOS:** pobierz plik `.zip` z tej samej strony, rozpakuj i przeciągnij **Visual Studio Code** do folderu **Aplikacje**. Następnie w VS Code naciśnij **Cmd + Shift + P**, wpisz `shell command` i wybierz **„Install 'code' command in PATH”**.

- **Linux:** pobierz paczkę `.deb` (Ubuntu/Debian) lub `.rpm` (Fedora) z tej samej strony i zainstaluj ją dwuklikiem.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-11" data-part="0" data-section-number="1" -->
## Konfiguracja VS Code i weryfikacja

**Krok 1: rozszerzenie Python.** 

W VS Code kliknij ikonę **Extensions** na lewym pasku (cztery kwadraty) lub naciśnij **Ctrl + Shift + X** (w macOS **Cmd + Shift + X**). Wyszukaj `Python` i zainstaluj rozszerzenie od **Microsoft**.

**Krok 2: wbudowany terminal.** 

Menu **Terminal → New Terminal** (lub **Ctrl + `**) otwiera terminal na dole okna, od razu w folderze projektu. Z tego terminala będziesz korzystać najczęściej.

**Krok 3: weryfikacja.** 

Zamknij i ponownie otwórz terminal, a następnie wpisz:

```bash
code --version
```

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-11" data-part="1" data-section-number="1" -->
## Konfiguracja VS Code i weryfikacja (cd.)

**Oczekiwany wynik** (pierwsza linia to numer wersji):

```text
1.144.0
2c33b50b16c472efe58357d1d2a8a5414bc23fbf
x64
```

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-12" data-part="0" data-section-number="1" -->
## Czym jest Python i interpreter

**Python** to język programowania: zestaw reguł, w których zapisujesz polecenia dla komputera. Plik z kodem Pythona ma rozszerzenie `.py`.

Sam plik `.py` to jednak zwykły tekst. Żeby go wykonać, potrzebny jest **interpreter**: program, który czyta Twój kod linijka po linijce i wykonuje go. Gdy mówimy „zainstaluj Pythona”, mamy na myśli właśnie instalację interpretera.

```text
plik hello.py  ──►  interpreter Pythona  ──►  wynik w terminalu
(Twój kod)          (program python)          Hello!
```

Python jest dziś standardem w AI: biblioteki do pracy z modelami językowymi (OpenAI, Anthropic, Hugging Face), bazami wektorowymi i API (FastAPI, Pydantic) powstają najpierw właśnie dla niego.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-13" data-part="0" data-section-number="1" -->
## Python 3.11+: którą wersję wybrać

**Minimalna wersja w kursie to Python 3.11.** Rekomendujemy **Python 3.13**.

Dlaczego co najmniej 3.11:
- **Szybkość:** CPython 3.11 jest średnio ok. 25% szybszy od 3.10 (na niektórych zadaniach nawet 60%).
- **Czytelniejsze błędy:** od 3.11 Python wskazuje znacznikiem `^^^^` dokładnie tę część linii, która spowodowała błąd.
- **Nowoczesna składnia typów:** zapis `list[str]` i `str | None`, którego używamy w całym kursie (poznasz go w sekcji 0.5).
- **asyncio:** `asyncio.TaskGroup` i nowsze mechanizmy, z których korzystają biblioteki AI.
- **Wsparcie bibliotek:** nowe wersje bibliotek AI stopniowo przestają wspierać starsze Pythony.

Jeśli masz już 3.11, 3.12 lub 3.13, nic nie zmieniaj. Najnowsza wersja (3.14 i nowsze) też zadziała, ale jeśli jakaś biblioteka nie da się zainstalować, wróć do 3.13. Jeśli masz 3.10 lub starszą, zainstaluj nowszą (obie mogą być zainstalowane jednocześnie).

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-14" data-part="0" data-section-number="1" -->
## Instalacja Pythona: Windows

**Sposób A (zalecany): winget.** 
Otwórz PowerShell i wpisz:

```powershell
winget install --id Python.Python.3.13 -e
```

Przy pierwszym użyciu `winget` może zapytać o zaakceptowanie warunków źródła: wpisz `Y` i naciśnij Enter.

**Sposób B: instalator ze strony.** 
Wejdź na `https://www.python.org/downloads/windows/`, pobierz **Windows installer (64-bit)** dla wersji 3.13 i uruchom go.

- **Na pierwszym ekranie instalatora zaznacz pole „Add python.exe to PATH”.** To najczęstszy błąd przy instalacji Pythona na Windows. Bez tego pola komenda `python` nie zadziała w terminalu.

Po instalacji **zamknij i otwórz ponownie terminal**.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-15" data-part="0" data-section-number="1" -->
## Instalacja Pythona: macOS i Linux

**macOS:** wejdź na `https://www.python.org/downloads/macos/`, pobierz **macOS 64-bit universal2 installer** dla wersji 3.13 i przejdź przez kreator. Jeśli używasz Homebrew, możesz zamiast tego wpisać:

```bash
brew install python@3.13
```

**Linux (Ubuntu/Debian):** Ubuntu 24.04 ma już Pythona 3.12, co wystarcza. Doinstaluj tylko moduł venv:

```bash
sudo apt update
sudo apt install -y python3 python3-venv
```

Na starszych dystrybucjach z Pythonem 3.10 lub niższym nie musisz samodzielnie aktualizować pakietów systemowych. W następnych krokach `uv` pobierze właściwą wersję Pythona za Ciebie (zobacz slajd o uv).

Po instalacji **zamknij i otwórz ponownie terminal**.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-16" data-part="0" data-section-number="1" -->
## Weryfikacja Pythona

Sprawdź wersję. Komenda różni się między systemami:

```bash
# Windows
python --version

# macOS / Linux (tu komenda nazywa się python3)
python3 --version
```

**Oczekiwany wynik:**

```text
Python 3.13.3
```

**Windows: kilka Pythonów naraz?** Sprawdź, które wersje są zainstalowane, launcherem `py`:

```powershell
py -0
```

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-16" data-part="1" data-section-number="1" -->
## Weryfikacja Pythona (cd.)

```text
 -V:3.13 *        Python 3.13 (64-bit)
 -V:3.12          Python 3.12 (64-bit)
```

Gwiazdka oznacza wersję domyślną. Dalej w kursie i tak nie będziesz wpisywać `python` „globalnie”: po utworzeniu środowiska wirtualnego (za kilka slajdów) `python` będzie zawsze wskazywać właściwą wersję.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-17" data-part="0" data-section-number="1" -->
## uv: ultraszybki menedżer pakietów i środowisk

**Pakiet** (biblioteka) to gotowy kod napisany przez innych, który instalujesz zamiast pisać wszystko samemu. Na przykład `pytest` służy do testów, a `httpx` do wysyłania zapytań HTTP. Pakiety pobiera się z publicznego katalogu **PyPI**.

**uv** to nowoczesne narzędzie do instalowania pakietów i tworzenia środowisk wirtualnych. Jest napisane w języku Rust i robi to samo co wbudowane `pip` i `venv`, ale dziesiątki razy szybciej.

W kursie używamy `uv`, ponieważ:
- **tworzy środowisko wirtualne** jedną komendą (`uv venv`),
- **instaluje pakiety** bardzo szybko dzięki równoległemu pobieraniu i pamięci podręcznej,
- **potrafi sam pobrać właściwą wersję Pythona**, jeśli w systemie jej brakuje,
- **zarządza zależnościami** projektu przez plik `pyproject.toml` (pokażemy to pod koniec tej sekcji: `uv init` i `uv add`).

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-18" data-part="0" data-section-number="1" -->
## Instalacja i weryfikacja uv

Zainstaluj `uv` za pomocą oficjalnego instalatora. Nie używaj `pip install uv`: zainstalowałoby to uv do globalnego Pythona i mogłoby powodować problemy ze zmienną PATH.

```bash
# Windows (PowerShell)
powershell -ExecutionPolicy ByPass -c "irm https://astral.sh/uv/install.ps1 | iex"

# macOS / Linux
curl -LsSf https://astral.sh/uv/install.sh | sh
```

Alternatywnie: **Windows** `winget install --id astral-sh.uv -e`, **macOS** `brew install uv`.

**Zamknij i otwórz ponownie terminal**, a następnie sprawdź instalację:

```bash
uv --version
```

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-18" data-part="1" data-section-number="1" -->
## Instalacja i weryfikacja uv (cd.)

**Oczekiwany wynik:**

```text
uv 0.8.22 (ade2bdbd2 2025-09-23)
```

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-19" data-part="0" data-section-number="1" -->
## Czym jest Git i system kontroli wersji

**Git** to **system kontroli wersji** (ang. *version control system*): narzędzie, które zapamiętuje historię zmian w plikach projektu.

Działa jak „zapisz grę” w grach komputerowych:
- **Repozytorium** (ang. *repository*, w skrócie *repo*) to folder projektu, którego historię śledzi Git.
- **Commit** to zapisany stan projektu w danym momencie, z opisem, co się zmieniło. Do każdego commita możesz wrócić.
- Dzięki temu możesz śmiało eksperymentować: jeśli coś zepsujesz, cofasz się do ostatniego działającego stanu.

**Git a GitHub:** Git to program na Twoim komputerze. **GitHub** to serwis internetowy, na którym przechowujesz kopie repozytoriów i współpracujesz z innymi. Konto GitHub założysz w sekcji 0.9. W Module 13 użyjesz go do automatycznego wdrażania (CI/CD) przez GitHub Actions.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-20" data-part="0" data-section-number="1" -->
## Instalacja Gita

- **Windows:** w PowerShellu wpisz



```powershell
winget install --id Git.Git -e
```



albo pobierz instalator z `https://git-scm.com/download/win`. W kreatorze możesz zostawić domyślne opcje. Jedyna zmiana, którą polecamy: na ekranie **„Choosing the default editor used by Git”** wybierz **Visual Studio Code**.









- **macOS:** wpisz w terminalu `git --version`. Jeśli Gita nie ma, system sam zaproponuje instalację **Command Line Developer Tools**: kliknij **Zainstaluj**. Możesz też użyć `brew install git`.

- **Linux (Ubuntu/Debian):**

```bash
sudo apt install -y git
```

Po instalacji **zamknij i otwórz ponownie terminal**.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-21" data-part="0" data-section-number="1" -->
## Konfiguracja i weryfikacja Gita

Git podpisuje każdy commit Twoim imieniem i adresem e-mail. **Bez tej konfiguracji pierwszy commit zakończy się błędem.** Ustaw je raz, globalnie (podaj swoje dane; e-mail najlepiej ten sam, którego użyjesz na GitHubie):

```bash
git config --global user.name "Jan Kowalski"
git config --global user.email "jan.kowalski@example.com"
git config --global init.defaultBranch main
```

Trzecia linia sprawia, że nowe repozytoria mają główną gałąź o nazwie `main` (dzisiejszy standard, używany też na GitHubie).

Weryfikacja:

```bash
git --version
git config --global --list
```

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-21" data-part="1" data-section-number="1" -->
## Konfiguracja i weryfikacja Gita (cd.)

**Oczekiwany wynik:**

```text
git version 2.49.0.windows.1
user.name=Jan Kowalski
user.email=jan.kowalski@example.com
init.defaultbranch=main
```

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-22" data-part="0" data-section-number="1" -->
## Problem „u mnie działa” i czym jest kontener

Aplikacja może działać na Twoim komputerze, a na innym zgłaszać błędy. Przyczyną bywają różnice w zainstalowanych bibliotekach lub ustawieniach.

**Kontener** (ang. *container*) pozwala uruchomić program z potrzebnymi bibliotekami i konfiguracją, w odizolowanym środowisku. Dzięki temu łatwiej zachować te same warunki działania na różnych komputerach.


Kontener z bazą danych pozwala uruchomić ją w takim samym środowisku na Windowsie, macOS, Linuksie oraz na serwerze w chmurze. Dzięki temu różnice między systemami mają mniejszy wpływ na jej działanie.

Bazę danych uruchamiasz w kontenerze, zamiast instalować ją bezpośrednio na swoim komputerze. Wystarczy jedna komenda. Gdy kontener przestanie być potrzebny, możesz go usunąć.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-23" data-part="0" data-section-number="1" -->
## Obraz a kontener

W Dockerze są dwa kluczowe pojęcia:

- **Obraz** (ang. *image*) to szablon tylko do odczytu: „przepis” zawierający program i wszystko, czego potrzebuje. Obrazy pobiera się z publicznego katalogu **Docker Hub** (np. obraz bazy `qdrant/qdrant`).
- **Kontener** (ang. *container*) to **uruchomiona instancja obrazu**: działający proces stworzony według przepisu.

Analogia: obraz to **przepis na ciasto**, kontener to **upieczone ciasto**. Z jednego przepisu możesz upiec wiele ciast, a przepis się przy tym nie zmienia. Z jednego obrazu możesz uruchomić wiele kontenerów.

Kontener działa tak długo, jak działa jego główny program. Testowy `hello-world` wypisuje komunikat i od razu się kończy. Baza danych Qdrant w Module 7 będzie działać, dopóki jej nie zatrzymasz.

(W sekcji 0.5 poznasz klasy i obiekty w Pythonie: relacja obraz → kontener jest bardzo podobna do relacji klasa → obiekt.)

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-24" data-part="0" data-section-number="1" -->
## Docker Engine, Docker Desktop i rola Dockera w kursie

**Docker Engine** to silnik: program działający w tle (tzw. *daemon*), który pobiera obrazy i uruchamia kontenery. Komenda `docker` w terminalu tylko wysyła do niego polecenia.

**Docker Desktop** to aplikacja na Windows i macOS. Zawiera Docker Engine wraz z interfejsem graficznym. Udostępnia też narzędzia pomocnicze, w tym Docker Compose. Na Linuksie instaluje się zwykle sam Docker Engine.

| Moduł | Zastosowanie Dockera |
|---|---|
| **Moduł 7** | Baza wektorowa **Qdrant** uruchomiona jako kontener |
| **Moduł 13** | Uruchamianie wielu usług naraz przy użyciu **Docker Compose** |

Pierwsze kontenery pojawią się w Module 7, ale Dockera instalujesz już teraz, ponieważ ten etap może sprawiać problemy. Lepiej rozwiązać je spokojnie podczas preworku niż na początku intensywnego modułu o bazach wektorowych.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-25" data-part="0" data-section-number="1" -->
## Docker: wymagania przed instalacją

**Pamięć:** minimum **8 GB RAM**, zalecane 16 GB. Docker Desktop rezerwuje część pamięci na środowisko wirtualne, w którym uruchamia kontenery.

**Licencja:** Docker Desktop jest **bezpłatny do użytku prywatnego i edukacyjnego**. Bez opłat mogą z niego korzystać również **małe firmy** (poniżej 250 pracowników i poniżej 10 mln USD rocznego przychodu). Jeśli instalujesz go na **służbowym laptopie dużej firmy**, zapytaj dział IT: firma może potrzebować płatnej licencji albo blokować instalację.

- **Windows:** Windows 10 (22H2) lub 11, 64-bit, w tym wersja **Home**. Wymagana jest włączona **wirtualizacja** w procesorze. Sprawdź to: **Ctrl + Shift + Esc** → zakładka **Wydajność** → **Procesor (CPU)** → pole **Wirtualizacja: Włączone**. Jeśli widzisz *Wyłączone*, zajrzyj do Dodatku na końcu sekcji.

- **macOS:** jedna z trzech najnowszych wersji macOS. Sprawdź, jaki masz procesor: menu  → **Ten Mac** → pole **Układ scalony / Chip** (*Apple M1/M2/M3…* to **Apple Silicon**) lub **Procesor** (*Intel*). Od tego zależy, który instalator pobierzesz.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-26" data-part="0" data-section-number="1" -->
## Instalacja Dockera: Windows

Docker Desktop na Windows działa na **WSL 2** (Windows Subsystem for Linux): to wbudowany w Windows lekki Linux, w którym działają kontenery.

**Krok 1: WSL 2.** Otwórz PowerShell **jako administrator** (prawy przycisk na ikonie → *Uruchom jako administrator*) i wpisz:

```powershell
wsl --install
```

Po zakończeniu **uruchom komputer ponownie**. Jeśli WSL był już zainstalowany, zamiast tego wpisz `wsl --update`.

**Krok 2: Docker Desktop.** Pobierz instalator ze strony `https://www.docker.com/products/docker-desktop/` (**Download for Windows (AMD64)**; dla laptopów z procesorem ARM, np. Snapdragon, wybierz ARM64). Uruchom go i zostaw zaznaczoną opcję **„Use WSL 2 instead of Hyper-V”**. Po instalacji może być wymagany kolejny restart.

**Krok 3: pierwsze uruchomienie.** Otwórz **Docker Desktop** z menu Start. Zaakceptuj warunki licencji. **Logowanie i zakładanie konta Docker możesz pominąć** (*Skip*): do kursu nie jest potrzebne. Poczekaj, aż w lewym dolnym rogu okna pojawi się zielony status **Engine running**.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-27" data-part="0" data-section-number="1" -->
## Instalacja Dockera: macOS i Linux

- **macOS:** pobierz Docker Desktop ze strony `https://www.docker.com/products/docker-desktop/`, wybierając wersję **Apple Silicon** lub **Intel** (zgodnie z tym, co sprawdziłeś na poprzednim slajdzie). Otwórz plik `.dmg` i przeciągnij Dockera do folderu **Aplikacje**. Uruchom go, zaakceptuj licencję, **logowanie pomiń** i poczekaj na status **Engine running**.

- **Linux (Ubuntu/Debian):** zainstaluj Docker Engine oficjalnym skryptem, a potem dodaj swojego użytkownika do grupy `docker`, żeby nie wpisywać `sudo` przed każdą komendą:

```bash
curl -fsSL https://get.docker.com | sudo sh
sudo usermod -aG docker $USER
```

Po tych komendach **wyloguj się i zaloguj ponownie** (lub zrestartuj komputer): zmiana grupy działa dopiero w nowej sesji. Bez tego zobaczysz błąd `permission denied ... docker.sock`.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-28" data-part="0" data-section-number="1" -->
## Weryfikacja Dockera: trzy komendy

Upewnij się, że Docker Desktop jest uruchomiony (na Linuksie silnik startuje sam). Następnie w **nowym** terminalu:

```bash
docker --version
docker compose version
docker info
```

**Oczekiwany wynik:**

```text
Docker version 28.0.4, build b8034c0
Docker Compose version v2.34.0-desktop.1
Client:
 Version:    28.0.4
 ...
Server:
 Containers: 0
 ...
```

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-28" data-part="1" data-section-number="1" -->
## Weryfikacja Dockera: trzy komendy (cd.)

- `docker --version` sprawdza, czy komenda `docker` jest zainstalowana.
- `docker compose version` sprawdza Docker Compose (potrzebny w Module 13). Uwaga: piszemy `docker compose` ze **spacją**. W starszych poradnikach w internecie spotkasz `docker-compose` z myślnikiem: to wycofana wersja, nie używaj jej.
- `docker info` sprawdza, czy **silnik działa**. Jeśli w wyniku jest sekcja `Server:` bez błędów, wszystko jest w porządku.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-29" data-part="0" data-section-number="1" -->
## Jak działa docker run: pobranie obrazu i uruchomienie kontenera

Komenda `docker run <nazwa-obrazu>` automatycznie wykonuje trzy kroki:

1. **Sprawdza lokalną pamięć podręczną:** czy obraz jest już pobrany na dysk.
2. **Pobiera obraz z Docker Hub,** jeśli go nie ma lokalnie. Docker Hub to domyślny, publiczny katalog obrazów.
3. **Uruchamia kontener** na podstawie obrazu. Gdy program wewnątrz kontenera kończy pracę, kontener się zatrzymuje.

Dodamy też flagę `--rm`. Oznacza ona: **usuń kontener automatycznie, gdy się zakończy**. Bez niej każde uruchomienie zostawia na dysku zatrzymany kontener, który później widać w Docker Desktop jako „śmieć” do posprzątania.

Obraz `hello-world` jest celowo maleńki (kilkanaście kilobajtów). Jego jedynym zadaniem jest potwierdzenie, że cały łańcuch działa: komenda `docker` → silnik → pobranie obrazu z internetu → uruchomienie kontenera.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-30" data-part="0" data-section-number="1" -->
## Uruchomienie hello-world i interpretacja wyniku

Uruchom w terminalu:

```bash
docker run --rm hello-world
```

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-30" data-part="1" data-section-number="1" -->
## Uruchomienie hello-world i interpretacja wyniku (cd.)

**Oczekiwany wynik** (fragment):

```text
Unable to find image 'hello-world:latest' locally
latest: Pulling from library/hello-world
Status: Downloaded newer image for hello-world:latest

Hello from Docker!
This message shows that your installation appears to be working correctly.

To generate this message, Docker took the following steps:
 1. The Docker client contacted the Docker daemon.
 2. The Docker daemon pulled the "hello-world" image from the Docker Hub.
 3. The Docker daemon created a new container from that image which runs the
    executable that produces the output you are currently reading.
 4. The Docker daemon streamed that output to the Docker client, which sent it
    to your terminal.
```

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-30" data-part="2" data-section-number="1" -->
## Uruchomienie hello-world i interpretacja wyniku (cd.)

Pierwsza linia **`Unable to find image ... locally` to nie jest błąd**: Docker informuje tylko, że nie ma obrazu na dysku i za chwilę go pobierze. Gdy uruchomisz komendę drugi raz, tej linii już nie będzie, bo obraz jest w pamięci podręcznej.

Jeśli zamiast `Hello from Docker!` widzisz błąd, przejdź do Dodatku na końcu sekcji.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-31" data-part="0" data-section-number="1" -->
## Folder projektu preworku

Wszystkie ćwiczenia z Modułu 0 wykonasz w jednym folderze. Utwórz go i otwórz w VS Code:

```bash
# Przejdź do folderu domowego
cd ~

# Utwórz folder na kurs i projekt preworku
mkdir kurs-ai
cd kurs-ai
mkdir prework
cd prework

# Otwórz bieżący folder w VS Code (kropka = "ten folder")
code .
```

Jeśli VS Code zapyta **„Do you trust the authors of the files in this folder?”**, kliknij **Yes, I trust the authors**: to Twój własny folder.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-31" data-part="1" data-section-number="1" -->
## Folder projektu preworku (cd.)

Od teraz pracuj w **terminalu wbudowanym w VS Code** (**Terminal → New Terminal**). Sprawdź komendą `pwd`, że jesteś w folderze `prework`.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-32" data-part="0" data-section-number="1" -->
## Czym jest środowisko wirtualne i dlaczego izoluje zależności

**Środowisko wirtualne** (ang. *virtual environment*, w skrócie *venv*) to osobny folder w projekcie, w którym jest **własna kopia interpretera Pythona i własny zestaw zainstalowanych pakietów**. To zupełnie inne pojęcie niż kontener Dockera: venv dotyczy tylko pakietów Pythona.

Bez środowiska wirtualnego wszystkie pakiety lądują w jednym, wspólnym miejscu na dysku. Wyobraź sobie, że projekt A potrzebuje biblioteki w wersji 1.0, a projekt B w wersji 2.0. Bez izolacji jeden z projektów zawsze będzie miał złą wersję.

Dzięki środowisku wirtualnemu:
- każdy projekt ma **własne, niezależne** wersje pakietów,
- instalowanie pakietów dla jednego projektu nie psuje drugiego,
- możesz odtworzyć dokładnie to samo środowisko na innym komputerze na podstawie listy zależności,
- gdy coś się zepsuje, po prostu **usuwasz folder `.venv` i tworzysz go od nowa**.

Zasada w kursie: **każdy projekt ma własny `.venv`** i nigdy nie instalujesz pakietów „globalnie”.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-33" data-part="0" data-section-number="1" -->
## Tworzenie środowiska wirtualnego przy użyciu uv

Upewnij się, że terminal jest w folderze `prework`, i utwórz środowisko w podfolderze `.venv`:

```bash
uv venv .venv --python 3.13
```

**Oczekiwany wynik:**

```text
Using CPython 3.13.3 interpreter at: C:\Program Files\Python313\python.exe
Creating virtual environment at: .venv
Activate with: .venv\Scripts\activate
```

Na macOS i Linuksie ścieżka do interpretera i komenda aktywacji będą wyglądać inaczej (np. `source .venv/bin/activate`).

Opcja `--python 3.13` mówi uv, której wersji Pythona użyć. **Jeśli nie masz jej w systemie, uv sam ją pobierze**: to dobre koło ratunkowe, gdy instalacja Pythona sprawiała problemy. Możesz też podać `3.11` lub `3.12`.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-33" data-part="1" data-section-number="1" -->
## Tworzenie środowiska wirtualnego przy użyciu uv (cd.)

Zauważ, że nazwa folderu zaczyna się od kropki. Na macOS i Linuksie takie foldery są domyślnie ukryte (zobaczysz je komendą `ls -a`), ale VS Code pokazuje je normalnie.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-34" data-part="0" data-section-number="1" -->
## Aktywacja środowiska wirtualnego

**Aktywacja** sprawia, że w tym oknie terminala komenda `python` wskazuje na Pythona z `.venv`, a nie na systemowego. Komenda zależy od systemu:

```bash
# Windows (PowerShell)
.venv\Scripts\Activate.ps1

# macOS / Linux
source .venv/bin/activate
```

Po aktywacji na początku wiersza terminala pojawi się prefiks **`(.venv)`**: to sygnał, że środowisko jest aktywne.

```text
(.venv) PS C:\Users\jan\kurs-ai\prework>
```

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-34" data-part="1" data-section-number="1" -->
## Aktywacja środowiska wirtualnego (cd.)

Jeśli PowerShell zwróci błąd **„running scripts is disabled on this system”**, wpisz raz poniższą komendę i potwierdź `Y` (pozwala uruchamiać lokalne skrypty Twojego użytkownika):

```powershell
Set-ExecutionPolicy -Scope CurrentUser -ExecutionPolicy RemoteSigned
```

Aby wyjść ze środowiska, wpisz `deactivate`. Aktywacja dotyczy tylko bieżącego okna terminala: w nowym oknie trzeba ją powtórzyć. VS Code z rozszerzeniem Python zwykle robi to automatycznie.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-35" data-part="0" data-section-number="1" -->
## uv run: uruchamianie bez pamiętania o aktywacji

Aktywacja łatwo się „gubi”: otwierasz nowy terminal, zapominasz o niej i nagle pakiet „nie istnieje”. Dlatego `uv` ma komendę **`uv run`**: uruchamia program **zawsze w środowisku `.venv` z bieżącego folderu**, nawet bez aktywacji.

```bash
# Te dwie komendy robią to samo, ale pierwsza działa także bez aktywacji
uv run python --version
python --version   # zadziała poprawnie tylko po aktywacji .venv
```

**Oczekiwany wynik:**

```text
Python 3.13.3
```

W kursie będziemy pokazywać komendy w formie **`uv run ...`** (np. `uv run python skrypt.py`, `uv run pytest`). Jeśli wolisz aktywować środowisko i pisać po prostu `python skrypt.py`, to też jest poprawne.

**Wskazanie interpretera w VS Code:** naciśnij **Ctrl + Shift + P** (macOS: **Cmd + Shift + P**), wpisz `Python: Select Interpreter` i wybierz pozycję z `.venv`. Dzięki temu edytor podpowiada kod z pakietów zainstalowanych w projekcie.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-36" data-part="0" data-section-number="1" -->
## Instalacja pytest i python-dotenv przez uv pip install

W folderze `prework` zainstaluj dwa pakiety, które będą potrzebne w całym Module 0:

```bash
uv pip install pytest python-dotenv
```

- **pytest** to narzędzie do automatycznego testowania kodu. Poznasz go w sekcji 0.7 i użyjesz w zadaniach sprawdzających z sekcji 0.10.
- **python-dotenv** wczytuje ustawienia (np. klucze API) z pliku `.env`. Poznasz go w sekcji 0.9.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-36" data-part="1" data-section-number="1" -->
## Instalacja pytest i python-dotenv przez uv pip install (cd.)

**Oczekiwany wynik** (Windows; na macOS/Linux nie będzie pakietu `colorama`, a wersje mogą być nowsze):

```text
Resolved 7 packages in 5ms
Installed 7 packages in 91ms
 + colorama==0.4.6
 + iniconfig==2.3.1
 + packaging==26.3
 + pluggy==1.7.0
 + pygments==2.21.0
 + pytest==9.2.0
 + python-dotenv==1.2.4
```

Zainstalowało się więcej niż 2 pakiety, `pytest` potrzebuje do działania kilku innych bibliotek (tzw. **zależności**). uv pobrał je automatycznie.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-37" data-part="0" data-section-number="1" -->
## Weryfikacja zainstalowanych pakietów

Wyświetl listę pakietów w środowisku projektu:

```bash
uv pip list
```

**Oczekiwany wynik:**

```text
Package       Version
------------- -------
colorama      0.4.6
iniconfig     2.3.1
packaging     26.3
pluggy        1.7.0
pygments      2.21.0
pytest        9.2.0
python-dotenv 1.2.4
```

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-37" data-part="1" data-section-number="1" -->
## Weryfikacja zainstalowanych pakietów (cd.)

Na liście muszą być **`pytest`** i **`python-dotenv`**. Pakiety zainstalowały się do folderu `.venv` w projekcie `prework`, a nie do systemu. Inny projekt nie będzie ich widział, i o to właśnie chodzi.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="sec-1-new-f79bc822" data-part="0" data-section-number="1" -->
## Projekt z pyproject.toml: uv init i uv add

Do tej pory instalowałeś pakiety przez `uv pip install`. Projekt końcowy preworku (`task-python-ai-prework`) zakładasz jednak jako **projekt uv**: zależności zapisuje w nim plik `pyproject.toml`.

```bash
uv init przyjmowanie-dokumentow   # nowy folder z pyproject.toml, main.py, README.md i .gitignore
cd przyjmowanie-dokumentow
uv add python-dotenv pytest       # instaluje pakiety i dopisuje je do pyproject.toml i uv.lock
uv run pytest                     # uruchamia komendę w środowisku projektu
```

- **`pyproject.toml`** opisuje projekt: nazwę, wersję Pythona i listę zależności. W sekcji 0.7 dopiszesz do niego ustawienie `pythonpath` dla pytest.
- **`uv.lock`** zapisuje dokładne wersje wszystkich pakietów, więc każdy dostaje identyczne środowisko.
- Kto pobierze Twój projekt z GitHuba, odtworzy środowisko jedną komendą: **`uv sync`**.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-38" data-part="0" data-section-number="1" -->
## Pierwsze repozytorium Git i plik .gitignore

Zamień folder `prework` w repozytorium Git:

```bash
git init
```

```text
Initialized empty Git repository in C:/Users/jan/kurs-ai/prework/.git/
```

Nie każdy plik powinien trafić do historii. Folder `.venv` jest duży i da się go odtworzyć, a plik `.env` będzie zawierał **tajne klucze API** (sekcja 0.9). W VS Code utwórz plik o nazwie **`.gitignore`** (z kropką na początku) i wpisz do niego:

```text
.venv/
.env
__pycache__/
.pytest_cache/
```

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-38" data-part="1" data-section-number="1" -->
## Pierwsze repozytorium Git i plik .gitignore (cd.)

Git będzie od teraz całkowicie ignorował te pliki i foldery. Tworzymy `.gitignore` **zanim** pojawi się `.env`, żeby klucz API nigdy nie trafił do repozytorium przez przypadek.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-39" data-part="0" data-section-number="1" -->
## Pierwszy commit

Sprawdź stan repozytorium, dodaj pliki i zapisz pierwszy commit:

```bash
git status
git add .
git commit -m "Prework: konfiguracja projektu"
```

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-39" data-part="1" data-section-number="1" -->
## Pierwszy commit (cd.)

**Oczekiwany wynik:**

```text
On branch main

No commits yet

Untracked files:
  (use "git add <file>..." to include in what will be committed)
	.gitignore

[main (root-commit) f47ce34] Prework: konfiguracja projektu
 1 file changed, 4 insertions(+)
 create mode 100644 .gitignore
```

- `git status` pokazuje, co się zmieniło. Zauważ, że **nie ma na liście folderu `.venv`**: `.gitignore` działa.
- `git add .` wybiera wszystkie zmiany do zapisania (kropka = cały bieżący folder).
- `git commit -m "..."` zapisuje stan z opisem. Opis pisz tak, żeby za miesiąc było wiadomo, co zrobiłeś.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-39" data-part="2" data-section-number="1" -->
## Pierwszy commit (cd.)

Na Windows może pojawić się ostrzeżenie `LF will be replaced by CRLF`. To tylko informacja o formacie końca linii: możesz ją zignorować.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-40" data-part="0" data-section-number="1" -->
## Definition of Done, sekcja 0.1: checklista weryfikacyjna

Zanim przejdziesz do sekcji 0.2, sprawdź każdy punkt. Jeśli któryś nie jest spełniony, wróć do odpowiedniego slajdu lub do Dodatku.

- **Terminal:** umiesz go otworzyć i poruszać się komendami `pwd`, `ls`, `cd`, `mkdir`

- **VS Code:** `code --version` zwraca numer wersji, rozszerzenie Python jest zainstalowane

- **Python 3.11+:** `python --version` (macOS i Linux `python3 --version`) zwraca `Python 3.11.x` lub wyższy

- **uv:** `uv --version` zwraca numer wersji

- **Git:** `git --version` działa, a `git config --global --list` pokazuje Twoje `user.name` i `user.email`

- **Docker:** `docker --version`, `docker compose version` i `docker info` działają bez błędów

- **Docker hello-world:** `docker run --rm hello-world` wyświetla `Hello from Docker!`

- **Środowisko wirtualne:** w folderze `prework` istnieje `.venv`, a `uv run python --version` pokazuje 3.11+

- **Pakiety:** `uv pip list` pokazuje `pytest` i `python-dotenv`

- **Repozytorium:** `git log --oneline` pokazuje Twój pierwszy commit

Jeśli wszystkie punkty są spełnione, gratulacje! Masz gotowe, profesjonalne środowisko deweloperskie. Przejdźmy do fundamentów Pythona.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-41" data-part="0" data-section-number="1" -->
## Dodatek: rozwiązywanie problemów - Python i uv

• **`python` otwiera Microsoft Store albo nie wyświetla żadnego komunikatu (Windows).** Windows ma „skróty” udające Pythona. Wejdź w **Ustawienia → Aplikacje → Zaawansowane ustawienia aplikacji → Aliasy wykonywania aplikacji** i wyłącz przełączniki **python.exe** i **python3.exe**. Otwórz nowy terminal.

• **`python --version` pokazuje starą wersję.** Masz kilka Pythonów, a PATH wskazuje na starszy. Nie musisz tego naprawiać: w projekcie używasz `uv venv .venv --python 3.13` i `uv run`, które zawsze biorą właściwą wersję.

• **`The term 'python' is not recognized` (Windows).** Instalator nie dodał Pythona do PATH. Uruchom instalator ponownie, wybierz **Modify** → **Next** i zaznacz **„Add Python to environment variables”**, albo zainstaluj przez `winget` (slajd o instalacji na Windows).

• **`uv : The term 'uv' is not recognized` / `command not found: uv`.** Zamknij **wszystkie** okna terminala (w tym VS Code) i otwórz nowe. Jeśli nadal nie działa, zainstaluj uv przez `winget install --id astral-sh.uv -e` (Windows) lub `brew install uv` (macOS).

• **Pakiet „nie istnieje” (`ModuleNotFoundError: No module named 'pytest'`)**, mimo że go instalowałeś. Uruchamiasz Pythona spoza `.venv`. Upewnij się, że jesteś w folderze `prework` (`pwd`) i użyj `uv run ...`.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-42" data-part="0" data-section-number="1" -->
## Dodatek: rozwiązywanie problemów - Docker

• **Windows: `error during connect: ... open //./pipe/dockerDesktopLinuxEngine: The system cannot find the file specified.`**

• **macOS i Linux: `Cannot connect to the Docker daemon at unix:///var/run/docker.sock. Is the docker daemon running?`**
Silnik Dockera nie działa. Uruchom aplikację **Docker Desktop** i poczekaj na status **Engine running**. Na Linuksie: `sudo systemctl start docker`.

• **Linux: `permission denied while trying to connect to the Docker daemon socket`.** Twój użytkownik nie jest w grupie `docker` albo nie zalogowałeś się ponownie po `usermod`. Wyloguj się i zaloguj (lub zrestartuj komputer).

• **Windows: Docker Desktop: „Virtualization support not detected” / WSL nie startuje.** Wirtualizacja jest wyłączona w BIOS/UEFI. Zrestartuj komputer, wejdź do BIOS (zwykle klawisz **F2**, **F10**, **Del** lub **Esc** zaraz po włączeniu; zależy od producenta) i włącz opcję **Intel Virtualization Technology (VT-x)** lub **SVM Mode** (AMD). Zapisz i uruchom ponownie.

• **Windows: `WSL 2 installation is incomplete` / Docker prosi o aktualizację WSL.** W PowerShellu jako administrator: `wsl --update`, potem restart komputera.

• **Docker Desktop zawiesza się na „Starting…” przez wiele minut.** Zrestartuj komputer. Jeśli to nie pomaga: w Docker Desktop kliknij ikonę błędu (*Troubleshoot*) → **Restart Docker Desktop**. Antywirusy firm trzecich potrafią blokować Dockera: sprawdź, czy nie zgłaszają ostrzeżeń.

---

<!-- .slide: data-section-id="sec-1" data-slide-key="slide-1-43" data-part="0" data-section-number="1" -->
## Dodatek: rozwiązywanie problemów - Git i PowerShell

• **`Author identity unknown ... Please tell me who you are` przy `git commit`.** Nie skonfigurowałeś imienia i e-maila. Wykonaj komendy `git config --global user.name` i `user.email` ze slajdu o konfiguracji Gita.

• **`fatal: not a git repository`.** Jesteś w folderze, w którym nie wykonano `git init`. Sprawdź `pwd` i przejdź do folderu `prework`.

• **`git commit` otworzył dziwny edytor w terminalu (Vim).** Zapomniałeś o `-m "opis"`. Wyjdź, wpisując `:q!` i naciskając Enter, a potem powtórz commit z `-m`.

• **`.venv` pojawia się w `git status`.** Plik `.gitignore` ma złą nazwę (np. `gitignore.txt`) albo leży w innym folderze. Nazwa musi brzmieć dokładnie `.gitignore`, a plik musi leżeć w folderze `prework`.

• **Windows: `Activate.ps1 cannot be loaded because running scripts is disabled on this system`.** Wykonaj raz `Set-ExecutionPolicy -Scope CurrentUser -ExecutionPolicy RemoteSigned` i potwierdź `Y`. Możesz też w ogóle pominąć aktywację i używać `uv run`.

• **Korzystasz z Windowsa, ale komendy podane na slajdach nie działają.** Sprawdź, czy terminal to **PowerShell** (w wierszu widać `PS C:\...`), a nie `cmd` ani Git Bash.

---

# 2. Typy, Kolekcje i Sterowanie Przepływem

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-01" data-part="0" data-section-number="2" -->
## Pętla z append: punkt wyjścia

Wyobraź sobie, że chcesz zebrać identyfikatory wszystkich faktur z listy dokumentów. Klasyczne podejście wygląda tak:

```python
documents = [
    {"id": "DOC-1", "type": "invoice"},
    {"id": "DOC-2", "type": "contract"},
    {"id": "DOC-3", "type": "invoice"},
]

invoice_ids = []
for doc in documents:
    if doc["type"] == "invoice":
        invoice_ids.append(doc["id"])

print(invoice_ids)  # ['DOC-1', 'DOC-3']
```

To działa, ale wymaga trzech linii tylko po to, żeby przefiltrować i zebrać dane. W tej sekcji poznasz **list comprehension** i inne narzędzia, które skracają ten kod do jednej czytelnej linii.

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-01" data-part="1" data-section-number="2" -->
## Pętla z append: punkt wyjścia (cd.)

- `invoice_ids = []` tworzy pustą listę, do której będziemy dopisywać wyniki.
- `for doc in documents:` iteruje po każdym słowniku na liście.
- `if doc["type"] == "invoice":` filtruje tylko faktury.
- `invoice_ids.append(doc["id"])` dodaje identyfikator do listy wynikowej.

Taki wzorzec pojawia się w kodzie bardzo często. Za chwilę zobaczysz, jak zastąpić go krótszym zapisem.

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-02" data-part="0" data-section-number="2" -->
## Typy wbudowane: str, int, float, bool, None

Python ma pięć podstawowych typów wbudowanych, które używasz na co dzień:

| Typ | Przykład | Uwaga |
|---|---|---|
| `str` | `"faktura"` | tekst, niemutowalny |
| `int` | `42` | liczba całkowita |
| `float` | `1234.56` | liczba zmiennoprzecinkowa |
| `bool` | `True`, `False` | wartość logiczna |
| `None` | `None` | brak wartości |

**Mutowalność** (ang. *mutability*) to zdolność obiektu do zmiany po utworzeniu. Typ `str` jest niemutowalny: każda operacja na łańcuchu zwraca nowy obiekt zamiast modyfikować stary.

```python
kwota = "1 234,56"
kwota.replace(",", ".")   # zwraca nowy str, nie modyfikuje kwota
print(kwota)              # '1 234,56'  (bez zmian!)
```

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-02" data-part="1" data-section-number="2" -->
## Typy wbudowane: str, int, float, bool, None (cd.)

Typy kolekcji, takie jak `list` i `dict`, są już mutowalne i zachowują się inaczej.

- `kwota.replace(",", ".")` tworzy nowy łańcuch z zamienionymi przecinkami, ale nie przypisuje go z powrotem do `kwota`.
- `print(kwota)` nadal pokazuje oryginalną wartość, bo `str` jest niemutowalny.
- Aby zachować wynik, musisz napisać: `kwota = kwota.replace(",", ".")`.

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-03" data-part="0" data-section-number="2" -->
## Cztery kolekcje: list, tuple, dict, set

Python oferuje cztery wbudowane typy kolekcji. Każda ma inne przeznaczenie:

| Typ | Mutowalny | Kolejność | Unikalność | Dostęp po kluczu | Kiedy używać |
|---|---|---|---|---|---|
| `list` | tak | tak | nie | nie | lista dokumentów do przetworzenia |
| `tuple` | nie | tak | nie | nie | stałe dane (współrzędne, zwrot z funkcji) |
| `dict` | tak | tak (3.7+) | klucze | tak | dokument jako słownik pól |
| `set` | tak | nie | tak | nie | zbiór unikalnych tagów |

```python
doc_ids: list[str] = ["DOC-1", "DOC-2", "DOC-3"]
coords: tuple[int, int] = (10, 20)
meta: dict[str, str] = {"id": "DOC-1", "type": "invoice"}
tags: set[str] = {"pilne", "ksiegowosc", "pilne"}  # duplikat ignorowany

print(tags)  # {'pilne', 'ksiegowosc'}
```

- `list[str]` to adnotacja typu: lista zawierająca łańcuchy tekstowe (Python 3.9+).

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-03" data-part="1" data-section-number="2" -->
## Cztery kolekcje: list, tuple, dict, set (cd.)

- `tuple[int, int]` informuje, że krotka ma dokładnie dwa elementy całkowite.
- `dict[str, str]` to słownik z kluczami i wartościami będącymi łańcuchami.
- `{"pilne", "ksiegowosc", "pilne"}` tworzy `set`, który automatycznie usuwa duplikat `"pilne"`.

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-04" data-part="0" data-section-number="2" -->
## Indeksowanie, slicing i bezpieczny odczyt ze słownika

Dostęp do elementów kolekcji możesz uzyskać przez **indeks** (numer pozycji, od zera) lub wycinek (ang. *slice*):

```python
doc_ids = ["DOC-1", "DOC-2", "DOC-3", "DOC-4"]

print(doc_ids[0])    # 'DOC-1'  (pierwszy element)
print(doc_ids[-1])   # 'DOC-4'  (ostatni element)
print(doc_ids[1:3])  # ['DOC-2', 'DOC-3']  (wycinek: od 1 do 3, bez 3)

# Bezpieczny odczyt ze słownika: dict.get
meta = {"id": "DOC-1", "type": "invoice"}
print(meta["type"])         # 'invoice'
print(meta["amount"])       # KeyError!
print(meta.get("amount"))   # None  (brak wyjątku)
print(meta.get("amount", 0.0))  # 0.0  (wartość domyślna)
```

**`dict.get(klucz, domyślna)`** to bezpieczna alternatywa dla `dict[klucz]`, gdy klucz może nie istnieć.

- `doc_ids[1:3]` zwraca nową listę z elementami o indeksach 1 i 2 (indeks 3 jest wykluczony).

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-04" data-part="1" data-section-number="2" -->
## Indeksowanie, slicing i bezpieczny odczyt ze słownika (cd.)

- `meta["amount"]` zgłasza `KeyError`, bo klucz `"amount"` nie istnieje w słowniku.
- `meta.get("amount")` zwraca `None` zamiast rzucać wyjątek.
- `meta.get("amount", 0.0)` zwraca `0.0`, jeśli klucz nie istnieje: wygodne przy operacjach numerycznych.

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-05" data-part="0" data-section-number="2" -->
## Pętle for z enumerate i zip

Dwie funkcje wbudowane sprawiają, że pętle stają się czytelniejsze:

- **`enumerate(iterable)`** dołącza do każdego elementu jego numer porządkowy.
- **`zip(a, b)`** łączy dwie sekwencje parami, element po elemencie.

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-05" data-part="1" data-section-number="2" -->
## Pętle for z enumerate i zip (cd.)

```python
doc_ids = ["DOC-1", "DOC-2", "DOC-3"]
statuses = ["PENDING", "PROCESSED", "ERROR"]

# enumerate: indeks + element
for i, doc_id in enumerate(doc_ids, start=1):
    print(f"{i}. {doc_id}")
# 1. DOC-1
# 2. DOC-2
# 3. DOC-3

# zip: łączenie dwóch list w pary
for doc_id, status in zip(doc_ids, statuses):
    print(f"{doc_id}: {status}")
# DOC-1: PENDING
# DOC-2: PROCESSED
# DOC-3: ERROR
```

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-05" data-part="2" data-section-number="2" -->
## Pętle for z enumerate i zip (cd.)

- `enumerate(doc_ids, start=1)` generuje pary `(1, 'DOC-1')`, `(2, 'DOC-2')` itd. Parametr `start=1` ustawia licznik od 1 zamiast 0.
- `for i, doc_id in enumerate(...)` rozpakowuje każdą parę na dwie zmienne.
- `zip(doc_ids, statuses)` generuje pary `('DOC-1', 'PENDING')`, `('DOC-2', 'PROCESSED')` itd. Zatrzymuje się na krótszej liście.

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-06" data-part="0" data-section-number="2" -->
## List comprehension: zwięzła alternatywa dla pętli z append

**List comprehension** (ang. *list comprehension*, dosłownie: składanie listy) to zwięzły zapis tworzenia listy na podstawie innej sekwencji. Zastępuje pętlę `for` z `append` jedną linią.

**Schemat:**
```
[wyrażenie for element in sekwencja if warunek]
```
- `wyrażenie` to wartość, która trafi do nowej listy.
- `if warunek` jest opcjonalny: pomija elementy niespełniające warunku.

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-06" data-part="1" data-section-number="2" -->
## List comprehension: zwięzła alternatywa dla pętli z append (cd.)

```python
documents = [
    {"id": "DOC-1", "type": "invoice"},
    {"id": "DOC-2", "type": "contract"},
    {"id": "DOC-3", "type": "invoice"},
]

# pętla z append (poprzedni slajd)
invoice_ids_loop = []
for doc in documents:
    if doc["type"] == "invoice":
        invoice_ids_loop.append(doc["id"])

# list comprehension (równoważny zapis)
invoice_ids = [doc["id"] for doc in documents if doc["type"] == "invoice"]

print(invoice_ids)  # ['DOC-1', 'DOC-3']
```

Oba zapisy dają ten sam wynik. Comprehension jest czytelniejszy, gdy mieści się w jednej linii.

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-06" data-part="2" data-section-number="2" -->
## List comprehension: zwięzła alternatywa dla pętli z append (cd.)

- `doc["id"]` to wyrażenie: wartość, która trafi do nowej listy.
- `for doc in documents` iteruje po każdym słowniku.
- `if doc["type"] == "invoice"` filtruje: do listy trafiają tylko faktury.
- Wynik to nowa lista `['DOC-1', 'DOC-3']`; oryginalna lista `documents` pozostaje niezmieniona.

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-07" data-part="0" data-section-number="2" -->
## Dict comprehension: budowanie słownika w jednej linii

**Dict comprehension** (ang. *dict comprehension*) działa tak samo jak list comprehension, ale zamiast listy tworzy słownik. Podajesz pary klucz-wartość oddzielone dwukropkiem.

**Schemat:**
```
{klucz: wartość for element in sekwencja if warunek}
```

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-07" data-part="1" data-section-number="2" -->
## Dict comprehension: budowanie słownika w jednej linii (cd.)

```python
documents = [
    {"id": "DOC-1", "type": "invoice"},
    {"id": "DOC-2", "type": "contract"},
    {"id": "DOC-3", "type": "invoice"},
]

# słownik: id dokumentu -> jego typ
type_by_id = {doc["id"]: doc["type"] for doc in documents}
print(type_by_id)
# {'DOC-1': 'invoice', 'DOC-2': 'contract', 'DOC-3': 'invoice'}

# zbiór unikalnych tagów (set comprehension)
all_tags = {
    tag
    for doc in documents
    for tag in doc.get("tags", [])
}
```

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-07" data-part="2" data-section-number="2" -->
## Dict comprehension: budowanie słownika w jednej linii (cd.)

> **Dobra praktyka:** gdy comprehension przekracza ok. 80 znaków, podziel go na kilka linii jak w przykładzie `all_tags`. Czytelność ważniejsza niż zwięzłość.

- `doc["id"]: doc["type"]` to para klucz-wartość: identyfikator dokumentu staje się kluczem, a typ dokumentu wartością.
- `for doc in documents` iteruje po każdym słowniku na liście.
- Zapis `{wyrażenie for ...}` (bez dwukropka) to **set comprehension**, tworzący zbiór unikalnych wartości.
- `doc.get("tags", [])` zwraca listę tagów lub pustą listę, jeśli klucz nie istnieje, co zapobiega `KeyError`.

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-08" data-part="0" data-section-number="2" -->
## F-stringi i formatowanie liczb

**F-string** (ang. *f-string*, skrót od *formatted string literal*) to wygodny sposób wstawiania wartości zmiennych do tekstu. Poprzedź łańcuch literą `f` i umieść wyrażenia w nawiasach klamrowych `{}`.

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-08" data-part="1" data-section-number="2" -->
## F-stringi i formatowanie liczb (cd.)

```python
doc_id = "DOC-1"
amount = 1234.5678

# podstawowe użycie
print(f"Faktura {doc_id} na kwotę {amount} zł")
# Faktura DOC-1 na kwotę 1234.5678 zł

# formatowanie liczby: 2 miejsca po przecinku
print(f"Faktura {doc_id} na kwotę {amount:.2f} zł")
# Faktura DOC-1 na kwotę 1234.57 zł

# separator tysięcy
print(f"{amount:,.2f}")
# 1,234.57

# wyrównanie do prawej w polu 10 znaków
print(f"{doc_id:>10}: {amount:.2f} zł")
#      DOC-1: 1234.57 zł
```

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-08" data-part="2" data-section-number="2" -->
## F-stringi i formatowanie liczb (cd.)

Formatu `:.2f` będziesz używać za każdym razem, gdy wypisujesz kwoty z faktur.

- `f"...{zmienna}..."` wstawia wartość zmiennej w miejsce `{zmienna}`.
- `{amount:.2f}` formatuje liczbę zmiennoprzecinkową do 2 miejsc po przecinku. Zapis po `:` to **specyfikator formatu** (ang. *format specifier*).
- `{amount:,.2f}` dodaje separator tysięcy (przecinek w standardzie anglosaskim).
- `{doc_id:>10}` wyrównuje tekst do prawej w polu o szerokości 10 znaków; `<` to wyrównanie do lewej.

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-09" data-part="0" data-section-number="2" -->
## Sortowanie z sorted i lambda

Funkcja `sorted()` zwraca nową, posortowaną listę. Argument `key` przyjmuje funkcję, która określa, **według jakiej wartości** sortować.

```python
documents = [
    {"id": "DOC-3", "type": "invoice",  "amount": 500.0},
    {"id": "DOC-1", "type": "invoice",  "amount": 1200.0},
    {"id": "DOC-2", "type": "contract", "amount": 300.0},
]

# sortowanie po kwocie rosnąco
by_amount = sorted(documents, key=lambda doc: doc["amount"])
print([d["id"] for d in by_amount])
# ['DOC-2', 'DOC-3', 'DOC-1']

# sortowanie malejąco
by_amount_desc = sorted(documents, key=lambda doc: doc["amount"], reverse=True)
print([d["id"] for d in by_amount_desc])
# ['DOC-1', 'DOC-3', 'DOC-2']
```

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-09" data-part="1" data-section-number="2" -->
## Sortowanie z sorted i lambda (cd.)

**`lambda`** to anonimowa funkcja jednolinijkowa. `lambda doc: doc["amount"]` to skrót dla `def get_amount(doc): return doc["amount"]`.

- `sorted(documents, key=lambda doc: doc["amount"])` zwraca nową listę; oryginalna lista `documents` pozostaje niezmieniona.
- `lambda doc: doc["amount"]` przyjmuje jeden argument (`doc`) i zwraca wartość `doc["amount"]`, według której Python porównuje elementy.
- `reverse=True` odwraca kolejność sortowania: od największej wartości do najmniejszej.
- Metoda `list.sort()` działa podobnie, ale modyfikuje listę w miejscu zamiast zwracać nową.

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-10" data-part="0" data-section-number="2" -->
## collections.Counter: zliczanie elementów

**`collections.Counter`** to słownik wyspecjalizowany w zliczaniu. Przekaż mu dowolną sekwencję, a automatycznie policzy, ile razy pojawia się każdy element.

> **Uwaga:** `Counter["nieistniejący"]` zwraca `0`, nie `KeyError`. To różni go od zwykłego `dict`.

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-10" data-part="1" data-section-number="2" -->
## collections.Counter: zliczanie elementów (cd.)

```python
from collections import Counter

documents = [
    {"id": "DOC-1", "type": "invoice"},
    {"id": "DOC-2", "type": "contract"},
    {"id": "DOC-3", "type": "invoice"},
]

# zlicz typy dokumentów
by_type = Counter(doc["type"] for doc in documents)
print(by_type)
# Counter({'invoice': 2, 'contract': 1})

# najczęstszy typ
print(by_type.most_common(1))
# [('invoice', 2)]

# dostęp jak do słownika
print(by_type["invoice"])     # 2
print(by_type["report"])      # 0  (brak wyjątku dla nieznanego klucza)
```

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-10" data-part="2" data-section-number="2" -->
## collections.Counter: zliczanie elementów (cd.)

**Oczekiwany wynik:**

```text
Counter({'invoice': 2, 'contract': 1})
[('invoice', 2)]
2
0
```

- `Counter(doc["type"] for doc in documents)` przyjmuje wyrażenie generatorowe i zlicza każdą wartość.
- Wynikowy obiekt zachowuje się jak `dict`: `by_type["invoice"]` zwraca liczbę `2`.
- `most_common(1)` zwraca listę jednego elementu: parę `(wartość, liczba_wystąpień)` dla najczęściej pojawiającego się elementu.
- Dla klucza, który nigdy nie wystąpił, `Counter` zwraca `0`, co ułatwia logikę warunkową.

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-11" data-part="0" data-section-number="2" -->
## collections.defaultdict: grupowanie bez KeyError

**`collections.defaultdict`** to słownik, który automatycznie tworzy wartość domyślną dla nieistniejącego klucza. Zamiast sprawdzać `if key in d: d[key] = []`, po prostu odczytujesz lub dopisujesz.

Argumentem `defaultdict(list)` jest **fabryka** (ang. *factory*): funkcja wywoływana bez argumentów, gdy klucz nie istnieje. `list` tworzy pustą listę, `int` tworzy `0`, `set` tworzy pusty zbiór.

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-11" data-part="1" data-section-number="2" -->
## collections.defaultdict: grupowanie bez KeyError (cd.)

```python
from collections import defaultdict

documents = [
    {"id": "DOC-1", "type": "invoice"},
    {"id": "DOC-2", "type": "contract"},
    {"id": "DOC-3", "type": "invoice"},
]

# grupowanie ID dokumentów według ich typu
ids_by_type: defaultdict[str, list[str]] = defaultdict(list)
for doc in documents:
    ids_by_type[doc["type"]].append(doc["id"])

print(dict(ids_by_type))
# {'invoice': ['DOC-1', 'DOC-3'], 'contract': ['DOC-2']}
```

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-11" data-part="2" data-section-number="2" -->
## collections.defaultdict: grupowanie bez KeyError (cd.)

**Oczekiwany wynik:**

```text
{'invoice': ['DOC-1', 'DOC-3'], 'contract': ['DOC-2']}
```

- `defaultdict(list)` oznacza: gdy odwołasz się do klucza, który nie istnieje, automatycznie utwórz dla niego pustą listę `[]`.
- Przy pierwszym `ids_by_type["invoice"].append("DOC-1")` Python tworzy klucz `"invoice"` z wartością `[]`, a następnie dopisuje do niej `"DOC-1"`.
- `dict(ids_by_type)` konwertuje wynik na zwykły słownik, co ułatwia serializację do JSON.
- Bez `defaultdict` musiałbyś pisać: `if doc["type"] not in ids_by_type: ids_by_type[doc["type"]] = []`.

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-12" data-part="0" data-section-number="2" -->
## Łączenie narzędzi: Counter, defaultdict i all_tags razem

Poniższy przykład łączy wszystko, czego nauczyłeś się w tej sekcji: `Counter`, `defaultdict`, wyrażenie generatorowe i set comprehension.

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-12" data-part="1" data-section-number="2" -->
## Łączenie narzędzi: Counter, defaultdict i all_tags razem (cd.)

```python
from collections import Counter, defaultdict

documents = [
    {"id": "DOC-1", "type": "invoice",  "tags": ["pilne", "ksiegowosc"]},
    {"id": "DOC-2", "type": "contract", "tags": ["rodo"]},
    {"id": "DOC-3", "type": "invoice",  "tags": ["ksiegowosc"]},
]

by_type = Counter(doc["type"] for doc in documents)
all_tags = sorted({tag for doc in documents for tag in doc["tags"]})
ids_by_type: defaultdict[str, list[str]] = defaultdict(list)
for doc in documents:
    ids_by_type[doc["type"]].append(doc["id"])

print(by_type.most_common(1))   # [('invoice', 2)]
print(all_tags)                 # ['ksiegowosc', 'pilne', 'rodo']
print(dict(ids_by_type))        # {'invoice': ['DOC-1', 'DOC-3'], 'contract': ['DOC-2']}
```

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-12" data-part="2" data-section-number="2" -->
## Łączenie narzędzi: Counter, defaultdict i all_tags razem (cd.)

**Oczekiwany wynik:**

```text
[('invoice', 2)]
['ksiegowosc', 'pilne', 'rodo']
{'invoice': ['DOC-1', 'DOC-3'], 'contract': ['DOC-2']}
```

- `Counter(doc["type"] for doc in documents)` zlicza wystąpienia każdego typu w jednej linii.
- `{tag for doc in documents for tag in doc["tags"]}` to set comprehension z **dwoma pętlami**: zewnętrzna iteruje po dokumentach, wewnętrzna po tagach każdego dokumentu. Zbiór automatycznie usuwa duplikaty (tag `"ksiegowosc"` pojawia się dwa razy, ale w wynikowym zbiorze jest raz).
- `sorted(...)` zwraca listę posortowaną alfabetycznie.
- `defaultdict(list)` zbiera identyfikatory dokumentów w listach dla każdego typu.
- `dict(ids_by_type)` zamienia `defaultdict` na zwykły `dict` czytelny przy wypisywaniu.

---

<!-- .slide: data-section-id="sec-2" data-slide-key="slide-2-13" data-part="0" data-section-number="2" -->
## Checkpoint: zamień pętlę na comprehension

Zanim przejdziesz dalej, sprawdź, czy potrafisz samodzielnie wykonać poniższe zadania bez zaglądania do dokumentacji:

**Zadanie 1:** Masz listę dokumentów. Napisz list comprehension, które zwróci listę wszystkich identyfikatorów dokumentów o typie `"report"`.

**Zadanie 2:** Masz tę samą listę. Napisz dict comprehension, które zbuduje słownik `{id: type}` dla wszystkich dokumentów.

**Zadanie 3:** Użyj `Counter`, żeby policzyć, ile razy każdy tag pojawia się w całej kolekcji dokumentów.

> **Wskazówka do zadania 3:** każdy dokument ma listę tagów. Potrzebujesz spłaszczonej sekwencji wszystkich tagów z wszystkich dokumentów. Sprawdź, czy wyrażenie `tag for doc in documents for tag in doc["tags"]` robi to, czego potrzebujesz.

Jeśli zadania sprawiają trudność, wróć do slajdów z list comprehension i `Counter` przed przejściem do sekcji 0.3.

---

# 3. Funkcje, Moduły i Wyjątki

---

<!-- .slide: data-section-id="sec-3" data-slide-key="slide-3-01" data-part="0" data-section-number="3" -->
## Funkcje, Moduły i Wyjątki: co osiągniesz

W tej sekcji nauczysz się trzech rzeczy, które odróżniają skrypt pisany „na szybko” od kodu gotowego do użycia w projekcie:

- pisać funkcje z **argumentami tylko nazwanymi** (ang. *keyword-only arguments*), które chronią przed pomyleniem kolejności parametrów,
- unikać klasycznej pułapki **mutowalnej wartości domyślnej** (ang. *mutable default argument*), która powoduje trudne do wykrycia błędy,
- tworzyć **własne klasy wyjątków** (ang. *custom exceptions*) i **łańcuchować błędy** (ang. *exception chaining*) przez `raise ... from`.

Domena przykładów: walidacja kwoty z faktury. Napiszemy funkcję `parse_amount`, która przetwarza tekst `"1 234,56 zł"` na liczbę `1234.56` i zgłasza czytelny błąd, gdy dane są nieprawidłowe.

---

<!-- .slide: data-section-id="sec-3" data-slide-key="slide-3-02" data-part="0" data-section-number="3" -->
## Pułapka mutowalnej wartości domyślnej

Wyobraź sobie funkcję, która zbiera tagi dokumentu. Piszesz ją intuicyjnie, podając pustą listę jako wartość domyślną, i spodziewasz się, że każde wywołanie zacznie od czystej listy:

```python
def add_tag(tag: str, tags: list[str] = []) -> list[str]:
    tags.append(tag)
    return tags

print(add_tag("pilne"))       # ['pilne']
print(add_tag("ksiegowosc"))  # ['pilne', 'ksiegowosc']  <-- niespodzianka!
```

**Oczekiwany wynik:**

```text
['pilne']
['pilne', 'ksiegowosc']
```

- Lista `[]` w nagłówku funkcji jest tworzona raz, przy wczytaniu definicji funkcji, a nie przy każdym wywołaniu.

---

<!-- .slide: data-section-id="sec-3" data-slide-key="slide-3-02" data-part="1" data-section-number="3" -->
## Pułapka mutowalnej wartości domyślnej (cd.)

- Każde wywołanie `add_tag` bez drugiego argumentu operuje na tym samym obiekcie listy, dlatego drugie wywołanie widzi wynik pierwszego.

> **Zasada:** nigdy nie używaj wartości mutowalnych (`list`, `dict`, `set`) jako wartości domyślnych argumentów. Użyj `None` i utwórz nowy obiekt wewnątrz funkcji.

---

<!-- .slide: data-section-id="sec-3" data-slide-key="slide-3-03" data-part="0" data-section-number="3" -->
## Poprawny wzorzec: None zamiast mutowalnej wartości domyślnej

Rozwiązanie jest proste: jako wartość domyślną podaj `None`, a nowy obiekt twórz wewnątrz funkcji:

Typ `list[str] | None` to zapis Pythona 3.11+, oznaczający: „lista napisów albo brak wartości”. Starsza składnia to `Optional[list[str]]` z modułu `typing`.

> **Dobra praktyka:** ten wzorzec zobaczysz wielokrotnie w projekcie przewodnim. W Pydantic v2 i dataclasses problem ten rozwiązuje `field(default_factory=list)` (omówione w sekcji 0.5).

```python
def add_tag(tag: str, tags: list[str] | None = None) -> list[str]:
    if tags is None:
        tags = []          # nowa lista przy każdym wywołaniu
    tags.append(tag)
    return tags

print(add_tag("pilne"))       # ['pilne']
print(add_tag("ksiegowosc"))  # ['ksiegowosc']  <-- teraz działa poprawnie
```

---

<!-- .slide: data-section-id="sec-3" data-slide-key="slide-3-03" data-part="1" data-section-number="3" -->
## Poprawny wzorzec: None zamiast mutowalnej wartości domyślnej (cd.)

**Oczekiwany wynik:**

```text
['pilne']
['ksiegowosc']
```

- `tags: list[str] | None = None` mówi Pythonowi: domyślna wartość to `None`, czyli „nic”.
- `if tags is None: tags = []` tworzy **nową** pustą listę przy każdym wywołaniu bez podania drugiego argumentu.

- Dzięki temu każde wywołanie operuje na swojej własnej liście.

---

<!-- .slide: data-section-id="sec-3" data-slide-key="slide-3-04" data-part="0" data-section-number="3" -->
## Argumenty tylko nazwane (keyword-only)

Python pozwala wymusić, że niektóre argumenty muszą być podane **z nazwą**, np. `parse_amount(raw, currency="zł")`, a nie pozycyjnie.

Robimy to za pomocą gwiazdki `*` w liście parametrów. Wszystkie argumenty po `*` są tylko nazwane:

```python
def parse_amount(raw: str, *, currency: str = "zł") -> float:
    ...

# Poprawne wywołania:
parse_amount("100 zł")                   # currency domyślnie "zł"
parse_amount("100 EUR", currency="EUR")  # jawna nazwa

# Błąd:
parse_amount("100 EUR", "EUR")  # TypeError: takes 1 positional argument
```

Argumenty tylko nazwane chronią przed przypadkową zmianą kolejności przy wywołaniu funkcji z wieloma parametrami. W projekcie przewodnim używamy ich wszędzie tam, gdzie argument ma sensowną wartość domyślną, ale jej przypadkowa zmiana byłaby niebezpieczna.

---

<!-- .slide: data-section-id="sec-3" data-slide-key="slide-3-04" data-part="1" data-section-number="3" -->
## Argumenty tylko nazwane (keyword-only) (cd.)

```python
def parse_amount_stub(raw: str, *, currency: str = "zł") -> str:
    # Uproszczona wersja pokazująca keyword-only
    return f"raw={raw!r}, currency={currency!r}"

# Poprawne wywołania:
print(parse_amount_stub("100 zł"))                    # currency domyślnie "zł"
print(parse_amount_stub("100 EUR", currency="EUR"))   # jawna nazwa

# Błąd przy próbie pozycyjnej:
try:
    parse_amount_stub("100 EUR", "EUR")
except TypeError as e:
    print(f"TypeError: {e}")
```

---

<!-- .slide: data-section-id="sec-3" data-slide-key="slide-3-04" data-part="2" data-section-number="3" -->
## Argumenty tylko nazwane (keyword-only) (cd.)

**Oczekiwany wynik:**

```text
raw='100 zł', currency='zł'
raw='100 EUR', currency='EUR'
TypeError: parse_amount_stub() takes 1 positional argument but 2 were given
```

- `*` w liście parametrów to separator, nie zmienna. Informuje Pythona o końcu argumentów pozycyjnych.
- `currency: str = "zł"` po `*` to argument, który można podać tylko z nazwą i ma domyślną wartość `"zł"`.
- Próba podania `currency` pozycyjnie (`parse_amount("100 EUR", "EUR")`) kończy się `TypeError`.

---

<!-- .slide: data-section-id="sec-3" data-slide-key="slide-3-05" data-part="0" data-section-number="3" -->
## Własne klasy wyjątków: kiedy i jak je tworzyć

Python ma wbudowane wyjątki jak `ValueError` czy `TypeError`, ale w większych projektach warto wiedzieć dokładnie, **co** poszło nie tak i gdzie.

Własna klasa wyjątku to klasa dziedzicząca po `Exception` (lub po bardziej szczegółowym wyjątku wbudowanym):

```python
class InvalidAmountError(ValueError):
    """Kwota w dokumencie ma niepoprawny format."""
```

Dzięki temu:
- kod wywołujący może łapać tylko ten wyjątek: `except InvalidAmountError`,
- komunikat błędu jest czytelny dla programisty i dla testów (`pytest.raises(InvalidAmountError)`),
- wyjątek działa jak dokumentacja: z jego nazwy wiadomo, czego dotyczy błąd.

> **Zasada:** twórz własny wyjątek, gdy chcesz odróżnić błąd domenowy (np. nieprawidłowa kwota) od ogólnego błędu Pythona. Wystarczy jedna linijka dziedziczenia i docstring.

---

<!-- .slide: data-section-id="sec-3" data-slide-key="slide-3-05" data-part="1" data-section-number="3" -->
## Własne klasy wyjątków: kiedy i jak je tworzyć (cd.)

- `class InvalidAmountError(ValueError):` oznacza, że nasz wyjątek **jest** `ValueError`, więc kod łapiący `except ValueError` też go złapie.
- Dziedziczenie po konkretnym wyjątku wbudowanym (tu `ValueError`) pomaga narzędziom statycznej analizy i czytelnikowi kodu.
- Docstring w klasie wyjątku pojawia się w komunikatach błędów i dokumentacji.

---

<!-- .slide: data-section-id="sec-3" data-slide-key="slide-3-06" data-part="0" data-section-number="3" -->
## Łańcuchowanie wyjątków: raise ... from

Gdy w bloku `except` zgłaszasz nowy wyjątek, Python domyślnie zachowuje oryginalny wyjątek jako kontekst. Lepszą praktyką jest jawne łańcuchowanie przez `raise ... from`:

```python
try:
    amount = float("abc")
except ValueError as err:
    raise InvalidAmountError("Niepoprawna kwota: 'abc'") from err
```

W komunikacie błędu zobaczysz:
```
ValueError: could not convert string to float: 'abc'

The above exception was the direct cause of the following exception:

InvalidAmountError: Niepoprawna kwota: 'abc'
```

---

<!-- .slide: data-section-id="sec-3" data-slide-key="slide-3-06" data-part="1" data-section-number="3" -->
## Łańcuchowanie wyjątków: raise ... from (cd.)

Dzięki `from err`:
- widzisz oryginalną przyczynę błędu (co dokładnie się nie powiodło),
- widzisz domenowy opis (co to znaczy dla aplikacji),
- debugowanie jest znacznie szybsze.

> **Uwaga:** `raise X from None` ukrywa oryginalny wyjątek. Używaj tego tylko wtedy, gdy oryginał zawierałby poufne dane (np. hasło w zapytaniu SQL).

- `except ValueError as err:` przechwytuje wyjątek i przypisuje go do zmiennej `err`.
- `raise InvalidAmountError(...) from err` tworzy nowy wyjątek i wskazuje `err` jako jego bezpośrednią przyczynę.
- Python wypisuje oba wyjątki w śladzie stosu (ang. *traceback*), zaczynając od najstarszego.

---

<!-- .slide: data-section-id="sec-3" data-slide-key="slide-3-07" data-part="0" data-section-number="3" -->
## Przykład: funkcja parse_amount z własnym wyjątkiem

Połączmy wszystkie poznane elementy w jednej funkcji. Zapisz ten kod w pliku `amounts.py`: uruchomisz go w checkpoincie tej sekcji i przetestujesz w sekcji 0.7.

---

<!-- .slide: data-section-id="sec-3" data-slide-key="slide-3-07" data-part="1" data-section-number="3" -->
## Przykład: funkcja parse_amount z własnym wyjątkiem (cd.)

```python
class InvalidAmountError(ValueError):
    """Kwota w dokumencie ma niepoprawny format."""

def parse_amount(raw: str, *, currency: str = "zł") -> float:
    cleaned = raw.replace(currency, "").replace(" ", "").replace(",", ".")
    try:
        amount = float(cleaned)
    except ValueError as err:
        raise InvalidAmountError(f"Niepoprawna kwota: {raw!r}") from err
    if amount < 0:
        raise InvalidAmountError(f"Kwota nie może być ujemna: {raw!r}")
    return amount

if __name__ == "__main__":
    print(parse_amount("1 234,56 zł"))  # 1234.56
    print(parse_amount("0,99"))         # 0.99
```

---

<!-- .slide: data-section-id="sec-3" data-slide-key="slide-3-07" data-part="2" data-section-number="3" -->
## Przykład: funkcja parse_amount z własnym wyjątkiem (cd.)

**Oczekiwany wynik:**

```text
1234.56
0.99
```

---

<!-- .slide: data-section-id="sec-3" data-slide-key="slide-3-08" data-part="0" data-section-number="3" -->
## Wyjaśnienie: parse_amount krok po kroku

Przejdźmy przez każdy krok funkcji `parse_amount`:

**1. Czyszczenie tekstu:**
```python
cleaned = raw.replace(currency, "").replace(" ", "").replace(",", ".")
```
Tekst `"1 234,56 zł"` zamienia się kolejno na `"1 234,56"`, potem `"1234,56"`, na końcu `"1234.56"`. Łańcuch wywołań `.replace()` działa od lewej do prawej.

**2. Konwersja na liczbę zmiennoprzecinkową:**
```python
amount = float(cleaned)
```
`float("1234.56")` zwraca `1234.56`. Ale `float("abc")` zgłasza `ValueError`. Właśnie to łapiemy blokiem `except`.

---

<!-- .slide: data-section-id="sec-3" data-slide-key="slide-3-08" data-part="1" data-section-number="3" -->
## Wyjaśnienie: parse_amount krok po kroku (cd.)

**3. Obsługa błędu konwersji:**
```python
except ValueError as err:
    raise InvalidAmountError(f"Niepoprawna kwota: {raw!r}") from err
```
`{raw!r}` wypisuje oryginalną wartość z cudzysłowami, np. `'abc'`, co ułatwia debugowanie.

**4. Walidacja zakresu:**
```python
if amount < 0:
    raise InvalidAmountError(f"Kwota nie może być ujemna: {raw!r}")
```
Ujemna kwota na fakturze nie ma sensu biznesowego. Walidujemy po konwersji, bo dopiero wtedy mamy liczbę.

---

<!-- .slide: data-section-id="sec-3" data-slide-key="slide-3-09" data-part="0" data-section-number="3" -->
## Struktura try/except/else/finally

Python oferuje cztery bloki do obsługi błędów. Każdy ma inne zastosowanie:

```python
try:
    result = parse_amount(raw)   # kod, który może zgłosić wyjątek
except InvalidAmountError as e:
    print(f"Błąd walidacji: {e}")  # obsługa konkretnego wyjątku
except Exception as e:
    print(f"Nieoczekiwany błąd: {e}")  # fallback dla pozostałych
else:
    print(f"OK: {result}")       # wykonuje się TYLKO gdy nie było wyjątku
finally:
    print("Koniec próby.")       # wykonuje się ZAWSZE
```

---

<!-- .slide: data-section-id="sec-3" data-slide-key="slide-3-09" data-part="1" data-section-number="3" -->
## Struktura try/except/else/finally (cd.)

| Blok | Kiedy się wykonuje |
|---|---|
| `try` | zawsze (to właściwy kod) |
| `except` | tylko gdy wystąpił pasujący wyjątek |
| `else` | tylko gdy NIE było wyjątku |
| `finally` | zawsze, nawet przy `return` |

> **Zasada:** nie używaj gołego `except:` bez określenia typu wyjątku. Łapie wtedy nawet `KeyboardInterrupt` (Ctrl+C) i `SystemExit`, co może ukryć poważne błędy.

- Blok `else` jest rzadko spotykany, ale przydatny: oddziela kod „po sukcesie” od kodu obsługi błędu.
- `finally` gwarantuje zamknięcie zasobów (np. połączeń sieciowych), nawet gdy funkcja zwraca wartość przez `return` w bloku `try`.

---

<!-- .slide: data-section-id="sec-3" data-slide-key="slide-3-10" data-part="0" data-section-number="3" -->
## Blok if __name__ == '__main__': moduł vs skrypt

Każdy plik `.py` może być użyty na dwa sposoby:

1. **Uruchomiony jako skrypt:** `python amounts.py`. Python ustawia zmienną `__name__` na `"__main__"`.
2. **Zaimportowany jako moduł:** `from amounts import parse_amount`. Wtedy `__name__` przyjmuje wartość `"amounts"`.

---

<!-- .slide: data-section-id="sec-3" data-slide-key="slide-3-10" data-part="1" data-section-number="3" -->
## Blok if __name__ == '__main__': moduł vs skrypt (cd.)

Blok `if __name__ == "__main__":` pozwala napisać kod, który uruchamia się **tylko** gdy plik jest skryptem, a nie importem:

```python
# amounts.py
class InvalidAmountError(ValueError):
    ...

def parse_amount(raw: str, *, currency: str = "zł") -> float:
    ...

if __name__ == "__main__":
    # Ten blok NIE wykona się przy imporcie
    print(parse_amount("1 234,56 zł"))  # 1234.56
```

Dzięki temu test `from amounts import parse_amount` nie wywołuje kodu demonstracyjnego.

- `__name__` to specjalna zmienna Pythona. Przy uruchomieniu skryptu przyjmuje wartość `"__main__"`.
- Przy imporcie `__name__` to nazwa pliku bez rozszerzenia, np. `"amounts"`.

---

<!-- .slide: data-section-id="sec-3" data-slide-key="slide-3-10" data-part="2" data-section-number="3" -->
## Blok if __name__ == '__main__': moduł vs skrypt (cd.)

- Kod wewnątrz `if __name__ == "__main__":` traktuj jak „sekcję demonstracyjną” pliku.

---

<!-- .slide: data-section-id="sec-3" data-slide-key="slide-3-11" data-part="0" data-section-number="3" -->
## Argumenty pozycyjne, nazwane, *args i **kwargs

Python obsługuje cztery kategorie argumentów funkcji. Warto je znać, bo spotkasz je w kodzie bibliotek:

W praktyce `*args` i `**kwargs` najczęściej zobaczysz w dekoratorach (sekcja 0.6) i przy opakowywaniu istniejących funkcji.

---

<!-- .slide: data-section-id="sec-3" data-slide-key="slide-3-11" data-part="1" data-section-number="3" -->
## Argumenty pozycyjne, nazwane, *args i **kwargs (cd.)

```python
def describe_doc(
    doc_id: str,              # 1. pozycyjny (lub nazwany)
    title: str,               # 1. pozycyjny (lub nazwany)
    *tags: str,               # 2. zmienna liczba argumentów pozycyjnych
    status: str = "draft",    # 3. keyword-only z wartością domyślną
    **metadata: str,          # 4. zmienna liczba argumentów nazwanych
) -> None:
    print(doc_id, title, tags, status, metadata)

describe_doc(
    "FV-7",
    "Faktura marcowa",
    "pilne", "ksiegowosc",   # trafia do *tags
    status="approved",
    author="Anna",            # trafia do **metadata
)
# FV-7 Faktura marcowa ('pilne', 'ksiegowosc') approved {'author': 'Anna'}
```

---

<!-- .slide: data-section-id="sec-3" data-slide-key="slide-3-11" data-part="2" data-section-number="3" -->
## Argumenty pozycyjne, nazwane, *args i **kwargs (cd.)

**Oczekiwany wynik:**

```text
FV-7 Faktura marcowa ('pilne', 'ksiegowosc') approved {'author': 'Anna'}
```

- `*tags` zbiera wszystkie nadmiarowe argumenty pozycyjne w krotkę `('pilne', 'ksiegowosc')`.
- `**metadata` zbiera wszystkie nadmiarowe argumenty nazwane w słownik `{'author': 'Anna'}`.
- Kolejność w definicji funkcji musi być: pozycyjne, `*args`, keyword-only, `**kwargs`.

---

<!-- .slide: data-section-id="sec-3" data-slide-key="slide-3-12" data-part="0" data-section-number="3" -->
## Checkpoint 0.3: uruchom i zaimportuj

Zanim przejdziesz dalej, sprawdź, że potrafisz:

Krok 1. Upewnij się, że kod ze slajdu „Przykład: funkcja parse_amount z własnym wyjątkiem” jest zapisany w pliku `amounts.py`, i uruchom go jako skrypt:

```bash
python amounts.py
# Oczekiwany wynik:
# 1234.56
# 0.99
```

---

<!-- .slide: data-section-id="sec-3" data-slide-key="slide-3-12" data-part="1" data-section-number="3" -->
## Checkpoint 0.3: uruchom i zaimportuj (cd.)

Krok 2. W tym samym katalogu uruchom interaktywny interpreter i zaimportuj funkcję:

```python
from amounts import parse_amount, InvalidAmountError

print(parse_amount("0,99"))            # 0.99
print(parse_amount("100 EUR", currency="EUR"))  # 100.0

try:
    parse_amount("abc")
except InvalidAmountError as e:
    print(f"Błąd: {e}")  # Błąd: Niepoprawna kwota: 'abc'
```

Krok 3. Sprawdź łańcuchowanie wyjątku: wywołaj `parse_amount("abc")` bez bloku `try/except` i przeczytaj cały ślad stosu (ang. *traceback*). Powinny pojawić się dwa wyjątki: `ValueError` i `InvalidAmountError`.

Jeśli wszystkie trzy kroki działają, jesteś gotowy do sekcji 0.4.

---

# 4. Praca z Plikami i Danymi (pathlib, JSON, CSV, datetime)

---

<!-- .slide: data-section-id="sec-4" data-slide-key="slide-4-01" data-part="0" data-section-number="4" -->
## Problem: ręczne sklejanie ścieżek prowadzi do błędów

Wyobraź sobie, że piszesz skrypt, który wczytuje faktury z podkatalogu `data/`. Na Windowsie ścieżka wygląda tak:

```python
path = "data\\invoices\\fv_001.json"  # Windows
```

Na macOS lub Linuksie musisz użyć ukośnika w drugą stronę:

```python
path = "data/invoices/fv_001.json"  # Linux/macOS
```

Jeżeli twój skrypt trafi na inny system operacyjny, **program się posypie**. Ręczne sklejanie ścieżek ze znakami `\` lub `/` to klasyczna pułapka dla początkujących.

**Rozwiązanie:** moduł `pathlib` z biblioteki standardowej Pythona 3.4+. Zamiast ciągów znaków używasz **obiektu ścieżki** (ang. *Path object*), który sam dobiera właściwy separator.

---

<!-- .slide: data-section-id="sec-4" data-slide-key="slide-4-02" data-part="0" data-section-number="4" -->
## pathlib.Path: obiekt ścieżki i operator /

**`pathlib.Path`** to klasa reprezentująca ścieżkę do pliku lub katalogu jako obiekt, nie zwykły napis. Operator `/` służy do łączenia elementów ścieżki w sposób przenośny.

Najważniejsze atrybuty i metody `Path`:

| Atrybut / metoda | Co zwraca |
|---|---|
| `.suffix` | rozszerzenie pliku, np. `.json` |
| `.stem` | nazwa bez rozszerzenia, np. `fv_001` |
| `.parent` | katalog nadrzędny |
| `.exists()` | `True`, jeśli ścieżka istnieje na dysku |
| `.glob(wzorzec)` | iterator pasujących plików |

---

<!-- .slide: data-section-id="sec-4" data-slide-key="slide-4-02" data-part="1" data-section-number="4" -->
## pathlib.Path: obiekt ścieżki i operator / (cd.)

```python
from pathlib import Path

base = Path("data")          # katalog data/
file = base / "invoices" / "fv_001.json"  # data/invoices/fv_001.json

print(file)                  # data/invoices/fv_001.json
print(file.suffix)           # .json
print(file.stem)             # fv_001
print(file.parent)           # data/invoices
print(file.exists())         # True lub False
```

---

<!-- .slide: data-section-id="sec-4" data-slide-key="slide-4-02" data-part="2" data-section-number="4" -->
## pathlib.Path: obiekt ścieżki i operator / (cd.)

**Oczekiwany wynik:**

```text
data/invoices/fv_001.json
.json
fv_001
data/invoices
False
```

- `Path("data")` tworzy obiekt ścieżki wskazujący na katalog `data`. To jeszcze nie sprawdza, czy katalog istnieje.
- Operator `/` łączy segmenty ścieżki. Python automatycznie dobierze właściwy separator dla twojego systemu.
- `.suffix` i `.stem` przydają się, gdy chcesz zmienić rozszerzenie pliku albo wyodrębnić numer faktury z nazwy.

---

<!-- .slide: data-section-id="sec-4" data-slide-key="slide-4-03" data-part="0" data-section-number="4" -->
## Menedżer kontekstu with: plik zamknie się nawet przy błędzie

Gdy otwierasz plik przez `open()`, musisz go potem zamknąć przez `close()`. Jeśli jednak między otwarciem a zamknięciem wystąpi wyjątek, `close()` nigdy nie zostanie wywołane, a plik pozostanie otwarty.

**Menedżer kontekstu** (ang. *context manager*) rozwiązuje ten problem. Blok `with` gwarantuje, że `close()` zostanie wywołane zawsze, niezależnie od tego, czy w środku pojawi się błąd.

```python
from pathlib import Path

path = Path("data") / "fv_001.txt"

with path.open(encoding="utf-8") as file:
    content = file.read()
# tutaj plik jest już zamknięty
print(content[:50])
```

Uwaga: zawsze otwieraj pliki tekstowe z jawnym `encoding="utf-8"`. Bez tego Python użyje domyślnego kodowania systemu (np. `cp1250` na Windowsie), co może prowadzić do błędów z polskimi znakami.

---

<!-- .slide: data-section-id="sec-4" data-slide-key="slide-4-03" data-part="1" data-section-number="4" -->
## Menedżer kontekstu with: plik zamknie się nawet przy błędzie (cd.)

- `path.open(encoding="utf-8")` to metoda obiektu `Path`, odpowiednik wbudowanego `open(path, encoding="utf-8")`.
- Słowo kluczowe `with` sprawia, że Python automatycznie wywoła `file.close()` po wyjściu z bloku, nawet gdy pojawi się wyjątek.
- Zmienna `file` jest dostępna tylko wewnątrz bloku `with`.

---

<!-- .slide: data-section-id="sec-4" data-slide-key="slide-4-04" data-part="0" data-section-number="4" -->
## JSON: wczytywanie pliku i obsługa błędnego formatu

Moduł `json` z biblioteki standardowej umożliwia serializację i deserializację danych w formacie JSON.

<!-- two-column -->
Pliki (strumień):
- `json.load(file)`: wczytuje JSON z otwartego pliku
- `json.dump(data, file)`: zapisuje do pliku

Napisy (string):
- `json.loads(text)`: parsuje napis JSON
- `json.dumps(data)`: serializuje do napisu

---

<!-- .slide: data-section-id="sec-4" data-slide-key="slide-4-04" data-part="1" data-section-number="4" -->
## JSON: wczytywanie pliku i obsługa błędnego formatu (cd.)

```python
import json
from pathlib import Path

path = Path("data") / "fv_001.json"

try:
    with path.open(encoding="utf-8") as file:
        data = json.load(file)
except json.JSONDecodeError as err:
    print(f"Uszkodzony plik {path.name}: {err}")
    data = {}

print(data)
```

**`json.JSONDecodeError`** to wyjątek zgłaszany przez `json.load` i `json.loads`, gdy plik zawiera niepoprawny JSON (np. brakuje nawiasu, jest przecinek na końcu).

---

<!-- .slide: data-section-id="sec-4" data-slide-key="slide-4-04" data-part="2" data-section-number="4" -->
## JSON: wczytywanie pliku i obsługa błędnego formatu (cd.)

```python
import json

# Symulacja wczytywania JSON z napisu (zamiast pliku)
good_json = '{"id": "FV-1", "amount": 1200.0}'
bad_json = '{"id": "FV-2", "amount":}'

try:
    data = json.loads(good_json)
    print(data)
except json.JSONDecodeError as err:
    print(f"Błąd: {err}")

try:
    data = json.loads(bad_json)
    print(data)
except json.JSONDecodeError as err:
    print(f"Uszkodzony JSON: {err.msg}")

```

---

<!-- .slide: data-section-id="sec-4" data-slide-key="slide-4-04" data-part="3" data-section-number="4" -->
## JSON: wczytywanie pliku i obsługa błędnego formatu (cd.)

**Oczekiwany wynik:**

```text
{'id': 'FV-1', 'amount': 1200.0}
Uszkodzony JSON: Expecting value
```

- `json.load(file)` czyta plik i zwraca Pythonowy słownik lub listę, zależnie od struktury JSON.
- Blok `try/except json.JSONDecodeError` przechwytuje błąd parsowania i pozwala kontynuować działanie zamiast przerywać cały program.
- `ensure_ascii=False` w `json.dump` pozwala zapisywać polskie znaki bez zamiany na sekwencje `\uXXXX`.

---

<!-- .slide: data-section-id="sec-4" data-slide-key="slide-4-05" data-part="0" data-section-number="4" -->
## Przykład: wczytywanie faktur z katalogu z pominięciem uszkodzonych plików

Poniższa funkcja przegląda katalog `data/`, wczytuje wszystkie pliki `.json` i zbiera nazwy tych, których nie udało się sparsować. Zapisz ją w pliku `invoices.py`: w sekcji 0.7 napiszesz do niej test.

---

<!-- .slide: data-section-id="sec-4" data-slide-key="slide-4-05" data-part="1" data-section-number="4" -->
## Przykład: wczytywanie faktur z katalogu z pominięciem uszkodzonych plików (cd.)

```python
import json
from pathlib import Path

def load_invoices(folder: Path) -> tuple[list[dict], list[str]]:
    invoices: list[dict] = []
    broken: list[str] = []
    for path in sorted(folder.glob("*.json")):
        try:
            with path.open(encoding="utf-8") as file:
                invoices.append(json.load(file))
        except json.JSONDecodeError:
            broken.append(path.name)
    return invoices, broken

invoices, broken = load_invoices(Path("data"))
print(f"Wczytano {len(invoices)} faktur, pominięto: {broken}")
```

---

<!-- .slide: data-section-id="sec-4" data-slide-key="slide-4-05" data-part="2" data-section-number="4" -->
## Przykład: wczytywanie faktur z katalogu z pominięciem uszkodzonych plików (cd.)

**Przykładowy wynik** (zależy od plików w katalogu `data/`):

```text
Wczytano 3 faktur, pominięto: ['fv_corrupted.json']
```

- `folder.glob("*.json")` zwraca iterator wszystkich plików z rozszerzeniem `.json` w katalogu `folder`. `sorted()` gwarantuje kolejność alfabetyczną.
- `invoices: list[dict] = []` to adnotacja typu przy inicjalizacji pustej listy, dobra praktyka w Python 3.11+.
- Wewnątrz pętli blok `try/except` sprawia, że uszkodzony plik nie przerywa wczytywania pozostałych, tylko trafia do listy `broken`.
- Funkcja zwraca krotkę dwóch list: poprawnych faktur i nazw uszkodzonych plików. Wywołujący kod sam decyduje, co z nimi zrobi.

---

<!-- .slide: data-section-id="sec-4" data-slide-key="slide-4-06" data-part="0" data-section-number="4" -->
## CSV: czytanie i zapis z csv.DictReader i csv.DictWriter

Pliki CSV (ang. *Comma-Separated Values*) przechowują dane tabelaryczne. Moduł `csv` z biblioteki standardowej udostępnia klasy, które automatycznie mapują kolumny na klucze słownika.

**`csv.DictReader`** wczytuje każdy wiersz jako słownik, gdzie klucze to nazwy kolumn z nagłówka.

```python
import csv
from pathlib import Path

path = Path("data") / "invoices.csv"

with path.open(encoding="utf-8", newline="") as file:
    reader = csv.DictReader(file)
    for row in reader:
        # row to dict: {"id": "FV-1", "amount": "1200.00", ...}
        invoice_id = row["id"]
        amount = float(row["amount"])  # CSV nie zna typów: wszystko to str
        print(f"{invoice_id}: {amount:.2f} zł")
```

---

<!-- .slide: data-section-id="sec-4" data-slide-key="slide-4-06" data-part="1" data-section-number="4" -->
## CSV: czytanie i zapis z csv.DictReader i csv.DictWriter (cd.)

Uwaga: `csv.DictReader` zawsze zwraca wartości jako napisy `str`. Liczby, daty i wartości logiczne musisz samodzielnie skonwertować: `float(row["amount"])`, `int(row["qty"])`.

```python
import csv
import io

# Symulacja pliku CSV w pamięci (zamiast prawdziwego pliku)
csv_content = "id,amount,client\nFV-1,1200.00,Acme Corp\nFV-2,350.50,Beta Ltd\n"

reader = csv.DictReader(io.StringIO(csv_content))
for row in reader:
    invoice_id = row["id"]
    amount = float(row["amount"])  # CSV nie zna typów: wszystko to str
    print(f"{invoice_id}: {amount:.2f} zł")

```

---

<!-- .slide: data-section-id="sec-4" data-slide-key="slide-4-06" data-part="2" data-section-number="4" -->
## CSV: czytanie i zapis z csv.DictReader i csv.DictWriter (cd.)

**Oczekiwany wynik:**

```text
FV-1: 1200.00 zł
FV-2: 350.50 zł
```

- `newline=""` jest wymagane przez dokumentację modułu `csv` przy otwieraniu pliku. Bez tego na Windowsie mogą pojawić się dodatkowe puste wiersze.
- `csv.DictReader` odczytuje pierwszy wiersz jako nagłówek i używa go jako kluczy dla kolejnych wierszy.
- Konwersja `float(row["amount"])` jest konieczna, bo CSV nie przechowuje informacji o typach danych.

---

<!-- .slide: data-section-id="sec-4" data-slide-key="slide-4-06" data-part="3" data-section-number="4" data-break="manual" -->
## CSV: czytanie i zapis z csv.DictReader i csv.DictWriter (cd.)

**Wartości logiczne i zapis CSV.** Tekst `"false"` nie jest pusty, więc `bool("false")` daje `True`. Porównaj tekst jawnie. Do zapisu słowników służy `csv.DictWriter`:

```python
import csv
import io

rows = [{"number": "FV-1", "paid": "true"}, {"number": "FV-2", "paid": "false"}]
for row in rows:
    paid = row["paid"].strip().lower() == "true"
    print(row["number"], paid, bool(row["paid"]))

buffer = io.StringIO()  # w prawdziwym programie: path.open("w", encoding="utf-8", newline="")
writer = csv.DictWriter(buffer, fieldnames=["number", "paid"])
writer.writeheader()
writer.writerows(rows)
print(buffer.getvalue(), end="")
```

---

<!-- .slide: data-section-id="sec-4" data-slide-key="slide-4-06" data-part="4" data-section-number="4" -->
## CSV: czytanie i zapis z csv.DictReader i csv.DictWriter (cd.)

**Oczekiwany wynik:**

```text
FV-1 True True
FV-2 False True
number,paid
FV-1,true
FV-2,false
```

---

<!-- .slide: data-section-id="sec-4" data-slide-key="slide-4-07" data-part="0" data-section-number="4" -->
## Daty: datetime.date.fromisoformat i timedelta

Faktury mają daty wymagalności płatności. Moduł `datetime` z biblioteki standardowej pozwala parsować daty zapisane w formacie ISO 8601 (`YYYY-MM-DD`) i wykonywać na nich obliczenia.

**`timedelta`** (ang. *time delta*, różnica czasu) to obiekt reprezentujący różnicę między dwiema datami. Możesz go dodawać do obiektów `date` i odejmować od nich.

> **Stała data w testach.** `date.today()` zwraca dzisiejszą datę, więc wynik testu zmieniałby się z dnia na dzień. Gdy przekazujesz stałą datę jako argument (`today=date(2026, 2, 1)`), test jest powtarzalny.

---

<!-- .slide: data-section-id="sec-4" data-slide-key="slide-4-07" data-part="1" data-section-number="4" -->
## Daty: datetime.date.fromisoformat i timedelta (cd.)

```python
from datetime import date, timedelta

due_str = "2026-01-31"
due_date = date.fromisoformat(due_str)

today = date(2026, 2, 1)  # stała data w testach, nie date.today()
delta = today - due_date

print(due_date)           # 2026-01-31
print(delta.days)         # 1
print(due_date < today)   # True - faktura przeterminowana

# Przykład z timedelta: termin płatności za 30 dni
payment_deadline = today + timedelta(days=30)
print(payment_deadline)   # 2026-03-03

```

---

<!-- .slide: data-section-id="sec-4" data-slide-key="slide-4-07" data-part="2" data-section-number="4" -->
## Daty: datetime.date.fromisoformat i timedelta (cd.)

**Oczekiwany wynik:**

```text
2026-01-31
1
True
2026-03-03
```

- `date.fromisoformat("2026-01-31")` parsuje napis w formacie ISO 8601 i zwraca obiekt `date`. Rzuci `ValueError`, jeśli format jest niepoprawny.
- Odejmowanie dwóch obiektów `date` zwraca `timedelta`, z którego można odczytać liczbę dni przez `.days`.
- Porównywanie dat (`<`, `>`, `==`) działa intuicyjnie, jak porównywanie liczb.

---

<!-- .slide: data-section-id="sec-4" data-slide-key="slide-4-08" data-part="0" data-section-number="4" -->
## Checkpoint 0.4: co powinieneś umieć

Zanim przejdziesz do sekcji 0.5, sprawdź samodzielnie, czy potrafisz:

- Utworzyć obiekt `Path` i połączyć segmenty ścieżki operatorem `/` bez używania napisów ze znakami `\\` lub `/`.
- Otworzyć plik w bloku `with` z jawnym `encoding="utf-8"` i przekazać zawartość do `json.load`.
- Obsłużyć `json.JSONDecodeError` tak, żeby jeden uszkodzony plik nie przerwał pętli.
- Wczytać plik CSV przez `csv.DictReader` i skonwertować kolumnę `amount` na `float`.
- Sparsować datę ISO (`"2026-01-31"`) przez `date.fromisoformat` i sprawdzić, czy jest przeterminowana.

**Zadanie praktyczne:** uruchom funkcję `load_invoices` z prawdziwym katalogiem. Jeśli nie masz plików testowych, utwórz je ręcznie: jeden poprawny JSON i jeden z celowym błędem parsowania (np. brakujący cudzysłów). Sprawdź, że uszkodzony plik trafia do listy `broken`, a nie przerywa działania skryptu.

---

# 5. Programowanie Obiektowe (OOP) i Type Hints

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-01" data-part="0" data-section-number="5" -->
## Co poznasz w tej sekcji

W Filarze I będziesz budować API w **FastAPI** i modele danych w **Pydantic**. Obie biblioteki opierają się na klasach i adnotacjach typów, dlatego w tej sekcji poznasz:

1. Adnotacje typów (ang. *type hints*): `str`, `list[str]`, `dict[str, Any]`, `str | None` i starszy zapis z modułu `typing`.
2. Klasy i obiekty: `__init__`, `self`, metody, `__str__` i `__repr__`.
3. Właściwości `@property`, czyli wartości wyliczane z innych pól.
4. Dziedziczenie i `super()`, klasy abstrakcyjne (`abc.ABC`, `@abstractmethod`) jako wspólny kontrakt dla różnych typów dokumentów.
5. `@dataclass` jako krótszy zapis klas przechowujących dane.

Przepisuj przykłady samodzielnie i uruchamiaj je komendą `uv run python plik.py` w folderze `prework` z sekcji 0.1.

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-02" data-part="0" data-section-number="5" -->
## Czym są adnotacje typów i po co je stosować

Spójrz na nagłówek funkcji `def count_words(text, min_length=1)`. Z samej nazwy nie wiadomo, czy `text` to tekst, plik, czy lista słów.

**Adnotacje typów** (ang. *type hints*) to dopisek w kodzie, który mówi, **jakiego typu są argumenty i wynik**:

```python
def count_words(text: str, min_length: int = 1) -> int:
    ...
```

Czytamy: „funkcja przyjmuje tekst `text` i liczbę całkowitą `min_length`, a zwraca liczbę całkowitą”.

Dlaczego w kursie to **obowiązkowe**, a nie opcjonalne:

- **Czytelność:** kod sam opisuje, czego oczekuje.
- **Podpowiedzi edytora:** VS Code rozpoznaje, że `text` ma typ `str`, i podpowiada dostępne metody tekstowe.
- **Wykrywanie błędów:** edytor może wskazać niezgodność typów jeszcze przed uruchomieniem programu.
- **Pydantic v2 i FastAPI używają adnotacji do działania.** Na ich podstawie sprawdzają dane przychodzące do API, zamieniają typy i generują dokumentację. W tych bibliotekach adnotacje to nie komentarz, tylko **instrukcja**.

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-03" data-part="0" data-section-number="5" -->
## Składnia adnotacji: zmienne, argumenty, wynik

```python
# Zmienna: nazwa: typ = wartość
title: str = "Umowa NDA"
pages: int = 12
price: float = 1499.99
is_signed: bool = False

# Funkcja: argument: typ, a po strzałce -> typ zwracanego wyniku
def count_words(text: str, min_length: int = 1) -> int:
    words = text.split()
    return len([w for w in words if len(w) >= min_length])

# Funkcja, która nic nie zwraca: -> None
def print_title(title: str) -> None:
    print(f"Tytuł: {title}")
```

Zapamiętaj trzy elementy:
- **dwukropek po nazwie** (`text: str`) opisuje typ zmiennej lub argumentu,

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-03" data-part="1" data-section-number="5" -->
## Składnia adnotacji: zmienne, argumenty, wynik (cd.)

- **strzałka `->` przed dwukropkiem kończącym linię `def`** opisuje typ wyniku,
- **`-> None`** oznacza funkcję, która nic nie zwraca (tylko coś robi, np. wypisuje).

Podstawowe typy, których będziesz używać: `str`, `int`, `float`, `bool`, `None`.

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-04" data-part="0" data-section-number="5" -->
## Typy złożone: listy, słowniki, Optional i Union

```python
tags: list[str] = ["poufne", "rodo"]             # lista tekstów
word_counts: dict[str, int] = {"DOC-101": 120}   # słownik: klucz str -> wartość int

def find_author(document: dict[str, str]) -> str | None:
    return document.get("author")                # zwraca tekst ALBO None

print(find_author({"title": "NDA"}))
```

**Oczekiwany wynik:**

```text
None
```

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-04" data-part="1" data-section-number="5" -->
## Typy złożone: listy, słowniki, Optional i Union (cd.)

`str | None` czytamy „tekst **albo** None”: wartość jest opcjonalna. W starszym kodzie i dokumentacji zobaczysz te same typy zapisane przez moduł `typing`. Oba zapisy znaczą dokładnie to samo:

| Nowoczesny zapis (Python 3.10+) | Zapis z modułu `typing` |
|---|---|
| `list[str]` | `List[str]` |
| `dict[str, int]` | `Dict[str, int]` |
| `str \| None` | `Optional[str]` |
| `int \| float` | `Union[int, float]` |
| `dict[str, Any]` (z `from typing import Any`) | `Dict[str, Any]` |

W kursie piszemy nowoczesną wersją, ale musisz rozpoznawać obie. `Any` oznacza „dowolny typ”: używaj go tylko wtedy, gdy naprawdę nie da się określić typu.

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-05" data-part="0" data-section-number="5" -->
## Adnotacje nie są sprawdzane w czasie działania programu

Ważna pułapka: **sam Python ignoruje adnotacje** podczas wykonywania kodu. Utwórz plik `types_demo.py` i uruchom go:

```python
def count_words(text: str) -> int:
    return len(text.split())

count_words(123)   # przekazujemy liczbę zamiast tekstu
```

**Oczekiwany wynik:**

```text
Traceback (most recent call last):
  File "C:\Users\jan\kurs-ai\prework\types_demo.py", line 4, in <module>
    count_words(123)
    ~~~~~~~~~~~^^^^^
  File "C:\Users\jan\kurs-ai\prework\types_demo.py", line 2, in count_words
    return len(text.split())
               ^^^^^^^^^^
AttributeError: 'int' object has no attribute 'split'
```

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-05" data-part="1" data-section-number="5" -->
## Adnotacje nie są sprawdzane w czasie działania programu (cd.)

Python pozwolił wywołać funkcję z liczbą. Program przerwał działanie dopiero przy próbie użycia `.split()` ponieważ służy on do dzielenia tekstu, a przekazana wartość była liczbą.

Taki błąd może wyłapać **edytor, zanim uruchomisz kod**, ale trzeba go włączyć: w VS Code otwórz ustawienia (**Ctrl + ,** , macOS **Cmd + ,**), wyszukaj `type checking mode` i dla **Python › Analysis: Type Checking Mode** wybierz **`basic`**. Od teraz `123` w wywołaniu zostanie podkreślone na czerwono: to właśnie praktyczna wartość adnotacji.

Jak czytać taki **traceback**: od dołu. Ostatnia linia mówi, **co** się stało (`AttributeError`), a linie nad nią **gdzie** (plik, numer linii, znaczniki `^^^^`).

Biblioteka **Pydantic**, którą poznasz w Filarze I, idzie krok dalej: na podstawie adnotacji **sama sprawdza dane** i zgłasza czytelny błąd walidacji już przy wejściu.

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-06" data-part="0" data-section-number="5" -->
## Programowanie obiektowe: klasa i obiekt

Do tej pory dokument opisywaliśmy słownikiem: `{"doc_id": "DOC-101", "content": "..."}`. To rozwiązanie działa, ale sam słownik przechowuje jedynie dane dokumentu, i nie określa, jak je przetwarzać.

**Programowanie obiektowe** (OOP, ang. *object-oriented programming*) łączy **dane** i **operacje na tych danych** w jedną całość.

- **Klasa** (ang. *class*) to szablon: opisuje, jakie dane ma każdy dokument (identyfikator, treść, tagi) i co można z nim zrobić (policzyć słowa, dodać tag).
- **Obiekt** (ang. *object*, *instancja*) to konkretny egzemplarz utworzony z klasy: dokument `DOC-101` z konkretną treścią.
- **Atrybut** to dana zapisana w obiekcie (np. `doc_id`).
- **Metoda** to funkcja zdefiniowana w klasie, która działa na danych obiektu (np. `word_count()`).

Analogia: klasa to **formularz** „Karta dokumentu” z polami do wypełnienia. Obiekt to **wypełniony egzemplarz** tego formularza. Z jednego wzoru formularza powstaje wiele wypełnionych kart.

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-07" data-part="0" data-section-number="5" -->
## Pierwsza klasa: konstruktor __init__ i self

Utwórz plik **`documents.py`** i wpisz:

```python
class DocumentRaw:
    def __init__(self, doc_id: str, content: str, tags: list[str] | None = None) -> None:
        self.doc_id = doc_id
        self.content = content
        self.tags = tags if tags is not None else []


doc = DocumentRaw("DOC-101", "Umowa poufności NDA zawarta między stronami")
print(doc.doc_id)
print(doc.tags)
```

**Oczekiwany wynik** (uruchom: `uv run python documents.py`):

```text
DOC-101
[]
```

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-07" data-part="1" data-section-number="5" -->
## Pierwsza klasa: konstruktor __init__ i self (cd.)

- `class DocumentRaw:` definiuje klasę. Nazwy klas piszemy *CamelCase* (każde słowo wielką literą).
- `__init__` to **konstruktor**: specjalna metoda wywoływana automatycznie, gdy tworzysz obiekt `DocumentRaw(...)`. Jej zadaniem jest zapisanie danych w obiekcie.
- **`self`** oznacza „ten konkretny obiekt”. `self.doc_id = doc_id` znaczy: „zapisz otrzymany `doc_id` jako atrybut tego obiektu”. `self` jest zawsze pierwszym argumentem metody, ale przy wywołaniu go nie podajesz: Python wstawia go sam.
- `tags if tags is not None else []` daje każdemu obiektowi **własną, pustą listę**, gdy tagów nie podano. (Nie pisz `tags: list[str] = []` w nagłówku: taka lista byłaby wspólna dla wszystkich obiektów, co prowadzi do błędów.)

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-08" data-part="0" data-section-number="5" -->
## Metody: zachowanie obiektu

Dodaj do klasy `DocumentRaw` dwie metody (wcięte tak jak `__init__`):

```python
class DocumentRaw:
    def __init__(self, doc_id: str, content: str, tags: list[str] | None = None) -> None:
        self.doc_id = doc_id
        self.content = content
        self.tags = tags if tags is not None else []

    def word_count(self) -> int:
        return len(self.content.split())

    def add_tag(self, tag: str) -> None:
        if tag not in self.tags:
            self.tags.append(tag)


doc = DocumentRaw("DOC-101", "Umowa poufności NDA zawarta między stronami")
doc.add_tag("poufne")
doc.add_tag("poufne")      # drugi raz ten sam tag: metoda go pominie
print(doc.word_count())
print(doc.tags)
```

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-08" data-part="1" data-section-number="5" -->
## Metody: zachowanie obiektu (cd.)

**Oczekiwany wynik:**

```text
6
['poufne']
```

Metodę wywołujesz przez kropkę na obiekcie: `doc.word_count()`. Wewnątrz metody przez `self` masz dostęp do danych **tego** obiektu (`self.content`, `self.tags`). Metoda `add_tag` pilnuje reguły „bez duplikatów”: tej logiki nie musisz już powtarzać w innych miejscach programu.

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-09" data-part="0" data-section-number="5" -->
## Metody __str__ i __repr__: opis obiektu

Spróbuj wypisać obiekt: `print(doc)`. Bez dodatkowej metody zobaczysz mało pomocny opis techniczny:

```text
<__main__.DocumentRaw object at 0x0000020342DC6CF0>
```

Metoda specjalna **`__str__`** określa, jak obiekt ma wyglądać, gdy zamieniamy go na tekst (np. w `print()` albo f-stringu). Dodaj ją do klasy:

```python
    def __str__(self) -> str:
        return f"[{self.doc_id}] {self.content[:20]}... (tagi: {', '.join(self.tags)})"
```

Teraz `print(doc)` wypisze:

```text
[DOC-101] Umowa poufności NDA ... (tagi: poufne)
```

- `self.content[:20]` to **wycinek** (ang. *slice*): pierwsze 20 znaków tekstu.

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-09" data-part="1" data-section-number="5" -->
## Metody __str__ i __repr__: opis obiektu (cd.)

- `', '.join(self.tags)` łączy elementy listy w jeden tekst, oddzielając je przecinkiem.

Metody z dwoma podkreśleniami z każdej strony (`__init__`, `__str__`) nazywamy **metodami specjalnymi** (ang. *dunder methods*). Nie wywołujesz ich bezpośrednio: Python robi to sam w określonych sytuacjach.

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-09" data-part="2" data-section-number="5" data-break="manual" -->
## Metody __str__ i __repr__: opis obiektu (cd.)

Druga metoda specjalna, **`__repr__`**, zwraca opis dla programisty: widać go w konsoli, w debuggerze i gdy obiekt jest elementem listy. Dobra praktyka: `__repr__` wygląda jak wywołanie konstruktora.

```python
class DocumentRaw:
    def __init__(self, doc_id: str, content: str) -> None:
        self.doc_id = doc_id
        self.content = content

    def __str__(self) -> str:
        return f"[{self.doc_id}] {self.content}"

    def __repr__(self) -> str:
        return f"DocumentRaw(doc_id={self.doc_id!r}, content={self.content!r})"


doc = DocumentRaw("DOC-101", "Umowa NDA")
print(doc)      # używa __str__
print([doc])    # lista pokazuje elementy przez __repr__
```

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-09" data-part="3" data-section-number="5" -->
## Metody __str__ i __repr__: opis obiektu (cd.)

**Oczekiwany wynik:**

```text
[DOC-101] Umowa NDA
[DocumentRaw(doc_id='DOC-101', content='Umowa NDA')]
```

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-10" data-part="0" data-section-number="5" -->
## @property: wartość wyliczana z innych pól

Kwota brutto faktury wynika z kwoty netto i stawki VAT. Gdyby była zwykłym atrybutem, po zmianie kwoty netto trzeba by pamiętać o jej przeliczeniu. **Właściwość** (`@property`) to metoda, którą odczytujesz jak atrybut, bez nawiasów, a jej wartość liczy się przy każdym odczycie.

```python
class InvoiceLine:
    def __init__(self, net: float, vat_rate: float = 0.23) -> None:
        self.net = net
        self.vat_rate = vat_rate

    @property
    def gross(self) -> float:
        return round(self.net * (1 + self.vat_rate), 2)


line = InvoiceLine(net=1000.0)
print(line.gross)    # bez nawiasów, jak atrybut
line.net = 2000.0
print(line.gross)    # wartość przeliczona automatycznie
```

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-10" data-part="1" data-section-number="5" -->
## @property: wartość wyliczana z innych pól (cd.)

**Oczekiwany wynik:**

```text
1230.0
2460.0
```

- `@property` nad metodą `gross` sprawia, że `line.gross` wywołuje ją automatycznie.
- Właściwość bez settera jest tylko do odczytu: `line.gross = 5` zgłosi `AttributeError`.

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-11" data-part="0" data-section-number="5" -->
## Dziedziczenie: klasa na bazie innej klasy

Faktura to też dokument, ale ma dodatkowo kwotę. Zamiast kopiować całą klasę, **dziedziczymy** po `DocumentRaw`:

```python
class Invoice(DocumentRaw):
    def __init__(self, doc_id: str, content: str, amount: float, tags: list[str] | None = None) -> None:
        super().__init__(doc_id, content, tags)   # niech DocumentRaw zapisze swoje pola
        self.amount = amount

    def __str__(self) -> str:
        return f"{super().__str__()} | kwota: {self.amount:.2f} zł"


inv = Invoice("FV-2026-07", "Faktura za usługi doradcze", 1230.5, ["faktura"])
print(inv)
print(inv.word_count())                 # metoda odziedziczona po DocumentRaw
print(isinstance(inv, DocumentRaw))     # faktura JEST dokumentem
```

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-11" data-part="1" data-section-number="5" -->
## Dziedziczenie: klasa na bazie innej klasy (cd.)

**Oczekiwany wynik:**

```text
[FV-2026-07] Faktura za usługi do... (tagi: faktura) | kwota: 1230.50 zł
4
True
```

`Invoice(DocumentRaw)` oznacza: „Invoice ma wszystko, co DocumentRaw, plus własne dodatki”. `super()` daje dostęp do wersji metody z klasy bazowej. `{self.amount:.2f}` formatuje liczbę do dwóch miejsc po przecinku. Dokładnie tak działają modele w Pydantic: każdy model dziedziczy po klasie `BaseModel`.

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-12" data-part="0" data-section-number="5" -->
## Klasy abstrakcyjne: wspólny kontrakt

Faktura, umowa i raport różnią się danymi, ale system chce każdemu dokumentowi powiedzieć to samo: „podaj podsumowanie”. **Klasa abstrakcyjna** opisuje taki kontrakt: mówi, jakie metody musi mieć każda klasa pochodna, ale sama nie służy do tworzenia obiektów.

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-12" data-part="1" data-section-number="5" -->
## Klasy abstrakcyjne: wspólny kontrakt (cd.)

```python
from abc import ABC, abstractmethod


class Exporter(ABC):
    @abstractmethod
    def export(self, text: str) -> str: ...


class UpperExporter(Exporter):
    def export(self, text: str) -> str:
        return text.upper()


print(UpperExporter().export("umowa nda"))

try:
    Exporter()
except TypeError as err:
    print(f"TypeError: {err}")
```

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-12" data-part="2" data-section-number="5" -->
## Klasy abstrakcyjne: wspólny kontrakt (cd.)

**Oczekiwany wynik** (Python 3.12 i nowszy; w 3.11 komunikat jest krótszy):

```text
UMOWA NDA
TypeError: Can't instantiate abstract class Exporter without an implementation for abstract method 'export'
```

- `ABC` oznacza klasę abstrakcyjną, a `@abstractmethod` metodę, którą klasa pochodna musi zdefiniować.
- Obiekt klasy abstrakcyjnej albo klasy, która nie zdefiniowała wszystkich metod abstrakcyjnych, kończy się `TypeError`.

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-13" data-part="0" data-section-number="5" -->
## @dataclass: krótszy zapis klas z danymi

Klasy, które głównie przechowują dane, wymagają powtarzalnego kodu: `__init__` przepisujący argumenty do `self`, `__repr__`, porównywanie. Dekorator **`@dataclass`** generuje te metody na podstawie adnotacji pól.

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-13" data-part="1" data-section-number="5" -->
## @dataclass: krótszy zapis klas z danymi (cd.)

```python
from dataclasses import dataclass, field


@dataclass
class Contract:
    doc_id: str
    party: str
    value: float = 0.0
    tags: list[str] = field(default_factory=list)


a = Contract("UM-1", "Kancelaria Nowak", 3500.0)
b = Contract("UM-1", "Kancelaria Nowak", 3500.0)
a.tags.append("prawo")
print(a)
print(a == b, b.tags)
```

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-13" data-part="2" data-section-number="5" -->
## @dataclass: krótszy zapis klas z danymi (cd.)

**Oczekiwany wynik:**

```text
Contract(doc_id='UM-1', party='Kancelaria Nowak', value=3500.0, tags=['prawo'])
False []
```

- Każde pole to adnotacja typu, a wartość po `=` jest domyślna.
- `field(default_factory=list)` tworzy nową listę dla każdego obiektu. To ta sama pułapka mutowalnej wartości domyślnej co w sekcji 0.3: zapis `tags: list[str] = []` dataclass odrzuci z błędem.
- `==` porównuje wszystkie pola, dlatego `a` (z tagiem) i `b` (bez tagów) nie są równe.

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-14" data-part="0" data-section-number="5" -->
## Dziedziczenie dataclass: kolejność pól domyślnych

Dataclass może dziedziczyć po innej dataclass: pola klasy bazowej trafiają na początek listy argumentów konstruktora. Stąd częsty błąd: jeśli w klasie bazowej jest pole z wartością domyślną, w klasie pochodnej nie może pojawić się pole bez niej.

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-14" data-part="1" data-section-number="5" -->
## Dziedziczenie dataclass: kolejność pól domyślnych (cd.)

```python
from dataclasses import dataclass, field

try:
    @dataclass
    class Base:
        doc_id: str
        tags: list[str] = field(default_factory=list)

    @dataclass
    class Invoice(Base):
        amount: float          # brak wartości domyślnej
except TypeError as err:
    print(f"TypeError: {err}")


@dataclass(kw_only=True)
class Base2:
    doc_id: str
    tags: list[str] = field(default_factory=list)


@dataclass(kw_only=True)
class Invoice2(Base2):
    amount: float


print(Invoice2(doc_id="FV-1", amount=99.0))
```

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-14" data-part="2" data-section-number="5" -->
## Dziedziczenie dataclass: kolejność pól domyślnych (cd.)

**Oczekiwany wynik:**

```text
TypeError: non-default argument 'amount' follows default argument 'tags'
Invoice2(doc_id='FV-1', tags=[], amount=99.0)
```

Rozwiązania: nadaj polom klasy pochodnej wartości domyślne (`amount: float = 0.0`) albo użyj `@dataclass(kw_only=True)`, wtedy wszystkie argumenty podajesz z nazwą.

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-15" data-part="0" data-section-number="5" -->
## Przykład: wspólny kontrakt dla dokumentów

Łączymy wszystko: klasa abstrakcyjna `Document` jako dataclass z metodą abstrakcyjną `summary()` i faktura, która dziedziczy pola i dodaje własne. Zapisz kod w pliku `document_models.py`.

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-15" data-part="1" data-section-number="5" -->
## Przykład: wspólny kontrakt dla dokumentów (cd.)

```python
from abc import ABC, abstractmethod
from dataclasses import dataclass, field
from datetime import date


@dataclass
class Document(ABC):
    doc_id: str
    content: str
    tags: list[str] = field(default_factory=list)

    @abstractmethod
    def summary(self) -> str: ...


@dataclass
class Invoice(Document):
    amount: float = 0.0
    due_date: date | None = None

    def is_overdue(self, today: date) -> bool:
        return self.due_date is not None and self.due_date < today

    def summary(self) -> str:
        return f"Faktura {self.doc_id}: {self.amount:.2f} zł"


invoice = Invoice(doc_id="FV-7", content="...", amount=1200.0, due_date=date(2026, 1, 31))
print(invoice.summary(), invoice.is_overdue(today=date(2026, 2, 1)))
```

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-15" data-part="2" data-section-number="5" -->
## Przykład: wspólny kontrakt dla dokumentów (cd.)

**Oczekiwany wynik:**

```text
Faktura FV-7: 1200.00 zł True
```

- `Invoice` ma wszystkie pola `Document` (`doc_id`, `content`, `tags`) i własne (`amount`, `due_date`), które mają wartości domyślne, bo `tags` w klasie bazowej ma wartość domyślną.
- `is_overdue` dostaje dzisiejszą datę jako argument, dzięki czemu łatwo ją przetestować.

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-16" data-part="0" data-section-number="5" -->
## Checkpoint 0.5: dlaczego Document(...) zgłasza TypeError

Dopisz na końcu pliku `document_models.py` i uruchom:

```python
try:
    Document(doc_id="DOC-1", content="...")
except TypeError as err:
    print(f"TypeError: {err}")

print(invoice)
```

**Oczekiwany wynik** (Python 3.12 i nowszy):

```text
TypeError: Can't instantiate abstract class Document without an implementation for abstract method 'summary'
Invoice(doc_id='FV-7', content='...', tags=[], amount=1200.0, due_date=datetime.date(2026, 1, 31))
```

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-16" data-part="1" data-section-number="5" -->
## Checkpoint 0.5: dlaczego Document(...) zgłasza TypeError (cd.)

Sprawdź, że potrafisz wyjaśnić własnymi słowami:

- dlaczego `Document(...)` zgłasza `TypeError`, a `Invoice(...)` działa (metoda abstrakcyjna `summary` ma definicję tylko w `Invoice`),
- skąd `print(invoice)` zna wszystkie pola (metodę `__repr__` wygenerował `@dataclass`),
- dlaczego pola `Invoice` mają wartości domyślne.

---

<!-- .slide: data-section-id="sec-5" data-slide-key="slide-5-17" data-part="0" data-section-number="5" -->
## Definition of Done, sekcja 0.5: checklista weryfikacyjna

Zanim przejdziesz do sekcji 0.6, upewnij się, że potrafisz:

- dopisać adnotacje typów do zmiennych, argumentów i wyniku funkcji, także `list[str]`, `dict[str, Any]` i `str | None`, oraz rozpoznać zapis `List`, `Optional`, `Union` z modułu `typing`,
- wyjaśnić, dlaczego Pydantic i FastAPI wymagają adnotacji typów,
- napisać klasę z `__init__`, metodami, `__str__` i `__repr__`,
- dodać właściwość `@property` wyliczaną z innych pól,
- użyć dziedziczenia i `super()`, zdefiniować klasę abstrakcyjną z `@abstractmethod`,
- zapisać klasę jako `@dataclass` z `field(default_factory=list)` i ominąć pułapkę kolejności pól przy dziedziczeniu.

Na koniec zapisz postęp w Git:

```bash
git add .
git commit -m "Prework 0.5: OOP i adnotacje typów"
```

---

# 6. Generatory i Dekoratory

---

<!-- .slide: data-section-id="sec-6" data-slide-key="slide-6-01" data-part="0" data-section-number="6" -->
## Problem: przetwarzanie dużych list pochłania pamięć

Wyobraź sobie, że masz 100 000 faktur do przetworzenia. Typowe podejście wczytuje je wszystkie do listy naraz:

```python
def load_all(items: list[str]) -> list[str]:
    result = []
    for item in items:
        result.append(item)  # cała lista w pamięci jednocześnie
    return result
```

Przy małych danych to nie problem. Przy dużych plikach lub strumieniach danych z API cała lista może nie zmieścić się w pamięci albo będziesz czekać na przetworzenie wszystkiego, zanim zobaczysz pierwszy wynik.

Rozwiązaniem jest **leniwe przetwarzanie** (ang. *lazy evaluation*): produkowanie i konsumowanie danych po jednym elemencie na raz, bez budowania pełnej listy.

---

<!-- .slide: data-section-id="sec-6" data-slide-key="slide-6-02" data-part="0" data-section-number="6" -->
## Definicja: generator i słowo kluczowe yield

**Generator** (ang. *generator*) to specjalny rodzaj funkcji, która zamiast zwracać wszystkie wyniki naraz, oddaje je jeden po jednym na żądanie. Do tworzenia generatorów służy słowo kluczowe **`yield`**.

Możesz myśleć o generatorze jak o taśmie produkcyjnej: pracownik na taśmie (generator) podaje kolejny produkt (wartość) dokładnie wtedy, gdy następna stacja (pętla `for`) jest gotowa go przyjąć. Żaden element nie czeka w magazynie (pamięci) dłużej, niż to konieczne.

Porównanie z funkcją zwracającą listę:

| Cecha | Funkcja z `return list` | Generator z `yield` |
|---|---|---|
| Pamięć | cała lista naraz | jeden element na raz |
| Pierwszy wynik | po przetworzeniu wszystkiego | natychmiast |
| Ponowne użycie | tak | tylko raz (wyczerpuje się) |

---

<!-- .slide: data-section-id="sec-6" data-slide-key="slide-6-03" data-part="0" data-section-number="6" -->
## Mechanizm: jak Python zatrzymuje i wznawia generator

Gdy Python napotyka `yield`, **zatrzymuje** wykonanie funkcji i zwraca wartość do wywołującego. Przy następnym żądaniu (następna iteracja pętli `for`) **wznawia** wykonanie dokładnie od miejsca zatrzymania, z zachowaniem wszystkich lokalnych zmiennych.

Najprostszy generator liczący kroki:

```python
def countdown(n: int):
    while n > 0:
        yield n       # zatrzymaj i oddaj n
        n -= 1        # wznów tutaj przy kolejnym next()

for val in countdown(3):
    print(val)
```

---

<!-- .slide: data-section-id="sec-6" data-slide-key="slide-6-03" data-part="1" data-section-number="6" -->
## Mechanizm: jak Python zatrzymuje i wznawia generator (cd.)

**Oczekiwany wynik:**

```
3
2
1
```

Zwykła funkcja z `return` skończyłaby działanie przy pierwszym wywołaniu. Generator wraca do pętli `while` przy każdym kolejnym żądaniu.

- `def countdown(n: int):`: zwykła definicja funkcji; to, że zawiera `yield`, sprawia, że jest generatorem.
- `yield n`: Python zwraca wartość `n` i zawiesza funkcję w tym miejscu.
- `n -= 1`: ta linia wykona się dopiero przy następnym żądaniu wartości, nie od razu.
- `for val in countdown(3):`: pętla `for` automatycznie wywołuje `next()` na generatorze, dopóki nie wyczerpie wszystkich wartości.

---

<!-- .slide: data-section-id="sec-6" data-slide-key="slide-6-04" data-part="0" data-section-number="6" -->
## Przykład: generator batches dzielący dokumenty na partie

W pipelines przetwarzania dokumentów często wysyłasz dane do zewnętrznego API w **partiach** (ang. *batches*), bo API ma limit rozmiaru jednego żądania. Generator `batches` dzieli listę dokumentów na równe kawałki:

```python
from collections.abc import Iterator

def batches(items: list[str], size: int) -> Iterator[list[str]]:
    for start in range(0, len(items), size):
        yield items[start:start + size]

docs = ["DOC-1", "DOC-2", "DOC-3", "DOC-4", "DOC-5"]
for batch in batches(docs, size=2):
    print(batch)
```

---

<!-- .slide: data-section-id="sec-6" data-slide-key="slide-6-04" data-part="1" data-section-number="6" -->
## Przykład: generator batches dzielący dokumenty na partie (cd.)

**Oczekiwany wynik:**

```
['DOC-1', 'DOC-2']
['DOC-3', 'DOC-4']
['DOC-5']
```

- `from collections.abc import Iterator`: importujemy typ `Iterator` do adnotacji zwracanego typu.
- `def batches(items: list[str], size: int) -> Iterator[list[str]]:`: sygnatura mówi: funkcja zwraca iterator produkujący listy napisów.
- `for start in range(0, len(items), size):`: `range` z krokiem `size` daje indeksy: 0, 2, 4... Dzięki temu przeskakujesz przez listę co `size` elementów.
- `yield items[start:start + size]`: wycinamy plasterek listy i oddajemy go wywołującemu. Generator zawiesza się tu i czeka na następne żądanie.
- Ostatnia partia `['DOC-5']` jest krótsza niż `size=2` - Python po prostu nie ma więcej elementów, więc wycinek jest krótszy.

---

<!-- .slide: data-section-id="sec-6" data-slide-key="slide-6-05" data-part="0" data-section-number="6" -->
## Wyrażenie generatorowe jako skrót

Tak jak list comprehension zastępuje pętlę budującą listę, **wyrażenie generatorowe** (ang. *generator expression*) zastępuje prostą funkcję generatora. Różnica: zamiast nawiasów kwadratowych `[]` używasz zwykłych nawiasów `()`.

Wyrażenie generatorowe wewnątrz `sum()`, `max()`, `min()` lub `any()` jest idiomem Pythona: nie budujesz pośredniej listy, więc kod jest szybszy i oszczędniejszy pamięciowo.

```python
docs = [
    {"id": "DOC-1", "amount": 1200.0},
    {"id": "DOC-2", "amount": 850.5},
    {"id": "DOC-3", "amount": 430.0},
]

# List comprehension - buduje całą listę w pamięci
amounts_list = [doc["amount"] for doc in docs]

# Wyrażenie generatorowe - przetwarza leniwie
total = sum(doc["amount"] for doc in docs)
print(f"Suma: {total:.2f} zł")  # Suma: 2480.50 zł
```

---

<!-- .slide: data-section-id="sec-6" data-slide-key="slide-6-05" data-part="1" data-section-number="6" -->
## Wyrażenie generatorowe jako skrót (cd.)

**Oczekiwany wynik:**

```text
Suma: 2480.50 zł
```

- `[doc["amount"] for doc in docs]`: list comprehension tworzy nową listę `[1200.0, 850.5, 430.0]` całą naraz.
- `sum(doc["amount"] for doc in docs)`: wyrażenie generatorowe wewnątrz `sum()` podaje kolejne kwoty po jednej; `sum` dodaje je na bieżąco, bez budowania listy pośredniej.
- Nawiasy `()` wewnątrz wywołania funkcji są wystarczające; nie potrzebujesz dodatkowych nawiasów `sum((x for x in ...))`.

---

<!-- .slide: data-section-id="sec-6" data-slide-key="slide-6-06" data-part="0" data-section-number="6" -->
## Generatory a strumieniowanie odpowiedzi modeli AI

Generatory są dla Ciebie ważne nie tylko jako narzędzie oszczędności pamięci. W kolejnych modułach będziesz pracować z modelami językowymi (LLM), które zwracają odpowiedzi **kawałek po kawałku** (ang. *streaming*): każdy token tekstu trafia do Ciebie natychmiast, zamiast czekać na wygenerowanie całej odpowiedzi.

Ta sama zasada co `yield`: generator oddaje jeden element i czeka, aż klient będzie gotowy na następny.

W Module 1 zobaczysz, że rzeczywiste API modeli językowych działa identycznie przez iterator zdarzeń.

```python
def simulate_llm_stream(tokens: list[str]):
    for token in tokens:
        yield token  # każdy token pojawia się osobno

for token in simulate_llm_stream(["Faktura", " nr", " FV-7", " zatwierdzona"]):
    print(token, end="", flush=True)
print()  # nowa linia na końcu
```

---

<!-- .slide: data-section-id="sec-6" data-slide-key="slide-6-06" data-part="1" data-section-number="6" -->
## Generatory a strumieniowanie odpowiedzi modeli AI (cd.)

**Oczekiwany wynik:**

```text
Faktura nr FV-7 zatwierdzona
```

- `yield token`: każde wywołanie `next()` na generatorze oddaje jeden token do pętli `for`.
- `end="", flush=True`: `end=""` sprawia, że `print` nie dodaje nowej linii po każdym tokenie; `flush=True` wymusza natychmiastowe wypisanie na ekran (bez buforowania).

---

<!-- .slide: data-section-id="sec-6" data-slide-key="slide-6-07" data-part="0" data-section-number="6" -->
## Definicja: funkcje jako obiekty pierwszej klasy

Zanim napiszesz dekorator, musisz zrozumieć jedną kluczową właściwość Pythona: **funkcje są obiektami** (ang. *first-class functions*). Oznacza to, że funkcję możesz:

- przypisać do zmiennej,
- przekazać jako argument do innej funkcji,
- zwrócić z innej funkcji.

Dzięki tej właściwości możliwe są dekoratory: funkcja `A` przyjmuje funkcję `B` jako argument i zwraca nową funkcję `C`, która „opakowuje” `B`.

---

<!-- .slide: data-section-id="sec-6" data-slide-key="slide-6-07" data-part="1" data-section-number="6" -->
## Definicja: funkcje jako obiekty pierwszej klasy (cd.)

```python
def validate(amount: float) -> bool:
    return amount > 0

# Funkcja jako obiekt przypisany do zmiennej
check = validate
print(check(100.0))   # True
print(check(-5.0))    # False

# Funkcja jako argument
def apply(func, value: float) -> bool:
    return func(value)

print(apply(validate, 500.0))  # True
```

---

<!-- .slide: data-section-id="sec-6" data-slide-key="slide-6-07" data-part="2" data-section-number="6" -->
## Definicja: funkcje jako obiekty pierwszej klasy (cd.)

**Oczekiwany wynik:**

```text
True
False
True
```

- `check = validate`: `check` wskazuje na ten sam obiekt funkcji co `validate`. Nie wywołujemy funkcji (brak nawiasów `()`). 
- `apply(validate, 500.0)`: przekazujemy obiekt funkcji `validate` jako argument; wewnątrz `apply` wywołujemy go przez `func(value)`.

---

<!-- .slide: data-section-id="sec-6" data-slide-key="slide-6-08" data-part="0" data-section-number="6" -->
## Definicja: dekorator i składnia @

**Dekorator** (ang. *decorator*) to funkcja, która przyjmuje inną funkcję jako argument, dodaje do niej nowe zachowanie i zwraca zmodyfikowaną wersję. Składnia `@nazwa_dekoratora` to skrót: Python automatycznie podstawia udekorowaną funkcję zamiast oryginalnej.

`@logger` to dokładnie to samo co napisanie `add = logger(add)` po definicji funkcji.

---

<!-- .slide: data-section-id="sec-6" data-slide-key="slide-6-08" data-part="1" data-section-number="6" -->
## Definicja: dekorator i składnia @ (cd.)

```python
def logger(func):
    def wrapper(*args, **kwargs):
        print(f"Wywołanie: {func.__name__}")
        result = func(*args, **kwargs)
        print(f"Wynik: {result}")
        return result
    return wrapper

@logger
def add(a: float, b: float) -> float:
    return a + b

add(100.0, 200.0)
```

---

<!-- .slide: data-section-id="sec-6" data-slide-key="slide-6-08" data-part="2" data-section-number="6" -->
## Definicja: dekorator i składnia @ (cd.)

**Oczekiwany wynik:**

```
Wywołanie: add
Wynik: 300.0
```

- `def logger(func):`: `logger` przyjmuje funkcję `func` jako argument.
- `def wrapper(*args, **kwargs):`: `wrapper` to wewnętrzna funkcja, która zastąpi oryginalną. `*args, **kwargs` przepuszcza wszystkie argumenty dalej.
- `func(*args, **kwargs)`: wywołujemy oryginalną funkcję z jej argumentami.
- `return wrapper`: `logger` zwraca nową funkcję `wrapper`, nie wywołuje jej.
- `@logger` przed `def add` sprawia, że Python wykonuje `add = logger(add)` automatycznie.

---

<!-- .slide: data-section-id="sec-6" data-slide-key="slide-6-09" data-part="0" data-section-number="6" -->
## Dlaczego functools.wraps jest ważne

Po udekorowaniu funkcji jej nazwa i dokumentacja (docstring) zostają zastąpione przez dane wewnętrznej funkcji `wrapper`. To utrudnia debugowanie i łamie narzędzia, które sprawdzają `__name__`.

`@functools.wraps(func)` to dekorator użyty wewnątrz dekoratora. Tak samo zachowują się `@app.get` we FastAPI i `@pytest.fixture`: to wszystko ten sam mechanizm.

---

<!-- .slide: data-section-id="sec-6" data-slide-key="slide-6-09" data-part="1" data-section-number="6" -->
## Dlaczego functools.wraps jest ważne (cd.)

```python
import functools

def logger(func):
    @functools.wraps(func)   # kopiuje __name__, __doc__ itd.
    def wrapper(*args, **kwargs):
        print(f"Wywołanie: {func.__name__}")
        return func(*args, **kwargs)
    return wrapper

@logger
def add(a: float, b: float) -> float:
    """Dodaje dwie kwoty."""
    return a + b

print(add.__name__)   # add  (bez wraps byłoby: wrapper)
print(add.__doc__)    # Dodaje dwie kwoty.
```

---

<!-- .slide: data-section-id="sec-6" data-slide-key="slide-6-09" data-part="2" data-section-number="6" -->
## Dlaczego functools.wraps jest ważne (cd.)

**Oczekiwany wynik:**

```text
add
Dodaje dwie kwoty.
```

- `@functools.wraps(func)` nakładany na `wrapper` kopiuje metadane: `__name__`, `__doc__`, `__annotations__`, `__module__` i inne z oryginalnej funkcji `func` na `wrapper`.
- Bez `@functools.wraps(func)` wywołanie `add.__name__` zwróciłoby `'wrapper'`, co utrudnia śledzenie błędów w logach i traceback.

---

<!-- .slide: data-section-id="sec-6" data-slide-key="slide-6-10" data-part="0" data-section-number="6" -->
## Przykład: dekorator retry z parametrami

Dekorator z parametrami wymaga dodatkowego poziomu zagnieżdżenia: zewnętrzna funkcja przyjmuje parametry i zwraca właściwy dekorator.

---

<!-- .slide: data-section-id="sec-6" data-slide-key="slide-6-10" data-part="1" data-section-number="6" -->
## Przykład: dekorator retry z parametrami (cd.)

```python
import functools
from collections.abc import Callable


def retry(times: int) -> Callable:
    def decorator(func: Callable) -> Callable:
        @functools.wraps(func)
        def wrapper(*args, **kwargs):
            for attempt in range(1, times + 1):
                try:
                    return func(*args, **kwargs)
                except ConnectionError:
                    if attempt == times:
                        raise
        return wrapper
    return decorator


@retry(times=3)
def fetch_status(doc_id: str) -> str:
    # symulacja niestabilnego połączenia
    raise ConnectionError("Brak połączenia")
```

---

<!-- .slide: data-section-id="sec-6" data-slide-key="slide-6-11" data-part="0" data-section-number="6" -->
## Wyjaśnienie: trzy poziomy zagnieżdżenia w retry

Dekorator `retry` ma trzy funkcje zagnieżdżone. Każda pełni inną rolę:

| Funkcja | Co przyjmuje | Co zwraca | Kiedy jest wywoływana |
|---|---|---|---|
| `retry(times)` | parametr `times` | `decorator` | raz, przy `@retry(3)` |
| `decorator(func)` | udekorowaną funkcję | `wrapper` | raz, przy aplikowaniu `@` |
| `wrapper(*args, **kwargs)` | argumenty funkcji | wynik lub wyjątek | przy każdym wywołaniu |

Próba wywołania z automatycznym ponowieniem:

```python
try:
    fetch_status("DOC-1")
except ConnectionError as e:
    print(f"Nieudane po 3 próbach: {e}")
# Nieudane po 3 próbach: Brak połączenia
```

Jeśli `func` zakończy się sukcesem przed wyczerpaniem `times`, `wrapper` zwraca wynik i pętla `for` kończy się wcześniej.

---

<!-- .slide: data-section-id="sec-6" data-slide-key="slide-6-11" data-part="1" data-section-number="6" -->
## Wyjaśnienie: trzy poziomy zagnieżdżenia w retry (cd.)

```python
import functools
from collections.abc import Callable


def retry(times: int) -> Callable:
    def decorator(func: Callable) -> Callable:
        @functools.wraps(func)
        def wrapper(*args, **kwargs):
            for attempt in range(1, times + 1):
                try:
                    return func(*args, **kwargs)
                except ConnectionError:
                    if attempt == times:
                        raise
        return wrapper
    return decorator


@retry(times=3)
def fetch_status(doc_id: str) -> str:
    raise ConnectionError("Brak połączenia")


try:
    fetch_status("DOC-1")
except ConnectionError as e:
    print(f"Nieudane po 3 próbach: {e}")
```

---

<!-- .slide: data-section-id="sec-6" data-slide-key="slide-6-11" data-part="2" data-section-number="6" -->
## Wyjaśnienie: trzy poziomy zagnieżdżenia w retry (cd.)

**Oczekiwany wynik:**

```text
Nieudane po 3 próbach: Brak połączenia
```

- `for attempt in range(1, times + 1):`: pętla próbuje `times` razy; `attempt` liczy od 1, żeby czytelnie sprawdzić `if attempt == times`.
- `return func(*args, **kwargs)`: jeśli wywołanie zakończy się bez wyjątku, natychmiast zwracamy wynik i wychodzimy z pętli.
- `except ConnectionError:`: łapiemy tylko `ConnectionError`; inne wyjątki propagują się w górę bez ponawiania.
- `if attempt == times: raise`: po ostatniej próbie ponownie rzucamy wyjątek, żeby wywołujący wiedział, że wszystkie próby się nie powiodły.

---

<!-- .slide: data-section-id="sec-6" data-slide-key="slide-6-12" data-part="0" data-section-number="6" -->
## Checkpoint: napisz własny dekorator mierzący czas

Sprawdź, czy rozumiesz oba mechanizmy, implementując dekorator `timeit`, który mierzy czas wykonania udekorowanej funkcji.

Wskazówki:
- `import time` i `time.perf_counter()` zwraca czas z wysoką precyzją.
- Zmierz czas przed i po wywołaniu `func(*args, **kwargs)`.
- Wypisz komunikat w stylu: `add wykonana w 0.0001s`.
- Użyj `@functools.wraps(func)`.

---

<!-- .slide: data-section-id="sec-6" data-slide-key="slide-6-12" data-part="1" data-section-number="6" -->
## Checkpoint: napisz własny dekorator mierzący czas (cd.)

Szkielet do uzupełnienia:

```python
import functools
import time

def timeit(func):
    @functools.wraps(func)
    def wrapper(*args, **kwargs):
        # Twój kod tutaj
        ...
    return wrapper

@timeit
def process_batch(docs: list[str]) -> int:
    return len(docs)

process_batch(["DOC-1", "DOC-2", "DOC-3"])
# process_batch wykonana w 0.0000s
```

---

<!-- .slide: data-section-id="sec-6" data-slide-key="slide-6-12" data-part="2" data-section-number="6" -->
## Checkpoint: napisz własny dekorator mierzący czas (cd.)

Jeśli chcesz dodać wyzwanie: zamień `timeit` na dekorator z parametrem `label`, który pojawi się w komunikacie zamiast nazwy funkcji.

---

# 7. Testowanie Kodu w pytest

---

<!-- .slide: data-section-id="sec-7" data-slide-key="slide-7-01" data-part="0" data-section-number="7" -->
## Po co pisać testy automatyczne

Wyobraź sobie, że za każdym razem, gdy zmieniasz jedną linię kodu, musisz ręcznie uruchomić skrypt, sprawdzić wynik i zastanowić się, czy nic nie zepsuło. Po dwudziestu takich zmianach zaczynasz pomijać weryfikację. Właśnie wtedy pojawiają się błędy w produkcji.

**Test automatyczny** (ang. *automated test*) to funkcja, która sprawdza zachowanie Twojego kodu i wypisuje wprost: PASSED lub FAILED. Uruchamiasz ją jedną komendą po każdej zmianie.

W tym kursie będziesz pisać testy dla każdego modułu. Od modułu 1 test będzie też Twoim kryterium ukończenia zadania: zielony `pytest` oznacza, że rozwiązanie działa.

---

<!-- .slide: data-section-id="sec-7" data-slide-key="slide-7-02" data-part="0" data-section-number="7" -->
## Jak pytest wyszukuje testy

**pytest** to framework testowy dla Pythona. Nie musisz rejestrować testów ręcznie: pytest sam je odnajduje według prostych reguł:

1. Przeszukuje bieżący katalog i podkatalogi rekurencyjnie.
2. Otwiera pliki pasujące do wzorca `test_*.py` lub `*_test.py`.
3. W każdym takim pliku uruchamia funkcje, których nazwy zaczynają się od `test_`.

Typowa struktura projektu:

```
project/
├── amounts.py        # kod produkcyjny
└── tests/
    └── test_amounts.py   # testy
```

---

<!-- .slide: data-section-id="sec-7" data-slide-key="slide-7-02" data-part="1" data-section-number="7" -->
## Jak pytest wyszukuje testy (cd.)

Uruchom pytest jedną komendą w katalogu projektu:

```bash
pytest
```

Dzięki tej konwencji nie musisz nic konfigurować na początku. pytest znajdzie testy sam.

---

<!-- .slide: data-section-id="sec-7" data-slide-key="slide-7-03" data-part="0" data-section-number="7" -->
## Asercja assert w pytest

Podstawowym narzędziem testu jest słowo kluczowe `assert`. Sprawdza ono warunek i przerywa test z komunikatem błędu, jeśli warunek jest fałszywy.

pytest przechwytuje te błędy i drukuje czytelny raport, pokazując dokładnie, jakie wartości porównywałeś.

Jeśli `result` byłoby np. `9`, pytest wyświetli:

```
AssertionError: assert 9 == 8
```

W zwykłym Pythonie `assert` można wyłączyć flagą `-O`. pytest zawsze interpretuje asercje jako warunki testu i daje im pełny, czytelny komunikat.

---

<!-- .slide: data-section-id="sec-7" data-slide-key="slide-7-03" data-part="1" data-section-number="7" -->
## Asercja assert w pytest (cd.)

```python
def add(a: float, b: float) -> float:
    return a + b

def test_add() -> None:
    result = add(3, 5)
    assert result == 8
```

- `def test_add()` to funkcja testowa wykryta przez pytest (nazwa zaczyna się od `test_`).
- `assert result == 8` sprawdza, czy zwrócona wartość jest równa oczekiwanej. Gdy warunek jest fałszywy, pytest pokazuje rzeczywistą i oczekiwaną wartość obok siebie.

---

<!-- .slide: data-section-id="sec-7" data-slide-key="slide-7-04" data-part="0" data-section-number="7" -->
## Testowanie wyjątków: pytest.raises

Dobry kod zgłasza wyjątki w odpowiednich sytuacjach. Warto to przetestować: nie tylko sprawdzić, że funkcja działa przy poprawnych danych, ale też że **odmawia działania** przy niepoprawnych.

**`pytest.raises`** (ang. *context manager for expected exceptions*) to menedżer kontekstu, który przechwytuje oczekiwany wyjątek. Jeśli wyjątek nie zostanie zgłoszony, test kończy się FAILED.

```python
import pytest
from amounts import InvalidAmountError, parse_amount

def test_negative_amount_raises() -> None:
    with pytest.raises(InvalidAmountError):
        parse_amount("-5 zł")
```

---

<!-- .slide: data-section-id="sec-7" data-slide-key="slide-7-04" data-part="1" data-section-number="7" -->
## Testowanie wyjątków: pytest.raises (cd.)

Możesz też sprawdzić treść komunikatu błędu:

```python
def test_error_message() -> None:
    with pytest.raises(InvalidAmountError, match="ujemna"):
        parse_amount("-5 zł")
```

- `with pytest.raises(InvalidAmountError):` informuje pytest, że blok kodu wewnątrz powinien zgłosić dokładnie ten wyjątek.
- Jeśli `parse_amount` zwróci wartość zamiast rzucić wyjątkiem, pytest oznaczy test jako FAILED.
- Parametr `match="ujemna"` sprawdza, czy komunikat wyjątku zawiera podany ciąg znaków (wyrażenie regularne).

---

<!-- .slide: data-section-id="sec-7" data-slide-key="slide-7-05" data-part="0" data-section-number="7" -->
## Parametryzacja testów: @pytest.mark.parametrize

Zamiast pisać oddzielną funkcję testową dla każdego przypadku, użyj **`@pytest.mark.parametrize`**. Dekorator ten uruchamia tę samą funkcję testową wielokrotnie, za każdym razem z innymi danymi wejściowymi.

Poniżej widzisz pełny test `parse_amount` z trzema zestawami danych:

```python
import pytest
from amounts import parse_amount

@pytest.mark.parametrize("raw, expected", [
    ("100 zł", 100.0),
    ("1 234,56 zł", 1234.56),
    ("0,99", 0.99),
])
def test_parse_amount_valid(raw: str, expected: float) -> None:
    assert parse_amount(raw) == pytest.approx(expected)
```

W raporcie pytest zobaczysz trzy osobne wiersze, jeden dla każdego zestawu.

---

<!-- .slide: data-section-id="sec-7" data-slide-key="slide-7-05" data-part="1" data-section-number="7" -->
## Parametryzacja testów: @pytest.mark.parametrize (cd.)

- `@pytest.mark.parametrize("raw, expected", [...])` definiuje nazwy parametrów i listę krotek z wartościami. Każda krotka to jeden przebieg testu.
- `pytest.approx(expected)` jest konieczny przy porównywaniu liczb zmiennoprzecinkowych (`float`). Bezpośrednie `==` może się nie zgadzać przez błędy zaokrąglenia, np. `0.1 + 0.2 != 0.3` w arytmetyce binarnej. `pytest.approx` akceptuje małe różnice.

---

<!-- .slide: data-section-id="sec-7" data-slide-key="slide-7-06" data-part="0" data-section-number="7" -->
## Parametryzacja testów wyjątków

Parametryzację możesz połączyć z `pytest.raises`. W ten sposób testujesz wiele niepoprawnych danych wejściowych bez powielania kodu:

```python
import pytest
from amounts import InvalidAmountError, parse_amount

@pytest.mark.parametrize("raw", ["abc", "-5 zł", ""])
def test_parse_amount_invalid(raw: str) -> None:
    with pytest.raises(InvalidAmountError):
        parse_amount(raw)
```

Uruchom oba pliki testowe razem:

```bash
pytest -v
```

---

<!-- .slide: data-section-id="sec-7" data-slide-key="slide-7-06" data-part="1" data-section-number="7" -->
## Parametryzacja testów wyjątków (cd.)

Oczekiwany wynik w terminalu:

```
test_amounts.py::test_parse_amount_valid[100 zł-100.0] PASSED
test_amounts.py::test_parse_amount_valid[1 234,56 zł-1234.56] PASSED
test_amounts.py::test_parse_amount_valid[0,99-0.99] PASSED
test_amounts.py::test_parse_amount_invalid[abc] PASSED
test_amounts.py::test_parse_amount_invalid[-5 zł] PASSED
test_amounts.py::test_parse_amount_invalid[] PASSED
```

- Gdy parametryzujesz jeden argument, podajesz samą jego nazwę jako string (`"raw"`), a listę wartości (nie krotek).
- Flaga `-v` (verbose) wypisuje pełne nazwy testów z wartościami parametrów. Bez `-v` zobaczysz tylko kropki i litery.

---

<!-- .slide: data-section-id="sec-7" data-slide-key="slide-7-07" data-part="0" data-section-number="7" -->
## Wspólne dane wejściowe: @pytest.fixture

Gdy kilka testów potrzebuje tych samych danych wejściowych (np. listy faktur, obiektu Invoice, otwartego pliku), unikasz powielania kodu dzięki **fixture** (ang. *test fixture*).

Fixture to funkcja ozdobiona dekoratorem `@pytest.fixture`. pytest automatycznie ją wywoła i przekaże wynik jako argument do funkcji testowej.

---

<!-- .slide: data-section-id="sec-7" data-slide-key="slide-7-07" data-part="1" data-section-number="7" -->
## Wspólne dane wejściowe: @pytest.fixture (cd.)

```python
import pytest
from amounts import parse_amount

@pytest.fixture
def valid_amounts() -> list[tuple[str, float]]:
    return [
        ("100 zł", 100.0),
        ("1 234,56 zł", 1234.56),
    ]

def test_all_valid(valid_amounts: list[tuple[str, float]]) -> None:
    for raw, expected in valid_amounts:
        assert parse_amount(raw) == pytest.approx(expected)
```

- `@pytest.fixture` rejestruje funkcję jako zasób testowy.
- pytest dopasowuje fixture po nazwie parametru funkcji testowej: parametr `valid_amounts` odpowiada fixture o nazwie `valid_amounts`.

---

<!-- .slide: data-section-id="sec-7" data-slide-key="slide-7-07" data-part="2" data-section-number="7" -->
## Wspólne dane wejściowe: @pytest.fixture (cd.)

- Fixture możesz umieścić w tym samym pliku lub w specjalnym pliku `conftest.py`, skąd jest dostępna dla wszystkich plików testowych w katalogu.

---

<!-- .slide: data-section-id="sec-7" data-slide-key="slide-7-08" data-part="0" data-section-number="7" -->
## Testowanie operacji na plikach: tmp_path

Gdy testujesz kod, który czyta lub zapisuje pliki, nie chcesz zostawiać śmieci na dysku ani zależeć od istniejących plików. pytest dostarcza wbudowaną fixture **`tmp_path`**, która tworzy tymczasowy katalog na czas testu i usuwa go po zakończeniu.

---

<!-- .slide: data-section-id="sec-7" data-slide-key="slide-7-08" data-part="1" data-section-number="7" -->
## Testowanie operacji na plikach: tmp_path (cd.)

```python
import json
from pathlib import Path
import pytest
from invoices import load_invoices  # funkcja z sekcji 0.4

def test_load_invoices_skips_broken(tmp_path: Path) -> None:
    good = tmp_path / "good.json"
    good.write_text('{"id": "FV-1", "amount": 100.0}', encoding="utf-8")

    bad = tmp_path / "bad.json"
    bad.write_text("{ NIE JSON }", encoding="utf-8")

    invoices, broken = load_invoices(tmp_path)

    assert len(invoices) == 1
    assert broken == ["bad.json"]
```

---

<!-- .slide: data-section-id="sec-7" data-slide-key="slide-7-08" data-part="2" data-section-number="7" -->
## Testowanie operacji na plikach: tmp_path (cd.)

- `tmp_path` to obiekt `pathlib.Path` wskazujący na unikalny katalog tymczasowy. Każdy test dostaje własny, odizolowany katalog.
- `good.write_text(...)` tworzy plik z podaną zawartością bez konieczności otwierania go przez `open`.
- Po zakończeniu testu pytest usuwa katalog tymczasowy. Twój dysk pozostaje czysty.

---

<!-- .slide: data-section-id="sec-7" data-slide-key="slide-7-09" data-part="0" data-section-number="7" -->
## Uruchamianie i filtrowanie testów: pytest -v i pytest -k

Gdy projekt rośnie, przydaje się możliwość uruchomienia tylko wybranych testów.

<!-- two-column -->
**Przydatne flagi pytest:**

| Komenda | Działanie |
|---|---|
| `pytest` | wszystkie testy |
| `pytest -v` | szczegółowy raport z nazwami |
| `pytest -k valid` | tylko testy zawierające `valid` w nazwie |
| `pytest -k "valid or raises"` | testy pasujące do wyrażenia |
| `pytest tests/test_amounts.py` | testy z jednego pliku |
| `pytest --tb=short` | skrócony traceback przy błędzie |

Przykład filtrowania:

```bash
pytest -v -k invalid
```

---

<!-- .slide: data-section-id="sec-7" data-slide-key="slide-7-09" data-part="1" data-section-number="7" -->
## Uruchamianie i filtrowanie testów: pytest -v i pytest -k (cd.)

Uruchomi tylko funkcje testowe, których nazwa zawiera `invalid`, np. `test_parse_amount_invalid`.

---

<!-- .slide: data-section-id="sec-7" data-slide-key="slide-7-10" data-part="0" data-section-number="7" -->
## Checkpoint: pytest -v pokazuje PASSED

Teraz masz wszystkie narzędzia, żeby przetestować funkcję `parse_amount` z pliku `amounts.py` (sekcja 0.3). Utwórz plik `tests/test_amounts.py` z testami z poprzednich slajdów.

Testy w katalogu `tests/` importują kod z katalogu projektu. Sam `pytest` nie dodaje tego katalogu do ścieżki importu, więc bez konfiguracji zobaczysz `ModuleNotFoundError: No module named 'amounts'`. Utwórz w katalogu projektu plik `pyproject.toml` (albo dopisz do istniejącego):

```toml
[tool.pytest.ini_options]
pythonpath = ["."]
```

Uruchom testy:

```bash
pytest -v
```

---

<!-- .slide: data-section-id="sec-7" data-slide-key="slide-7-10" data-part="1" data-section-number="7" -->
## Checkpoint: pytest -v pokazuje PASSED (cd.)

**Oczekiwany wynik:**

```text
tests/test_amounts.py::test_parse_amount_valid[100 zł-100.0] PASSED
tests/test_amounts.py::test_parse_amount_valid[1 234,56 zł-1234.56] PASSED
tests/test_amounts.py::test_parse_amount_valid[0,99-0.99] PASSED
tests/test_amounts.py::test_parse_amount_invalid[abc] PASSED
tests/test_amounts.py::test_parse_amount_invalid[-5 zł] PASSED
tests/test_amounts.py::test_parse_amount_invalid[] PASSED

6 passed in 0.05s
```

Pusty tekst `""` pytest pokazuje w nazwie testu jako `[]`. Jeśli widzisz `6 passed`, sekcja 0.7 jest za Tobą. W kolejnych modułach będziesz rozszerzać testy o atrapy (ang. *mock*) klienta LLM.

---

# 8. Protokoły HTTP, JSON REST API i Wprowadzenie do Asyncio

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-01" data-part="0" data-section-number="8" -->
## Dlaczego HTTP i asyncio są fundamentem aplikacji AI

Gdy Twój program wysyła pytanie do modelu językowego (np. GPT albo Claude), model **nie działa na Twoim komputerze**, lecz na serwerach dostawcy. Twój kod wysyła przez internet **zapytanie HTTP** z pytaniem, a po chwili dostaje **odpowiedź HTTP** z wynikiem.

To samo dotyczy prawie wszystkiego w kursie:
- wywołania API OpenAI,
- wywołania API Anthropic,
- zapytania do bazy wektorowej Qdrant (Moduł 7),
- Twoje własne API w FastAPI, z którym będą się łączyć inni.

Odpowiedź modelu AI potrafi trwać kilka, a nawet kilkadziesiąt sekund. Jeśli program przez ten czas nie wykonuje innych zadań, spowalnia to działanie całej aplikacji. Rozwiązaniem jest **programowanie asynchroniczne** (`asyncio`): w trakcie czekania na jedną odpowiedź program zajmuje się innymi zadaniami.

W tej sekcji poznasz oba tematy od podstaw.

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-02" data-part="0" data-section-number="8" -->
## Model klient-serwer

Komunikacja w internecie opiera się na dwóch rolach:

- **Klient** (ang. *client*) **wysyła żądanie** i czeka na odpowiedź. Klientem jest przeglądarka, aplikacja w telefonie, gra sieciowa albo Twój skrypt w Pythonie.
- **Serwer** (ang. *server*) **odbiera żądanie, przetwarza je i odsyła odpowiedź**. Serwerem jest np. API OpenAI albo Twoja aplikacja FastAPI.

```text
  KLIENT                                         SERWER
  (Twój skrypt)                                  (np. API modelu AI)

     │ ── 1. Żądanie (request): "Streść ten dokument" ──►  │
     │                                                     │ 2. przetwarzanie
     │ ◄── 3. Odpowiedź (response): "Dokument dotyczy…" ── │
```

**HTTP** (*HyperText Transfer Protocol*) to **protokół**, czyli umowa o tym, jak takie żądania i odpowiedzi mają wyglądać. Dzięki temu dowolny klient porozumie się z dowolnym serwerem. **HTTPS** to ta sama umowa, ale z szyfrowaniem: nikt po drodze nie podejrzy treści (np. Twojego klucza API).

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-02" data-part="1" data-section-number="8" -->
## Model klient-serwer (cd.)

Ważne: **komunikację zawsze zaczyna klient**. Serwer nie wyśle nic sam z siebie: odpowiada tylko na żądania.

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-03" data-part="0" data-section-number="8" -->
## Anatomia adresu URL

Każde żądanie HTTP jest wysyłane pod konkretny adres **URL**. Rozłóżmy przykładowy adres na części:

```text
https://api.example.com/v1/documents/DOC-101?format=json&lang=pl
└─┬──┘   └──────┬──────┘└────────┬─────────┘└─────────┬─────────┘
schemat       host           ścieżka          parametry zapytania
```

| Część | Znaczenie |
|---|---|
| **Schemat** `https` | Protokół (z szyfrowaniem) |
| **Host** `api.example.com` | Adres serwera w internecie |
| **Ścieżka** `/v1/documents/DOC-101` | Który zasób na serwerze nas interesuje (tu: dokument DOC-101 w wersji 1 API) |
| **Parametry zapytania** `?format=json&lang=pl` | Dodatkowe opcje: zaczynają się od `?`, kolejne łączymy znakiem `&` |

**Endpoint** to konkretna kombinacja metody i ścieżki udostępniona przez API, np. `GET /v1/documents/{id}`. 

W Filarze I będziesz tworzyć własne endpointy w FastAPI.

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-04" data-part="0" data-section-number="8" -->
## Budowa żądania HTTP: metoda, nagłówki, ciało

Żądanie HTTP to po prostu tekst o ustalonej budowie. Tak wygląda żądanie utworzenia dokumentu:

```text
POST /v1/documents HTTP/1.1                       ← metoda, ścieżka, wersja protokołu
Host: api.example.com                             ← nagłówki (headers)
Content-Type: application/json
Authorization: Bearer sk-twoj-klucz-api
                                                  ← pusta linia oddziela nagłówki od ciała
{"doc_id": "DOC-101", "content": "Umowa NDA"}     ← ciało (body)
```

- **Metoda** mówi, **co chcesz zrobić** (pobrać, utworzyć, zmienić, usunąć).
- **Nagłówki** (ang. *headers*) to **metadane** w formacie `Nazwa: wartość`. Najważniejsze dla Ciebie:
  - `Content-Type: application/json` informuje, że ciało jest w formacie JSON,
  - `Authorization: Bearer <klucz>` przekazuje klucz API, czyli „kim jestem i czy mam dostęp”.
- **Ciało** (ang. *body*) to właściwe dane, zwykle JSON. Żądania typu GET najczęściej nie mają ciała.

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-05" data-part="0" data-section-number="8" -->
## Metody HTTP: GET, POST, PUT, DELETE

| Metoda | Co robi | Ciało | Przykład w projekcie |
|---|---|---|---|
| **GET** | Pobiera dane, niczego nie zmienia | Nie | Pobierz dokument `DOC-101` |
| **POST** | Tworzy nowy zasób lub uruchamia akcję | Tak | Wyślij dokument do analizy; zapytaj model AI |
| **PUT** | Zastępuje istniejący zasób nową wersją | Tak | Zaktualizuj treść dokumentu `DOC-101` |
| **DELETE** | Usuwa zasób | Zwykle nie | Usuń dokument `DOC-101` |

Te cztery metody odpowiadają podstawowym operacjom na danych, często nazywanym **CRUD**: *Create* (POST), *Read* (GET), *Update* (PUT), *Delete* (DELETE).

API zbudowane według tych zasad (zasoby pod adresami URL, metody HTTP jako operacje, JSON jako format danych) nazywamy **REST API**. Większość API, z którymi będziesz pracować w kursie, działa właśnie w ten sposób.

Ciekawostka: wysłanie pytania do modelu AI to zwykle **POST**, choć niczego nie „tworzysz” w sensie bazy danych. POST służy też do uruchamiania akcji, które przyjmują dane wejściowe.

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-06" data-part="0" data-section-number="8" -->
## Odpowiedź HTTP i kody statusu

Każda odpowiedź zawiera **kod statusu**: trzycyfrową liczbę, która mówi, jak poszło. Pierwsza cyfra określa grupę:


| Kod | Znaczenie | Kiedy go zobaczysz |
|---|---|---|
| **200** OK | Sukces | Prawidłowa odpowiedź modelu AI |
| **201** Created | Utworzono zasób | Dodanie dokumentu przez POST |
| **400** Bad Request | Błędne żądanie | Zły format JSON, brak wymaganego pola |
| **401** Unauthorized | Brak lub zły klucz API | Literówka w kluczu, klucz nie wczytał się z `.env` |
| **403** Forbidden | Brak uprawnień | Klucz nie ma dostępu do danego modelu |
| **404** Not Found | Nie ma takiego zasobu | Literówka w adresie URL |

| Kod | Znaczenie | Kiedy go zobaczysz |
|---|---|---|
| **422** Unprocessable Entity | Dane nie przeszły walidacji | Standardowy błąd walidacji w FastAPI |
| **429** Too Many Requests | Za dużo zapytań lub brak środków | Limit zapytań u dostawcy AI albo puste saldo |
| **500** Internal Server Error | Błąd po stronie serwera | Błąd w kodzie Twojego API |
| **503** Service Unavailable | Serwer chwilowo niedostępny | Przeciążenie usługi; spróbuj ponownie później |

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-06" data-part="1" data-section-number="8" -->
## Odpowiedź HTTP i kody statusu (cd.)

Zapamiętaj zasadę: **2xx** = sukces, **4xx** = **błąd klienta** (problem leży po Twojej stronie: popraw żądanie), **5xx** = **błąd serwera** (problem leży po stronie usługi).

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-07" data-part="0" data-section-number="8" -->
## Zobacz HTTP na żywo: curl

**curl** to program do wysyłania żądań HTTP z terminala, wbudowany w Windows 10/11, macOS i większość dystrybucji Linuksa. Użyjemy darmowego serwisu testowego **httpbin.org**, który odsyła z powrotem wszystko, co mu wyślesz.

```bash
# Windows: koniecznie z .exe (samo "curl" w PowerShellu to inna komenda)
curl.exe -i "https://httpbin.org/get?doc_id=DOC-101"

# macOS / Linux
curl -i "https://httpbin.org/get?doc_id=DOC-101"
```

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-07" data-part="1" data-section-number="8" -->
## Zobacz HTTP na żywo: curl (cd.)

**Oczekiwany wynik:**

```text
HTTP/1.1 200 OK
content-type: application/json
content-length: 240
...

{
  "args": {
    "doc_id": "DOC-101"
  },
  "headers": {
    "Accept": "*/*",
    "Host": "httpbin.org",
    "User-Agent": "curl/8.12.1"
  },
  "url": "https://httpbin.org/get?doc_id=DOC-101"
}
```

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-07" data-part="2" data-section-number="8" -->
## Zobacz HTTP na żywo: curl (cd.)

Opcja `-i` pokazuje także **linię statusu i nagłówki** odpowiedzi (część nad pustą linią). Pod nimi jest **ciało** w formacie JSON. Widzisz w nim parametr `doc_id` z adresu URL i nagłówki, które curl wysłał automatycznie.

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-08" data-part="0" data-section-number="8" -->
## HTTP z Pythona: biblioteka httpx

W kodzie nie używamy curla, tylko biblioteki **httpx**. Ma prosty interfejs i (co ważne) obsługuje także tryb asynchroniczny. Z tej samej biblioteki korzystają oficjalne pakiety OpenAI i Anthropic.

```bash
uv pip install httpx
```

Utwórz plik **`http_get.py`**:

```python
import httpx

response = httpx.get("https://httpbin.org/get", params={"doc_id": "DOC-101"})

print(response.status_code)                 # kod statusu
print(response.headers["content-type"])     # wybrany nagłówek odpowiedzi
data = response.json()                      # ciało JSON -> słownik Pythona
print(data["args"])
```

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-08" data-part="1" data-section-number="8" -->
## HTTP z Pythona: biblioteka httpx (cd.)

**Oczekiwany wynik** (`uv run python http_get.py`):

```text
200
application/json
{'doc_id': 'DOC-101'}
```

`params={...}` buduje parametry zapytania za Ciebie (`?doc_id=DOC-101`). Metoda `.json()` robi to samo co `json.loads(response.text)` z sekcji 0.4: zamienia ciało odpowiedzi na słownik.

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-09" data-part="0" data-section-number="8" -->
## POST z ciałem JSON i nagłówkami

Tak wygląda schemat każdego wywołania API modelu AI: **POST + JSON w ciele + klucz w nagłówku**. Utwórz plik **`http_post.py`**:

```python
import httpx

payload = {"doc_id": "DOC-101", "content": "Umowa NDA"}

response = httpx.post(
    "https://httpbin.org/post",
    json=payload,                                        # słownik -> ciało JSON
    headers={"Authorization": "Bearer sk-test-123"},     # przykładowy, nieprawdziwy klucz
)

print(response.status_code)
print(response.json()["json"])                           # httpbin odsyła nasze ciało
print(response.json()["headers"]["Authorization"])       # ... i nasze nagłówki
```

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-09" data-part="1" data-section-number="8" -->
## POST z ciałem JSON i nagłówkami (cd.)

**Oczekiwany wynik:**

```text
200
{'content': 'Umowa NDA', 'doc_id': 'DOC-101'}
Bearer sk-test-123
```

Parametr `json=` sam zamienia słownik na tekst JSON i dodaje nagłówek `Content-Type: application/json`. Gdy w Filarze I wywołasz prawdziwy model AI, zmieni się tylko adres URL, zawartość `payload` i prawdziwy klucz w nagłówku (który wczytasz z pliku `.env`, a nie wpiszesz w kodzie: o tym w sekcji 0.4).

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-10" data-part="0" data-section-number="8" -->
## Obsługa błędów HTTP w kodzie

Odpowiedź z kodem 4xx lub 5xx **nie zatrzymuje programu**: httpx zwraca ją normalnie, a sprawdzenie statusu należy do Ciebie.

```python
import httpx

response = httpx.get("https://httpbin.org/status/404")
print(response.status_code, response.is_success)

try:
    response.raise_for_status()          # zgłoś wyjątek, jeśli status to 4xx lub 5xx
except httpx.HTTPStatusError as e:
    print(f"Błąd HTTP: {e.response.status_code}")
```

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-10" data-part="1" data-section-number="8" -->
## Obsługa błędów HTTP w kodzie (cd.)

**Oczekiwany wynik:**

```text
404 False
Błąd HTTP: 404
```

- `response.is_success` ma wartość `True` dla kodów 2xx.
- `response.raise_for_status()` zamienia odpowiedź z błędem w wyjątek, który przechwycisz `try`/`except`.

Dobra praktyka: **zawsze sprawdzaj status** przed odczytaniem `.json()`. Odpowiedź z błędem często ma w ciele komunikat zamiast spodziewanych danych, a próba odczytu `data["wynik"]` skończy się mylącym `KeyError`.

Jeśli httpbin.org zwraca `503`, serwis jest chwilowo przeciążony: spróbuj ponownie za kilka minut.

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-11" data-part="0" data-section-number="8" -->
## Problem z kodem synchronicznym: drugie zapytanie rozpoczyna się dopiero po zakończeniu pierwszego

Zasymulujmy pobieranie statusu dwóch dokumentów z API, które odpowiada po 2 sekundach. Utwórz plik **`sync_demo.py`**:

```python
import time

def fetch_remote_doc_status(doc_id: str, delay: int) -> dict:
    print(f"[START] Pobieranie statusu dla {doc_id}...")
    time.sleep(delay)  # Symulacja oczekiwania na sieciowe API
    print(f"[SUCCESS] Pobrano status dla {doc_id}")
    return {"doc_id": doc_id, "status": "PROCESSED"}

start_time = time.time()
results = [fetch_remote_doc_status("DOC-001", 2), fetch_remote_doc_status("DOC-002", 2)]
print(f"Wyniki: {results}")
print(f"Czas wykonania: {time.time() - start_time:.2f}s")
```

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-11" data-part="1" data-section-number="8" -->
## Problem z kodem synchronicznym: drugie zapytanie rozpoczyna się dopiero po zakończeniu pierwszego (cd.)

**Oczekiwany wynik:**

```text
[START] Pobieranie statusu dla DOC-001...
[SUCCESS] Pobrano status dla DOC-001
[START] Pobieranie statusu dla DOC-002...
[SUCCESS] Pobrano status dla DOC-002
Wyniki: [{'doc_id': 'DOC-001', 'status': 'PROCESSED'}, {'doc_id': 'DOC-002', 'status': 'PROCESSED'}]
Czas wykonania: 4.00s
```

Program działa **synchronicznie**: drugie zapytanie rozpoczyna się dopiero po zakończeniu pierwszego. Przez 4 sekundy program w tym czasie czeka na odpowiedź. Przy 100 dokumentach byłoby to ponad 3 minuty bezczynności.

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-12" data-part="0" data-section-number="8" -->
## Analogia: kelner w restauracji

Wyobraź sobie kelnera, który obsługuje dwa stoliki:

**Kelner synchroniczny:** przyjmuje zamówienie od stolika 1, zanosi je do kuchni i **stoi przy okienku**, aż danie będzie gotowe. Dopiero potem idzie do stolika 2. Stolik 2 przez ten cały czas czekał.

**Kelner asynchroniczny:** przyjmuje zamówienie od stolika 1, zanosi je do kuchni i **od razu idzie do stolika 2**. Gdy kuchnia zawoła „danie dla stolika 1 gotowe!”, wraca i je zanosi.

Kuchnia (serwer API) gotuje tyle samo czasu. Różnica polega na tym, że kelner (Twój program) **nie marnuje czasu na stanie i czekanie**. Jeden kelner obsługuje wiele stolików.

Ważne: kelner asynchroniczny **nie nosi talerzy szybciej i nie ma więcej rąk**, podobnie asyncio nie skraca czasu samych obliczeń. Pozwala jednak wykonywać inne zadania podczas oczekiwania na odpowiedź API modelu AI lub bazy danych. Dzięki temu **cały program może zakończyć pracę wcześniej**. Zadania, w których większość czasu zajmuje oczekiwanie na przesłanie lub odczyt danych, nazywamy **I/O-bound**(ograniczonymi przez wejście/wyjście).

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-13" data-part="0" data-section-number="8" -->
## Podstawy programowania asynchronicznego w Pythonie

W Pythonie „kelnera asynchronicznego” budujesz z następujących elementów:

- **`async def`** definiuje **korutynę** (ang. *coroutine*): funkcję, która może wstrzymać swoje wykonanie podczas oczekiwania na wynik. W tym czasie mogą działać inne zadania.
- **`await`** wskazuje operację, na której zakończenie korutyna ma poczekać. Używamy go wewnątrz funkcji zdefiniowanej przez `async def`.
- **Pętla zdarzeń** (ang. *event loop*) zarządza wykonywaniem zadań. Gdy jedno czeka na wynik, może uruchomić inne, a później wrócić do wstrzymanego zadania. Funkcja **`asyncio.run(...)`** uruchamia pętlę i przekazaną korutynę.
- **`asyncio.gather(...)`** pozwala uruchomić kilka korutyn współbieżnie. Zwraca ich wyniki w kolejności, w jakiej przekazano korutyny, nawet jeśli zakończyły się w innej kolejności.

```text
asyncio.run(main())
   └─ pętla zdarzeń
        ├─ zadanie DOC-001: start → await (czeka 2 s) ──────────► koniec
        └─ zadanie DOC-002: start → await (czeka 2 s) ──────────► koniec
                            oba czekają RÓWNOCZEŚNIE → łącznie ~2 s
```

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-14" data-part="0" data-section-number="8" -->
## Twój pierwszy skrypt asynchroniczny

Utwórz plik **`async_demo.py`**. To ten sam przykład, przepisany na asyncio:

```python
import asyncio
import time

async def fetch_remote_doc_status(doc_id: str, delay: int) -> dict:
    print(f"[START] Pobieranie statusu dla {doc_id}...")
    await asyncio.sleep(delay)  # Symulacja oczekiwania na sieciowe API
    print(f"[SUCCESS] Pobrano status dla {doc_id}")
    return {"doc_id": doc_id, "status": "PROCESSED"}

async def main() -> None:
    start_time = time.time()
    # Równoległe uruchomienie dwóch asynchronicznych zadań
    results = await asyncio.gather(
        fetch_remote_doc_status("DOC-001", 2),
        fetch_remote_doc_status("DOC-002", 2),
    )
    print(f"Wyniki: {results}")
    print(f"Czas wykonania: {time.time() - start_time:.2f}s (zamiast 4.00s)")

if __name__ == "__main__":
    asyncio.run(main())
```

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-14" data-part="1" data-section-number="8" -->
## Twój pierwszy skrypt asynchroniczny (cd.)

**Oczekiwany wynik:**

```text
[START] Pobieranie statusu dla DOC-001...
[START] Pobieranie statusu dla DOC-002...
[SUCCESS] Pobrano status dla DOC-001
[SUCCESS] Pobrano status dla DOC-002
Wyniki: [{'doc_id': 'DOC-001', 'status': 'PROCESSED'}, {'doc_id': 'DOC-002', 'status': 'PROCESSED'}]
Czas wykonania: 2.01s (zamiast 4.00s)
```

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-15" data-part="0" data-section-number="8" -->
## Co się zmieniło: analiza krok po kroku

Porównaj wynik z wersją synchroniczną: **oba `[START]` pojawiły się od razu, jeden po drugim**, a czas spadł z 4 do 2 sekund.

Zmiany w kodzie:
1. `def` → **`async def`**: funkcja stała się korutyną.
2. `time.sleep(delay)` → **`await asyncio.sleep(delay)`**: zamiast blokować cały program, korutyna oddaje sterowanie pętli zdarzeń.
3. **`asyncio.gather(...)`** uruchamia oba zadania współbieżnie i czeka, aż oba się zakończą.
4. **`asyncio.run(main())`** tworzy pętlę zdarzeń i uruchamia w niej korutynę `main()`.

Co się działo „pod spodem”:
- pętla uruchomiła zadanie DOC-001, które doszło do `await` i się wstrzymało,
- pętla natychmiast uruchomiła DOC-002, które też doszło do `await`,
- przez 2 sekundy oba zadania czekały **jednocześnie**, po czym pętla je wznowiła.

`if __name__ == "__main__":` oznacza: „wykonaj ten kod tylko wtedy, gdy uruchamiasz ten plik bezpośrednio”, a nie gdy inny plik go importuje. Znasz go z sekcji 0.3: dzięki niemu testy mogą importować Twój kod.

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-16" data-part="0" data-section-number="8" -->
## asyncio z prawdziwym HTTP: httpx.AsyncClient

`asyncio.sleep` to tylko symulacja. Teraz wyślemy **trzy prawdziwe zapytania** do adresu, który celowo odpowiada po 1 sekundzie. Utwórz **`async_http.py`**:

```python
import asyncio
import time

import httpx

async def fetch(client: httpx.AsyncClient, url: str) -> int:
    response = await client.get(url)     # await: czekając na sieć, puszczamy inne zadania
    return response.status_code

async def main() -> None:
    start = time.time()
    urls = ["https://httpbin.org/delay/1"] * 3
    async with httpx.AsyncClient(timeout=30) as client:
        codes = await asyncio.gather(*(fetch(client, url) for url in urls))
    print(codes, f"{time.time() - start:.2f}s")

asyncio.run(main())
```

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-16" data-part="1" data-section-number="8" -->
## asyncio z prawdziwym HTTP: httpx.AsyncClient (cd.)

**Oczekiwany wynik** (czas zależy od Twojego łącza):

```text
[200, 200, 200] 2.32s
```

Trzy zapytania po 1 sekundzie każde zajęły łącznie od 1 do 2,5 s, a nie ponad 3 s. Zapis `*(...)` rozpakowuje listę korutyn na osobne argumenty dla `gather`. `async with` otwiera klienta HTTP i zamyka go automatycznie po zakończeniu bloku (jak `with open(...)` w sekcji 0.4). W ten sposób w Filarze I przetworzysz wiele dokumentów przez API modelu AI naraz, zamiast jeden po drugim.

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-17" data-part="0" data-section-number="8" -->
## Najczęstsze błędy w asyncio

**1. Zapomniane `await`.** Wywołanie korutyny bez `await` **nie wykonuje jej**: zwraca tylko obiekt korutyny.

```python
import asyncio

async def get_status() -> str:
    await asyncio.sleep(0.1)
    return "PROCESSED"

async def main() -> None:
    status = get_status()      # brak await!
    print(status)

asyncio.run(main())
```

```text
<coroutine object get_status at 0x000001F6CEE12B00>
RuntimeWarning: coroutine 'get_status' was never awaited
```

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-17" data-part="1" data-section-number="8" -->
## Najczęstsze błędy w asyncio (cd.)

Gdy zobaczysz w wyniku `<coroutine object ...>` albo ostrzeżenie `was never awaited`, szukaj brakującego `await`. Poprawnie: `status = await get_status()`.

**2. `time.sleep()` lub inne blokujące wywołanie w `async def`.** Zatrzymuje **całą** pętlę zdarzeń, więc wszystkie zadania czekają. W kodzie asynchronicznym używaj `await asyncio.sleep()` i asynchronicznych bibliotek (`httpx.AsyncClient` zamiast `httpx.get`).

**3. `RuntimeError: asyncio.run() cannot be called from a running event loop`.** Pojawia się w Jupyter Notebook, gdzie pętla już działa. Tam zamiast `asyncio.run(main())` napisz po prostu `await main()`.

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-18" data-part="0" data-section-number="8" -->
## asyncio.gather i błędy: return_exceptions=True

Domyślnie pierwszy wyjątek w jednej z korutyn przerywa oczekiwanie `asyncio.gather` i trafia do Ciebie, a wyniki pozostałych zadań przepadają. Przy przetwarzaniu wielu dokumentów lepiej zebrać wszystkie wyniki i błędy. Służy do tego parametr **`return_exceptions=True`**: wyjątek staje się zwykłym elementem listy wyników.

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-18" data-part="1" data-section-number="8" -->
## asyncio.gather i błędy: return_exceptions=True (cd.)

```python
import asyncio


async def classify(doc_id: str) -> str:
    await asyncio.sleep(0.1)
    if doc_id == "DOC-2":
        raise ConnectionError(f"API niedostępne dla {doc_id}")
    return "invoice"


async def main() -> None:
    ids = ["DOC-1", "DOC-2", "DOC-3"]
    results = await asyncio.gather(*(classify(i) for i in ids), return_exceptions=True)
    for doc_id, result in zip(ids, results):
        if isinstance(result, Exception):
            print(f"{doc_id}: błąd ({result})")
        else:
            print(f"{doc_id}: {result}")


asyncio.run(main())
```

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-18" data-part="2" data-section-number="8" -->
## asyncio.gather i błędy: return_exceptions=True (cd.)

**Oczekiwany wynik:**

```text
DOC-1: invoice
DOC-2: błąd (API niedostępne dla DOC-2)
DOC-3: invoice
```

Ponawianie prób dla korutyn działa jak dekorator `retry` z sekcji 0.6, z jedną różnicą: `wrapper` też musi być zdefiniowany przez `async def` i wywoływać oryginalną funkcję przez `await func(*args, **kwargs)`.

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-19" data-part="0" data-section-number="8" -->
## Definition of Done, sekcja 0.8: checklista weryfikacyjna

Zanim przejdziesz do sekcji 0.9, upewnij się, że potrafisz:
- Wyjaśnić model klient-serwer i rozłożyć adres URL na schemat, host, ścieżkę i parametry
- Wymienić części żądania HTTP (metoda, nagłówki, ciało) i wyjaśnić rolę nagłówków `Content-Type` i `Authorization`
- Dobrać metodę HTTP do operacji: GET, POST, PUT, DELETE
- Odróżnić kody 2xx, 4xx i 5xx oraz powiedzieć, co oznaczają 401, 404 i 429
- Wysłać żądanie GET i POST z Pythona przez `httpx` i sprawdzić status odpowiedzi
- Wyjaśnić, dlaczego kod synchroniczny marnuje czas przy wywołaniach sieciowych (np. do API modeli AI)
- Napisać korutynę `async def`, użyć `await`, uruchomić kilka zadań przez `asyncio.gather` i cały program przez `asyncio.run`
- Rozpoznać błąd zapomnianego `await`
- Uruchomić `async_demo.py` z czasem ok. 2 s zamiast 4 s

---

<!-- .slide: data-section-id="sec-8" data-slide-key="slide-8-19" data-part="1" data-section-number="8" -->
## Definition of Done, sekcja 0.8: checklista weryfikacyjna (cd.)

```bash
git add .
git commit -m "Prework 0.8: HTTP i asyncio"
```

---

# 9. Weryfikacja Kont, Klucze API i Zabezpieczenie Sekretów

---

<!-- .slide: data-section-id="sec-9" data-slide-key="slide-9-01" data-part="0" data-section-number="9" -->
## Co zrobisz w tej sekcji

To ostatni etap przygotowania środowiska. Po nim zostaje sprawdzenie poziomu w sekcji 0.10. Składa się z dwóch części:

1. **Konta i klucze API:** założysz konta w usługach używanych w kursie (GitHub, OpenAI, Anthropic, Hugging Face, Microsoft Azure) i wygenerujesz klucze.
2. **Bezpieczeństwo sekretów:** nauczysz się przechowywać klucze w pliku `.env` tak, żeby **nigdy** nie trafiły do repozytorium ani do kodu.

**Zarezerwuj na tę sekcję więcej czasu.** Weryfikacja kont (wiadomości, karta płatnicza) potrafi potrwać, a u części dostawców aktywacja płatności zajmuje kilka minut lub godzin.

---

<!-- .slide: data-section-id="sec-9" data-slide-key="slide-9-02" data-part="0" data-section-number="9" -->
## Czym jest klucz API

**Klucz API** (ang. *API key*) to długi, losowy ciąg znaków, który identyfikuje Ciebie w usłudze. Wysyłasz go w nagłówku każdego żądania (pamiętasz `Authorization: Bearer ...` z sekcji 0.8).

```text
sk-proj-Xa81kP0q... (ok. 100 do 170 znaków)       ← przykładowy format klucza OpenAI
sk-ant-api03-7Hq2... (ok. 100 znaków)          ← przykładowy format klucza Anthropic
hf_Qm3xTr...                                    ← przykładowy format tokenu Hugging Face
```

Na jego podstawie serwer wie:
- **kim jesteś**, czyli które konto obciążyć kosztami,
- **co Ci wolno**, czyli do których modeli i funkcji masz dostęp.

Klucz API działa jak **login i hasło w jednym**. Kto zna Twój klucz, ten może korzystać z usługi na Twój rachunek. Nie ma przy tym drugiego etapu weryfikacji, kodu SMS ani pytania „czy to na pewno Ty?”.

---

<!-- .slide: data-section-id="sec-9" data-slide-key="slide-9-03" data-part="0" data-section-number="9" -->
## Dlaczego klucz API to sekret

Koszt korzystania z API modeli AI zależy od zużycia. Jeśli ktoś uzyska dostęp do Twojego klucza, może **wysyłać zapytania na Twój koszt**.

Najczęstszy scenariusz wycieku: klucz wpisany bezpośrednio w kod, a kod wysłany do publicznego repozytorium na GitHubie. **Automatyczne boty przeszukują GitHub i znajdują takie klucze w ciągu kilku minut.** Usunięcie pliku w kolejnym commicie nie pomaga: klucz zostaje w historii repozytorium.

Zasady obowiązujące w całym kursie:

1. **Nigdy nie wpisuj klucza w kodzie** (`api_key = "sk-..."`). Klucz trzymaj w pliku `.env`.
2. **Plik `.env` zawsze jest w `.gitignore`.** Zrobiłeś to już w sekcji 0.1.
3. **Nie wklejaj kluczy** w czatach, na forach, w zrzutach ekranu ani w zgłoszeniach błędów.
4. **Ustaw limit wydatków** u każdego dostawcy AI. Nawet jeśli klucz wycieknie, strata będzie ograniczona.
5. **Jeden klucz = jedno zastosowanie.** Na kurs wygeneruj osobny klucz z rozpoznawalną nazwą (np. `kurs-python-ai`), żeby w razie problemu usunąć tylko jego.

---

<!-- .slide: data-section-id="sec-9" data-slide-key="slide-9-04" data-part="0" data-section-number="9" -->
## Konta potrzebne w kursie

| Usługa | Do czego w kursie | Koszt | Wynik tej sekcji |
|---|---|---|---|
| **GitHub** | Repozytoria, CI/CD przez GitHub Actions (Moduł 13) | Darmowe | Konto + zalogowane `gh` |
| **OpenAI** | Modele GPT przez API | Płatne za zużycie, doładowanie z góry | Klucz `OPENAI_API_KEY` |
| **Anthropic** | Modele Claude przez API | Płatne za zużycie, doładowanie z góry | Klucz `ANTHROPIC_API_KEY` |
| **Hugging Face** | Modele open-source | Darmowe | Token `HF_TOKEN` |
| **Microsoft Azure** | Maszyna wirtualna Azure VM (Moduł 13) | Darmowe konto próbne | Aktywne konto |

**Ważne o płatnościach:** API OpenAI i Anthropic działają w modelu **przedpłaconym**: najpierw doładowujesz saldo (u obu dostawców minimalne doładowanie to zwykle ok. 5 USD), potem płacisz za każde zapytanie. **Subskrypcje ChatGPT Plus i Claude Pro nie obejmują API**: to osobne usługi z osobnym rozliczeniem. Na ćwiczenia w kursie w zupełności wystarczy małe doładowanie.

Wszystkie płatności i dane karty wprowadzasz **wyłącznie na oficjalnych stronach dostawców**.

---

<!-- .slide: data-section-id="sec-9" data-slide-key="slide-9-05" data-part="0" data-section-number="9" -->
## GitHub: konto i GitHub CLI

**Krok 1: konto.** Wejdź na `https://github.com/signup` i załóż konto. Użyj **tego samego adresu e-mail**, który podałeś w `git config --global user.email` (sekcja 0.1): dzięki temu GitHub przypisze Twoje commity do Twojego profilu. Włącz uwierzytelnianie dwuskładnikowe (2FA): GitHub i tak o to poprosi.

**Krok 2: GitHub CLI.** `gh` to oficjalne narzędzie GitHuba do terminala. Pozwala m.in. zalogować się tak, żeby `git push` działał bez wpisywania haseł.

```bash
# Windows
winget install --id GitHub.cli -e

# macOS
brew install gh

# Linux: instrukcja dla Twojej dystrybucji na https://github.com/cli/cli#installation
```

**Krok 3: logowanie.** Zamknij i otwórz terminal, a następnie wpisz `gh auth login`. Odpowiedz na pytania: **GitHub.com** → **HTTPS** → **Y** (użyj danych logowania GitHub dla Gita) → **Login with a web browser**. Skopiuj wyświetlony kod, naciśnij Enter i potwierdź w przeglądarce.

---

<!-- .slide: data-section-id="sec-9" data-slide-key="slide-9-05" data-part="1" data-section-number="9" -->
## GitHub: konto i GitHub CLI (cd.)

```bash
gh auth status
```

```text
github.com
  ✓ Logged in to github.com account jan-kowalski (keyring)
  - Active account: true
  - Git operations protocol: https
```

---

<!-- .slide: data-section-id="sec-9" data-slide-key="slide-9-06" data-part="0" data-section-number="9" -->
## OpenAI: konto, saldo i klucz API

**Krok 1: konto.** Wejdź na `https://platform.openai.com` i zarejestruj się (lub zaloguj kontem, którego używasz w ChatGPT).

**Krok 2: doładowanie salda.** W ustawieniach organizacji otwórz **Billing**, dodaj metodę płatności i doładuj saldo (**Add to credit balance**). Na kurs wystarczy minimalna kwota. Sprawdź, że saldo jest większe od zera: bez tego każde zapytanie zwróci błąd **429** (*insufficient_quota*).

**Krok 3: limit wydatków.** W ustawieniach **Limits** ustaw miesięczny budżet (np. 10 USD) i powiadomienie e-mail. Zostaw **automatyczne doładowanie (auto recharge) wyłączone**.

**Krok 4: klucz.** Otwórz `https://platform.openai.com/api-keys` → **Create new secret key**. Nadaj nazwę `kurs-python-ai` i kliknij **Create secret key**.

**Klucz zobaczysz tylko raz.** Od razu skopiuj go do pliku `.env` (przygotujesz go za chwilę) albo do menedżera haseł. Jeśli go zgubisz, nie odzyskasz go: usuniesz stary i wygenerujesz nowy.

---

<!-- .slide: data-section-id="sec-9" data-slide-key="slide-9-07" data-part="0" data-section-number="9" -->
## Anthropic: konto, saldo i klucz API

**Krok 1: konto.** Wejdź na `https://console.anthropic.com` i zarejestruj się. Konsola dla deweloperów to osobne miejsce niż aplikacja czatu Claude.ai, ale możesz użyć tego samego adresu e-mail.

**Krok 2: doładowanie salda.** W ustawieniach otwórz **Billing** (*Plans & Billing*), dodaj metodę płatności i kup kredyty (**Buy credits**). Sprawdź, że saldo kredytów jest dodatnie.

**Krok 3: limit wydatków.** W ustawieniach **Limits** ustaw miesięczny limit wydatków (*spend limit*) oraz próg powiadomienia e-mail. Nie włączaj automatycznego doładowania.

**Krok 4: klucz.** Otwórz **Settings → API Keys** → **Create Key**. Nadaj nazwę `kurs-python-ai` i skopiuj klucz zaczynający się od `sk-ant-`.

Tak jak w OpenAI: **klucz jest wyświetlany tylko raz**. Skopiuj go od razu.

Interfejsy konsol OpenAI i Anthropic zmieniają się co jakiś czas. Jeśli nazwa przycisku różni się od opisu, szukaj sekcji **API Keys**, **Billing** i **Limits** w ustawieniach konta.

---

<!-- .slide: data-section-id="sec-9" data-slide-key="slide-9-08" data-part="0" data-section-number="9" -->
## Hugging Face: konto i token dostępu

**Hugging Face** to największy publiczny katalog **modeli open-source**: tysiące modeli językowych, modeli do embeddingów i innych, które można pobrać i uruchomić samodzielnie. W kursie użyjesz go do pracy z modelami open-source.

**Krok 1: konto.** Zarejestruj się na `https://huggingface.co/join` i potwierdź adres e-mail (bez tego część funkcji jest zablokowana).

**Krok 2: token.** Otwórz `https://huggingface.co/settings/tokens` → **Create new token**:
- **Token type:** wybierz **Read** (tylko odczyt: do pobierania modeli w zupełności wystarczy),
- **Token name:** `kurs-python-ai`,
- kliknij **Create token** i skopiuj wartość zaczynającą się od `hf_`.

Konto i token Hugging Face są **darmowe**. Token „Read” jest bezpieczniejszy niż „Write”: nawet po wycieku nikt nie zmieni ani nie usunie niczego na Twoim koncie.

---

<!-- .slide: data-section-id="sec-9" data-slide-key="slide-9-09" data-part="0" data-section-number="9" -->
## Microsoft Azure: darmowe konto

W Module 13 wdrożysz projekt na **maszynę wirtualną Azure VM**, czyli komputer wynajęty w chmurze Microsoftu. Potrzebujesz do tego konta Azure.

**Krok 1:** wejdź na `https://azure.microsoft.com/free` i kliknij **Start free** / **Try Azure for free**. Zaloguj się kontem Microsoft (np. Outlook, Hotmail) lub załóż nowe.

**Krok 2:** podaj dane i przejdź weryfikację numerem telefonu oraz **kartą płatniczą**. Karta służy tylko do potwierdzenia tożsamości: konto próbne nie pobiera opłat, dopóki **sam świadomie nie przejdziesz** na płatny plan (*pay-as-you-go*).

**Krok 3:** po rejestracji zaloguj się do `https://portal.azure.com` i sprawdź, że portal się otwiera, a w **Subscriptions** widzisz aktywną subskrypcję.

**Uwaga na czas:** darmowe konto daje kredyt ważny ograniczony czas (zwykle **30 dni**; część usług jest darmowa przez 12 miesięcy). Szczegóły sprawdź na stronie oferty. Jeśli do Modułu 13 zostało Ci dużo czasu, ważne jest teraz tylko to, żeby **rejestracja przeszła pomyślnie**. Jeśli kredyt wygaśnie, prowadzący poda alternatywę w Module 13.

---

<!-- .slide: data-section-id="sec-9" data-slide-key="slide-9-10" data-part="0" data-section-number="9" -->
## Zmienne środowiskowe

Program może odczytać klucz ze **zmiennej środowiskowej** (ang. *environment variable*). To wartość przypisana do określonej nazwy i dostępna dla programu w środowisku, w którym został uruchomiony. Poznałeś już jedną z nich: `PATH`.

Spróbuj ustawić własną zmienną w terminalu i odczytać ją w Pythonie:

```bash
# Windows (PowerShell)
$env:APP_ENV = "dev"

# macOS / Linux
export APP_ENV=dev

# Odczyt w Pythonie (wszystkie systemy)
uv run python -c "import os; print(os.getenv('APP_ENV'))"
```

**Oczekiwany wynik:**

```text
dev
```

---

<!-- .slide: data-section-id="sec-9" data-slide-key="slide-9-10" data-part="1" data-section-number="9" -->
## Zmienne środowiskowe (cd.)

`os.getenv("NAZWA")` zwraca wartość zmiennej albo `None`, jeśli jej nie ma. Zmienna ustawiona w ten sposób **jest dostępna tylko w bieżącej sesji terminala**: po jego zamknięciu znika. Aby uniknąć ponownego wpisywania kluczy po każdym otwarciu terminala, używamy pliku `.env`.

---

<!-- .slide: data-section-id="sec-9" data-slide-key="slide-9-11" data-part="0" data-section-number="9" -->
## Plik .env i .env.example

**`.env`** to zwykły plik tekstowy z parami `NAZWA=wartość`, po jednej w linii. Biblioteka `python-dotenv` wczytuje go i zamienia te pary w zmienne środowiskowe. W folderze `prework` utwórz plik **`.env`** i wklej do niego swoje klucze:

```text
OPENAI_API_KEY=sk-proj-tu-wklej-swoj-klucz
ANTHROPIC_API_KEY=sk-ant-tu-wklej-swoj-klucz
HF_TOKEN=hf_tu-wklej-swoj-token
```

Zasady zapisu: **bez spacji wokół `=`**, **bez cudzysłowów**, każdy klucz w osobnej linii.

Utwórz też plik **`.env.example`**: ten sam zestaw nazw, ale **bez wartości**:

```text
OPENAI_API_KEY=
ANTHROPIC_API_KEY=
HF_TOKEN=
```

---

<!-- .slide: data-section-id="sec-9" data-slide-key="slide-9-11" data-part="1" data-section-number="9" -->
## Plik .env i .env.example (cd.)

`.env.example` **trafia do repozytorium**: pokazuje innym (i Tobie za pół roku), jakie zmienne są potrzebne. `.env` z prawdziwymi wartościami **nigdy** nie trafia do repozytorium. Ta konwencja obowiązuje w każdym projekcie w kursie.

---

<!-- .slide: data-section-id="sec-9" data-slide-key="slide-9-12" data-part="0" data-section-number="9" -->
## Sprawdź czy .env jest ignorowany przez Git

Zanim zrobisz kolejny commit, **upewnij się**, że Git nie widzi pliku `.env`:

```bash
git check-ignore -v .env
git status
```

**Oczekiwany wynik:**

```text
.gitignore:2:.env	.env
On branch main
Untracked files:
  (use "git add <file>..." to include in what will be committed)
	.env.example
	...
```

- `git check-ignore -v .env` pokazuje, **która reguła** z `.gitignore` ignoruje plik. Jeśli komenda nic nie wypisze, plik **nie jest** ignorowany: wróć do slajdu o `.gitignore` z sekcji 0.1.

---

<!-- .slide: data-section-id="sec-9" data-slide-key="slide-9-12" data-part="1" data-section-number="9" -->
## Sprawdź czy .env jest ignorowany przez Git (cd.)

- W wyniku `git status` może być widoczny `.env.example`, ale **nie może być `.env`**.

Rób ten test w każdym nowym projekcie, zanim pierwszy raz wpiszesz klucz do `.env`.

---

<!-- .slide: data-section-id="sec-9" data-slide-key="slide-9-13" data-part="0" data-section-number="9" -->
## Wczytywanie .env w Pythonie: python-dotenv

Utwórz plik **`env_demo.py`**:

```python
import os

from dotenv import load_dotenv

load_dotenv()      # wczytaj plik .env z bieżącego folderu do zmiennych środowiskowych

key = os.getenv("OPENAI_API_KEY")
if key:
    print(f"Klucz wczytany: {key[:4]}...{key[-4:]} (długość: {len(key)})")
else:
    print("Brak klucza OPENAI_API_KEY w pliku .env")
```

**Oczekiwany wynik** (fragmenty klucza będą inne):

```text
Klucz wczytany: sk-p...abcd (długość: 164)
```

---

<!-- .slide: data-section-id="sec-9" data-slide-key="slide-9-13" data-part="1" data-section-number="9" -->
## Wczytywanie .env w Pythonie: python-dotenv (cd.)

Zwróć uwagę na dwie rzeczy:
- **Nigdy nie wypisujemy całego klucza**, nawet w terminalu, bo terminal trafia potem na zrzuty ekranu i do logów. Pokazujemy tylko początek i koniec: to wystarcza, żeby sprawdzić, czy wczytał się właściwy klucz.
- `load_dotenv()` **nie nadpisuje** zmiennych, które już istnieją w systemie. Jeśli kiedyś ustawiłeś `OPENAI_API_KEY` globalnie w systemie, program użyje tamtej wartości, a nie tej z `.env`. To częsta przyczyna błędu 401 „przecież mam dobry klucz w `.env`”.

---

<!-- .slide: data-section-id="sec-9" data-slide-key="slide-9-14" data-part="0" data-section-number="9" -->
## Co zrobić, gdy klucz wycieknie

Jeśli klucz trafił do repozytorium, na zrzut ekranu, do czatu albo podejrzewasz wyciek, działaj w tej kolejności:

1. **Natychmiast unieważnij klucz** w konsoli dostawcy (w sekcji API Keys: **Revoke** / **Delete**). To jedyny skuteczny krok: od tej chwili klucz przestaje działać.
2. **Wygeneruj nowy klucz** i wpisz go do `.env`.
3. **Sprawdź zużycie** (*Usage*) w konsoli dostawcy, czy nie ma podejrzanych wywołań.
4. Dopiero potem usuń klucz z kodu lub historii.

Nie licz na to, że „nikt nie zauważy”, ani na usunięcie pliku w kolejnym commicie: klucz zostaje w historii Gita, a boty skanujące GitHub działają w ciągu minut. GitHub współpracuje z dostawcami AI i potrafi automatycznie zgłosić wykryty klucz, co może skończyć się jego zablokowaniem. To ochrona, a nie powód do paniki: po prostu wygeneruj nowy.

---

<!-- .slide: data-section-id="sec-9" data-slide-key="slide-9-15" data-part="0" data-section-number="9" -->
## Definition of Done, sekcja 0.9: checklista weryfikacyjna

Zanim przejdziesz do sekcji 0.10, upewnij się, że:

- `gh auth status` pokazuje zalogowane konto GitHub,
- masz klucze OpenAI i Anthropic z dodatnim saldem i ustawionym limitem wydatków, token Hugging Face oraz aktywne konto Azure,
- plik `.env` z kluczami istnieje lokalnie, jest wpisany do `.gitignore` i nie pojawia się w `git status`,
- w repozytorium jest `.env.example` z nazwami zmiennych bez wartości,
- skrypt z `load_dotenv()` odczytuje klucz z `.env`, a Ty wiesz, co zrobić, gdy klucz wycieknie.

```bash
git add .
git commit -m "Prework 0.9: konta i konfiguracja .env"
```

---

# 10. Sprawdź Swój Poziom - Zadania i Projekt (Prework Assessment)

---

<!-- .slide: data-section-id="sec-10" data-slide-key="slide-10-01" data-part="0" data-section-number="10" -->
## Co sprawdza Prework Assessment

Prework kończy się samodzielną weryfikacją: czy potrafisz uruchomić kod, napisać testy i połączyć wszystkie elementy w jeden działający projekt.

Masz do dyspozycji dwa repozytoria:

- `practice-python-ai-prework`: 5 zadań o rosnącej trudności, każde powiązane z konkretną sekcją preworku (0.2 do 0.8).
- `task-python-ai-prework`: 1 projekt do portfolio, program „Przyjmowanie dokumentów”.

**Kryterium gotowości do Modułu 1:**

- Minimum: samodzielnie rozwiązane zadania #01 do #04 oraz projekt z przechodzącymi testami (`pytest` zwraca zielony wynik).
- Zadanie #05 potwierdza gotowość do asynchronicznych wywołań API modeli językowych w Module 1.

Jeśli dane zadanie sprawia trudność, tabela na kolejnym slajdzie pokaże Ci dokładnie, do której sekcji preworku wrócić.

---

<!-- .slide: data-section-id="sec-10" data-slide-key="slide-10-02" data-part="0" data-section-number="10" -->
## Mapa zadań practice-python-ai-prework

Każde zadanie z repozytorium `practice-python-ai-prework` ćwiczy konkretny zestaw umiejętności. Gdy utkniesz, wróć do wskazanej sekcji preworku.

| Zadanie | Temat | Sekcja preworku |
|---|---|---|
| #01 Rejestr dokumentów | kolekcje, comprehension, `Counter` | 0.2 |
| #02 Parser kwot z faktur | funkcje, własne wyjątki, pytest | 0.3, 0.7 |
| #03 Import faktur z katalogu | `pathlib`, JSON, CSV, daty | 0.4 |
| #04 Model dokumentów | klasy abstrakcyjne, `@dataclass`, `@property`, fixture | 0.5, 0.7 |
| #05 Odporny pipeline | generatory, dekorator `retry`, `asyncio.gather` | 0.6, 0.8 |
| Projekt: Przyjmowanie dokumentów | wszystkie powyższe + `.env`, uv, Git, `logging` | 0.1 do 0.9 |

Zadania od #01 do #04 pokrywają fundament synchroniczny. Zadanie #05 i projekt wprowadzają asynchroniczność i konfigurację środowiska, czyli dokładnie to, czego wymaga Moduł 1.

---

<!-- .slide: data-section-id="sec-10" data-slide-key="slide-10-03" data-part="0" data-section-number="10" -->
## Jak zacząć: fork repozytorium i rytm pracy

**Fork repozytorium** (ang. *fork*) to Twoja własna kopia cudzego repozytorium na GitHubie. Po forku możesz swobodnie commitować zmiany bez wpływu na oryginał.

1. Zaloguj się na GitHub, przejdź do repozytorium `practice-python-ai-prework` i kliknij przycisk **Fork** w prawym górnym rogu.
2. Sklonuj swój fork i przygotuj środowisko:

---

<!-- .slide: data-section-id="sec-10" data-slide-key="slide-10-03" data-part="1" data-section-number="10" -->
## Jak zacząć: fork repozytorium i rytm pracy (cd.)

```bash
# Sklonuj swój fork (zastąp <twoj-login> swoim loginem GitHub)
git clone https://github.com/<twoj-login>/practice-python-ai-prework.git
cd practice-python-ai-prework

# Utwórz i aktywuj środowisko wirtualne
uv venv .venv
source .venv/bin/activate   # Linux/macOS
# .venv\Scripts\activate    # Windows

# Zainstaluj zależności i sprawdź pytest
uv pip install -r requirements.txt
pytest --version
```

3. Rozwiązuj zadania po kolei. Po każdym zadaniu zapisz postęp:

---

<!-- .slide: data-section-id="sec-10" data-slide-key="slide-10-03" data-part="2" data-section-number="10" -->
## Jak zacząć: fork repozytorium i rytm pracy (cd.)

```bash
git add .
git commit -m "feat: zadanie #01 rejestr dokumentów"
git push
```

Zadania z danymi startowymi mają sekcję „Prawidłowe odpowiedzi”: porównaj z nią swój wynik, zanim przejdziesz do kolejnego.

---

<!-- .slide: data-section-id="sec-10" data-slide-key="slide-10-04" data-part="0" data-section-number="10" -->
## Projekt „Przyjmowanie dokumentów”: wymagania

Projekt `task-python-ai-prework` to mały program uruchamiany z terminala, który wczytuje dokumenty firmy (faktury i umowy), sprawdza ich poprawność, „przetwarza” je przez symulowane zewnętrzne API i zapisuje raport. To fundament backendu Enterprise Document Assistant.

1. **Konfiguracja z `.env`** (`python-dotenv`): `DOCS_DIR` (katalog z dokumentami), `OUTPUT_FILE` (plik raportu), `AMOUNT_THRESHOLD` (kwota, powyżej której faktura wymaga akceptacji), `MAX_RETRIES` (liczba prób wywołania API) oraz opcjonalnie `LOG_LEVEL` (poziom logowania, domyślnie `INFO`). Brak wymaganej zmiennej kończy się czytelnym błędem.
2. **Model danych:** klasa abstrakcyjna `Document` i klasy `Invoice`, `Contract` z adnotacjami typów (`@dataclass`).
3. **Walidacja własnymi wyjątkami:** wspólna klasa bazowa `DocumentValidationError` i co najmniej dwa wyjątki szczegółowe (np. pusta treść, błędna kwota). Błędny plik lub rekord trafia do listy błędów z nazwą pliku i powodem, a program działa dalej.
4. **Wczytywanie** wszystkich plików `*.json` i `*.csv` z `DOCS_DIR` przez `pathlib`.

---

<!-- .slide: data-section-id="sec-10" data-slide-key="slide-10-04" data-part="1" data-section-number="10" -->
## Projekt „Przyjmowanie dokumentów”: wymagania (cd.)

5. **Przetwarzanie asynchroniczne:** `async process(document)` symuluje API (`asyncio.sleep`, zaplanowane `ConnectionError`), dekorator ponawia próby do `MAX_RETRIES` razy, wszystkie dokumenty idą przez `asyncio.gather`.
6. **Raport JSON** w `OUTPUT_FILE`: liczba wczytanych dokumentów, błędy walidacji, faktury powyżej `AMOUNT_THRESHOLD`, faktury nieopłacone po terminie (data przekazana jako argument), nieudane przetworzenia i czas działania.
7. **Testy pytest** (co najmniej 8): `pytest.raises`, fixture, `parametrize`, `tmp_path`; bez zależności od losowości i od dzisiejszej daty.
8. **Krok dalej:** zamiast `print` moduł `logging` (postęp na poziomie `INFO`, pominięte pliki i nieudane próby na poziomie `WARNING`). Tego nie było na slajdach: w treści projektu znajdziesz podpowiedź i link do dokumentacji.

---

<!-- .slide: data-section-id="sec-10" data-slide-key="slide-10-05" data-part="0" data-section-number="10" -->
## Sugerowana struktura projektu „Przyjmowanie dokumentów”

```text
przyjmowanie-dokumentow/
├── .env                  # Twoja konfiguracja (w .gitignore)
├── .env.example          # nazwy zmiennych z przykładowymi wartościami
├── .gitignore
├── README.md
├── pyproject.toml        # zależności i konfiguracja pytest
├── uv.lock
├── data/                 # co najmniej 6 dokumentów: JSON i CSV, także z błędami
├── src/
│   ├── models.py         # Document (ABC), Invoice, Contract (@dataclass)
│   ├── loader.py         # wczytywanie JSON i CSV, lista błędów
│   ├── validator.py      # DocumentValidationError, wyjątki szczegółowe, walidacja
│   ├── processor.py      # async process, dekorator retry, asyncio.gather
│   └── reporter.py       # zapis raportu JSON
├── tests/
│   ├── test_models.py
│   ├── test_loader.py
│   └── test_processor.py
└── main.py               # punkt wejścia: uv run python main.py
```

---

<!-- .slide: data-section-id="sec-10" data-slide-key="slide-10-05" data-part="1" data-section-number="10" -->
## Sugerowana struktura projektu „Przyjmowanie dokumentów” (cd.)

Każdy moduł w `src/` odpowiada jednej sekcji preworku, więc łatwo wrócisz do slajdu, który go opisuje. W `pyproject.toml` dopisz `pythonpath = ["."]` w sekcji `[tool.pytest.ini_options]` (sekcja 0.7), żeby testy z `tests/` mogły importować `src`.

---

<!-- .slide: data-section-id="sec-10" data-slide-key="slide-10-06" data-part="0" data-section-number="10" -->
## Punkt wejścia projektu: main.py

Plik `main.py` spaja wszystkie moduły. Szkielet pokazuje, jak łączą się sekcje preworku:

```python
import asyncio
import logging
import os
from datetime import date
from pathlib import Path

from dotenv import load_dotenv

from src.loader import load_documents
from src.processor import process_all
from src.reporter import save_report


def require(name: str) -> str:
    value = os.getenv(name)
    if not value:
        raise SystemExit(f"Brak zmiennej {name} w pliku .env")
    return value


async def main() -> None:
    load_dotenv()                                      # sekcja 0.9
    logging.basicConfig(level=os.getenv("LOG_LEVEL", "INFO"))
    docs_dir = Path(require("DOCS_DIR"))               # pathlib, sekcja 0.4
    threshold = float(require("AMOUNT_THRESHOLD"))
    retries = int(require("MAX_RETRIES"))

    documents, errors = load_documents(docs_dir)       # sekcje 0.3 i 0.4
    results = await process_all(documents, retries=retries)   # sekcje 0.6 i 0.8
    save_report(Path(require("OUTPUT_FILE")), documents, errors, results,
                threshold=threshold, today=date.today())


if __name__ == "__main__":
    asyncio.run(main())
```

---

<!-- .slide: data-section-id="sec-10" data-slide-key="slide-10-06" data-part="1" data-section-number="10" -->
## Punkt wejścia projektu: main.py (cd.)

- `load_dotenv()` wczytuje `.env`, zanim cokolwiek innego odczyta zmienne środowiskowe.
- `date.today()` pojawia się tylko tutaj. Funkcje przyjmują datę jako argument, więc testy podają stałą datę (sekcja 0.4).
- `asyncio.run(main())` uruchamia cały asynchroniczny program, a blok `if __name__ == "__main__":` pozwala importować `main.py` w testach bez uruchamiania (sekcja 0.3).

---

<!-- .slide: data-section-id="sec-10" data-slide-key="slide-10-07" data-part="0" data-section-number="10" -->
## Checkpoint: gotowość do Modułu 1

Przed rozpoczęciem Modułu 1 sprawdź każdy punkt poniższej listy:

| Kryterium | Weryfikacja |
|---|---|
| Środowisko `.venv` aktywne, `docker run hello-world` działa | `python --version`, `docker --version` |
| Zadania od #01 do #04 rozwiązane w forku `practice-python-ai-prework` | sekcja „Prawidłowe odpowiedzi” w repo |
| Projekt „Przyjmowanie dokumentów” z zielonym `pytest` | `pytest -v` pokazuje `PASSED` |
| Plik `.env` **nie** pojawia się w `git status` | `git status` |
| Rozumiesz, dlaczego `Document(...)` zgłasza `TypeError` | sekcja 0.5 |
| Skrypt z `asyncio.gather` kończy się w ok. 2 s | sekcja 0.8 |

Jeśli zadanie #05 sprawia trudność, wróć do sekcji 0.6 (generatory, dekorator `retry`) i 0.8 (`asyncio.gather`) przed Modułem 1. To niezbędna baza do asynchronicznych wywołań API modeli językowych.

**Definition of Done:** link do forka `practice-python-ai-prework` i repozytorium projektu z zielonym `pytest`.

---

<!-- .slide: data-section-id="sec-10" data-slide-key="slide-10-08" data-part="0" data-section-number="10" -->
## Gratulacje: jesteś gotowy na Filar I

Jeśli wszystkie punkty z checklisty są spełnione, masz za sobą najtrudniejszy organizacyjnie etap kursu. Masz teraz:

- **działające środowisko:** Python, uv, VS Code, Git i Docker,
- fundamenty Pythona: kolekcje, funkcje i wyjątki, pliki, klasy z adnotacjami typów, generatory i dekoratory,
- testy w pytest, rozumienie HTTP i asyncio potrzebne do każdego wywołania modelu AI,
- konta i klucze API bezpiecznie przechowywane w `.env`,
- pierwszy projekt w portfolio.

**Co dalej:** w Filarze I zaczniesz budować Enterprise Document Assistant. Twoje pierwsze API w FastAPI będzie przyjmować dokumenty bardzo podobne do klas `Document` i `Invoice` z projektu, ale walidację przejmie za Ciebie Pydantic.

Jeśli któryś punkt sprawia problem, zanotuj dokładną komendę i pełny komunikat błędu (bez kluczy API!) i zgłoś go przed pierwszymi zajęciami. Z takim opisem pomoc zajmuje minuty, a nie godziny.