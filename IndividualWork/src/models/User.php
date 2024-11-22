<?php

class User
{
    public static function create($username, $password, $email)
    {
        global $conn;

        $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $password, $email);
        $stmt->execute();
        $stmt->close();
    }

    public static function findByUsername($username)
    {
        global $conn;

        $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>
