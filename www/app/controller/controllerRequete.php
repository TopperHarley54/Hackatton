<?php

class ControllerRequete extends Controller
{
	public function getData($donnees)
    {
    	
        $alerte = Ecole::getAllDocuments();
        $this->app->render('donnee.twig', array('alerte' => "tmp"));
    }
}

?>
