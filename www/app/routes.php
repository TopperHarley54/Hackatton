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

$app->get('/alertForm', function () use ($app) {
    $c = new Controller($app);
    $c->alertform();
})->name('api-alerte');

$app->get('/Ecole', function () use ($app) {
        $c = new Controller($app);
        $c->ecoles();
})->name('ecoles');

$app->get('/Medical', function () use ($app) {
        $c = new Controller($app);
        $c->medicales();
})->name('Medical');

$app->get('/Sport', function () use ($app) {
        $c = new Controller($app);
        $c->sport();
})->name('sport');

$app->group('/api', function () use ($app) {

    $app->get('/alerte', function () use ($app) {
        $c = new ControllerAPI($app);
        $c->alerteAll();
    })->name('api-alerte');

    $app->get('/alerte/:id', function ($id) use ($app) {
        $c = new ControllerAPI($app);
        $c->alerteId($id);
    })->name('api-alerte-id');

    $app->post('/alerte', function () use ($app) {
        $c = new ControllerAPI($app);
        $alerte = json_decode($app->request->getBody())[0];
        $c->alerteAdd($alerte);
    })->name('api-post-alerte');

    $app->put('/alerte/:id/valide', function ($id) use ($app) {
        $c = new ControllerAPI($app);
        $c->alerteValide($id);
    })->name('api-valide-alerte');

    $app->put('/alerte/:id/refus', function ($id) use ($app) {
        $c = new ControllerAPI($app);
        $c->alerteRefus($id);
    })->name('api-refus-alerte');

    $app->delete('/alerte/:id', function ($id) use ($app) {
        $c = new ControllerAPI($app);
        $c->alerteDelete($id);
    })->name('api-delete-alerte');

    $app->post('/requeteMap', function () use ($app) {
        $c = new ControllerAPI($app);
        var_dump($app->request->getBody());
        $c->getData($app->request->getBody());
    })->name('requete-get-data');

    $app->get('/velib', function () use ($app) {
        $c = new ControllerAPI($app);
        $c->velibAll();
    })->name('api-velib');


    //type
    $app->get('/type', function () use ($app) {
        $c = new ControllerAPI($app);
        $c->TypeAll();
    })->name('api-type');

    $app->post('/type', function () use ($app) {
        $c = new ControllerAPI($app);
        $type = json_decode($app->request->getBody())[0];
        $c->TypeAdd($type);
    })->name('api-post-type');    
});

?>
