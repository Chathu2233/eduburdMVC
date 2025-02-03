<?php

/**
 * Debugging helper to output formatted data.
 *
 * @param mixed $data The data to display.
 * @return void
 */
function show($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    exit; // Ensures script execution stops after showing data
}

/**
 * Escapes a string for safe HTML output.
 *
 * @param string $str The string to escape.
 * @return string The escaped string.
 */
function esc($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

/**
 * Redirects to a given path within the application.
 *
 * @param string $path The path to redirect to, relative to the ROOT.
 * @return void
 */
function redirect($path)
{
    header("Location: " . ROOT . "/" . trim($path, "/"));
    exit; // Ensures no further code is executed after the redirect
}

/**
 * Get a value from the global $_POST array safely.
 *
 * @param string $key The key to retrieve from $_POST.
 * @return mixed|null The value if it exists, null otherwise.
 */
function post($key)
{
    return isset($_POST[$key]) ? esc($_POST[$key]) : null;
}

/**
 * Get a value from the global $_GET array safely.
 *
 * @param string $key The key to retrieve from $_GET.
 * @return mixed|null The value if it exists, null otherwise.
 */
function get($key)
{
    return isset($_GET[$key]) ? esc($_GET[$key]) : null;
}
