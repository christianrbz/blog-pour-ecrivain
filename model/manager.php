<?php

// Manager pour le localhost
class Manager 
{
    public function __construct()
    {
        try
        {
            $this->_db = new PDO('mysql:host=localhost;dbname=projet4jf;charset=utf8', 'root', '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
            die('erreur : '.$e->getMessage());
        } 
    }
}

// Dans le Manager pour le site les informations sont différentes
// $this->_db = new PDO('mysql:host=db5000540898.hosting-data.io;dbname=dbs519342;charset=utf8', 'dbu904496', 'Alaska56@',