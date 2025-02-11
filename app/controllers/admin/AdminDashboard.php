<?php

class AdminDashboard

{
    
    public function index()
    {
        $this->view("admin/admindashboard"); // Ensure correct view path
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