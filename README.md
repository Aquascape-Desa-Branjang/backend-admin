# Decodes Filament Base

Decodes web/system/cms base template built wit filamentphp.

## Getting Started

1. Clone this repository
1. Copy `.env.example` file to `.env` and configure your environment
1. Install php dependencies with `composer install`
1. Install javascript depedencies with `npm install`
1. Change permissions of storage & bootstrap/cache folders to be 777 `sudo chmod -R 777 storage && sudo chmod -R 777 bootstrap/cache`
1. Generate application key with `php artisan key:generate`
1. Generate storage folder on public folder `php artisan storage:link`
1. Migrate and seed the database with `php artisan migrate:fresh --seed` or `composer fresh`
1. Build the javascript bundle with `npm run build`
1. Clear the cache of the application `php artisan optimize:clear`
1. Change the ownership of this application folder if needed `sudo chown -R $USER:$USER $PWD`
1. Remove hot file on public to clear the dev mode if needed `rm public/hot`
1. Run the application with `php artisan serve`
1. Open browser and visit `http://127.0.0.1:8000`

## Notes

* Default admin path: /admin
* Default admin user: super@decodes.com 
* Default admin password: password
