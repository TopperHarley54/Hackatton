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

}