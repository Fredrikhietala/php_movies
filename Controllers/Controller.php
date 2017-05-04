<?php

Class Controller {
    private $model;

    public function __construct(PDO $pdo) {
        $this->model = new Model($pdo);
    }

    public function index() {

        $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);

        switch ($page) {
            case ($page === "show"):
                if (isset($_POST['btn-delete'])) {
                    $id = $_POST['delete'];
                    $this->deleteMovie($id);
                }
                if (isset($_POST['btn-edit'])) {
                    $id = $_POST['edit'];
                    $this->getById($id);
                }
                require "views/show.php";
                break;

            case ($page === "create"):
                if (isset($_POST['insert'])) {
                    $movie = new Movie();
                    $movie->setTitle($_POST['title']);
                    $movie->setAltTitle($_POST['altTitle']);
                    $movie->setDirector($_POST['director']);
                    $movie->setCountry($_POST['country']);
                    $movie->setYear($_POST['year']);
                    $success = $this->createMovie($movie);
                    header('Location: views/start.php?success=' . (int)$success . '&id=' . $movie->getId());
                    exit();
                }
                require "views/create.php";
                break;

            case ($page === "update"):
                if (isset($_POST['btn-update'])) {
                    $movie = new Movie();
                    $movie->setId($_POST['id']);
                    $movie->setTitle($_POST['title']);
                    $movie->setAltTitle($_POST['altTitle']);
                    $movie->setDirector($_POST['director']);
                    $movie->setCountry($_POST['country']);
                    $movie->setYear($_POST['year']);
                    $this->updateMovie($movie);
                }
                require "views/update.php";
                break;
            default:
                require "views/start.php";
                break;
        }
    }

    public function readAllMovies() {
        return $this->model->readAll();
    }
    public function getById($id) {

        return $this->model->getById($id);
    }
    public function updateMovie($movie) {

        return $this->model->update($movie);
    }
    public function createMovie ($movie) {

        return $this->model->create($movie);
    }
    public function deleteMovie ($id) {

        return $this->model->delete($id);
    }
}
