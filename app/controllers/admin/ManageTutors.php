<?php

class ManageTutors

{
    use Controller;
    public function index()
    {
        // Render the "add new case" view with an empty errors array
        $this->view('/admin/managetutors');
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