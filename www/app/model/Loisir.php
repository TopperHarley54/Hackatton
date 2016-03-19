<?php
/**
 * Created by PhpStorm.
 * User: Christophe
 * Date: 18/03/2016
 * Time: 19:12
 */

use Illuminate\Database\Eloquent\Model;


class Loisir extends Model{

    protected $primaryKey = "CODGEO";
    protected $table = "loisir";
    public $timestamps = false;

    public static function getAllDocuments($var)
    {
        return Loisir::get($var);

    }
}






