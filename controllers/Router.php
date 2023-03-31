<?php

class Router{
    private $_ctrl;
    private $_view;

    public function routeReq(){
        try{
            // Chargement auto des classes
            spl_autoload_register(function($class){
                require_once('models/'.$class.'.php');
            });

            $url = '';

            if(isset($_GET['url'])){
                $url = explode('/', filter_var($_GET['url'], 
                FILTER_SANITIZE_URL));

                $controller = ucfirst(strtolower($url[0]));
                $controllerClass = "Controller".$controller;
                $controllerFile = "Controllers/".$controllerClass.".php";
            }
        }
        catch(Exception $e){

        }
        
    }
}