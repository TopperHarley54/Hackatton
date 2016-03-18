<?php
session_cache_limiter(false);
session_start();
require 'vendor/autoload.php';
$app = new \Slim\Slim(array(
    'view' => new \Slim\Views\Twig(),
    'templates.path' => 'app/templates',
));

require 'app/routes.php';


$app->run();

?>
