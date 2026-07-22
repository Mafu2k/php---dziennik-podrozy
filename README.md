# Dziennik Podróży

Projekt zaliczeniowy z przedmiotu **Działania na frameworkach PHP** — aplikacja webowa
zbudowana na frameworku **Yii 2** (Basic Project Template).

Aplikacja pozwala zapisywać odbyte podróże, przypisywać je do krajów, oceniać w skali 1-5
oraz udostępnia te dane przez REST API.

## Funkcjonalności

- lista podróży z paginacją i sortowaniem (`GridView` + `ActiveDataProvider`)
- pełny CRUD podróży (dodawanie, podgląd, edycja, usuwanie) za formularzami `ActiveForm`
- lista krajów z paginacją (`Pagination` + `LinkPager`)
- walidacja modeli — walidatory wbudowane, walidator własny (porównanie dat) i `exist` (klucz obcy)
- logowanie / wylogowanie — dodawanie i edycja podróży tylko dla zalogowanych (`AccessControl`)
- formularz kontaktowy z captchą (e-mail zapisywany do pliku w `runtime/mail`)
- REST API oparte o `yii\rest\ActiveController` z ładnymi adresami URL i obsługą JSON
- migracje bazodanowe tworzące strukturę oraz dane startowe (`batchInsert`)

## Wymagania

- PHP >= 8.1 (z rozszerzeniami `pdo_sqlite`, `mbstring`, `intl`, `gd`)
- Composer

## Instalacja i uruchomienie

```bash
composer install
php yii migrate
php yii serve --port=8080
```

Aplikacja będzie dostępna pod adresem [http://localhost:8080](http://localhost:8080).

Projekt można też umieścić w `htdocs` XAMPP-a — wtedy działa pod
`http://localhost/dziennik-podrozy/web/` (ładne adresy URL obsługuje dołączony `web/.htaccess`).

## Konto testowe

| Login | Hasło |
|-------|-------|
| admin | admin |
| demo  | demo  |

## Baza danych

Domyślnie projekt używa **SQLite** (plik `database.sqlite` tworzony przez migracje),
dzięki czemu uruchamia się bez konfigurowania serwera baz danych.

Aby przejść na MySQL (np. XAMPP), wystarczy zmienić `config/db.php`:

```php
return [
    'class' => \yii\db\Connection::class,
    'dsn' => 'mysql:host=localhost;dbname=dziennik_podrozy',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];
```

i ponownie uruchomić `php yii migrate`.

## REST API

| Metoda | Adres | Opis |
|--------|-------|------|
| GET | `/api/trips` | lista podróży (z paginacją w nagłówkach) |
| GET | `/api/trips/1` | szczegóły podróży |
| POST | `/api/trips` | utworzenie podróży |
| PUT | `/api/trips/1` | aktualizacja podróży |
| DELETE | `/api/trips/1` | usunięcie podróży |
| GET | `/api/countries` | lista krajów (tylko odczyt) |
| GET | `/api/countries/PL` | szczegóły kraju |

Dodatkowe parametry:

- `?fields=code,name` — zawężenie zwracanych pól
- `?expand=country` — dołączenie powiązanego kraju do podróży
- `?expand=trips` — dołączenie podróży do kraju

Przykłady (curl):

```bash
curl -H "Accept: application/json" "http://localhost:8080/api/trips"

curl -H "Accept: application/json" "http://localhost:8080/api/trips/1?expand=country"

curl -H "Accept: application/json" -H "Content-Type: application/json" \
  -X POST "http://localhost:8080/api/trips" \
  -d '{"title":"Nowa podróż","country_code":"PL","start_date":"2026-07-01","end_date":"2026-07-10","rating":5}'
```

API zwraca JSON lub XML w zależności od nagłówka `Accept` (content negotiation).

Uwaga: w ramach uproszczenia projektu endpointy API nie wymagają uwierzytelnienia.
W wersji produkcyjnej należałoby dodać np. `HttpBearerAuth` do kontrolerów REST.

## Struktura projektu

```
config/        konfiguracja aplikacji (web, console, db, params)
controllers/   kontrolery MVC + kontrolery REST w podkatalogu api/
migrations/    migracje bazodanowe
models/        modele Active Record i modele formularzy
views/         widoki (layouty, site, trip, country)
web/           katalog publiczny (entry script, assety)
```

## Autor

Łukasz Janicki

## Licencja

BSD 3-Clause — szczegóły w pliku [LICENSE.md](LICENSE.md).
