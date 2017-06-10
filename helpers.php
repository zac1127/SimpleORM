<?php

if (! function_exists('config')) {
    function config($value)
    {
        return require getcwd() . "/../config/{$value}.php";
    }
}

if (! function_exists('view')) {
    function view($path, $data = [])
    {
        $viewsPath = config('view')['path'] . '/';

        $path = str_replace(".", "/", $path);

        if (is_file("{$viewsPath}{$path}.view.php")) {
            extract($data);
            return require "{$viewsPath}{$path}.view.php";
        }

        return require "{$viewsPath}404.view.php";
    }
}

if (! function_exists('redirect')) {
    function redirect($path)
    {
        header("Location: /" . $path);
    }
}

if (! function_exists('resource_path')) {
    function resource_path($directory)
    {
        return getcwd() . "/../resources/{$directory}";
    }
}
