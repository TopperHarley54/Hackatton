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
        $this->app->render('header.twig', array('isLogged' => SecurityTools::isLogged()));
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
        $documents = Document::getAllDocuments();
        $this->listeDocuments($documents);
        $this->footer();
    }


  }


?>
