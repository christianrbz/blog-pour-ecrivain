<?php

// Manager pour le site projet4dwj.christian-rbz.com
class Manager 
{
    public function __construct()
    {
        try
        {
            $this->_db = new PDO('mysql:host=db5000540898.hosting-data.io;dbname=dbs519342;charset=utf8', 'dbu904496', 'Alaska56@',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
            die('erreur : '.$e->getMessage());
        } 
    }
}