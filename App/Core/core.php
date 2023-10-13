<?php

class Core
{
    public function start($urlGet)
    {
        $action = 'index'; //nome do método da classe HomeController

        if (isset($urlGet['pagina'])) {
            $controller = ucfirst($urlGet['pagina'] . 'Controller');
        } else {
            $controller = 'HomeController';
        }

        if (!class_exists($controller)) {
            $controller = 'ErrorController';
        }

        if (isset($urlGet['id']) && $urlGet['id'] != null) {
            $id = $urlGet['id'];
        } else {
            $id = null;
        }

        call_user_func_array(array(new $controller, $action), array($id));
    }
}
