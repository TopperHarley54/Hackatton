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


$app->group('/api', function () use ($app) {

    $app->get('/alerte', function () use ($app) {
        $c = new ControllerAPI($app);
        $c->alerteAll();
    })->name('api-alerte');

    $app->get('/alerte/:id', function ($id) use ($app) {
        $c = new ControllerAPI($app);
        $c->alerteId($id);
    })->name('api-alerte-id');

});

?>
