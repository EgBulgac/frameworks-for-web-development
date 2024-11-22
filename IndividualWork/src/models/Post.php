<?php
require_once __DIR__ . '/../../config/db.php';

class Post
{
    public static function getAll()
    {
        global $conn;

        $result = $conn->query("SELECT * FROM posts");

        if ($result === false) {
            die("Error executing query: " . $conn->error);
        }

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function create($title, $content, $user_id)
    {
        global $conn;

        $stmt = $conn->prepare("INSERT INTO posts (title, content, user_id) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $title, $content, $user_id);
        $stmt->execute();
        $stmt->close();
    }

    public static function update($id, $title, $content)
    {
        global $conn;

        $stmt = $conn->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
        $stmt->bind_param("ssi", $title, $content, $id);
        $stmt->execute();
        $stmt->close();
    }

    public static function delete($id)
    {
        global $conn;

        $stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public static function findById($id)
    {
        global $conn;

        $stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>
