<?php

//namespace Controllers;

Class Controller {
    //private $basedir;
    private $model;

    public function __construct(PDO $pdo) {
        $this->model = new Model($pdo);
    }

    public function index() {
        require "../views/start.php";
    }

    /**
     * @return string
     */
    /*public function getBasedir()
    {
        return $this->basedir;
    }

    /**
     * @param string $basedir
     */
    /*public function setBasedir($basedir)
    {
        $this->basedir = $basedir;
    }*/

    public function readAllAlbums() {
        return $this->model->readAll();
    }
    public function getById($id) {
        if (isset($_POST['btn-edit'])) {
            $id = $_POST['edit'];
        }
        return $this->model->getById($id);
    }
    public function updateMovie($movie) {
        if (isset($_POST['btn-update'])) {
            $movie = new Movie();
            $movie->setId($_POST['id']);
            $movie->setTitle($_POST['title']);
            $movie->setAltTitle($_POST['altTitle']);
            $movie->setDirector($_POST['director']);
            $movie->setCountry($_POST['country']);
            $movie->setYear($_POST['year']);
        }
        return $this->model->update($movie);
    }
    public function createMovie ($movie) {
        if (isset($_POST['insert'])) {
            $movie = new Movie();
            $movie->setTitle($_POST['title']);
            $movie->setAltTitle($_POST['altTitle']);
            $movie->setDirector($_POST['director']);
            $movie->setCountry($_POST['country']);
            $movie->setYear($_POST['year']);
        }
        return $this->model->create($movie);
    }
    public function deleteMovie ($id) {
        if (isset($_POST['btn-delete'])) {
            $id = $_POST['delete'];
        }
        return $this->model->delete($id);
    }
}
