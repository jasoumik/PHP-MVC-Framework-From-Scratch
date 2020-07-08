<?php
namespace App\Models;
use PDO;
use PDOException;

class Post extends \Core\Model{
    public static function getAll(){
        // $host='localhost';
        // $dbname="mvc";
        // $uname="root";
        // $pass="";

        try {
           // $db=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$uname,$pass);
            $db=static::getDB();
            $stm= $db->query('SELECT id,title,content from posts 
            ORDER BY created_at');
            $results =$stm->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}