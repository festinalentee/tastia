<?php

require 'Routing.php';
require_once 'Session.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Session::startSession();

Routing::get('', 'DefaultController');
Routing::get('login', 'DefaultController');
Routing::get('recipes', 'RecipeController');
Routing::get('register', 'SecurityController');

Routing::post('login', 'SecurityController');
Routing::post('addRecipe', 'RecipeController');
Routing::post('register', 'SecurityController');
Routing::post('search', 'RecipeController');

Routing::run($path);
