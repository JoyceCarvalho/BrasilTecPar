<?php 
namespace BF\Model;

use App\Connection;

class Container {

    /**
     * Método responsável por instanciar o banco para os Models
     */
    public static function getModel($model){
        $class = "\\App\\Models\\".ucfirst($model);

        $conn = Connection::getDb();
        
        return new $class($conn);
    }
}
?>