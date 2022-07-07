<?php
require_once 'protected/vendor/maxmind-db/reader/autoload.php';

use MaxMind\Db\Reader;

class MaxMindDB
{
    public static function getCityByIP($ipAddress = '')
    {
        empty($ipAddress) && $ipAddress = $_SERVER['REMOTE_ADDR'];

        $databaseFile = 'GeoLite2-City.mmdb';

        try {
            $reader = new Reader('protected/vendor/maxmind-db/data/' . $databaseFile);
            $result = $reader->get($ipAddress);
            $reader->close();

            return $result;
        } catch (Exception $e) {
            return [];
        }
    }

    public static function city_time()
    {
        $databaseFile = 'GeoLite2-City.mmdb';
        try {
            return filemtime('protected/vendor/maxmind-db/data/' . $databaseFile);
        } catch (Exception $e) {
            return NULL;
        }
    }

}
