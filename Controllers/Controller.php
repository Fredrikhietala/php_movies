<?php

namespace Controllers;

Class Controller {
    private $basedir;

    public function __construct($basedir = '') {
        $this->basedir = $basedir;
    }

    public function index() {
        require $this->basedir.'/views/start.php';
    }

    /**
     * @return string
     */
    public function getBasedir()
    {
        return $this->basedir;
    }

    /**
     * @param string $basedir
     */
    public function setBasedir($basedir)
    {
        $this->basedir = $basedir;
    }

    public function readAllAlbums($model) {
        return $model->readAll();
    }
    public function getById($model, $id) {
        if (isset($_POST['btn-edit'])) {
            $id = $_POST['edit'];
        }
        return $model->getById($id);
    }
    public function updateMovie($model $data) {
        if (isset($_POST['btn-update'])) {
            $id = $_POST['id'];
            $this->data->setId($id);
            $title = $_POST['title'];
            $this->movie->setTitle($title);
            $altTitle = $_POST['altTitle'];
            $this->movie->setAltTitle($altTitle);
            $director = $_POST['director'];
            $this->movie->setDirector($director);
            $country = $_POST['country'];
            $this->movie->setCountry($country);
            $year = $_POST['year'];
            $this->movie->setYear($year);
            $movie = [$id, $title, $altTitle, $director, $year];
        }
        return $this->model->create($movie);
    }
    public function createMovie (Movie $movie) {
        if (isset($_POST['insert'])) {
            $title = $_POST['title'];
            $this->movie->setTitle($title);
            $altTitle = $_POST['altTitle'];
            $this->movie->setAltTitle($altTitle);
            $director = $_POST['director'];
            $this->movie->setDirector($director);
            $country = $_POST['country'];
            $this->movie->setCountry($country);
            $year = $_POST['year'];
            $this->movie->setYear($year);
            $movie = [$title, $altTitle, $director, $year];
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
