<?php

namespace Deployer;

require 'recipe/laravel.php';

/** Config */

set('application', 'laravel-ecommerce.com');

set('repository', 'https://github.com/taisei-ugawa-climber/laravel-ecommerce.git');

set('git_tty', true);

set('composer_options', 'install --verbose --prefer-dist --no-progress --no-interaction --optimize-autoloader');

set('keep_releases', 3);

add('shared_files', ['.env', '.htaccess', '.htpasswd']);

add('shared_dirs', []);

add('writable_dirs', ['bootstrap/cache', 'storage']);

/** Host */

// Staging
host('stg.laravel-ecommerce.jp')
    ->stage('dev')
    ->set('deploy_path', '~')
    ->set('branch', 'develop');

// Production
host('laravel-ecommerce.jp')
    ->stage('prod')
    ->set('deploy_path', '~')
    ->set('branch', 'main');

/** Hooks */

before('deploy:shared', 'upload-env');
task('upload-env', function () {
    $stage = get('stage');
    $src = ".env.${stage}";
    $deployPath = get('deploy_path');
    $sharedPath = "${deployPath}/shared";
    upload(__DIR__ . "/" . $src, "${sharedPath}/.env");
});

before('deploy:shared', 'upload-htaccess');
task('upload-htaccess', function () {
    $stage = get('stage');
    $deployPath = get('deploy_path');
    $sharedPath = "${deployPath}/shared";
    if ($stage === 'dev') {
        $src = ".htaccess.${stage}";
        upload(__DIR__ . "/" . $src, "${sharedPath}/.htaccess");
        $src = ".htpasswd.${stage}";
        upload(__DIR__ . "/" . $src, "${sharedPath}/.htpasswd");
    }
});

before('deploy:symlink', 'artisan:migrate');

task('npm:run', function (): void {
    run('cd {{release_path}} && npm install');
    input()->getArgument('stage') === 'prod' ?
        run('cd {{release_path}} && npm run production') :
        run('cd {{release_path}} && npm run development');
});

after('artisan:migrate', 'npm:run');

after('deploy:failed', 'deploy:unlock');
