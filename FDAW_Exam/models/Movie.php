<?php

class Movie {
    private $conn;
    private $table = "Movies";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllMovies() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMovieById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createMovie($data) {
        $query = "INSERT INTO " . $this->table . " (title, director, genre, description) VALUES (:title, :director, :genre, :description)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":title", $data['title']);
        $stmt->bindParam(":director", $data['director']);
        $stmt->bindParam(":genre", $data['genre']);
        $stmt->bindParam(":description", $data['description']);
        return $stmt->execute();
    }

    public function updateMovie($id, $data) {
        $query = "UPDATE " . $this->table . " SET title = :title, director = :director, genre = :genre, description = :description WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":title", $data['title']);
        $stmt->bindParam(":director", $data['director']);
        $stmt->bindParam(":genre", $data['genre']);
        $stmt->bindParam(":description", $data['description']);
        return $stmt->execute();
    }

    public function deleteMovie($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
