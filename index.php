<?php
//require "resources/Database.php";
//use Controllers\Controller;
//use Models\Movie;
//use Models\Model;
require "Controllers/Controller.php";
require "Models/Model.php";
require "Models/Movie.php";

//$baseDir = __DIR__ . '/..';

//require $baseDir . '/vendor/autoload.php';

$config = require "resources/config.php";

$path = function ($uri) {
    return ($uri == "/") ? $uri : rtrim($uri, '/');
};

$dsn = "mysql:host=".$config['db_host'].";dbname=".$config['db_name'].";charset=".$config['charset'];
$pdo = new PDO($dsn, $config['db_user'], $config['db_password'], $config['options']);
$model = new Model($pdo);

$controller = new Controller($pdo);
$url = $path($_SERVER['REQUEST_URI']);

    switch ($url) {
        case 'show':
            $controller->readAllAlbums();
            $controller->deleteMovie($_POST['delete']);
            require "views/show.php";
            break;

        case 'create':
            $movie = new Movie();
            $controller->createMovie($movie);
            require "views/create.php";
            break;

        case 'update':
            $id = $_POST['edit'];
            $controller->getById($id);
            $controller->updateMovie($movie);
            require "views/update.php";
            break;
        default:
            require "views/start.php";
            break;
}

