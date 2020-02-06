<?php
// require "vendor/autoload.php";


require "./bootstrap.php";

use Antiockus\App;
use Antiockus\Request;

$req = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$request = new Request($req, $method);

$app = new App();

$app->processRequest($request);
