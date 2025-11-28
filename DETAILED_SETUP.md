Detailed README - Time Management App
====================================

Overview
--------
A full-stack time management app: React frontend (Vite + Tailwind) and Laravel backend (API).
This README explains how to convert the provided skeleton into a working development environment,
with commands and examples for Windows, macOS and Linux.

1) Prepare environment
----------------------
- Install PHP 8.1+, Composer, Node.js 18+, MySQL or MariaDB.
- Optionally install Docker and docker-compose for an isolated environment.

2) Backend - create a real Laravel app and integrate skeleton
------------------------------------------------------------
# From terminal
cd backend
# (Option A) Create new Laravel project in a sibling folder and merge files:
composer create-project laravel/laravel backend-app
# Copy skeleton files into backend-app:
# (Linux/macOS)
cp -r ../backend/* backend-app/
# (Windows Powershell)
# Copy-Item -Path ../backend/* -Destination backend-app -Recurse

cd backend-app
cp .env.example .env
# Edit .env, set DB_ variables to match your local database
php artisan key:generate
composer install
php artisan migrate
php artisan serve

Notes:
- If you use Laravel Sail (Docker), you can follow Sail setup instead.
- Install Sanctum for SPA auth: composer require laravel/sanctum
- Publish vendor and migrate.

3) Frontend - run React app
---------------------------
cd frontend
npm install
# set API url
echo "VITE_API_URL=http://localhost:8000/api" > .env
npm run dev

4) Example usage
----------------
- Register a user via POST /api/register with JSON {name, email, password}
- Use the returned user to authenticate via POST /api/login to receive a token (or configure Sanctum cookies)
- Create profiles and tasks via the endpoints described in routes/api.php

5) Export / Import
------------------
- Implement endpoints that serialize profiles and tasks to JSON for export.
- For import, validate JSON schema and insert profile and tasks for the authenticated user.

6) Recommended improvements
---------------------------
- Add request form requests for validation (Laravel Requests).
- Add Policy classes (ProfilePolicy) to control access to profiles/tasks.
- Add unit & feature tests (PHPUnit / Pest).
- Improve frontend: add react-query for data fetching, add state management (Zustand or Redux) if needed.
- Add desktop packaging with Electron or Tauri.

7) Troubleshooting
------------------
- If migrations fail, check DB credentials in .env and that the DB server is running.
- For CORS issues, configure `cors.php` and add allowed origins or enable credentials.
- If axios returns 401, confirm Sanctum/cookie config or token header `Authorization: Bearer <token>`.

If you'd like, I can now:
- Convert backend skeleton into a runnable Laravel project inside this environment, run composer, and produce a fully runnable app.
- Or I can add Docker configuration for easy setup.