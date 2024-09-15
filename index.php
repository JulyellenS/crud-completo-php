<?php
require_once __DIR__ . '/app/control/PessoaList.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'listar';

$controller = new PessoaList();

switch ($action) {
    case 'editar':
        $controller->editar();
        break;
    case 'excluir':
        $controller->excluir();
        break;
    default:
        $controller->listar();
        break;
}
