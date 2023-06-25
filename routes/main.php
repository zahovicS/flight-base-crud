<?php
namespace Router;

use Flight;
use App\Controllers\HomeController;

$homeController = new HomeController();

Flight::route('/', [$homeController ,'index']);