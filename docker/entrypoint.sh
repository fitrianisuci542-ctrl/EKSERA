#!/bin/sh
set -e

PORT="${PORT:-10000}"

# Render memberi port lewat environment variable PORT.
# Apache di image resmi mendengarkan port 80 secara default, jadi ubah di sini.
sed -ri "s/^Listen .*/Listen ${PORT}/" /etc/apache2/ports.conf
sed -ri "s/<VirtualHost \*:[0-9]+>/<VirtualHost *:${PORT}>/" \
    /etc/apache2/sites-available/000-default.conf

# Cache konfigurasi, route, dan view. Semua route harus bebas closure.
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Migrasi otomatis saat container start (Render Free tidak punya pre-deploy/shell)
php artisan migrate --force

# Simlink storage lokal (aman diabaikan saat memakai Supabase Storage)
php artisan storage:link || true

exec apache2-foreground
