<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel Ecommerce Application

### Environment

- PHP: v8.1.22
- Laravel: v10.20.0
- Node: v18.17.1
- React: v18.2.0
- MySQL: v8.0

### Add Composer Libraries

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

### Add Node Modules

- [@inertiajs/react * inertia/reactライブラリ](https://www.npmjs.com/package/@inertiajs/react)
- [@vitejs/plugin-react * vitejs/reactライブラリ](https://www.npmjs.com/package/@vitejs/plugin-react)
- [react * JSライブラリー](https://react.dev/)
- [react-dom * react dom ライブラリ](https://legacy.reactjs.org/docs/react-dom.html)
- [tailwindcss * CSSライブラリ](https://tailwindcss.com/)
- [uuid * uuid作成ライブラリ](https://www.npmjs.com/package/uuid)
- [vitest * JSテストライブラリ](https://vitest.dev/)

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
│   ├── js/                     # JSX files
│   │   ├── Components/         # JSX Components files
│   │   ├── Layouts/            # JSX Layouts files
│   │   ├── Pages/              # JSX Pages files
│   ├── lang/                   # Translation files
│   ├── view/                   # Templates
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
├── docker-compose.yml          # Configuration file to define and run multi-container Docker applications
├── .php-cs-fixer.dist.php      # Configuration file for php-cs-fixer
├── phpstan.neon                # Configuration file for phpstan
├── tsconfig.json               # Configuration file for TypeScript
├── vite.config.js              # Configuration file for Vite
```

# Infrastructure

in preparation...

# DB Structure

<p align="center">
    <a href="https://ugawa-public.s3.ap-northeast-1.amazonaws.com/images/ecommerce/ecommerce.drawio.png">
        <img src="https://ugawa-public.s3.ap-northeast-1.amazonaws.com/images/ecommerce/ecommerce.drawio.png" alt="ER">
    </a>
</p>

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

```dotenv
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=
AWS_BUCKET=
AWS_URL=

STRIPE_PUBLIC_KEY=
STRIPE_SECRET_KEY=
```

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

You can start things up again with `docker compose up` and unlike the first
time it should only take seconds.

### `Installing Dependent Packages`

```sh
sail composer install
sail npm install

sail php artisan php migrate:refresh --seed
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

### `Compile JSX and Sass files`

```sh
# run
sail npm run dev
```

# PHP Unit Tests

#### run php unit tests:

```sh
# keep coverage 60%
sail php artisan test --coverage --env=testing # --min=60 

# parallel
sail php artisan test --parallel --processes=3

# profile
sail php artisan test --profile
```

# Vitest

#### run vitest:

```sh
# run
sail npm run test
```
