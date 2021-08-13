<?php
namespace App;

use BF\Init\Bootstrap;

//Classe responsável pela definição das rotas do projeto
class Route extends Bootstrap {

    protected function initRoutes()
    {
        $route["home"] = array(
            "route"         => "/",
            "controller"    => "indexController",
            "action"        => "index"
        );

        $route["merge"] = array(
            "route"         => "/merge",
            "controller"    => "indexController",
            "action"        => "merge"
        );

        $this->setRoutes($route);
    }

}
?>