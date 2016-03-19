<?php

class Get {

    public static function getJson($url) {
        $file = file_get_contents($url);
        
        if (!isset($http_response_header[0]) || preg_match("#[4-5][0-9]{2}#", $http_response_header[0])) {
            throw new Exception("Erreur serveur distant : ".$url);
        }
        return json_decode($file);
    }
}