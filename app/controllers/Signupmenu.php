<?php

class Signupmenu
{
    use controller;

    
    public function index()
    {
        // Render the header_guest.view.php file
        $data = [];
        $this->view("signupmenu",$data);
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
