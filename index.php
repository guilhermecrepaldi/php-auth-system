<?php
require_once "vendor/autoload.php";
require_once "core/Router.php";
require_once "core/Request.php";
require_once "core/Response.php";
require_once "core/Database.php";
require_once "core/Middleware.php";
require_once "app/controllers/AuthController.php";
require_once "app/controllers/UserController.php";
require_once "app/models/User.php";

session_start();

$router = new Router();

// Rotas publicas
$router->add("GET", "/login", "AuthController@loginForm");
$router->add("POST", "/login", "AuthController@login");
$router->add("GET", "/register", "AuthController@registerForm");
$router->add("POST", "/register", "AuthController@register");

// Rotas protegidas
$router->add("GET", "/dashboard", "UserController@dashboard", ["AuthMiddleware"]);
$router->add("GET", "/logout", "AuthController@logout", ["AuthMiddleware"]);
$router->add("GET", "/profile", "UserController@profile", ["AuthMiddleware"]);

$router->dispatch(Request::fromGlobals());
