<?php
require "vendor/autoload.php";
use Illuminate\Database\Capsule\Manager as DB;

$tabConfig = parse_ini_file('config.ini');

$capsule = new DB;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => $tabConfig['host'],
    'database'  => $tabConfig['database'],
    'username'  => $tabConfig['username'],
    'password'  => $tabConfig['password'],
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);


// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
// $capsule->setAsGlobal();
$capsule->bootEloquent();
