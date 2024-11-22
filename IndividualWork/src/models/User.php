<?php
require_once __DIR__ . '/../../config/db.php';

class User
{
    public static function findByUsername($username)
    {
        global $conn;

        $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $username, $password);
        $stmt->fetch();

        if ($stmt->num_rows > 0) {
            return ['id' => $id, 'username' => $username, 'password' => $password];
        } else {
            return null;
        }
    }

    public static function create($username, $password, $email)
    {
        global $conn;

        $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $password, $email);
        $stmt->execute();
        $stmt->close();
    }
}
?>
