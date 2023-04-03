<?php 

abstract class Model{
    private static $_bdd;

    //Instancie la connexion
    private static function setBdd(){
        self::$_bdd = new PDO('mysql:host=localhost;dbname=mini_blog;charset=utf8', 'root', '');
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
 
    //Récupère la connexion à la bdd
    protected function getBdd(){
        if(self::$_bdd == null){
            self::setBdd();
        return self::$_bdd;
        }
    }

    protected function getAll($table, $obj){
        $var = [];
        $req = $this->getBdd()->prepare('SELECT * FROM ' .$table. ' ORDER BY id DESC');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $var[] = new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }
}