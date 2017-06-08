<?php

function view($name, $data = [])
{
    foreach ($data as $key => $value) {
        $$key = $value;
    }
    return require "../views/{$name}.view.php";
}

function redirect($path)
{
    header("Location: /" . $path);
}
