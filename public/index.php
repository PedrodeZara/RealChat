<?php

header('Content-Type: application/json');

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
    case $uri === '/messages' && $method === 'GET':
        (new MessagesController())->select();
        break;

    case $uri === '/messages' && $method === 'POST':
        (new MessagesController())->insert();
        break;

    case $uri === '/messages' && $method === 'PUT':
        (new MessagesController())->update();
        break;

    case $uri === '/messages' && $method === 'DELETE':
        (new MessagesController())->delete();
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
        (new ContactController())->select();
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


    default:
        http_response_code(404);
        echo json_encode(['error' => 'Rota não encontrada']);
        break;
}