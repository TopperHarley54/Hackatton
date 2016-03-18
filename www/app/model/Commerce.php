<?php
/**
 * Created by PhpStorm.
 * User: Christophe
 * Date: 18/03/2016
 * Time: 17:06
 */
use Illuminate\Database\Eloquent\Model;

class Commerce extends Model
{

    protected $primaryKey = "CODGEO";
    protected $table = "commerce";
    public $timestamps = false;

}
