# Dziennik Podróży

Projekt zaliczeniowy z przedmiotu *Działania na frameworkach PHP*. Aplikacja w Yii 2 do
zapisywania odbytych podróży: każdą przypisuje się do kraju, ocenia w skali 1–5, a całość
jest też dostępna przez REST API.

W projekcie są:

- CRUD podróży na `ActiveForm`, z listą opartą o `GridView` (paginacja, sortowanie),
- walidacja modeli, w tym własny walidator sprawdzający kolejność dat,
- logowanie, przy czym dodawać i edytować podróże może tylko zalogowany użytkownik (`AccessControl`),
- formularz kontaktowy z captchą,
- migracje, które zakładają tabele i wypełniają je przykładowymi danymi,
- REST API na `yii\rest\ActiveController`.

## Uruchomienie

Potrzebne jest PHP 8.1+ (`pdo_sqlite`, `mbstring`, `intl`, `gd`) i Composer.

```bash
composer install
php yii migrate
php yii serve --port=8080
```

Aplikacja wstaje pod http://localhost:8080. Działa też z `htdocs` XAMPP-a pod
`http://localhost/dziennik-podrozy/web/`, bo ładne adresy obsługuje dołączony `web/.htaccess`.

Konta testowe to `admin` / `admin` i `demo` / `demo`.

Baza to domyślnie SQLite (`database.sqlite`, tworzona przez migracje), więc nic nie trzeba
konfigurować. Żeby przejść na MySQL, wystarczy podmienić DSN w `config/db.php` i jeszcze raz
puścić migracje.

## REST API

| Metoda | Adres | Opis |
|--------|-------|------|
| GET | `/api/trips` | lista podróży (paginacja w nagłówkach) |
| GET | `/api/trips/{id}` | jedna podróż |
| POST | `/api/trips` | dodanie podróży |
| PUT | `/api/trips/{id}` | edycja |
| DELETE | `/api/trips/{id}` | usunięcie |
| GET | `/api/countries` | lista krajów (tylko odczyt) |
| GET | `/api/countries/{code}` | jeden kraj, np. `PL` |

Działają standardowe parametry Yii: `?fields=code,name` zawęża pola, a `?expand=country` (dla
podróży) albo `?expand=trips` (dla kraju) dołącza relację. Format odpowiedzi zależy od nagłówka
`Accept`, czyli JSON albo XML.

```bash
curl -H "Accept: application/json" "http://localhost:8080/api/trips/1?expand=country"

curl -H "Content-Type: application/json" -X POST "http://localhost:8080/api/trips" \
  -d '{"title":"Nowa podróż","country_code":"PL","start_date":"2026-07-01","end_date":"2026-07-10","rating":5}'
```

API celowo nie ma uwierzytelniania, żeby łatwo było je sprawdzić na zajęciach. W prawdziwym
wdrożeniu trzeba by dodać np. `HttpBearerAuth` i ustawić `COOKIE_VALIDATION_KEY` w środowisku.

## Licencja

BSD 3-Clause, szczegóły w [LICENSE.md](LICENSE.md).
