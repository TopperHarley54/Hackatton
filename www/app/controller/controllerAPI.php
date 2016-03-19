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
}