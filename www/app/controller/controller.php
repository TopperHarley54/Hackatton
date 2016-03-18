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
        // $this->app->render('navbar.twig', array{
        //   'options' =>
        // });
    }

    //AFFICHER LA MAP
    public function map()
    {
        $result = file_get_contents("http://ip-api.com/json");
        $result = json_decode($result,true);
        $this->app->render('map.twig', array('latitude' => $result["lat"],
                                             'longitude' => $result["lon"]));
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

    public function testApi()
    {
        $velib = Velib::getVelib();
        $this->app->render('velib.twig', array(
            'name' => $velib[0]['name']
        ));
    }

  }


?>
