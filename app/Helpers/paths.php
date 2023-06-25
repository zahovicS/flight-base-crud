<?php

/**
 * 
 *   Path del config fuera del framework
 * 
 */

function get_config(string $file,string $key = "")
{
    $config = require_once config_path("/{$file}.php");
    $config = $_SESSION["config"][$file] ?? null;

    if ($key == "") return $config;
    if (!$config) {
        $config = require config_path("/{$file}.php");
        $_SESSION["config"][$file] = $config;
    }
    // return $config[$key];
    return $key ? $config[$key] : $config;
}

function base_url(string $rute = ""): string
{
    $config = get_config("app");
    $url = $config["url_app"] ?? "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}";
    $folder = $config["url_folder"] ?? "{$_SERVER['REQUEST_URI']}";
    return "{$url}{$folder}{$rute}";
}

function app_path(string $folder = ""):string
{
    return BASE_PATH . DIRECTORY_SEPARATOR . "app" . $folder;
}

function config_path(string $file = ""): string
{
    return BASE_PATH . DIRECTORY_SEPARATOR . "config" . $file;
}

function assets_path(string $file = ""): string
{
    $base_path = base_url();
    $assets_folder = get_config("app","assets_url");
    return "{$base_path}{$assets_folder}{$file}";
}

function views_path(string $file = ""): string
{
    $views_folder = get_config("app","views_path");
    return BASE_PATH . DIRECTORY_SEPARATOR . $views_folder . $file;
}


function views_partials_path(string $file = ""): string
{
    $views_folder = get_config("app","partials_path");
    return views_path("{$views_folder}{$file}");
}