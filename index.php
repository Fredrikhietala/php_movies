<?php
require "Controllers/Controller.php";
require "Models/Model.php";
require "Models/Movie.php";

$config = require "resources/config.php";

$dsn = "mysql:host=".$config['db_host'].";dbname=".$config['db_name'].";charset=".$config['charset'];
$pdo = new PDO($dsn, $config['db_user'], $config['db_password'], $config['options']);

$controller = new Controller($pdo);
$controller->index();

