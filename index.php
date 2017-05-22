<?php
require "Controllers/Controller.php";
require "Models/Model.php";
require "Models/Movie.php";

$config = require "resources/config.php";

$dsn = "mysql:host=".$config['db_host'].";dbname=".$config['db_name'].";charset=".$config['db_charset'];
$pdo = new PDO($dsn, $config['db_user'], $config['db_password'], $config['db_options']);

$controller = new Controller($pdo);
$controller->index();

