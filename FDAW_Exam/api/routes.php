<?php

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../models/Movie.php';
require_once __DIR__ . '/../controllers/MovieController.php';

$database = new Database();
$db = $database->getConnection();
$controller = new MovieController($db);

$method = $_SERVER['REQUEST_METHOD'];
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($method) {
    case 'GET':
        if ($id) {
            $controller->getMovie($id);
        } else {
            $controller->getAllMovies();
        }
        break;
    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $controller->createMovie($data);
        break;
    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        $controller->updateMovie($id, $data);
        break;
    case 'DELETE':
        $controller->deleteMovie($id);
        break;
    default:
        http_response_code(405);
        echo json_encode(["message" => "Method Not Allowed"]);
        break;
}
