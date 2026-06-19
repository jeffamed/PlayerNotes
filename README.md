# PlayerNotes

Web application for scouts and coaches to write and manage notes on players in real time.

## Stack

- **Laravel 13** — backend framework
- **Livewire v4** — reactive components without full-page reloads
- **Alpine.js** — lightweight client-side interactivity
- **Tailwind CSS** — utility-first styling
- **Spatie Laravel Permission** — role and permission management

## Architecture

The project follows a layered architecture:

```
Controller / Livewire Component
        ↓
    Service Layer        (app/Services)
        ↓
  Repository Layer       (app/Repositories)
        ↓
   Eloquent Models       (app/Models)
```

Repositories are bound to their interfaces in `AppServiceProvider`, keeping the service layer decoupled from the ORM.

## Features

- Authentication via Laravel Breeze
- Player list grouped by team (Team A, B, C)
- Real-time note creation per player
- Filter between all notes and your own notes
- Permission-based access (`note_create`)

## Local Setup

```bash
git clone <repo-url>
cd PlayerNotes

composer install
npm install

cp .env.example .env
php artisan key:generate
```

Configure your database credentials in `.env`, then:

```bash
php artisan migrate --seed
npm run dev
php artisan serve
```

## Testing

```bash
php artisan test
```

## Project Structure

```
app/
├── Http/Enums/          # TeamsEnum
├── Models/              # User, Player, Note
├── Repositories/
│   ├── Contracts/       # Interfaces
│   └── Eloquents/       # Implementations
├── Services/            # NoteService, PlayerService
resources/views/
├── components/
│   ├── note/            # Note list + create form (Livewire)
│   └── player/          # Player list (Livewire)
└── pages/
    └── player_note/     # Main dashboard page
```
