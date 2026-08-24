#!/bin/bash
set -e

# Default PORT if not injected by Render
PORT="${PORT:-8080}"

echo "Configuring Apache to listen on port ${PORT}..."

# Update Apache port configuration dynamically
sed -i "s/Listen 80/Listen ${PORT}/g" /etc/apache2/ports.conf
sed -i "s/<VirtualHost \*:80>/<VirtualHost \*:${PORT}>/g" /etc/apache2/sites-available/000-default.conf
sed -i 's!DocumentRoot /var/www/html$!DocumentRoot /var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Ensure storage directories exist with correct permissions
mkdir -p storage/framework/cache/data storage/framework/sessions storage/framework/views storage/logs bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Create storage link if missing
php artisan storage:link --force || true

# Copy Render production env if present
if [ -f .env.render ]; then
    echo "Applying Render production environment (.env.render)..."
    cp .env.render .env
fi

# Optimize Laravel for Production
echo "Optimizing Laravel configuration and routes..."
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Run database migrations if DB host is configured
if [ -n "${DB_HOST}" ]; then
    echo "Running database migrations..."
    php artisan migrate --force || echo "Warning: Database migration failed. Continuing startup..."
fi

echo "🚀 Cyclone Technologies starting on port ${PORT}..."
exec apache2-foreground
