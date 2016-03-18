<?php
/**
 * Created by PhpStorm.
 * User: Christophe
 * Date: 18/03/2016
 * Time: 19:01
 */

use Illuminate\Database\Eloquent\Model;


class Ecole extends Model{

    protected $primaryKey = "CODGEO";
    protected $table = "ecole";
    public $timestamps = false;

}



