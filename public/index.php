<?php

session_start();
$_SESSION['id_user'] = 1;
if (isset($_GET["idInContact"])) {
    $_SESSION['id_user'] = $_GET["idInContact"];
}

if (isset($_GET['idInReceive'])) {
    $_SESSION['id_reciever'] = $_GET['idInReceive'];
}

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}


require_once __DIR__ . '/../data/database/connexion.php';

require_once __DIR__ . '/../data/models/message.php';
require_once __DIR__ . '/../data/models/category.php';
require_once __DIR__ . '/../data/models/user.php';

require_once __DIR__ . '/../data/repository/MessageRepository.php';
require_once __DIR__ . '/../data/repository/CategoryRepository.php';
require_once __DIR__ . '/../data/repository/ContactRepository.php';
require_once __DIR__ . '/../data/repository/UserRepository.php';

require_once __DIR__ . '/../data/controller/MessageController.php';
require_once __DIR__ . '/../data/controller/CategoryController.php';
require_once __DIR__ . '/../data/controller/ContactController.php';
require_once __DIR__ . '/../data/controller/UserController.php';


$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/index.php', '', $uri);

switch (true) {

    case $uri === '/login' && $method === 'POST':
        $data = json_decode(file_get_contents("php://input"), true);

        $_SESSION['id_user'] = $_GET["id_user"];

        echo json_encode([
            "status" => true,
            "message" => "Login realizado"
        ]);
        break;

    case $uri === '/message' && $method === 'GET':
        (new MessageController())->select();
        break;

    case $uri === '/message' && $method === 'POST':
        (new MessageController())->insert();
        break;

    case $uri === '/message' && $method === 'PUT':
        (new MessageController())->update();
        break;

    case $uri === '/message' && $method === 'DELETE':
        (new MessageController())->delete();
        break;


    case $uri === '/category' && $method === 'GET':
        (new CategoryController())->select();
        break;

    case $uri === '/category' && $method === 'POST':
        (new CategoryController())->insert();
        break;

    case $uri === '/category' && $method === 'PUT':
        (new CategoryController())->update();
        break;

    case $uri === '/category' && $method === 'DELETE':
        (new CategoryController())->delete();
        break;

    case $uri === '/user' && $method === 'GET':
        (new UserController())->select();
        break;

    case $uri === '/user' && $method === 'POST':
        (new UserController())->insert();
        break;

    case $uri === '/user' && $method === 'PUT':
        (new UserController())->update();
        break;

    case $uri === '/user' && $method === 'DELETE':
        (new UserController())->delete();
        break;


    case $uri === '/contact' && $method === 'GET':
        (new ContactController())->search();
        break;

    case $uri === '/contact' && $method === 'POST':
        (new ContactController())->insert();
        break;

    case $uri === '/contact' && $method === 'PUT':
        (new ContactController())->update();
        break;

    case $uri === '/contact' && $method === 'DELETE':
        (new ContactController())->delete();
        break;

    case $uri === '/session' && $method === 'GET':
    echo json_encode([
        "status" => isset($_SESSION["id_user"]),
        "id_user" => $_SESSION["id_user"] ?? null
    ]);
    exit;

    default:
        http_response_code(404);
        echo json_encode(['error' => 'Rota não encontrada']);
        break;
}