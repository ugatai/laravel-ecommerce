<p align="center">
    <a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a>
</p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel Ecommerce Application

- PHP: v8.1.x
- Laravel: v10.x
- MySQL: v8.0.33

### Add Composer Libraries

- [php-cs-fixer * コードフォーマッター](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer)
- [nunomaduro/larastan * 静的解析ツール](https://phpstan.org/user-guide/getting-started)
- [laravelcollective/html * Formファザード](https://github.com/LaravelCollective/html)
- [reliese/laravel * Model作成ライブラリ](https://github.com/reliese/laravel)
- [barryvdh/laravel-ide-helper * IDEヘルパー](https://github.com/barryvdh/laravel-ide-helper)
- [barryvdh/laravel-debugbar * デバッカー](https://github.com/barryvdh/laravel-debugbar)
- Write Add modules continue ...

### Add Node Modules

Write Add modules continue ...

# Directory Structure

```
.
├── app/
│   ├── Consts/                 # Definition files for constants
│   ├── Enums/                  # Enumerated column value files for Eloquent models
│   ├── Exceptions/             # Custom error handling
│   ├── EloquentBuilders/       # Definitions for custom Eloquent builders
│   │
│   ├── Http/
│   │   ├── kernel.php          # Configuration for routes and middleware
│   │   ├── Actions/            # Place single controllers here
│   │   └── Requests/           # Place each request here (Validation)
│   │
│   ├── Models/                 # Store DB access (Eloquent) classes
│   ├── Observers/              # Event handling for model CRUD operations
│   │
│   ├── Services/               # Service classes location
│   │   ├── Impl/               # Interfaces for service classes
│   │
├── config/                     # Store application configuration files
│   └── ...
├── ...
│    ├── ...
│    ├── ...
│    └── ...
│
├── resources/                  # Store templates and translation files
│   ├── css/                    # CSS files
│   ├── js/                     # TS (TypeScript) files
│   ├── lang/                   # Translation files
│   ├── view/                   # Templates
│      
├── routes/                     # Place each router here
│   ├── api.php                 # Routing for external use
│   ├── frontend.php            # Frontend routing
│   ├── backend.php             # Backend routing
│
├── tests/
│   ├── Feature/                # Tests for single controllers
│   ├── Unit/                   # Method-level tests for service classes
├── tools/
│   ├── php-cs-fixer/           # Code formatting tool location
│
├── docker-compose.yml          # Configuration file to define and run multi-container Docker applications
├── Dockerfile                  # File to define the steps to build a Docker image
├── .php-cs-fixer.dist.php      # Configuration file for php-cs-fixer
├── phpstan.neon                # Configuration file for phpstan
├── tsconfig.json               # Configuration file for TypeScript
```

# DB Structure

Write Add modules continue ...

# Participation in Development

#### Clone this repo anywhere you want and move into the directory:

```sh
git clone https://github.com/taisei-ugawa-climber/laravel-ecommerce.git
```

#### Copy an example .env file because the real one is git ignored:

```sh
cp .env.example .env
```

### `.env`

```sh

```

#### Build everything:

```sh
docker compose up --build
```

#### Access to Docker application containers

```sh
docker-compose run --rm web bash
```

#### Stopping everything:

```sh
docker compose down
```

You can start things up again with `docker compose up` and unlike the first
time it should only take seconds.

### `php-cs-fixer`

setting file - .php-cs-fixer.dist.php

```sh
# display diff code
./tools/php-cs-fixer/vendor/bin/php-cs-fixer fix -v --diff --dry-run

# run auto formatting
./tools/php-cs-fixer/vendor/bin/php-cs-fixer fix -v --diff
```

### `phpstan`

setting file - phpstan.neon

```sh
# run
./vendor/bin/phpstan analyse --memory-limit=1G

# generate base file if error base_file
./vendor/bin/phpstan analyse --generate-baseline
```
