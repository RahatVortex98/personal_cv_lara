#!/usr/bin/env bash
# exit on error
set -o errexit

# Install composer dependencies
composer install --no-dev --optimize-autoloader

# Run migrations (This creates your tables in Postgres)
php artisan migrate --force

# Cache config and routes for speed
php artisan config:cache
php artisan route:cache
php artisan view:cache