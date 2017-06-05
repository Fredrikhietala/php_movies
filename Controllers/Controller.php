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
                $movie = new Movie();
                $directorId = $movie->getDirectorId();
                $this->readMovies($directorId);
                require "views/show.php";
                break;

            case ($page === "delete_director"):
                $id = $_GET['id'];
                $this->deleteDirector($id);
                require "views/show.php";
                break;

            case ($page === "create_movie"):
                if (isset($_POST['insert'])) {
                    $movie = new Movie();
                    $movie->setDirectorId($_POST['directorId']);
                    $movie->setTitle($_POST['title']);
                    $movie->setAltTitle($_POST['altTitle']);
                    $movie->setYear($_POST['year']);
                    $success = $this->createMovie($movie);
                    header('Location: /index.php?page=start&success=' . (int)$success . '&id=' . $movie->getId());
                    exit();
                }
                require "views/create.php";
                break;

            case ($page === "create_director"):
                if (isset($_POST['insert'])) {
                    $director = new Director();
                    $director->setName($_POST['name']);
                    $director->setBirthYear($_POST['birthYear']);
                    $director->setNationality($_POST['nationality']);
                    $success = $this->model->createDirector($director);
                }
                require "views/create_director.php";
                break;

            case ($page === "update_movie"):
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $movie = $this->getByMovieId($id);
                    require "views/update.php";
                }
                if (isset($_POST['btn-update'])) {
                    $movie = new Movie($_POST);
                    $update_success = $this->updateMovie($movie);
                    header('Location: /index.php?page=start&update_success=' . (int)$update_success . '&id=' . $movie->getId());
                    exit();
                }
                break;

            case ($page === "update_director"):
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $director = $this->model->getDirectorById($id);
                    require "views/update_director.php";
                }
                if (isset($_POST['btn-update'])) {
                    $director = new Director($_POST);
                    $update_success = $this->model->updateDirector($director);
                    header('Location: /index.php?page=start&update_success=' . (int)$update_success . '&id=' . $director->getId());
                    exit();
                }
                break;

            default:
                require "views/start.php";
                break;
        }
    }

    public function readAllDirectors() {

        return $this->model->readAll();
    }
    public function readMovies ($directorId) {

        return $this->model->readMovies($directorId);
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

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->deleteMovie($id);
        }
        return $this->model->delete($id);
    }
    public function deleteDirector ($id) {

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->model->deleteDirector($id);
        }
        return $this->model->deleteDirector($id);
    }
}
