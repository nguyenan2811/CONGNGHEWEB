<?php

// File: index.php
// Đây là file chính của ứng dụng, chịu trách nhiệm điều hướng các yêu cầu.

require_once 'controllers/ProductController.php';

$controller = new ProductController();
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store();
        break;
    case 'edit':
        $controller->edit($_GET['id']);
        break;
    case 'update':
        $controller->update($_POST);
        break;
    case 'delete':
        $controller->delete($_GET['id']);
        break;
    default:
        echo "Hành động không hợp lệ!";
        break;
}

?>