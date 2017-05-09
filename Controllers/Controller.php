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
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $this->deleteMovie($id);
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
                    header('Location: /index.php?page=start&success=' . (int)$success . '&id=' . $movie->getId());
                    exit();
                }
                require "views/create.php";
                break;

            case ($page === "update"):
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $movie = $this->getByMovieId($id);
                    require "views/update.php";
                }
                if (isset($_POST['btn-update'])) {
                    $movie = new Movie();
                    $movie->setId($_POST['id']);
                    $movie->setTitle($_POST['title']);
                    $movie->setAltTitle($_POST['altTitle']);
                    $movie->setDirector($_POST['director']);
                    $movie->setCountry($_POST['country']);
                    $movie->setYear($_POST['year']);
                    $update_success = $this->updateMovie($movie);
                    header('Location: /index.php?page=start&update_success=' . (int)$update_success . '&id=' . $movie->getId());
                    exit();
                }
                break;
            default:
                require "views/start.php";
                break;
        }
    }

    public function readAllMovies() {
        return $this->model->readAll();
    }
    public function getByMovieId($id) {

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
