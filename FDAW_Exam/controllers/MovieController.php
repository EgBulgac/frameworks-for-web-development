<?php

class MovieController {
    private $model;

    public function __construct($db) {
        $this->model = new Movie($db);
    }

    public function getAllMovies() {
        echo json_encode($this->model->getAllMovies());
    }

    public function getMovie($id) {
        $movie = $this->model->getMovieById($id);
        if (!$movie) {
            http_response_code(404);
            echo json_encode(["message" => "Movie not found"]);
        } else {
            echo json_encode($movie);
        }
    }

    public function createMovie($data) {
        if ($this->model->createMovie($data)) {
            http_response_code(201);
            echo json_encode(["message" => "Movie created successfully"]);
        } else {
            http_response_code(500);
            echo json_encode(["message" => "Failed to create movie"]);
        }
    }

    public function updateMovie($id, $data) {
        if ($this->model->updateMovie($id, $data)) {
            echo json_encode(["message" => "Movie updated successfully"]);
        } else {
            http_response_code(500);
            echo json_encode(["message" => "Failed to update movie"]);
        }
    }

    public function deleteMovie($id) {
        if ($this->model->deleteMovie($id)) {
            echo json_encode(["message" => "Movie deleted successfully"]);
        } else {
            http_response_code(500);
            echo json_encode(["message" => "Failed to delete movie"]);
        }
    }
}
