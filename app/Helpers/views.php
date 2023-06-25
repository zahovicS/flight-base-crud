<?php

function view(string $view,array $data = [],array $data_site = []){
    // $view => blog.post.body
    if ($view === "") {
        throw new Exception("View not Found.");
    }

    $partials = get_config("app","partials");

    $partials_path = get_config("app","partials_path");

    $content_path = str_replace(".","/",$view);
    $array_merge = array_replace(init_config_view(),$data_site);
    $content_view =  "{$content_path}.php";
    Flight::render("{$partials_path}/{$partials["header"]}.php", $array_merge, 'header');
    Flight::render("{$partials_path}/{$partials["scripts"]}.php", $array_merge, 'scripts');
    Flight::render($content_view,$data, 'body');
    Flight::render("{$partials_path}/{$partials["layout"]}.php", $array_merge);
}