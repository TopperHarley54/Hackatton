<?php

use Illuminate\Database\Eloquent\Model;


class Alerte extends Model{

    protected $primaryKey = 'id_alerte';
    protected $table = 'alerte';
    public $timestamps = false;
    
    public static function newAlerte($insert_alerte) {
        try {
            $alerte = new Alerte;
            $alerte->lat = $insert_alerte->lat;
            $alerte->lng = $insert_alerte->lng;
            $alerte->type = $insert_alerte->type;
            $alerte->commentaire = $insert_alerte->commentaire;
            $alerte->nbValide = 0;
            $alerte->nbRefus = 0;
            $alerte->save();
            return 0;
        } catch (Exception $e) {
            return 1;
        }
    }

    public static function incValide($id) {
        try {
            $alerte = Alerte::find($id);
            $alerte->nbValide++;
            $alerte->save();
            return $alerte;
        } catch (Exception $e) {
            return null;
        }
    }

    public static function incRefus($id) {
        try {
            $alerte = Alerte::find($id);
            $alerte->nbRefus++;
            $alerte->save();
            return $alerte;
        } catch (Exception $e) {
            return null;
        }
    }

    public static function deleteAlerte($id) {
        try {
            $alerte = Alerte::find($id);
            $alerte->delete();
            return 0;
        } catch (Exception $e) {
            return 1;
        }
    }
}


