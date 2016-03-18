<?php

class Velib extends Get
{

    private $api_key = 'b8e87b05a8e86461a05763d29e97c12af80885dc';
    private $contract_name = 'Nancy';

    public static function getVelib() {
        return getJson('https://api.jcdecaux.com/vls/v1/stations?contract=' . $contract_name . '&apiKey=' . $api_key);
    }

}