<?php
namespace BF\Controller;

use stdClass;

//Classe responsável pela tratativa de carregamento das views
abstract class Action {

    protected $view;

    public function __construct() {
        $this->view = new stdClass();
    }

    /**
     * Método responsável por realizar o carregamento do layout das páginas de forma dinâmica
     */
    protected function render($view, $layout){

        $this->view->page = $view;

        if(file_exists("../App/Views/".$layout.".phtml")){
            require_once "../App/Views/".$layout.".phtml";
        } else {
            $this->content();
        }

    }

    /**
     * Método responsável por realizar de forma dinâmica o carregamento das paginas de views
     */
    protected function content(){
        $classAtual = get_class($this);
        $classAtual = str_replace("App\\Controllers\\", "", $classAtual);
        $classAtual = strtolower(str_replace("Controller", "", $classAtual));
        
        require_once "../App/Views/".$classAtual."/".$this->view->page.".phtml";
    }
}
?>