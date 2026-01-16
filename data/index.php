<?php

header('Content-Type: application/json');

require_once __DIR__ . '/../data/database/connexion.php';

require_once __DIR__ . '/../data/models/message.php';
require_once __DIR__ . '/../data/models/category.php';
require_once __DIR__ . '/../data/models/user.php';

require_once __DIR__ . '/../data/repositories/MessageRepository.php';
require_once __DIR__ . '/../data/repositories/CategoryRepository.php';
require_once __DIR__ . '/../data/repositories/ContactRepository.php';
require_once __DIR__ . '/../data/repositories/UserRepository.php';

require_once __DIR__ . '/../data/controller/MessageController.php';
require_once __DIR__ . '/../data/controller/CategoryController.php';
require_once __DIR__ . '/../data/controller/ContactController.php';
require_once __DIR__ . '/../data/controller/UserController.php';

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/index.php', '', $uri);

$controller = new MessagesController();

switch (true) {

    case $uri === '/messages':
        $controller = new MessagesController();

        break;

    case $uri === '/category':
        $controller = new CategoryController();
        break;

    case $uri === '/user':
        $controller = new UserController();
        break;

    case $uri === '/contact':
        $controller = new ContactsController();
        break;

    default:
        http_response_code(404);
        echo json_encode(['error' => 'Rota não encontrada']);
        break;
}


switch (true) {

    case $method === 'GET':
        $controller->select();
        break;

    case $method === 'PUT':
        $controller->insert();
        break;

    case $method === 'UPDATE':
        $controller->update();
        break;

    case $method === 'DELETE':
        $controller->delete();
        break;

    default:
        http_response_code(404);
        echo json_encode(['error' => 'Rota não encontrada']);
        break;
}






switch (true) {

    case $uri === '/messages' && $method === 'GET':
        $controller->index();
        break;

    case $uri === '/messages' && $method === 'POST':
        $controller->store();
        break;

    default:
        http_response_code(404);
        echo json_encode(['error' => 'Rota não encontrada']);
        break;
}
