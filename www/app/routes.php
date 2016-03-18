<?php

//renvoie a l'accueil
$app->get('/', function () use ($app) {
    $c = new Controller($app);
    $c->accueil();
})->name('root');

//AFFICHER DES PAGES
/*Accueil*/
$app->get('/accueil', function () use ($app) {
    $c = new Controller($app);
    $c->accueil();
})->name('accueil');


$app->get('/test-api', function () use ($app) {
    $c = new Controller($app);
    $c->testApi();
})->name('test-api');

?>
