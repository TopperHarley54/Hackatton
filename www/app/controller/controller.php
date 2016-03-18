<?php

class controller
{

    protected $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    /*MODULES*/
    //AFFICHER LE HEADER
    public function header()
    {
        $this->app->render('header.twig');
    }

    //AFFICHER LE NAVBAR
    public function navbar()
    {
        $this->app->render('navbar.twig');
    }
    public function map()
    {
        $this->app->render('map.twig');
    }
    //AFFICHER LE FOOTER
    public function footer()
    {
        $this->app->render('footer.twig');
    }




    //GENERE LA PAGE D ACCUEIL
    public function accueil()
    {
        $this->header();
        $this->navbar();
        $this->map();
        $this->footer();
    }


  }


?>
