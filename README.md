<p align="center">
    <img src="./docs/logo.png" width="300" alt="logo">
</p>

<p align="center">
<img src="https://img.shields.io/badge/PHP-8.1-blue.svg?logo=php&style=flat" alt="PHP 8.1">
<img src="https://img.shields.io/badge/Laravel-10.x-red.svg?logo=laravel&style=flat" alt="Laravel 10.x">
<img src="https://img.shields.io/badge/Node.js-18.x-green.svg?logo=node.js&style=flat" alt="Node.js 18.x">
<img src="https://img.shields.io/badge/TypeScript-4.x-blue.svg?logo=typescript&style=flat" alt="TypeScript 4.x">

<img src="https://img.shields.io/badge/React-18.x-blue.svg?logo=react&style=flat" alt="React 18.x">
<img src="https://img.shields.io/badge/MySQL-8.0-blue.svg?logo=mysql&style=flat" alt="MySQL 8.0">
</p>

# Laravel Ecommerce Application 🛍

### Client Sample Page

<p align="center">
    <img src="./docs/client-sample.png" alt="">
</p>

### Shop Owner Management Sample Page

<p align="center">
    <img src="./docs/admin-sample.png" alt="">
</p>

### Add Composer Libraries

<details>
  <summary>Composer library list</summary>

- [php-cs-fixer * コードフォーマッター](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer)
- [nunomaduro/larastan * 静的解析ツール](https://phpstan.org/user-guide/getting-started)
- [laravelcollective/html * Formファザード](https://github.com/LaravelCollective/html)
- [reliese/laravel * Model作成ライブラリ](https://github.com/reliese/laravel)
- [barryvdh/laravel-ide-helper * IDEヘルパー](https://github.com/barryvdh/laravel-ide-helper)
- [barryvdh/laravel-debugbar * デバッカー](https://github.com/barryvdh/laravel-debugbar)
- [laravel/sail * Docker開発環境](https://readouble.com/laravel/10.x/ja/sail.html)
- [bensampo/laravel-enum * 列挙型](https://github.com/BenSampo/laravel-enum)
- [laravel/breeze * ログイン認証系](https://github.com/laravel/breeze)
- [brianium/paratest * 並列テスト](https://packagist.org/packages/brianium/paratest)
- [league/flysystem-aws-s3-v3 * s3ライブラリー](https://packagist.org/packages/league/flysystem-aws-s3-v3)
- [intervention/image * 画像リサイズライブラリー](https://image.intervention.io/v2)
- [deployer/deployer * デプロイ用](https://github.com/deployphp/deployer)

</details>

### Add Node Modules

<details>
  <summary>Node module list</summary>

- [@inertiajs/react * inertia/reactライブラリ](https://www.npmjs.com/package/@inertiajs/react)
- [@vitejs/plugin-react * vitejs/reactライブラリ](https://www.npmjs.com/package/@vitejs/plugin-react)
- [react * JSライブラリー](https://react.dev/)
- [react-dom * react dom ライブラリ](https://legacy.reactjs.org/docs/react-dom.html)
- [tailwindcss * CSSライブラリ](https://tailwindcss.com/)
- [uuid * uuid作成ライブラリ](https://www.npmjs.com/package/uuid)
- [vitest * JSテストライブラリ](https://vitest.dev/)

</details>

# Directory Structure 📁

```
.
├── .github/
│   ├── workflows/              # Github Actions file

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
│   ├── js/                     # JSX files
│   │   ├── Components/         # JSX Components files
│   │   ├── Layouts/            # JSX Layouts files
│   │   ├── Pages/              # JSX Pages files
│     
 
├── routes/                     # Place each router here
│   ├── api.php                 # Routing for external use
│   ├── admin.php               # Admin User routing
│   ├── owner.php               # Owner User routing
│   ├── web.php                 # Customer User routing
│

├── tests/
│   ├── Feature/                # Tests for single controllers
│   ├── Unit/                   # Method-level tests for service classes
├── tools/
│   ├── php-cs-fixer/           # Code formatting tool location
│

├── deploy.php                  # Configuration file to deployer
├── docker-compose.yml          # Configuration file to define and run multi-container Docker applications
├── .php-cs-fixer.dist.php      # Configuration file for php-cs-fixer
├── phpstan.neon                # Configuration file for phpstan
├── tsconfig.json               # Configuration file for TypeScript
├── vite.config.js              # Configuration file for Vite
```

# Infrastructure

<p align="center">
    <img src="./docs/infrastructure.png" width="550" alt="infra">
</p>

# DB Structure

<p align="center">
    <img src="./docs/er.drawio.png" width="550" alt="er">
</p>

# Participation in Project

#### Clone this repo anywhere you want and move into the directory:

```sh
git clone https://github.com/taisei-ugawa-climber/laravel-ecommerce.git
```

#### Copy an example .env file because the real one is git ignored:

```sh
cp .env.example .env
```

### `.env`

```dotenv
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=
AWS_BUCKET=
AWS_URL=

STRIPE_PUBLIC_KEY=
STRIPE_SECRET_KEY=
```

# Command

### `Laravel Sail`

#### Build everything:

```sh
sail up -d
```

#### Access to Docker application containers

```sh
sail shell
```

#### Stopping everything:

```sh
sail stop
```

You can start things up again with `docker compose up -d` and unlike the first
time it should only take seconds.

```sh
# Installing dependent packages
sail composer install
sail npm install
# Run migration and seed
sail php artisan php migrate:refresh --seed
# Compile jsx and sass files
sail npm run dev
```

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

### `php unit`

```sh
# keep coverage 60%
sail php artisan test --coverage --env=testing # --min=60 
# parallel
sail php artisan test --parallel --processes=3
# profile
sail php artisan test --profile
```

### `vitest`

```sh
sail npm run test
```

### `Deploy`

#### ※ Each environment file is required as a prerequisite

```sh
# Reflection on staging environment
dep deploy dev
# Reflection on production environment
dep deploy prod
```
