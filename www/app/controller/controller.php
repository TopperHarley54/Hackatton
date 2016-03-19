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
            array('title' => 'Ecole', 'type' => [['NB_C104','Elementaire'], ['NB_C104_NB_CANT','Elementaire avec cantine'], ['NB_C101','Maternelle'], ['NB_C101_NB_CANT','Maternelle avec cantine']]),
            array('title' => 'Medical', 'type' => [['NB_D201','Général'], ['NB_D202','Cardiologue'], ['NB_203','Dermatologue'], ['NB_D204','Gynécologue Médicale'], ['NB_D205','Gynécologue Obstétrique'], ['NB_D206','Gastro-entéro-hépatologie'], ['NB_D207','Psychiatre'], ['NB_D208','Ophtalmologiste'], ['NB_D209','Oto-rhino-laryngologie'], ['NB_D210','Pédiatre'], ['NB_D211','Pneumologue'], ['NB_D212','Radiologie'], ['NB_D213','Stomatologie'], ['NB_D221','Dentiste'], ['NB_D232','Infirmier'], ['NB_D233','Kinésithérapeute']]),
            array('title' => 'Sport', 'type' => [['NB_F107','Athlétisme'], ['NB_F101','Natation'], ['NB_F102','Boulodrome'], ['NB_F103','Tennis'], ['NB_F104','Equipementier Cyclisme'], ['NB_F105','Domaine skiable'], ['NB_F106','Centre équestre'], ['NB_F108','Terrain de golf'], ['NB_F109','Parcours sport/santé'], ['NB_F110','Sport de glace'], ['NB_F111','Terrain de jeux extérieurs'], ['NB_F113','Terrains de grand jeu'], ['NB_F114','Salle de combat'], ['NB_F117','Skatepark'], ['NB_F118','Sport Nautique'], ['NB_F119','Bowling'], ['NB_F120','Salle de remise en forme'], ['NB_F121','Gymnase'], ['NB_F202','Port de plaisance / Mouillage'], ['NB_F203','Boucle Randonnée'], ['NB_F301','Cinéma'], ['NB_F302','Théatre']]),
            array('title' => 'Commerce Alimentaire', 'type' => [['NB_B202','Epicerie'], ['NB_B203','Boulangerie'], ['NB_B204','Boucherie/Charcuterie'], ['NB_B205','Surgelé'], ['NB_B206','Poissonnerie']]),
            array('title' => 'Marche', 'type' => [['NB_B101','Hyper'], ['NB_B102','Super'],['NB_B201','Superette'], ['NB_B309','Droguerie']]),
            array('title' => 'Pour la maison', 'type' => [['NB_B103','Bricolage'], ['NB_B303','Equipement foyer'], ['NB_B305','Electromenager et audio-visuelle'], ['NB_B306','Meuble'], ['NB_B308','Revètement mur/sol']]),
            array('title' => 'Shopping', 'type' => [['NB_B301','Librairie'], ['NB_B302','Vêtement'], ['NB_304','Chaussures'], ['NB_307','Sport/Loisir'], ['NB_B310','Parfumerie'], ['NB_B311','Bijouterie'], ['NB_B312','Fleuriste'], ['NB_B313','Optique']]),
            array('title' => 'Station-service', 'type' => [['NB_B314','Station-service']]),
        )));
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

    public function alertform(){
        $this->app->render('alertformulaire.twig');
    }

    public function ecoles(){
        $ecoles = Ecole::getAllDocuments(['NB_C104','NB_C104_NB_CANT','NB_C101','NB_C101']);
        $this->header();
        $this->navbar();
        $this->app->render('ecoles.twig', array("ecoles" => $ecoles));
        $this->footer();
    }

    public function medicales(){
        $medicales = Medical::getAllDocuments(['NB_D201','NB_D202','NB_D207','NB_D221']);
        $this->header();
        $this->navbar();
        $this->app->render('medicales.twig', array("medicales" => $medicales));
        $this->footer();
    }

    public function sport(){
        $sports = Loisir::getAllDocuments(['NB_F107','NB_F101','NB_F102','NB_F104']);
        $this->header();
        $this->navbar();
        $this->app->render('sports.twig', array("sports" => $sports));
        $this->footer();
    }

    public function commerceaAli(){
        $commerces = Commerce::getAllDocuments(['NB_B202','NB_B203','NB_B204','NB_B205']);
        $this->header();
        $this->navbar();
        $this->app->render('commerces.twig', array("commerces" => $commerces));
        $this->footer();
    }

    public function marche(){
        $marches = Commerce::getAllDocuments(['NB_B101','NB_B102','NB_B201','NB_B309']);
        $this->header();
        $this->navbar();
        $this->app->render('marches.twig', array("marches" => $marches));
        $this->footer();
    }

    public function maison(){
        $maisons = Commerce::getAllDocuments(['NB_B103','NB_B303','NB_B305','NB_B306']);
        $this->header();
        $this->navbar();
        $this->app->render('maison.twig', array("maisons" => $maisons));
        $this->footer();
    }

  }


?>
