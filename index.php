<?php
session_start();

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

require_once 'controllers/ProductController.php';

$controller = new ProductController();

$view = 'views/products/list.php';

switch ($action) {
    case 'index':
        $view = 'views/products/list.php';
        $controller->index();
        break;
    case 'create':
        $view = 'views/products/create.php';
        $controller->create();
        break;
    case 'store':
        $controller->store();
        exit;
    case 'edit':
        $view = 'views/products/edit.php';
        $controller->edit($id);
        break;
    case 'update':
        $controller->update($id);
        exit;
    case 'delete':
        $controller->delete($id);
        exit;
    default:
        $view = 'views/products/list.php';
        $controller->index();
}

include 'views/layout.php';
?>