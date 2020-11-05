<?php

use Symfony\Component\Dotenv\Dotenv;

$envPath = dirname(__DIR__) . '/.env';

// load env
if (file_exists($envPath)) {
    $dotenv = new Dotenv(true);
    $dotenv->load($envPath);
}

// yii defaults
defined('YII_DEBUG') or define('YII_DEBUG', getenv('YII_DEBUG') === 'true');
defined('YII_ENV') or define('YII_ENV', getenv('YII_ENV') ?: 'prod');
