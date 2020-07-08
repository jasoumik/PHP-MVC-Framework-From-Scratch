<?php
namespace Core;
use PDO;
use PDOException;
use App\Config;
abstract class Model{
    protected static function getDB(){
        static $db=null;
        if($db===null){
        // $host='localhost';
        // $dbname="mvc";
        // $uname="root";
        // $pass="";

        try {
            $db=new PDO('mysql:host=' .Config::DB_HOST.';dbname='.Config::DB_NAME.
            ';charset=utf8',Config::DB_USER,Config::DB_PASSWORD);
           $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
     }
    return $db;
    }
}