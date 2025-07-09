# Zacapu Escucha

A minimal modular system for collecting citizen reports.

## Structure
- `public/` React + Tailwind form
- `admin/` basic admin pages
- `api/` PHP endpoints
- `includes/` configuration and auth
- `bot/` Telegram webhook handler
- `assets/` styles

## Setup
1. Configure database credentials in `includes/config.php`.
2. Deploy files on a PHP-enabled server (cPanel compatible).
3. Set a Telegram bot webhook to `bot/webhook.php`.

This is a simplified starter implementation.
