<?php
include_once(__DIR__ . "/../classes/List.php");

if(!empty($_POST)) {
    $list = new TodoList();
    $list->setId($_POST["id"]);

    $list->delete();
    var_dump($id);
    $response = [
        'status' => 'succes',
        'message' => 'post deleted'
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
}