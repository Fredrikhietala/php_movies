<?php
//require "resources/Database.php";
use Controllers\Controller;
use Models\Movie;
use Models\Model;

$baseDir = __DIR__ . '/..';

$config = require $baseDir . '/resources/config.php';

$path = function ($uri) {
    return ($uri == "/") ? $uri : rtrim($uri, '/');
};

$dsn = "mysql:host=".$config['db_host'].";dbname=".$config['db_name'].";charset=".$config['charset'];
$pdo = new PDO($dsn, $config['db_user'], $config['db_password'], $config['options']);
$model = new Model($pdo);

$controller = new Controller($baseDir);
$url = $path($_SERVER['REQUEST_URI']);

    switch ($url) {
        case '/show':
            $controller->readAllAlbums($model);
            $controller->deleteMovie($_POST['delete']);
            require $baseDir. '/views/show.php';
            break;

        case 'create':
            $movie = new Movie($movie_data = []);
            $controller->createMovie($movie);
            require "views/create.php";
            break;

        case 'update':
            $this->controller->getById($_POST['edit']);
            $this->controller->updateMovie($movie);
            require "views/update.php";
            break;
        default:
            require "views/start.php";
            break;
}

