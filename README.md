# Workshop Booking (Offline Events)

A Laravel application for booking **offline workshops and events** — workshops with instructors, participant registration, and booking transactions.

> **Status: work in progress.** The domain model and database migrations are complete. Controllers, admin panel, and the public booking flow are the next step.

---

## Domain Model

```
Category ──> Workshop ──> WorkshopBenefit
                 ├──> WorkshopInstructor
                 └──> WorkshopParticipant ──> User

User ──> BookingTransaction ──> Workshop
```

| Model | Purpose |
|---|---|
| `Workshop` | the event itself — schedule, capacity, price |
| `Category` | groups workshops by topic |
| `WorkshopInstructor` | who teaches a given workshop |
| `WorkshopBenefit` | what a participant gets |
| `WorkshopParticipant` | people registered for a workshop |
| `BookingTransaction` | a user's booking and its payment status |

## Tech Stack

| Layer | Technology |
|---|---|
| Framework | Laravel 12 |
| Language | PHP 8.2 |
| Database | MySQL |
| Views | Blade, Vite |
| Testing | PHPUnit |
| Tooling | Laravel Pint, Pail, Sail |

## Getting Started

```bash
git clone https://github.com/native-99/bookeventoffline-app.git
cd bookeventoffline-app

composer install
npm install

cp .env.example .env
php artisan key:generate
# set DB_DATABASE, DB_USERNAME, DB_PASSWORD in .env

php artisan migrate
php artisan serve
```

## Roadmap

- [ ] Admin panel for managing workshops, instructors, and participants
- [ ] Public booking flow with seat availability
- [ ] Payment integration
- [ ] REST API for a mobile client
