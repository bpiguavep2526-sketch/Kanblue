# Copilot Instructions for Kanblue (Laravel Project)

## Project Overview
- **Framework:** Laravel (PHP)
- **Architecture:** MVC (Model-View-Controller)
- **Key Directories:**
  - `app/Http/Controllers/`: Route logic and request handling
  - `app/Models/`: Eloquent ORM models
  - `resources/views/`: Blade templates for UI
  - `routes/`: Route definitions (`web.php`, `console.php`, etc.)
  - `database/`: Migrations, seeders, factories
  - `config/`: Application configuration
  - `public/`: Entry point (`index.php`), assets

## Developer Workflows
- **Start Local Server:**
  - Use `php artisan serve` from project root
- **Run Migrations:**
  - `php artisan migrate` (uses `database/migrations/`)
- **Seed Database:**
  - `php artisan db:seed` (uses `database/seeders/`)
- **Run Tests:**
  - `php artisan test` or `vendor/bin/phpunit`
- **Install Dependencies:**
  - PHP: `composer install`
  - JS/CSS: `npm install` then `npm run dev` (uses Vite)

## Project-Specific Patterns & Conventions
- **Routes:**
  - Defined in `routes/web.php` for web, `routes/console.php` for CLI
  - Use controller classes in `app/Http/Controllers/`
- **Models:**
  - Eloquent models in `app/Models/`, typically named singular (e.g., `User.php`)
- **Views:**
  - Blade templates in `resources/views/`, named by feature/page
- **Configuration:**
  - All config in `config/` (e.g., `config/app.php`, `config/database.php`)
- **Environment:**
  - Use `.env` for environment variables (not committed)

## Integration Points
- **Database:**
  - Default SQLite (`database/database.sqlite`), can be changed in `.env`
- **Frontend:**
  - Vite for asset bundling (`vite.config.js`)
  - JS/CSS in `resources/js/` and `resources/css/`
- **Testing:**
  - Feature and unit tests in `tests/Feature/` and `tests/Unit/`

## Examples
- **Add a Route:** Edit `routes/web.php` and point to a controller in `app/Http/Controllers/`
- **Create a Model:** Place in `app/Models/`, run `php artisan make:model ModelName`
- **Add a Migration:** Use `php artisan make:migration ...`, edit in `database/migrations/`

## References
- [Laravel Documentation](https://laravel.com/docs)
- Key files: `artisan`, `composer.json`, `package.json`, `vite.config.js`, `phpunit.xml`

---
*Update this file if project structure or conventions change. Ask for clarification if any workflow or pattern is unclear.*
