<?php

Class Controller {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function index() {

        $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);

        switch ($page) {
            case ($page === "show"):
                $this->db->readAll('director');
                require "views/show.php";
                break;

            case ($page === "show_movies"):
                $id = $_GET['id'];
                $this->db->readMovies('films', $id);
                require "views/show_movies.php";
                break;

            case ($page === "delete_director"):
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $this->db->delete('director',$id);
                }
                require "views/show.php";
                break;

            case ($page === "delete_movie"):
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $this->db->delete('films',$id);
                    header('Location: /index.php?page=show');
                    exit();
                }
                require "views/show_movies.php";
                break;

            case ($page === "create_movie"):
                if (isset($_POST['insert_movie'])) {
                    $movie = new Movie();
                    $movie->setDirectorId($_POST['director_id']);
                    $movie->setTitle($_POST['title']);
                    $movie->setAltTitle($_POST['alt_title']);
                    $movie->setYear($_POST['year']);
                    $success_movie = $this->createMovies($movie);
                    header('Location: /index.php?page=show&success_movie=' . (int)$success_movie . '&id=' . $movie->getId());
                    exit();
                }
                require "views/create.php";
                break;

            case ($page === "create_director"):
                if (isset($_POST['insert_director'])) {
                    $director = new Director();
                    $director->setName($_POST['name']);
                    $director->setBirthYear($_POST['birth_year']);
                    $director->setNationality($_POST['nationality']);
                    $success_director = $this->createDirector($director);
                    header('Location: /index.php?page=show&success_director=' . (int)$success_director . '&id=' . $director->getId());
                    exit();
                }
                require "views/create_director.php";
                break;

            case ($page === "update_movie"):
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $movie = $this->db->getById('films', $id);
                    require "views/update.php";
                }
                break;

            case ($page === "do_update_movie"):
                if (isset($_POST['update_movie'])) {
                    $movie = new Movie($_POST);
                    $update_success_movie = $this->updateMovies($movie);
                    header('Location: /index.php?page=show&update_success_movie=' . (int)$update_success_movie . '&id=' . $movie->getId());
                    exit();
                }
                break;

            case ($page === "update_director"):
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $director = $this->db->getById('director', $id);
                    require "views/update_director.php";
                }
                break;

            case ($page === "do_update_director"):
                if (isset($_POST['update_director'])) {
                    $director = new Director($_POST);
                    $update_success_director = $this->updateDirector($director);
                    header('Location: /index.php?page=show&update_success_director=' . (int)$update_success_director . '&id=' . $director->getId());
                    exit();
                }
                break;

            default:
                require "views/start.php";
                break;
        }
    }

    public function updateMovies(Movie $movie) {
        return $this->db->update('films', $movie->getId(), $movie->toArray());
    }

    public function updateDirector(Director $director) {
        return $this->db->update('director', $director->getId(), $director->toArray());
    }

    public function createMovies(Movie $movie) {
        return $this->db->create('films', $movie->toArray());
    }

    public function createDirector(Director $director) {
        return $this->db->create('director', $director->toArray());
    }

    public function success() {
        if (isset($_GET['success_movie']) && $_GET['success_movie']) {
            echo "<p>Your movie was successfully inserted! If you want to see your movie click <a href='/index.php?page=update_movie&id=" .$_GET['id']. "'>Here</a></p>";
        }
        elseif (isset($_GET['success_director']) && $_GET['success_director']) {
            echo "<p>Your director was successfully inserted! If you want to see your movie click <a href='/index.php?page=update_director&id=" .$_GET['id']. "'>Here</a></p>";
        }
        elseif (isset($_GET['success_movie']) && !$_GET['success_movie']) {
            echo "<p>Something went wrong!</p>";
        }
        elseif (isset($_GET['success_director']) && !$_GET['success_director']) {
            echo "<p>Something went wrong!</p>";
        }
    }

    public function updateSuccess() {
        if (isset($_GET['update_success_movie']) && $_GET['update_success_movie']) {
            echo "<p>Your movie was successfully updated! If you want to see your movie click <a href='/index.php?page=update_movie&id=" .$_GET['id']. "'>Here</a></p>";
        }
        elseif (isset($_GET['update_success_director']) && $_GET['update_success_director']) {
            echo "<p>Your director was successfully updated! If you want to see your movie click <a href='/index.php?page=update_director&id=" .$_GET['id']. "'>Here</a></p>";
        }
        elseif (isset($_GET['update_success_movie']) && !$_GET['update_success_movie']) {
            echo "<p>Something went wrong!</p>";
        }
        elseif (isset($_GET['update_success_director']) && !$_GET['update_success_director']) {
            echo "<p>Something went wrong!</p>";
        }
    }
}
