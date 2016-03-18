<?php

use Illuminate\Database\Eloquent\Model;


class Alerte extends Model{

    protected $primaryKey = 'id_alerte';
    protected $table = 'alerte';
    public $timestamps = false;
    
    public static function newAlerte($lat, $lng, $type, $commentaire) {
        try {
            $alerte = new Alerte;
            $alerte->lat = $lat;
            $alerte->lng = $lng;
            $alerte->type = $type;
            $alerte->commentaire = $commentaire;
            $alerte->nbValide = 0;
            $alerte->nbRefus = 0;
            $alerte->save();
            return 0;
        } catch (Exception $e) {
            return 1;
        }
    }

}


