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

# =====================================================
# Generate .env from Render's injected env variables
# This overwrites any baked-in local .env at runtime
# =====================================================
echo "Writing production .env from Render environment..."
cat > .env << EOF
APP_NAME="${APP_NAME:-Cyclone Technologies}"
APP_ENV=${APP_ENV:-production}
APP_KEY=${APP_KEY}
APP_DEBUG=${APP_DEBUG:-false}
APP_URL=${APP_URL:-https://cyclone-technologies.onrender.com}

LOG_CHANNEL=${LOG_CHANNEL:-stderr}
LOG_LEVEL=error

DB_CONNECTION=${DB_CONNECTION:-pgsql}
DB_HOST=${DB_HOST}
DB_PORT=${DB_PORT:-5432}
DB_DATABASE=${DB_DATABASE:-postgres}
DB_USERNAME=${DB_USERNAME}
DB_PASSWORD=${DB_PASSWORD}
DB_SSLMODE=${DB_SSLMODE:-require}

BROADCAST_DRIVER=log
CACHE_DRIVER=${CACHE_DRIVER:-file}
FILESYSTEM_DISK=local
QUEUE_CONNECTION=${QUEUE_CONNECTION:-sync}
SESSION_DRIVER=${SESSION_DRIVER:-cookie}
SESSION_LIFETIME=120
SESSION_SECURE_COOKIE=${SESSION_SECURE_COOKIE:-true}

MAIL_MAILER=${MAIL_MAILER:-smtp}
MAIL_HOST=${MAIL_HOST:-smtp.gmail.com}
MAIL_PORT=${MAIL_PORT:-465}
MAIL_USERNAME=${MAIL_USERNAME}
MAIL_PASSWORD=${MAIL_PASSWORD}
MAIL_ENCRYPTION=${MAIL_ENCRYPTION:-ssl}
MAIL_FROM_ADDRESS=${MAIL_FROM_ADDRESS}
MAIL_FROM_NAME="${MAIL_FROM_NAME:-CYCLONE TECHNOLOGIES}"

SUPABASE_URL=${SUPABASE_URL}
SUPABASE_ANON_KEY=${SUPABASE_ANON_KEY}

TWILIO_SID=${TWILIO_SID}
TWILIO_AUTH_TOKEN=${TWILIO_AUTH_TOKEN}
TWILIO_NUMBER=${TWILIO_NUMBER}
EOF

echo ".env written successfully. APP_URL=${APP_URL:-https://cyclone-technologies.onrender.com}"

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
