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
        $this->app->render('navbar.twig', array(
          'options' =>  array(
            array('title' => 'Ecole', 'type' => ['Elementaire', 'Elementaire avec cantine', 'Maternelle', 'Maternelle avec cantine']),
            array('title' => 'Médical', 'type' => ['Général', 'Cardiologue', 'Dermatologue', 'Gynécologue Médicale', 'Gynécologue Obstétrique', 'Gastro-entéro-hépatologie', 'Psychiatre', 'Ophtalmologiste', 'Oto-rhino-laryngologie', 'Pédiatre', 'Pneumologue', 'Radiologie', 'Stomatologie', 'Dentiste', 'Infirmier', 'Kinésithérapeute']),
            array('title' => 'Sport/Loisir', 'type' => ['Athlétisme', 'Natation', 'Boulodrome', 'Tennis', 'Equipementier Spécialisé', ' Domaine skiable', 'Centre équestre', 'Terrain de golf', 'Parcours sport/santé', 'Sport de glace', 'Terrain de jeux extérieurs', 'Terrains de grand jeu', 'Salle de combat', 'Skatepark', 'Sport Nautique', 'Bowling', 'Salle de remise en forme', 'Gymnase', 'Port de plaisance / Mouillage', 'Boucle Randonnée', 'Cinéma', 'Théatre']),
            array('title' => 'Commerce Alimentaire', 'type' => ['Epicerie', 'Boulangerie', 'Boucherie/Charcuterie', 'Surgelé', 'Poissonnerie']),
            array('title' => 'Marché', 'type' => ['Hyper', 'Super', 'Superette', 'Droguerie']),
            array('title' => 'Pour la maison', 'type' => ['Bricolage', 'Equipement foyer', 'Electromenager et audio-visuelle', 'Meuble', 'Revètement mur/sol', 'Cuisine']),
            array('title' => 'Shopping', 'type' => ['Librairie', 'Vêtement', 'Chaussures', 'Sport/Loisir', 'Parfumerie', 'Bijouterie', 'Fleuriste', 'Optique']),
            array('title' => 'Station-service', 'type' => ['Station-service']),
        )));
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
            $result = file_get_contents("http://ip-api.com/json");
            $result = json_decode($result, true);
        }
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
        $this->searchBar();
        $this->map();
        $this->footer();
    }


    public function searchBar(){
        $this->app->render('searchBar.twig');
    }

    public function testApi()
    {
        $velib = Velib::getVelib();
        var_dump("<pre>",$velib,"</pre>");
        $this->app->render('velib.twig', array(
            //'name' => $velib
        ));
    }


  }


?>
