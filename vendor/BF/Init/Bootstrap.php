<?php
namespace BF\Init;

//Classe responsável pelas tratativas de rotas do BasicFramework
abstract class Bootstrap{

    private $routes;

    abstract protected function initRoutes();

    public function __construct() {
        $this->initRoutes();
        $this->run($this->getUrl());
    }

    public function getRoutes(){
        return $this->routes;
    }

    public function setRoutes(array $routes){
        $this->routes = $routes;
    }

    /**
     * Método resposável por rodar o controller de modo dinâmico através da Url acessada
     */
    protected function run($url){

        foreach ($this->getRoutes() as $key => $route) {
            
            if($url == $route["route"]){
                $class = "App\\Controllers\\".$route["controller"];

                $controller = new $class;
                $action = $route["action"];

                $controller->$action();
            }

        }

    }

    protected function getUrl(){
        return parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    }
}
?>