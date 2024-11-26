<?php
require '../db.php';

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $stmt = $pdo->prepare("SELECT * FROM contacts WHERE id = :id");
            $stmt->execute(['id' => $_GET['id']]);
            $contact = $stmt->fetch(PDO::FETCH_ASSOC);
            echo json_encode($contact);
        } else {
            $stmt = $pdo->query("SELECT * FROM contacts");
            $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($contacts);
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $stmt = $pdo->prepare("INSERT INTO contacts (name, phone, email, note) VALUES (:name, :phone, :email, :note)");
        $stmt->execute([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'] ?? null,
            'note' => $data['note'] ?? null,
        ]);
        echo json_encode(['id' => $pdo->lastInsertId()]);
        break;
    case 'PUT':
        $data = json_decode(file_get_contents('php://input'), true);
        $stmt = $pdo->prepare("UPDATE contacts SET name = :name, phone = :phone, email = :email, note = :note WHERE id = :id");
        $stmt->execute([
            'id' => $data['id'],
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'] ?? null,
            'note' => $data['note'] ?? null,
        ]);
        echo json_encode(['success' => true]);
        break;

    case 'DELETE':
        $id = $_GET['id'];
        $stmt = $pdo->prepare("DELETE FROM contacts WHERE id = :id");
        $stmt->execute(['id' => $id]);
        echo json_encode(['success' => true]);
        break;

    default:
        http_response_code(405);
        echo json_encode(['error' => 'Метод не поддерживается']);
        break;
}
?>
