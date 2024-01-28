#!/bin/sh

# Stop on first error
set -e

# Path to PHP CS Fixer, adjust if it's located elsewhere
PHP_CS_FIXER_PATH=vendor/bin/php-cs-fixer

# Path to PHP Unit, adjust if needed
PHPUNIT_PATH=vendor/bin/phpunit

# Automatically correct PHP Coding Standards
echo "Running PHP CS Fixer..."
php $PHP_CS_FIXER_PATH fix --allow-risky=yes

# Run unit tests with PHPUnit
echo "Running PHPUnit tests..."
php $PHPUNIT_PATH

# If there were no errors, we can proceed
echo "All checks passed, ready for commit."
