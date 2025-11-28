Time Management App - Full Starter (React frontend + Laravel backend)
===================================================================

This archive contains a full starter skeleton for the Time Management app described in your PDF spec.
It includes:

- backend/  -> a Laravel-like skeleton with models, controllers, routes and example migrations.
- frontend/ -> a Vite + React + Tailwind starter with example components and API service.
- README files with setup instructions and notes.

IMPORTANT
---------
This package provides a ready-to-complete scaffold. The backend folder is NOT a fully-installed Laravel project.
To make it a working Laravel application, you should either create a new Laravel project with Composer and copy these files into it,
or merge the contents into a fresh Laravel installation.

Backend (Laravel) - Quick steps to run locally
----------------------------------------------
1. Install PHP (8.1+), Composer and MySQL.
2. Create a Laravel project:
   composer create-project laravel/laravel backend
3. Copy the files from this archive (app/, routes/, database/) into the Laravel project's matching folders.
4. Copy .env.example content to .env and set your DB credentials.
5. Run: composer install
6. Generate app key: php artisan key:generate
7. Run migrations: php artisan migrate
8. (Optional) Install Sanctum for API authentication if you want token/cookie auth:
   composer require laravel/sanctum
   php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
   php artisan migrate
9. Serve the backend: php artisan serve (default http://127.0.0.1:8000)

Frontend (React) - Quick steps
-----------------------------
1. Install Node.js (16+) and npm or Yarn.
2. In the frontend folder run: npm install
3. Create a .env file with: VITE_API_URL=http://localhost:8000/api
4. Start dev server: npm run dev (default http://localhost:5173)

API Endpoints (summary)
-----------------------
- POST /api/register
- POST /api/login
- GET /api/profiles
- POST /api/profiles
- GET /api/profiles/{profile}/tasks
- POST /api/profiles/{profile}/tasks
- PUT /api/profiles/{profile}/tasks/{task}
- DELETE /api/profiles/{profile}/tasks/{task}

Notes & Next steps
------------------
- Add validation, policies and tests as needed.
- Improve the frontend UX (timeline, weekly view, task edit modal).
- Add export/import endpoints for profile JSON as described in the spec.
- Add notifications (web push) and optional Electron wrapper for desktop packaging.

