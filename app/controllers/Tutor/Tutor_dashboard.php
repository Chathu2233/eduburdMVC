<?php

class Tutor_dashboard
{

    use Controller;
    
    public function index()
    {
        
        $this->view("/tutor/tutor_dashboard");
    }

    private function view($viewName)
    {
        // Include the view file
        if (file_exists("../app/views/" . $viewName . ".view.php")) {
            include "../app/views/" . $viewName . ".view.php";
        } else {
            echo "View file not found!";
        }
    }
}