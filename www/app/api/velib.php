<?php

define("API_KEY", "b8e87b05a8e86461a05763d29e97c12af80885dc");
define("CONTRACT", "Nancy");

class Velib extends Get
{

    public static function getVelib() {
        try {
            return self::getJson('https://api.jcdecaux.com/vls/v1/stations?contract=' . CONTRACT . '&apiKey=' . API_KEY);
        } catch (Exception $e) {
            return null;
        }
    }

}