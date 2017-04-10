<?php 

require "model/productsModel.php";

$obj = new Crud($connection);

$movielist = $obj->readAll();

include "views/show.php";