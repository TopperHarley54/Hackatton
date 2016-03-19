<?php
/**
 * Created by PhpStorm.
 * User: Christophe
 * Date: 19/03/2016
 * Time: 09:28
 */

use Illuminate\Database\Eloquent\Model;

class Type extends Model{

    protected $primaryKey = "id_type";
    protected $table = "type";
    public $timestamps = false;

    public function alerte()
    {
        return $this->belongsTo('alerte', 'id_alerte');
    }


    public static function getAllDocuments($var)
    {
        array_push($var, 'type');
        return Type::get($var);
    }
}
