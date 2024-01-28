#!/bin/bash

# Install Laravel Sail as a dev-dependency, if not already installed
if ! grep -q "laravel/sail" ./composer.json; then
    composer require laravel/sail --dev
fi

# Publish Laravel Sail's Docker Compose file, if it doesn't exist already
if [ ! -f "docker-compose.yml" ]; then
    php artisan sail:install
else
    echo "Docker Compose file already exists. Skipping..."
fi

# Start Laravel Sail
./vendor/bin/sail up -d

./vendor/bin/sail composer install

./vendor/bin/sail npm install

./vendor/bin/sail npm run build

./vendor/bin/sail artisan migrate

# Done!
echo "Laravel installation with Sail complete."
