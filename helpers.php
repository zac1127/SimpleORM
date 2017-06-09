<?php

function view($path, $data = [])
{
    $path = implode('/', explode('.', $path));

    foreach ($data as $key => $value) {
        $$key = $value;
    }

    if(is_file("../views/{$path}.view.php")) {
        return require "../views/{$path}.view.php";
    }

    return require "../views/404.view.php";
}

function redirect($path)
{
    header("Location: /" . $path);
}
