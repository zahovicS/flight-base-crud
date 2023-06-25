<?php

namespace App\Controllers;

use Flight;

class HomeController{

    public function index(){
        view("blog.posts.body",["data" => "comidas"]);
    }
    
}