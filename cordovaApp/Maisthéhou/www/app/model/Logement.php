<?php
/**
 * Created by PhpStorm.
 * User: Christophe
 * Date: 18/03/2016
 * Time: 17:58
 */

use Illuminate\Database\Eloquent\Model;

class Logement extends Model{

    protected $primaryKey = "CODGEO";
    protected $table = "logement";
    public $timestamps = false;


    public static function getAllDocuments($var)
    {
    	array_push($var, 'LIBGEO');
        return Logement::get($var);
    }
}
