<?php

trait Controller
{
    /**
     * Load a view file.
     * 
     * @param string $name The name of the view file (without the `.view.php` extension).
     * @param array $data Optional associative array of data to pass to the view.
     */
    public function view($name, $data = [])
    {
        $filename = "../app/views/" . $name . ".view.php";

        // Extract data variables for use in the view
        if (!empty($data)) {
            extract($data);
        }

        if (file_exists($filename)) {
            require $filename;
        } else {
            require "../app/views/404.view.php"; // Fallback to a 404 page
        }
    }

    /**
     * Load a model class.
     * 
     * @param string $model The name of the model class.
     * @return object The instance of the model class.
     */
    public function loadModel($model)
    {
        $modelPath = "../app/models/" . $model . ".php";

        if (file_exists($modelPath)) {
            require_once $modelPath;

            // Ensure the class exists before instantiating it
            if (class_exists($model)) {
                return new $model();
            } else {
                die("The class {$model} does not exist in {$modelPath}.");
            }
        } else {
            die("The model file {$modelPath} does not exist.");
        }
    }
}
