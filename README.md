# Tasks for Today Management System in Laravel

This project completes IT0049 Technical Summative Assessment 4: Tasks for Today Management System with full CRUD, authentication, and email notifications.

## Pages and workflows

- `/` - public Welcome page showing only active tasks scheduled for today
- `/tasks` - public Task List page showing every active task ordered by date
- `/profile` - public developer profile
- `/about` - public project information
- `/login` - authentication page
- `/tasks/new` - protected Create Task page
- `/tasks/{id}/edit` - protected Edit Task page
- Archive action - protected soft-delete workflow using `is_archived`

## Requirements implemented

- Validated create and update forms
- Authenticated task management actions using Laravel's `auth` middleware
- Laravel Breeze package included in `composer.json`
- `is_archived` soft-delete behavior; archived tasks are excluded from public lists
- Eight seeded tasks and one seeded user
- Mailable class and Blade email view for task completion
- Email is sent through Laravel's `log` mail driver only when a task changes to `done`
- Updating an already-done task does not send the completion email again

## Demo login

```text
Username: ashtonchy
Password: password
```

## Setup in VS Code on Windows

Open the extracted project folder in VS Code and run:

```powershell
composer install
copy .env.example .env
php artisan key:generate
New-Item database\database.sqlite -ItemType File
php artisan migrate --seed
php artisan serve
```

If `database\database.sqlite` already exists, skip that command. Open `http://127.0.0.1:8000`.

The default `.env.example` uses the safe `log` mail driver. When a task changes to `done`, inspect the generated message in `storage/logs/laravel.log`. The recipient is configured by `TASK_NOTIFICATION_EMAIL`.

For a clean reset during testing:

```powershell
php artisan migrate:fresh --seed
```

The project uses Laravel 12 and is compatible with PHP 8.2.
