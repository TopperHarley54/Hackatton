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

    //AFFICHER LE FOOTER
    public function footer()
    {
        $this->app->render('footer.twig');
    }


    public function openMap()
    {
        $this->app->render('openMap.twig');
    }

    public function closeMap()
    {
        $this->app->render('closeMap.twig');
    }

    //AFFICHER LA MAP
    public function map()
    {
        $name_ville = $this->app->request->get('ville');
        if ($name_ville != null){
            $google = Google::getCoordFromSearchAdress($name_ville);
            $result["lat"]=$google->geometry->location->lat;
            $result["lon"]=$google->geometry->location->lng;
        }else {
            $ip_api = Get::getJson("http://ip-api.com/json");
            $result["lat"]=$ip_api->lat;
            $result["lon"]=$ip_api->lon;
        }
        $this->openMap();
        $this->app->render('map.twig', array('latitude' => $result["lat"],
                                             'longitude' => $result["lon"]));
        
        $this->closeMap();

    }


    public function addMarker($marker) {
        $this->app->render('addMarker.twig', array('marker' => $marker));
    }

    //GENERE LA PAGE D ACCUEIL
    public function accueil()
    {
        $this->header();
        $this->navbar();
        $this->searchBar();
        $this->map();
        $this->footer();
    }


    public function searchBar(){
        $this->app->render('searchBar.twig');
    }

  }


?>
