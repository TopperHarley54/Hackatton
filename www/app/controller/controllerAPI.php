<?php

class ControllerAPI extends Controller
{

    public function alerteAll()
    {
        $alerte = Alerte::all();
        $this->app->render('alerte.twig', array('alerte' => $alerte));
    }

    public function alerteId($id)
    {
        $alerte = Alerte::find($id);
        $this->app->render('alerte.twig', array('alerte' => $alerte));
    }

    public function alerteAdd($alerte)
    {
        if (Alerte::newAlerte($alerte) == 0) {
            $this->app->response->setStatus(201);
            $alerte = array("status" => "created");
        } else {
            $this->app->response->setStatus(200);
            $alerte = array("status" => "error");
        }
        $this->app->render('alerte.twig', array('alerte' => $alerte));
    }

}