<?php

// Autoload classes based on their names
spl_autoload_register(function($classname) {
    // Check the model directory first
    $modelPath = "../app/models/" . ucfirst($classname) . ".php";
    if (file_exists($modelPath)) {
        require $modelPath;
    } else {
        // Try the controllers directory if not found in models
        $controllerPath = "../app/controllers/" . ucfirst($classname) . ".php";
        if (file_exists($controllerPath)) {
            require $controllerPath;
        } else {
            // If not found in either, throw an error
            die("Class {$classname} could not be loaded.");
        }
    }
});

// Include other necessary files for the application
require_once 'config.php';      // Contains the database and app configuration
require_once 'functions.php';    // Utility functions for app-wide use
require_once 'Database.php';     // Provides database connection and queries
require_once 'Model.php';        // Base model class for data handling
require_once 'Controller.php';   // Base controller class for view and model interactions
require_once 'App.php';          // Main app handler, loads controllers and methods
