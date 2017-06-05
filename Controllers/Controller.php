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
                    $this->model->deleteDirector($id);
                }
                require "views/show.php";
                break;

            case ($page === "show_movies"):
                $id = $_GET['id'];
                $this->model->readMovies($id);
                require "views/show_movies.php";
                break;


            case ($page === "delete_movie"):
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $this->model->delete($id);
                }
                require "views/show.php";
                break;

            case ($page === "create_movie"):
                if (isset($_POST['insert'])) {
                    $movie = new Movie();
                    $movie->setDirectorId($_GET['id']);
                    $movie->setTitle($_POST['title']);
                    $movie->setAltTitle($_POST['altTitle']);
                    $movie->setYear($_POST['year']);
                    $success = $this->model->create($movie);
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
                    header('Location: /index.php?page=start&success=' . (int)$success . '&id=' . $director->getId());
                    exit();
                }
                require "views/create_director.php";
                break;

            case ($page === "update_movie"):
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $movie = $this->model->getById($id);
                    require "views/update.php";
                }
                if (isset($_POST['btn-update'])) {
                    $movie = new Movie($_POST);
                    $update_success = $this->model->update($movie);
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
}
