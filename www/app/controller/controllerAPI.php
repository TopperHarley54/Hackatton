<?php

class ControllerAPI extends Controller
{

    public function alerteAll()
    {
        $alerte = Alerte::all();
        $this->app->render('json.twig', array('json' => $alerte));
    }

    public function alerteId($id)
    {
        $alerte = Alerte::find($id);
        $this->app->render('json.twig', array('json' => $alerte));
    }

    public function alerteAdd($alerte)
    {
        if (Alerte::newAlerte($alerte) == 0) {
            $this->app->response->setStatus(201);
            $alerte = array("status" => "created");
        } else {
            $this->app->response->setStatus(400);
            $alerte = array("status" => "error");
        }
        $this->app->render('json.twig', array('json' => $alerte));
    }

    public function alerteValide($id)
    {
        $new_alerte = Alerte::incValide($id);
        if ($new_alerte != null) {
            $alerte = $new_alerte;
        } else {
            $this->app->response->setStatus(400);
            $alerte = array("status" => "error");
        }
        $this->app->render('json.twig', array('json' => $alerte));
    }

    public function alerteRefus($id)
    {
        $new_alerte = Alerte::incRefus($id);
        if ($new_alerte != null) {
            $alerte = $new_alerte;
        } else {
            $this->app->response->setStatus(400);
            $alerte = array("status" => "error");
        }
        $this->app->render('json.twig', array('json' => $alerte));
    }

    public function alerteDelete($id)
    {
        if (Alerte::deleteAlerte($id) == 0) {
            $this->app->response->setStatus(200);
            $alerte = array("status" => "deleted");
        } else {
            $this->app->response->setStatus(400);
            $alerte = array("status" => "error");
        }
        $this->app->render('json.twig', array('json' => $alerte));
    }

    public function velibAll()
    {
        $velib = Velib::getVelib();
        if ($velib == null) {
            $this->app->response->setStatus(400);
            $velib = array("status" => "erreur serveur distant (velib)");
        }
        $this->app->render('json.twig', array('json' => $velib));
    }

    public function getData($donnees)
    {
       if(isset(json_decode($donnees,true)["Ecole"])){
            if(sizeof(json_decode($donnees,true)["Ecole"]) > 0){
                $ecole = Ecole::getAllDocuments(json_decode($donnees,true)["Ecole"]);            
                $this->app->render('json.twig', array('json' => $ecole));
            }
        }
        if(isset(json_decode($donnees,true)["Médical"])){
            if(sizeof(json_decode($donnees,true)["Médical"]) > 0){

                $medical = Medical::getAllDocuments(json_decode($donnees,true)["Médical"]);
                $this->app->render('json.twig', array('json' => $medical));
            }
        }
        if(isset(json_decode($donnees,true)["Sport/Loisir"])){
            if(sizeof(json_decode($donnees,true)["Sport/Loisir"]) > 0){

                $sport = Loisir::getAllDocuments(json_decode($donnees,true)["Sport/Loisir"]);
                $this->app->render('json.twig', array('json' => $sport));
            }
        }
        if(isset(json_decode($donnees,true)["Commerce Alimentaire"])){
            if(sizeof(json_decode($donnees,true)["Commerce Alimentaire"]) > 0){

                $commerce = Commerce::getAllDocuments(json_decode($donnees,true)["Commerce Alimentaire"]);
                $this->app->render('json.twig', array('json' => $commerce));
            }
        }
        if(isset(json_decode($donnees,true)["Marché"])){
            if(sizeof(json_decode($donnees,true)["Marché"]) > 0){

                $commerce = Commerce::getAllDocuments(json_decode($donnees,true)["Marché"]);
                $this->app->render('json.twig', array('json' => $commerce));
            }
        }
        if(isset(json_decode($donnees,true)["Pour la maison"])){
            if(sizeof(json_decode($donnees,true)["Pour la maison"]) > 0){

               $commerce = Commerce::getAllDocuments(json_decode($donnees,true)["Pour la maison"]);
                $this->app->render('json.twig', array('json' => $commerce));
            }
        }
        if(isset(json_decode($donnees,true)["Shopping"])){
            if(sizeof(json_decode($donnees,true)["Shopping"]) > 0){

                $commerce = Commerce::getAllDocuments(json_decode($donnees,true)["Shopping"]);
                $this->app->render('json.twig', array('json' => $commerce));
            }
        }
        if(isset(json_decode($donnees,true)["Station-service"])){
            if(sizeof(json_decode($donnees,true)["Station-service"]) > 0){

                $station = Commerce::getAllDocuments(json_decode($donnees,true)["Station-service"]);
                $this->app->render('json.twig', array('json' => $station));
            }
        }
    }

    public function typeAll()
    {
        $type = Type::all();
        $this->app->render('json.twig', array('json' => $type));
    }

    public function typeAdd($type)
    {
        if (Type::newType($type) == 0) {
            $this->app->response->setStatus(201);
            $type = array("status" => "created");
        } else {
            $this->app->response->setStatus(400);
            $type = array("status" => "error");
        }
        $this->app->render('json.twig', array('json' => $type));
    }
}