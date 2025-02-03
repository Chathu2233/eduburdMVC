<?php

class App
{
    private $controller = 'Home';
    private $method     = 'index';

    private function splitURL()
    {
        $URL = $_GET['url'] ?? 'home';
        $URL = explode("/", trim($URL, "/"));
        return $URL;    
    }

    public function loadController()
    {
        $URL = $this->splitURL();
        $controllerPath = "../app/controllers/";

        /** Check if actor-wise folder exists (e.g., Tutor, Student, Parent, Admin) **/
        if (!empty($URL[0]) && is_dir($controllerPath . ucfirst($URL[0]))) {
            $actorFolder = ucfirst($URL[0]);
            unset($URL[0]);

            if (!empty($URL[1])) {
                $controllerFile = ucfirst($URL[1]) . ".php";
                if (file_exists("$controllerPath$actorFolder/$controllerFile")) {
                    require "$controllerPath$actorFolder/$controllerFile";
                    $this->controller = ucfirst($URL[1]);
                    unset($URL[1]);
                }
            }
        } else {
            // Check if the controller exists in the main controllers directory
            $controllerFile = ucfirst($URL[0]) . ".php";
            if (file_exists($controllerPath . $controllerFile)) {
                require $controllerPath . $controllerFile;
                $this->controller = ucfirst($URL[0]);
                unset($URL[0]);
            } else {
                require $controllerPath . "_404.php";
                $this->controller = "_404";
            }
        }

        $controller = new $this->controller;

        /** Select method **/
        if (!empty($URL[1]) && method_exists($controller, $URL[1])) {
            $this->method = $URL[1];
            unset($URL[1]);
        }

        call_user_func_array([$controller, $this->method], $URL);
    }
}
