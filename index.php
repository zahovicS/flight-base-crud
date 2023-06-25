<?php

define("BASE_PATH",__DIR__);

session_start();

require_once BASE_PATH. "/vendor/autoload.php";

require_once BASE_PATH. "/app/kernel.php";

require_once BASE_PATH. "/routes/main.php";

Flight::start();