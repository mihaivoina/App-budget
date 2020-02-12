<?php

class Database {

    private const SERVER    = 'localhost';
    private const USER      = 'root';
    private const PASSWORD  = '';
    private const DATABASE  = 'app_buget';
    private static $connexion;

    public static function connect()
    {
        if(is_null(self::$connexion)){
            self::$connexion = new mysqli(self::SERVER, self::USER, self::PASSWORD, self::DATABASE);
        }

        return new self;
    }

    public function insert($sql)
    {
        return self::$connexion->query($sql);
    }

    public function delete($sql)
    {
        return self::$connexion->query($sql);
    }

    public function sum($sql)
    {
        return self::$connexion->query($sql);
    }

    public function select($sql)
    {
        $result = self::$connexion->query($sql);

        if($result->num_rows > 0){
            $results = [];
            while($row = $result->fetch_assoc()){
                array_push($results, $row);
            }

            return $results;
        }

        return false;
    }
}
