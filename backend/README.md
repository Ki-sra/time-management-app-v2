Laravel backend skeleton
-----------------------

This folder contains a minimal Laravel-like skeleton for the Time Management app API.
It's not a full composer-installed Laravel application, but contains the core files you need:
- Models (User, Profile, Task)
- Controllers (AuthController, ProfileController, TaskController)
- Routes (routes/api.php)
- Example migrations for profiles and tasks
- .env.example and composer.json placeholders

To turn this into a working Laravel project on your machine:
1. Install Composer and Laravel installer (or use `composer create-project laravel/laravel backend` then merge files).
2. Copy the files into a real Laravel app (app/, database/, routes/).
3. Run `composer install`, create `.env` from `.env.example` and set DB credentials.
4. Run `php artisan key:generate` and `php artisan migrate`.
5. Install and configure Laravel Sanctum for API authentication if you intend to use SPA tokens/cookies.