<?php
require_once('SPDO.php');
/*require_once('SRequest.php');*/

if(isset( $_GET['c'] ) ) {
    $controllerName = ucfirst( strtolower( $_GET['c'] ) ) . 'Controller' ;
}   else  {
        $controllerName = 'AccueilController' ;
    }

if( file_exists('controllers/' . $controllerName . '.php') ) {
    require_once('controllers/' . $controllerName . '.php') ;

    if( class_exists($controllerName)) {
        $controller = new $controllerName ;

        if(isset( $_GET['a'] ) ) {
        $actionName = $_GET['a'] . 'Action' ;
        }   else  {
                $actionName = 'showAction' ;
            }

        if(isset( $_GET['id'] ) && ctype_digit( $_GET['id'] ) ) {
            $controller->showOneAction( $_GET['id'] ) ;
        }   else {
                $controller->showAction();
            }
    }
}



