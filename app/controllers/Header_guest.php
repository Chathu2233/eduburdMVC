<?php

class Header_guest
{
    public function index()
    {
        // Render the header_guest.view.php file
        $this->view("header_guest");
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
