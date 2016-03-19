<?php
/**
 * Created by PhpStorm.
 * User: Christophe
 * Date: 18/03/2016
 * Time: 19:32
 */

use Illuminate\Database\Eloquent\Model;

class Medical extends Model{

    protected $primaryKey = "CODGEO";
    protected $table = "medical";
    public $timestamps = false;


    public static function getAllDocuments($var)
    {
        return Medical::get($var);

    }
}

