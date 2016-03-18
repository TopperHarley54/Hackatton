<?php

define("KEY", "AIzaSyD3Q7ykt_9ST1xGcftH0yBqBo1gnqB80xE");

class Google extends Get
{

    public static function getCoordFromSearchAdress($to_search) {
        return self::getJson("https://maps.googleapis.com/maps/api/geocode/json?address=".$to_search."&key=".KEY)->results[0];
    }

}