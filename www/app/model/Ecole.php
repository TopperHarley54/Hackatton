<?php
/**
 * Created by PhpStorm.
 * User: Christophe
 * Date: 18/03/2016
 * Time: 19:01
 */

use Illuminate\Database\Eloquent\Model;


class Ecole extends Model{

    protected $fillable = ['CODGEO', 'LIBGEO', 'DEP', 'REG', 'REG2016', 'NB_C101', 'NB_C101_NB_CANT', 'NB_C101_NB_EP', 'NB_C101_NB_RPIC', 'NB_C102', 'NB_C102_NB_CANT',
        'NB_C102_NB_EP', 'NB_C104', 'NB_C104_NB_CANT', 'NB_C104_NB_CL_PELEM', 'NB_C104_NB_EP', 'NB_C104_NB_RPIC', 'NB_C105', 'NB_C105_NB_CANT', 'NB_C105_NB_CL_PELEM', 'NB_C105_NB_EP'];

}



