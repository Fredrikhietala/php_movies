<?php
/**
 * Created by PhpStorm.
 * User: Fredrik Hietala
 * Date: 2017-04-28
 * Time: 15:27
 */
Class Controller {
    private $movieCrud;
    private $movie;

    public function __construct(PDO $connection, $data) {
        $this->movieCrud = new MovieCrud($connection);
        $this->movie = new Movie($data);
    }
}